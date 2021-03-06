<?php
namespace xh\run\server\controller;
use xh\library\request;
use xh\library\mysql;
use xh\unity\cog;
use xh\library\functions;
use xh\unity\sms;
use xh\unity\encrypt;
use xh\unity\callbacks;
use xh\library\url;
use xh\library\redis;


//微信监控-全自动版-服务端
class service{

    private $mysql;

    public function __construct(){
        $this->mysql = new mysql();
    }


    public function update(){



        $NowTime = time() -600;

        $this->mysql->update("service_order", [
            'status'=> 3

        ],"creation_time < {$NowTime} and status!=4");


        if($this){

            echo 'ok';
        }else{

            'no';
        }

    }

    public function getRegular($str, $regularStr){
        preg_match_all ($regularStr, $str, $pat_array, PREG_PATTERN_ORDER);
        return ($pat_array);
    }


    //上载订单通知
    public function uploadOrder(){


        file_put_contents("HBLOG.txt", json_encode($_POST));


        $id = intval(request::filter('post.signkey'));
     	$md5 = request::filter('post.sign');
        $mark = request::filter('post.mark');
        $money = request::filter('post.money');
        $tradeNo = request::filter('post.no');



     






           $money2 = str_replace(',', '', $money);
      

	     if($md5 != $md5 ){
                functions::json(200, 'APP签名不正确无效');
                die;
        
         }


        $find_order = $this->mysql->query('service_order',"app_id={$id} and status=2 and amount={$money2}  ORDER BY id desc")[0];
        $order_id = $find_order['id'];
        $service_id = $find_order['service_id'];
		$remark = $find_order['out_trade_no'];
      	
      
      if($mark != $remark){
          
        functions::json(200, '返回订单号备注不相符');
          die;
      }
      
       
        if (is_array($find_order)) {
         
    
            $res = $this->mysql->update("service_order", [
                'status'=>4,
                'pay_time'=>time(),
                'bankorderid'=>$tradeNo
            ],"id={$find_order['id']}");
              

          	$http_type = ((isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] == 'on') || (isset($_SERVER['HTTP_X_FORWARDED_PROTO']) && $_SERVER['HTTP_X_FORWARDED_PROTO'] == 'https')) ? 'https://' : 'http://';
            $back=$http_type.$_SERVER['SERVER_NAME'].'/server/service/callback.do';
            $result = callbacks::curl($back, http_build_query([
                'orderid' => $order_id,
                'id' => $service_id

            ]));



            $remark = ' - 红包订单号'.$tradeNo . '，设备ID：'.$service_id;
            $average = 1;



        }else{
            $remark = ' - 普通收款，流水号：' . $tradeNo;
            $average = 0;
            //检测是否
        }
    
        //查询用户信息
        $find_uid = $this->mysql->query("service_account","app_id={$id}")[0]['app_id'];

        

	 

      
        //写到交易记录
        $this->mysql->insert("client_pay_record", [
            'pay_time'=>time(),
            'amount'=>$money,
            'user_id'=>$find_uid,
            'pay_note'=>'[商户]ID：'.$id . $remark,
            'types'=>2,
            'version_code'=>'service_auto',
            'average'=>$average,
         	'bankorderid'=>$tradeNo
        ]);
        functions::json(200, 'success ['.date("Y/m/d H:i:s",time()).']: 转账->' . $money .'元->'.'回调成功');

      

    }



    //异步通知
    public function callback()
    {
        $module_name = 'service_auto';
        $service_id = request::filter('post.id');
        if (empty($service_id)) functions::json(-1, '服务ID错误');
        //服务信息
        $service = $this->mysql->query('service_account', "id={$service_id}")[0];
        if (!is_array($service)) functions::json(-1, '服务错误');
        // -------------------------
        // 获取需要回调的列表
        $order = $this->mysql->query('service_order', "service_id={$service_id} and status=4 and callback_status=0");

        foreach ($order as $obj) {
            //检测是否为用户订单
            if ($obj['user_id'] != 0) {
                //是用户
                $user = $this->mysql->query("client_user", "id={$obj['user_id']}")[0];
                file_put_contents("userid.txt", json_encode($user));

                //得到该用户组
                $group = $this->mysql->query('client_group', "id={$user['group_id']}")[0];
                //解析数据
                $authority = json_decode($group['authority'], true)[$module_name];
                //判断用户组是否存在
                if (is_array($group) || $group['authority'] != -1 || $authority['open'] == 1) {
                    //手续费扣掉后的金额
                    $fees = $obj['amount'] * $authority['cost'];
                    $user_money = $obj['amount'] - $fees;

                    if (intval($obj['reached']) === 0) {
                        //给用户加钱
                        $deductionStatus = $this->mysql->update("client_user", [
                            'money' => $user['money'] + $user_money
                        ], "id={$user['id']}");
                        //直接强制修改reached
                        $this->mysql->update("service_order", ['reached' => 1], "id={$obj['id']}");
                    }

                    $user['money'] = $user['money'] + $user_money;
                    $callback_time = time();
                    // 手续费扣除成功，开始回调
                    $result = callbacks::curl($obj['callback_url'], http_build_query([
                        'account_name'  => $user['username'],
                        'pay_time'      => $obj['pay_time'],
                        'status'        => 'success',
                        'amount'        => $obj['amount'],
                        'out_trade_no'  => $obj['out_trade_no'],
                        'trade_no'      => $obj['trade_no'],
                        'fees'          => $fees,
                        'sign'          => functions::sign($user['key_id'], [
                            'amount'       => $obj['amount'],
                            'out_trade_no' => $obj['out_trade_no']
                        ]),
                        'callback_time' => $callback_time,
                        'type'          => $obj['types'],
                        'account_key'   => $user['key_id']
                    ]));
                    //更新订单
                    $this->mysql->update("service_order", [
                        'callback_time'    => $callback_time,
                        'callback_status'  => 1,
                        'callback_content' => $result,
                        'fees'             => $fees,
                        'reached'          => 1
                    ], "id={$obj['id']}");

                }
            } else {
                //进行系统回调
                $callback_time = time();
                // 手续费扣除成功，开始回调
                $result = callbacks::curl($obj['callback_url'], http_build_query([
                    'account_name'  => 'SYSTEM_CALLBACK',
                    'pay_time'      => $obj['pay_time'],
                    'status'        => 'success',
                    'amount'        => $obj['amount'],
                    'out_trade_no'  => $obj['out_trade_no'],
                    'trade_no'      => $obj['trade_no'],
                    'fees'          => 0,
                    'sign'          => functions::sign(cog::read('server')['key'], [
                        'amount'       => $obj['amount'],
                        'out_trade_no' => $obj['out_trade_no']
                    ]),
                    'callback_time' => $callback_time,
                    'type'          => $obj['types'],
                    'account_key'   => cog::read('server')['key']
                ]));
                //更新订单
                $this->mysql->update("service_order", [
                    'callback_time'    => $callback_time,
                    'callback_status'  => 1,
                    'callback_content' => $result,
                    'fees'             => $fees,
                    'reached'          => 1
                ], "id={$obj['id']}");
            }
        }

        $this->mysql->update("service_account", ['active_time' => time()], "id={$service_id}");
        functions::json(200, ' [' . date("Y/m/d H:i:s", time()) . ']: 服务ID->' . $service_id . ' 异步通知成功');
        //-----------------------------
    }



}

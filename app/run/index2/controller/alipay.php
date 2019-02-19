<?php
namespace xh\run\index2\controller;


use xh\library\model;
use xh\library\mysql;
use xh\library\view;
use xh\library\functions;
use xh\unity\page;
use xh\library\request;
use xh\unity\userCog;

class alipay{
    
    private $mysql;
    
    //初始化
    public function __construct(){
        (new model())->load('user', 'session')->check();
        $this->mysql = new mysql();
    }
    
    
    //全自动版
    public function automatic(){
        (new model())->load('user', 'group')->review('alipay_auto');
        $result = page::conduct('client_alipay_automatic_account',request::filter('get.page'),10,"user_id={$_SESSION['MEMBER']['uid']}",null,'id','asc');
        new view('alipay/index',[
            'result'=>$result,
            'mysql'=>$this->mysql
        ]);
    }
    
	 //添加账户-视图
    public function viewAdd(){
        new view('alipay/add',[
            'mysql'=>$this->mysql
        ]);
    }
	
	 //添加账户-ajax请求
    public function add(){
        //账户类型
        $type = request::filter('post.type');
		$kahao = request::filter('post.kahao');
		$card = request::filter('post.card');
		$name = request::filter('post.name');
      // file_put_contents("yinhang_post.txt", json_encode($_POST));
        //计算keyid
        $key_id = strtoupper(substr(md5(mt_rand((mt_rand(1000,9999)+mt_rand(1000,9999)),mt_rand(1000000,99999999)) . time()), 0, 18));
        //添加通道
        $rc = $this->mysql->insert("client_alipay_automatic_account", [
            'name'=>$name,
			'card'=>$card,


            'time'=>time(),
            'status'=>1,
            'user_id'=>$_SESSION['MEMBER']['uid'],
			'key_id'=>$key_id
        ]);
		
        if ($rc > 0) functions::json(200, '添加成功');
        functions::json(-69, '添加失败,请联系客服');
    }
	
    //添加-->OK
    public function automaticAdd(){
        (new model())->load("alipay", "features")->add($this->mysql);
    }
    
    //启动automatic轮训
    public function startAutomaticRb(){
        (new model())->load("alipay", "features")->startRb($this->mysql);
    }
    
    //启动网关
    public function startAutomaticGateway(){
        (new model())->load("alipay", "features")->startGateway($this->mysql);
    }
    
    //安全注销
    public function startAutomaticLogOut(){
        (new model())->load("alipay", "features")->startLogOut($this->mysql);
    }
    
    //请求登录
    public function startAutomaticLogin(){
        (new model())->load("alipay", "features")->startLogin($this->mysql);
    }
    
    //获取支付宝状态
    public function getAutomaticStatus(){
        (new model())->load("alipay", "features")->getStatus($this->mysql);
    }
    
    //删除支付宝
    public function automaticDelete(){
        (new model())->load("alipay", "features")->delete($this->mysql);
    }
    
    //全部订单
    public function automaticOrder(){
        (new model())->load("alipay", "features")->order($this->mysql);
    }
      //订单统计
    public function statisticOrder()
    {
        (new model())->load("alipay", "features")->statistic($this->mysql);
    }
    
    //手动补发
    public function automaticReissue(){
        (new model())->load("alipay", "features")->reissue($this->mysql);
    }
    
    //轮训通道测试
    public function robinTest(){
        new view('alipay/robinTest');
    }
    
    //单个支付宝测试
    public function gatewayTest(){
        new view('alipay/gatewayTest');
    }
    
    //支付宝配置
    public function automaticConfig(){
        new view('alipay/setting');
        
    }
  //导出订单
    public function export()
    {
        $code = request::filter('get.code', '', 'htmlspecialchars');
        $start_time = request::filter('get.start_time', '', 'htmlspecialchars');
        $end_time = request::filter('get.end_time', '', 'htmlspecialchars');
        $where = "";
        if ($code) {
            $where .= " and code=" . $code;
        }
        if ($start_time && $end_time) {
            $where .= " and creation_time BETWEEN {$start_time} AND {$end_time}";
        }

        if ($start_time == 'null' && $end_time = 'null' && !$code) {
            $list = $this->mysql->query("client_alipay_automatic_orders", "user_id={$_SESSION['MEMBER']['uid']}");
        } else {
            $list = $this->mysql->query("client_alipay_automatic_orders", "user_id={$_SESSION['MEMBER']['uid']}" . $where);
        }
        foreach ($list as $key => $value) {
            if ($value['status'] == 1) {
                $list[$key]['status'] = '等待下发支付二维码';
            } else if ($value['status'] == 2) {
                $list[$key]['status'] = '未支付';
            } else if ($value['status'] == 3) {
                $list[$key]['status'] = '订单超时';
            } else {
                $list[$key]['status'] = '已支付';
            }
            if ($value['pay_time']) {
                $list[$key]['pay_time'] = date('Y-m-d H:i:s', $value['pay_time']);
            } else {
                $list[$key]['pay_time'] = '无';
            }
            if ($value['callback_status'] == 1) {
                $list[$key]['callback_status'] = '已回调';
            } else {
                $list[$key]['callback_status'] = '未回调';
            }
            $list[$key]['creation_time'] = date('Y-m-d H:i:s', $value['creation_time']);
            $user_info = $this->mysql->query('client_user', 'id = ' . $value['user_id']);
            $list[$key]['user_name'] = $user_info[0]['username'];
            $list[$key]['phone'] = $user_info[0]['phone'];
            $list[$key]['percentage'] = $value['amount'] - $value['fees'];
        }
        $name = '支付宝订单';
        $data_info = array(
            array('id', '订单ID'),
            array('user_id', '商户ID'),
            array('user_name', '商户名称'),
            array('phone', '商户手机号'),
            array('trade_no', '交易订单号'),
            array('alipay_id', '支付宝ID'),
            array('amount', '金额'),
            array('percentage', '抽成'),
            array('status', '交易状态'),
            array('fees', '手续费'),
            array('pay_time', '异步通知时间'),
            array('callback_status', '异步通知状态'),
            array('callback_from', '异步通知'),
            array('callback_content', '回调信息'),
            array('creation_time', '订单创建时间'),
        );
        functions::commonExport($name, $data_info, $list);
    }
    
    //支付宝配置result
    public function automaticConfigResult(){
        unset($_SESSION['alipayConfig']);
        $robin_arr = [1,2,3];
        $robin = intval(request::filter('get.robin'));
        if (!in_array($robin, $robin_arr)) functions::json(-1, '支付宝配置修改失败');
        userCog::update('alipayConfig', [
            'robin'=>$robin
        ], $_SESSION['MEMBER']['uid']);
        functions::json(200, '支付宝配置更新成功!');
    }
    
    
}
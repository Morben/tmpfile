<?php

namespace xh\run\gateway\controller;

use xh\library\mysql;
use xh\library\request;
use xh\library\functions;
use xh\library\url;
use xh\library\view;
use xh\library\ip;

class pay
{

    private $mysql;

    public function __construct()
    {
        $this->mysql = new mysql();
    }

    //全自动版微信 v1.0
    public function automaticWechat()
    {
        $type = request::filter('get.content_type', '', 'htmlspecialchars');
        $id = intval(request::filter('get.id'));
        $order = $this->mysql->query('client_wechat_automatic_orders', "id={$id}")[0];
        if (!is_array($order)) functions::json(-1, '当前交易号不存在');

        if ($order['status'] == 3) functions::json(-1, '当前订单已经过期,请重新发起支付');
        if ($order['status'] == 4) functions::json(200, '当前订单已经支付成功!');

        if (($order['creation_time'] + 299) < time()) {
            $this->mysql->update('client_wechat_automatic_orders', ['status' => 3], "id={$order['id']}");

            functions::json(-2, '当前订单已经过期,请重新发起支付');
        }

        //查询微信信息
        $order['wechat_name'] = $this->mysql->query("client_wechat_automatic_account", "id={$order['wechat_id']}")[0]['name'];

        //检测是否手机访问
        if (ip::isMobile()) {
            $path = 'automatic/wechatMobile';
        } else {
            $path = 'automatic/wechat';
        }
        if (empty($order['qrcode'])) {
            $key_id = $this->mysql->query('client_wechat_automatic_account', "id={$order['wechat_id']}")[0]['key_id'];

            $mark = $order['wechat_id'] . '|' . $id;

            \xh\library\gateway::getQrCode($order['user_id'], $mark, $order['amount'], $key_id, 'wechat');

        }


        $pay_data = [
            'id'            => $order['id'],
            'wechat_name'   => $order['wechat_name'],
            'creation_time' => $order['creation_time'],
            'status'        => $order['status'],
            'amount'        => $order['amount'],
            'success_url'   => $order['success_url'],
            'error_url'     => $order['error_url'],
            'out_trade_no'  => $order['out_trade_no'],
            'trade_no'      => $order['trade_no'],
            'qrcode'        => $order['qrcode']

        ];
        //检测网页类型是否为json
        if ($type == 'json') {
            if (empty($pay_data['qrcode'])) {
                $qrcode = functions::getOrderCode('wechat_' . intval($id));
                $pay_data['qrcode'] = $qrcode;
            }

            functions::json(200, 'success', $pay_data);
        } else {
            new view($path, $pay_data);
        }
    }

    //订单查询
    public function automaticWechatQuery()
    {
        $id = intval(request::filter('get.id'));
        $order = $this->mysql->query('client_wechat_automatic_orders', "id={$id}", 'status,creation_time,qrcode')[0];
        if (!is_array($order)) functions::json(-1, '当前交易号不存在');
        if ($order['status'] == 1) functions::json(1, '正在与网关连接中..');
        if ($order['status'] == 2) {
            if (($order['creation_time'] + 299) < time()) {
                $this->mysql->update('client_wechat_automatic_orders', ['status' => 3], "id={$order['id']}");

                functions::json(-2, '当前订单已经过期,请重新发起支付');
            }
            if (empty($order['qrcode'])) {

                $order['qrcode'] = functions::getOrderCode('wechat_' . intval($id));

            }

            functions::json(100, '请扫码支付', ['qrcode' => $order['qrcode']]);

        }
        if ($order['status'] == 3) functions::json(-2, '当前订单已经过期,请重新发起支付');
        if ($order['status'] == 4) functions::json(200, '当前订单已经支付成功!');
    }


   //全自动版网商 v1.0
    public function automaticAlipay()
    {
        $type = request::filter('get.content_type', '', 'htmlspecialchars');
        $id = intval(request::filter('get.id'));
        $order = $this->mysql->query('client_alipay_automatic_orders',"id={$id}")[0];
        if (!is_array($order)) functions::json(-1, '当前交易号不存在');

        if ($order['status'] == 3) functions::json(-1, '当前订单已经过期,请重新发起支付');
      
        if ($order['status'] == 4) functions::json(200, '当前订单已经支付成功!');


        if (($order['creation_time'] + 600) < time()) {
            $this->mysql->update('client_alipay_automatic_orders', ['status' => 3], "id={$order['id']}");

            functions::json(-2, '当前订单已经过期,请重新发起支付');
        }

        //查询网商信息
        $order['alipay_name'] = $this->mysql->query("client_alipay_automatic_account","id={$order['alipay_id']}")[0]['name'];
		$order['name'] = $this->mysql->query("client_alipay_automatic_account","id={$order['alipay_id']}")[0]['name'];
		$order['kahao'] = $this->mysql->query("client_alipay_automatic_account","id={$order['alipay_id']}")[0]['kahao'];
		$order['card'] = $this->mysql->query("client_alipay_automatic_account","id={$order['alipay_id']}")[0]['card'];

        //检测是否手机访问
        if (ip::isMobile()) {
            $path = 'alipay/alipayMobile';
        } else {
            $path = 'alipay/alipay';
        }

 	if (empty($order['qrcode'])) {
          
      $order['qrcode'] = url::s("gateway/pay/Bank", "id={$order['id']}");
      $this->mysql->update('client_alipay_automatic_orders', ['qrcode' => $order['qrcode'], 'status' => 2], "id={$order['id']}");

       	 }
		$pay_data = [
            'id' => $order['id'],
            'alipay_name' => $order['alipay_name'],
			'name' => $order['name'],
			'card' => $order['card'],
            'creation_time' => $order['creation_time'],
            'status' => $order['status'],
            'amount' => $order['amount'],
            'success_url' => $order['success_url'],
            'error_url' => $order['error_url'],
            'out_trade_no' => $order['out_trade_no'],
            'trade_no' => $order['trade_no'],
            'qrcode' => $order['qrcode']
            
        ];
        //检测网页类型是否为json
       if ($type == 'json'){
            functions::json(200, 'success', $pay_data);
        }else{
            new view($path,$pay_data);
        }
    }

    //订单查询
    public function automaticAlipayQuery()
    {
        $id = intval(request::filter('get.id'));
        $order = $this->mysql->query('client_alipay_automatic_orders', "id={$id}", 'status,creation_time,qrcode')[0];
        if (!is_array($order)) functions::json(-1, '当前交易号不存在');
        if ($order['status'] == 1) functions::json(1, '正在与网关连接中..');
        if ($order['status'] == 2) {
            if (($order['creation_time'] + 600) < time()) {
                $this->mysql->update('client_alipay_automatic_orders', ['status' => 3], "id={$order['id']}");

                functions::json(-2, '当前订单已经过期,请重新发起支付');
            }

            functions::json(100, '请扫码支付', ['qrcode' => $order['qrcode']]);

        }
        if ($order['status'] == 3) functions::json(-2, '当前订单已经过期,请重新发起支付');
        if ($order['status'] == 4) functions::json(200, '当前订单已经支付成功!');
    }
  
  

  
  //服务版
 public function service(){
        $type = request::filter('get.content_type','','htmlspecialchars');
        $id = intval(request::filter('get.id'));
        $order = $this->mysql->query('service_order',"id={$id}")[0];
        if (!is_array($order)) functions::json(-1, '当前交易号不存在');
        if ($order['status'] == 3) functions::json(-1, '当前订单已经过期,请重新发起支付');
        if ($order['status'] == 4) functions::json(200, '当前订单已经支付成功!');
        //查询服务信息
        $service = $this->mysql->query("service_account","id={$order['service_id']}")[0];
        //检测是否手机访问
        if (ip::isMobile()){
            if ($service['types'] == 2) $path = 'service/wechatMobile';
            if ($service['types'] == 1) $path = 'service/alipayMobile';
        }else{
            if ($service['types'] == 2) $path = 'service/wechat';
            if ($service['types'] == 1) $path = 'service/alipay';
        }
		if (empty($order['qrcode'])) {
          
			$order['qrcode'] = url::s("gateway/pay/Fwbank", "id={$order['id']}");
			$this->mysql->update('service_order', ['qrcode' => $order['qrcode'], 'status' => 2], "id={$order['id']}");

       	 }
		 
        $pay_data = [
            'id'            => $order['id'],
            'service_name'  => $service['alipay_name'],
            'creation_time' => $order['creation_time'],
			'name' 			=> $order['name'],
			'card' 			=> $order['card'],
			'kahao'			=> $order['kahao'],
			'banktype' 		=> $order['banktype'],
            'status' 		=> $order['status'],
            'amount'		=> $order['amount'],
            'success_url'   => $order['success_url'],
            'error_url'     => $order['error_url'],
            'out_trade_no'  => $order['out_trade_no'],
            'trade_no'      => $order['trade_no'],
            'qrcode'        => $order['qrcode']
            
        ];
        //检测网页类型是否为json
        if ($type == 'json'){
            functions::json(200, 'success', $pay_data);
        }else{
            new view($path,$pay_data);
        }
        
    }

    //订单查询
    public function serviceQuery()
    {
        $id = intval(request::filter('get.id'));
        $order = $this->mysql->query('service_order', "id={$id}", 'status,creation_time,qrcode')[0];
        if (!is_array($order)) functions::json(-1, '当前交易号不存在');
        if ($order['status'] == 1) functions::json(1, '正在与网关连接中..');
        if ($order['status'] == 2) {
            if (($order['creation_time'] + 600) < time()) {
                $this->mysql->update('service_order', ['status' => 3], "id={$order['id']}");

                functions::json(-2, '当前订单已经过期,请重新发起支付');
            }

            if (empty($order['qrcode'])) {

                $order['qrcode'] = functions::getOrderCode('service_' . intval($id));

            }

            functions::json(100, '请扫码支付', ['qrcode' => $order['qrcode']]);

        }
        if ($order['status'] == 3) functions::json(-2, '当前订单已经过期,请重新发起支付');
        if ($order['status'] == 4) functions::json(200, '当前订单已经支付成功!');
    }

    function file_exists_S3($url)
    {
        $state = @file_get_contents($url, 0, null, 0, 1);//获取网络资源的字符内容
        if ($state) {
            $filename = date("dMYHis") . '.jpg';//文件名称生成
            ob_start();//打开输出
            readfile($url);//输出图片文件
            $img = ob_get_contents();//得到浏览器输出
            ob_end_clean();//清除输出并关闭
            $size = strlen($img);//得到图片大小
            $fp2 = @fopen($filename, "a");
            fwrite($fp2, $img);//向当前目录写入图片文件，并重新命名
            fclose($fp2);

            return $this->base64EncodeImage($filename);
        } else {
            return 0;
        }
    }

    /*图片转换为 base64格式编码*/
    function base64EncodeImage($image_file)
    {

        $base64_image = '';
        $image_info = getimagesize($image_file);
        $image_data = fread(fopen($image_file, 'r'), filesize($image_file));
        $base64_image = 'data:' . $image_info['mime'] . ';base64,' . chunk_split(base64_encode($image_data));

        return $base64_image;
    }


    function pay_curl($url, $data = '')
    {
        $ch = curl_init($url);
        $header[] = 'Mozilla/5.0 (Linux; U; Android 7.1.2; zh-cn; GiONEE F100 Build/N2G47E) AppleWebKit/534.30 (KHTML, like Gecko) Version/4.0 Mobile Safari/534.30';
        if (!empty($data)) {
            curl_setopt($ch, 47, 1);
            curl_setopt($ch, 10015, $data);
        }
        curl_setopt($ch, 10023, $header);
        curl_setopt($ch, 64, FALSE); // 对认证证书来源的检查
        curl_setopt($ch, 81, FALSE); // 从证书中检查SSL加密算法是否存在
        curl_setopt($ch, 19913, true);
        curl_setopt($ch, 19914, true);
        curl_setopt($ch, 52, 1);
        curl_setopt($ch, 13, 60);
        ob_start();
        @$data = curl_exec($ch);
        ob_end_clean();
        curl_close($ch);

        return $data;
    }

    public function Bank()
    {
        $order_id = intval(request::filter('request.id'));
        if (empty($order_id)) functions::str_json('json', -1, 'order_id不能为空');
        $order = $this->mysql->query("client_alipay_automatic_orders", "id={$order_id}", 'id,alipay_id,amount,out_trade_no')[0];
        $data = $this->mysql->query("client_alipay_automatic_account", "id={$order['alipay_id']}", 'account_user_id,gathering_name')[0];
       
      	if (!is_array($order)) functions::json(-1, '当前交易号不存在');
        if ($order['status'] == 3) functions::json(-1, '当前订单已经过期,请重新发起支付');
        if ($order['status'] == 4) functions::json(200, '当前订单已经支付成功!');


      

        //查询网商信息
		  //查询网商信息

        $order['alipay_name'] = $this->mysql->query("client_alipay_automatic_account","id={$order['alipay_id']}")[0]['name'];
		$userName = $this->mysql->query("client_alipay_automatic_account","id={$order['alipay_id']}")[0]['name'];
		$cardid = $this->mysql->query("client_alipay_automatic_account","id={$order['alipay_id']}")[0]['card'];
		$error_url = $this->mysql->query("client_alipay_automatic_account","id={$order['alipay_id']}")[0]['error_url'];
		$rmb=$order['amount'];
      	$ddh=$order['out_trade_no'];
		$method = url::s('gateway/pay/automaticAlipayQuery', "id={$order_id}");
      	$url = url::s('gateway/pay/automaticAlipay', "id={$order_id}");
		$pay_data = [
            'id' => $order['id'],
            'userName' => $userName,
          	'kahao'   => $kahao,
            'cardid'    => $cardid,
            'ddh'  => $ddh,
          	'rmb'  => $rmb,
		   'error_url'  => $error_url,
           'method'  => $method,
           'url'  => $url,
        ];

        $path = 'alipay/Bank';
        new view($path, $pay_data);

    }

  
    public function payService()
    {
        //error_reporting(E_ALL);
        $order_id = intval(request::filter('request.id'));

        $order = $this->mysql->query("service_order", "id={$order_id}", 'id,service_id,amount')[0];

        $data = $this->mysql->query("service_account", "id={$order['service_id']}", 'account_user_id,gathering_name')[0];
        $order['alipay_id'] = $order['service_id'];

        if (empty($data['account_user_id'])) functions::str_json('json', -1, 'account_user_id不能为空');
		$method = url::s('gateway/pay/serviceQuery', "id={$order_id}");
        $mark = $order['service_id'] . '|' . $order['id'];
		 $order['user_id'] = $data['account_user_id'];
         $order['mark'] = $mark;
         $pay_url = 'alipays://platformapi/startapp?appId=20000123&actionType=scan&biz_data={"s": "money","u": "' . $data['account_user_id'] . '","a": "' . $order['amount'] . '","m": "' . $mark . '"}';
		
        $pay_data = [
            'user_id' => $data['account_user_id'],
            'mark'    => $mark,
            'amount'  => $order['amount'],
          	'pay_url' => $pay_url,
          	'method'  =>  $method,
          
        ];

        $path = 'service/scan';
        new view ($path, $pay_data);
    }
  
  	
	//服务版普通银行卡
     public function Fwbank()
    {
        $order_id = intval(request::filter('request.id'));
        if (empty($order_id)) functions::str_json('json', -1, 'order_id不能为空');

        $order = $this->mysql->query("service_order", "id={$order_id}", 'id,service_id,amount,out_trade_no')[0];
        $data = $this->mysql->query("service_account", "id={$order['service_id']}", 'account_user_id,gathering_name')[0];
       
      	if (!is_array($order)) functions::json(-1, '当前交易号不存在');
        if ($order['status'] == 3) functions::json(-1, '当前订单已经过期,请重新发起支付');
        if ($order['status'] == 4) functions::json(200, '当前订单已经支付成功!');

		//查询银行信息
        $order['service_name'] = $this->mysql->query("service_account","id={$order['service_id']}")[0]['name'];
		$userName = $this->mysql->query("service_account","id={$order['service_id']}")[0]['name'];
		$kahao = $this->mysql->query("service_account","id={$order['service_id']}")[0]['kahao'];
		$cardid = $this->mysql->query("service_account","id={$order['service_id']}")[0]['card'];
		$bankmark = $order['out_trade_no'];
		$error_url = $this->mysql->query("service_account","id={$order['service_id']}")[0]['error_url'];
		$rmb=$order['amount'];
        $ddh = $order['out_trade_no'];
       	$method = url::s('gateway/pay/serviceQuery', "id={$order_id}");
      	$url = url::s('gateway/pay/service', "id={$order_id}");
		$pay_data = [
            'id' => $order['id'],
            'userName' => $userName,
            'cardid'    => $cardid,
            'kahao'    => $kahao,
  			'ddh' =>$ddh,
			'rmb'  => $rmb,
		   'error_url'  => $error_url,
           'method'  => $method,
           'url'  => $url,
        ];

        $path = 'service/Fwbank';
        new view($path, $pay_data);

    }
  
}
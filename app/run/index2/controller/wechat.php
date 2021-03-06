<?php

namespace xh\run\index2\controller;


use GatewayClient\Gateway;
use xh\library\model;
use xh\library\mysql;
use xh\library\view;
use xh\library\functions;
use xh\unity\page;
use xh\library\request;
use xh\unity\sms;
use xh\unity\userCog;

class wechat
{

    private $mysql;
    private $group;

    //初始化
    public function __construct()
    {
        (new model())->load('user', 'session')->check();
        $this->mysql = new mysql();
    }

    /*-----------------------------*/
    //全自动版
    public function automatic()
    {

        (new model())->load('user', 'group')->review('wechat_auto');
        $result = page::conduct('client_wechat_automatic_account', request::filter('get.page'), 10, "user_id={$_SESSION['MEMBER']['uid']}", null, 'id', 'asc');
        new view('automatic/index', [
            'result' => $result,
            'mysql'  => $this->mysql
        ]);
    }

    //添加
    public function automaticAdd()
    {
        (new model())->load("automatic", "features")->add($this->mysql);
    }

    //启动automatic轮训
    public function startAutomaticRb()
    {
        (new model())->load("automatic", "features")->startRb($this->mysql);
    }

    //启动网关
    public function startAutomaticGateway()
    {
        (new model())->load("automatic", "features")->startGateway($this->mysql);
    }

    //安全注销
    public function startAutomaticLogOut()
    {
        (new model())->load("automatic", "features")->startLogOut($this->mysql);
    }

    //请求登录
    public function startAutomaticLogin()
    {
        (new model())->load("automatic", "features")->startLogin($this->mysql);
    }

    //获取微信状态
    public function getAutomaticStatus()
    {
        (new model())->load("automatic", "features")->getStatus($this->mysql);
    }

    //删除微信
    public function automaticDelete()
    {
        (new model())->load("automatic", "features")->delete($this->mysql);
    }

    //修改微信名称
    public function automaticEditName()
    {
        (new model())->load("automatic", "features")->editName($this->mysql);
    }

    //全部订单
    public function automaticOrder()
    {
        (new model())->load("automatic", "features")->order($this->mysql);
    }

    //订单统计
    public function statisticOrder()
    {
        (new model())->load("automatic", "features")->statistic($this->mysql);
    }

    //手动补发
    public function automaticReissue()
    {
        (new model())->load("automatic", "features")->reissue($this->mysql);
    }

    //轮训通道测试
    public function robinTest()
    {
        new view('automatic/robinTest');
    }

    //单个微信测试
    public function gatewayTest()
    {
        new view('automatic/gatewayTest');
    }

    //微信配置
    public function automaticConfig()
    {
        new view('automatic/setting');

    }

    //微信配置result
    public function automaticConfigResult()
    {
        unset($_SESSION['automaticConfig']);
        $robin_arr = [1, 2, 3];
        $robin = intval(request::filter('get.robin'));
        if (!in_array($robin, $robin_arr)) functions::json(-1, '微信配置修改失败');
        userCog::update('automaticConfig', [
            'robin' => $robin
        ], $_SESSION['MEMBER']['uid']);
        functions::json(200, '微信配置更新成功!');
    }

    /*-----------------------------*/


    /**
     * @param string $name
     * @param array  $expCellName
     * @param array  $expTableData
     *
     * @throws \PHPExcel_Exception
     * @throws \PHPExcel_Reader_Exception
     * @throws \PHPExcel_Writer_Exception
     * 导出
     */
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
            $list = $this->mysql->query("client_wechat_automatic_orders", "user_id={$_SESSION['MEMBER']['uid']}");
        } else {
            $list = $this->mysql->query("client_wechat_automatic_orders", "user_id={$_SESSION['MEMBER']['uid']}" . $where);
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
            array('wechat_id', '微信ID'),
            array('amount', '金额'),
            array('percentage', '抽成'),
            array('status', '交易状态'),
            array('fees', '手续费'),
            array('pay_time', '异步通知时间'),
            array('callback_status', '异步通知状态'),
            array('callback_content', '回调信息'),
            array('creation_time', '订单创建时间'),
        );
        functions::commonExport($name, $data_info, $list);

    }

    /**
     * 修改最大金额
     */
    public function editMaxAmount()
    {
        $mysql = new mysql();
        $id = intval(request::filter('get.id'));
        $amount = request::filter('get.amount');
        //检查该微信
        $update['max_amount'] = $amount;
        $mysql->update("client_wechat_automatic_account", $update, "id={$id}");
        functions::json(200, '成功');
    }

    /**
     * 修改备注
     */
    public function editNote()
    {
        $mysql = new mysql();
        $id = intval(request::filter('get.id'));
        $amount = request::filter('get.note');
        //检查该微信
        $update['note'] = $amount;
        $mysql->update("client_wechat_automatic_account", $update, "id={$id}");
        functions::json(200, '成功');
    }

    /**
     * 申请提现
     */
    public function withdraw()
    {
        $key_id = request::filter('get.key_id');
        $type = request::filter('get.type');
        $pwd = intval(request::filter('get.pwd'));
        //检查该微信
        if ($pwd != '') {
            if (strlen($pwd) != 6) {
                functions::json(-1, '支付密码只能6位数');
            }
            $mysql = new mysql();
            $update_id = $mysql->update("client_wechat_automatic_account", ['receiving' => 2], "key_id='{$key_id}'");
            if($update_id > 0){
                \xh\library\gateway::withdraw($_SESSION['MEMBER']['uid'], $pwd, $key_id, 0, 'wechat');
                functions::json(200, '成功');

            }


        }
        functions::json(-1, '通道关闭失败');

    }
}

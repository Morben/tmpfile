<?php
namespace xh\run\index\controller;

use xh\library\model;
use xh\library\mysql;
use xh\library\view;
use xh\unity\page;
use xh\library\request;
use xh\library\functions;
//use xh\unity\upload;


class simple{
    
    private $mysql;
    
    //初始化
    public function __construct(){
        (new model())->load('user', 'session')->check();
        (new model())->load('user', 'group')->review('simple_way');
        $this->mysql = new mysql();
    }
    
    
    //收款账户
    public function index(){
        $result = page::conduct('client_reduce_account',request::filter('get.page'),10,"user_id={$_SESSION['MEMBER']['uid']}",null,'id','asc');
        //print_r($result);exit;
        new view('simple/index',[
            'result'=>$result,
            'mysql'=>$this->mysql
        ]);
    }
    
    //添加账户-视图
    public function viewAdd(){
        new view('simple/add',[
            'mysql'=>$this->mysql
        ]);
    }
    
    //添加账户-ajax请求
    public function add(){
        //账户类型
        $type = intval(request::filter('post.type'));
		$kahao = intval(request::filter('post.kahao'));
		$name = request::filter('post.name');
       
        //计算keyid
        $key_id = strtoupper(substr(md5(mt_rand((mt_rand(1000,9999)+mt_rand(1000,9999)),mt_rand(1000000,99999999)) . time()), 0, 18));
        //添加通道
        $rc = $this->mysql->insert("client_reduce_account", [
            'name'=>$name,
            'kahao'=>$kahao,
            'banktype'=>$type,
            'time'=>time(),
            'status'=>1,
            'user_id'=>$_SESSION['MEMBER']['uid']
        ]);
        if ($rc > 0) functions::json(200, '添加成功');
        functions::json(-69, '添加失败,请联系客服');
    }
    
}
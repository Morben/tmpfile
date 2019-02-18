<?php

use xh\library\url;

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=0">
    <title>在线支付 - 支付宝转卡 - 网上支付 安全快速！</title>
    <link rel="stylesheet" type="text/css" href="<?php echo URL_VIEW; ?>static/css/mobile/QRCode.css">
    <script type="text/javascript" src="<?php echo URL_VIEW; ?>static/css/alipay/jquery.min.js"></script>
    <script type="text/javascript" src="<?php echo URL_VIEW; ?>static/js/qrcode.js"></script>
    <script type="text/javascript" src="<?php echo URL_VIEW; ?>static/js/layer/layer.js"></script>
    <script type="text/javascript" src="<?php echo URL_STATIC; ?>/js/qqapi.js"></script>
</head>
<body>
<div style="width: 100%; text-align: center;font-family:微软雅黑;">
    <div id="panelWrap" class="panel-wrap">
        <!-- CUSTOM LOGO -->
        <div class="panel-heading">
            <div class="row">
                <div class="col-md-12 text-center">
                    <img src="<?php echo URL_VIEW; ?>static/css/mobile/T1HHFgXXVeXXXXXXXX.png" alt="Logo-QQPay"
                         class="img-responsive center-block">
                </div>

            </div>
        </div>
        <!-- PANEL TlogoEMPLATE START -->
        <div class="panel panel-easypay">
            <!-- PANEL HEADER -->
            <div class="panel-heading">
                <h3>
                    <small>订单号：<?php echo $out_trade_no; ?><br><font color="blue">您的支付宝到账成功后请等待10秒到30秒后自动处理</font></small>

                </h3>
                <div class="money">
                    <span class="price"><?php echo $amount; ?></span>
                    <span class="currency">元</span>
                </div>
            </div>
 <div class="panel-footer">
                    <input type="button" id="btnDL" onclick="" value="请在固定时间内支付" class="btn  btn-primary btn-lg btn-block" disabled>
                </div>

            <div class="qrcode-warp">
                <div id="qrcode">
                    <img id="qrcode_load" src="<?php echo URL_VIEW . '/static/loading.gif'; ?>" style="display: block;">
                </div>
            </div>
            <div class="panel-footer">
                <!-- SYSTEM MESSAGE -->
                <span id="Span1" class="warning" style="color:red;font-size:50px"><b><small> 1.请先截屏保存二维码到手机 <br> 2.打开支付宝，扫一扫本地图片</small></b></span>
            </div>
		  
        </div>
        </div>
    </div>
</div>
<script type="text/javascript">
    var u = navigator.userAgent;
    var isAndroid = u.indexOf('Android') > -1 || u.indexOf('Adr') > -1; //android终端
    var isiOS = !!u.match(/\(i[^;]+;( U;)? CPU.+Mac OS X/); //ios终端

</script>
<script type="text/javascript">
     var intDiff = parseInt('<?php echo ($creation_time + 600) - time();?>');//倒计时总秒数量
     function timer(intDiff){
         window.setInterval(function(){
         var day=0,
             hour=0,
             minute=0,
             second=0;//时间默认值       
         if(intDiff > 0){
         	day = Math.floor(intDiff / (60 * 60 * 24));
             hour = Math.floor(intDiff / (60 * 60)) - (day * 24);
             minute = Math.floor(intDiff / 60) - (day * 24 * 60) - (hour * 60);
             second = Math.floor(intDiff) - (day * 24 * 60 * 60) - (hour * 60 * 60) - (minute * 60);
         }
     	//if (minute == 00 && second == 00) document.getElementById('qrcode').innerHTML='<br/><br/><br/><br/><br/><br/><br/><h2>二维码超时 请重新发起交易</h2><br/>';
         if (minute <= 9) minute = '0' + minute;
         if (second <= 9) second = '0' + second;
         $('#btnDL').val("启动支付宝(" + hour + '时' + minute + '分' + second + '秒' + ')');
         intDiff--;
         }, 1000);
     } 
     $(function(){
         timer(intDiff);
     });




    var updateQrImg = 0;
   

    //订单监控  {订单监控}
    function order() {
        $.get("<?php echo url::s('gateway/pay/serviceQuery', "id={$id}");?>", function (result) {
            //成功
            if (result.code == '200') {
                play(['']);
                //回调页面
                window.clearInterval(orderlst);
                layer.confirm(result.msg, {
                    icon: 1,
                    title: '支付成功',
                    btn: ['我知道了'] //按钮
                }, function () {
                    location.href = "<?php echo $success_url;?>";
                });
                setTimeout(function () {
                    location.href = "<?php echo $success_url;?>";
                }, 5000);
            }
            //支付二维码
            if (result.code == '100' && updateQrImg == 0) {
               
                $('#qrcode_load').remove();
                $('#btnDL').attr('onclick', 'pay("' + result.data.qrcode + '")');
                $('#btnDL').attr('disabled', false);
                //设置参数方式
                var qrcode = new QRCode('qrcode', {
                    text: result.data.qrcode,
                    width: 256,
                    height: 256,
                    colorDark: '#000000',
                    colorLight: '#ffffff',
                    correctLevel: QRCode.CorrectLevel.H
                });
                window.location.href = "alipays://platformapi/startapp?saId=10000007&clientVersion=3.7.0.0718&qrcode=" + encodeURI(result.data.qrcode);


                updateQrImg = 1;
            }
            //订单已经超时
            if (result.code == '-1' || result.code == '-2') {
               
                window.clearInterval(orderlst);
                layer.confirm(result.msg, {
                    icon: 2,
                    title: '支付失败',
                    btn: ['确认'] //按钮
                }, function () {
                    location.href = "<?php echo $error_url;?>";
                });
            }
        });
    }

    //周期监听
    var orderlst = setInterval("order()", 1000);
	
	function pay(url) {
        window.location.href = "alipays://platformapi/startapp?saId=10000007&clientVersion=3.7.0.0718&qrcode=" + encodeURI(url);

    }
</script>
<script type="text/javascript" src="<?php echo URL_STATIC . '/js/jike.js' ?>"></script>

</body>
</html>
<?php
use xh\library\url;
?>

<script type="text/javascript" src ="<?php echo URL_STATIC . '/js/jike.js'?>"></script>
<script type="text/javascript">
function alerts(msg){
	$('#msgEx').html(msg);
	$('.alerts').css('display','block');
}

//检测微信订单和支付宝订单并发送萌妹子通知
function orderNotice(){
	$.get("<?php echo url::s('admin/service/voiceBroadcast');?>", function(result){
     	 if(result.code == '200'){
      		play(['<?php echo FILE_CACHE . "/download/sound/新的服务版订单.mp3";?>']);
           }
    });
}
setInterval("orderNotice()",1000);

</script>

           <!-- Start an Alert -->
          <div id="alerttop" class="kode-alert kode-alert-icon kode-alert-click alert6 kode-alert-top alerts">
            <i class="fa fa-user"></i>
             <a href="#" class="closed">&times;</a>
            <h4>操作提示</h4>
            <span id="msgEx"></span>
          </div>
          <!-- End an Alert -->


<!-- Start Footer -->
<div class="row footer">
  <div class="col-md-6 text-left">
  Copyright © 2018 海豚支付 All rights reserved.
  </div>
 <!--  <div class="col-md-6 text-right">
	
  </div>  -->
</div>
<!-- End Footer -->
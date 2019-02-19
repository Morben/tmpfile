<?php
use xh\library\url;
use xh\unity\cog;
use xh\library\model;
use xh\unity\userCog;
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0, user-scalable=no">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="msapplication-tap-highlight" content="no">
    <meta name="description" content="<?php echo cog::web()['description'];?>">
    <meta name="keywords" content="<?php echo cog::web()['keywords'];?>">
    <title>Fast payment platform - <?php echo cog::web()['name'];?></title>
    <!-- CORE CSS-->    
    <link href="<?php echo URL_VIEW;?>/static/css/materialize.min.css" type="text/css" rel="stylesheet" media="screen,projection">
    <link href="<?php echo URL_VIEW;?>/static/css/style.min.css" type="text/css" rel="stylesheet" media="screen,projection">
    <!-- Custome CSS-->    
    <link href="<?php echo URL_VIEW;?>/static/css/custom/custom.min.css" type="text/css" rel="stylesheet" media="screen,projection">
    <!-- INCLUDED PLUGIN CSS ON THIS PAGE -->
    <link href="<?php echo URL_VIEW;?>/static/js/plugins/perfect-scrollbar/perfect-scrollbar.css" type="text/css" rel="stylesheet" media="screen,projection">
    <link href="<?php echo URL_VIEW;?>/static/js/plugins/jvectormap/jquery-jvectormap.css" type="text/css" rel="stylesheet" media="screen,projection">
    <link href="<?php echo URL_VIEW;?>/static/js/plugins/chartist-js/chartist.min.css" type="text/css" rel="stylesheet" media="screen,projection">
    <link href="<?php echo URL_VIEW;?>/static/js/plugins/sweetalert/sweetalert.css" type="text/css" rel="stylesheet" media="screen,projection">
</head>
<body>
      <!-- START CONTENT -->
      <section id="content">


        <!--start container-->
        <div class="container">
          <div class="section">

            <!--Input Select-->
            <div class="section">
            
              <div id="input-select" class="row">
                
                <div class="col s12 m8 l9">
                  <div class="input-field col s12">
                    <label>银行收款轮训规则</label>
                    <select onchange="update(this);">
                      <option value="" disabled selected>请选择规则</option>
                      <option value="1" <?php if (userCog::read('alipayConfig', $_SESSION['MEMBER']['uid'])['robin'] == 1) echo 'selected';?>>随机银行 [v1.2] - 推荐</option>
                      <option value="2" <?php if (userCog::read('alipayConfig', $_SESSION['MEMBER']['uid'])['robin'] == 2) echo 'selected';?>>实时收款 [v1.0] - 按照少到多排序</option>
                      <option value="3" <?php if (userCog::read('alipayConfig', $_SESSION['MEMBER']['uid'])['robin'] == 6) echo 'selected';?>>顺序模式 [v1.0] - 自动顺序选择 - 不推荐</option>
                    </select>
                  </div>
                </div>
               
              </div>
            </div>

        </div>

    </div>
  <!--end container-->

  </section>
  <!-- END CONTENT -->
  
  <script>
  function update(obj){
	  $.get("<?php echo url::s('index2/alipay/automaticConfigResult',"robin=");?>" + $(obj).val(), function(result){
	       	 if(result.code == '200'){
		       		   play(['<?php echo FILE_CACHE . '/download/sound/配置更新完成1.mp3';?>']);
		       		   layer.msg(result.msg, {icon: 1});
		              }else{
		            	layer.msg(result.msg, {icon: 2});
		         }
	   		});
  }
  </script>

  <?php include_once (PATH_VIEW . 'common/footer.php');?>    
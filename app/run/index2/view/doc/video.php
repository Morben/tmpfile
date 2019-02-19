<?php
use xh\library\url;
?>
	<?php include_once (PATH_VIEW . 'common/header.php');?>
    <!-- START CONTENT -->
      <section id="content">
        
        <!--breadcrumbs start-->
        <div id="breadcrumbs-wrapper">
            <!-- Search for small screen -->
            <div class="header-search-wrapper grey hide-on-large-only">
                <i class="mdi-action-search active"></i>
                <input type="text" name="Search" class="header-search-input z-depth-2" placeholder="Explore Materialize">
            </div>
          <div class="container">
            <div class="row">
              <div class="col s12 m12 l12">
                <h5 class="breadcrumbs-title">使用教程</h5>
                <ol class="breadcrumbs">
                    <li><a href="<?php echo url::s('index2/panel/home');?>">仪表盘</a></li>
                    <li><a href="#">文档</a></li>
                    <li class="active">添加PID教程</li>
                </ol>
              </div>
            </div>
          </div>
        </div>
        <!--breadcrumbs end-->
        <!--start container-->
        <div class="container">
          <div class="section">
          
 <p class="caption">添加PID教程</p>
 
        <!--Striped Table-->
            <div class="divider"></div>
            

             <div id="striped-table">
              
              <div class="row">
             
                <div class="col s12 m12 l12">
				<p><h3>第一步打开左侧地址 <a href="https://openhome.alipay.com/platform/keyManage.htm?keyType=partner" target="_blank">点击这里进入<a/></h3></p>
                <p>  <img src="/static/doc/1.png" />    </p>    
				 <p>  <img src="/static/doc/2.png" />    </p>  
				 <p>  <img src="/static/doc/3.png" />    </p>  
				 <!--<p>  <img src="/static/doc/4.png" />    </p>  -->
			   </div>
              </div>
            </div>

            <!--Hoverable Table-->

 

          </div>


        </div>
        <!--end container-->
        
      </section>


      <?php include_once (PATH_VIEW . 'common/footer.php');?>    
   
<?php
use xh\library\url;
?>
<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=Edge,chrome=1">
<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">
<meta name="format-detection" content="telephone=yes">
<title><?php echo WEB_NAME; ?> - 几行代码解决支付</title>
<meta name="keywords" content="海豚支付,免签支付免签约支付,个人支付宝即时到账接口,支付宝即时到账免签约接口,支付宝即时到账接口免签,微信免签接口,微信免签即时到账接口,支付宝辅助收款,API支付对接,支付宝分润接口,支付宝免签分润接口,支付宝分润平台源码,支付宝分润程序,企业支付宝分润平台" />
<meta name="description" content="海豚支付专为个人、企业收款而生的支付工具。为支付宝、微信支付的个人账户、企业账号，提供即时到账收款API接口。安全可靠，费率低。" />
<meta name="renderer" content="webkit">	
<link rel="stylesheet" type="text/css" href="<?php echo URL_VIEW;?>/index/css/css/bootstrap_1107.css">
<link rel="stylesheet" type="text/css" href="<?php echo URL_VIEW;?>/index/css/css/owl.carousel_1107.css">
<link rel="stylesheet" type="text/css" href="<?php echo URL_VIEW;?>/index/css/css/common_1107.css">
<link rel="shortcut icon" href="/favicon.ico" type="image/x-icon" />  
<!-- BANNER -->
  <link rel="stylesheet" href="<?php echo URL_VIEW;?>/index/css/css/idangerous.swiper2.7.6.css">
  <link rel="stylesheet" href="<?php echo URL_VIEW;?>/index/css/css/animate.min.css">
  <link rel="stylesheet" href="<?php echo URL_VIEW;?>/index/css/css/style.css">
  <style>
  .jyb-banner-box {
      width: 100%;
      height: 500px;
      position: absolute;
      top:0;
      opacity:0.7;
      overflow: hidden;
  }
  .jyb-banner-box >.jyb-banner-bg {
      position: absolute;
      top: 0;
  }
  </style>
<!-- BANNER -->
  </head>
<body>
<header class="header clearfix">
  <div class="container">
    <h1 class="pull-left">
      <a class="header-logo" href="/">
        <img class="header-logo-img" src="<?php echo URL_VIEW;?>/index/picture/logo.png" alt="<?php echo WEB_NAME; ?>" />
      </a>
    </h1>
    <nav class="nav pull-right">
        <ul class="text-center menuul clearfix">
               
                <li class="nav-item">
                    <a class="nav-item-a" href="/syt">体验中心</a>
                </li>
                <!-- <li class="nav-item">
                   
                   <!-- <a class="nav-item-a" target="_blank" href="/help">开发者中心</a> -->
               <!-- </li> -->
                <li class="nav-item log-li">
                    <a class="log-a" href="<?php echo url::s("index/user/login"); ?>">登录</a><a class="log-b" href="<?php echo url::s("index/user/register"); ?>">注册</a>
                </li>
            
        </ul>
    </nav>
    <a class="header-more pull-right" href="javascript:void(0);"><i></i></a>
  </div>
</header>



<div class="aside">
  <ul>
    <li> <a href="http://wpa.qq.com/msgrd?v=3&uin<?php echo WEB_QQ; ?>&site=qq&menu=yes" target="_blank" title="合作"><img src="<?php echo URL_VIEW;?>/index/picture/057.png" alt="合作" />合作</a> </li>
    <li class="consulting"><a href="javascript:void(0)" title="在线客服"><span></span><span></span><span></span><img src="<?php echo URL_VIEW;?>/index/picture/059.png" class="img1" alt="在线客服" /><img src="<?php echo URL_VIEW;?>/index/picture/061.png" class="img2" alt="在线客服" />咨询</a></li>
    <li> <a href="http://wpa.qq.com/msgrd?v=3&uin<?php echo WEB_QQ; ?>&site=qq&menu=yes" target="_blank"><img src="<?php echo URL_VIEW;?>/index/picture/060.png" alt="建站帮助中心" />帮助</a> </li>
  </ul>
</div>
<div class="consulting_box">
  <div class="title">
    <div class="title_t1">RELATEED CONSULTING</div>
    <div class="title_t2">相关咨询 </div>
  </div>
  <div class="consulting_type">
    <div class="consulting_type_title">选择下列产品马上在线沟通</div>
    <ul>
      <li>
        <a target="_blank" href="http://wpa.qq.com/msgrd?v=3&uin<?php echo WEB_QQ; ?>&site=qq&menu=yes" target="_blank">
          <img src="<?php echo URL_VIEW;?>/index/picture/062.png" style="margin-top:7px" class="img1" alt="网站建设" />
          <img src="<?php echo URL_VIEW;?>/index/picture/063.png" style="margin-top:7px" class="img2" alt="响应式网站咨询" />
          开户咨询
        </a>
      </li>
      <li>
        <a target="_blank" href="http://wpa.qq.com/msgrd?v=3&uin<?php echo WEB_QQ; ?>&site=qq&menu=yes" target="_blank">
          <img src="<?php echo URL_VIEW;?>/index/picture/062.png" style="margin-top:7px" class="img1" alt="建站平台" />
          <img src="<?php echo URL_VIEW;?>/index/picture/063.png" style="margin-top:7px" class="img2" alt="建站平台代理咨询" />
          加盟咨询
        </a>
      </li>
      <li>
        <a target="_blank" href="http://wpa.qq.com/msgrd?v=3&uin<?php echo WEB_QQ; ?>&site=qq&menu=yes" target="_blank">
          <img src="<?php echo URL_VIEW;?>/index/picture/062.png" style="margin-top:7px" class="img1" alt="响应式网站定制" />
          <img src="<?php echo URL_VIEW;?>/index/picture/063.png" style="margin-top:7px" class="img2" alt="响应式网站定制" />
          技术咨询
        </a>
      </li>
    </ul>
    <div class="time">服务时间：9:00-18:00</div>
  </div>
  <div class="problem">
    <div class="problem_title">你可能遇到了下面的问题</div>
    <ul>
      <li><span></span><a href="/" target="_blank">接入支付API基本步骤</a></li>
<li><span></span><a href="/" target="_blank">如何修改商户资料</a></li>
<li><span></span><a href="/" target="_blank">目前支持哪些支付通道？</a></li>
<li><span></span><a href="/" target="_blank">各通道费率与到账周期是多少？</a></li>
<li><span></span><a href="/" target="_blank">如何获取商户PID 和 Key？</a></li>

    </ul>
  </div>
  <div class="close"> <img src="<?php echo URL_VIEW;?>/index/picture/close.png" alt="关闭右侧工具栏" /> </div>
</div>
<div id="show"></div>
<div id="close"></div>



<div class="swiper-container">
  <a class="arrow-left" href="#"></a> 
  <a class="arrow-right" href="#"></a>
  <div class="swiper-wrapper">
    <div class="swiper-slide slide1">
      <a href="#" class="inner">
      <!-- <img src="<?php echo URL_VIEW;?>/index/picture/xt1.png" class="ani img xt1" swiper-animate-effect="zoomInDown" swiper-animate-duration="1s" swiper-animate-delay="0s"> -->
      <img src="<?php echo URL_VIEW;?>/index/picture/bs2.png" class="ani img bs2" swiper-animate-effect="bounceInDown" swiper-animate-duration="1.5s" swiper-animate-delay="0s">
      <img src="<?php echo URL_VIEW;?>/index/picture/bs3.png" class="ani img bs3" swiper-animate-effect="bounceInLeft" swiper-animate-duration="2s" swiper-animate-delay="0.5s">
      </a>
      <div class="jyb-banner-box" id="jyb-banner-box"></div>
    </div>
    <div class="swiper-slide slide5">
      <div class="inner">
      <div class="banwuleft">
        <span class="ani" swiper-animate-effect="zoomIn" swiper-animate-duration="0.5s" swiper-animate-delay="0.5s">用数据赋能你我<br/>让生意简单好做</span>
        <a class="ani" swiper-animate-effect="bounceInLeft" swiper-animate-duration="0.8s" swiper-animate-delay="0.5s" href="<?php echo url::s("index/user/register"); ?>">成为 <?php echo WEB_NAME; ?> 商户 >></a>
      </div>
      <div class="banwuright ani" swiper-animate-effect="bounceInRight" swiper-animate-duration="0.4s" swiper-animate-delay="0.3s">
        <h6 class="ani" swiper-animate-effect="fadeInDown" swiper-animate-duration="0.5s" swiper-animate-delay="0.5s"><?php echo WEB_NAME; ?> 伙伴计划</h6>
        <span class="ani" swiper-animate-effect="fadeInUp" swiper-animate-duration="0.5s" swiper-animate-delay="0.5s">365天实时结算</span>
        <p class="ani" swiper-animate-effect="fadeInUp" swiper-animate-duration="0.5s" swiper-animate-delay="0.5s">无论您是传统产业、创业者或者互联网企业，诚邀您共建支付服务新生态。</p>
        <a class="ani" swiper-animate-effect="bounceInRight" swiper-animate-duration="0.5s" swiper-animate-delay="0.5s" href="http://wpa.qq.com/msgrd?v=3&uin<?php echo WEB_QQ; ?>&site=qq&menu=yes" target="_blank">成为 <?php echo WEB_NAME; ?> 合作伙伴 >></a>
      </div>
      </div>
    </div>

  </div>
  <div class="pagination"></div>
</div>

<main id="index-page" class="main">


    <section class="box">
      <div class="tit flap" data-ani="fadeInDown" data-delay="0.1s">
          <p>产品中心<!--  / <em>Product Center</em> --></p>
          <span>提供支付接入方案，可在各种场景中轻松收款</span>
      </div>
      <div class="container product-box">
          <div class="row">
            <div class="col-md-6 row producttit">
              <div class="col-xs-4 col-md-4 col-lg-4">
                  <a href="javascript:;" class="product-item product-item1 flap" data-ani="fadeInUp" data-delay="0.1s">
                      <i class="product-item-img"></i>
                      <h3 class="product-item-tit">快捷支付</h3>
                      <!-- <p class="product-item-tit-en">Quick Pay</p>
                      <p class="product-item-txt">无需开通网银，凭银行卡、身份信息及手机就能支付</p> -->
                  </a>
              </div>
              <div class="col-xs-4 col-md-4 col-lg-4">
                  <a href="javascript:;" class="product-item product-item2 flap" data-ani="fadeInUp" data-delay="0.1s">
                      <i class="product-item-img"></i>
                      <h3 class="product-item-tit">扫码支付</h3>
                      <!-- <p class="product-item-tit-en">Scan To Pay</p>
                      <p class="product-item-txt">可主动扫码或被动扫码，支付宝和微信双渠道接入</p> -->
                  </a>
              </div>
              <div class="col-xs-4 col-md-4 col-lg-4">
                  <a href="javascript:;" class="product-item product-item3 flap" data-ani="fadeInUp" data-delay="0.1s">
                      <i class="product-item-img"></i>
                      <h3 class="product-item-tit">公众号支付</h3>
                      <!-- <p class="product-item-tit-en">Media Platform Pay</p>
                      <p class="product-item-txt">微信公众号支付</p> -->
                  </a>
              </div>
              <div class="col-xs-4 col-md-4 col-lg-4">
                  <a href="javascript:;" class="product-item product-item4 flap" data-ani="fadeInUp" data-delay="0.5s">
                      <i class="product-item-img"></i>
                      <h3 class="product-item-tit">APP支付</h3>
                      <!-- <p class="product-item-tit-en">APP Pay</p>
                      <p class="product-item-txt">提供APP内的微信、支付宝、快捷等多种支付方式</p> -->
                  </a>
              </div>
              <div class="col-xs-4 col-md-4 col-lg-4">
                  <a href="javascript:;" class="product-item product-item5 flap" data-ani="fadeInUp" data-delay="0.5s">
                      <i class="product-item-img"></i>
                      <h3 class="product-item-tit">小程序支付</h3>
                      <!-- <p class="product-item-tit-en">Small Program Pay</p>
                      <p class="product-item-txt">微信小程序内提供微信支付</p> -->
                  </a>
              </div>
              <div class="col-xs-4 col-md-4 col-lg-4">
                  <a href="javascript:;" class="product-item product-item6 flap" data-ani="fadeInUp" data-delay="0.5s">
                      <i class="product-item-img"></i>
                      <h3 class="product-item-tit">H5支付</h3>
                      <!-- <p class="product-item-tit-en">H5 Pay</p>
                      <p class="product-item-txt">H5页面提供微信、支付宝及银联快捷等支付方式</p> -->
                  </a>
              </div>
              <div class="col-xs-4 col-md-4 col-lg-4">
                  <a href="javascript:;" class="product-item product-item7 flap" data-ani="fadeInUp" data-delay="0.9s">
                      <i class="product-item-img"></i>
                      <h3 class="product-item-tit">网关支付</h3>
                      <!-- <p class="product-item-tit-en">Gateway Pay</p>
                      <p class="product-item-txt">2秒支付、60秒支付自动更新</p> -->
                  </a>
              </div>
              <div class="col-xs-4 col-md-4 col-lg-4">
                  <a href="javascript:;" class="product-item product-item8 flap" data-ani="fadeInUp" data-delay="0.9s">
                      <i class="product-item-img"></i>
                      <h3 class="product-item-tit">企业收付款</h3>
                      <!-- <p class="product-item-tit-en">Enterprise Collection And Pay</p>
                      <p class="product-item-txt">为企业提供一站式便捷收单产品及付款服务</p> -->
                  </a>
              </div>
              <div class="col-xs-4 col-md-4 col-lg-4">
                  <a href="javascript:;" class="product-item product-item9 flap" data-ani="fadeInUp" data-delay="0.9s">
                      <i class="product-item-img"></i>
                      <h3 class="product-item-tit">跨境支付</h3>
                      <!-- <p class="product-item-tit-en">Cross Border Pay</p>
                      <p class="product-item-txt">提供收单、实名认证、报送海关等服务</p> -->
                  </a>
              </div>
            </div>
            <div class="col-md-6 productmsg">
              <div class="productmsg-item flap" data-ani="fadeInDown" data-delay="0.1s">
                <img src="<?php echo URL_VIEW;?>/index/picture/item1-a.png"  />
                <h6>快捷支付</h6>
                <span>Quick Pay</span>
                <p>可跨终端、跨平台、跨浏览器支付；</p>
                <p>不需开通网银，只需提供银行卡号、户名、手机号码等信息，银行验证手机动态口令，即可完成支付。</p>
              </div>
              <div class="productmsg-item flap" data-ani="fadeInDown" data-delay="0.1s">
                <img src="<?php echo URL_VIEW;?>/index/picture/item2-a.png" />
                <h6>扫码支付</h6>
                <span>Scan To Pay</span>
                <p>支付宝、微信双渠道接入，双层保障！</p>
                <p>可以自由选择主动扫码、被动扫码两种方式进行交易。</p>
              </div>
              <div class="productmsg-item flap" data-ani="fadeInDown" data-delay="0.1s">
                <img src="<?php echo URL_VIEW;?>/index/picture/item3-a.png" />
                <h6>公众号支付</h6>
                <span>Media Platform Pay</span>
                <p>基于新媒体时代的支付方式！</p>
                <p>微信公众号、支付宝服务窗内，唤起主程序完成交易。</p>
              </div>
              <div class="productmsg-item flap" data-ani="fadeInDown" data-delay="0.1s">
                <img src="<?php echo URL_VIEW;?>/index/picture/item4-a.png" />
                <h6>APP支付</h6>
                <span>APP Pay</span>
                <p>手机APP内，只需简单的几行代码，即可接入微信、支付宝、快捷等主流支付方式。</p>
                <p>用户可以依照自己的习惯选择喜欢的支付方式。</p>
              </div>
              <div class="productmsg-item flap" data-ani="fadeInDown" data-delay="0.1s">
                <img src="<?php echo URL_VIEW;?>/index/picture/item5-a.png" />
                <h6>小程序支付</h6>
                <span>Small Program Pay</span>
                <p>微信小程序应用或商家H5页面</p>
                <p>在页面内调用主程序JSSDK完成支付。</p>
              </div>
              <div class="productmsg-item flap" data-ani="fadeInDown" data-delay="0.1s">
                <img src="<?php echo URL_VIEW;?>/index/picture/item6-a.png" />
                <h6>H5支付</h6>
                <span>H5 Pay</span>
                <p>不依赖APP、公众号等媒介，普通网页中即可进行交易；</p>
                <p>几行代码简单接入，快速集成上线。多种主流支付渠道，自适应支付场景，PC端、WAP端、H5页面。</p>
              </div>
              <div class="productmsg-item flap" data-ani="fadeInDown" data-delay="0.1s">
                <img src="<?php echo URL_VIEW;?>/index/picture/item7-a.png" />
                <h6>网关支付</h6>
                <span>Gateway Pay</span>
                <p>2秒支付、60秒支付自动更新</p>
              </div>
              <div class="productmsg-item flap" data-ani="fadeInDown" data-delay="0.1s">
                <img src="<?php echo URL_VIEW;?>/index/picture/item8-a.png" />
                <h6>企业收付款</h6>
                <span>Enterprise Collection And Pay</span>
                <p>企业收款：为企业提供一站式便捷收单产品</p>
                <p>企业付款：提供单笔或多笔至指定银行的付款服务</p>
              </div>
              <div class="productmsg-item flap" data-ani="fadeInDown" data-delay="0.1s">
                <img src="<?php echo URL_VIEW;?>/index/picture/item9-a.png" />
                <h6>跨境支付</h6>
                <span>Cross Border Pay</span>
                <p>提供收单、实名认证、报送海关等服务</p>
              </div>
              <div class="productmsg-sitem flap" data-ani="fadeInRight" data-delay="0.1s">
                <h6>主流通道 提供全方位支付体验</h6>
                <span>彻底告别繁琐的支付接入流程，半小时搞定！</span>
                <p>杯子金服为每一个需要支付服务的企业提供服务和技术支持，帮助企业快速的搭建自己的支付系统。</p>
                <p>现在如今，支付是商业变现必不可少的环节。我们聚合所有主流支付渠道，给你更简单、快捷的接入体验，同时提供简单易用的管理平台，让你可以集中进行跨渠道的交易管理和财务管理。</p>
                <p>我们致力于帮助企业快速和高质量地建立支付模块，满足企业任何支付场景的需求！</p>
              </div>
            </div>
          </div>
      </div>
  </section>
  <section class="box bg-grey">
        <div class="ystit tit flap" data-ani="fadeInDown" data-delay="0.1s">
            <p>我们的优势<!--  / <em>Platform Advantage</em> --></p>
            <span>方便快捷的支付接入体验，让支付和收款更简单！</span>
        </div>
        <div class="container solution-box">
            <div class="row">
                <div class="ysright col-sm-12 col-md-6 col-lg-6 flap" data-ani="fadeInLeft" data-delay="0.1s">
          <dl class="ysldl1"><img src="<?php echo URL_VIEW;?>/index/picture/icon01.png" /></dl>
          <dd>
            <span>极简使用</span>
            <p>七行代码，极速完成，支付接入<br/>简洁的操作界面易于使用</p>
          </dd>
                </div>
                <div class="ysleft col-sm-12 col-md-6 col-lg-6 flap" data-ani="fadeInRight" data-delay="0.1s">
          <dl class="ysrdl1"><img src="<?php echo URL_VIEW;?>/index/picture/icon02.png" /></dl>
          <dd>
            <span>灵活便利</span>
            <p>产品服务灵活组合<br/>满足企业多元化业务需求</p>
          </dd>
                </div>
                <div class="ysright col-sm-12 col-md-6 col-lg-6 flap" data-ani="fadeInLeft" data-delay="0.1s">
          <dl class="ysldl2"><img src="<?php echo URL_VIEW;?>/index/picture/icon03.png" /></dl>
          <dd>
            <span>不介入资金流</span>
            <p>只负责交易处理不参与资金清算<br/>保障您的资金安全</p>
          </dd>
                </div>
                <div class="ysleft col-sm-12 col-md-6 col-lg-6 flap" data-ani="fadeInRight" data-delay="0.1s">
          <dl class="ysrdl2"><img src="<?php echo URL_VIEW;?>/index/picture/icon04.png" /></dl>
          <dd>
            <span>大数据</span>
            <p>运用交易数据分析功能<br/>了解公司运营状况</p>
          </dd>
                </div>
                <div class="ysright col-sm-12 col-md-6 col-lg-6 flap" data-ani="fadeInLeft" data-delay="0.1s">
          <dl class="ysldl1"><img src="<?php echo URL_VIEW;?>/index/picture/icon05.png" /></dl>
          <dd>
            <span>增值服务</span>
            <p>提供金融产品及技术服务<br/>帮助企业整合互联网金融</p>
          </dd>
                </div>
                <div class="ysleft col-sm-12 col-md-6 col-lg-6 flap" data-ani="fadeInRight" data-delay="0.1s">
          <dl class="ysrdl1"><img src="<?php echo URL_VIEW;?>/index/picture/icon06.png" /></dl>
          <dd>
            <span>安全稳定</span>
            <p>平台运行于阿里云计算中心<br/>多备份容灾保障</p>
          </dd>
                </div>
            </div>
        </div>
    </section>
    <section class="box nop-box">
    <div class="guangdiv">
      <h6 class="flap" data-ani="fadeInDown" data-delay="0.1s"><b><?php echo WEB_NAME; ?></b>，做您身边的金融服务商</h6>
      <span class="flap" data-ani="fadeInDown" data-delay="0.3s">选择对的服务商能让您更快更好的迈进互联网金融时代</span>
      <a href="http://wpa.qq.com/msgrd?v=3&uin<?php echo WEB_QQ; ?>&site=qq&menu=yes" target="_blank" class="flap" data-ani="fadeInUp" data-delay="0.5s">点击咨询</a>
    </div>
  </section>
  <section class="box case-box">
        <div class="tit flap" data-ani="fadeInDown" data-delay="0.1s">
            <p>特色与服务<!--  / <em>Features and Services</em> --></p>
            <span>高额佣金激励回报，打造支付合作共赢生态圈</span>
        </div>

        <div class="container">
          <ul class="teseul row">
            <li class="col-lg-2 col-sm-4 col-xs-6 flap" data-ani="fadeInUp" data-delay="0.1s">
              <img src="<?php echo URL_VIEW;?>/index/picture/tes01.png" />
              <span>支付能力</span>
              <p>让接入支付变的简单方便，随处可得</p>
            </li>
            <li class="col-lg-2 col-sm-4 col-xs-6 flap" data-ani="fadeInUp" data-delay="0.1s">
              <img src="<?php echo URL_VIEW;?>/index/picture/tes02.png" />
              <span>资源共享</span>
              <p>丰富的外部资源提高顾客忠诚度</p>
            </li>
            <li class="col-lg-2 col-sm-4 col-xs-6 flap" data-ani="fadeInUp" data-delay="0.1s">
              <img src="<?php echo URL_VIEW;?>/index/picture/tes03.png" />
              <span>准确营销</span>
              <p>利用支付数据找到有价值的顾客</p>
            </li>
            <li class="col-lg-2 col-sm-4 col-xs-6 flap" data-ani="fadeInUp" data-delay="0.1s">
              <img src="<?php echo URL_VIEW;?>/index/picture/tes04.png" />
              <span>专业产品</span>
              <p>满足商家多样的管理、收银、营销等诉求</p>
            </li>
            <li class="col-lg-2 col-sm-4 col-xs-6 flap" data-ani="fadeInUp" data-delay="0.1s">
              <img src="<?php echo URL_VIEW;?>/index/picture/tes05.png" />
              <span>技术支持</span>
              <p>快速响应，7x24小时为您解答各类技术问题</p>
            </li>
            <li class="col-lg-2 col-sm-4 col-xs-6 flap" data-ani="fadeInUp" data-delay="0.1s">
              <img src="<?php echo URL_VIEW;?>/index/picture/tes06.png" />
              <span>合作伙伴</span>
              <p>高额激励回报，打造合作共赢生态</p>
            </li>
          </ul>
        </div>

		<div class="container">
			<div class="row txfwitem">
				<div class="col-lg-6 col-sm-12 flap" data-ani="fadeInLeft" data-delay="0.1s">
					<img src="<?php echo URL_VIEW;?>/index/picture/tsimg01.png" />
				</div>
				<div class="col-lg-6 col-sm-12 flap" data-ani="fadeInRight" data-delay="0.1s">
					<h6>专业的技术团队与行业资源</h6>
					<p>专业的技术团队与丰富的行业资源保障稳定、便捷的产品和服务。</p>
					<p>通过SDK接入多种主流通道，用saas模式创建商户交易管理系统，您无须投入技术团队和通道资源也能够实现自己的支付系统、管理自己的交易订单。</p>
				</div>
			</div>
			<div class="row txfwitem">
				<div class="col-lg-6 col-sm-12 flap" data-ani="fadeInLeft" data-delay="0.1s">
					<h6>一站式的平台管理系统</h6>
					
					<p>无论是平台自营或是代理，均能进行层级管理，全局把控交易和财务，实现自由灵活的商户交易管理，并能与合作伙伴便捷分享利益。</p>
				</div>
				<div class="col-lg-6 col-sm-12 flap" data-ani="fadeInRight" data-delay="0.1s">
					<img src="<?php echo URL_VIEW;?>/index/picture/tsimg02.png" />
				</div>
			</div>
			<div class="row txfwitem">
				<div class="col-lg-6 col-sm-12 flap" data-ani="fadeInLeft" data-delay="0.1s">
					<img src="<?php echo URL_VIEW;?>/index/picture/tsimg03.png" />
				</div>
				<div class="col-lg-6 col-sm-12 flap" data-ani="fadeInRight" data-delay="0.1s">
					<h6>便捷的商户管理平台</h6>
			
					<p>它能够满足企业集中式管理支付应用，进行快速的财务对账，便捷的交易与结算查询，更有商业智能BI帮助企业分析经营。</p>
				</div>
			</div>
      <div class="row txfwitem">
        <div class="col-lg-6 col-sm-12 flap" data-ani="fadeInLeft" data-delay="0.1s">
          <h6>简便的全流程自助服务</h6>
          <p>我们提倡开放便捷共享，平台提供方便简易的入网申请、在线接口联调、测试上线等自助式操作功能，化繁为简，一杯咖啡时间帮助你接入支付。</p>
          <p>同时平台全面提供7*24小时客户服务，保障客户问题随时得到处理解决。</p>
        </div>
        <div class="col-lg-6 col-sm-12 flap" data-ani="fadeInRight" data-delay="0.1s">
          <img src="<?php echo URL_VIEW;?>/index/picture/tsimg04.png" />
        </div>
      </div>
		</div>


    </section>

    <section class="box nop-box">
      <div class="ggchidiv">
        <span class="flap" data-ani="fadeInDown" data-delay="0.5s">我们具有专业的技术团队和丰富的行业资源，旨在帮助企业快速便捷地实现自己的支付功能。<br/>我们以开放云平台的新模式，着力发扬“开放、共建、共享”的理念，提供标准化的支付产品与服务，共享金融大数据资源。</span>
      </div>
    </section>

    <section class="box">
        <div class="tit  flap" data-ani="fadeInDown" data-delay="0.1s">
            <p>合作伙伴<!--  / <em>Cooperative Partner</em> --></p>
            <span>成功的一半，是拥有值得信赖的合作伙伴</span>
        </div>
        <div class="container">
          <div class="row hbpic">
            <div class="col-lg-3 col-md-4 col-sm-6 col-xs-6" >
              <img src="<?php echo URL_VIEW;?>/index/picture/1.png" class="flap" data-ani="fadeInUp" data-delay="0.1s" />
            </div>
            <div class="col-lg-3 col-md-4 col-sm-6 col-xs-6" >
              <img src="<?php echo URL_VIEW;?>/index/picture/2.png" class="flap" data-ani="fadeInUp" data-delay="0.1s" />
            </div>
            <div class="col-lg-3 col-md-4 col-sm-6 col-xs-6" >
              <img src="<?php echo URL_VIEW;?>/index/picture/3.png" class="flap" data-ani="fadeInUp" data-delay="0.1s" />
            </div>
            <div class="col-lg-3 col-md-4 col-sm-6 col-xs-6" >
              <img src="<?php echo URL_VIEW;?>/index/picture/4.png" class="flap" data-ani="fadeInUp" data-delay="0.1s" />
            </div>
            <div class="col-lg-3 col-md-4 col-sm-6 col-xs-6" >
              <img src="<?php echo URL_VIEW;?>/index/picture/5.png" class="flap" data-ani="fadeInUp" data-delay="0.3s" />
            </div>
            <div class="col-lg-3 col-md-4 col-sm-6 col-xs-6" >
              <img src="<?php echo URL_VIEW;?>/index/picture/6.png" class="flap" data-ani="fadeInUp" data-delay="0.3s" />
            </div>
            <div class="col-lg-3 col-md-4 col-sm-6 col-xs-6" >
              <img src="<?php echo URL_VIEW;?>/index/picture/7.png" class="flap" data-ani="fadeInUp" data-delay="0.3s" />
            </div>
            <div class="col-lg-3 col-md-4 col-sm-6 col-xs-6" >
              <img src="<?php echo URL_VIEW;?>/index/picture/8.png" class="flap" data-ani="fadeInUp" data-delay="0.3s" />
            </div>
            <div class="col-lg-3 col-md-4 col-sm-6 col-xs-6" >
              <img src="<?php echo URL_VIEW;?>/index/picture/9.png" class="flap" data-ani="fadeInUp" data-delay="0.5s" />
            </div>
            <div class="col-lg-3 col-md-4 col-sm-6 col-xs-6" >
              <img src="<?php echo URL_VIEW;?>/index/picture/10.png" class="flap" data-ani="fadeInUp" data-delay="0.5s" />
            </div>
            <div class="col-lg-3 col-md-4 col-sm-6 col-xs-6" >
              <img src="<?php echo URL_VIEW;?>/index/picture/11.png" class="flap" data-ani="fadeInUp" data-delay="0.5s" />
            </div>
            <div class="col-lg-3 col-md-4 col-sm-6 col-xs-6" >
              <img src="<?php echo URL_VIEW;?>/index/picture/12.png" class="flap" data-ani="fadeInUp" data-delay="0.5s" />
            </div>
          </div>
        </div>
    </section>

</main>







<footer class="footer">
    <div class="container">
        <div class="row footxxdiv">
          <div class="col-lg-8 col-xs-12">
            <img src="<?php echo URL_VIEW;?>/index/picture/123.png" class="flap" data-ani="fadeInLeft" data-delay="0.2s"/>
            <dd class="ksdhdd flap" data-ani="fadeInUp" data-delay="0.3s">
          </div>
          <div class="col-lg-4 col-xs-12">
            <dd class="lxfsdd flap" data-ani="fadeInRight" data-delay="0.5s">
              <p>本公司网址：xxx.com</p>
			  <p>本公司邮箱：<?php echo WEB_QQ; ?>@qq.com</p>
            </dd>
          </div>
        </div>
    </div>
    <div class="footer-copyright">
        <div class="container clearfix">
            <div class="footer-info pull-right flap" data-ani="fadeInUp" data-delay="0.5s">
                
                <div class="footer-login">
                  <a class="lonin-btn" href="<?php echo url::s("index/user/login"); ?>">商户登录</a>&nbsp;/&nbsp;
                  <a class="register-btn" href="<?php echo url::s("index/user/register"); ?>">商户注册</a>
                </div>
                
            </div>
           <div class="footer-login1">
                <br>Copyright &copy; 2018 - 2022  北京<?php echo WEB_NAME; ?>网络科技有限公司<br>工信部备案：<a class="footer-icp" href="http://www.miitbeian.gov.cn/" target="_blank">123456</a> <a class="footer-icp" target="_blank" href="https://v.pinpaibao.com.cn/cert/site/?site=<?php echo $this->config['siteurl']?>&at=realname"></a>
            </div>
        </div>
    </div>
    <a class="back-top" href="javascript:void(0);"><i class="back-top-icon"></i></a>
</footer>




  <script src="<?php echo URL_VIEW;?>/index/js/js/jquery_1107.js"></script>
<!--   <script src="<?php echo URL_VIEW;?>/index/js/js/owl.carousel_1107.js"></script> -->
  <script src="<?php echo URL_VIEW;?>/index/js/js/jquery.lazyload_1107.js"></script>
  <script src="<?php echo URL_VIEW;?>/index/js/js/my_js_1107.js"></script>

  <!-- BANNER --> 
  <script src="<?php echo URL_VIEW;?>/index/js/js/idangerous.swiper2.7.6.min.js"></script>
  <script src="<?php echo URL_VIEW;?>/index/js/js/swiper.animate1.0.2.min.js"></script>
  <script src="<?php echo URL_VIEW;?>/index/js/js/three.min.js"></script>
  <!-- BANNER -->
<script type="text/javascript">
$(function(){

  //$(".slide1 img").each(function(){
  //  $(this).attr("style","");
  //});

  var $li = $('.news-box-nav a');
  var $ul = $('.news-container .owl-carousel');
              
  $li.click(function(){
      var $this = $(this);
      var $t = $this.index();
      $li.removeClass('cur');
      $this.addClass('cur');
      $ul.css('display','none');
      $ul.eq($t).css('display','block');
  });

  var $tit = $('.producttit div');
  var $con = $('.productmsg .productmsg-item');
  var $sitem = $('.productmsg .productmsg-sitem');
              
  $tit.mouseover(function(){
      var $this = $(this);
      var $t = $this.index();
      $sitem.css('display','none');
      $con.css('display','none');
      $con.eq($t).css('display','block');
  });
  $tit.mouseout(function(){
      $con.css('display','none');
      $sitem.css('display','block');
  });

	//初始化动态
	ajax("terraceState",12);
	//初始化帮助
	ajax("helpCenter",12);
	//初始化行业
	ajax("industryConsult",12);

});

function ajax(type,number){
 	$.ajax({
		type:'POST',
		//url:'' + '/front/adflashList.htm',
		data:{
			type:type,
			num:number,
		},
		dataType:"json",
		success:function(result){
			var data = result.rows;
			$.each(data,function(index,obj){
				if(obj.status==1){
          $("#"+type+"").append("<li><a class='news-item item diynews' href="+obj.linkurl+"?id="+obj.id+" title="+obj.name+" target='view_window'>"
          +"<span>"+splitStr(obj.cratetime)+" | </span>"+obj.name+"</a>");
					$("#"+type+"").append("");
				}
			})
		}
	});
}

function splitStr(data){
  str=data; //这是一字符串
  var strs= new Array(); //定义一数组
  strs=str.split(" "); //字符分割
  for (i=0;i< strs.length ;i++ )
  {
  return(strs[i]); 
  } 
}

  var mySwiper = new Swiper ('.swiper-container', {
    pagination: '.pagination',
    paginationClickable :true,
    autoplay : 10000,
    speed:300,
    //loop:true,
    //autoplayDisableOnInteraction : true,

    onInit: function(swiper){ //Swiper2.x的初始化是onFirstInit
      swiperAnimateCache(swiper); //隐藏动画元素 
      swiperAnimate(swiper); //初始化完成开始动画
    }, 
    onSlideChangeEnd: function(swiper){ 
      swiperAnimate(swiper); //每个slide切换结束时也运行当前slide动画
    } 
  })    
  $('.arrow-left').on('click', function(e){
    e.preventDefault()
    mySwiper.swipePrev()
  })
  $('.arrow-right').on('click', function(e){
    e.preventDefault()
    mySwiper.swipeNext()
  })    

</script>
<script>
var SEPARATION = 100, AMOUNTX = 50, AMOUNTY = 50;
var container;
var camera, scene, renderer;
var particles, particle, count = 0;
var mouseX = 0, mouseY = 0;
var windowHalfX = window.innerWidth / 2;
var windowHalfY = window.innerHeight / 2;

if(window.innerWidth >= "450"){
  init();
  animate();
} 

function init() {
  container = document.createElement( 'div' );
  var containerObj = $(container);
  containerObj.addClass("jyb-banner-bg");
  $("#jyb-banner-box").append(containerObj);
  //document.body.appendChild( container );
  camera = new THREE.PerspectiveCamera( 75, window.innerWidth / window.innerHeight, 1, 10000 );
  camera.position.z = 1000;
  scene = new THREE.Scene();
  particles = new Array();
  var PI2 = Math.PI * 2;
  var material = new THREE.ParticleCanvasMaterial({
    color: 0xffffff,
    program: function ( context ) {
      context.beginPath();
      context.arc( 0, 0, 1, 0, PI2, true );
      context.fill();
    }
  });
  var i = 0;
  for ( var ix = 0; ix < AMOUNTX; ix ++ ) {
    for ( var iy = 0; iy < AMOUNTY; iy ++ ) {
      particle = particles[ i ++ ] = new THREE.Particle( material );
      particle.position.x = ix * SEPARATION - ( ( AMOUNTX * SEPARATION ) / 2 );
      particle.position.z = iy * SEPARATION - ( ( AMOUNTY * SEPARATION ) / 2 );
      scene.add( particle );
    }
  }
  renderer = new THREE.CanvasRenderer();
  renderer.setSize( window.innerWidth, window.innerHeight );
  container.appendChild( renderer.domElement );
  document.addEventListener( 'mousemove', onDocumentMouseMove, false );
  document.addEventListener( 'touchstart', onDocumentTouchStart, false );
  document.addEventListener( 'touchmove', onDocumentTouchMove, false );
  window.addEventListener( 'resize', onWindowResize, false );
}

function onWindowResize() {
  windowHalfX = window.innerWidth / 2;
  windowHalfY = window.innerHeight / 2;
  camera.aspect = window.innerWidth / window.innerHeight;
  camera.updateProjectionMatrix();
  renderer.setSize( window.innerWidth, window.innerHeight );
}

function onDocumentMouseMove( event ) {
  mouseX = event.clientX - windowHalfX;
  mouseY = event.clientY - windowHalfY;
}

function onDocumentTouchStart( event ) {
  if ( event.touches.length === 1 ) {
    event.preventDefault();
    mouseX = event.touches[ 0 ].pageX - windowHalfX;
    mouseY = event.touches[ 0 ].pageY - windowHalfY;
  }
}

function onDocumentTouchMove( event ) {
  if ( event.touches.length === 1 ) {
    event.preventDefault();
    mouseX = event.touches[ 0 ].pageX - windowHalfX;
    mouseY = event.touches[ 0 ].pageY - windowHalfY;
  }
}

function animate() {
  requestAnimationFrame( animate );
  render();
}

function render() {
  camera.position.x += ( mouseX - camera.position.x ) * .05;
  camera.position.y += ( - mouseY - camera.position.y ) * .05;
  camera.lookAt( scene.position );
  var i = 0;
  for ( var ix = 0; ix < AMOUNTX; ix ++ ) {
    for ( var iy = 0; iy < AMOUNTY; iy ++ ) {
      particle = particles[ i++ ];
      particle.position.y = ( Math.sin( ( ix + count ) * 0.3 ) * 50 ) + ( Math.sin( ( iy + count ) * 0.5 ) * 50 );
      particle.scale.x = particle.scale.y = ( Math.sin( ( ix + count ) * 0.3 ) + 1 ) * 2 + ( Math.sin( ( iy + count ) * 0.5 ) + 1 ) * 2;
    }
  }
  renderer.render( scene, camera );
  count += 0.1;
}
</script>
</body>
</html>
 

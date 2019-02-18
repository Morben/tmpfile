-- MySQL dump 10.13  Distrib 5.5.57, for Linux (x86_64)
--
-- Host: localhost    Database: hb
-- ------------------------------------------------------
-- Server version	5.5.57-log

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `xh_client_alipay_automatic_account`
--

DROP TABLE IF EXISTS `xh_client_alipay_automatic_account`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `xh_client_alipay_automatic_account` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(32) DEFAULT '0' COMMENT '支付宝名称',
  `card` char(100) DEFAULT NULL,
  `time` int(10) DEFAULT NULL,
  `status` tinyint(1) DEFAULT '1' COMMENT 'login.txt',
  `login_time` int(11) NOT NULL DEFAULT '0' COMMENT '登录时间',
  `heartbeats` int(11) NOT NULL DEFAULT '0' COMMENT '通讯心跳次数',
  `active_time` int(11) NOT NULL DEFAULT '0' COMMENT '最近活跃时间',
  `user_id` int(11) NOT NULL DEFAULT '0' COMMENT '用户id',
  `key_id` varchar(36) NOT NULL DEFAULT '' COMMENT 'keyId',
  `training` tinyint(1) NOT NULL DEFAULT '2' COMMENT '轮训 1 开启  2 关闭',
  `receiving` tinyint(1) NOT NULL DEFAULT '1' COMMENT '1 启动网关 2 关闭网关',
  `android_heartbeat` int(11) NOT NULL DEFAULT '0' COMMENT '安卓连接心跳时间',
  `login_img` text NOT NULL COMMENT '登录图片base64',
  `today_money` decimal(10,2) NOT NULL DEFAULT '0.00' COMMENT '今日收款总额',
  `today_pens` int(10) NOT NULL DEFAULT '0' COMMENT '今日交易笔数',
  PRIMARY KEY (`id`),
  UNIQUE KEY `key_id` (`key_id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `xh_client_alipay_automatic_account`
--

LOCK TABLES `xh_client_alipay_automatic_account` WRITE;
/*!40000 ALTER TABLE `xh_client_alipay_automatic_account` DISABLE KEYS */;
/*!40000 ALTER TABLE `xh_client_alipay_automatic_account` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `xh_client_alipay_automatic_orders`
--

DROP TABLE IF EXISTS `xh_client_alipay_automatic_orders`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `xh_client_alipay_automatic_orders` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(32) DEFAULT NULL COMMENT '姓名',
  `alipay_id` int(11) NOT NULL DEFAULT '0' COMMENT '支付宝id',
  `creation_time` int(11) NOT NULL DEFAULT '0' COMMENT '创建时间',
  `pay_time` int(11) NOT NULL DEFAULT '0' COMMENT '支付时间',
  `status` tinyint(1) NOT NULL DEFAULT '1' COMMENT '支付状态  1 等待下发支付二维码   2未支付 3订单超时 4已支付',
  `amount` decimal(10,2) NOT NULL DEFAULT '0.00' COMMENT '支付金额',
  `callback_url` text NOT NULL COMMENT '回调url',
  `success_url` text COMMENT '支付成功后跳转url',
  `error_url` text COMMENT '支付异常或超时跳转url',
  `user_id` int(11) NOT NULL DEFAULT '0' COMMENT '用户id',
  `callback_time` int(11) DEFAULT '0' COMMENT '通知发送的时间',
  `out_trade_no` varchar(128) NOT NULL DEFAULT '0' COMMENT '交易订单号，用户名，备注信息',
  `ip` varchar(18) NOT NULL DEFAULT '127.0.0.1' COMMENT '发起支付时IP地址',
  `trade_no` varchar(64) NOT NULL DEFAULT '' COMMENT '订单交易号',
  `qrcode` varchar(128) DEFAULT '' COMMENT '支付二维码',
  `callback_status` tinyint(1) DEFAULT '0' COMMENT '0 未回调 1已回调',
  `callback_content` varchar(32) DEFAULT '0' COMMENT '回调内容',
  `fees` decimal(10,3) DEFAULT '0.000' COMMENT '手续费',
  `bankorderid` varchar(100) DEFAULT NULL,
  `reached` int(10) DEFAULT '0',
  `del_floor` tinyint(1) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `xh_client_alipay_automatic_orders`
--

LOCK TABLES `xh_client_alipay_automatic_orders` WRITE;
/*!40000 ALTER TABLE `xh_client_alipay_automatic_orders` DISABLE KEYS */;
INSERT INTO `xh_client_alipay_automatic_orders` VALUES (1,'213123',1,1549478095,0,2,0.01,'http://pay.hftx.cc/index/index/callback.do','http://pay.hftx.cc/index/alipay/automatic.do','http://pay.hftx.cc/index/alipay/automatic.do',10150,0,'2019020702345598339','183.199.22.242','217942019020710299985','http://pay.hftx.cc/gateway/pay/Bank.do?id=1',0,'0',0.000,NULL,0,0);
/*!40000 ALTER TABLE `xh_client_alipay_automatic_orders` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `xh_client_code`
--

DROP TABLE IF EXISTS `xh_client_code`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `xh_client_code` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `phone` varchar(12) NOT NULL DEFAULT '' COMMENT '手机号',
  `codec` int(6) NOT NULL DEFAULT '0' COMMENT '验证码',
  `get_time` int(11) DEFAULT '0' COMMENT '获取时间',
  `state` tinyint(1) NOT NULL DEFAULT '1' COMMENT '状态 1 正常 2 已使用',
  `typec` varchar(16) NOT NULL DEFAULT '' COMMENT '类型',
  `ip` varchar(16) NOT NULL DEFAULT '' COMMENT 'ip地址',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='短信验证码';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `xh_client_code`
--

LOCK TABLES `xh_client_code` WRITE;
/*!40000 ALTER TABLE `xh_client_code` DISABLE KEYS */;
/*!40000 ALTER TABLE `xh_client_code` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `xh_client_data`
--

DROP TABLE IF EXISTS `xh_client_data`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `xh_client_data` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(64) NOT NULL DEFAULT '0' COMMENT '键名',
  `value` text NOT NULL COMMENT '键值',
  `userid` int(11) NOT NULL DEFAULT '0' COMMENT '用户id',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=85 DEFAULT CHARSET=utf8 COMMENT='商品费率';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `xh_client_data`
--

LOCK TABLES `xh_client_data` WRITE;
/*!40000 ALTER TABLE `xh_client_data` DISABLE KEYS */;
INSERT INTO `xh_client_data` VALUES (75,'alipayConfig','{\"robin\":1}',10150),(76,'automaticConfig','{\"robin\":2}',10150),(77,'alipayConfig','{\"robin\":2}',10152),(78,'alipayConfig','{\"robin\":1}',10153),(79,'alipayConfig','{\"robin\":1}',10151),(80,'alipayConfig','{\"robin\":1}',10155),(81,'alipayConfig','{\"robin\":1}',10157),(82,'alipayConfig','{\"robin\":2}',10159),(83,'alipayConfig','{\"robin\":2}',10160),(84,'serviceConfig','{\"robin\":\"1\"}',0);
/*!40000 ALTER TABLE `xh_client_data` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `xh_client_group`
--

DROP TABLE IF EXISTS `xh_client_group`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `xh_client_group` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(26) NOT NULL DEFAULT '普通用户' COMMENT '用户组名称',
  `authority` text COMMENT '权限组分配 -1 全局禁止 json数据',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=10012 DEFAULT CHARSET=utf8 COMMENT='用户组';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `xh_client_group`
--

LOCK TABLES `xh_client_group` WRITE;
/*!40000 ALTER TABLE `xh_client_group` DISABLE KEYS */;
INSERT INTO `xh_client_group` VALUES (9999,'全局禁止','-1'),(10002,'普通会员','{\"wechat_auto\":{\"cost\":\"0.02\",\"open\":1,\"quantity\":\"1\"},\"alipay_auto\":{\"cost\":\"0.02\",\"open\":1,\"quantity\":\"10\"},\"tenpay_auto\":{\"cost\":\"0.02\",\"open\":1,\"quantity\":\"1\"},\"jdpay_auto\":{\"cost\":\"0.02\",\"open\":1,\"quantity\":\"1\"},\"service_auto\":{\"cost\":\"0.03\",\"open\":1,\"quantity\":\"10\",\"gateway\":[\"1\"]},\"simple_way\":{\"cost\":\"0\",\"open\":1,\"quantity\":\"10\"},\"withdraw\":{\"cost\":\"0\",\"open\":1,\"quantity\":\"1\"},\"shop\":{\"cost\":\"0\",\"open\":1,\"quantity\":\"1\"}}');
/*!40000 ALTER TABLE `xh_client_group` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `xh_client_pay_record`
--

DROP TABLE IF EXISTS `xh_client_pay_record`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `xh_client_pay_record` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `pay_time` int(11) NOT NULL DEFAULT '0' COMMENT '支付时间',
  `amount` decimal(10,2) NOT NULL DEFAULT '0.00' COMMENT '支付金额',
  `user_id` int(11) DEFAULT '0' COMMENT '用户id  0为系统',
  `pay_note` varchar(128) NOT NULL DEFAULT '' COMMENT '备注信息',
  `types` tinyint(1) NOT NULL DEFAULT '0' COMMENT '订单类型 1 微信 2 支付宝',
  `version_code` varchar(32) NOT NULL DEFAULT 'wechat_auto' COMMENT '软件版本',
  `notice` tinyint(1) DEFAULT '0' COMMENT '0 未通知 1 已通知',
  `average` tinyint(1) NOT NULL DEFAULT '0' COMMENT '0 普通订单 1 平台系统订单',
  `bankorderid` varchar(100) DEFAULT NULL COMMENT '区分ID',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='实时交易记录';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `xh_client_pay_record`
--

LOCK TABLES `xh_client_pay_record` WRITE;
/*!40000 ALTER TABLE `xh_client_pay_record` DISABLE KEYS */;
/*!40000 ALTER TABLE `xh_client_pay_record` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `xh_client_reduce_account`
--

DROP TABLE IF EXISTS `xh_client_reduce_account`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `xh_client_reduce_account` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(32) DEFAULT '0' COMMENT '账户名称',
  `kahao` varchar(50) NOT NULL DEFAULT '1' COMMENT 'login.txt',
  `banktype` varchar(20) DEFAULT '0' COMMENT '登录时间',
  `time` int(11) DEFAULT '0' COMMENT '通讯心跳次数',
  `status` int(11) DEFAULT '0' COMMENT '最近活跃时间',
  `user_id` int(10) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='简约版';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `xh_client_reduce_account`
--

LOCK TABLES `xh_client_reduce_account` WRITE;
/*!40000 ALTER TABLE `xh_client_reduce_account` DISABLE KEYS */;
/*!40000 ALTER TABLE `xh_client_reduce_account` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `xh_client_reduce_order`
--

DROP TABLE IF EXISTS `xh_client_reduce_order`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `xh_client_reduce_order` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `reduce_id` int(11) NOT NULL DEFAULT '0' COMMENT '账户id',
  `creation_time` int(11) NOT NULL DEFAULT '0' COMMENT '创建时间',
  `pay_time` int(11) NOT NULL DEFAULT '0' COMMENT '支付时间',
  `status` tinyint(1) NOT NULL DEFAULT '1' COMMENT '支付状态 1未支付 2订单超时 3已支付',
  `amount` decimal(10,2) NOT NULL DEFAULT '0.00' COMMENT '支付金额',
  `callback_url` text NOT NULL COMMENT '回调url',
  `success_url` text COMMENT '支付成功后跳转url',
  `error_url` text COMMENT '支付异常或超时跳转url',
  `callback_time` int(11) DEFAULT '0' COMMENT '通知发送的时间',
  `out_trade_no` varchar(128) NOT NULL DEFAULT '0' COMMENT '交易订单号，用户名，备注信息',
  `ip` varchar(18) NOT NULL DEFAULT '127.0.0.1' COMMENT '发起支付时IP地址',
  `trade_no` int(6) NOT NULL DEFAULT '0' COMMENT '交易验证码（4位）',
  `qrcode` varchar(128) DEFAULT '' COMMENT '支付二维码',
  `callback_status` tinyint(1) DEFAULT '0' COMMENT '0 未回调 1已回调',
  `callback_content` varchar(32) DEFAULT '0' COMMENT '回调内容',
  `fees` decimal(10,3) DEFAULT '0.000' COMMENT '手续费',
  `types` tinyint(1) NOT NULL DEFAULT '0' COMMENT '订单类型',
  `broadcast` tinyint(1) NOT NULL DEFAULT '0' COMMENT '语音播报，1 已播报',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='简约版订单';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `xh_client_reduce_order`
--

LOCK TABLES `xh_client_reduce_order` WRITE;
/*!40000 ALTER TABLE `xh_client_reduce_order` DISABLE KEYS */;
/*!40000 ALTER TABLE `xh_client_reduce_order` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `xh_client_user`
--

DROP TABLE IF EXISTS `xh_client_user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `xh_client_user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(18) NOT NULL DEFAULT '' COMMENT '用户名',
  `phone` varchar(12) NOT NULL DEFAULT '13800138000' COMMENT '手机号',
  `pwd` varchar(32) NOT NULL DEFAULT '' COMMENT '密码',
  `balance` decimal(10,2) NOT NULL DEFAULT '0.00' COMMENT '余额-用作于消费',
  `money` decimal(10,2) NOT NULL DEFAULT '0.00' COMMENT '金额-用作于提现',
  `token` varchar(12) NOT NULL DEFAULT '' COMMENT 'token',
  `ip` varchar(16) NOT NULL DEFAULT '8.8.8.8' COMMENT '登录IP',
  `group_id` int(11) NOT NULL DEFAULT '0' COMMENT '用户组id',
  `level_id` int(11) NOT NULL DEFAULT '0' COMMENT '上级id',
  `login_time` int(11) DEFAULT '0' COMMENT '上次登录时间',
  `avatar` varchar(100) DEFAULT NULL,
  `key_id` varchar(32) DEFAULT '0' COMMENT '商户key',
  `bank` text COMMENT '银行卡信息 json',
  `apk_download_num` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`),
  UNIQUE KEY `phone` (`phone`)
) ENGINE=MyISAM AUTO_INCREMENT=10168 DEFAULT CHARSET=utf8 COMMENT='用户';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `xh_client_user`
--

LOCK TABLES `xh_client_user` WRITE;
/*!40000 ALTER TABLE `xh_client_user` DISABLE KEYS */;
INSERT INTO `xh_client_user` VALUES (10150,'chongzhi','18888888889','3f03fdcef628c52543b7ebd',9999.00,0.00,'994bfd7e4','183.199.22.242',10002,0,1549477941,'0','aiqiong',NULL,0);
/*!40000 ALTER TABLE `xh_client_user` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `xh_client_wechat_automatic_account`
--

DROP TABLE IF EXISTS `xh_client_wechat_automatic_account`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `xh_client_wechat_automatic_account` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(32) DEFAULT '0' COMMENT '微信名称',
  `status` tinyint(1) NOT NULL DEFAULT '1' COMMENT 'login.txt',
  `login_time` int(11) DEFAULT '0' COMMENT '微信登录时间',
  `heartbeats` int(11) DEFAULT '0' COMMENT '微信通讯心跳次数',
  `active_time` int(11) DEFAULT '0' COMMENT '最近活跃时间',
  `user_id` int(11) NOT NULL DEFAULT '0' COMMENT '用户id',
  `key_id` varchar(36) NOT NULL DEFAULT '' COMMENT 'keyId',
  `training` tinyint(1) NOT NULL DEFAULT '2' COMMENT '轮训 1 开启  2 关闭',
  `receiving` tinyint(1) NOT NULL DEFAULT '1' COMMENT '1 启动网关 2 关闭网关',
  `android_heartbeat` int(11) DEFAULT '0' COMMENT '安卓连接心跳时间',
  `login_img` text COMMENT '登录图片base64',
  `today_money` decimal(10,2) NOT NULL DEFAULT '0.00' COMMENT '今日收款总额',
  `today_pens` int(10) NOT NULL DEFAULT '0' COMMENT '今日交易笔数',
  PRIMARY KEY (`id`),
  UNIQUE KEY `key_id` (`key_id`)
) ENGINE=MyISAM AUTO_INCREMENT=100000073 DEFAULT CHARSET=utf8 COMMENT='微信全自动版账户表';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `xh_client_wechat_automatic_account`
--

LOCK TABLES `xh_client_wechat_automatic_account` WRITE;
/*!40000 ALTER TABLE `xh_client_wechat_automatic_account` DISABLE KEYS */;
INSERT INTO `xh_client_wechat_automatic_account` VALUES (100000072,'0',2,1544172525,0,0,10150,'B4DEC6DBE750255C33',2,2,1539917759,NULL,0.00,0);
/*!40000 ALTER TABLE `xh_client_wechat_automatic_account` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `xh_client_wechat_automatic_orders`
--

DROP TABLE IF EXISTS `xh_client_wechat_automatic_orders`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `xh_client_wechat_automatic_orders` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `wechat_id` int(11) NOT NULL DEFAULT '0' COMMENT '微信id',
  `creation_time` int(11) NOT NULL DEFAULT '0' COMMENT '创建时间',
  `pay_time` int(11) NOT NULL DEFAULT '0' COMMENT '支付时间',
  `status` tinyint(1) NOT NULL DEFAULT '1' COMMENT '支付状态  1 等待下发支付二维码   2未支付 3订单超时 4已支付',
  `amount` decimal(10,2) NOT NULL DEFAULT '0.00' COMMENT '支付金额',
  `callback_url` text NOT NULL COMMENT '回调url',
  `success_url` text COMMENT '支付成功后跳转url',
  `error_url` text COMMENT '支付异常或超时跳转url',
  `user_id` int(11) NOT NULL DEFAULT '0' COMMENT '用户id',
  `callback_time` int(11) DEFAULT '0' COMMENT '通知发送的时间',
  `out_trade_no` varchar(128) NOT NULL DEFAULT '0' COMMENT '交易订单号，用户名，备注信息',
  `ip` varchar(18) NOT NULL DEFAULT '127.0.0.1' COMMENT '发起支付时IP地址',
  `trade_no` varchar(64) NOT NULL DEFAULT '' COMMENT '订单交易号',
  `qrcode` varchar(128) DEFAULT '' COMMENT '支付二维码',
  `callback_status` tinyint(1) DEFAULT '0' COMMENT '0 未回调 1已回调',
  `callback_content` varchar(32) DEFAULT '0' COMMENT '回调内容',
  `fees` decimal(10,3) DEFAULT '0.000' COMMENT '手续费',
  PRIMARY KEY (`id`),
  UNIQUE KEY `trade_no` (`trade_no`)
) ENGINE=MyISAM AUTO_INCREMENT=10925 DEFAULT CHARSET=utf8 COMMENT='订单列表';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `xh_client_wechat_automatic_orders`
--

LOCK TABLES `xh_client_wechat_automatic_orders` WRITE;
/*!40000 ALTER TABLE `xh_client_wechat_automatic_orders` DISABLE KEYS */;
/*!40000 ALTER TABLE `xh_client_wechat_automatic_orders` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `xh_client_withdraw`
--

DROP TABLE IF EXISTS `xh_client_withdraw`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `xh_client_withdraw` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL DEFAULT '0' COMMENT '用户id',
  `old_amount` decimal(10,2) NOT NULL DEFAULT '0.00' COMMENT '旧金额',
  `amount` decimal(10,2) NOT NULL DEFAULT '0.00' COMMENT '金额',
  `new_amount` decimal(10,2) NOT NULL DEFAULT '0.00' COMMENT '新金额',
  `types` tinyint(1) NOT NULL DEFAULT '1' COMMENT '1 银行处理中 2 银行到账 3 钱款驳回 4 资金异常',
  `content` varchar(255) NOT NULL DEFAULT '0' COMMENT '处理信息',
  `apply_time` int(11) NOT NULL DEFAULT '0' COMMENT '申请时间',
  `deal_time` int(11) NOT NULL DEFAULT '0' COMMENT '处理时间',
  `flow_no` varchar(32) NOT NULL DEFAULT '0' COMMENT '流水号',
  `fees` decimal(10,2) NOT NULL DEFAULT '0.00' COMMENT '手续费',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=10054 DEFAULT CHARSET=utf8 COMMENT='提现表';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `xh_client_withdraw`
--

LOCK TABLES `xh_client_withdraw` WRITE;
/*!40000 ALTER TABLE `xh_client_withdraw` DISABLE KEYS */;
/*!40000 ALTER TABLE `xh_client_withdraw` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `xh_mgt`
--

DROP TABLE IF EXISTS `xh_mgt`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `xh_mgt` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(18) NOT NULL DEFAULT '' COMMENT '管理组用户名',
  `pwd` varchar(32) NOT NULL DEFAULT '' COMMENT '密码MD5',
  `pwd_safe` varchar(26) NOT NULL DEFAULT '0' COMMENT '安全口令',
  `group_id` int(11) NOT NULL DEFAULT '0' COMMENT '用户组ID',
  `avatar` varchar(48) DEFAULT 'default.jpg' COMMENT '头像',
  `phone` varchar(12) NOT NULL DEFAULT '13800138000' COMMENT '手机号码',
  `email` varchar(46) DEFAULT '' COMMENT '邮箱',
  `token` varchar(10) NOT NULL DEFAULT '' COMMENT '动态token密钥',
  `remarks` varchar(255) DEFAULT '' COMMENT '用户备注',
  `ip` varchar(15) NOT NULL DEFAULT '255.255.255.255' COMMENT 'ip登录地址',
  `view_module` varchar(255) DEFAULT '0' COMMENT '最近访问的10个操作',
  `login_time` int(11) NOT NULL DEFAULT '0' COMMENT '上次登录时间',
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`),
  UNIQUE KEY `phone` (`phone`),
  UNIQUE KEY `email` (`email`)
) ENGINE=MyISAM AUTO_INCREMENT=29 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `xh_mgt`
--

LOCK TABLES `xh_mgt` WRITE;
/*!40000 ALTER TABLE `xh_mgt` DISABLE KEYS */;
INSERT INTO `xh_mgt` VALUES (28,'adminroot','8940634a3f97d07529e3412','fdd0df03f7d595560df6855',1,'201902072201068249799.png','13151349181','houtai@qq.com','c983a2664','houtai','183.199.22.242','0',1549548076);
/*!40000 ALTER TABLE `xh_mgt` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `xh_mgt_group`
--

DROP TABLE IF EXISTS `xh_mgt_group`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `xh_mgt_group` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `authority` text COMMENT '权限组，json数据，-2 为最高权限，-1 为全局封禁',
  `mgt_name` varchar(26) NOT NULL DEFAULT '' COMMENT '权限组名称',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=utf8 COMMENT='管理员用户组';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `xh_mgt_group`
--

LOCK TABLES `xh_mgt_group` WRITE;
/*!40000 ALTER TABLE `xh_mgt_group` DISABLE KEYS */;
INSERT INTO `xh_mgt_group` VALUES (1,'-2','超级管理员'),(2,'-1','BENNED'),(8,'[\"14\",\"16\",\"17\",\"18\",\"19\",\"20\",\"21\",\"22\",\"23\",\"24\",\"25\",\"26\",\"27\",\"28\"]','软件管理');
/*!40000 ALTER TABLE `xh_mgt_group` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `xh_mgt_menu`
--

DROP TABLE IF EXISTS `xh_mgt_menu`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `xh_mgt_menu` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `menu_name` text NOT NULL COMMENT '菜单名称',
  `opened` tinyint(1) NOT NULL DEFAULT '1' COMMENT '1 默认打开 2 默认关闭',
  `hide` tinyint(1) NOT NULL DEFAULT '1' COMMENT '1 开启 2 隐藏',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=12 DEFAULT CHARSET=utf8 COMMENT='菜单';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `xh_mgt_menu`
--

LOCK TABLES `xh_mgt_menu` WRITE;
/*!40000 ALTER TABLE `xh_mgt_menu` DISABLE KEYS */;
INSERT INTO `xh_mgt_menu` VALUES (6,'<span class=\"icon color7\"><i class=\"fa fa-cog\"></i></span>系统设置<span class=\"caret\"></span>',1,1),(7,'<span class=\"icon color7\"><i class=\"fa fa-user\"></i></span>用户管理<span class=\"caret\"></span>',1,1),(8,'<span class=\"icon color7\"><i class=\"fa fa-wechat\"></i></span>微信管理<span class=\"caret\"></span>',1,2),(9,'<span class=\"icon color7\"><i class=\"fa fa-pinterest\"></i></span>银行转账<span class=\"caret\"></span>',1,1),(10,'<span class=\"icon color7\"><i class=\"fa fa-pied-piper\"></i></span>服务版<span class=\"caret\"></span>',1,1),(11,'<span class=\"icon color7\"><i class=\"fa fa-shopping-cart\"></i></span>商店系统<span class=\"caret\"></span>',1,1);
/*!40000 ALTER TABLE `xh_mgt_menu` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `xh_mgt_module`
--

DROP TABLE IF EXISTS `xh_mgt_module`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `xh_mgt_module` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '模块id',
  `name` varchar(32) NOT NULL DEFAULT '控制面板' COMMENT '控制器名称',
  `state` tinyint(1) NOT NULL DEFAULT '1' COMMENT '1 开启 2 关闭',
  `menuid` int(11) NOT NULL DEFAULT '0' COMMENT '绑定菜单ID',
  `route` varchar(40) NOT NULL DEFAULT 'admin/index/console' COMMENT '路径',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=33 DEFAULT CHARSET=utf8 COMMENT='模块索引';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `xh_mgt_module`
--

LOCK TABLES `xh_mgt_module` WRITE;
/*!40000 ALTER TABLE `xh_mgt_module` DISABLE KEYS */;
INSERT INTO `xh_mgt_module` VALUES (14,'网站设置',1,6,'admin/system/webCog'),(16,'短信配置',1,6,'admin/system/smsCog'),(17,'用户组',1,7,'admin/customer/index'),(18,'通道开关',2,6,'admin/system/costCog'),(19,'注册设置',1,7,'admin/customer/registerCog'),(20,'会员管理',1,7,'admin/member/index'),(21,'Automatic v1.0',1,8,'admin/wechat/automatic'),(22,'服务端',1,6,'admin/server/index'),(23,'交易订单',1,8,'admin/wechat/automaticOrder'),(24,'银行列表',1,9,'admin/alipay/automatic'),(25,'交易订单',1,9,'admin/alipay/automaticOrder'),(26,'交易订单',1,10,'admin/service/order'),(27,'账户管理',1,10,'admin/service/index'),(28,'提现管理',1,7,'admin/member/withdraw'),(29,'商品管理',1,11,'admin/shop/index'),(30,'发送短信',1,7,'admin/member/notice'),(31,'卡密管理',1,11,'admin/shop/card'),(32,'订单管理',1,11,'admin/shop/order');
/*!40000 ALTER TABLE `xh_mgt_module` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `xh_service_account`
--

DROP TABLE IF EXISTS `xh_service_account`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `xh_service_account` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `app_id` int(11) NOT NULL DEFAULT '0' COMMENT 'APPid',
  `name` varchar(32) DEFAULT '0' COMMENT '账户名称',
  `card` char(100) DEFAULT NULL COMMENT 'cardid',
  `status` tinyint(1) NOT NULL DEFAULT '1' COMMENT 'login.txt',
  `login_time` int(11) DEFAULT '0' COMMENT '登录时间',
  `heartbeats` int(11) DEFAULT '0' COMMENT '通讯心跳次数',
  `active_time` int(11) DEFAULT '0' COMMENT '最近活跃时间',
  `key_id` varchar(36) NOT NULL DEFAULT '' COMMENT 'keyId',
  `training` tinyint(1) NOT NULL DEFAULT '2' COMMENT '轮训 1 开启  2 关闭',
  `receiving` tinyint(1) NOT NULL DEFAULT '1' COMMENT '1 启动网关 2 关闭网关',
  `android_heartbeat` int(11) DEFAULT '0' COMMENT '安卓连接心跳时间',
  `login_img` text COMMENT '登录图片base64',
  `today_money` decimal(10,2) NOT NULL DEFAULT '0.00' COMMENT '今日收款总额',
  `today_pens` int(10) NOT NULL DEFAULT '0' COMMENT '今日交易笔数',
  `types` tinyint(1) NOT NULL DEFAULT '0' COMMENT '1 微信 2 支付宝 3 QQ 4 京东 ...',
  `lord` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  UNIQUE KEY `key_id` (`key_id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COMMENT='服务版';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `xh_service_account`
--

LOCK TABLES `xh_service_account` WRITE;
/*!40000 ALTER TABLE `xh_service_account` DISABLE KEYS */;
/*!40000 ALTER TABLE `xh_service_account` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `xh_service_order`
--

DROP TABLE IF EXISTS `xh_service_order`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `xh_service_order` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `app_id` int(11) NOT NULL DEFAULT '0' COMMENT 'app_id',
  `service_id` int(11) NOT NULL DEFAULT '0' COMMENT '服务id',
  `creation_time` int(11) NOT NULL DEFAULT '0' COMMENT '创建时间',
  `pay_time` int(11) NOT NULL DEFAULT '0' COMMENT '支付时间',
  `status` tinyint(1) NOT NULL DEFAULT '1' COMMENT '支付状态  1 等待下发支付二维码   2未支付 3订单超时 4已支付',
  `amount` decimal(10,2) NOT NULL DEFAULT '0.00' COMMENT '支付金额',
  `callback_url` text NOT NULL COMMENT '回调url',
  `success_url` text COMMENT '支付成功后跳转url',
  `error_url` text COMMENT '支付异常或超时跳转url',
  `user_id` int(11) DEFAULT '0' COMMENT '用户id  0为系统',
  `callback_time` int(11) DEFAULT '0' COMMENT '通知发送的时间',
  `out_trade_no` varchar(128) NOT NULL DEFAULT '0' COMMENT '交易订单号，用户名，备注信息',
  `ip` varchar(18) NOT NULL DEFAULT '127.0.0.1' COMMENT '发起支付时IP地址',
  `trade_no` varchar(64) NOT NULL DEFAULT '' COMMENT '订单交易号',
  `qrcode` varchar(128) DEFAULT '' COMMENT '支付二维码',
  `callback_status` tinyint(1) DEFAULT '0' COMMENT '0 未回调 1已回调',
  `callback_content` varchar(32) DEFAULT '0' COMMENT '回调内容',
  `fees` decimal(10,3) DEFAULT '0.000' COMMENT '手续费',
  `types` tinyint(1) NOT NULL DEFAULT '0' COMMENT '订单类型',
  `reached` tinyint(1) NOT NULL DEFAULT '0',
  `bankorderid` varchar(100) DEFAULT NULL,
  `del_floor` tinyint(1) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='服务订单';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `xh_service_order`
--

LOCK TABLES `xh_service_order` WRITE;
/*!40000 ALTER TABLE `xh_service_order` DISABLE KEYS */;
/*!40000 ALTER TABLE `xh_service_order` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `xh_shop`
--

DROP TABLE IF EXISTS `xh_shop`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `xh_shop` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(86) NOT NULL DEFAULT '默认名称' COMMENT '商品名称',
  `description` text COMMENT '商品描述',
  `money` decimal(10,2) NOT NULL DEFAULT '0.00' COMMENT '商品单价',
  `cost` decimal(10,2) NOT NULL DEFAULT '0.00' COMMENT '物品成本',
  `category` tinyint(1) NOT NULL DEFAULT '1' COMMENT '1 购买用户组 2 卡密购买 3 商品购买',
  `discount` text COMMENT '批量购买优惠规则',
  `restriction` int(11) NOT NULL DEFAULT '0' COMMENT '限制购买次数/数量',
  `purchases` int(11) DEFAULT '0' COMMENT '已被购买次数',
  `sort` int(6) NOT NULL DEFAULT '0' COMMENT '商品排序',
  `status` tinyint(1) NOT NULL DEFAULT '1' COMMENT '1 正常购买 2 停止购买',
  `release_time` int(11) NOT NULL DEFAULT '0' COMMENT '发布时间',
  `bind_special` int(11) DEFAULT '0' COMMENT '綁定特殊id',
  `warehouse` int(11) NOT NULL DEFAULT '0' COMMENT '库存',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=100006 DEFAULT CHARSET=utf8 COMMENT='商品管理';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `xh_shop`
--

LOCK TABLES `xh_shop` WRITE;
/*!40000 ALTER TABLE `xh_shop` DISABLE KEYS */;
/*!40000 ALTER TABLE `xh_shop` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `xh_shop_card`
--

DROP TABLE IF EXISTS `xh_shop_card`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `xh_shop_card` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `card_no` varchar(255) NOT NULL DEFAULT '0' COMMENT '卡号',
  `card_pwd` varchar(255) NOT NULL DEFAULT '0' COMMENT '卡密',
  `shop_id` int(11) NOT NULL DEFAULT '0' COMMENT '商品id',
  `status` tinyint(1) NOT NULL DEFAULT '0' COMMENT '0 未出售 1 已出售',
  `add_time` int(11) NOT NULL DEFAULT '0' COMMENT '添加时间',
  `sell_time` int(11) NOT NULL DEFAULT '0' COMMENT '出售时间',
  `user_id` int(11) NOT NULL DEFAULT '0' COMMENT '会员id',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=1508 DEFAULT CHARSET=utf8 COMMENT='卡密列表';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `xh_shop_card`
--

LOCK TABLES `xh_shop_card` WRITE;
/*!40000 ALTER TABLE `xh_shop_card` DISABLE KEYS */;
/*!40000 ALTER TABLE `xh_shop_card` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `xh_shop_order`
--

DROP TABLE IF EXISTS `xh_shop_order`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `xh_shop_order` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `shop_id` int(11) NOT NULL DEFAULT '0' COMMENT '商品id',
  `amount` decimal(10,2) NOT NULL DEFAULT '0.00' COMMENT '订单金额',
  `discount` decimal(10,2) NOT NULL DEFAULT '0.00' COMMENT '折扣金额',
  `quantity` int(11) NOT NULL DEFAULT '0' COMMENT '购买数量',
  `status` tinyint(1) NOT NULL DEFAULT '0' COMMENT '0 未支付 1 已支付 2 已发货 3 已收货 4 退款中 5 退款成功 6 退款失败 7 订单关闭',
  `serial_no` varchar(32) NOT NULL DEFAULT '0' COMMENT '订单流水号',
  `user_id` int(11) NOT NULL DEFAULT '0' COMMENT '用户ID',
  `address` text NOT NULL COMMENT '收货人信息-JSON',
  `ship` text NOT NULL COMMENT '运输信息-JSON-商品写运单号',
  `refund_amount` decimal(10,2) NOT NULL DEFAULT '0.00' COMMENT '退款金额',
  `refund_quantity` int(11) NOT NULL DEFAULT '0' COMMENT '退货数量',
  `refund_feedback` text COMMENT '退货原因-JSON',
  `refund_schedule` text COMMENT '退款进度-JSON',
  `pay_method` tinyint(1) NOT NULL DEFAULT '0' COMMENT '支付方式 1 微信 2 支付宝 3 余额 4盈利余额',
  `add_time` int(11) NOT NULL DEFAULT '0' COMMENT '创建时间',
  `pay_time` int(11) NOT NULL DEFAULT '0' COMMENT '支付时间',
  `delivery_time` int(11) DEFAULT '0' COMMENT '发货时间',
  `express` varchar(32) DEFAULT '0' COMMENT '快递代码',
  PRIMARY KEY (`id`),
  UNIQUE KEY `serial_no` (`serial_no`)
) ENGINE=MyISAM AUTO_INCREMENT=84 DEFAULT CHARSET=utf8 COMMENT='用户购买订单';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `xh_shop_order`
--

LOCK TABLES `xh_shop_order` WRITE;
/*!40000 ALTER TABLE `xh_shop_order` DISABLE KEYS */;
/*!40000 ALTER TABLE `xh_shop_order` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `xh_variable`
--

DROP TABLE IF EXISTS `xh_variable`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `xh_variable` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(64) NOT NULL DEFAULT 'key' COMMENT '变量名称',
  `value` text COMMENT '变量值',
  PRIMARY KEY (`id`),
  UNIQUE KEY `name` (`name`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=utf8 COMMENT='系统变量';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `xh_variable`
--

LOCK TABLES `xh_variable` WRITE;
/*!40000 ALTER TABLE `xh_variable` DISABLE KEYS */;
INSERT INTO `xh_variable` VALUES (3,'webCog','{\"name\":\"海豚支付红包版\",\"keywords\":\"海豚支付红包版\",\"description\":\"海豚支付红包版\",\"open\":1}'),(4,'smsCog','{\"accessKeyId\":\"LTAIpEj9owChasPI\",\"accessKeySecret\":\"2guOfXP0Rc9GERnFwatWfQMvCBD5QJ\",\"SignName\":\"免签支付\",\"TemplateCode\":\"SMS_147197042\",\"TemplateErrorCode\":\"SMS_147197042\",\"TemplateDefend\":\"SMS_147197042\",\"open\":1}'),(5,'costCog','{\"wechat_auto\":{\"open\":1},\"alipay_auto\":{\"open\":1},\"tenpay_auto\":{\"open\":1},\"jdpay_auto\":{\"open\":1},\"service_auto\":{\"open\":1},\"simple_way\":{\"open\":1},\"withdraw\":{\"open\":1},\"shop\":{\"open\":1}}'),(6,'registerCog','{\"integral\":\"5\",\"scale\":\"0.01\",\"scale_open\":2,\"points\":\"0.01\",\"points_open\":2,\"group_id\":9999}'),(7,'server','{\"key\":\"4C61C86ABEBC7249\",\"service_phone\":\"16620849345\"}');
/*!40000 ALTER TABLE `xh_variable` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2019-02-07 22:01:40

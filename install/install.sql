-- Adminer 4.2.5 MySQL dump

SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

DROP TABLE IF EXISTS `ayangw_config`;
CREATE TABLE `ayangw_config` (
  `ayangw_k` varchar(255) NOT NULL DEFAULT '',
  `ayangw_v` text,
  PRIMARY KEY (`ayangw_k`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

INSERT INTO `ayangw_config` (`ayangw_k`, `ayangw_v`) VALUES
('title',	'个人发卡系统'),
('keywords',	'阿奇支付系统专为行业各大程序系统，提供优质的支付集成一键对接！'),
('description',	'阿奇源码演示站'),
('zzqq',	'88888881'),
('notice2',	'付款后按提示点击确定跳转到提取页面，不可提前关闭窗口！否则无法提取到卡密！'),
('notice3',	'提取码是订单编号 或者 您的联系方式！'),
('notice1',	'提取卡密后请尽快激活使用或保存好，系统定期清除被提取的卡密'),
('foot',	'个人发卡系统'),
('dd_notice',	'<li>1.联系方式也可以作为你的提卡凭证</li>\n<li>2.必须等待付款完成自动跳转，不可提前关闭页面，否则会导致订单失效，后果自负</li>'),
('admin',	'admin'),
('pwd',	'123456'),
('web_url',	'http://34506.4aq.cn/'),
('paiapi',	'1'),
('xq_id',	'100030'),
('xq_key',	'0sl38410w6iXx4Mw4yUX0uVS48vQc40S1'),
('showKc',	'2'),
('CC_Defender',	'1'),
('txprotect',	'1'),
('qqtz',	'2'),
('title2',	'阿奇源码演示站'),
('qun',	'88888888'),
('qun1',	'https://jq.qq.com/?_wv=1027&k=5DdoFUtasdasd');

DROP TABLE IF EXISTS `ayangw_goods`;
CREATE TABLE `ayangw_goods` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `gName` varchar(255) DEFAULT NULL,
  `gInfo` text,
  `tpId` int(30) NOT NULL,
  `price` float DEFAULT NULL,
  `state` int(11) DEFAULT '1',
  `sales` int(11) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

INSERT INTO `ayangw_goods` (`id`, `gName`, `gInfo`, `tpId`, `price`, `state`, `sales`) VALUES
(25,	'商品名称001',	'商品介绍001',	6,	10,	1,	0),
(26,	'商品名称0011',	'商品介绍0011',	6,	11,	1,	0),
(27,	'商品名称002',	'商品介绍002',	7,	20,	1,	0),
(28,	'商品名称0022',	'商品介绍0022',	7,	22,	1,	0);

DROP TABLE IF EXISTS `ayangw_km`;
CREATE TABLE `ayangw_km` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `gid` int(11) NOT NULL,
  `km` varchar(100) DEFAULT NULL,
  `benTime` datetime DEFAULT NULL,
  `endTime` datetime DEFAULT NULL,
  `out_trade_no` varchar(100) DEFAULT NULL,
  `trade_no` varchar(100) DEFAULT NULL,
  `rel` varchar(50) DEFAULT NULL,
  `stat` int(11) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

INSERT INTO `ayangw_km` (`id`, `gid`, `km`, `benTime`, `endTime`, `out_trade_no`, `trade_no`, `rel`, `stat`) VALUES
(23,	25,	'333\r',	'2020-05-20 21:11:46',	NULL,	NULL,	NULL,	NULL,	0),
(22,	25,	'112\r',	'2020-05-20 21:11:46',	NULL,	NULL,	NULL,	NULL,	0),
(21,	25,	'123\r',	'2020-05-20 21:11:46',	NULL,	NULL,	NULL,	NULL,	0),
(24,	25,	'111',	'2020-05-20 21:11:46',	NULL,	NULL,	NULL,	NULL,	0),
(25,	26,	'00111\r',	'2020-05-20 21:11:57',	NULL,	NULL,	NULL,	NULL,	0),
(26,	26,	'14561456\r',	'2020-05-20 21:11:57',	NULL,	NULL,	NULL,	NULL,	0),
(27,	26,	'14561\r',	'2020-05-20 21:11:57',	NULL,	NULL,	NULL,	NULL,	0),
(28,	26,	'14561',	'2020-05-20 21:11:57',	NULL,	NULL,	NULL,	NULL,	0),
(29,	27,	'51256156\r',	'2020-05-20 21:12:06',	NULL,	NULL,	NULL,	NULL,	0),
(30,	27,	'41dfh45sdg\r',	'2020-05-20 21:12:06',	NULL,	NULL,	NULL,	NULL,	0),
(31,	27,	'1df4561gh\r',	'2020-05-20 21:12:06',	NULL,	NULL,	NULL,	NULL,	0),
(32,	27,	'1s45g1',	'2020-05-20 21:12:06',	NULL,	NULL,	NULL,	NULL,	0),
(33,	28,	'fsdg156\r',	'2020-05-20 21:12:12',	NULL,	NULL,	NULL,	NULL,	0),
(34,	28,	'f4j541sd\r',	'2020-05-20 21:12:12',	NULL,	NULL,	NULL,	NULL,	0),
(35,	28,	'1465rwe1tg\r',	'2020-05-20 21:12:12',	NULL,	NULL,	NULL,	NULL,	0),
(36,	28,	'11sdfgh56',	'2020-05-20 21:12:12',	NULL,	NULL,	NULL,	NULL,	0);

DROP TABLE IF EXISTS `ayangw_order`;
CREATE TABLE `ayangw_order` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `out_trade_no` varchar(100) DEFAULT NULL,
  `trade_no` varchar(100) DEFAULT NULL,
  `gid` int(11) DEFAULT NULL,
  `money` float DEFAULT NULL,
  `rel` varchar(30) DEFAULT NULL,
  `type` varchar(20) DEFAULT NULL,
  `benTime` datetime DEFAULT NULL,
  `endTime` datetime DEFAULT NULL,
  `sta` int(11) DEFAULT '0',
  `sendE` int(11) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

INSERT INTO `ayangw_order` (`id`, `out_trade_no`, `trade_no`, `gid`, `money`, `rel`, `type`, `benTime`, `endTime`, `sta`, `sendE`) VALUES
(28,	'20204202112159',	NULL,	25,	10,	'123456',	'alipay',	'2020-05-20 21:12:26',	NULL,	0,	0);

DROP TABLE IF EXISTS `ayangw_type`;
CREATE TABLE `ayangw_type` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `tName` varchar(100) DEFAULT NULL,
  `state` int(11) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

INSERT INTO `ayangw_type` (`id`, `tName`, `state`) VALUES
(6,	'测试分类1',	0),
(7,	'测试分类2',	0);

-- 2020-05-20 13:39:04
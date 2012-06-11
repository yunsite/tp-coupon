-- phpMyAdmin SQL Dump
-- version 3.4.9
-- http://www.phpmyadmin.net
--
-- 主机: localhost
-- 生成日期: 2012 年 06 月 11 日 09:36
-- 服务器版本: 5.1.28
-- PHP 版本: 5.2.6

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- 数据库: `quan`
--

-- --------------------------------------------------------

--
-- 表的结构 `dbs_ad`
--

CREATE TABLE IF NOT EXISTS `dbs_ad` (
  `ad_id` smallint(5) unsigned NOT NULL AUTO_INCREMENT,
  `position_id` smallint(5) unsigned NOT NULL DEFAULT '0',
  `media_type` tinyint(3) unsigned NOT NULL DEFAULT '0',
  `ad_name` varchar(60) NOT NULL DEFAULT '',
  `ad_link` varchar(255) NOT NULL DEFAULT '',
  `ad_code` text NOT NULL,
  `start_time` int(11) NOT NULL DEFAULT '0',
  `end_time` int(11) NOT NULL DEFAULT '0',
  `click_count` mediumint(8) unsigned NOT NULL DEFAULT '0',
  `enabled` tinyint(3) unsigned NOT NULL DEFAULT '1',
  PRIMARY KEY (`ad_id`),
  KEY `position_id` (`position_id`),
  KEY `enabled` (`enabled`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=8 ;

--
-- 转存表中的数据 `dbs_ad`
--

INSERT INTO `dbs_ad` (`ad_id`, `position_id`, `media_type`, `ad_name`, `ad_link`, `ad_code`, `start_time`, `end_time`, `click_count`, `enabled`) VALUES
(6, 3, 101, '最新优惠券列表页', 'http://www.quan.com', '201205/a232fb8f6987c1c4d1a6cf9f1c542ab5.jpg', 1335911040, 1338416640, 2, 1),
(7, 3, 102, '最新优惠券列表页淘宝Flash广告', '', '201205/0b9ad42b985425d74808814e33d4c541.swf', 1335916740, 1338422340, 0, 1);

-- --------------------------------------------------------

--
-- 表的结构 `dbs_admin_role`
--

CREATE TABLE IF NOT EXISTS `dbs_admin_role` (
  `role_id` smallint(5) unsigned NOT NULL AUTO_INCREMENT,
  `role_name` varchar(100) NOT NULL,
  PRIMARY KEY (`role_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- 转存表中的数据 `dbs_admin_role`
--

INSERT INTO `dbs_admin_role` (`role_id`, `role_name`) VALUES
(1, '网购优惠券管理员'),
(3, '线下优惠券管理员');

-- --------------------------------------------------------

--
-- 表的结构 `dbs_admin_users`
--

CREATE TABLE IF NOT EXISTS `dbs_admin_users` (
  `user_id` smallint(5) unsigned NOT NULL AUTO_INCREMENT,
  `email` varchar(60) NOT NULL DEFAULT '',
  `user_name` varchar(60) NOT NULL DEFAULT '',
  `name` varchar(40) CHARACTER SET ucs2 NOT NULL,
  `password` char(32) NOT NULL,
  `last_login` int(11) unsigned NOT NULL DEFAULT '0',
  `last_ip` varchar(15) NOT NULL DEFAULT '',
  `msn` varchar(60) NOT NULL,
  `qq` varchar(20) NOT NULL,
  `tel_phone` varchar(20) NOT NULL,
  `mobile_phone` varchar(20) NOT NULL,
  `addr` varchar(100) NOT NULL COMMENT '地址',
  `company` varchar(100) NOT NULL COMMENT '公司名称',
  `company_website` varchar(100) NOT NULL COMMENT '公司网站',
  `is_locked` tinyint(1) unsigned NOT NULL DEFAULT '0' COMMENT '封锁',
  `is_super` tinyint(1) unsigned NOT NULL DEFAULT '0' COMMENT '超级管理员',
  PRIMARY KEY (`user_id`),
  KEY `email` (`email`),
  KEY `is_super` (`is_super`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=11 ;

--
-- 转存表中的数据 `dbs_admin_users`
--

INSERT INTO `dbs_admin_users` (`user_id`, `email`, `user_name`, `name`, `password`, `last_login`, `last_ip`, `msn`, `qq`, `tel_phone`, `mobile_phone`, `addr`, `company`, `company_website`, `is_locked`, `is_super`) VALUES
(1, 'webmaster@ijiaqu.com', 'admin', '管理员', '46cc468df60c961d8da2326337c7aa58', 1339354584, '127.0.0.1', '', '', '', '', '', '', '', 0, 1);

-- --------------------------------------------------------

--
-- 表的结构 `dbs_admin_user_role`
--

CREATE TABLE IF NOT EXISTS `dbs_admin_user_role` (
  `userid` mediumint(8) unsigned NOT NULL,
  `roleid` smallint(5) unsigned NOT NULL,
  KEY `userid` (`userid`),
  KEY `roleid` (`roleid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- 表的结构 `dbs_admin_user_role_priv`
--

CREATE TABLE IF NOT EXISTS `dbs_admin_user_role_priv` (
  `roleid` smallint(5) unsigned NOT NULL DEFAULT '0',
  `field` char(15) NOT NULL,
  `value` char(30) NOT NULL,
  `priv` char(50) NOT NULL,
  PRIMARY KEY (`roleid`,`field`,`value`,`priv`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- 表的结构 `dbs_ad_position`
--

CREATE TABLE IF NOT EXISTS `dbs_ad_position` (
  `position_id` tinyint(3) unsigned NOT NULL AUTO_INCREMENT,
  `position_name` varchar(60) NOT NULL DEFAULT '',
  `ad_width` smallint(5) unsigned NOT NULL DEFAULT '0',
  `ad_height` smallint(5) unsigned NOT NULL DEFAULT '0',
  `position_desc` varchar(255) NOT NULL DEFAULT '',
  `position_style` text NOT NULL,
  PRIMARY KEY (`position_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- 转存表中的数据 `dbs_ad_position`
--

INSERT INTO `dbs_ad_position` (`position_id`, `position_name`, `ad_width`, `ad_height`, `position_desc`, `position_style`) VALUES
(2, '首页通栏广告960*60', 990, 60, '', '&lt;table cellpadding=&quot;0&quot; cellspacing=&quot;0&quot;&gt;\r\n{foreach from=$ads item=ad}\r\n&lt;tr&gt;&lt;td&gt;{$ad}&lt;/td&gt;&lt;/tr&gt;\r\n{/foreach}\r\n&lt;/table&gt;'),
(3, '列表页右边第一块图片广告', 300, 250, '', '&lt;table cellpadding=&quot;0&quot; cellspacing=&quot;0&quot;&gt;\r\n{foreach from=$ads item=ad}\r\n&lt;tr&gt;&lt;td&gt;{$ad}&lt;/td&gt;&lt;/tr&gt;\r\n{/foreach}\r\n&lt;/table&gt;');

-- --------------------------------------------------------

--
-- 表的结构 `dbs_article`
--

CREATE TABLE IF NOT EXISTS `dbs_article` (
  `article_id` smallint(6) unsigned NOT NULL AUTO_INCREMENT,
  `cate_id` smallint(5) unsigned NOT NULL DEFAULT '0',
  `title` varchar(100) NOT NULL,
  `alias` varchar(50) NOT NULL COMMENT '文章别名',
  `content` text NOT NULL,
  `addtime` int(11) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`article_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=12 ;

--
-- 转存表中的数据 `dbs_article`
--

INSERT INTO `dbs_article` (`article_id`, `cate_id`, `title`, `alias`, `content`, `addtime`) VALUES
(3, 3, '关于我们', 'about', '青番茄([url=http://www.qfanqie.com]www.qfanqie.com[/url])是一家以第三方身份向网络消费用户提供优惠券，优惠活动，打折促销以及免费试用等购物优惠省钱的信息平台。\r\n[b]青番茄[/b]凭借广阔的网络资源以及厚力的合作伙伴，并将行业覆盖至服装、电器、图书、化妆品、奢侈品、医疗教育等各行各业，涉足全国各大中小城市，随找各种消费形势的衍变，以及人们消费观念的改变，青番茄已经获得了成千上万资深人士的一致好评。\r\n平台原则：以消费者为核心，以商家为桥梁，建立三点一线的互动互助发展交流。\r\n\r\n[b]我们的优势\r\n\r\n我们拥有一套完整的规则制度\r\n青番茄[/b]拥有一套完善的商家促销以及消费者省钱购物的理念和经验，在青番茄，商家可以尽情促销，消费者可以自由筛选，青番茄会对所有信息进行核实把关，环环相扣，制度统一，执行统一！\r\n\r\n[b]我们拥有一支强大的技术团队[/b]\r\n通过强有力的技术手段，青番茄一方面不断完善用户体验，快速解决用户在网站使用过程中遇见的各种问题；另一方面，通过严格有效的审控机制，防止优惠券的恶意上传和下载，以保证电子优惠券散布的正确性、有效性和精准性。\r\n\r\n[b]我们拥有一支专业的营销队伍[/b]\r\n通过制定专业的市场营销策略，[b]青番茄[/b]适时推出了一系列有效的推广活动和商务洽谈活动。目前我们已经和麦包包、走秀网、乐淘、聚尚等知名的电子商务网站以及各行各业等网上购物商城，希望通过信息整合，将商家、消费者和青番茄三者结成不可分割的整体。', 1328565783),
(9, 3, '联系我们', 'contact', '[b]商务合作、产品建议[/b]\r\n如果您有广告投放、商务合作、产品建议，请 Email:business#qfanqie.com并简要介绍合作意向\r\n\r\n[b]在线服务[/b]\r\n如您在网站操作中遇到困难，请 直接通过网站意见建议 直接留言给我们\r\n[b]\r\n\r\n联系我们[/b]\r\n青番茄网\r\n地址：中国.广东.广州市天河区科新路8号\r\n\r\n邮编：510660\r\n电话：020-22824212', 1335463789),
(10, 5, '如何充值', 'pay', '[b]1.[/b]首先使用帐号登陆青番茄网\r\n                        \r\n[b]2.[/b]到青番茄的“账号充值”页面输入您要充值的金额， 然后点击“使用支付宝充值”去支付宝充值                        \r\n                        [img]http://www.quanmama.com/images/alipay-chongzhi.jpg[/img]                        \r\n [b]3.[/b]充值成功后，即可去您要买的券的页面购买优惠券', 1335463924),
(11, 4, '使用条款', 'policy', '使用条款\r\n\r\n一、\r\n\r\n二、', 1336547373);

-- --------------------------------------------------------

--
-- 表的结构 `dbs_article_category`
--

CREATE TABLE IF NOT EXISTS `dbs_article_category` (
  `cate_id` smallint(5) unsigned NOT NULL AUTO_INCREMENT,
  `cate_name` varchar(50) NOT NULL,
  `sort_order` smallint(5) unsigned NOT NULL DEFAULT '1',
  PRIMARY KEY (`cate_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

--
-- 转存表中的数据 `dbs_article_category`
--

INSERT INTO `dbs_article_category` (`cate_id`, `cate_name`, `sort_order`) VALUES
(3, '关于我们', 1),
(4, '使用条款', 2),
(5, '帮助', 3);

-- --------------------------------------------------------

--
-- 表的结构 `dbs_city`
--

CREATE TABLE IF NOT EXISTS `dbs_city` (
  `id` smallint(4) unsigned NOT NULL AUTO_INCREMENT,
  `level` tinyint(1) unsigned NOT NULL DEFAULT '1' COMMENT '等级',
  `parent_id` smallint(4) unsigned NOT NULL DEFAULT '0' COMMENT '父ID',
  `code` varchar(30) NOT NULL COMMENT '编码',
  `name` varchar(50) NOT NULL COMMENT '名称',
  `admin_uid` smallint(5) unsigned NOT NULL DEFAULT '0' COMMENT '站长ID',
  `sort_order` smallint(4) unsigned NOT NULL DEFAULT '1' COMMENT '排序',
  PRIMARY KEY (`id`),
  KEY `admin_uid` (`admin_uid`),
  KEY `level` (`level`,`parent_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=65 ;

--
-- 转存表中的数据 `dbs_city`
--

INSERT INTO `dbs_city` (`id`, `level`, `parent_id`, `code`, `name`, `admin_uid`, `sort_order`) VALUES
(1, 1, 0, 'gz', '广州', 2, 1),
(2, 1, 0, 'sz', '深圳', 3, 1),
(3, 1, 0, 'bj', '北京', 4, 1),
(7, 1, 0, 'sh', '上海', 6, 1),
(10, 2, 1, 'tianhe', '天河区', 0, 1),
(11, 2, 1, 'yuexiu', '越秀区', 0, 2),
(12, 2, 1, 'liwan', '荔湾区', 0, 3),
(13, 2, 2, 'luohu', '罗湖区', 0, 1),
(14, 2, 2, 'futian', '福田区', 0, 2),
(16, 2, 2, 'nanshan', '南山区', 0, 3),
(17, 2, 2, 'yantian', '盐田区', 0, 4),
(18, 2, 2, 'baoan', '宝安区', 0, 5),
(19, 2, 2, 'longgang', '龙岗区', 0, 6),
(20, 2, 7, 'huangpu', '黄浦区', 0, 1),
(21, 2, 7, 'xuhui', '徐汇区', 0, 2),
(22, 2, 7, 'changning', '长宁区', 0, 3),
(23, 2, 7, 'jingan', '静安区', 0, 4),
(24, 2, 7, 'putuo', '普陀区', 0, 5),
(25, 2, 7, 'zhabei', '闸北区', 0, 6),
(26, 2, 7, 'hongkou', '虹口区', 0, 7),
(27, 2, 7, 'yangpu', '杨浦区', 0, 8),
(28, 2, 7, 'minxing', '闵行区', 0, 9),
(29, 2, 7, 'baoshan', '宝山区', 0, 10),
(30, 2, 7, 'jiading', '嘉定区', 0, 11),
(31, 2, 7, 'pudong', '浦东新区', 0, 12),
(32, 2, 7, 'jinshan', '金山区', 0, 13),
(33, 2, 7, 'songjiang', '松江区', 0, 14),
(34, 2, 7, 'qingpu', '青浦区', 0, 15),
(35, 2, 7, 'fengxian', '奉贤区', 0, 16),
(36, 2, 7, 'chongming', '崇明县', 0, 17),
(40, 2, 1, 'haizhu', '海珠区', 0, 4),
(41, 2, 1, 'panyu', '番禺区', 0, 5),
(42, 2, 1, 'baiyun', '白云区', 0, 6),
(43, 2, 1, 'huangpu', '黄埔区', 0, 7),
(44, 2, 1, 'huadu', '花都区', 0, 8),
(45, 2, 1, 'nansha', '南沙区', 0, 9),
(46, 2, 1, 'luogang', '萝岗区', 0, 10),
(47, 2, 1, 'zengcheng', '增城市', 0, 11),
(48, 2, 1, 'conghua', '从化市', 0, 12),
(49, 2, 3, 'dongcheng', '东城区', 0, 1),
(50, 2, 3, 'xicheng', '西城区', 0, 2),
(51, 2, 3, 'chaoyang', '朝阳区', 0, 3),
(52, 2, 3, 'fengtai', '丰台区', 0, 4),
(53, 2, 3, 'shijingshan', '石景山区', 0, 5),
(54, 2, 3, 'haidian', '海淀区', 0, 6),
(55, 2, 3, 'mentougou', '门头沟区', 0, 7),
(56, 2, 3, 'fangshan', '房山区', 0, 8),
(57, 2, 3, 'tongzhou', '通州区', 0, 9),
(58, 2, 3, 'shunyi', '顺义区', 0, 10),
(59, 2, 3, 'changping', '昌平区', 0, 11),
(60, 2, 3, 'daxing', '大兴区', 0, 12),
(61, 2, 3, 'huairou', '怀柔区', 0, 13),
(62, 2, 3, 'pinggu', '平谷区', 0, 14),
(63, 2, 3, 'miyun', '密云县', 0, 15),
(64, 2, 3, 'yanqing', '延庆县', 0, 16);

-- --------------------------------------------------------

--
-- 表的结构 `dbs_consume_records`
--

CREATE TABLE IF NOT EXISTS `dbs_consume_records` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` mediumint(8) unsigned NOT NULL DEFAULT '0',
  `type` enum('spend','increase') NOT NULL,
  `money_type` enum('money','credit') NOT NULL,
  `amount` float unsigned NOT NULL DEFAULT '0',
  `addtime` int(11) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=9 ;

--
-- 转存表中的数据 `dbs_consume_records`
--

INSERT INTO `dbs_consume_records` (`id`, `user_id`, `type`, `money_type`, `amount`, `addtime`) VALUES
(1, 5, 'increase', 'credit', 1, 1335748190),
(2, 5, 'increase', 'credit', 2, 1335748251),
(3, 5, 'spend', 'credit', 1, 1335750031),
(4, 7, 'increase', 'credit', 100, 1335772050),
(5, 7, 'spend', 'credit', 1, 1335772079),
(6, 5, 'increase', 'money', 0, 1336009396),
(7, 5, 'increase', 'money', 0, 1336009430),
(8, 9, 'increase', 'credit', 6, 1336605352);

-- --------------------------------------------------------

--
-- 表的结构 `dbs_coupon_code`
--

CREATE TABLE IF NOT EXISTS `dbs_coupon_code` (
  `c_id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(100) NOT NULL,
  `m_id` mediumint(8) unsigned NOT NULL DEFAULT '0' COMMENT '商家ID',
  `m_name` varchar(255) NOT NULL COMMENT '商家名称',
  `c_type` tinyint(1) unsigned NOT NULL DEFAULT '1',
  `money_max` float unsigned NOT NULL DEFAULT '0',
  `money_reduce` float unsigned NOT NULL DEFAULT '0',
  `money_amount` float unsigned NOT NULL DEFAULT '0',
  `expiry_type` tinyint(1) unsigned NOT NULL DEFAULT '1',
  `expiry` int(11) unsigned NOT NULL DEFAULT '0',
  `price_type` tinyint(1) unsigned NOT NULL DEFAULT '1',
  `price` float unsigned NOT NULL DEFAULT '0',
  `amount` mediumint(8) unsigned NOT NULL DEFAULT '0',
  `fetched_amount` mediumint(8) unsigned NOT NULL DEFAULT '0',
  `sort_order` smallint(5) unsigned NOT NULL DEFAULT '9999',
  `is_active` tinyint(1) unsigned NOT NULL DEFAULT '1',
  `addtime` int(11) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`c_id`),
  KEY `m_id` (`m_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- 转存表中的数据 `dbs_coupon_code`
--

INSERT INTO `dbs_coupon_code` (`c_id`, `title`, `m_id`, `m_name`, `c_type`, `money_max`, `money_reduce`, `money_amount`, `expiry_type`, `expiry`, `price_type`, `price`, `amount`, `fetched_amount`, `sort_order`, `is_active`, `addtime`) VALUES
(1, '', 2, '易迅', 1, 300, 20, 0, 1, 1338451199, 1, 10, 4, 3, 9999, 1, 1335283200),
(2, '', 2, '易迅', 1, 50, 5, 0, 1, 1338451199, 1, 1, 5, 2, 9999, 1, 1335377998),
(3, '', 3, '凡客诚品', 1, 100, 20, 0, 1, 1338364799, 2, 0.1, 167, 1, 9999, 1, 1338159730),
(4, '俏物悄语6月6元无限制优惠券', 6, '俏物悄语', 1, 6, 6, 0, 1, 1340870399, 1, 0, 0, 0, 9999, 1, 1338878064);

-- --------------------------------------------------------

--
-- 表的结构 `dbs_coupon_code_best`
--

CREATE TABLE IF NOT EXISTS `dbs_coupon_code_best` (
  `c_id` mediumint(8) unsigned NOT NULL DEFAULT '0',
  `expiry` int(11) unsigned NOT NULL DEFAULT '0',
  `sort_order` smallint(5) unsigned NOT NULL DEFAULT '0',
  KEY `sort_order` (`sort_order`),
  KEY `c_id` (`c_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `dbs_coupon_code_best`
--

INSERT INTO `dbs_coupon_code_best` (`c_id`, `expiry`, `sort_order`) VALUES
(1, 1338451199, 10000);

-- --------------------------------------------------------

--
-- 表的结构 `dbs_coupon_code_category`
--

CREATE TABLE IF NOT EXISTS `dbs_coupon_code_category` (
  `id` smallint(5) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `sort_order` smallint(5) unsigned NOT NULL DEFAULT '0',
  `parent_id` smallint(5) unsigned NOT NULL DEFAULT '0',
  `show_index` tinyint(1) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `parent_dept_id` (`parent_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=9 ;

--
-- 转存表中的数据 `dbs_coupon_code_category`
--

INSERT INTO `dbs_coupon_code_category` (`id`, `name`, `sort_order`, `parent_id`, `show_index`) VALUES
(1, '综合商城', 1, 0, 1),
(2, '服装服饰', 2, 0, 0),
(3, '箱包鞋帽', 3, 0, 0),
(4, '时尚名品', 4, 0, 0),
(5, '女装', 1, 2, 0),
(6, '男装', 2, 2, 0),
(8, '化妆品、个人护理', 5, 0, 0);

-- --------------------------------------------------------

--
-- 表的结构 `dbs_coupon_code_codes`
--

CREATE TABLE IF NOT EXISTS `dbs_coupon_code_codes` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `c_id` mediumint(8) unsigned NOT NULL DEFAULT '0',
  `code` varchar(30) NOT NULL,
  `user_id` mediumint(8) unsigned NOT NULL DEFAULT '0',
  `nick` varchar(50) NOT NULL,
  `fetch_time` int(11) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `c_id` (`c_id`,`user_id`),
  KEY `fetch_time` (`fetch_time`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=177 ;

--
-- 转存表中的数据 `dbs_coupon_code_codes`
--

INSERT INTO `dbs_coupon_code_codes` (`id`, `c_id`, `code`, `user_id`, `nick`, `fetch_time`) VALUES
(1, 1, 'JD2012041201', 9, 'hao1234', 1336687223),
(2, 1, 'JD2012041202', 2, '极好居', 1337041078),
(3, 1, 'JD2012041203', 5, '极好居网', 1337041153),
(4, 1, 'JD2012041204', 0, '', 0),
(5, 2, 'AASS52652SS', 2, '极好居', 1337031996),
(6, 2, 'ASSD4454444', 5, '极好居网', 1337032042),
(7, 2, 'ASS444SSS44', 0, '', 0),
(8, 2, 'SS44411SS44', 0, '', 0),
(9, 2, 'ASS7854S566', 0, '', 0),
(10, 3, 'JKDLJ02033', 2, '极好居', 1338159769),
(11, 3, 'DKLKKKL0304', 0, '', 0),
(12, 3, 'SDFKDKF389323', 0, '', 0),
(13, 3, 'SFDUFHDSKH393', 0, '', 0),
(14, 3, 'SDFJDISFJKL34333', 0, '', 0),
(15, 3, 'SDFJDISFJKL34333', 0, '', 0),
(16, 3, 'SDFJDISFJKL34333', 0, '', 0),
(17, 3, 'SDFJDISFJKL34333', 0, '', 0),
(18, 3, 'SDFJDISFJKL34333', 0, '', 0),
(19, 3, 'SDFJDISFJKL34333', 0, '', 0),
(20, 3, 'SDFJDISFJKL34333', 0, '', 0),
(21, 3, 'SDFJDISFJKL34333', 0, '', 0),
(22, 3, 'SDFJDISFJKL34333', 0, '', 0),
(23, 3, 'SDFJDISFJKL34333', 0, '', 0),
(24, 3, 'SDFJDISFJKL34333', 0, '', 0),
(25, 3, 'SDFJDISFJKL34333', 0, '', 0),
(26, 3, 'SDFJDISFJKL34333', 0, '', 0),
(27, 3, 'SDFJDISFJKL34333', 0, '', 0),
(28, 3, 'SDFJDISFJKL34333', 0, '', 0),
(29, 3, 'SDFJDISFJKL34333', 0, '', 0),
(30, 3, 'SDFJDISFJKL34333', 0, '', 0),
(31, 3, 'SDFJDISFJKL34333', 0, '', 0),
(32, 3, 'SDFJDISFJKL34333', 0, '', 0),
(33, 3, 'SDFJDISFJKL34333', 0, '', 0),
(34, 3, 'SDFJDISFJKL34333', 0, '', 0),
(35, 3, 'SDFJDISFJKL34333', 0, '', 0),
(36, 3, 'SDFJDISFJKL34333', 0, '', 0),
(37, 3, 'SDFJDISFJKL34333', 0, '', 0),
(38, 3, 'SDFJDISFJKL34333', 0, '', 0),
(39, 3, 'SDFJDISFJKL34333', 0, '', 0),
(40, 3, 'SDFJDISFJKL34333', 0, '', 0),
(41, 3, 'SDFJDISFJKL34333', 0, '', 0),
(42, 3, 'SDFJDISFJKL34333', 0, '', 0),
(43, 3, 'SDFJDISFJKL34333', 0, '', 0),
(44, 3, 'SDFJDISFJKL34333', 0, '', 0),
(45, 3, 'SDFJDISFJKL34333', 0, '', 0),
(46, 3, 'SDFJDISFJKL34333', 0, '', 0),
(47, 3, 'SDFJDISFJKL34333', 0, '', 0),
(48, 3, 'SDFJDISFJKL34333', 0, '', 0),
(49, 3, 'SDFJDISFJKL34333', 0, '', 0),
(50, 3, 'SDFJDISFJKL34333', 0, '', 0),
(51, 3, 'SDFJDISFJKL34333', 0, '', 0),
(52, 3, 'SDFJDISFJKL34333', 0, '', 0),
(53, 3, 'SDFJDISFJKL34333', 0, '', 0),
(54, 3, 'SDFJDISFJKL34333', 0, '', 0),
(55, 3, 'SDFJDISFJKL34333', 0, '', 0),
(56, 3, 'SDFJDISFJKL34333', 0, '', 0),
(57, 3, 'SDFJDISFJKL34333', 0, '', 0),
(58, 3, 'SDFJDISFJKL34333', 0, '', 0),
(59, 3, 'SDFJDISFJKL34333', 0, '', 0),
(60, 3, 'SDFJDISFJKL34333', 0, '', 0),
(61, 3, 'SDFJDISFJKL34333', 0, '', 0),
(62, 3, 'SDFJDISFJKL34333', 0, '', 0),
(63, 3, 'SDFJDISFJKL34333', 0, '', 0),
(64, 3, 'SDFJDISFJKL34333', 0, '', 0),
(65, 3, 'SDFJDISFJKL34333', 0, '', 0),
(66, 3, 'SDFJDISFJKL34333', 0, '', 0),
(67, 3, 'SDFJDISFJKL34333', 0, '', 0),
(68, 3, 'SDFJDISFJKL34333', 0, '', 0),
(69, 3, 'SDFJDISFJKL34333', 0, '', 0),
(70, 3, 'SDFJDISFJKL34333', 0, '', 0),
(71, 3, 'SDFJDISFJKL34333', 0, '', 0),
(72, 3, 'SDFJDISFJKL34333', 0, '', 0),
(73, 3, 'SDFJDISFJKL34333', 0, '', 0),
(74, 3, 'SDFJDISFJKL34333', 0, '', 0),
(75, 3, 'SDFJDISFJKL34333', 0, '', 0),
(76, 3, 'SDFJDISFJKL34333', 0, '', 0),
(77, 3, 'SDFJDISFJKL34333', 0, '', 0),
(78, 3, 'SDFJDISFJKL34333', 0, '', 0),
(79, 3, 'SDFJDISFJKL34333', 0, '', 0),
(80, 3, 'SDFJDISFJKL34333', 0, '', 0),
(81, 3, 'SDFJDISFJKL34333', 0, '', 0),
(82, 3, 'SDFJDISFJKL34333', 0, '', 0),
(83, 3, 'SDFJDISFJKL34333', 0, '', 0),
(84, 3, 'SDFJDISFJKL34333', 0, '', 0),
(85, 3, 'SDFJDISFJKL34333', 0, '', 0),
(86, 3, 'SDFJDISFJKL34333', 0, '', 0),
(87, 3, 'SDFJDISFJKL34333', 0, '', 0),
(88, 3, 'SDFJDISFJKL34333', 0, '', 0),
(89, 3, 'SDFJDISFJKL34333', 0, '', 0),
(90, 3, 'SDFJDISFJKL34333', 0, '', 0),
(91, 3, 'SDFJDISFJKL34333', 0, '', 0),
(92, 3, 'SDFJDISFJKL34333', 0, '', 0),
(93, 3, 'SDFJDISFJKL34333', 0, '', 0),
(94, 3, 'SDFJDISFJKL34333', 0, '', 0),
(95, 3, 'SDFJDISFJKL34333', 0, '', 0),
(96, 3, 'SDFJDISFJKL34333', 0, '', 0),
(97, 3, 'SDFJDISFJKL34333', 0, '', 0),
(98, 3, 'SDFJDISFJKL34333', 0, '', 0),
(99, 3, 'SDFJDISFJKL34333', 0, '', 0),
(100, 3, 'SDFJDISFJKL34333', 0, '', 0),
(101, 3, 'SDFJDISFJKL34333', 0, '', 0),
(102, 3, 'SDFJDISFJKL34333', 0, '', 0),
(103, 3, 'SDFJDISFJKL34333', 0, '', 0),
(104, 3, 'SDFJDISFJKL34333', 0, '', 0),
(105, 3, 'SDFJDISFJKL34333', 0, '', 0),
(106, 3, 'SDFJDISFJKL34333', 0, '', 0),
(107, 3, 'SDFJDISFJKL34333', 0, '', 0),
(108, 3, 'SDFJDISFJKL34333', 0, '', 0),
(109, 3, 'SDFJDISFJKL34333', 0, '', 0),
(110, 3, 'SDFJDISFJKL34333', 0, '', 0),
(111, 3, 'SDFJDISFJKL34333', 0, '', 0),
(112, 3, 'SDFJDISFJKL34333', 0, '', 0),
(113, 3, 'SDFJDISFJKL34333', 0, '', 0),
(114, 3, 'SDFJDISFJKL34333', 0, '', 0),
(115, 3, 'SDFJDISFJKL34333', 0, '', 0),
(116, 3, 'SDFJDISFJKL34333', 0, '', 0),
(117, 3, 'SDFJDISFJKL34333', 0, '', 0),
(118, 3, 'SDFJDISFJKL34333', 0, '', 0),
(119, 3, 'SDFJDISFJKL34333', 0, '', 0),
(120, 3, 'SDFJDISFJKL34333', 0, '', 0),
(121, 3, 'SDFJDISFJKL34333', 0, '', 0),
(122, 3, 'SDFJDISFJKL34333', 0, '', 0),
(123, 3, 'SDFJDISFJKL34333', 0, '', 0),
(124, 3, 'SDFJDISFJKL34333', 0, '', 0),
(125, 3, 'SDFJDISFJKL34333', 0, '', 0),
(126, 3, 'SDFJDISFJKL34333', 0, '', 0),
(127, 3, 'SDFJDISFJKL34333', 0, '', 0),
(128, 3, 'SDFJDISFJKL34333', 0, '', 0),
(129, 3, 'SDFJDISFJKL34333', 0, '', 0),
(130, 3, 'SDFJDISFJKL34333', 0, '', 0),
(131, 3, 'SDFJDISFJKL34333', 0, '', 0),
(132, 3, 'SDFJDISFJKL34333', 0, '', 0),
(133, 3, 'SDFJDISFJKL34333', 0, '', 0),
(134, 3, 'SDFJDISFJKL34333', 0, '', 0),
(135, 3, 'SDFJDISFJKL34333', 0, '', 0),
(136, 3, 'SDFJDISFJKL34333', 0, '', 0),
(137, 3, 'SDFJDISFJKL34333', 0, '', 0),
(138, 3, 'SDFJDISFJKL34333', 0, '', 0),
(139, 3, 'SDFJDISFJKL34333', 0, '', 0),
(140, 3, 'SDFJDISFJKL34333', 0, '', 0),
(141, 3, 'SDFJDISFJKL34333', 0, '', 0),
(142, 3, 'SDFJDISFJKL34333', 0, '', 0),
(143, 3, 'SDFJDISFJKL34333', 0, '', 0),
(144, 3, 'SDFJDISFJKL34333', 0, '', 0),
(145, 3, 'SDFJDISFJKL34333', 0, '', 0),
(146, 3, 'SDFJDISFJKL34333', 0, '', 0),
(147, 3, 'SDFJDISFJKL34333', 0, '', 0),
(148, 3, 'SDFJDISFJKL34333', 0, '', 0),
(149, 3, 'SDFJDISFJKL34333', 0, '', 0),
(150, 3, 'SDFJDISFJKL34333', 0, '', 0),
(151, 3, 'SDFJDISFJKL34333', 0, '', 0),
(152, 3, 'SDFJDISFJKL34333', 0, '', 0),
(153, 3, 'SDFJDISFJKL34333', 0, '', 0),
(154, 3, 'SDFJDISFJKL34333', 0, '', 0),
(155, 3, 'SDFJDISFJKL34333', 0, '', 0),
(156, 3, 'SDFJDISFJKL34333', 0, '', 0),
(157, 3, 'SDFJDISFJKL34333', 0, '', 0),
(158, 3, 'SDFJDISFJKL34333', 0, '', 0),
(159, 3, 'SDFJDISFJKL34333', 0, '', 0),
(160, 3, 'SDFJDISFJKL34333', 0, '', 0),
(161, 3, 'SDFJDISFJKL34333', 0, '', 0),
(162, 3, 'SDFJDISFJKL34333', 0, '', 0),
(163, 3, 'SDFJDISFJKL34333', 0, '', 0),
(164, 3, 'SDFJDISFJKL34333', 0, '', 0),
(165, 3, 'SDFJDISFJKL34333', 0, '', 0),
(166, 3, 'SDFJDISFJKL34333', 0, '', 0),
(167, 3, 'SDFJDISFJKL34333', 0, '', 0),
(168, 3, 'SDFJDISFJKL34333', 0, '', 0),
(169, 3, 'SDFJDISFJKL34333', 0, '', 0),
(170, 3, 'SDFJDISFJKL34333', 0, '', 0),
(171, 3, 'SDFJDISFJKL34333', 0, '', 0),
(172, 3, 'SDFJDISFJKL34333', 0, '', 0),
(173, 3, 'SDFJDISFJKL34333', 0, '', 0),
(174, 3, 'SDFJDISFJKL34333', 0, '', 0),
(175, 3, 'SDFJDISFJKL34333', 0, '', 0),
(176, 3, 'SDFJDISFJKL34333', 0, '', 0);

-- --------------------------------------------------------

--
-- 表的结构 `dbs_coupon_code_data`
--

CREATE TABLE IF NOT EXISTS `dbs_coupon_code_data` (
  `c_id` mediumint(8) unsigned NOT NULL DEFAULT '0' COMMENT '优惠码ID',
  `fetch_limit` tinyint(3) unsigned NOT NULL DEFAULT '0',
  `directions` text NOT NULL COMMENT '使用说明',
  `prompt` text NOT NULL COMMENT '温馨提示',
  `yesterdayfetched` mediumint(8) unsigned NOT NULL DEFAULT '0',
  `dayfetched` mediumint(8) unsigned NOT NULL DEFAULT '0',
  `weekfetched` mediumint(8) unsigned NOT NULL DEFAULT '0',
  `monthfetched` mediumint(8) unsigned NOT NULL DEFAULT '0',
  `updatetime` int(11) unsigned NOT NULL DEFAULT '0',
  `seo_title` varchar(255) NOT NULL,
  `seo_keywords` varchar(200) NOT NULL,
  `seo_desc` varchar(200) NOT NULL,
  KEY `c_id` (`c_id`),
  KEY `yesterdayfetched` (`yesterdayfetched`,`dayfetched`,`weekfetched`,`monthfetched`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `dbs_coupon_code_data`
--

INSERT INTO `dbs_coupon_code_data` (`c_id`, `fetch_limit`, `directions`, `prompt`, `yesterdayfetched`, `dayfetched`, `weekfetched`, `monthfetched`, `updatetime`, `seo_title`, `seo_keywords`, `seo_desc`) VALUES
(1, 101, '面值：满300减20元（本券仅限大家电、生活电器类目商品，特价商品不能使用）\r\n注意：一个易迅网账号仅限使用一次优惠代码 ', '本券为“公用券”，直接提供一个公用的优惠券代码，一般不限定使用次数，每个人都可以使用该公用券代码。', 2, 23, 23, 27, 1337041153, '', '', ''),
(2, 101, '面值：满50减5元（特价商品不能使用）\r\n注意：一个易迅网账号仅限使用一次优惠代码', '本券为“公用券”，直接提供一个公用的优惠券代码，一般不限定使用次数，每个人都可以使用该公用券代码.\r\n不支持批发，代购，倒卖优惠券等违规方式，如果发现此类违规行为或其它恶意领取优惠券行为，我们将公开优惠券，购买的券也会不退款，并封掉支付宝账号！', 0, 2, 2, 3, 1337032042, '易迅优惠券—满50元减5元', '', ''),
(3, 101, '1、购物满100-20，非特例品下单满110可以减30.此礼品卡电脑上凡客手机网下单就可以实现满110减30元，无需手机.整个下单过程全部在电脑上完成。(第一次使用的买家请看上面链接的图示下单过程)\r\n2、此礼品卡适用范围:全场通用(包含特价商品,圣诞价.感恩价,特例品,断码价,限时抢购,店庆价商品),团购,秒杀和换购不能使用,还有购物车下方的特惠品也不能使用的.\r\n3、现在凡客是满99元包邮，能使用此礼品卡就是包邮的。\r\n4、礼品卡只能抵消20元,其余金额自动减的.\r\n6、官网会提示不支持此平台,请按照上面图示步骤下单，电脑上直接可以下单。\r\n\r\n礼品卡使用方法:\r\n1、在凡客官网登录以后,把挑好的商品都放在购物车.\r\n2、电脑浏览器打开[url]http://m.vancl.com/[/url]\r\n3、登录你的凡客帐号,点购物车,去结算.\r\n4、在m.vancl.com结算时，不使用礼品卡，直接提交订单。如果购买的非特例品，这时可以优惠10元。\r\n5、回到官网[url]http://www.vancl.com[/url],修改订单，使用礼品卡。你可以看到抵现金20元(其中20元礼品卡+手机网下单减10元),然后点确认购买提交订单。', '本券为“收费券”，由券妈妈优惠券网收费发放，领取需要支付一定费用，但是券的优惠力度比较大。出售的优惠券都是通过券妈妈验证，请大家放心购买。请大家看清楚优惠券说明后才购买，因为优惠券都是电子密码，买错或买了不想用了都不接受退货哦。券妈妈出售的券给大家的价格基本都是批发价格！如果感觉券妈妈不错，麻烦向您的朋友，同学或者同事宣传我们。券妈妈需要大家的支持，来不断提升券妈妈影响力，为大家争取更优惠更便宜的优惠券。                                        券妈妈不支持批发，代购，倒卖优惠券等违规方式，如果发现此类违规行为或其它恶意领取优惠券行为，我们将公开优惠券，购买的券也会不退款，并封掉支付宝账号！', 0, 1, 1, 1, 1338159769, '', '', ''),
(4, 101, '[size=18px][color=#ff0000][b]注意看下面的使用说明：\r\n[/b][/size][/color]注意是账号券，领取的是一个新的俏物悄语账号，[size=12px][color=#ff0000][b]所以不能使用您自己原来的账号来下单，而是使用领取到的账号和密码去俏物悄语登陆，登陆进去后请立即改掉密码。\r\n[/b][/size][/color]领取优惠券以后看到的是  券号：abc   密码：abc   用这个做为账户密码在俏物俏语登陆。\r\n\r\n[b][color=#ff0000]1：利用领取的账户密码在俏物悄语登录。[/color][/b]\r\n\r\n[img]http://www.quanlaoda.com/static/team/2012/0529/13382750255681.jpg[/img]\r\n\r\n[color=#ff0000][b]2：在付款那一步，点击“使用积分”，填入 600 ，会自动减少6元。[/b][/color]\r\n\r\n[img=,458,141]http://www.quanlaoda.com/static/team/2012/0529/13382750144062.jpg[/img]', '', 0, 0, 0, 0, 0, '', '俏物悄语优惠券 俏物悄语代金券', '俏物悄语优惠券 俏物悄语代金券');

-- --------------------------------------------------------

--
-- 表的结构 `dbs_coupon_code_mall`
--

CREATE TABLE IF NOT EXISTS `dbs_coupon_code_mall` (
  `id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `c_id` smallint(5) unsigned NOT NULL DEFAULT '0',
  `name` varchar(200) NOT NULL,
  `name_match` varchar(255) NOT NULL,
  `website` varchar(200) NOT NULL,
  `gourl` varchar(150) NOT NULL DEFAULT '' COMMENT '购买跳转地址',
  `tel` varchar(50) NOT NULL,
  `description` text NOT NULL,
  `how2use` text NOT NULL,
  `logo` varchar(100) NOT NULL,
  `figure_image` varchar(100) NOT NULL,
  `sort_order` smallint(5) unsigned NOT NULL DEFAULT '9999',
  `is_active` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `hitnum` mediumint(8) unsigned NOT NULL DEFAULT '1',
  `yesterdaysearched` mediumint(8) unsigned NOT NULL DEFAULT '0',
  `daysearched` mediumint(8) unsigned NOT NULL DEFAULT '0',
  `weeksearched` mediumint(8) unsigned NOT NULL DEFAULT '0',
  `monthsearched` mediumint(8) unsigned NOT NULL DEFAULT '0',
  `updatetime` int(11) unsigned NOT NULL DEFAULT '0',
  `seo_title` varchar(200) NOT NULL,
  `seo_keywords` varchar(200) NOT NULL,
  `seo_desc` varchar(200) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `c_id` (`c_id`),
  KEY `is_active` (`is_active`),
  KEY `yesterdaysearched` (`yesterdaysearched`,`daysearched`,`weeksearched`,`monthsearched`),
  FULLTEXT KEY `name_match` (`name_match`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=7 ;

--
-- 转存表中的数据 `dbs_coupon_code_mall`
--

INSERT INTO `dbs_coupon_code_mall` (`id`, `c_id`, `name`, `name_match`, `website`, `gourl`, `tel`, `description`, `how2use`, `logo`, `figure_image`, `sort_order`, `is_active`, `hitnum`, `yesterdaysearched`, `daysearched`, `weeksearched`, `monthsearched`, `updatetime`, `seo_title`, `seo_keywords`, `seo_desc`) VALUES
(1, 1, '红孩子', '红 孩子', 'http://www.redbaby.com.cn', 'http://www.redbaby.com.cn', '010-88499999', '红孩子优惠券提供最新2011年红孩子优惠券,红孩子优惠卷，红孩子电子优惠券，红孩子优惠券2011，红孩子10元免费优惠券等。 红孩子(redbaby.com.cn)-专业的母婴网上商场，商品包括：奶粉、纸尿裤、化妆品、玩具、数码、家电、手机、等数万种商品直销, 便捷，诚信的服务，为您提供方便快捷的购物方式和价廉物美的产品', '首先：', '201204/a6504c30db5481e8ce67c947c94224b7.jpg', '201204/6ad7cd72f6bdfc119f8dba4e1e0c45a8.jpg', 2, 1, 1, 1, 1, 1, 1, 1338877825, '', '', ''),
(2, 1, '易迅', '易迅', 'http://www.icson.com', 'http://www.icson.com', '400 640 1878', '易迅网由上海易迅电子商务发展有限公司于2006年创建，并通过强大的大规模集约采购优势、丰富的电子商务管理服务经验和最先进的互联网技术为用户提供最新最好的时尚精选商品。\r\n易迅网一直以来以“诚信”作为公司和每位员工的行为准则，以“超越客户期望”为目标，致力于为用户提供丰富的商品选择、便捷的购物方式和完善的售后服务，打造更好的E时代购物体验。', '将商品加入购物车，点击“去结算”，在“填写核对订单”—订单结算中，输入正确的优惠券密码，\r\n\r\n点击“使用”按钮，则会提示“成功使用优惠券”，订单提交后优惠券即被使用成功。\r\n\r\n[img]http://www.quanmama.com/shiyongimg/51buy.jpg[/img]', '201204/ab8c91c79a2aa3f54122540845d505d7.jpg', '201204/ab8c91c79a2aa3f54122540845d505d7.jpg', 9999, 1, 1, 0, 2, 2, 3, 1338157518, '', '', ''),
(3, 2, '凡客诚品', '凡 客 诚 品', 'http://www.vancl.com', 'http://www.vancl.com', '400-650-7099', '凡客诚品是网上服装商城，在线销售全棉衬衫、牛津纺衬衫、免烫衬衫、T恤、POLO、休闲裤、卡其裤、牛仔裤、棉线衫、外套、卫衣、毛衣、背心、短裤、鞋、领带、内衣、袜子、家居。凡客提供优质服务。全场购物免费送货上门。无条件退换货。凡客优惠券提供最新凡客诚品优惠券,vancl优惠券,凡客优惠卷,2010凡客优惠券，凡客代金券,凡客现金券，凡客礼品卡等。', '凡客优惠券就是凡客礼品卡，登陆凡客网站后，选好东西加入购物车，结算提交订单前使用凡客优惠券(凡客礼品卡)。\r\n\r\n礼品卡是在订单结算的时候使用的，在支付方式的地方选中礼品卡支付，会显示出账户获得的未使用的礼品卡，\r\n\r\n选中要使用的礼品卡后点击“使用礼品卡”即可验证使用，如果想要使用通过其他渠道获得的礼品卡，\r\n\r\n可以选择填写其他礼品卡，手动输入卡号、密码后也可以直接验证使用，具体使用方法请看下图：\r\n\r\n[img]http://www.quanmama.com/shiyongimg/vancl.jpg[/img]', '201205/b16fa6ce3ce448421454089bbf489162.png', '201205/4f21de81001172370eb4b77672ae960d.jpg', 9999, 1, 1, 0, 0, 0, 0, 0, '', '', ''),
(4, 3, '麦包包', '麦 包包', 'http://www.mbaobao.com', 'http://www.mbaobao.com', '4006-528-528', '麦包包诞生于2007年9月，由意大利近百年历史的箱包家族集团VISCONTI DIFFUSIONE SNC提供天使基金设立而成。麦包包致力于打造箱包快速时尚新模式，为中国的消费者提供高性价比的多品牌时尚箱包产品。目前，麦包包拥有多个时尚品牌，如浪美、飞扬空间、DUDU、JAMIE MOORE、戈尔本等；并独家网络代理香港薇茉、台湾哈森等国际国内知名品牌产品。网站拥有近万款箱包品种及数量，产品线涉及时尚、商务、休闲、户外运动等多个系列。', '[b]1、如何使用麦包包优惠券[/b]\r\n\r\n     在购物车"填写核对订单信息"页面中的"使用优惠券/现金券"区域输入您的优惠券/现金券编号，并点击"使用"按钮\r\n     （请留意橘黄色线框中的内容），同时可通过点击右侧的"查看可用优惠券"快速找到您当前可用的优惠券/现金券；\r\n\r\n[img]http://www.quanmama.com/shiyongimg/mbaobao1.jpg[/img]\r\n\r\n[b]2、查看我的麦包包优惠券[/b]\r\n     登录"我的麦包包"，点击"我的优惠券"查看。\r\n[img]http://www.quanmama.com/shiyongimg/mbaobao2.png[/img]\r\n\r\n[b]3、如何使用麦包包礼品券[/b]\r\n\r\n  在"填写核对订单信息"页面中的"礼品券"区域输入您的礼品券，并点击"使用"按钮（请留意橘黄色线框中的内容）；\r\n\r\n[list][*][img]http://www.quanmama.com/shiyongimg/mbaobao3.jpg[/img][/list]', '201205/04f302f36319816cdc746a385c051674.jpg', '201205/ee75ffe9bd13e3ce3e8fda98507a1eac.jpg', 9999, 1, 1, 0, 1, 1, 2, 1338026086, '', '', ''),
(5, 1, '为为网', '', 'http://www.homevv.com', 'http://www.homevv.com', '021-56467882', '由易饰嘉开发、运营的为为网 （原国际家居网），2010年正式上线，是专业致力于打造生活消费的现代电子商务网站，主要由为为商城、居家商城、机票/度假等业务组成。      \r\n    为为网以“为您所想、为您所需”为服务宗旨，倡导“用鼠标点亮生活，畅享品质新购物”的现代生活理念，商品覆盖食品、日用、数码、美妆、母婴、家电、居家、运动、家具等多个领域，开辟“为为网网货体验馆”方便网友体验实地购物。', '[color=#ff0000][size=18px][color=#000000]点击订单提交页面“结算信息”一栏中“使用 为为 礼品券”链接，在展开的表单中输入礼品券密码，然后点击下面礼品券信息右边的“使用”链接，即可抵扣相应货款。[/color][/size][/color]\r\n\r\n[color=#ff0000][size=18px][color=#000000]每位客户在您自己账户中的“我的账户--礼品券”中可查询到您的，礼品券的有效期，金额等详细情况。[/color][/size][/color] \r\n\r\n[img]http://www.quanlaoda.com/static/team/2011/1129/13225595304123.jpg[/img]\r\n\r\n[img]http://www.quanlaoda.com/static/team/2011/1129/13225595383183.jpg[/img]', '201206/68c2f3637f80919fcab0d019e82b8070.jpg', '201206/01a8098f723abc2d83fa7be5c158431a.gif', 9999, 1, 1, 0, 1, 1, 1, 1338877806, '为为网优惠券、代金券', '为为网优惠券 为为网代金券', '为为商城、居家商城、机票/度假等业务'),
(6, 1, '俏物悄语', '', 'http://www.ihush.com', 'http://www.ihush.com', '400-666-1212', 'ihush是提供直接来自于各大young fashion品牌五折以下特卖单品的网络特卖会平台。\r\n在欧洲，由专业购物类网站搭建平台并提供客服，由各大品牌提供特卖货源的网络特卖会网站，已成为十分风行的销售模式。消费者可以突破实际的空间和场地限制，利用网络平台，获取特卖信息，第一时间选购心仪单品。', '登录俏物悄语，购物结算时输入券码，点击激活，提交订单即可；\r\n\r\n[img]http://www.quanlaoda.com/static/team/2012/0412/13342299483013.jpg[/img]', '201206/b0cca87bf718266683040195ff66febe.jpg', '201206/2af73944582f6bc8f4e9b528ae0793b1.jpg', 9999, 1, 1, 0, 0, 0, 0, 0, '俏物悄语优惠券、代金券', '俏物悄语 特卖 的 消费者 第一时间 ', '俏物悄语 特卖 的 消费者 第一时间 ');

-- --------------------------------------------------------

--
-- 表的结构 `dbs_coupon_mall_rec`
--

CREATE TABLE IF NOT EXISTS `dbs_coupon_mall_rec` (
  `id` smallint(6) unsigned NOT NULL AUTO_INCREMENT,
  `c_id` smallint(5) unsigned NOT NULL,
  `position` tinyint(3) unsigned NOT NULL DEFAULT '0',
  `sort_order` smallint(5) unsigned NOT NULL DEFAULT '10000',
  PRIMARY KEY (`id`),
  KEY `position` (`position`,`sort_order`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=11 ;

--
-- 转存表中的数据 `dbs_coupon_mall_rec`
--

INSERT INTO `dbs_coupon_mall_rec` (`id`, `c_id`, `position`, `sort_order`) VALUES
(6, 1, 102, 1),
(8, 1, 101, 1),
(9, 4, 101, 10000),
(10, 3, 101, 10000);

-- --------------------------------------------------------

--
-- 表的结构 `dbs_friend_link`
--

CREATE TABLE IF NOT EXISTS `dbs_friend_link` (
  `link_id` smallint(5) unsigned NOT NULL AUTO_INCREMENT,
  `site_name` varchar(100) NOT NULL,
  `position_id` tinyint(3) unsigned NOT NULL,
  `link_type` tinyint(1) unsigned NOT NULL,
  `link_url` varchar(200) NOT NULL,
  `sort_order` smallint(5) unsigned NOT NULL DEFAULT '1',
  `link_code` varchar(150) NOT NULL,
  PRIMARY KEY (`link_id`),
  KEY `position_id` (`position_id`,`link_type`,`sort_order`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- 转存表中的数据 `dbs_friend_link`
--

INSERT INTO `dbs_friend_link` (`link_id`, `site_name`, `position_id`, `link_type`, `link_url`, `sort_order`, `link_code`) VALUES
(1, '嫁娶网', 101, 2, 'http://www.ijiaqu.com', 1, '201205/4af9d6b41ca3f500557af918c39462e5.png'),
(3, '极好居', 101, 1, 'http://www.jihaoju.com', 2, '极好居'),
(4, '青番茄', 101, 1, 'http://www.qfanqie.com', 3, '青番茄');

-- --------------------------------------------------------

--
-- 表的结构 `dbs_mall_promotion`
--

CREATE TABLE IF NOT EXISTS `dbs_mall_promotion` (
  `id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `cate_id` smallint(5) unsigned NOT NULL DEFAULT '0',
  `m_id` mediumint(8) unsigned NOT NULL DEFAULT '0',
  `m_name` varchar(200) NOT NULL,
  `title` varchar(200) NOT NULL,
  `gourl` varchar(150) NOT NULL DEFAULT '' COMMENT '购买跳转地址',
  `description` text NOT NULL,
  `logo` varchar(100) NOT NULL,
  `sort_order` smallint(5) unsigned NOT NULL DEFAULT '9999',
  `expiry` int(11) unsigned NOT NULL DEFAULT '0',
  `addtime` int(11) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `c_id` (`cate_id`),
  KEY `m_id` (`m_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- 转存表中的数据 `dbs_mall_promotion`
--

INSERT INTO `dbs_mall_promotion` (`id`, `cate_id`, `m_id`, `m_name`, `title`, `gourl`, `description`, `logo`, `sort_order`, `expiry`, `addtime`) VALUES
(1, 1, 1, '红孩子', '盛夏促销 宝宝食品6.5折优惠', 'http://www.waipowang.com/bbfood/', '盛夏促销，宝宝食品6.5折优惠中。全场汇集了亨氏、多美滋、惠氏、雅培、美赞臣等知名品牌，价格很多都比其他商城便宜，还支持优惠券，很给力哈！', '201205/5378b77ee7a6be8730cbd19c8c2c941e.jpg', 9999, 1338191999, 1338075684);

-- --------------------------------------------------------

--
-- 表的结构 `dbs_mall_zhekou`
--

CREATE TABLE IF NOT EXISTS `dbs_mall_zhekou` (
  `id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `cate_id` smallint(5) unsigned NOT NULL DEFAULT '0',
  `m_id` mediumint(8) unsigned NOT NULL DEFAULT '0',
  `m_name` varchar(200) NOT NULL,
  `title` varchar(200) NOT NULL,
  `gourl` varchar(150) NOT NULL DEFAULT '' COMMENT '购买跳转地址',
  `description` text NOT NULL,
  `logo` varchar(100) NOT NULL,
  `sort_order` smallint(5) unsigned NOT NULL DEFAULT '9999',
  `price` float unsigned NOT NULL DEFAULT '0',
  `addtime` int(11) unsigned NOT NULL DEFAULT '0',
  `use_coupon` tinyint(1) unsigned NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`),
  KEY `c_id` (`cate_id`),
  KEY `m_id` (`m_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- 转存表中的数据 `dbs_mall_zhekou`
--

INSERT INTO `dbs_mall_zhekou` (`id`, `cate_id`, `m_id`, `m_name`, `title`, `gourl`, `description`, `logo`, `sort_order`, `price`, `addtime`, `use_coupon`) VALUES
(2, 4, 2, '易迅', '英特曼JR2165六位带总开关1.8米插座 上海、湖北站16元包邮', 'http://p.yiqifa.com/c?s=cc3477d4&w=369822&c=4330&i=4984&l=0&e=&t=http://item.51buy.com/item-208046.html', '英特曼JR2165六位带总开关1.8米插座，易迅上海、湖北站16元，附近城市包邮。同款亚马逊49元，国美、京东、当当均35元。', '201205/243cddd467ffed79daac1b0f77cebc3e.jpg', 9999, 16, 1338147171, 1),
(3, 2, 3, '凡客诚品', '韩都衣舍2012夏装条纹修身连衣裙 三款任选一 仅59元包邮', 'http://www.yihaodian.com/tuangou/detail.do?grouponId=14166&tracker_u=1032594675', '韩都衣舍2012夏装条纹修身连衣裙(3选1)，1号店59包邮，均为全网最低价。如韩都衣舍EK1714，京东、天猫158元。差价巨大！', '201205/e1cb6c911977e27df8f5d37290bca15e.png', 9999, 59, 1338158211, 0);

-- --------------------------------------------------------

--
-- 表的结构 `dbs_payment`
--

CREATE TABLE IF NOT EXISTS `dbs_payment` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` mediumint(8) unsigned NOT NULL DEFAULT '0',
  `nick` varchar(50) NOT NULL,
  `out_trade_no` varchar(50) NOT NULL,
  `trade_no` varchar(50) NOT NULL,
  `amount` float unsigned NOT NULL DEFAULT '0',
  `content` varchar(255) NOT NULL,
  `addtime` int(11) unsigned NOT NULL DEFAULT '0',
  `status` tinyint(3) unsigned NOT NULL DEFAULT '101',
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`,`addtime`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=21 ;

--
-- 转存表中的数据 `dbs_payment`
--

INSERT INTO `dbs_payment` (`id`, `user_id`, `nick`, `out_trade_no`, `trade_no`, `amount`, `content`, `addtime`, `status`) VALUES
(18, 5, '极好居网', '201205030247229404', '2012050344179815', 0.01, '在线充值', 1335998842, 105),
(2, 64, '极好居网', '201204281202046140', '', 0.01, '在线充值', 1335513724, 104),
(3, 64, '极好居网', '201204281205429480', '', 0.01, '在线充值', 1335513942, 104),
(15, 5, '嫁娶网', '201205030222051685', '2012050343649915', 0.01, '在线充值', 1335997325, 102),
(5, 5, '极好居网', '201204281016345237', '', 0.01, '在线充值', 1335550594, 104),
(6, 5, '极好居网', '201204281019453122', '', 0.01, '在线充值', 1335550785, 104),
(16, 5, '嫁娶网', '201205030230319353', '2012050343818815', 0.01, '在线充值', 1335997831, 104),
(17, 5, '极好居网', '201205030237093358', '2012050343957015', 0.01, '在线充值', 1335998229, 104),
(14, 5, '嫁娶网', '201205030120340651', '2012050342380015', 0.01, '在线充值', 1335993634, 102),
(19, 64, '极好居网', '201205061116419748', '', 2, '在线充值', 1336288601, 103),
(20, 16, '酒色财气', '201205140121525784', '2012051401869315', 0.01, '在线充值', 1336944112, 105);

-- --------------------------------------------------------

--
-- 表的结构 `dbs_site_config`
--

CREATE TABLE IF NOT EXISTS `dbs_site_config` (
  `id` smallint(5) unsigned NOT NULL AUTO_INCREMENT,
  `parent_id` smallint(5) unsigned NOT NULL DEFAULT '0',
  `code` varchar(30) NOT NULL DEFAULT '',
  `type` varchar(10) NOT NULL DEFAULT '',
  `store_range` varchar(255) NOT NULL DEFAULT '',
  `store_dir` varchar(255) NOT NULL DEFAULT '',
  `value` text NOT NULL,
  `sort_order` tinyint(3) unsigned NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`),
  UNIQUE KEY `code` (`code`),
  KEY `parent_id` (`parent_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=954 ;

--
-- 转存表中的数据 `dbs_site_config`
--

INSERT INTO `dbs_site_config` (`id`, `parent_id`, `code`, `type`, `store_range`, `store_dir`, `value`, `sort_order`) VALUES
(1, 0, 'site_info', 'group', '', '', '', 1),
(5, 0, 'smtp', 'group', '', '', '', 1),
(6, 0, 'hidden', 'hidden', '', '', '', 1),
(101, 1, 'site_name', 'text', '', '', 'TP-COUPON', 1),
(501, 5, 'smtp_host', 'text', '', '', '', 1),
(502, 5, 'smtp_port', 'text', '', '', '25', 1),
(503, 5, 'smtp_user', 'text', '', '', '', 1),
(504, 5, 'smtp_pass', 'password', '', '', '', 1),
(505, 5, 'smtp_mail', 'text', '', '', '', 1),
(506, 5, 'mail_charset', 'select', 'UTF8,GB2312,BIG5', '', 'UTF8', 1),
(507, 5, 'mail_service', 'select', '0,1', '', '1', 0),
(919, 1, 'site_keywords', 'textarea', '', '', '网购 优惠券 京东优惠券 当当优惠券 凡客优惠券', 3),
(617, 6, 'captcha', 'hidden', '', '', '24', 1),
(618, 6, 'captcha_width', 'hidden', '', '', '100', 1),
(619, 6, 'captcha_height', 'hidden', '', '', '35', 1),
(912, 1, 'time_format', 'text', '', '', 'Y-m-d H:i:s', 6),
(913, 1, 'date_format', 'text', '', '', 'Y-m-d', 5),
(914, 1, 'timezone', 'options', '-12,-11,-10,-9,-8,-7,-6,-5,-4,-3.5,-3,-2,-1,0,1,2,3,3.5,4,4.5,5,5.5,5.75,6,6.5,7,8,9,9.5,10,11,12', '', '8', 7),
(917, 1, 'open_gzip', 'select', '0,1', '', '1', 8),
(918, 1, 'site_title', 'text', '', '', '中国领先的优惠券平台', 2),
(920, 1, 'site_description', 'textarea', '', '', '中国领先的优惠券平台', 4),
(7, 0, 'sms', 'group', '', '', '', 1),
(921, 7, 'sms_url_send', 'text', '', '', '', 1),
(922, 7, 'sms_url_sendtime', 'text', '', '', '', 1),
(923, 7, 'sms_url_get', 'text', '', '', '', 1),
(924, 7, 'sms_cdkey', 'text', '', '', '', 1),
(925, 7, 'sms_password', 'text', '', '', '', 1),
(926, 1, 'thumb_width', 'text', '', '', '75', 9),
(927, 1, 'thumb_height', 'text', '', '', '75', 10),
(928, 1, 'image_water_path', 'text', '', '', './Public/Images/logo.png', 11),
(929, 1, 'site_domain', 'text', '', '', 'www.qfanqie.com', 12),
(930, 1, 'data_cache_time', 'text', '', '', '2', 13),
(931, 1, 'service_qq', 'text', '', '', '89249294', 14),
(932, 1, 'weibo_sina', 'text', '', '', 'jihaoju', 15),
(933, 1, 'weibo_qq', 'text', '', '', 'jihaoju', 16),
(934, 0, 'payment', 'group', '', '', '', 1),
(935, 934, 'alipay_partner', 'text', '', '', '', 16),
(936, 934, 'alipay_key', 'password', '', '', '', 17),
(937, 934, 'alipay_seller_email', 'text', '', '', '', 18),
(938, 1, 'icp_number', 'text', '', '', '浙ICP备11023469号', 19),
(939, 934, 'alipay_type', 'options', 'direct,warrant', '', 'warrant', 20),
(942, 1, 'code_in_secret', 'text', '', '', '4', 22),
(941, 1, 'url_rewrite', 'options', '0,1', '', '1', 21),
(943, 1, 'invite_credit', 'text', '', '', '6', 23),
(946, 945, 'qq_appid', 'text', '', '', '', 25),
(945, 0, 'open_platform', 'group', '', '', '', 24),
(944, 1, 'statis_code', 'textarea', '', '', '', 23),
(947, 945, 'qq_appkey', 'text', '', '', '', 26),
(948, 945, 'qq_open', 'select', '0,1', '', '0', 27),
(949, 945, 'sina_wb_akey', 'text', '', '', '', 28),
(950, 945, 'sina_wb_skey', 'text', '', '', '', 29),
(951, 945, 'sina_wb_office_id', 'text', '', '', '', 30),
(952, 945, 'sina_wb_open', 'select', '0,1', '', '0', 31),
(953, 1, 'max_left_days', 'text', '', '', '2', 32);

-- --------------------------------------------------------

--
-- 表的结构 `dbs_user`
--

CREATE TABLE IF NOT EXISTS `dbs_user` (
  `user_id` smallint(5) unsigned NOT NULL AUTO_INCREMENT,
  `email` varchar(60) NOT NULL DEFAULT '',
  `nick` varchar(60) NOT NULL DEFAULT '',
  `name` varchar(40) CHARACTER SET ucs2 NOT NULL,
  `password` char(32) NOT NULL,
  `last_login` int(11) unsigned NOT NULL DEFAULT '0',
  `last_ip` varchar(15) NOT NULL DEFAULT '',
  `msn` varchar(60) NOT NULL,
  `qq` varchar(20) NOT NULL,
  `tel_phone` varchar(20) NOT NULL,
  `mobile_phone` varchar(20) NOT NULL,
  `addr` varchar(100) NOT NULL COMMENT '地址',
  `is_locked` tinyint(1) unsigned NOT NULL DEFAULT '0' COMMENT '封锁',
  `money` float unsigned NOT NULL DEFAULT '0' COMMENT '金额',
  `credit` smallint(6) unsigned NOT NULL DEFAULT '0' COMMENT '积分',
  `addtime` int(11) unsigned NOT NULL DEFAULT '0',
  `invite` mediumint(8) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`user_id`),
  KEY `invite` (`invite`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=519 ;

--
-- 转存表中的数据 `dbs_user`
--

INSERT INTO `dbs_user` (`user_id`, `email`, `nick`, `name`, `password`, `last_login`, `last_ip`, `msn`, `qq`, `tel_phone`, `mobile_phone`, `addr`, `is_locked`, `money`, `credit`, `addtime`, `invite`) VALUES
(2, '76214@126.com', '情迷布拉格', '', '10f8eda38280fa5d7e6bfd8922fac6ca', 1338160889, '127.0.0.1', '', '', '', '', '', 0, 0, 0, 0, 0),
(518, 'service@jihaoju.com', '极好居网', '', '10f8eda38280fa5d7e6bfd8922fac6ca', 1335644075, '116.255.188.64', '', '', '', '', '', 0, 0, 0, 0, 0),
(5, '81547@126.com', '淡无盐', '', '10f8eda38280fa5d7e6bfd8922fac6ca', 1338160999, '127.0.0.1', '', '', '', '', '', 0, 0.02, 2, 0, 0),
(7, '81569@126.com', '流星的美', '', '9baf246be54709399a827a46f6ba9637', 1335771890, '127.0.0.1', '', '', '', '', '', 0, 0, 100, 0, 0),
(64, 'jihaoju@qq.com', '极好居网', '', '10f8eda38280fa5d7e6bfd8922fac6ca', 1336287792, '127.0.0.1', '', '', '', '', '', 0, 10, 0, 0, 0),
(65, 'hao123@qq.com', 'hao123', '', 'e10adc3949ba59abbe56e057f20f883e', 1336547614, '127.0.0.1', '', '', '', '', '', 0, 0, 0, 0, 0),
(9, 'hao1234@qq.com', 'hao1234', '', 'e10adc3949ba59abbe56e057f20f883e', 1336687183, '127.0.0.1', '', '', '', '', '', 0, 0, 6, 0, 0),
(11, 'hao1234567@qq.com', 'hao1234567', '', 'e10adc3949ba59abbe56e057f20f883e', 1336611350, '127.0.0.1', '', '', '', '', '', 0, 0, 0, 1336620315, 9),
(12, 'abc123@qq.com', 'abc123', '', 'e10adc3949ba59abbe56e057f20f883e', 1336688163, '127.0.0.1', '', '', '', '', '', 0, 0, 0, 1336688145, 0),
(13, 'abc12345@qq.com', 'abc12345', '', 'e10adc3949ba59abbe56e057f20f883e', 1336688247, '127.0.0.1', '', '', '', '', '', 0, 0, 0, 1336688229, 0),
(14, 'abcd123@qq.com', 'abcd123', '', 'e10adc3949ba59abbe56e057f20f883e', 1336688337, '127.0.0.1', '', '', '', '', '', 0, 0, 0, 1336688324, 0),
(15, 'abcd1234@qq.com', 'abcd1234', '', 'e10adc3949ba59abbe56e057f20f883e', 1336688429, '127.0.0.1', '', '', '', '', '', 0, 0, 0, 1336688411, 0),
(16, '837980602@qq.com', '酒色财气', '', 'e10adc3949ba59abbe56e057f20f883e', 1336944343, '127.0.0.1', '', '', '', '', '', 0, 0, 0, 1336943952, 0),
(17, '174674109@qq.com', '肖安球', '', '10f8eda38280fa5d7e6bfd8922fac6ca', 1337898563, '127.0.0.1', '', '', '', '', '', 0, 0, 0, 1337898562, 0);

-- --------------------------------------------------------

--
-- 表的结构 `dbs_user_platform`
--

CREATE TABLE IF NOT EXISTS `dbs_user_platform` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` mediumint(8) unsigned NOT NULL DEFAULT '0',
  `type` varchar(10) NOT NULL,
  `openid` varchar(50) NOT NULL DEFAULT '',
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COMMENT='会员与开发平台帐号关联表' AUTO_INCREMENT=9 ;

--
-- 转存表中的数据 `dbs_user_platform`
--

INSERT INTO `dbs_user_platform` (`id`, `user_id`, `type`, `openid`) VALUES
(8, 17, 'qq', 'B11562861783EE2DF8B9095F43629FE1'),
(7, 2, 'qq', 'F3922E1A1F47FB564F897C41BFD3FD73'),
(6, 5, 'sina', '2507337250');

-- --------------------------------------------------------

--
-- 表的结构 `dbs_zhekou_category`
--

CREATE TABLE IF NOT EXISTS `dbs_zhekou_category` (
  `id` smallint(5) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `sort_order` smallint(5) unsigned NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- 转存表中的数据 `dbs_zhekou_category`
--

INSERT INTO `dbs_zhekou_category` (`id`, `name`, `sort_order`) VALUES
(2, '服装', 1),
(3, '化妆品', 2),
(4, '数码产品', 3);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

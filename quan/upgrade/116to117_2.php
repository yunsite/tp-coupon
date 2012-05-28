<?php
/**
 * 第二步
 */
define('IN_TP_COUPON', TRUE);
include_once('./global.php');
include_once('./classes/db.class.php');
if(isPost()){
	$conf = include('../Conf/db_config.php');
	$tablepre = $conf['DB_PREFIX'];
	$db = new dbstuff;
	$db->connect($conf['DB_HOST'], $conf['DB_USER'], $conf['DB_PWD'], $conf['DB_NAME'], DBCHARSET);
	
	include($template->getfile('116to117_2'));
}

function add_db_tables()
{
	global $tablepre, $db;
	$sql = "CREATE TABLE `".$tablepre."mall_promotion` (
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
) ENGINE=MyISAM DEFAULT CHARSET=".DBCHARSET;
	$db->query($sql);
	showjsmessage('创建数据表：'.$tablepre.'mall_promotion ... 完成');
	
	$sql = "CREATE TABLE `".$tablepre."zhekou_category` (
  `id` smallint(5) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `sort_order` smallint(5) unsigned NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=".DBCHARSET;
	$db->query($sql);
	showjsmessage('创建数据表：'.$tablepre.'zhekou_category ... 完成');
	
	$sql = "CREATE TABLE `".$tablepre."mall_zhekou` (
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
) ENGINE=MyISAM DEFAULT CHARSET=".DBCHARSET;
	$db->query($sql);
	showjsmessage('创建数据表：'.$tablepre.'mall_zhekou ... 完成');
}

function add_site_config()
{
	global $tablepre, $db;
	$sql = "SELECT id FROM ".$tablepre."site_config WHERE code='hidden' LIMIT 1";
	$group_hidden_id = $db->fetch_array($db->query($sql));
	if(! $group_hidden_id){
		$sql = "INSERT INTO `".$tablepre."site_config` (`id`, `parent_id`, `code`, `type`, `store_range`, `store_dir`, `value`, `sort_order`)
			 VALUES(null, 0, 'hidden', 'hidden', '', '', '', 1)";
		$db->query($sql);
		$group_hidden_id = $db->insert_id();
	}else{
		$group_hidden_id = $group_hidden_id['id'];
	}
	
	if(! $db->fetch_array($db->query("SELECT id FROM ".$tablepre."site_config WHERE code='captcha' LIMIT 1"))){
		$sql = "INSERT INTO `".$tablepre."site_config` (`id`, `parent_id`, `code`, `type`, `store_range`, `store_dir`, `value`, `sort_order`)
			 VALUES(null, '$group_hidden_id', 'captcha', 'hidden', '', '', '', 1)";
		$db->query($sql);
	}
	if(! $db->fetch_array($db->query("SELECT id FROM ".$tablepre."site_config WHERE code='captcha_width' LIMIT 1"))){
		$sql = "INSERT INTO `".$tablepre."site_config` (`id`, `parent_id`, `code`, `type`, `store_range`, `store_dir`, `value`, `sort_order`)
			 VALUES(null, '$group_hidden_id', 'captcha_width', 'hidden', '', '', '', 1)";
		$db->query($sql);
	}
	if(! $db->fetch_array($db->query("SELECT id FROM ".$tablepre."site_config WHERE code='captcha_height' LIMIT 1"))){
		$sql = "INSERT INTO `".$tablepre."site_config` (`id`, `parent_id`, `code`, `type`, `store_range`, `store_dir`, `value`, `sort_order`)
			 VALUES(null, '$group_hidden_id', 'captcha_height', 'hidden', '', '', '', 1)";
		$db->query($sql);
	}
	showjsmessage('增加新的系统设置项 ... 完成');
}
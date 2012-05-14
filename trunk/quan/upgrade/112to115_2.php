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
	
	include($template->getfile('112to115_2'));
}

function add_site_config()
{
	global $tablepre, $db;
	$sql = "INSERT INTO `".$tablepre."site_config` (`id`, `parent_id`, `code`, `type`, `store_range`, `store_dir`, `value`, `sort_order`) VALUES (NULL, '1', 'statis_code', 'textarea', '', '', '', '23')";
	$db->query($sql);
	$sql = "INSERT INTO `".$tablepre."site_config` (`id`, `parent_id`, `code`, `type`, `store_range`, `store_dir`, `value`, `sort_order`) VALUES (NULL, '0', 'open_platform', 'group', '', '', '', '24')";
	$db->query($sql);
	$sql = "INSERT INTO `".$tablepre."site_config` (`id`, `parent_id`, `code`, `type`, `store_range`, `store_dir`, `value`, `sort_order`) VALUES (NULL, '945', 'qq_appid', 'text', '', '', '', '25')";
	$db->query($sql);
	$sql = "INSERT INTO `".$tablepre."site_config` (`id`, `parent_id`, `code`, `type`, `store_range`, `store_dir`, `value`, `sort_order`) VALUES (NULL, '945', 'qq_appkey', 'text', '', '', '', '26')";
	$db->query($sql);
	$sql = "INSERT INTO `".$tablepre."site_config` (`id`, `parent_id`, `code`, `type`, `store_range`, `store_dir`, `value`, `sort_order`) VALUES (NULL, '945', 'qq_open', 'select', '0,1', '', '1', '27')";
	$db->query($sql);
	$sql = "INSERT INTO `".$tablepre."site_config` (`id`, `parent_id`, `code`, `type`, `store_range`, `store_dir`, `value`, `sort_order`) VALUES (NULL, '945', 'sina_wb_akey', 'text', '', '', '', '28')";
	$db->query($sql);
	$sql = "INSERT INTO `".$tablepre."site_config` (`id`, `parent_id`, `code`, `type`, `store_range`, `store_dir`, `value`, `sort_order`) VALUES (NULL, '945', 'sina_wb_skey', 'text', '', '', '', '29')";
	$db->query($sql);
	$sql = "INSERT INTO `".$tablepre."site_config` (`id`, `parent_id`, `code`, `type`, `store_range`, `store_dir`, `value`, `sort_order`) VALUES (NULL, '945', 'sina_wb_office_id', 'text', '', '', '', '30')";
	$db->query($sql);
	$sql = "INSERT INTO `".$tablepre."site_config` (`id`, `parent_id`, `code`, `type`, `store_range`, `store_dir`, `value`, `sort_order`) VALUES (NULL, '945', 'sina_wb_open', 'select', '0,1', '', '1', '31')";
	$db->query($sql);
	showjsmessage('增加新的系统设置项 ... 完成');
}
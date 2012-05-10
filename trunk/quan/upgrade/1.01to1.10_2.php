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
	
	include($template->getfile('1.01to1.10_2'));
}

function add_site_config()
{
	global $tablepre, $db;
	$sql = "INSERT INTO `".$tablepre."site_config` (`id`, `parent_id`, `code`, `type`, `store_range`, `store_dir`, `value`, `sort_order`) VALUES (NULL, '1', 'url_rewrite', 'options', '0,1', '', '', '21')";
	$db->query($sql);
	$sql = "INSERT INTO `".$tablepre."site_config` (`id`, `parent_id`, `code`, `type`, `store_range`, `store_dir`, `value`, `sort_order`) VALUES (NULL, '1', 'code_in_secret', 'text', '', '', '4', '22')";
	$db->query($sql);
	$sql = "INSERT INTO `".$tablepre."site_config` (`id`, `parent_id`, `code`, `type`, `store_range`, `store_dir`, `value`, `sort_order`) VALUES (NULL, '1', 'invite_credit', 'text', '', '', '5', '23')";
	$db->query($sql);
	showjsmessage('增加新的系统设置项 ... 完成');
}

function edit_table_user()
{
	$sql = "ALTER TABLE `".$tablepre."user` ADD `invite` MEDIUMINT( 8 ) UNSIGNED NOT NULL DEFAULT '0',ADD INDEX ( `invite` )";
	$db->query($sql);
	$sql = "ALTER TABLE `".$tablepre."user` ADD `addtime` INT( 11 ) UNSIGNED NOT NULL DEFAULT '0' AFTER `credit`";
	$db->query($sql);
	showjsmessage('修改user表结构 ... 完成');
}
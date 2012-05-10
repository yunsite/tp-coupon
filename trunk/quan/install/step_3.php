<?php
/**
 * 第三步
 */
define('IN_TP_COUPON', TRUE);
include_once('./global.php');
include_once('./classes/db.class.php');
if(isPost()){
	$dbhost = $_POST['dbinfo']['dbhost'];
	$dbuser = $_POST['dbinfo']['dbuser'];
	$dbpw = $_POST['dbinfo']['dbpw'];
	$dbname = $_POST['dbinfo']['dbname'];
	$tablepre = $_POST['dbinfo']['tablepre'];
	if(empty($dbname)) exit('dbname invalid.');
	//创建数据库
	if(!$link = @mysql_connect($dbhost, $dbuser, $dbpw)) {
		$errno = mysql_errno($link);
		$error = mysql_error($link);
		if($errno == 1045) {
			exit('database_errno_1045' . $error);
		} elseif($errno == 2003) {
			exit('database_errno_2003' . $error);
		} else {
			exit('database_connect_error' . $error);
		}
	}
	if(mysql_get_server_info() > '4.1') {
		mysql_query("CREATE DATABASE IF NOT EXISTS `$dbname` DEFAULT CHARACTER SET ".DBCHARSET, $link);
	} else {
		mysql_query("CREATE DATABASE IF NOT EXISTS `$dbname`", $link);
	}

	if(mysql_errno()) {
		exit('database_errno_1044' . mysql_error());
	}
	mysql_close($link);
	
	//创建数据表
	$db = new dbstuff;
	$db->connect($dbhost, $dbuser, $dbpw, $dbname, DBCHARSET);

	$sqlfile = 'quan.sql';
	$sql = file_get_contents($sqlfile);
	$sql = str_replace("\r\n", "\n", $sql);
	
	include($template->getfile('step_3'));
}

function create_db_conf()
{
	$dbinfo = $_POST['dbinfo'];
	$value = "array(\"DB_TYPE\"=> \"mysql\",\n";
	$value .= "\"DB_HOST\"=> \"$dbinfo[dbhost]\",\n";
	$value .= "\"DB_NAME\"=>\"$dbinfo[dbname]\",\n";
	$value .= "\"DB_USER\"=>\"$dbinfo[dbuser]\",\n";
	$value .= "\"DB_PWD\"=>\"$dbinfo[dbpw]\",\n";
	$value .= "\"DB_PORT\"=>\"3306\",\n";
	$value .= "\"DB_PREFIX\"=>\"$dbinfo[tablepre]\")";
	$content = "<?php\nreturn " . $value . ";\n?>";
	file_put_contents('../Conf/db_config.php', $content);
}

function create_uc_conf()
{
	$ucinfo = $_POST['uc'];
	$value = "define(\"UC_CONNECT\", \"\");\n";
	$value .= "define(\"UC_DBHOST\", \"".$ucinfo['UC_DBHOST']."\");\n";
	$value .= "define(\"UC_DBUSER\", \"".$ucinfo['UC_DBUSER']."\");\n";
	$value .= "define(\"UC_DBPW\", \"".$ucinfo['UC_DBPW']."\");\n";
	$value .= "define(\"UC_DBNAME\", \"".$ucinfo['UC_DBNAME']."\");\n";
	$value .= "define(\"UC_DBCHARSET\", \"".DBCHARSET."\");\n";
	$value .= "define(\"UC_DBTABLEPRE\", \"".$ucinfo['UC_DBTABLEPRE']."\");\n";
	$value .= "define(\"UC_DBCONNECT\", 0);\n";
	$value .= "define(\"UC_KEY\", \"".$ucinfo['UC_KEY']."\");\n";
	$value .= "define(\"UC_API\", \"".$ucinfo['UC_API']."\");\n";
	$value .= "define(\"UC_CHARSET\", \"".CHARSET."\");\n";
	$value .= "define(\"UC_IP\", \"\");\n";
	$value .= "define(\"UC_APPID\", ".$ucinfo['UC_APPID'].");\n";
	$value .= "define(\"UC_PPP\", ".$ucinfo['UC_PPP'].");";
	$content = "<?php\n" . $value . "\n?>";
	file_put_contents('../Conf/config_ucenter.php', $content);
}

function create_install_lock()
{
	file_put_contents('../Runtime/install.lock', '');
}

function init_administrator()
{
	global $tablepre, $db;
	$admininfo = $_POST['admininfo'];
	$sql = "INSERT INTO `".$tablepre."admin_users` (`user_name`, `password`, `is_super`) VALUES ('$admininfo[user_name]', '".md5(md5($admininfo['founderpw']))."', 1)";
	$db->query($sql);
}

function insert_config()
{
	global $tablepre, $db;
	$sql = "INSERT INTO `".$tablepre."site_config` (`id`, `parent_id`, `code`, `type`, `store_range`, `store_dir`, `value`, `sort_order`) VALUES
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
(617, 6, 'captcha', 'hidden', '', '', '61', 1),
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
(943, 1, 'invite_credit', 'text', '', '', '6', 23)";
	$db->query($sql);
}
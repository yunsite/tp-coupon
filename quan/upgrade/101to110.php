<?php
/**1.01 到 1.10 升级程序
 * 第一步
 */
define('IN_TP_COUPON', TRUE);
include_once('./global.php');
$changelog = file_get_contents('changelog.txt');
$changelog = str_replace("\r\n", '<br>', $changelog);
include($template->getfile('101to110'));
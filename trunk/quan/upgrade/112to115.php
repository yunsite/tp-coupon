<?php
/**1.12 到 1.15 升级程序
 * 第一步
 */
define('IN_TP_COUPON', TRUE);
include_once('./global.php');
$changelog = file_get_contents('changelog115.txt');
$changelog = str_replace("\r\n", '<br>', $changelog);
include($template->getfile('112to115'));
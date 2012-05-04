<?php
/**
 * PHP SDK for QQ登录 OpenAPI
 *
 * @version 1.2
 * @author connect@qq.com
 * @copyright © 2011, Tencent Corporation. All rights reserved.
 */

/**
 * 正式运营环境请关闭错误信息
 * ini_set("error_reporting", E_ALL);
 * ini_set("display_errors", TRUE);
 * QQDEBUG = true  开启错误提示
 * QQDEBUG = false 禁止错误提示
 * 默认禁止错误信息
 */
define("QQDEBUG", true);
if (defined("QQDEBUG") && QQDEBUG)
{
    @ini_set("error_reporting", E_ALL);
    @ini_set("display_errors", TRUE);
}

//申请到的appid
define('QQ_APPID', 0);//请修改
//申请到的appkey
define('QQ_APPKEY', '');//请修改

//QQ登录成功后跳转的地址,请确保地址真实可用，否则会导致登录失败。
define('QQ_CALLBACK', 'http://'.$_SERVER['HTTP_HOST'].'/?m=User&a=qq_callback');//请根据实际情况修改

//QQ授权api接口.按需调用
define('QQ_SCOPE', "get_user_info,add_share,list_album,add_album,upload_pic,add_topic,add_one_blog,add_weibo");

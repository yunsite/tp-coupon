<?php /* Smarty version Smarty-3.1.6, created on 2012-05-04 14:00:00
         compiled from "D:\APMServ5.2.6\www\htdocs\quan\Tpl\Home\default\Public\header.html" */ ?>
<?php /*%%SmartyHeaderCode:324264fa3706033aac4-52930826%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '8478f7546789c851b48c328266572b909d77c1ae' => 
    array (
      0 => 'D:\\APMServ5.2.6\\www\\htdocs\\quan\\Tpl\\Home\\default\\Public\\header.html',
      1 => 1336059619,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '324264fa3706033aac4-52930826',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'page_title' => 0,
    '_CFG' => 0,
    'page_keywords' => 0,
    'page_description' => 0,
    'user' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.6',
  'unifunc' => 'content_4fa370605b747',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_4fa370605b747')) {function content_4fa370605b747($_smarty_tpl) {?><?php if (!is_callable('smarty_function_fixedUrl')) include 'D:\\APMServ5.2.6\\www\\htdocs\\quan\\ThinkPHP\\Extend\\Vendor\\Smarty\\plugins\\function.fixedUrl.php';
?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta http-equiv="X-UA-Compatible" content="IE=EmulateIE7" />
<title><?php if ($_smarty_tpl->tpl_vars['page_title']->value){?><?php echo $_smarty_tpl->tpl_vars['page_title']->value;?>
<?php }?><?php echo $_smarty_tpl->tpl_vars['_CFG']->value['site_name'];?>
 - <?php echo $_smarty_tpl->tpl_vars['_CFG']->value['site_title'];?>
 - Powered by TP-COUPON</title>
<link rel="shortcut icon" href="favicon.ico" />
<meta name="keywords" content="<?php if ($_smarty_tpl->tpl_vars['page_keywords']->value){?><?php echo $_smarty_tpl->tpl_vars['page_keywords']->value;?>
<?php }else{ ?><?php echo $_smarty_tpl->tpl_vars['_CFG']->value['site_keywords'];?>
<?php }?>">
<meta name="description" content="<?php if ($_smarty_tpl->tpl_vars['page_description']->value){?><?php echo $_smarty_tpl->tpl_vars['page_description']->value;?>
<?php }else{ ?><?php echo $_smarty_tpl->tpl_vars['_CFG']->value['site_description'];?>
<?php }?>">
<meta name="author" content="anqiu xiao" />
<meta name="copyright" content="2012-2015 jihaoju.com ijiaqu.com" />
<link rel="stylesheet" type="text/css" href="__PUBLIC__/Css/Home/style.css" />
<script type="text/javascript">var _public_='__PUBLIC__';</script>
<script type="text/javascript" src="__PUBLIC__/Js/common.js"></script>
<script type="text/javascript">
var images = '__PUBLIC__/Images/Home/';
var user_id = '<?php echo (($tmp = @$_smarty_tpl->tpl_vars['user']->value['user_id'])===null||$tmp==='' ? 0 : $tmp);?>
';
var user_nick = '<?php echo (($tmp = @$_smarty_tpl->tpl_vars['user']->value['nick'])===null||$tmp==='' ? '' : $tmp);?>
';
var login_url = '<?php echo smarty_function_fixedUrl(array('url'=>"User/login"),$_smarty_tpl);?>
';
var service_qq = '<?php echo $_smarty_tpl->tpl_vars['_CFG']->value['service_qq'];?>
';
var weibo_sina = '<?php echo $_smarty_tpl->tpl_vars['_CFG']->value['weibo_sina'];?>
';
var weibo_qq = '<?php echo $_smarty_tpl->tpl_vars['_CFG']->value['weibo_qq'];?>
';

var user = {'user_id':user_id,'nick':user_nick};
$(function() {
		    window.mainObj = window.mainObj ? window.mainObj : $("#main");
							if (mainObj.length > 0) {
                                var goWeibo = $('<div id="go_weibo" class="float_bar"><a href="http://weibo.com/'+weibo_sina+'" target="_blank"><img src="'+images+'sina.gif" title="新浪微博" /></a><a href="http://t.qq.com/'+weibo_qq+'" target="_blank"><img src="'+images+'tencent.gif" title="腾讯微博" /></a><a href="http://wpa.qq.com/msgrd?v=3&uin='+service_qq+'&site=qq&menu=yes" target="_blank"><img src="'+images+'qq.gif" title="联系在线客服" /></a></div>').appendTo(document.body);
                                var goTopObj = $('<div id="go_top" class="float_bar"><div class="return"><a href="javascript:;" title="回到顶部">回顶部</a></div></div>').appendTo(document.body);
                                $(".return a,a.return").live("click", function() {
                                    $("html,body").animate({
                                        scrollTop: 0
                                    }, 500);
                                });
                                $(".suggest a,a.suggest").live("click", function() {
                                    Youhui.common.suggest.init();
                                });
                                $(window).bind("resize.gotop", function() {
                                    goTopObj.css("left", mainObj.outerWidth() + mainObj.offset().left + 10);
                                    goWeibo.css("left", mainObj.outerWidth() + mainObj.offset().left + 10).show();
                                }).bind("scroll.gotop", function() {
                                    //if($(window).scrollTop() > $(window).height()*1.2){
                                    if ($(window).scrollTop() > 30) {
                                        goTopObj.fadeIn('fast');
                                    } else {
                                        goTopObj.fadeOut('fast');
                                    }
                                    if ($(window).scrollTop() > 100) {
                                        if ($(".float_nav").length == 0) {
                                            $("#nav").clone(true).addClass("float_nav").appendTo(document.body);
                                        }
                                    } else {
                                        $(".float_nav").remove();
                                    }
                                }).triggerHandler("resize.gotop");
                            }
		/*当有ajax请求时显示
                            var loading_lite = $('<div class="loading_lite" style="display:none">加载中，请稍候...</div>').appendTo(document.body).ajaxStart(function() {
                            $(this).html('加载中，请稍候...').fadeIn('normal');
                            }).ajaxSuccess(function() {
                            $(this).stop().hide();
                            }).ajaxError(function() {
                            $(this).html('加载异常，请稍候刷新重试').show().delay(3000).fadeOut(1500);
                            });
                            */
		if($("#usercenter")){
			$("#usercenter").hover(function() {
                                $(".nav_i", this).show().prev().addClass("active");
                            }, function() {
                                $(".nav_i", this).hide().prev().removeClass("active"); ;
                            });
		}
});

</script><?php }} ?>
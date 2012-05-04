<?php /* Smarty version Smarty-3.1.6, created on 2012-05-04 14:03:42
         compiled from "D:\APMServ5.2.6\www\htdocs\quan\Tpl\Admin\User\login.html" */ ?>
<?php /*%%SmartyHeaderCode:208774fa3713ed5a216-05106428%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '87c61b0cf7b9692bccec6099d610a1a0b6442313' => 
    array (
      0 => 'D:\\APMServ5.2.6\\www\\htdocs\\quan\\Tpl\\Admin\\User\\login.html',
      1 => 1336063460,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '208774fa3713ed5a216-05106428',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    '_CFG' => 0,
    'captcha' => 0,
    'mt' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.6',
  'unifunc' => 'content_4fa3713f0f64f',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_4fa3713f0f64f')) {function content_4fa3713f0f64f($_smarty_tpl) {?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?php echo $_smarty_tpl->tpl_vars['_CFG']->value['site_name'];?>
 — 后台管理系统</title>
<link rel="shortcut icon" href="favicon.ico" />
<link href="__PUBLIC__/Css/Admin/login.css" rel="stylesheet" type="text/css" />
<script type="text/javascript">var _public_='__PUBLIC__';</script>
<script type="text/javascript" src="__PUBLIC__/Js/common.js"></script>
<style type="text/css">

input{ height:25px; line-height:25px; font-size:14px;}

</style>
<script type="text/javascript">

//指定当前组模块URL地址 
var AJAX_LOADING = '提交请求中，请稍候...';
var AJAX_ERROR = 'AJAX请求发生错误！';

</script>
</head>
<body>
<form method='post' name="login" id="login" action="?g=<?php echo @GROUP_NAME;?>
&m=<?php echo @MODULE_NAME;?>
&a=<?php echo @ACTION_NAME;?>
" >
<div id="login-box">
	<div id="resultMsg"></div>
    <table width="300" border="0" cellspacing="0" cellpadding="0" style="position:absolute; left:300px; top:100px;">
  <tr>
    <td width="90" align="right" height="40" valign="middle">帐号：</td>
    <td valign="middle"><input type="text" name="admin_name" /></td>
  </tr>
  <tr>
    <td align="right" height="40" valign="middle">密码：</td>
    <td valign="middle"><input type="password" name="admin_pwd" /></td>
  </tr>
  <?php if ($_smarty_tpl->tpl_vars['captcha']->value){?>
  <tr>
    <td align="right" height="50" valign="middle">验证码：</td>
    <td valign="middle"><input type="text" name="verify" size="8" />
	<img src="?g=Public&m=Public&a=verifycode&mt=<?php echo $_smarty_tpl->tpl_vars['mt']->value;?>
" align="absmiddle" alt="captcha" height="<?php echo $_smarty_tpl->tpl_vars['_CFG']->value['captcha_height'];?>
" width="<?php echo $_smarty_tpl->tpl_vars['_CFG']->value['captcha_width'];?>
" style="vertical-align: middle;cursor: pointer;" onClick="this.src='?g=Public&m=Public&a=verifycode&mt='+Math.random()" /></td>
  </tr>
  <?php }?>
  <tr>
    <td>&nbsp;</td>
    <td><input type="image" src="__PUBLIC__/Css/Admin/Images/login_btn.png" /></td>
  </tr>
</table>
</div>
</form>
</body>
<script type="text/javascript">
var login_url = '?g=<?php echo @GROUP_NAME;?>
&m=<?php echo @MODULE_NAME;?>
&a=<?php echo @ACTION_NAME;?>
&ajax=1';
var index_url = '?g=<?php echo @GROUP_NAME;?>
';
var captcha = <?php if ($_smarty_tpl->tpl_vars['captcha']->value){?>true<?php }else{ ?>false<?php }?>;

jQuery(function($){
	if(top.location != self.location)
	{
		top.location.href = self.location.href;
		return;
	}
	
	$(document).keypress(function(e){
		if(e.keyCode == 13)
		{
			login()
		}
	});
	
	$("#login").submit(function(){
		login();
		return false;
	});
});

function login()
{
	$("#resultMsg").stop().removeClass('error').addClass('loading').html(AJAX_LOADING).show();
	
	$.ajax({
		url: login_url,
		type:"POST",
		cache: false,
		data:$("#login").serialize(),
		dataType:"json",
		error: function(){
			$("#resultMsg").addClass('error').html(AJAX_ERROR).show().fadeOut(5000);
		},
		success: function(result){
			$("#resultMsg").hide();
			if(result.status==1)
				location.href = index_url;
			else
			{
				$("#resultMsg").addClass('error').html(result.info).show().fadeOut(5000);
				if(captcha){
					fleshVerify();
				}
			}
		}
	});
}

function _login()
{
	$("#resultMsg").stop().removeClass('error').addClass('loading').html(AJAX_LOADING).show();
	var admin_name = $('#admin_name').val();
	var admin_pwd = $('#admin_pwd').val();
	if(admin_name == ''){
		$("#resultMsg").addClass('error').html('用户名不能为空').show().fadeOut(5000);
		return false;
	}
	if(admin_pwd == ''){
		$("#resultMsg").addClass('error').html('密码不能为空').show().fadeOut(5000);
		return false;
	}
	var url = login_url + '&admin_name='+encodeURIComponent(admin_name)+'&admin_pwd='+admin_pwd;
	if(captcha){
		var verify = $('#verify').val();
		if(verify == ''){
			$("#resultMsg").addClass('error').html('验证码不能为空').show().fadeOut(5000);
			return false;
		}
		url += '&verify='+verify;
	}
	$.getJSON(url, function(data){
									$("#resultMsg").hide();
									if(data.status == 1){
										location.href = index_url;
									}else{
										$("#resultMsg").addClass('error').html(result.info).show().fadeOut(5000);
										if(captcha){
											fleshVerify();
										}
									}
									});
}

function fleshVerify()
{
	var time = new Date().getTime();
	$("#verifyImg").attr('src',"?g=Public&m=Public&a=verifycode&mt="+time);
}

</script>
</html><?php }} ?>
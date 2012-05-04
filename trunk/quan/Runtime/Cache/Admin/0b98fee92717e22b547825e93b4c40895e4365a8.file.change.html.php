<?php /* Smarty version Smarty-3.1.6, created on 2012-05-04 14:14:20
         compiled from "D:\APMServ5.2.6\www\htdocs\quan\Tpl\Admin\Index\change.html" */ ?>
<?php /*%%SmartyHeaderCode:287784fa373bce35d82-89674310%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '0b98fee92717e22b547825e93b4c40895e4365a8' => 
    array (
      0 => 'D:\\APMServ5.2.6\\www\\htdocs\\quan\\Tpl\\Admin\\Index\\change.html',
      1 => 1324911514,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '287784fa373bce35d82-89674310',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.6',
  'unifunc' => 'content_4fa373bcf1d3f',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_4fa373bcf1d3f')) {function content_4fa373bcf1d3f($_smarty_tpl) {?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title></title>
<link href="__PUBLIC__/Css/Admin/style.css" rel="stylesheet" type="text/css" />
<script type="text/javascript">var _public_='__PUBLIC__';</script>
<script type="text/javascript" src="__PUBLIC__/Js/common.js"></script>
</head>
<body style="background:#fff;padding:0;">
	<div class="fanwe-change" rel="left"></div>
</body>
<script type="text/javascript">

jQuery(function($){
	$(".fanwe-change").click(function(){
		var rel = this.getAttribute("rel");
		if(rel == 'left')
		{
			rel = 'right';
			$(this).addClass("fanwe-change-right");
			window.parent.document.getElementById("bodyFrameset").cols = "0,14,*";
		}
		else
		{
			rel = 'left';
			$(this).removeClass("fanwe-change-right");
			window.parent.document.getElementById("bodyFrameset").cols = "190,14,*";
		}
		
		this.setAttribute("rel",rel);
	});
});

</script>
</html><?php }} ?>
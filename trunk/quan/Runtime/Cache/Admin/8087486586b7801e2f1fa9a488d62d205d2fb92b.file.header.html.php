<?php /* Smarty version Smarty-3.1.6, created on 2012-05-04 14:14:21
         compiled from "D:\APMServ5.2.6\www\htdocs\quan\Tpl\Admin\Public\header.html" */ ?>
<?php /*%%SmartyHeaderCode:54954fa373bdbb7e15-51275514%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '8087486586b7801e2f1fa9a488d62d205d2fb92b' => 
    array (
      0 => 'D:\\APMServ5.2.6\\www\\htdocs\\quan\\Tpl\\Admin\\Public\\header.html',
      1 => 1325438172,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '54954fa373bdbb7e15-51275514',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'ur_href' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.6',
  'unifunc' => 'content_4fa373bdc4140',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_4fa373bdc4140')) {function content_4fa373bdc4140($_smarty_tpl) {?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title></title>
<link href="__PUBLIC__/Css/Admin/style.css" rel="stylesheet" type="text/css" />
<script type="text/javascript">var _public_='__PUBLIC__';</script>
<script type="text/javascript" src="__PUBLIC__/Js/common.js"></script>
<script type="text/javascript" src="__PUBLIC__/Js/jquery.pngFix.js"></script>
</head>
<body>
<div id="dialog" title="信息提示">
<p></p>
</div>
<script type="text/javascript">

 $('#dialog').dialog({
					autoOpen: false,
					width: 300,
					buttons: {
						"确定": function() { 
							$(this).dialog("close"); 
						}
					}
				});
 $('div.ui-dialog-buttonset>button>span.ui-button-text').text('确定');

</script>
	<div class="fanwe-body">
		<div class="fb-title"><div><p><span><?php echo $_smarty_tpl->tpl_vars['ur_href']->value;?>
</span></p></div></div>
		<div class="fb-body">
			<table class="body-table" cellpadding="0" cellspacing="1" border="0">
				<tr>
					<td class="body-table-td">
						<div class="body-table-div"><?php }} ?>
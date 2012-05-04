<?php /* Smarty version Smarty-3.1.6, created on 2012-05-04 14:14:20
         compiled from "D:\APMServ5.2.6\www\htdocs\quan\Tpl\Admin\Index\left.html" */ ?>
<?php /*%%SmartyHeaderCode:36014fa373bc762b16-12144345%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '9dc1728c07c6f51f09b561e2ad778f846527866f' => 
    array (
      0 => 'D:\\APMServ5.2.6\\www\\htdocs\\quan\\Tpl\\Admin\\Index\\left.html',
      1 => 1324962488,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '36014fa373bc762b16-12144345',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'navs' => 0,
    'nav' => 0,
    'action' => 0,
    'key' => 0,
    'param' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.6',
  'unifunc' => 'content_4fa373bc911f2',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_4fa373bc911f2')) {function content_4fa373bc911f2($_smarty_tpl) {?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title></title>
<link href="__PUBLIC__/Css/Admin/style.css" rel="stylesheet" type="text/css" />
<script type="text/javascript">var _public_='__PUBLIC__';</script>
<script type="text/javascript" src="__PUBLIC__/Js/common.js"></script>
</head>
<body style="background:#DEE4ED;padding:0; overflow:hidden; overflow-y:scroll;">
	<div>
		<div class="fanwe-menu" valign="top">
        <?php  $_smarty_tpl->tpl_vars['nav'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['nav']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['navs']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['nav']->key => $_smarty_tpl->tpl_vars['nav']->value){
$_smarty_tpl->tpl_vars['nav']->_loop = true;
?>
		<dl>
			<dt><div><strong><?php echo $_smarty_tpl->tpl_vars['nav']->value['displayName'];?>
</strong></div></dt>
            <?php  $_smarty_tpl->tpl_vars['action'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['action']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['nav']->value['actions']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['action']->key => $_smarty_tpl->tpl_vars['action']->value){
$_smarty_tpl->tpl_vars['action']->_loop = true;
?>
			<dd><p><a href="?g=<?php echo @GROUP_NAME;?>
&m=<?php echo $_smarty_tpl->tpl_vars['nav']->value['module'];?>
&a=<?php echo $_smarty_tpl->tpl_vars['action']->value['action'];?>
<?php  $_smarty_tpl->tpl_vars['param'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['param']->_loop = false;
 $_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['action']->value['params']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['param']->key => $_smarty_tpl->tpl_vars['param']->value){
$_smarty_tpl->tpl_vars['param']->_loop = true;
 $_smarty_tpl->tpl_vars['key']->value = $_smarty_tpl->tpl_vars['param']->key;
?>&<?php echo $_smarty_tpl->tpl_vars['key']->value;?>
=<?php echo $_smarty_tpl->tpl_vars['param']->value;?>
<?php } ?>" target="mainFrame"><?php echo $_smarty_tpl->tpl_vars['action']->value['displayName'];?>
</a></p></dd>
            <?php } ?>
         </dl>
         <?php } ?>
	</div>
	</div>
<script type="text/javascript">

		if($("a:first").attr("href"))
		{
			top.document.getElementById("mainFrame").src = $("a:first").attr("href");
			$("a:first").parent().parent().addClass("cur");
		};
		
		$("a").click(function(){
			$("a").each(function(){
				$(this).parent().parent().removeClass("cur");
			});
			$(this).parent().parent().addClass("cur");
			$(this).blur();
		});

</script>
</body>
</html><?php }} ?>
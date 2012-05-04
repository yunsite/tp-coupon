<?php /* Smarty version Smarty-3.1.6, created on 2012-05-04 14:14:20
         compiled from "D:\APMServ5.2.6\www\htdocs\quan\Tpl\Admin\Index\top.html" */ ?>
<?php /*%%SmartyHeaderCode:13084fa373bca6c033-21539950%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '044b8bf00fdf319516db289bfc5a37490957363e' => 
    array (
      0 => 'D:\\APMServ5.2.6\\www\\htdocs\\quan\\Tpl\\Admin\\Index\\top.html',
      1 => 1335493292,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '13084fa373bca6c033-21539950',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'user_name' => 0,
    'nav' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.6',
  'unifunc' => 'content_4fa373bcc71f0',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_4fa373bcc71f0')) {function content_4fa373bcc71f0($_smarty_tpl) {?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"><head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title></title>
<link href="__PUBLIC__/Css/Admin/style.css" rel="stylesheet" type="text/css" />
<script type="text/javascript">var _public_='__PUBLIC__';</script>
<script type="text/javascript" src="__PUBLIC__/Js/common.js"></script>
<script type="text/javascript" src="__PUBLIC__/Js/jquery.pngFix.js"></script>
</head>
<body style="background: none repeat scroll 0% 0% rgb(153, 162, 179); padding: 0pt;">
<div class="fanwe-header">
	<div class="fh-top">
		<div class="fht-logo"><img src="__PUBLIC__/Images/Admin/logo.png"></div>
		<div class="fht-links">
			<span>欢迎您！<?php echo $_smarty_tpl->tpl_vars['user_name']->value;?>
</span>
			<a class="edit-pwd" href="?g=<?php echo @GROUP_NAME;?>
&m=User&a=edit_pwd" target="mainFrame">修改密码</a>
			<a class="browse-index" href="__ROOT__/" target="brank">浏览首页</a>
			<a href="?g=<?php echo @GROUP_NAME;?>
&m=Cache&a=clear" target="mainFrame">更新缓存</a>
			<a href="?g=<?php echo @GROUP_NAME;?>
&m=User&a=logout" target="mainFrame">退出</a>
		</div>
		<div class="fht-navs">
        	<?php  $_smarty_tpl->tpl_vars["nav"] = new Smarty_Variable; $_smarty_tpl->tpl_vars["nav"]->_loop = false;
 $_from = ($_smarty_tpl->tpl_vars['top_navs']->value); if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']["topnavs"]['iteration']=0;
foreach ($_from as $_smarty_tpl->tpl_vars["nav"]->key => $_smarty_tpl->tpl_vars["nav"]->value){
$_smarty_tpl->tpl_vars["nav"]->_loop = true;
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']["topnavs"]['iteration']++;
?>
			<div class="<?php if ($_smarty_tpl->getVariable('smarty')->value['foreach']['topnavs']['iteration']==1){?>active<?php }?>">
				<p>
					<a href="?g=<?php echo @GROUP_NAME;?>
&m=<?php echo @MODULE_NAME;?>
&a=left&id=<?php echo $_smarty_tpl->tpl_vars['nav']->value['id'];?>
" target="leftFrame"><?php echo $_smarty_tpl->tpl_vars['nav']->value['name'];?>
</a>
				</p>
			</div>
            <?php } ?>
         </div>
	</div>
	<!--<div class="fh-bottom">
		<div class="fhb-body">
			
		</div>
	</div>-->
</div>
<div class="ajax-loading" style="top:36px; right:0;"></div>

<script type="text/javascript">

jQuery(function(){
	$(".fht-navs div").click(function(){
		$(".fht-navs div").removeClass("active");
		$(this).addClass("active");
		$('a',this).blur();
	});
	
	$(".fht-navs div").click(function(){
		$(".fht-navs div").removeClass("active");
		$(this).addClass("active");
		$('a',this).blur();
	});
	
	$(document).pngFix(); 
});

</script>
</body></html><?php }} ?>
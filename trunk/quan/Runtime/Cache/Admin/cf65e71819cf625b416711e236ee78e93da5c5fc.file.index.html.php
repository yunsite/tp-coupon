<?php /* Smarty version Smarty-3.1.6, created on 2012-05-04 15:46:56
         compiled from "D:\APMServ5.2.6\www\htdocs\quan\Tpl\Admin\TempFile\index.html" */ ?>
<?php /*%%SmartyHeaderCode:51794fa38970adb432-15493624%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'cf65e71819cf625b416711e236ee78e93da5c5fc' => 
    array (
      0 => 'D:\\APMServ5.2.6\\www\\htdocs\\quan\\Tpl\\Admin\\TempFile\\index.html',
      1 => 1328162922,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '51794fa38970adb432-15493624',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    '_hash_' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.6',
  'unifunc' => 'content_4fa38970bafa9',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_4fa38970bafa9')) {function content_4fa38970bafa9($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ("../Public/header.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<form action="?g=<?php echo @GROUP_NAME;?>
&m=<?php echo @MODULE_NAME;?>
&a=clean" method="post" name="form_post" id="form_post">
<table cellspacing="0" cellpadding="4" border="0" class="table-form">
	<tbody><tr>
		<th class="first"><center><strong>确定要清除临时文件吗？<br />(该操作将清除今日之前上传的临时文件)</strong></center></th>
		</tr>
	<tr class="act">
		<th class="first">
		  <center><input type="submit" value="确定" class="submit_btn"></center>	    </th>
	  </tr>
</tbody></table>
<input name="_hash_" type="hidden" value="<?php echo $_smarty_tpl->tpl_vars['_hash_']->value;?>
" />
</form>
<?php echo $_smarty_tpl->getSubTemplate ("../Public/footer.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>
<?php }} ?>
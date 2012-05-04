<?php /* Smarty version Smarty-3.1.6, created on 2012-05-04 15:12:18
         compiled from "D:\APMServ5.2.6\www\htdocs\quan\Tpl\Admin\CouponCodeMall\view.html" */ ?>
<?php /*%%SmartyHeaderCode:320054fa3815208db60-98039830%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '209ba635c0152204cae4564a092b6e687a79a128' => 
    array (
      0 => 'D:\\APMServ5.2.6\\www\\htdocs\\quan\\Tpl\\Admin\\CouponCodeMall\\view.html',
      1 => 1334717352,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '320054fa3815208db60-98039830',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'mall' => 0,
    'item' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.6',
  'unifunc' => 'content_4fa381522a4e3',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_4fa381522a4e3')) {function content_4fa381522a4e3($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_fixed_uploadfile_url')) include 'D:\\APMServ5.2.6\\www\\htdocs\\quan\\ThinkPHP\\Extend\\Vendor\\Smarty\\plugins\\modifier.fixed_uploadfile_url.php';
?><?php echo $_smarty_tpl->getSubTemplate ("../Public/header.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<div class="handle-btns">
	<div class="link-button"><p><a class="" href="?g=<?php echo @GROUP_NAME;?>
&m=<?php echo @MODULE_NAME;?>
" name="" id="">返回列表</a></p></div>
</div>
<table cellspacing="0" cellpadding="4" border="0" class="table-form">
	<tbody>
	<tr>
		<th width="200" class="first">商城分类：</th>
		<td><?php  $_smarty_tpl->tpl_vars['item'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['item']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['mall']->value['cates']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
 $_smarty_tpl->tpl_vars['item']->total= $_smarty_tpl->_count($_from);
 $_smarty_tpl->tpl_vars['item']->iteration=0;
foreach ($_from as $_smarty_tpl->tpl_vars['item']->key => $_smarty_tpl->tpl_vars['item']->value){
$_smarty_tpl->tpl_vars['item']->_loop = true;
 $_smarty_tpl->tpl_vars['item']->iteration++;
 $_smarty_tpl->tpl_vars['item']->last = $_smarty_tpl->tpl_vars['item']->iteration === $_smarty_tpl->tpl_vars['item']->total;
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']['cates']['last'] = $_smarty_tpl->tpl_vars['item']->last;
?><?php echo $_smarty_tpl->tpl_vars['item']->value['name'];?>
<?php if (!$_smarty_tpl->getVariable('smarty')->value['foreach']['cates']['last']){?> &gt; <?php }?><?php } ?></td>
	</tr>
    <tr>
		<th width="200" class="first">名称：</th>
		<td><?php echo $_smarty_tpl->tpl_vars['mall']->value['name'];?>
</td>
	</tr>
    <tr>
		<th width="200" class="first">网址：</th>
		<td><a href="<?php echo $_smarty_tpl->tpl_vars['mall']->value['website'];?>
" target="_blank"><?php echo $_smarty_tpl->tpl_vars['mall']->value['website'];?>
</a></td>
	</tr>
    <tr>
		<th width="200" class="first">购买跳转网址：</th>
		<td><a href="<?php echo $_smarty_tpl->tpl_vars['mall']->value['gourl'];?>
" target="_blank"><?php echo $_smarty_tpl->tpl_vars['mall']->value['gourl'];?>
</a></td>
	</tr>
    <tr>
		<th width="200" class="first">客服电话：</th>
		<td><?php echo $_smarty_tpl->tpl_vars['mall']->value['tel'];?>
</td>
	</tr>
    <tr>
		<th width="200" class="first">LOGO：</th>
		<td><img src="<?php echo smarty_modifier_fixed_uploadfile_url($_smarty_tpl->tpl_vars['mall']->value['logo']);?>
" /></td>
	</tr>
    <tr>
		<th width="200" class="first">形象图：</th>
		<td><img src="<?php echo smarty_modifier_fixed_uploadfile_url($_smarty_tpl->tpl_vars['mall']->value['figure_image']);?>
" /></td>
	</tr>
    <tr>
		<th width="200" class="first">简介：</th>
		<td><?php echo $_smarty_tpl->tpl_vars['mall']->value['description'];?>
</td>
	</tr>
    <tr>
		<th width="200" class="first">优惠券使用方法：</th>
		<td><?php echo $_smarty_tpl->tpl_vars['mall']->value['how2use'];?>
</td>
	</tr>
</tbody></table>
<?php echo $_smarty_tpl->getSubTemplate ("../Public/footer.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>
<?php }} ?>
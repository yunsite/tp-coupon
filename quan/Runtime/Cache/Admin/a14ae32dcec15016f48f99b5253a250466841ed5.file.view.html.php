<?php /* Smarty version Smarty-3.1.6, created on 2012-05-04 15:12:13
         compiled from "D:\APMServ5.2.6\www\htdocs\quan\Tpl\Admin\CouponCode\view.html" */ ?>
<?php /*%%SmartyHeaderCode:315994fa3814d096645-92040420%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'a14ae32dcec15016f48f99b5253a250466841ed5' => 
    array (
      0 => 'D:\\APMServ5.2.6\\www\\htdocs\\quan\\Tpl\\Admin\\CouponCode\\view.html',
      1 => 1335321843,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '315994fa3814d096645-92040420',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'code' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.6',
  'unifunc' => 'content_4fa3814d2f748',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_4fa3814d2f748')) {function content_4fa3814d2f748($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ("../Public/header.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<div class="handle-btns">
	<div class="link-button"><p><a class="" href="#" onclick="history.back();" name="" id="">返回</a></p></div>
</div>
<table cellspacing="0" cellpadding="4" border="0" class="table-form">
	<tbody>
	<tr>
		<th width="200" class="first">商家：</th>
		<td><?php echo $_smarty_tpl->tpl_vars['code']->value['m_name'];?>
</td>
	</tr>
    <tr>
		<th width="200" class="first">类型：</th>
		<td><?php if ($_smarty_tpl->tpl_vars['code']->value['c_type']==1){?>满<?php echo $_smarty_tpl->tpl_vars['code']->value['money_max'];?>
减<?php echo $_smarty_tpl->tpl_vars['code']->value['money_reduce'];?>
元优惠券<?php }else{ ?><?php echo $_smarty_tpl->tpl_vars['code']->value['money_amount'];?>
代金券<?php }?></td>
	</tr>
    <tr>
		<th width="200" class="first">有效期：</th>
		<td><?php if ($_smarty_tpl->tpl_vars['code']->value['expiry_type']==1){?><?php echo $_smarty_tpl->tpl_vars['code']->value['expiry'];?>
<?php }else{ ?>无限制<?php }?></td>
	</tr>
    <tr>
		<th width="200" class="first">领取限制：</th>
		<td><?php echo $_smarty_tpl->tpl_vars['code']->value['fetch_limit'];?>
</td>
	</tr>
    <tr>
		<th width="200" class="first">付费：</th>
		<td><?php if ($_smarty_tpl->tpl_vars['code']->value['price_type']==1){?>免费<?php }elseif($_smarty_tpl->tpl_vars['code']->value['price_type']==2){?><?php echo $_smarty_tpl->tpl_vars['code']->value['price'];?>
元<?php }elseif($_smarty_tpl->tpl_vars['code']->value['price_type']==3){?><?php echo $_smarty_tpl->tpl_vars['code']->value['price'];?>
积分<?php }?></td>
	</tr>
    <tr>
		<th width="200" class="first">优惠券数量：</th>
		<td><?php echo $_smarty_tpl->tpl_vars['code']->value['amount'];?>
张</td>
	</tr>
    <tr>
		<th width="200" class="first">已领取数量：</th>
		<td><?php echo $_smarty_tpl->tpl_vars['code']->value['fetched_amount'];?>
张</td>
	</tr>
    <tr>
		<th width="200" class="first">剩余数量：</th>
		<td><?php echo $_smarty_tpl->tpl_vars['code']->value['amount']-$_smarty_tpl->tpl_vars['code']->value['fetched_amount'];?>
张</td>
	</tr>
    <tr>
		<th width="200" class="first">使用说明：</th>
		<td><?php echo $_smarty_tpl->tpl_vars['code']->value['data']['directions'];?>
</td>
	</tr>
    <tr>
		<th width="200" class="first">温馨提示：</th>
		<td><?php echo $_smarty_tpl->tpl_vars['code']->value['data']['prompt'];?>
</td>
	</tr>
	<tr class="act">
		<th class="first">&nbsp;</th>
		<td>
			<input type="reset" value="返回" class="reset_btn" onclick="history.back();">
		</td>
	</tr>
</tbody></table>
<?php echo $_smarty_tpl->getSubTemplate ("../Public/footer.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>
<?php }} ?>
<?php /* Smarty version Smarty-3.1.6, created on 2012-05-04 14:14:39
         compiled from "D:\APMServ5.2.6\www\htdocs\quan\Tpl\Admin\VerifyCode\setting.html" */ ?>
<?php /*%%SmartyHeaderCode:119374fa373cf2f8790-43111515%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '030f62b7abdb94e8a5d09e0373570986082d6edf' => 
    array (
      0 => 'D:\\APMServ5.2.6\\www\\htdocs\\quan\\Tpl\\Admin\\VerifyCode\\setting.html',
      1 => 1328162922,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '119374fa373cf2f8790-43111515',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    '_CFG' => 0,
    'captcha' => 0,
    'captcha_width' => 0,
    'captcha_height' => 0,
    '_hash_' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.6',
  'unifunc' => 'content_4fa373cf4d87f',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_4fa373cf4d87f')) {function content_4fa373cf4d87f($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ("../Public/header.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<div class="handle-btns">
	<div class="link-button"><p><a class="" href="javascript:;" name="" id="">验证码设置</a></p></div>
</div>
<form action="?g=<?php echo @GROUP_NAME;?>
&m=<?php echo @MODULE_NAME;?>
&a=<?php echo @ACTION_NAME;?>
" method="post" name="form">
<table cellspacing="0" cellpadding="4" border="0" class="table-form">
	<tbody><tr>
		<th width="200" class="first">启用验证码<br />
        <img src="?g=Public&m=Public&a=verifycode" alt="captcha" height="<?php echo $_smarty_tpl->tpl_vars['_CFG']->value['captcha_height'];?>
" width="<?php echo $_smarty_tpl->tpl_vars['_CFG']->value['captcha_width'];?>
" style="vertical-align: middle;cursor: pointer;" onClick="this.src='?g=Public&m=Public&a=verifycode&mt='+Math.random()" /></th>
		<td>
        <input type="checkbox" name="captcha_register" value="1" <?php echo $_smarty_tpl->tpl_vars['captcha']->value['register'];?>
 />新用户注册<br />
  <input type="checkbox" name="captcha_login" value="2" <?php echo $_smarty_tpl->tpl_vars['captcha']->value['login'];?>
 />用户登录<br />
  <input type="checkbox" name="captcha_comment" value="4"  <?php echo $_smarty_tpl->tpl_vars['captcha']->value['comment'];?>
 />发表评论<br />
  <input type="checkbox" name="captcha_admin" value="8" <?php echo $_smarty_tpl->tpl_vars['captcha']->value['admin'];?>
 />后台管理员登录<br />
  <input type="checkbox" name="captcha_message" value="32" <?php echo $_smarty_tpl->tpl_vars['captcha']->value['message'];?>
 />留言板留言<br />
        </td>
	</tr>
	<tr>
		<th class="first">登录失败时显示验证码<br />
  (选择“是”将在用户登录失败 3 次后才显示验证码，选择“否”将始终在登录时显示验证码。注意: 只有在启用了用户登录验证码时本设置才有效)</th>
		<td>
        <input type="radio" name="captcha_login_fail" value="32" <?php echo $_smarty_tpl->tpl_vars['captcha']->value['login_fail_yes'];?>
 />是<input type="radio"  name="captcha_login_fail" value="0" <?php echo $_smarty_tpl->tpl_vars['captcha']->value['login_fail_no'];?>
 />否
        </td>
	</tr>
	<tr>
		<th class="first">验证码图片宽度<br />
  (验证码图片的宽度，范围100～200 之间)</th>
		<td><input type="text" name="captcha_width" value="<?php echo $_smarty_tpl->tpl_vars['captcha_width']->value;?>
" /></td>
	</tr>
	<tr>
		<th class="first">验证码图片高度<br />
  (验证码图片的高度，范围在 30～80 之间)</th>
		<td>
			<input type="text" name="captcha_height" value="<?php echo $_smarty_tpl->tpl_vars['captcha_height']->value;?>
" />
		</td>
	</tr>
	<tr class="act">
		<th class="first">&nbsp;</th>
		<td>
			<input type="submit" value="提交" class="submit_btn">
			<input type="reset" value="重置" class="reset_btn">
		</td>
	</tr>
</tbody></table>
<input name="_hash_" type="hidden" value="<?php echo $_smarty_tpl->tpl_vars['_hash_']->value;?>
" />
</form>
<?php echo $_smarty_tpl->getSubTemplate ("../Public/footer.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>
<?php }} ?>
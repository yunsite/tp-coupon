<?php /* Smarty version Smarty-3.1.6, created on 2012-05-04 16:59:46
         compiled from "D:\APMServ5.2.6\www\htdocs\quan\Tpl\Home\default\User\login.html" */ ?>
<?php /*%%SmartyHeaderCode:160264fa39a827a0148-40440427%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'dfce0dd57069da0320eaf1b7fd7b10334bb8f476' => 
    array (
      0 => 'D:\\APMServ5.2.6\\www\\htdocs\\quan\\Tpl\\Home\\default\\User\\login.html',
      1 => 1334460162,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '160264fa39a827a0148-40440427',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    '_hash_' => 0,
    '_CFG' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.6',
  'unifunc' => 'content_4fa39a82a1c13',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_4fa39a82a1c13')) {function content_4fa39a82a1c13($_smarty_tpl) {?><?php if (!is_callable('smarty_function_fixedUrl')) include 'D:\\APMServ5.2.6\\www\\htdocs\\quan\\ThinkPHP\\Extend\\Vendor\\Smarty\\plugins\\function.fixedUrl.php';
?><?php echo $_smarty_tpl->getSubTemplate ((@GROUP_NAME)."/".(@THEME_NAME)."/Public/header.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<script type="text/javascript" src="__PUBLIC__/Js/jquery.validate.min.js"></script>
<script type="text/javascript" src="__PUBLIC__/Js/jQuery.validate.message_cn.js"></script>
<?php echo $_smarty_tpl->getSubTemplate ((@GROUP_NAME)."/".(@THEME_NAME)."/Public/nav.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<div class="w990 clear">
        <div id="main">
            <div class="main_l">
                <div id="main_l_l" class="clear">
                    <h2 class="login_t">会员登陆</h2>
                    <ul class="clear">
                    <form action="<?php echo smarty_function_fixedUrl(array('url'=>'User/login'),$_smarty_tpl);?>
" method="post" name="login_form" id="login_form">
                    <table width="100%" border="0" class="login_form">
  <tr>
    <td width="100" align="right">帐号：</td>
    <td colspan="2"><input name="nick" id="nick" type="text" style="width:200px;" /></td>
  </tr>
  <tr>
    <td align="right">密码：</td>
    <td colspan="2"><input name="pw" id="pw" type="password" style="width:200px;" />&nbsp;<a href="<?php echo smarty_function_fixedUrl(array('url'=>"User/getpwd"),$_smarty_tpl);?>
">忘记密码？</a></td>
  </tr>
  <tr>
    <td align="right">&nbsp;</td>
    <td colspan="2"><input name="save" id="save" type="checkbox" value="1" /><span id="label_save">下次自动登陆？</span></td>
  </tr>
  <tr>
    <td align="right">&nbsp;</td>
    <td width="150"><input type="submit" value="登陆" name="commit" id="signup-submit" class="formbutton"></td>
    <td><a href="<?php echo smarty_function_fixedUrl(array('url'=>"User/login_sina"),$_smarty_tpl);?>
"><img src="__PUBLIC__/Images/Home/sina_logo_big.gif" align="absbottom" /></a>&nbsp;&nbsp;<a href="<?php echo smarty_function_fixedUrl(array('url'=>"User/login_qq"),$_smarty_tpl);?>
"><img src="__PUBLIC__/Images/Home/qqlogin.png" align="absbottom" /></a></td>
  </tr>
</table>
<input name="_hash_" type="hidden" value="<?php echo $_smarty_tpl->tpl_vars['_hash_']->value;?>
" />
</form>
				</ul>
                </div>
            </div>
            <div class="main_r" style="width: 320px;">
    <ul class="sidebar">
            

        <li class="yellow">
            <h3>还没有<?php echo $_smarty_tpl->tpl_vars['_CFG']->value['site_name'];?>
帐号？</h3>
            <div class="sidebar_s clear">
            	<div class="sidebar_s_l">
                    <a class="signUp" href="<?php echo smarty_function_fixedUrl(array('url'=>"User/reg"),$_smarty_tpl);?>
"></a>
                </div>
            </div>
        </li>
   
             </ul>
</div>
        </div>
    </div>
<script type="text/javascript">
var g = '<?php echo @GROUP_NAME;?>
';
var m = '<?php echo @MODULE_NAME;?>
';
var a = '<?php echo @ACTION_NAME;?>
';
var u_index_url = "<?php echo smarty_function_fixedUrl(array('url'=>'User/index'),$_smarty_tpl);?>
";

$(document).ready(function() {
			$("#login_form").validate({
						 submitHandler:function(form){
							 						form.submit();
						 						}
						 });
			$('#nick').rules('add', {
						 		required: true,
								rangelength: [3,20]
						});
			$('#pw').rules('add', {
						 		required: true,
								rangelength: [6,15]
						});
});

</script>
<?php echo $_smarty_tpl->getSubTemplate ((@GROUP_NAME)."/".(@THEME_NAME)."/Public/footer.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>
<?php }} ?>
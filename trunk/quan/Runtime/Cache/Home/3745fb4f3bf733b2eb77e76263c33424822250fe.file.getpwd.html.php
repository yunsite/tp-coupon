<?php /* Smarty version Smarty-3.1.6, created on 2012-05-04 17:11:59
         compiled from "D:\APMServ5.2.6\www\htdocs\quan\Tpl\Home\default\User\getpwd.html" */ ?>
<?php /*%%SmartyHeaderCode:173554fa39a85c10650-31885726%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '3745fb4f3bf733b2eb77e76263c33424822250fe' => 
    array (
      0 => 'D:\\APMServ5.2.6\\www\\htdocs\\quan\\Tpl\\Home\\default\\User\\getpwd.html',
      1 => 1336122703,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '173554fa39a85c10650-31885726',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.6',
  'unifunc' => 'content_4fa39a85e5330',
  'variables' => 
  array (
    '_hash_' => 0,
    '_CFG' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_4fa39a85e5330')) {function content_4fa39a85e5330($_smarty_tpl) {?><?php if (!is_callable('smarty_function_fixedUrl')) include 'D:\\APMServ5.2.6\\www\\htdocs\\quan\\ThinkPHP\\Extend\\Vendor\\Smarty\\plugins\\function.fixedUrl.php';
?><?php echo $_smarty_tpl->getSubTemplate ((@GROUP_NAME)."/".(@THEME_NAME)."/Public/header.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<script type="text/javascript" src="__PUBLIC__/Js/jquery.validate.min.js"></script>
<script type="text/javascript" src="__PUBLIC__/Js/jQuery.validate.message_cn.js"></script>
<?php echo $_smarty_tpl->getSubTemplate ((@GROUP_NAME)."/".(@THEME_NAME)."/Public/nav.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<div class="w990 clear">
        <div id="main">
            <div class="main_l">
                <div id="main_l_l" class="clear">
                    <h2 class="login_t">取回密码</h2>
                    <ul class="clear">
                    <form action="<?php echo smarty_function_fixedUrl(array('url'=>'User/getpwd'),$_smarty_tpl);?>
" method="post" name="login_form" id="login_form">
                    <table width="100%" border="0" class="login_form">
  <tr>
    <td width="100" align="right">帐号：</td>
    <td colspan="2"><input name="nick" id="nick" type="text" style="width:200px;" /></td>
  </tr>
  <tr>
    <td align="right">&nbsp;</td>
    <td width="150"><input type="submit" value="确定" name="commit" id="signup-submit" class="formbutton"></td>
    <td>&nbsp;</td>
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
var getpwd_url = "<?php echo smarty_function_fixedUrl(array('url'=>'User/getpwd'),$_smarty_tpl);?>
";

function editpwd()
{
	$.ajax({
		url: getpwd_url,
		type:"POST",
		cache: false,
		data:$("#login_form").serialize(),
		dataType:"json",
		error: function(){
			
		},
		success: function(result){
			if(result.status==1){
				alert(result.info);
				window.location.href = u_index_url;
			}else{
				alert(result.info);
			}
		}
	});
}
$(document).ready(function() {
			$("#login_form").validate({
						 submitHandler:function(form){
							 						editpwd();
							 						return false;
						 						}
						 });
			$('#nick').rules('add', {
						 		required: true,
								rangelength: [3,20]
						});
});

</script>
<?php echo $_smarty_tpl->getSubTemplate ((@GROUP_NAME)."/".(@THEME_NAME)."/Public/footer.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>
<?php }} ?>
<?php /* Smarty version Smarty-3.1.6, created on 2012-05-04 15:12:19
         compiled from "D:\APMServ5.2.6\www\htdocs\quan\Tpl\Admin\CouponCodeMall\post.html" */ ?>
<?php /*%%SmartyHeaderCode:290184fa38153dbce27-38498702%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'e5be07f4a45bc3a549dfc6c278d56f57c38c2334' => 
    array (
      0 => 'D:\\APMServ5.2.6\\www\\htdocs\\quan\\Tpl\\Admin\\CouponCodeMall\\post.html',
      1 => 1334717276,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '290184fa38153dbce27-38498702',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'categorys' => 0,
    'item' => 0,
    'mall' => 0,
    '_hash_' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.6',
  'unifunc' => 'content_4fa381542196e',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_4fa381542196e')) {function content_4fa381542196e($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_fixed_uploadfile_url')) include 'D:\\APMServ5.2.6\\www\\htdocs\\quan\\ThinkPHP\\Extend\\Vendor\\Smarty\\plugins\\modifier.fixed_uploadfile_url.php';
?><?php echo $_smarty_tpl->getSubTemplate ("../Public/header.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<script type="text/javascript" src="__PUBLIC__/Js/xheditor-1.1.13/xheditor-1.1.13-zh-cn.min.js"></script>
<script type="text/javascript" src="__PUBLIC__/Js/xheditor-1.1.13/xheditor_plugins/ubb.min.js"></script>
<script type="text/javascript" src="__PUBLIC__/Js/jquery.validate.min.js"></script>
<script type="text/javascript" src="__PUBLIC__/Js/jQuery.validate.message_cn.js"></script>
<div class="handle-btns">
	<div class="link-button"><p><a class="" href="?g=<?php echo @GROUP_NAME;?>
&m=<?php echo @MODULE_NAME;?>
" name="" id="">返回列表</a></p></div>
</div>
<form action="?g=<?php echo @GROUP_NAME;?>
&m=<?php echo @MODULE_NAME;?>
&a=<?php echo @ACTION_NAME;?>
" method="post" name="form_post" id="form_post" enctype="multipart/form-data">
<table cellspacing="0" cellpadding="4" border="0" class="table-form">
	<tbody>
	<tr>
		<th width="200" class="first">商城分类：</th>
		<td><select name="c_id" class="requireinput required">
			<?php  $_smarty_tpl->tpl_vars['item'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['item']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['categorys']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['item']->key => $_smarty_tpl->tpl_vars['item']->value){
$_smarty_tpl->tpl_vars['item']->_loop = true;
?>
			<option value="<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
" <?php if ((@ACTION_NAME=='edit')&&($_smarty_tpl->tpl_vars['item']->value['id']==$_smarty_tpl->tpl_vars['mall']->value['c_id'])){?>selected<?php }?>><?php echo $_smarty_tpl->tpl_vars['item']->value['prefix'];?>
<?php echo $_smarty_tpl->tpl_vars['item']->value['name'];?>
</option>
			<?php } ?>
			</select></td>
	</tr>
    <tr>
		<th width="200" class="first">名称：</th>
		<td><input name="name" type="text"  size="40" class="textinput requireinput required" value="<?php echo $_smarty_tpl->tpl_vars['mall']->value['name'];?>
" /></td>
	</tr>
    <tr>
		<th width="200" class="first">网址：</th>
		<td><input name="website" type="text"  size="40" class="textinput requireinput required url" value="<?php echo $_smarty_tpl->tpl_vars['mall']->value['website'];?>
" /></td>
	</tr>
    <tr>
		<th width="200" class="first">购买跳转网址：</th>
		<td><input name="gourl" type="text"  size="40" class="textinput requireinput required url" value="<?php echo $_smarty_tpl->tpl_vars['mall']->value['gourl'];?>
" /></td>
	</tr>
    <tr>
		<th width="200" class="first">客服电话：</th>
		<td><input name="tel" type="text"  size="40" class="textinput requireinput required" value="<?php echo $_smarty_tpl->tpl_vars['mall']->value['tel'];?>
" /></td>
	</tr>
    <tr>
		<th width="200" class="first">LOGO：</th>
		<td><input name="logo" id="logo" type="file"  size="40" class="requireinput" /><?php if (@ACTION_NAME=='edit'){?><a href="<?php echo smarty_modifier_fixed_uploadfile_url($_smarty_tpl->tpl_vars['mall']->value['logo']);?>
" target="_blank">浏览</a><?php }?></td>
	</tr>
    <tr>
		<th width="200" class="first">形象图：</th>
		<td><input name="figure_image" id="figure_image" type="file"  size="40" class="requireinput" /><?php if (@ACTION_NAME=='edit'){?><a href="<?php echo smarty_modifier_fixed_uploadfile_url($_smarty_tpl->tpl_vars['mall']->value['figure_image']);?>
" target="_blank">浏览</a><?php }?></td>
	</tr>
    <tr>
		<th width="200" class="first">简介：</th>
		<td><textarea name="description" cols="" rows="" class="textinput requireinput required" style="height:150px; width:550px;"><?php echo $_smarty_tpl->tpl_vars['mall']->value['description'];?>
</textarea></td>
	</tr>
    <tr>
		<th width="200" class="first">优惠券使用方法：</th>
		<td><textarea name="how2use" id="how2use" cols="" rows="" class="textinput requireinput required" style="height:250px; width:550px;"><?php echo $_smarty_tpl->tpl_vars['mall']->value['how2use'];?>
</textarea><br /><span id="tip_desc"></span></td>
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
<input name="id" type="hidden" value="<?php echo (($tmp = @$_smarty_tpl->tpl_vars['mall']->value['id'])===null||$tmp==='' ? '0' : $tmp);?>
" />
</form>
<script type="text/javascript">
var g = '<?php echo @GROUP_NAME;?>
';
var m = '<?php echo @MODULE_NAME;?>
';
var a = '<?php echo @ACTION_NAME;?>
';
var upscript_url = '__APP__?g=Public&m=Public&a=upload4xheditor&immediate=1';
var editor = null;

jQuery(document).ready(function() {
			$("#form_post").validate({
						 submitHandler:function(form){
							 						if(editor.getSource() == ''){
														$('#tip_desc').html('<label generated="true" class="error">此内容为必填项,请输入！</label>');
														return;
													}
													form.how2use.value = $('#how2use').val();
						 							form.submit();
						 						}
						 });
			if(a == 'add'){
						$('#logo').rules('add', {
						 		required: true
						});
						$('#figure_image').rules('add', {
						 		required: true
						});
			}
			var options = {elm:'#how2use',tools:'full',upscript_url:upscript_url};
			editor = editorInit(options);
});

</script>
<?php echo $_smarty_tpl->getSubTemplate ("../Public/footer.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>
<?php }} ?>
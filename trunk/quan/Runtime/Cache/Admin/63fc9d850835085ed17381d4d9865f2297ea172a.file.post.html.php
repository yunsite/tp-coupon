<?php /* Smarty version Smarty-3.1.6, created on 2012-05-04 14:14:37
         compiled from "D:\APMServ5.2.6\www\htdocs\quan\Tpl\Admin\City\post.html" */ ?>
<?php /*%%SmartyHeaderCode:222804fa373cdada2e3-51019423%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '63fc9d850835085ed17381d4d9865f2297ea172a' => 
    array (
      0 => 'D:\\APMServ5.2.6\\www\\htdocs\\quan\\Tpl\\Admin\\City\\post.html',
      1 => 1328162922,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '222804fa373cdada2e3-51019423',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'city' => 0,
    'webmasters' => 0,
    'item' => 0,
    '_hash_' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.6',
  'unifunc' => 'content_4fa373cdd83f7',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_4fa373cdd83f7')) {function content_4fa373cdd83f7($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ("../Public/header.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

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
" method="post" name="form_post" id="form_post">
<table cellspacing="0" cellpadding="4" border="0" class="table-form">
	<tbody><tr>
		<th width="200" class="first">编码：</th>
		<td><input name="code" id="code" type="text"  size="40" class="textinput requireinput required" value="<?php echo $_smarty_tpl->tpl_vars['city']->value['code'];?>
" onblur="check_code_valid();" /><label class="error2" id="tip_code"></label></td>
	</tr>
	<tr>
		<th class="first">名称：</th>
		<td><input name="name" type="text"  size="40" class="textinput requireinput required" value="<?php echo $_smarty_tpl->tpl_vars['city']->value['name'];?>
" /></td>
	</tr>
    <tr>
		<th class="first">站长：</th>
		<td>
        <select name="admin_uid">
        <option value="0">选择站长</option>
        <?php  $_smarty_tpl->tpl_vars['item'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['item']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['webmasters']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['item']->key => $_smarty_tpl->tpl_vars['item']->value){
$_smarty_tpl->tpl_vars['item']->_loop = true;
?>
        <option value="<?php echo $_smarty_tpl->tpl_vars['item']->value['user_id'];?>
" <?php if ($_smarty_tpl->tpl_vars['item']->value['user_id']==$_smarty_tpl->tpl_vars['city']->value['admin_uid']){?>selected="selected"<?php }?>><?php echo $_smarty_tpl->tpl_vars['item']->value['user_name'];?>
,,<?php echo $_smarty_tpl->tpl_vars['item']->value['name'];?>
</option>
        <?php } ?>
        </select>
        </td>
	</tr>
    <tr>
		<th class="first">排序：</th>
		<td><input name="sort_order" type="text"  size="10" class="textinput requireinput required number" value="<?php echo $_smarty_tpl->tpl_vars['city']->value['sort_order'];?>
" /></td>
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
<input name="id" id="id" type="hidden" value="<?php echo (($tmp = @$_smarty_tpl->tpl_vars['city']->value['id'])===null||$tmp==='' ? '0' : $tmp);?>
" />
<input name="dosubmit" id="dosubmit" type="hidden" value="1" />
</form>
<script type="text/javascript">
var g = '<?php echo @GROUP_NAME;?>
';
var m = '<?php echo @MODULE_NAME;?>
';
var a = '<?php echo @ACTION_NAME;?>
';

$("#form_post").validate({
						 submitHandler:function(form){ 
						 							if(parseInt($('#dosubmit').val()) == 1){
														form.submit();
													}
						 						}
						 });

function check_code_valid()
{
	var code = $('#code').val();
	var id = $('#id').val();
	if(code == ''){
		$('#tip_code').text('');
		return false;
	}
	var url = "?g="+g+"&m="+m+"&a=check_code_valid&ajax=1&id="+id+"&code="+encodeURIComponent(code);
		$.getJSON(url, function(data){
									if(data.status == 0){
										alert(data.info);
									}else{
										if(data.data.is_exist == 1){
											$('#dosubmit').val(0);
											$('#tip_code').text('该编码已存在，请换一个试试');
										}else if(data.data.is_exist == 0){
											$('#dosubmit').val(1);
											$('#tip_code').text('');
										}
									}
									});
}

</script>
<?php echo $_smarty_tpl->getSubTemplate ("../Public/footer.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>
<?php }} ?>
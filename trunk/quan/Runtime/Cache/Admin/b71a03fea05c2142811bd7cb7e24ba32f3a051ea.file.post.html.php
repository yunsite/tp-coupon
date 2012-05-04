<?php /* Smarty version Smarty-3.1.6, created on 2012-05-04 14:16:23
         compiled from "D:\APMServ5.2.6\www\htdocs\quan\Tpl\Admin\CouponCode\post.html" */ ?>
<?php /*%%SmartyHeaderCode:229874fa37437cfdad1-43785410%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'b71a03fea05c2142811bd7cb7e24ba32f3a051ea' => 
    array (
      0 => 'D:\\APMServ5.2.6\\www\\htdocs\\quan\\Tpl\\Admin\\CouponCode\\post.html',
      1 => 1335407588,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '229874fa37437cfdad1-43785410',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'code' => 0,
    'code_type_conf' => 0,
    'key' => 0,
    'item' => 0,
    'code_expiry_conf' => 0,
    'fetch_limit_conf' => 0,
    'code_price_conf' => 0,
    '_hash_' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.6',
  'unifunc' => 'content_4fa37438331f6',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_4fa37438331f6')) {function content_4fa37438331f6($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ("../Public/header.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<script type="text/javascript" src="__PUBLIC__/Js/xheditor-1.1.13/xheditor-1.1.13-zh-cn.min.js"></script>
<script type="text/javascript" src="__PUBLIC__/Js/xheditor-1.1.13/xheditor_plugins/ubb.min.js"></script>
<script type="text/javascript" src="__PUBLIC__/Js/jquery.validate.min.js"></script>
<script type="text/javascript" src="__PUBLIC__/Js/jQuery.validate.message_cn.js"></script>
<link rel="stylesheet" type="text/css" href="__PUBLIC__/Js/WdatePicker/skin/WdatePicker.css" />
<script type="text/javascript" src="__PUBLIC__/Js/WdatePicker/WdatePicker.js"></script>
<script type="text/javascript" src="__PUBLIC__/Js/thickbox/thickbox.js"></script>
<link href="__PUBLIC__/Js/thickbox/thickbox.css" rel="stylesheet" type="text/css" />
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
	<tbody>
	<tr>
		<th width="200" class="first">商家：</th>
		<td><input name="m_name" id="m_name" type="text"  size="40" class="textinput requireinput required" value="<?php echo $_smarty_tpl->tpl_vars['code']->value['m_name'];?>
" readonly="readonly" /><input name="m_id" id="m_id" type="hidden" value="<?php echo (($tmp = @$_smarty_tpl->tpl_vars['code']->value['m_id'])===null||$tmp==='' ? 0 : $tmp);?>
" />&nbsp;<a href="?g=<?php echo @GROUP_NAME;?>
&m=CouponCodeMall&a=select&is_iframe=1&keepThis=true&TB_iframe=true&height=440&width=750" title="选择商家" class="thickbox">选择商家</a></td>
	</tr>
    <tr>
		<th width="200" class="first">名称：</th>
		<td><input name="title" type="text"  size="40" class="textinput" value="<?php echo $_smarty_tpl->tpl_vars['code']->value['title'];?>
" /></td>
	</tr>
    <tr>
		<th width="200" class="first">类型：</th>
		<td><select name="c_type" onchange="sel_c_type(this.value)"><?php  $_smarty_tpl->tpl_vars['item'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['item']->_loop = false;
 $_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['code_type_conf']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['item']->key => $_smarty_tpl->tpl_vars['item']->value){
$_smarty_tpl->tpl_vars['item']->_loop = true;
 $_smarty_tpl->tpl_vars['key']->value = $_smarty_tpl->tpl_vars['item']->key;
?><option value="<?php echo $_smarty_tpl->tpl_vars['key']->value;?>
" <?php if ($_smarty_tpl->tpl_vars['code']->value['c_type']==$_smarty_tpl->tpl_vars['key']->value){?>selected<?php }?>><?php echo $_smarty_tpl->tpl_vars['item']->value;?>
</option><?php } ?></select><span id="c_type_elm_1">满<input name="money_max" id="money_max" type="text"  size="10" class="textinput requireinput number" value="<?php echo $_smarty_tpl->tpl_vars['code']->value['money_max'];?>
" />元&nbsp;减<input name="money_reduce" id="money_reduce" type="text"  size="10" class="textinput requireinput number" value="<?php echo $_smarty_tpl->tpl_vars['code']->value['money_reduce'];?>
" />元</span><span id="c_type_elm_2">金额：<input name="money_amount" id="money_amount" type="text"  size="10" class="textinput requireinput number" value="<?php echo $_smarty_tpl->tpl_vars['code']->value['money_amount'];?>
" />元</span></td>
	</tr>
    <tr>
		<th width="200" class="first">有效期：</th>
		<td><select name="expiry_type" onchange="sel_expiry_type(this.value)"><?php  $_smarty_tpl->tpl_vars['item'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['item']->_loop = false;
 $_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['code_expiry_conf']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['item']->key => $_smarty_tpl->tpl_vars['item']->value){
$_smarty_tpl->tpl_vars['item']->_loop = true;
 $_smarty_tpl->tpl_vars['key']->value = $_smarty_tpl->tpl_vars['item']->key;
?><option value="<?php echo $_smarty_tpl->tpl_vars['key']->value;?>
" <?php if ($_smarty_tpl->tpl_vars['code']->value['expiry_type']==$_smarty_tpl->tpl_vars['key']->value){?>selected<?php }?>><?php echo $_smarty_tpl->tpl_vars['item']->value;?>
</option><?php } ?></select><span id="expiry_type_elm_1">有效期至<input type="Text" name="expiry" class="Wdate textinput requireinput"  id="expiry" onFocus="WdatePicker({skin:'ext',dateFmt:'yyyy-MM-dd',isShowToday:false,lang:'zh_cn',readOnly:true})" style="cursor: hand; width:160px;" value="<?php echo $_smarty_tpl->tpl_vars['code']->value['expiry'];?>
"></span></td>
	</tr>
    <tr>
		<th width="200" class="first">领取限制：</th>
		<td><select name="fetch_limit"><?php  $_smarty_tpl->tpl_vars['item'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['item']->_loop = false;
 $_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['fetch_limit_conf']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['item']->key => $_smarty_tpl->tpl_vars['item']->value){
$_smarty_tpl->tpl_vars['item']->_loop = true;
 $_smarty_tpl->tpl_vars['key']->value = $_smarty_tpl->tpl_vars['item']->key;
?><option value="<?php echo $_smarty_tpl->tpl_vars['key']->value;?>
" <?php if ($_smarty_tpl->tpl_vars['code']->value['data']['fetch_limit']==$_smarty_tpl->tpl_vars['key']->value){?>selected<?php }?>><?php echo $_smarty_tpl->tpl_vars['item']->value;?>
</option><?php } ?></select></td>
	</tr>
    <tr>
		<th width="200" class="first">付费：</th>
		<td><select name="price_type" onchange="sel_price_type(this.value)"><?php  $_smarty_tpl->tpl_vars['item'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['item']->_loop = false;
 $_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['code_price_conf']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['item']->key => $_smarty_tpl->tpl_vars['item']->value){
$_smarty_tpl->tpl_vars['item']->_loop = true;
 $_smarty_tpl->tpl_vars['key']->value = $_smarty_tpl->tpl_vars['item']->key;
?><option value="<?php echo $_smarty_tpl->tpl_vars['key']->value;?>
" <?php if ($_smarty_tpl->tpl_vars['code']->value['price_type']==$_smarty_tpl->tpl_vars['key']->value){?>selected<?php }?>><?php echo $_smarty_tpl->tpl_vars['item']->value;?>
</option><?php } ?></select><span id="price_type_elm_1"></span><span id="price_type_elm_2">价格：<input name="price_2" id="price_2" type="text"  size="10" class="textinput requireinput number" value="<?php echo $_smarty_tpl->tpl_vars['code']->value['price'];?>
" /></span><span id="price_type_elm_3">数量<input name="price_3" id="price_3" type="text"  size="10" class="textinput requireinput number" value="<?php echo $_smarty_tpl->tpl_vars['code']->value['price'];?>
" /></span></td>
	</tr>
    <tr>
		<th width="200" class="first">使用说明：</th>
		<td><textarea name="directions" id="directions" cols="" rows="" class="textinput" style="height:150px; width:550px;"><?php echo $_smarty_tpl->tpl_vars['code']->value['data']['directions'];?>
</textarea></td>
	</tr>
    <tr>
		<th width="200" class="first">温馨提示：</th>
		<td><textarea name="prompt" id="prompt" cols="" rows="" class="textinput" style="height:150px; width:550px;"><?php echo $_smarty_tpl->tpl_vars['code']->value['data']['prompt'];?>
</textarea></td>
	</tr>
	<tr class="act">
		<th class="first">&nbsp;</th>
		<td>
			<input type="submit" value="提交" class="submit_btn">
			<input type="reset" value="重置" class="reset_btn">
		</td>
	</tr>
</tbody></table>
<input name="hash" type="hidden" value="<?php echo $_smarty_tpl->tpl_vars['_hash_']->value;?>
" />
<input name="c_id" type="hidden" value="<?php echo (($tmp = @$_smarty_tpl->tpl_vars['code']->value['c_id'])===null||$tmp==='' ? '0' : $tmp);?>
" />
</form>
<script type="text/javascript">
var g = '<?php echo @GROUP_NAME;?>
';
var m = '<?php echo @MODULE_NAME;?>
';
var a = '<?php echo @ACTION_NAME;?>
';
var c_type = <?php echo (($tmp = @$_smarty_tpl->tpl_vars['code']->value['c_type'])===null||$tmp==='' ? 1 : $tmp);?>
;
var expiry_type = <?php echo (($tmp = @$_smarty_tpl->tpl_vars['code']->value['expiry_type'])===null||$tmp==='' ? 1 : $tmp);?>
;
var price_type = <?php echo (($tmp = @$_smarty_tpl->tpl_vars['code']->value['price_type'])===null||$tmp==='' ? 1 : $tmp);?>
;
var tb_pathToImage = "__PUBLIC__/Js/thickbox/loadingAnimation.gif";
var upscript_url = '__APP__?g=Public&m=Public&a=upload4xheditor&immediate=1';
var editor = null;

function sel_c_type(c_type)
{
	$('#c_type_elm_1,#c_type_elm_2').hide();
	$('#c_type_elm_'+c_type).show();
	if(c_type == 1){
		$('#money_max,#money_reduce').addClass('required');
		$('#money_amount').removeClass('required');
	}else{
		$('#money_max,#money_reduce').removeClass('required');
		$('#money_amount').addClass('required');
	}
}
function sel_expiry_type(expiry_type)
{
	if(expiry_type == 1){
		$('#expiry_type_elm_1').show();
		$('#expiry').addClass('required');
	}else{
		$('#expiry_type_elm_1').hide();
		$('#expiry').removeClass('required');
	}
}
function sel_price_type(price_type)
{
	$('#price_type_elm_1,#price_type_elm_2,#price_type_elm_3').hide();
	$('#price_type_elm_'+price_type).show();
	if(price_type == 2){
		$('#price_2').addClass('required');
		$('#price_3').removeClass('required');
	}else if(price_type == 3){
		$('#price_2').removeClass('required');
		$('#price_3').addClass('required');
	}else{
		$('#price_2,#price_3').removeClass('required');
	}
}
function pick_mall_handler(mall)
{
	if(mall !== null){
		$('#m_id').val(mall.m_id);
		$('#m_name').val(mall.m_name);
	}
	tb_remove();
}
$(document).ready(function() {
			$("#form_post").validate({
						 submitHandler:function(form){
							 						form.directions.value = $('#directions').val();
													form.prompt.value = $('#prompt').val();
						 							form.submit();
						 						}
						 });
			sel_c_type(c_type);
			sel_expiry_type(expiry_type);
			sel_price_type(price_type);
			tb_init('a.thickbox, area.thickbox, input.thickbox');//pass where to apply thickbox
			imgLoader = new Image();// preload image
			imgLoader.src = tb_pathToImage;
			var options = {elm:'#directions,#prompt',tools:'simple',upscript_url:upscript_url};
			editor = editorInit(options);
});

</script>
<?php echo $_smarty_tpl->getSubTemplate ("../Public/footer.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>
<?php }} ?>
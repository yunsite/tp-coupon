<?php /* Smarty version Smarty-3.1.6, created on 2012-05-04 15:16:51
         compiled from "D:\APMServ5.2.6\www\htdocs\quan\Tpl\Admin\Adv\post.html" */ ?>
<?php /*%%SmartyHeaderCode:191464fa3826333b846-33017899%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '2d275dc549009cd36b117af2129a82c83df11272' => 
    array (
      0 => 'D:\\APMServ5.2.6\\www\\htdocs\\quan\\Tpl\\Admin\\Adv\\post.html',
      1 => 1328162922,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '191464fa3826333b846-33017899',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'ad' => 0,
    'ad_media_type_conf' => 0,
    'key' => 0,
    'item' => 0,
    'positions' => 0,
    '_hash_' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.6',
  'unifunc' => 'content_4fa382639d4b9',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_4fa382639d4b9')) {function content_4fa382639d4b9($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ("../Public/header.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<script type="text/javascript" src="__PUBLIC__/Js/jquery.validate.min.js"></script>
<script type="text/javascript" src="__PUBLIC__/Js/jQuery.validate.message_cn.js"></script>
<link rel="stylesheet" type="text/css" href="__PUBLIC__/Js/WdatePicker/skin/WdatePicker.css" />
<script type="text/javascript" src="__PUBLIC__/Js/WdatePicker/WdatePicker.js"></script>
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
		<th width="200" class="first">广告名称：</th>
		<td><input name="ad_name" type="text"  size="40" class="textinput requireinput required" value="<?php echo $_smarty_tpl->tpl_vars['ad']->value['ad_name'];?>
" /></td>
	</tr>
	<tr>
		<th class="first">广告类型：</th>
		<td>
        <select onchange="switch_media_type(this.value)" name="media_type" class="requireinput required">
        <?php  $_smarty_tpl->tpl_vars['item'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['item']->_loop = false;
 $_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['ad_media_type_conf']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['item']->key => $_smarty_tpl->tpl_vars['item']->value){
$_smarty_tpl->tpl_vars['item']->_loop = true;
 $_smarty_tpl->tpl_vars['key']->value = $_smarty_tpl->tpl_vars['item']->key;
?>
         <option value="<?php echo $_smarty_tpl->tpl_vars['key']->value;?>
" <?php if (@ACTION_NAME=='edit'&&$_smarty_tpl->tpl_vars['key']->value==$_smarty_tpl->tpl_vars['ad']->value['media_type']){?>selected="selected"<?php }?>><?php echo $_smarty_tpl->tpl_vars['item']->value;?>
</option>
         <?php } ?>
         </select>
        </td>
	</tr>
    <tr>
		<th class="first">广告位置：</th>
		<td>
        <select name="position_id" class="requireinput required">
        <?php  $_smarty_tpl->tpl_vars['item'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['item']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['positions']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['item']->key => $_smarty_tpl->tpl_vars['item']->value){
$_smarty_tpl->tpl_vars['item']->_loop = true;
?>
        <option value="<?php echo $_smarty_tpl->tpl_vars['item']->value['position_id'];?>
" <?php if (@ACTION_NAME=='edit'&&$_smarty_tpl->tpl_vars['item']->value['position_id']==$_smarty_tpl->tpl_vars['ad']->value['position_id']){?>selected="selected"<?php }?>><?php echo $_smarty_tpl->tpl_vars['item']->value['position_name'];?>
</option>
        <?php } ?>
        </select>
        </td>
	</tr>
    <tr>
		<th class="first">是否开启：</th>
		<td><label><input name="enabled" type="radio" value="1" <?php if (@ACTION_NAME=='add'||(@ACTION_NAME=='edit'&&1==$_smarty_tpl->tpl_vars['ad']->value['enabled'])){?>checked<?php }?> />开启</label><label><input name="enabled" type="radio" value="0" <?php if (@ACTION_NAME=='edit'&&0==$_smarty_tpl->tpl_vars['ad']->value['enabled']){?>checked<?php }?> />关闭</label></td>
	</tr>
    <tr>
		<th class="first">开始时间：</th>
		<td>
        <input type="Text" name="start_time" class="Wdate requireinput required"  id="start_time" onFocus="WdatePicker({skin:'ext',dateFmt:'yyyy-MM-dd HH:mm',isShowToday:false,lang:'zh_cn',readOnly:true})" style="cursor: hand; width:160px;" value="<?php echo $_smarty_tpl->tpl_vars['ad']->value['start_time'];?>
">
        </td>
	</tr>
    <tr>
		<th class="first">结束时间：</th>
		<td>
        <input type="Text" name="end_time" class="Wdate requireinput required"  id="end_time" onFocus="WdatePicker({skin:'ext',dateFmt:'yyyy-MM-dd HH:mm',isShowToday:false,lang:'zh_cn',readOnly:true})" style="cursor: hand; width:160px;" value="<?php echo $_smarty_tpl->tpl_vars['ad']->value['end_time'];?>
">
        </td>
	</tr>
</tbody>
</table>
<table cellspacing="0" cellpadding="4" border="0" style="display:<?php if (@ACTION_NAME=='add'){?>block<?php }elseif(@ACTION_NAME=='edit'&&101==$_smarty_tpl->tpl_vars['ad']->value['media_type']){?>block<?php }else{ ?>none<?php }?>;" class="table-form ad_group group_101">
	<tbody>
    <tr>
		<th width="200" class="first">广告链接：</th>
		<td><input name="ad_link" type="text"  size="40" class="textinput url" value="<?php echo $_smarty_tpl->tpl_vars['ad']->value['ad_link'];?>
" /></td>
	</tr>
    <tr>
		<th width="200" class="first">上传广告图片：</th>
		<td><input type='file' name='ad_img' size='40' /></td>
	</tr>
    <tr>
		<th width="200" class="first">或图片网址：</th>
		<td><input name="img_url" type="text"  size="40" class="textinput url" value="<?php if (@ACTION_NAME=='edit'&&101==$_smarty_tpl->tpl_vars['ad']->value['media_type']){?><?php echo $_smarty_tpl->tpl_vars['ad']->value['ad_code'];?>
<?php }?>" /></td>
	</tr>
</tbody>
</table>
<table cellspacing="0" cellpadding="4" border="0" style="display:<?php if (@ACTION_NAME=='add'){?>none<?php }elseif(@ACTION_NAME=='edit'&&102==$_smarty_tpl->tpl_vars['ad']->value['media_type']){?>block<?php }else{ ?>none<?php }?>;" class="table-form ad_group group_102">
	<tbody>
    <tr>
		<th width="200" class="first">上传Flash文件：</th>
		<td><input type='file' name='upfile_flash' size='40' /></td>
	</tr>
    <tr>
		<th width="200" class="first">或Flash网址：</th>
		<td><input name="flash_url" type="text"  size="40" class="textinput url" value="<?php if (@ACTION_NAME=='edit'&&102==$_smarty_tpl->tpl_vars['ad']->value['media_type']){?><?php echo $_smarty_tpl->tpl_vars['ad']->value['ad_code'];?>
<?php }?>" /></td>
	</tr>
</tbody>
</table>
<table cellspacing="0" cellpadding="4" border="0" style="display:<?php if (@ACTION_NAME=='add'){?>none<?php }elseif(@ACTION_NAME=='edit'&&103==$_smarty_tpl->tpl_vars['ad']->value['media_type']){?>block<?php }else{ ?>none<?php }?>;" class="table-form ad_group group_103">
	<tbody>
    <tr>
		<th width="200" class="first">输入广告代码：</th>
		<td>
        <textarea rows="6" cols="55" name="ad_code"><?php if (@ACTION_NAME=='edit'&&103==$_smarty_tpl->tpl_vars['ad']->value['media_type']){?><?php echo $_smarty_tpl->tpl_vars['ad']->value['ad_code'];?>
<?php }?></textarea>
        </td>
	</tr>
</tbody>
</table>
<table cellspacing="0" cellpadding="4" border="0" style="display:<?php if (@ACTION_NAME=='add'){?>none<?php }elseif(@ACTION_NAME=='edit'&&104==$_smarty_tpl->tpl_vars['ad']->value['media_type']){?>block<?php }else{ ?>none<?php }?>;" class="table-form ad_group group_104">
	<tbody>
    <tr>
		<th width="200" class="first">广告链接：</th>
		<td><input name="ad_link2" type="text"  size="40" class="textinput url" value="<?php if (@ACTION_NAME=='edit'&&104==$_smarty_tpl->tpl_vars['ad']->value['media_type']){?><?php echo $_smarty_tpl->tpl_vars['ad']->value['ad_link'];?>
<?php }?>" /></td>
	</tr>
    <tr>
		<th width="200" class="first">广告内容：</th>
		<td><textarea rows="6" cols="55" name="ad_text"><?php if (@ACTION_NAME=='edit'&&104==$_smarty_tpl->tpl_vars['ad']->value['media_type']){?><?php echo $_smarty_tpl->tpl_vars['ad']->value['ad_code'];?>
<?php }?></textarea></td>
	</tr>
</tbody>
</table>
<table cellspacing="0" cellpadding="4" border="0" class="table-form">
	<tbody>
	<tr class="act">
		<th width="200" class="first">&nbsp;</th>
		<td>
			<input type="submit" value="提交" class="submit_btn">
			<input type="reset" value="重置" class="reset_btn">
		</td>
	</tr>
</tbody></table>
<input name="_hash_" type="hidden" value="<?php echo $_smarty_tpl->tpl_vars['_hash_']->value;?>
" />
<input name="ad_id" type="hidden" value="<?php echo (($tmp = @$_smarty_tpl->tpl_vars['ad']->value['ad_id'])===null||$tmp==='' ? '0' : $tmp);?>
" />
</form>
<script type="text/javascript">

$("#form_post").validate();

function switch_media_type(media_type)
{
	$('.ad_group').css('display','none');
	$('.group_'+media_type).css('display','block');
}

</script>
<?php echo $_smarty_tpl->getSubTemplate ("../Public/footer.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>
<?php }} ?>
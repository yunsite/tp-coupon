<?php /* Smarty version Smarty-3.1.6, created on 2012-05-04 14:14:36
         compiled from "D:\APMServ5.2.6\www\htdocs\quan\Tpl\Admin\City\index.html" */ ?>
<?php /*%%SmartyHeaderCode:216754fa373cc3383d2-23411041%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'b31c1fee9712adb4866d16922e40ef5691d85d4e' => 
    array (
      0 => 'D:\\APMServ5.2.6\\www\\htdocs\\quan\\Tpl\\Admin\\City\\index.html',
      1 => 1335949733,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '216754fa373cc3383d2-23411041',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    '_hash_' => 0,
    'citys' => 0,
    'item' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.6',
  'unifunc' => 'content_4fa373cc5f9f3',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_4fa373cc5f9f3')) {function content_4fa373cc5f9f3($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ("../Public/header.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<script type="text/javascript" src="__PUBLIC__/Js/jquery.SetTableBgColor.js"></script>
<script type="text/javascript">
var g = '<?php echo @GROUP_NAME;?>
';
var m = '<?php echo @MODULE_NAME;?>
';
var _hash_ = '<?php echo $_smarty_tpl->tpl_vars['_hash_']->value;?>
';

function del(id)
{
	$('#dialog>p').html('确定要删除吗？');
	$('#dialog').dialog('open');
	$('#dialog').dialog({
					autoOpen: false,
					width: 300,
					buttons: {
						"确定": function() { 
							var url = "?g="+g+"&m="+m+"&a=del&id="+id+"&ajax=1&_hash_="+_hash_;
							$.getJSON(url, function(data){
													if(data.status == 0){
														$('#dialog>p').html('删除失败');
														$('#dialog').dialog('open');
													}else{
														_hash_ = data.info;
														$('#tt-item-'+id).remove();
														$('#dialog').dialog("close"); 
													}
													});
						},
						"取消": function() { 
							$(this).dialog("close"); 
						}
					}
				});
}

$(document).ready(function(){
	$(".table-list").SetTableBgColor({
            odd:"even",
            even:"",
            selected:"",
            over:""
        });
});

</script>
<div class="handle-btns">
	<div class="img-button "><p><input type="button" class="addData" onclick="window.location.href='?g=<?php echo @GROUP_NAME;?>
&m=<?php echo @MODULE_NAME;?>
&a=add'" value="添加" name="addData" id="addData"></p></div>
	</div>
<div class="search-box">
</div>
<table cellspacing="0" cellpadding="0" border="0" class="table-list list" id="checkList">
<thead>
<tr>
<th width="30" class="first"><input type="checkbox" onclick="check_all('id[]', this)"></th>
<th width="50">ID</th>
<th>编码</th>
<th>名称</th>
<th width="150">站长</th>
<th width="80">排序</th>
<th width="150">操作</th>
</tr>
</thead>
<tbody>
<?php  $_smarty_tpl->tpl_vars['item'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['item']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['citys']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['item']->key => $_smarty_tpl->tpl_vars['item']->value){
$_smarty_tpl->tpl_vars['item']->_loop = true;
?>
<tr id="tt-item-<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
">
<td class="first"><input type="checkbox" value="<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
" name="id[]"></td>
<td><?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
</td>
<td align="left"><?php echo $_smarty_tpl->tpl_vars['item']->value['code'];?>
</td>
<td align="left"><?php echo $_smarty_tpl->tpl_vars['item']->value['name'];?>
</td>
<td align="left"><?php if ($_smarty_tpl->tpl_vars['item']->value['admin_uid']){?><?php echo $_smarty_tpl->tpl_vars['item']->value['admin_uname'];?>
<?php }?></td>
<td align="center"><?php echo $_smarty_tpl->tpl_vars['item']->value['sort_order'];?>
</td>
<td align="center">
<a href="?g=<?php echo @GROUP_NAME;?>
&m=<?php echo @MODULE_NAME;?>
&a=areas&id=<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
">查看区域</a>&nbsp;&nbsp;
<a href="?g=<?php echo @GROUP_NAME;?>
&m=<?php echo @MODULE_NAME;?>
&a=edit&id=<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
">编辑</a>&nbsp;&nbsp;
<a onclick="del(<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
)" href="javascript:;">删除</a></td>
</tr>
<?php } ?>
</tbody></table>
<?php echo $_smarty_tpl->getSubTemplate ("../Public/footer.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>
<?php }} ?>
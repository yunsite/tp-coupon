<?php /* Smarty version Smarty-3.1.6, created on 2012-05-04 14:16:25
         compiled from "D:\APMServ5.2.6\www\htdocs\quan\Tpl\Admin\CouponCode\best.html" */ ?>
<?php /*%%SmartyHeaderCode:178324fa374392c6ca4-25777204%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'cd17d8f5e9c99bfa4643e464cac2f9748653d1c4' => 
    array (
      0 => 'D:\\APMServ5.2.6\\www\\htdocs\\quan\\Tpl\\Admin\\CouponCode\\best.html',
      1 => 1335340374,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '178324fa374392c6ca4-25777204',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    '_hash_' => 0,
    'codes' => 0,
    'item' => 0,
    'pagelink' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.6',
  'unifunc' => 'content_4fa374395a5c6',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_4fa374395a5c6')) {function content_4fa374395a5c6($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ("../Public/header.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<script type="text/javascript" src="__PUBLIC__/Js/jquery.SetTableBgColor.js"></script>
<script type="text/javascript" src="__PUBLIC__/Js/dataList.js"></script>
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
							var url = "?g="+g+"&m="+m+"&a=unbest&id="+id+"&ajax=1&_hash_="+_hash_;
							$.getJSON(url, function(data){
													if(data.status == 0){
														$('#dialog>p').html('删除失败');
														$('#dialog').dialog('open');
													}else{
														$('#tt-item-'+id).remove();
														_hash_ = data.info;
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
<div class="search-box">
</div>
<table cellspacing="0" cellpadding="0" border="0" class="table-list list" id="checkList">
<thead>
<tr>
<th>名称</th>
<th width="150">有效期</th>
<th width="60">排序</th>
<th width="130">操作</th>
</tr>
</thead>
<tbody>
<?php  $_smarty_tpl->tpl_vars['item'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['item']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['codes']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['item']->key => $_smarty_tpl->tpl_vars['item']->value){
$_smarty_tpl->tpl_vars['item']->_loop = true;
?>
<tr id="tt-item-<?php echo $_smarty_tpl->tpl_vars['item']->value['c_id'];?>
">
<td align="left"><?php if ($_smarty_tpl->tpl_vars['item']->value['title']){?><?php echo $_smarty_tpl->tpl_vars['item']->value['title'];?>
<?php }else{ ?><a href="?g=<?php echo @GROUP_NAME;?>
&m=<?php echo @MODULE_NAME;?>
&a=view&c_id=<?php echo $_smarty_tpl->tpl_vars['item']->value['c_id'];?>
"><?php echo $_smarty_tpl->tpl_vars['item']->value['m_name'];?>
<?php }?><?php if ($_smarty_tpl->tpl_vars['item']->value['c_type']==1){?>满<?php echo $_smarty_tpl->tpl_vars['item']->value['money_max'];?>
减<?php echo $_smarty_tpl->tpl_vars['item']->value['money_reduce'];?>
元优惠券<?php }else{ ?><?php echo $_smarty_tpl->tpl_vars['item']->value['money_amount'];?>
代金券<?php }?></a></td>
<td align="left"><?php echo $_smarty_tpl->tpl_vars['item']->value['expiry'];?>
</td>
<td align="center"><span class="pointer" module="<?php echo @MODULE_NAME;?>
" group="<?php echo @GROUP_NAME;?>
" model="coupon_code_best" pk="c_id" href="javascript:;" onclick="textEdit(this,'<?php echo $_smarty_tpl->tpl_vars['item']->value['c_id'];?>
','sort_order')"><?php echo $_smarty_tpl->tpl_vars['item']->value['sort_order'];?>
</span></td>
<td align="center"><a href="?g=<?php echo @GROUP_NAME;?>
&m=<?php echo @MODULE_NAME;?>
&a=edit_best&id=<?php echo $_smarty_tpl->tpl_vars['item']->value['c_id'];?>
">编辑</a>
&nbsp;&nbsp;<a onclick="del(<?php echo $_smarty_tpl->tpl_vars['item']->value['c_id'];?>
)" href="javascript:;">删除</a>
</td>
</tr>
<?php } ?>
</tbody></table>
<div class="pager"><?php echo $_smarty_tpl->tpl_vars['pagelink']->value;?>
</div>
<?php echo $_smarty_tpl->getSubTemplate ("../Public/footer.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>
<?php }} ?>
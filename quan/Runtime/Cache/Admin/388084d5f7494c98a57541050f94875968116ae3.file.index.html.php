<?php /* Smarty version Smarty-3.1.6, created on 2012-05-04 14:14:21
         compiled from "D:\APMServ5.2.6\www\htdocs\quan\Tpl\Admin\CouponCode\index.html" */ ?>
<?php /*%%SmartyHeaderCode:234144fa373bd4beda1-53578383%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '388084d5f7494c98a57541050f94875968116ae3' => 
    array (
      0 => 'D:\\APMServ5.2.6\\www\\htdocs\\quan\\Tpl\\Admin\\CouponCode\\index.html',
      1 => 1335886941,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '234144fa373bd4beda1-53578383',
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
  'unifunc' => 'content_4fa373bda7133',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_4fa373bda7133')) {function content_4fa373bda7133($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ("../Public/header.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

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
	$('#dialog>p').html('将删除所有的优惠码及其他相关数据<br />确定要删除吗？');
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
														$('#tt-item-'+id).remove();
														$('#dialog').dialog('close');
													}
													});
						},
						"取消": function() { 
							$(this).dialog("close"); 
						}
					}
				});
}
function set_best()
{
	if(check_count('id[]') == 0){
		$('#dialog>p').html('请选择优惠券');
		$('#dialog').dialog('open');
		return false;
	}
	if(check_count('id[]') > 1){
		$('#dialog>p').html('只能选择一个优惠券');
		$('#dialog').dialog('open');
		return false;
	}
	var id = get_check_val('id[]');
	var url = "?g="+g+"&m="+m+"&a=set_best&id="+id;
	window.location.href = url;
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
    <div class="img-button "><p><input type="button" class="addData" onclick="set_best()" value="设为每日精选" name="addData" id="addData"></p></div>
</div>
<div class="search-box">
    <form action="?">
        <span>商家名</span>
        <input type="text" size="12" name="kw" value="" class="textinput">
		<small></small>
		<input type="submit" value="搜索" class="submit_btn">
        <input type="hidden" value="<?php echo @GROUP_NAME;?>
" name="g">
		<input type="hidden" value="<?php echo @MODULE_NAME;?>
" name="m">
		<input type="hidden" value="<?php echo @ACTION_NAME;?>
" name="a">
  </form>
</div>
<table cellspacing="0" cellpadding="0" border="0" class="table-list list" id="checkList">
<thead>
<tr>
<th width="30" class="first"><input type="checkbox" onclick="check_all('id[]', this)"></th>
<th>名称</th>
<th width="100">有效期</th>
<th width="130">价格</th>
<th width="60">数量</th>
<th width="70">已领取数量</th>
<th width="80">剩余数量</th>
<th width="60">排序</th>
<th width="60">激活</th>
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
<td class="first"><input type="checkbox" value="<?php echo $_smarty_tpl->tpl_vars['item']->value['c_id'];?>
" name="id[]"></td>
<td align="left"><?php if ($_smarty_tpl->tpl_vars['item']->value['title']){?><?php echo $_smarty_tpl->tpl_vars['item']->value['title'];?>
<?php }else{ ?><a href="?g=<?php echo @GROUP_NAME;?>
&m=<?php echo @MODULE_NAME;?>
&a=view&c_id=<?php echo $_smarty_tpl->tpl_vars['item']->value['c_id'];?>
"><?php echo $_smarty_tpl->tpl_vars['item']->value['m_name'];?>
<?php }?><?php if ($_smarty_tpl->tpl_vars['item']->value['c_type']==1){?>满<?php echo $_smarty_tpl->tpl_vars['item']->value['money_max'];?>
减<?php echo $_smarty_tpl->tpl_vars['item']->value['money_reduce'];?>
元优惠券<?php }else{ ?><?php echo $_smarty_tpl->tpl_vars['item']->value['money_amount'];?>
代金券<?php }?></a></td>
<td align="left"><?php if ($_smarty_tpl->tpl_vars['item']->value['expiry_type']==1){?><?php echo $_smarty_tpl->tpl_vars['item']->value['expiry'];?>
<?php }else{ ?>无限制<?php }?></td>
<td align="left"><?php if ($_smarty_tpl->tpl_vars['item']->value['price_type']==1){?>免费<?php }elseif($_smarty_tpl->tpl_vars['item']->value['price_type']==2){?><?php echo $_smarty_tpl->tpl_vars['item']->value['price'];?>
元<?php }elseif($_smarty_tpl->tpl_vars['item']->value['price_type']==3){?><?php echo $_smarty_tpl->tpl_vars['item']->value['price'];?>
积分<?php }?></td>
<td align="left"><?php echo $_smarty_tpl->tpl_vars['item']->value['amount'];?>
</td>
<td align="center"><?php echo $_smarty_tpl->tpl_vars['item']->value['fetched_amount'];?>
</td>
<td align="center"><?php echo $_smarty_tpl->tpl_vars['item']->value['amount']-$_smarty_tpl->tpl_vars['item']->value['fetched_amount'];?>
</td>
<td align="center"><span class="pointer" module="<?php echo @MODULE_NAME;?>
" group="<?php echo @GROUP_NAME;?>
" model="" pk="" href="javascript:;" onclick="textEdit(this,'<?php echo $_smarty_tpl->tpl_vars['item']->value['c_id'];?>
','sort_order')"><?php echo $_smarty_tpl->tpl_vars['item']->value['sort_order'];?>
</span></td>
<td align="center"><span class="pointer" module="<?php echo @MODULE_NAME;?>
" group="<?php echo @GROUP_NAME;?>
" model="" pk="" href="javascript:;" onclick="toggleStatus(this,'<?php echo $_smarty_tpl->tpl_vars['item']->value['c_id'];?>
','is_active')"><img src="__PUBLIC__/Css/Admin/Images/status-<?php echo $_smarty_tpl->tpl_vars['item']->value['is_active'];?>
.gif" class="status" status="<?php echo $_smarty_tpl->tpl_vars['item']->value['is_active'];?>
" /></span></td>
<td align="center"><a href="?g=<?php echo @GROUP_NAME;?>
&m=<?php echo @MODULE_NAME;?>
&a=code&c_id=<?php echo $_smarty_tpl->tpl_vars['item']->value['c_id'];?>
">优惠码管理</a>&nbsp;&nbsp;<a href="?g=<?php echo @GROUP_NAME;?>
&m=<?php echo @MODULE_NAME;?>
&a=edit&c_id=<?php echo $_smarty_tpl->tpl_vars['item']->value['c_id'];?>
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
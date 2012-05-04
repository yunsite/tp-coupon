<?php /* Smarty version Smarty-3.1.6, created on 2012-05-04 15:16:28
         compiled from "D:\APMServ5.2.6\www\htdocs\quan\Tpl\Admin\Adv\index.html" */ ?>
<?php /*%%SmartyHeaderCode:56854fa3824cd1e272-66272670%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '84baee9ca50efc454ff9b986ebea7ccefb678b31' => 
    array (
      0 => 'D:\\APMServ5.2.6\\www\\htdocs\\quan\\Tpl\\Admin\\Adv\\index.html',
      1 => 1335942697,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '56854fa3824cd1e272-66272670',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    '_hash_' => 0,
    'ads' => 0,
    'item' => 0,
    'pagelink' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.6',
  'unifunc' => 'content_4fa3824d09f1d',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_4fa3824d09f1d')) {function content_4fa3824d09f1d($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ("../Public/header.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

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
							var url = "?g="+g+"&m="+m+"&a=del&ad_id="+id+"&ajax=1&_hash_="+_hash_;
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
<th width="30" class="first"><input type="checkbox" onclick="check_all('ad_id[]', this)"></th>
<th width="50">ID</th>
<th>广告名称</th>
<th width="200">广告位置</th>
<th width="80">广告类型</th>
<th width="120">开始时间</th>
<th width="120">结束时间</th>
<th width="80">点击次数</th>
<th>调用代码</th>
<th width="100">操作</th>
</tr>
</thead>
<tbody>
<?php  $_smarty_tpl->tpl_vars['item'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['item']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['ads']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['item']->key => $_smarty_tpl->tpl_vars['item']->value){
$_smarty_tpl->tpl_vars['item']->_loop = true;
?>
<tr id="tt-item-<?php echo $_smarty_tpl->tpl_vars['item']->value['ad_id'];?>
">
<td class="first"><input type="checkbox" value="<?php echo $_smarty_tpl->tpl_vars['item']->value['ad_id'];?>
" name="ad_id[]"></td>
<td><?php echo $_smarty_tpl->tpl_vars['item']->value['ad_id'];?>
</td>
<td align="left"><?php echo $_smarty_tpl->tpl_vars['item']->value['ad_name'];?>
</td>
<td align="left"><?php echo $_smarty_tpl->tpl_vars['item']->value['ad_position'];?>
</td>
<td align="left"><?php echo $_smarty_tpl->tpl_vars['item']->value['media_type'];?>
</td>
<td align="left"><?php echo $_smarty_tpl->tpl_vars['item']->value['start_time'];?>
</td>
<td align="left"><?php echo $_smarty_tpl->tpl_vars['item']->value['end_time'];?>
</td>
<td align="left"><?php echo $_smarty_tpl->tpl_vars['item']->value['click_count'];?>
</td>
<td align="left">&lt;script type="text/javascript" src="__ROOT__/index.php?m=Adv&a=show&id=<?php echo $_smarty_tpl->tpl_vars['item']->value['ad_id'];?>
"&gt;&lt;/script&gt;</td>
<td align="center"><a href="?g=<?php echo @GROUP_NAME;?>
&m=<?php echo @MODULE_NAME;?>
&a=edit&ad_id=<?php echo $_smarty_tpl->tpl_vars['item']->value['ad_id'];?>
">编辑</a>
&nbsp;&nbsp;<a onclick="del(<?php echo $_smarty_tpl->tpl_vars['item']->value['ad_id'];?>
)" href="javascript:;">删除</a>
</td>
</tr>
<?php } ?>
</tbody></table>
<div class="pager"><?php echo $_smarty_tpl->tpl_vars['pagelink']->value;?>
</div>
<?php echo $_smarty_tpl->getSubTemplate ("../Public/footer.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>
<?php }} ?>
<?php /* Smarty version Smarty-3.1.6, created on 2012-05-04 15:12:16
         compiled from "D:\APMServ5.2.6\www\htdocs\quan\Tpl\Admin\CouponCodeMall\index.html" */ ?>
<?php /*%%SmartyHeaderCode:42204fa3815033c3e3-57000830%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '5cb7864cb416b103a69736c49b08c9482b1c437c' => 
    array (
      0 => 'D:\\APMServ5.2.6\\www\\htdocs\\quan\\Tpl\\Admin\\CouponCodeMall\\index.html',
      1 => 1335409679,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '42204fa3815033c3e3-57000830',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    '_hash_' => 0,
    'categorys' => 0,
    'item' => 0,
    'malls' => 0,
    'item2' => 0,
    'pagelink' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.6',
  'unifunc' => 'content_4fa381507d43d',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_4fa381507d43d')) {function content_4fa381507d43d($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ("../Public/header.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

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
	$('#dialog>p').html('将删除所有的优惠券及其他相关数据<br />确定要删除吗？');
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
														window.location.href = document.URL;
													}
													});
						},
						"取消": function() { 
							$(this).dialog("close"); 
						}
					}
				});
}
function single_action(action, isajax)
{
	if(check_count('id[]') == 0){
		$('#dialog>p').html('请选择商家');
		$('#dialog').dialog('open');
		return false;
	}
	if(check_count('id[]') > 1){
		$('#dialog>p').html('只能选择一个商家');
		$('#dialog').dialog('open');
		return false;
	}
	var id = get_check_val('id[]');
	var url = "?g="+g+"&m="+m+"&a="+action+"&id="+id;
	if(isajax === false){
		window.location.href = url;
	}
	url += "&ajax=1&_hash_="+_hash_;
	$.getJSON(url, function(data){
			if(data.status == 0){
				$('#dialog>p').html(data.info);
				$('#dialog').dialog('open');
			}else{
				$('#dialog>p').html('操作成功');
				if(action == 'rec2index'){
					_hash_ = data.info;
					$('#dialog').dialog('open');
				}else{
					window.location.href = document.URL;
				}
			}
	});
}
function active()
{
	$('#dialog>p').html('将重新激活该商家所有未过期且未被领取的优惠券');
	$('#dialog').dialog('open');
	single_action('active');
}
function unactive()
{
	$('#dialog>p').html('将屏蔽该商家所有未过期且未被领取的优惠券');
	$('#dialog').dialog('open');
	single_action('unactive');
}
function rec()
{
	single_action('rec', false);
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
&a=add'" value="添加商家" name="addData" id="addData"></p></div>
    <div class="img-button "><p><input type="button" class="addData" onclick="active()" value="激活" name="addData" id="addData"></p></div>
    <div class="img-button "><p><input type="button" class="addData" onclick="unactive()" value="屏蔽" name="addData" id="addData"></p></div>
    <div class="img-button "><p><input type="button" class="addData" onclick="rec()" value="推荐" name="addData" id="addData"></p></div>
	</div>
<div class="search-box">
    <form action="?">
    	<span>分类</span>
        <select name="c_id">
        <option value="0">不限...</option>
        <?php  $_smarty_tpl->tpl_vars['item'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['item']->_loop = false;
 $_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['categorys']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['item']->key => $_smarty_tpl->tpl_vars['item']->value){
$_smarty_tpl->tpl_vars['item']->_loop = true;
 $_smarty_tpl->tpl_vars['key']->value = $_smarty_tpl->tpl_vars['item']->key;
?>
        <option value="<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
"><?php echo $_smarty_tpl->tpl_vars['item']->value['prefix'];?>
<?php echo $_smarty_tpl->tpl_vars['item']->value['name'];?>
</option>
        <?php } ?>
        </select>
        <span>关键字</span>
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
<th>分类</th>
<th>客服电话</th>
<th>网址</th>
<th width="50">激活</th>
<th width="60">排序</th>
<th width="100">操作</th>
</tr>
</thead>
<tbody>
<?php  $_smarty_tpl->tpl_vars['item'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['item']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['malls']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['item']->key => $_smarty_tpl->tpl_vars['item']->value){
$_smarty_tpl->tpl_vars['item']->_loop = true;
?>
<tr id="tt-item-<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
">
<td class="first"><input type="checkbox" value="<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
" name="id[]"></td>
<td align="left"><a href="?g=<?php echo @GROUP_NAME;?>
&m=<?php echo @MODULE_NAME;?>
&a=view&id=<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
"><?php echo $_smarty_tpl->tpl_vars['item']->value['name'];?>
</a></td>
<td align="left"><?php  $_smarty_tpl->tpl_vars['item2'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['item2']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['item']->value['cates']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
 $_smarty_tpl->tpl_vars['item2']->total= $_smarty_tpl->_count($_from);
 $_smarty_tpl->tpl_vars['item2']->iteration=0;
foreach ($_from as $_smarty_tpl->tpl_vars['item2']->key => $_smarty_tpl->tpl_vars['item2']->value){
$_smarty_tpl->tpl_vars['item2']->_loop = true;
 $_smarty_tpl->tpl_vars['item2']->iteration++;
 $_smarty_tpl->tpl_vars['item2']->last = $_smarty_tpl->tpl_vars['item2']->iteration === $_smarty_tpl->tpl_vars['item2']->total;
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']['cates']['last'] = $_smarty_tpl->tpl_vars['item2']->last;
?><?php echo $_smarty_tpl->tpl_vars['item2']->value['name'];?>
<?php if (!$_smarty_tpl->getVariable('smarty')->value['foreach']['cates']['last']){?> &gt; <?php }?><?php } ?></td>
<td align="left"><?php echo $_smarty_tpl->tpl_vars['item']->value['tel'];?>
</td>
<td align="left"><a href="<?php echo $_smarty_tpl->tpl_vars['item']->value['website'];?>
" target="_blank"><?php echo $_smarty_tpl->tpl_vars['item']->value['website'];?>
</a></td>
<td align="center"><img src="__PUBLIC__/Css/Admin/Images/status-<?php echo $_smarty_tpl->tpl_vars['item']->value['is_active'];?>
.gif" class="status" status="<?php echo $_smarty_tpl->tpl_vars['item']->value['is_active'];?>
" /></td>
<td align="center"><span class="pointer" module="<?php echo @MODULE_NAME;?>
" group="<?php echo @GROUP_NAME;?>
" model="" pk="" href="javascript:;" onclick="textEdit(this,'<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
','sort_order')"><?php echo $_smarty_tpl->tpl_vars['item']->value['sort_order'];?>
</span></td>
<td align="center"><a href="?g=<?php echo @GROUP_NAME;?>
&m=<?php echo @MODULE_NAME;?>
&a=edit&id=<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
">编辑</a>
&nbsp;&nbsp;<a onclick="del(<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
)" href="javascript:;">删除</a>
</td>
</tr>
<?php } ?>
</tbody></table>
<div class="pager"><?php echo $_smarty_tpl->tpl_vars['pagelink']->value;?>
</div>
<?php echo $_smarty_tpl->getSubTemplate ("../Public/footer.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>
<?php }} ?>
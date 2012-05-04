<?php /* Smarty version Smarty-3.1.6, created on 2012-05-04 14:15:07
         compiled from "D:\APMServ5.2.6\www\htdocs\quan\Tpl\Admin\Article\index.html" */ ?>
<?php /*%%SmartyHeaderCode:291984fa373eb0ac146-92281529%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '7150c5215fd0480c66cbe805b937bd97d7e92252' => 
    array (
      0 => 'D:\\APMServ5.2.6\\www\\htdocs\\quan\\Tpl\\Admin\\Article\\index.html',
      1 => 1331704764,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '291984fa373eb0ac146-92281529',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    '_hash_' => 0,
    'articles' => 0,
    'item' => 0,
    'pagelink' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.6',
  'unifunc' => 'content_4fa373eb340e5',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_4fa373eb340e5')) {function content_4fa373eb340e5($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ("../Public/header.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

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

function buildHtml()
{
	var id = get_check_val('article_id[]');
	if(id == ''){
		$('#dialog>p').html('请选择文章');
		$('#dialog').dialog('open');
		return false;
	}
	var url = "?g="+g+"&m="+m+"&a=build_html&id="+id+"&ajax=1&_hash_="+_hash_;
	$.getJSON(url, function(data){
			if(data.status == 0){
				$('#dialog>p').html('操作失败');
				$('#dialog').dialog('open');
			}else{
				_hash_ = data.info;
				$('#dialog>p').html('操作成功');
				$('#dialog').dialog('open');
				setTimeout(function(){
									$('#dialog').dialog("close"); 
									},2000);
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
    <div class="img-button "><p><input type="button" class="addData" onclick="buildHtml()" value="生成静态" name="addData" id="addData"></p></div>
	</div>
<div class="search-box">
</div>
<table cellspacing="0" cellpadding="0" border="0" class="table-list list" id="checkList">
<thead>
<tr>
<th width="30" class="first"><input type="checkbox" onclick="check_all('article_id[]', this)"></th>
<th>文章标题</th>
<th width="120">分类</th>
<th width="120">添加时间</th>
<th width="100">操作</th>
</tr>
</thead>
<tbody>
<?php  $_smarty_tpl->tpl_vars['item'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['item']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['articles']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['item']->key => $_smarty_tpl->tpl_vars['item']->value){
$_smarty_tpl->tpl_vars['item']->_loop = true;
?>
<tr id="tt-item-<?php echo $_smarty_tpl->tpl_vars['item']->value['article_id'];?>
">
<td class="first"><input type="checkbox" value="<?php echo $_smarty_tpl->tpl_vars['item']->value['article_id'];?>
" name="article_id[]"></td>
<td align="left"><?php echo $_smarty_tpl->tpl_vars['item']->value['title'];?>
</td>
<td align="left"><?php echo $_smarty_tpl->tpl_vars['item']->value['cate_name'];?>
</td>
<td align="left"><?php echo $_smarty_tpl->tpl_vars['item']->value['addtime'];?>
</td>
<td align="center"><a href="?g=<?php echo @GROUP_NAME;?>
&m=<?php echo @MODULE_NAME;?>
&a=edit&article_id=<?php echo $_smarty_tpl->tpl_vars['item']->value['article_id'];?>
">编辑</a>
&nbsp;&nbsp;<a onclick="del(<?php echo $_smarty_tpl->tpl_vars['item']->value['article_id'];?>
)" href="javascript:;">删除</a>
</td>
</tr>
<?php } ?>
</tbody></table>
<div class="pager"><?php echo $_smarty_tpl->tpl_vars['pagelink']->value;?>
</div>
<?php echo $_smarty_tpl->getSubTemplate ("../Public/footer.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>
<?php }} ?>
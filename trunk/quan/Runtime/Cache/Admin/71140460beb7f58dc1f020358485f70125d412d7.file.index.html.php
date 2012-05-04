<?php /* Smarty version Smarty-3.1.6, created on 2012-05-04 14:15:09
         compiled from "D:\APMServ5.2.6\www\htdocs\quan\Tpl\Admin\Member\index.html" */ ?>
<?php /*%%SmartyHeaderCode:10714fa373edcc8d26-17506659%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '71140460beb7f58dc1f020358485f70125d412d7' => 
    array (
      0 => 'D:\\APMServ5.2.6\\www\\htdocs\\quan\\Tpl\\Admin\\Member\\index.html',
      1 => 1335886688,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '10714fa373edcc8d26-17506659',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    '_hash_' => 0,
    'users' => 0,
    'item' => 0,
    'pagelink' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.6',
  'unifunc' => 'content_4fa373ee1612a',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_4fa373ee1612a')) {function content_4fa373ee1612a($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ("../Public/header.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<script type="text/javascript" src="__PUBLIC__/Js/jquery.SetTableBgColor.js"></script>
<script type="text/javascript" src="__PUBLIC__/Js/dataList.js"></script>
<script type="text/javascript">
var g = '<?php echo @GROUP_NAME;?>
';
var m = '<?php echo @MODULE_NAME;?>
';
var _hash_ = '<?php echo $_smarty_tpl->tpl_vars['_hash_']->value;?>
';

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
</div>
<div class="search-box">
    <form action="?">
        <span>昵称</span>
        <input type="text" size="12" name="nick" value="" class="textinput">
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
<th>昵称</th>
<th width="150">E-mail</th>
<th width="60">积分</th>
<th width="80">金钱(:元)</th>
<th width="150">最后登陆时间</th>
<th width="100">最后登陆IP</th>
<th width="60">锁定</th>
<th width="130">操作</th>
</tr>
</thead>
<tbody>
<?php  $_smarty_tpl->tpl_vars['item'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['item']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['users']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['item']->key => $_smarty_tpl->tpl_vars['item']->value){
$_smarty_tpl->tpl_vars['item']->_loop = true;
?>
<tr id="tt-item-<?php echo $_smarty_tpl->tpl_vars['item']->value['user_id'];?>
">
<td class="first"><input type="checkbox" value="<?php echo $_smarty_tpl->tpl_vars['item']->value['user_id'];?>
" name="id[]"></td>
<td align="left"><?php echo $_smarty_tpl->tpl_vars['item']->value['nick'];?>
</td>
<td align="left"><?php echo $_smarty_tpl->tpl_vars['item']->value['email'];?>
</td>
<td align="left"><span class="pointer" module="<?php echo @MODULE_NAME;?>
" group="<?php echo @GROUP_NAME;?>
" model="User" pk="" href="javascript:;" onclick="textEdit(this,'<?php echo $_smarty_tpl->tpl_vars['item']->value['user_id'];?>
','credit')"><?php echo $_smarty_tpl->tpl_vars['item']->value['credit'];?>
</span></td>
<td align="left"><span class="pointer" module="<?php echo @MODULE_NAME;?>
" group="<?php echo @GROUP_NAME;?>
" model="User" pk="" href="javascript:;" onclick="textEdit(this,'<?php echo $_smarty_tpl->tpl_vars['item']->value['user_id'];?>
','money')"><?php echo $_smarty_tpl->tpl_vars['item']->value['money'];?>
</span></td>
<td align="center"><?php echo $_smarty_tpl->tpl_vars['item']->value['last_login'];?>
</td>
<td align="center"><?php echo $_smarty_tpl->tpl_vars['item']->value['last_ip'];?>
</td>
<td align="center"><span class="pointer" module="<?php echo @MODULE_NAME;?>
" group="<?php echo @GROUP_NAME;?>
" model="User" pk="" href="javascript:;" onclick="toggleStatus(this,'<?php echo $_smarty_tpl->tpl_vars['item']->value['user_id'];?>
','is_locked')"><img src="__PUBLIC__/Css/Admin/Images/status-<?php echo $_smarty_tpl->tpl_vars['item']->value['is_locked'];?>
.gif" class="status" status="<?php echo $_smarty_tpl->tpl_vars['item']->value['is_locked'];?>
" /></span></td>
<td align="center"><a href="?g=<?php echo @GROUP_NAME;?>
&m=Payment&nick=<?php echo rawurlencode($_smarty_tpl->tpl_vars['item']->value['nick']);?>
">充值记录</a>
</td>
</tr>
<?php } ?>
</tbody></table>
<div class="pager"><?php echo $_smarty_tpl->tpl_vars['pagelink']->value;?>
</div>
<?php echo $_smarty_tpl->getSubTemplate ("../Public/footer.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>
<?php }} ?>
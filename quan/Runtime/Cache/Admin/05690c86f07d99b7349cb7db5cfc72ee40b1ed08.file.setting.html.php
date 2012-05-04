<?php /* Smarty version Smarty-3.1.6, created on 2012-05-04 14:14:30
         compiled from "D:\APMServ5.2.6\www\htdocs\quan\Tpl\Admin\SysConf\setting.html" */ ?>
<?php /*%%SmartyHeaderCode:258934fa373c6a802d9-02023631%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '05690c86f07d99b7349cb7db5cfc72ee40b1ed08' => 
    array (
      0 => 'D:\\APMServ5.2.6\\www\\htdocs\\quan\\Tpl\\Admin\\SysConf\\setting.html',
      1 => 1328165996,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '258934fa373c6a802d9-02023631',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'group_list' => 0,
    'group' => 0,
    '_hash_' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.6',
  'unifunc' => 'content_4fa373c6ce123',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_4fa373c6ce123')) {function content_4fa373c6ce123($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ("../Public/header.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<script type="text/javascript">

function chgtab(tt_item_id){
	$('.tabs-title>div').removeClass('active');
	$('.tabs-title>div#tt-item-'+tt_item_id).addClass('active');
	$('.form-table').css('display','none');
	$('#'+tt_item_id+'-table').css('display','block');
}

</script>
<div class="tabs-title">
<?php  $_smarty_tpl->tpl_vars['group'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['group']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['group_list']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']["bar_group"]['iteration']=0;
foreach ($_from as $_smarty_tpl->tpl_vars['group']->key => $_smarty_tpl->tpl_vars['group']->value){
$_smarty_tpl->tpl_vars['group']->_loop = true;
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']["bar_group"]['iteration']++;
?>
<div rel="<?php echo $_smarty_tpl->tpl_vars['group']->value['name'];?>
" class="tt-item <?php if ($_smarty_tpl->getVariable('smarty')->value['foreach']['bar_group']['iteration']==1){?>active<?php }?>" id="tt-item-<?php echo $_smarty_tpl->tpl_vars['group']->value['code'];?>
"><p><a href="javascript:;" onclick="chgtab('<?php echo $_smarty_tpl->tpl_vars['group']->value['code'];?>
');"><?php echo $_smarty_tpl->tpl_vars['group']->value['name'];?>
</a></p></div>
<?php } ?>
</div>
<form action="?g=<?php echo @GROUP_NAME;?>
&m=<?php echo @MODULE_NAME;?>
&a=<?php echo @ACTION_NAME;?>
" method="post" name="form" enctype="multipart/form-data">
    <?php  $_smarty_tpl->tpl_vars['group'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['group']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['group_list']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']["body_group"]['iteration']=0;
foreach ($_from as $_smarty_tpl->tpl_vars['group']->key => $_smarty_tpl->tpl_vars['group']->value){
$_smarty_tpl->tpl_vars['group']->_loop = true;
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']["body_group"]['iteration']++;
?>
    <div style="height:auto; width:100%; <?php if ($_smarty_tpl->getVariable('smarty')->value['foreach']['body_group']['iteration']!=1){?>display:none;<?php }?>" class="form-table" id="<?php echo $_smarty_tpl->tpl_vars['group']->value['code'];?>
-table">
    <table width="100%" cellspacing="0" cellpadding="4" border="0" class="table-form tabs-item tabs-active">
    
      <?php  $_smarty_tpl->tpl_vars['var'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['var']->_loop = false;
 $_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['group']->value['vars']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['var']->key => $_smarty_tpl->tpl_vars['var']->value){
$_smarty_tpl->tpl_vars['var']->_loop = true;
 $_smarty_tpl->tpl_vars['key']->value = $_smarty_tpl->tpl_vars['var']->key;
?>
      <?php echo $_smarty_tpl->getSubTemplate ("./setting_form.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

      <?php } ?>
    </table>
    </div>
    <?php } ?>

<table cellspacing="0" cellpadding="4" border="0" style="border-top:none;" class="table-form">
	<tbody><tr class="act">
		<th width="200" class="first">&nbsp;</th>
		<td>
			<input type="submit" value="提交" class="submit_btn">
			<input type="reset" value="重置" class="reset_btn">
		</td>
	</tr>
</tbody></table>
<input name="_hash_" type="hidden" value="<?php echo $_smarty_tpl->tpl_vars['_hash_']->value;?>
" />
</form>
<script language="JavaScript">
var ReWriteSelected = null;
var ReWriteRadiobox = document.getElementsByName("value[209]");

for (var i=0; i<ReWriteRadiobox.length; i++)
{
  if (ReWriteRadiobox[i].checked)
  {
    ReWriteSelected = ReWriteRadiobox[i];
  }
}

function ReWriterConfirm(sender)
{
  if (sender == ReWriteSelected) return true;
  var res = true;
  if (sender != ReWriteRadiobox[0]) {
    var res = confirm('URL Rewrite 功能要求您的 Web Server 必须是 Apache，\n并且起用了 rewrite 模块。\n同时请您确认是否已经将htaccess.txt文件重命名为.htaccess。\n如果服务器上还有其他的重写规则请去掉注释,请将RewriteBase行的注释去掉,并将路径设置为服务器请求的绝对路径');
  }

  if (res==false)
  {
      ReWriteSelected.checked = true;
  }
  else
  {
    ReWriteSelected = sender;
  }
  return res;
}

</script>
<?php echo $_smarty_tpl->getSubTemplate ("../Public/footer.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>
<?php }} ?>
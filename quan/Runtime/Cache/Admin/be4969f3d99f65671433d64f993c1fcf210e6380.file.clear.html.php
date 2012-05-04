<?php /* Smarty version Smarty-3.1.6, created on 2012-05-04 16:19:10
         compiled from "D:\APMServ5.2.6\www\htdocs\quan\Tpl\Admin\Cache\clear.html" */ ?>
<?php /*%%SmartyHeaderCode:84744fa390fe2c8de0-51245966%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'be4969f3d99f65671433d64f993c1fcf210e6380' => 
    array (
      0 => 'D:\\APMServ5.2.6\\www\\htdocs\\quan\\Tpl\\Admin\\Cache\\clear.html',
      1 => 1335425727,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '84744fa390fe2c8de0-51245966',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    '_hash_' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.6',
  'unifunc' => 'content_4fa390fe409a6',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_4fa390fe409a6')) {function content_4fa390fe409a6($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ("../Public/header.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<script type="text/javascript">
var g = '<?php echo @GROUP_NAME;?>
';
var m = '<?php echo @MODULE_NAME;?>
';
var a = '<?php echo @ACTION_NAME;?>
';
var _hash_ = '<?php echo $_smarty_tpl->tpl_vars['_hash_']->value;?>
';

function update()
{
	$('#mask,#loading').show();
	var post_data = "_hash_="+_hash_;
	$.ajax({
   		type: "POST",
   		url: '?g='+g+'&m='+m+'&a='+a+'&ajax=1',
   		data: post_data,
   		success: function(msg){
			$('#mask,#loading').hide();
     		var result = eval("("+msg+")");
			if(result.status == 0){
				alert(result.info);
				return false;
			}else{
				alert('操作成功');
			}
   		}
		});
}
$(document).ready(function(){
	$('#mask,#loading').css({'height':$(document).height(),'width':$(document).width()});
});

</script>
<form action="?" method="post" name="form_post" id="form_post">
<table cellspacing="0" cellpadding="4" border="0" class="table-form">
	<tbody><tr>
		<th class="first"><center><strong>确定要清除系统缓存吗？</strong></center></th>
		</tr>
	<tr class="act">
		<th class="first">
		  <center><input type="button" value="确定" class="submit_btn" onclick="update();"></center>	    </th>
	  </tr>
</tbody></table>
</form>
<div id="mask" style="background:#000 none repeat scroll 0% 0%; position: fixed; z-index: 9998;top: 0px; left: 0px; display:none; -moz-background-clip: border; -moz-background-origin: padding; -moz-background-inline-policy: continuous; opacity: 0.8;filter:Alpha(Opacity=80)"></div>
<div id="loading" style=" position:absolute; z-index: 9999;top: 0px; left: 0px; display:none;text-align:center"><img src="__PUBLIC__/Images/loading.gif" height="37" width="37" style="position:relative; top:160px;" /></div>
<?php echo $_smarty_tpl->getSubTemplate ("../Public/footer.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>
<?php }} ?>
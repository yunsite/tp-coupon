<?php /* Smarty version Smarty-3.1.6, created on 2012-05-04 15:14:44
         compiled from "D:\APMServ5.2.6\www\htdocs\quan\Tpl\Admin\Public\success.html" */ ?>
<?php /*%%SmartyHeaderCode:244594fa381e497cb96-69585906%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '21c952c5a5af725d43d21482b227b2e3c68323b6' => 
    array (
      0 => 'D:\\APMServ5.2.6\\www\\htdocs\\quan\\Tpl\\Admin\\Public\\success.html',
      1 => 1325138618,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '244594fa381e497cb96-69585906',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'waitSecond' => 0,
    'jumpUrl' => 0,
    'message' => 0,
    'msgTitle' => 0,
    'closeWin' => 0,
    'error' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.6',
  'unifunc' => 'content_4fa381e4b88dd',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_4fa381e4b88dd')) {function content_4fa381e4b88dd($_smarty_tpl) {?><!DOCTYPE html PUBLIC '-//W3C//DTD XHTML 1.0 Transitional//EN' 'http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd'>
<html>
<head>
<title>页面提示</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<meta http-equiv='Refresh' content='<?php echo $_smarty_tpl->tpl_vars['waitSecond']->value;?>
;URL=<?php echo $_smarty_tpl->tpl_vars['jumpUrl']->value;?>
'>
<link href="__PUBLIC__/Css/Admin/style.css" rel="stylesheet" type="text/css" />
</head>
<body>
	<div class="fanwe-body">
		<div class="fb-title"><div><p><span>页面提示</span></p></div></div>
		<div class="fb-body">
			<table class="body-table" cellpadding="0" cellspacing="1" border="0">
				<tr>
					<td class="body-table-td">
						<div class="body-table-div">
							<table cellpadding="0" cellspacing="0" align="center" class="table-tootip table-tootip-success">
                                <?php if ($_smarty_tpl->tpl_vars['message']->value){?>
								<tr>
									<th><img src="__PUBLIC__/Css/Admin/Images/success.png" /></th>
									<td>
										<!--<p><?php echo $_smarty_tpl->tpl_vars['msgTitle']->value;?>
</p>-->
										<p style="color:blue;"><?php echo $_smarty_tpl->tpl_vars['message']->value;?>
</p>
                                        <?php if (!$_smarty_tpl->tpl_vars['closeWin']->value){?>
										<p>系统将在 <strong style="color:blue;" class="wait-second"><?php echo $_smarty_tpl->tpl_vars['waitSecond']->value;?>
</strong> 秒后自动关闭，如果不想等待,直接点击 <a href="<?php echo $_smarty_tpl->tpl_vars['jumpUrl']->value;?>
">这里</a></p>
										<?php }?>
									</td>
								</tr>
								<?php }?>
                                <?php if ($_smarty_tpl->tpl_vars['error']->value){?>
								<tr>
									<th><img src="__PUBLIC__/Css/Admin/Images/error.png" /></th>
									<td>
										<!--<p><?php echo $_smarty_tpl->tpl_vars['msgTitle']->value;?>
</p>-->
										<p style="color:#f30;"><?php echo $_smarty_tpl->tpl_vars['error']->value;?>
</p>
										<?php if (!$_smarty_tpl->tpl_vars['closeWin']->value){?>
										<p>系统将在 <strong style="color:blue;" class="wait-second"><?php echo $_smarty_tpl->tpl_vars['waitSecond']->value;?>
</strong> 秒后自动关闭，如果不想等待,直接点击 <a href="<?php echo $_smarty_tpl->tpl_vars['jumpUrl']->value;?>
">这里</a></p>
										<?php }?>
									</td>
								</tr>
								<?php }?>
                                <?php if ($_smarty_tpl->tpl_vars['closeWin']->value){?>
								<tr>
									<th><img src="__PUBLIC__/Css/Admin/Images/close.png" /></th>
									<td>
										<p>系统将在 <strong style="color:blue;" class="wait-second"><?php echo $_smarty_tpl->tpl_vars['waitSecond']->value;?>
</strong> 秒后自动关闭，如果不想等待,直接点击 <a href="<?php echo $_smarty_tpl->tpl_vars['jumpUrl']->value;?>
">这里</a></p>
									</td>
								</tr>
								<?php }?>
							</table>
						</div>
					</td>
				</tr>
			</table>
		</div>
	</div>
</body>
<script type="text/javascript">

jQuery(function($){
	updateBodyDivHeight();
	$(window).resize(function(){
		updateBodyDivHeight();
	});
});

function updateBodyDivHeight()
{
	jQuery(".body-table-div").height(jQuery(".fanwe-body").height() - 37);
}

</script>
</html>
<?php }} ?>
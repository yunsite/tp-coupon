<?php /* Smarty version Smarty-3.1.6, created on 2012-05-04 16:33:22
         compiled from "D:\APMServ5.2.6\www\htdocs\quan\Tpl\Home\default\Article\article.html" */ ?>
<?php /*%%SmartyHeaderCode:53814fa394528a8bf3-62337613%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '4a9c3a87aac96bbc04854e7e4f332b3baaf360a5' => 
    array (
      0 => 'D:\\APMServ5.2.6\\www\\htdocs\\quan\\Tpl\\Home\\default\\Article\\article.html',
      1 => 1335492379,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '53814fa394528a8bf3-62337613',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'article' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.6',
  'unifunc' => 'content_4fa3945298a62',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_4fa3945298a62')) {function content_4fa3945298a62($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ("../Public/header.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<?php echo $_smarty_tpl->getSubTemplate ("../Public/nav.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<div class="w990 clear">
        <div id="main">
            <div class="main_l">
                <div id="main_l_b" class="clear">
                    <h2><?php echo $_smarty_tpl->tpl_vars['article']->value['title'];?>
</h2>
                    <div class="w630"><?php echo $_smarty_tpl->tpl_vars['article']->value['content'];?>
</div>
                </div>
            </div>
            <div class="main_r" style="width: 320px;">
                
<ul class="sidebar">
    <li class="blue green">
        <h3>
            相关信息</h3>
        <ul class="twocol">
            <li class="curr"><a href="__ROOT__/Html/about.html" tittle="关于我们">关于我们</a></li><li><a href="__ROOT__/Html/contact.html" tittle="联系我们">联系我们</a></li><li><a href="__APP__?m=Article&a=links" tittle="友情链接">友情链接</a></li>
        </ul>
    </li>
</ul>

            </div>
        </div>
    </div>
<?php echo $_smarty_tpl->getSubTemplate ("../Public/footer.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>
<?php }} ?>
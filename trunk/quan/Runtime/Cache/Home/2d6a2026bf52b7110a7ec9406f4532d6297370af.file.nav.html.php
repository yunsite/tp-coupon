<?php /* Smarty version Smarty-3.1.6, created on 2012-05-04 14:00:00
         compiled from "D:\APMServ5.2.6\www\htdocs\quan\Tpl\Home\default\Public\nav.html" */ ?>
<?php /*%%SmartyHeaderCode:272914fa37060696338-68499831%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '2d6a2026bf52b7110a7ec9406f4532d6297370af' => 
    array (
      0 => 'D:\\APMServ5.2.6\\www\\htdocs\\quan\\Tpl\\Home\\default\\Public\\nav.html',
      1 => 1335845808,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '272914fa37060696338-68499831',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    '_CFG' => 0,
    'mall_hot20' => 0,
    'user' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.6',
  'unifunc' => 'content_4fa37060aaa66',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_4fa37060aaa66')) {function content_4fa37060aaa66($_smarty_tpl) {?><?php if (!is_callable('smarty_function_fixedUrl')) include 'D:\\APMServ5.2.6\\www\\htdocs\\quan\\ThinkPHP\\Extend\\Vendor\\Smarty\\plugins\\function.fixedUrl.php';
?></head>
<body>
<div class="toplink">
        <div class="w990">
            <div id="header">
               
                <div id="site_nav">
                 <div class="favl"> 
                        
                </div>
                    <ul class="quick_menu">
                        <li><iframe width="136" height="24" frameborder="0" allowtransparency="true" marginwidth="0" marginheight="0" scrolling="no" border="0" src="http://widget.weibo.com/relationship/followbutton.php?language=zh_cn&width=136&height=24&uid=2507337250&style=2&btn=red&dpc=1"></iframe>
                        </li>
                        <li class="fav"><a title="<?php echo $_smarty_tpl->tpl_vars['_CFG']->value['site_name'];?>
" href="javascript:;" onClick="AddFavorite('http://'+window.location.host+'/__ROOT__', '<?php echo $_smarty_tpl->tpl_vars['_CFG']->value['site_name'];?>
')"><font color="red">收藏<?php echo $_smarty_tpl->tpl_vars['_CFG']->value['site_name'];?>
</font></a></li>
                        <li><a href="__ROOT__/" title="网站首页">网站首页</a></li>
                        <li style="background: none;"><a title="联系我们" href="__ROOT__/Html/contact.html">联系我们</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
<div class="w990 clear">
        <div id="header">
            <div class="top">
                <div class="logo">
                    <a title="<?php echo $_smarty_tpl->tpl_vars['_CFG']->value['site_name'];?>
 - 中国最大的优惠券网站" href="__ROOT__/">
                        <img alt="<?php echo $_smarty_tpl->tpl_vars['_CFG']->value['site_name'];?>
" style="width: 303px; height: 82px;" src="__PUBLIC__/Images/Home/logo.jpg"></a></div>
                <div class="search">
                    <div class="search_f">
                        <form action="<?php echo smarty_function_fixedUrl(array('url'=>"Home/Mall/search"),$_smarty_tpl);?>
" method="post" id="searchform" name="searchform" onSubmit="if(this.kw.value==this.kw.defaultValue)return false;">
                        <ul>
                            <li id="search_c">
                                <input type="text" value="输入要搜索的商家名称，比如：京东或当当" autocomplete="off" id="search_i" name="kw" onFocus="if(this.value==this.defaultValue)this.value=''" onBlur="if(!this.value.length)this.value=this.defaultValue"></li>
                        </ul>
                        <div id="search_b"><input name="sub" type="image" value="搜索" src="__PUBLIC__/Images/Home/search.jpg"></div>
                        </form>
                    </div>
                    <div class="search_t">
                    <?php if (isset($_smarty_tpl->tpl_vars['smarty']->value['section']['r'])) unset($_smarty_tpl->tpl_vars['smarty']->value['section']['r']);
$_smarty_tpl->tpl_vars['smarty']->value['section']['r']['loop'] = is_array($_loop=$_smarty_tpl->tpl_vars['mall_hot20']->value) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$_smarty_tpl->tpl_vars['smarty']->value['section']['r']['name'] = 'r';
$_smarty_tpl->tpl_vars['smarty']->value['section']['r']['max'] = (int)10;
$_smarty_tpl->tpl_vars['smarty']->value['section']['r']['show'] = true;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['r']['max'] < 0)
    $_smarty_tpl->tpl_vars['smarty']->value['section']['r']['max'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['r']['loop'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['r']['step'] = 1;
$_smarty_tpl->tpl_vars['smarty']->value['section']['r']['start'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['r']['step'] > 0 ? 0 : $_smarty_tpl->tpl_vars['smarty']->value['section']['r']['loop']-1;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['r']['show']) {
    $_smarty_tpl->tpl_vars['smarty']->value['section']['r']['total'] = min(ceil(($_smarty_tpl->tpl_vars['smarty']->value['section']['r']['step'] > 0 ? $_smarty_tpl->tpl_vars['smarty']->value['section']['r']['loop'] - $_smarty_tpl->tpl_vars['smarty']->value['section']['r']['start'] : $_smarty_tpl->tpl_vars['smarty']->value['section']['r']['start']+1)/abs($_smarty_tpl->tpl_vars['smarty']->value['section']['r']['step'])), $_smarty_tpl->tpl_vars['smarty']->value['section']['r']['max']);
    if ($_smarty_tpl->tpl_vars['smarty']->value['section']['r']['total'] == 0)
        $_smarty_tpl->tpl_vars['smarty']->value['section']['r']['show'] = false;
} else
    $_smarty_tpl->tpl_vars['smarty']->value['section']['r']['total'] = 0;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['r']['show']):

            for ($_smarty_tpl->tpl_vars['smarty']->value['section']['r']['index'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['r']['start'], $_smarty_tpl->tpl_vars['smarty']->value['section']['r']['iteration'] = 1;
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['r']['iteration'] <= $_smarty_tpl->tpl_vars['smarty']->value['section']['r']['total'];
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['r']['index'] += $_smarty_tpl->tpl_vars['smarty']->value['section']['r']['step'], $_smarty_tpl->tpl_vars['smarty']->value['section']['r']['iteration']++):
$_smarty_tpl->tpl_vars['smarty']->value['section']['r']['rownum'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['r']['iteration'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['r']['index_prev'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['r']['index'] - $_smarty_tpl->tpl_vars['smarty']->value['section']['r']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['r']['index_next'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['r']['index'] + $_smarty_tpl->tpl_vars['smarty']->value['section']['r']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['r']['first']      = ($_smarty_tpl->tpl_vars['smarty']->value['section']['r']['iteration'] == 1);
$_smarty_tpl->tpl_vars['smarty']->value['section']['r']['last']       = ($_smarty_tpl->tpl_vars['smarty']->value['section']['r']['iteration'] == $_smarty_tpl->tpl_vars['smarty']->value['section']['r']['total']);
?><a title="<?php echo $_smarty_tpl->tpl_vars['mall_hot20']->value[$_smarty_tpl->getVariable('smarty')->value['section']['r']['index']]['name'];?>
优惠券" href="<?php echo smarty_function_fixedUrl(array('url'=>"Home/Mall/view?id=".($_smarty_tpl->tpl_vars['mall_hot20']->value[$_smarty_tpl->getVariable('smarty')->value['section']['r']['index']]['id'])),$_smarty_tpl);?>
"><?php echo $_smarty_tpl->tpl_vars['mall_hot20']->value[$_smarty_tpl->getVariable('smarty')->value['section']['r']['index']]['name'];?>
</a><?php endfor; endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
<div class="w990 clear">
        <div id="nav">
            <div class="w990">
                <ul id="nav_l">
                    <li><a href="__ROOT__/" <?php if (@MODULE_NAME=='Index'&&@ACTION_NAME=='index'){?>class="active"<?php }?>><span></span>首页</a></li>
                    <li>|</li>
                    <li><a href="<?php echo smarty_function_fixedUrl(array('url'=>"Home/Code/latest"),$_smarty_tpl);?>
" <?php if (@MODULE_NAME=='Code'&&@ACTION_NAME=='latest'){?>class="active"<?php }?>><span></span>最新优惠券</a></li>
                    <li>|</li>
                    <li><a href="<?php echo smarty_function_fixedUrl(array('url'=>"Home/Code/hot"),$_smarty_tpl);?>
" <?php if (@MODULE_NAME=='Code'&&@ACTION_NAME=='hot'){?>class="active"<?php }?>><span></span>热门优惠券</a></li>
                    <li>|</li>
                    <li><a href="<?php echo smarty_function_fixedUrl(array('url'=>"Home/Code/lastestpulled"),$_smarty_tpl);?>
" <?php if (@MODULE_NAME=='Code'&&@ACTION_NAME=='lastestpulled'){?>class="active"<?php }?>><span></span>最近被领取的优惠券</a></li>
                    <li>|</li>
                    <li><a href="<?php echo smarty_function_fixedUrl(array('url'=>"Home/Mall/lists"),$_smarty_tpl);?>
" <?php if (@MODULE_NAME=='Mall'&&@ACTION_NAME=='lists'){?>class="active"<?php }?>><span></span>商家大全</a></li>                
                </ul>
                
<ul id="nav_r">
    <?php if ($_smarty_tpl->tpl_vars['user']->value['user_id']){?>
    <li id="usercenter"><a href="<?php echo smarty_function_fixedUrl(array('url'=>"Home/User/codes"),$_smarty_tpl);?>
" class=""><span></span>账号中心</a>
        <div style="display: none;" class="nav_i">
            <div class="nav_i_u">
                <div class="nav_i_u_l">
                    <a href="javascript:void(0);"><img src="<?php echo $_smarty_tpl->tpl_vars['user']->value['avatar'];?>
" onerror="this.src='__PUBLIC__/Images/Home/avatar.jpeg'"></a>
                </div>
                <div class="nav_i_u_i">
                    
                    <a href="javascript:void(0);"><?php echo $_smarty_tpl->tpl_vars['user']->value['nick'];?>
</a><br>
                    
                </div>
            </div>
            <ul>
                <li><a href="<?php echo smarty_function_fixedUrl(array('url'=>"Home/User/codes"),$_smarty_tpl);?>
" style="color: #f00">我领取的优惠券</a></li>
                <li><a href="<?php echo smarty_function_fixedUrl(array('url'=>"Home/Payment/pay"),$_smarty_tpl);?>
">账号充值</a></li>
                <li><a href="<?php echo smarty_function_fixedUrl(array('url'=>"Home/User/consume_records"),$_smarty_tpl);?>
">消费记录</a></li>
                <li><a href="<?php echo smarty_function_fixedUrl(array('url'=>"Home/User/editpwd"),$_smarty_tpl);?>
">修改密码</a></li>
                <li><a href="<?php echo smarty_function_fixedUrl(array('url'=>'Home/User/logout'),$_smarty_tpl);?>
">注销登录</a></li>
            </ul>
        </div>
    </li>
    <?php }else{ ?>
    <li id="userweibo">
    <a href="<?php echo smarty_function_fixedUrl(array('url'=>"Home/User/login"),$_smarty_tpl);?>
">登陆</a><a href="<?php echo smarty_function_fixedUrl(array('url'=>"Home/User/reg"),$_smarty_tpl);?>
">注册</a>
    </li>
    <?php }?>
</ul>

            </div>
        </div>
         
        
    </div>
<div class="clear"></div><?php }} ?>
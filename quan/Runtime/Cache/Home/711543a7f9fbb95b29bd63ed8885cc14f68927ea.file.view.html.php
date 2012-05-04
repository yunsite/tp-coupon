<?php /* Smarty version Smarty-3.1.6, created on 2012-05-04 14:13:11
         compiled from "D:\APMServ5.2.6\www\htdocs\quan\Tpl\Home\default\Mall\view.html" */ ?>
<?php /*%%SmartyHeaderCode:243864fa37377c5b203-84291833%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '711543a7f9fbb95b29bd63ed8885cc14f68927ea' => 
    array (
      0 => 'D:\\APMServ5.2.6\\www\\htdocs\\quan\\Tpl\\Home\\default\\Mall\\view.html',
      1 => 1335967099,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '243864fa37377c5b203-84291833',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'mall' => 0,
    'codes' => 0,
    'item' => 0,
    'hot10' => 0,
    'mall_recs' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.6',
  'unifunc' => 'content_4fa373784defc',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_4fa373784defc')) {function content_4fa373784defc($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_fixed_uploadfile_url')) include 'D:\\APMServ5.2.6\\www\\htdocs\\quan\\ThinkPHP\\Extend\\Vendor\\Smarty\\plugins\\modifier.fixed_uploadfile_url.php';
if (!is_callable('smarty_function_fixedUrl')) include 'D:\\APMServ5.2.6\\www\\htdocs\\quan\\ThinkPHP\\Extend\\Vendor\\Smarty\\plugins\\function.fixedUrl.php';
?><?php echo $_smarty_tpl->getSubTemplate ((@GROUP_NAME)."/".(@THEME_NAME)."/Public/header.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<?php echo $_smarty_tpl->getSubTemplate ((@GROUP_NAME)."/".(@THEME_NAME)."/Public/nav.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<div class="w990 clear">
        <div class="clear" style="margin: 8px 0">
        </div>
        <div id="main" style="padding-top: 0;">
            <div class="main_l">
                <h3><?php echo $_smarty_tpl->tpl_vars['mall']->value['name'];?>
优惠券</h3>
                <div id="p_top">
                    <div id="p_top_left">
                            <img style="max-width: 260px;" src="<?php echo smarty_modifier_fixed_uploadfile_url($_smarty_tpl->tpl_vars['mall']->value['figure_image']);?>
"></div>
                    <div id="p_top_right">
                        <li><span class="pred">网站名称：</span><?php echo $_smarty_tpl->tpl_vars['mall']->value['name'];?>
</li>
                        <li><span class="pred">网站地址：</span><a rel="nofollow" href="<?php echo smarty_function_fixedUrl(array('url'=>"Mall/out?id=".($_smarty_tpl->tpl_vars['mall']->value['id'])),$_smarty_tpl);?>
" target="_blank"><?php echo $_smarty_tpl->tpl_vars['mall']->value['website'];?>
</a></li>
                        
                        <li><span class="pred">客服电话：</span><?php echo $_smarty_tpl->tpl_vars['mall']->value['tel'];?>
</li>
                        
                        <li style="border: 0px"><span class="pred">网站简介：</span><?php echo $_smarty_tpl->tpl_vars['mall']->value['description'];?>
</li>
                    </div>
                </div>
                <div class="dash_line">
                </div>
                <div class="main_l_i">
                    <div class="main_l_c_c">
                        <ul class="coupons-list" id="J_CouponsList">
<?php  $_smarty_tpl->tpl_vars['item'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['item']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['codes']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['item']->key => $_smarty_tpl->tpl_vars['item']->value){
$_smarty_tpl->tpl_vars['item']->_loop = true;
?>
<li>
    <div class="coupon-wrapper">
        <div class="scissors">
        </div>
        <h2>
            <a title="<?php if ($_smarty_tpl->tpl_vars['item']->value['title']){?><?php echo $_smarty_tpl->tpl_vars['item']->value['title'];?>
<?php }else{ ?><?php echo $_smarty_tpl->tpl_vars['item']->value['m_name'];?>
<?php }?><?php if ($_smarty_tpl->tpl_vars['item']->value['c_type']==1){?>满<?php echo $_smarty_tpl->tpl_vars['item']->value['money_max'];?>
减<?php echo $_smarty_tpl->tpl_vars['item']->value['money_reduce'];?>
元优惠码<?php }else{ ?><?php echo $_smarty_tpl->tpl_vars['item']->value['money_amount'];?>
代金券<?php }?>" href="<?php echo smarty_function_fixedUrl(array('url'=>"Code/view?id=".($_smarty_tpl->tpl_vars['item']->value['c_id'])),$_smarty_tpl);?>
" target="_blank"><?php if ($_smarty_tpl->tpl_vars['item']->value['title']){?><?php echo $_smarty_tpl->tpl_vars['item']->value['title'];?>
<?php }else{ ?><?php echo $_smarty_tpl->tpl_vars['item']->value['m_name'];?>
<?php }?><?php if ($_smarty_tpl->tpl_vars['item']->value['c_type']==1){?>满<?php echo $_smarty_tpl->tpl_vars['item']->value['money_max'];?>
减<?php echo $_smarty_tpl->tpl_vars['item']->value['money_reduce'];?>
元优惠码<?php }else{ ?><?php echo $_smarty_tpl->tpl_vars['item']->value['money_amount'];?>
代金券<?php }?></a>
            
            <!--<i class="hot">hot</i>-->
            
        </h2>
        <a title="<?php if ($_smarty_tpl->tpl_vars['item']->value['title']){?><?php echo $_smarty_tpl->tpl_vars['item']->value['title'];?>
<?php }else{ ?><?php echo $_smarty_tpl->tpl_vars['item']->value['m_name'];?>
<?php }?><?php if ($_smarty_tpl->tpl_vars['item']->value['c_type']==1){?>满<?php echo $_smarty_tpl->tpl_vars['item']->value['money_max'];?>
减<?php echo $_smarty_tpl->tpl_vars['item']->value['money_reduce'];?>
元优惠码<?php }else{ ?><?php echo $_smarty_tpl->tpl_vars['item']->value['money_amount'];?>
代金券<?php }?>" href="<?php echo smarty_function_fixedUrl(array('url'=>"Code/view?id=".($_smarty_tpl->tpl_vars['item']->value['c_id'])),$_smarty_tpl);?>
" class="coupon" target="_blank">
            <span class="left"><span class="description"><?php if ($_smarty_tpl->tpl_vars['item']->value['c_type']==1){?>满<em><?php echo $_smarty_tpl->tpl_vars['item']->value['money_max'];?>
</em>减<em><?php echo $_smarty_tpl->tpl_vars['item']->value['money_reduce'];?>
</em><?php }else{ ?><em><?php echo $_smarty_tpl->tpl_vars['item']->value['money_amount'];?>
</em>代金券<?php }?>
            </span><span class="store-logo">
                <img src="<?php echo smarty_modifier_fixed_uploadfile_url($_smarty_tpl->tpl_vars['mall']->value['logo']);?>
" style="display: block;"></span> </span>
            <span class="right">
                
                <em class="free"><?php if ($_smarty_tpl->tpl_vars['item']->value['price_type']==1){?>免费<?php }elseif($_smarty_tpl->tpl_vars['item']->value['price_type']==2){?><?php echo $_smarty_tpl->tpl_vars['item']->value['price'];?>
元<?php }elseif($_smarty_tpl->tpl_vars['item']->value['price_type']==3){?><?php echo $_smarty_tpl->tpl_vars['item']->value['price'];?>
积分<?php }?></em>
                
                <span class="get"><b></b>立即领取</span>
                
            </span></a>
        
        <div class="info">
            
            <span><?php if ($_smarty_tpl->tpl_vars['item']->value['expiry_type']==1){?><?php if ($_smarty_tpl->tpl_vars['item']->value['expiry']==0){?>已结束<?php }else{ ?>还剩 <i><?php echo $_smarty_tpl->tpl_vars['item']->value['expiry'];?>
</i> 天<?php }?><?php }else{ ?>长期有效<?php }?></span><span>已领:<i><?php echo $_smarty_tpl->tpl_vars['item']->value['fetched_amount'];?>
</i></span><span>剩余:<i><?php echo $_smarty_tpl->tpl_vars['item']->value['amount']-$_smarty_tpl->tpl_vars['item']->value['fetched_amount'];?>
</i></span>
            
            <span><a class="store-from" href="<?php echo smarty_function_fixedUrl(array('url'=>"Mall/view?id=".($_smarty_tpl->tpl_vars['item']->value['m_id'])),$_smarty_tpl);?>
"><?php echo $_smarty_tpl->tpl_vars['item']->value['m_name'];?>
优惠券</a></span>
        </div>
        
    </div>
</li>
<?php } ?>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="main_r" style="width: 320px;">
                <ul class="sidebar">
                    <li class="blue">
                        <h3>
                            商家信息</h3>
                        <div class="sidebar_s clear">
                            <div class="sidebar_s_l">
                                <a href="<?php echo smarty_function_fixedUrl(array('url'=>"Mall/view?id=".($_smarty_tpl->tpl_vars['mall']->value['id'])),$_smarty_tpl);?>
">
                                    <img src="<?php echo smarty_modifier_fixed_uploadfile_url($_smarty_tpl->tpl_vars['mall']->value['logo']);?>
" alt="<?php echo $_smarty_tpl->tpl_vars['mall']->value['name'];?>
"></a>
                                <div class="gobuy">
                                    <a rel="nofollow" href="<?php echo smarty_function_fixedUrl(array('url'=>"Mall/out?id=".($_smarty_tpl->tpl_vars['mall']->value['id'])),$_smarty_tpl);?>
" target="_blank" class="btn counter"><span>去商家购物</span></a></div>
                            </div>
                            <div class="sidebar_s_i">
                                商家名称：<a rel="nofollow" href="<?php echo smarty_function_fixedUrl(array('url'=>"Mall/out?id=".($_smarty_tpl->tpl_vars['mall']->value['id'])),$_smarty_tpl);?>
"><?php echo $_smarty_tpl->tpl_vars['mall']->value['name'];?>
</a><br>
                            </div>
                        </div>
                    </li>
                    <li class="yellow">
                        <h3>
                            领取最多的优惠券列表</h3>
                        <ol class="rank_coupon">
                            <?php  $_smarty_tpl->tpl_vars['item'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['item']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['hot10']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['item']->key => $_smarty_tpl->tpl_vars['item']->value){
$_smarty_tpl->tpl_vars['item']->_loop = true;
?>
                            <li><a title="<?php if ($_smarty_tpl->tpl_vars['item']->value['title']){?><?php echo $_smarty_tpl->tpl_vars['item']->value['title'];?>
<?php }else{ ?><?php echo $_smarty_tpl->tpl_vars['item']->value['m_name'];?>
<?php }?><?php if ($_smarty_tpl->tpl_vars['item']->value['c_type']==1){?>满<?php echo $_smarty_tpl->tpl_vars['item']->value['money_max'];?>
减<?php echo $_smarty_tpl->tpl_vars['item']->value['money_reduce'];?>
元优惠码<?php }else{ ?><?php echo $_smarty_tpl->tpl_vars['item']->value['money_amount'];?>
代金券<?php }?>" href="<?php echo smarty_function_fixedUrl(array('url'=>"Code/view?id=".($_smarty_tpl->tpl_vars['item']->value['c_id'])),$_smarty_tpl);?>
"><?php if ($_smarty_tpl->tpl_vars['item']->value['title']){?><?php echo $_smarty_tpl->tpl_vars['item']->value['title'];?>
<?php }else{ ?><?php echo $_smarty_tpl->tpl_vars['item']->value['m_name'];?>
<?php }?><?php if ($_smarty_tpl->tpl_vars['item']->value['c_type']==1){?>满<?php echo $_smarty_tpl->tpl_vars['item']->value['money_max'];?>
减<?php echo $_smarty_tpl->tpl_vars['item']->value['money_reduce'];?>
元优惠码<?php }else{ ?><?php echo $_smarty_tpl->tpl_vars['item']->value['money_amount'];?>
代金券<?php }?></a></li>
                            <?php } ?>
                        </ol>
                    </li>
                    <li class="yellow_b">
                        <h3>
                            推荐商城</h3>
                        <ul class="twocol img">
                            <?php  $_smarty_tpl->tpl_vars['item'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['item']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['mall_recs']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['item']->key => $_smarty_tpl->tpl_vars['item']->value){
$_smarty_tpl->tpl_vars['item']->_loop = true;
?>
                            <li><a title="<?php echo $_smarty_tpl->tpl_vars['item']->value['name'];?>
优惠券" href="<?php echo smarty_function_fixedUrl(array('url'=>"Mall/view?id=".($_smarty_tpl->tpl_vars['item']->value['c_id'])),$_smarty_tpl);?>
">
                                <img width="90" src="<?php echo smarty_modifier_fixed_uploadfile_url($_smarty_tpl->tpl_vars['item']->value['logo']);?>
"><br>
                                <?php echo $_smarty_tpl->tpl_vars['item']->value['name'];?>
优惠券</a></li>
                            <?php } ?>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </div>
<?php echo $_smarty_tpl->getSubTemplate ((@GROUP_NAME)."/".(@THEME_NAME)."/Public/footer.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>
<?php }} ?>
<?php /* Smarty version Smarty-3.1.6, created on 2012-05-04 14:03:26
         compiled from "D:\APMServ5.2.6\www\htdocs\quan\Tpl\Home\default\Code\lastestpulled.html" */ ?>
<?php /*%%SmartyHeaderCode:76064fa3712ee298b3-23794147%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '480c1636370260cbab60d2c5f3085bbda6d30cd0' => 
    array (
      0 => 'D:\\APMServ5.2.6\\www\\htdocs\\quan\\Tpl\\Home\\default\\Code\\lastestpulled.html',
      1 => 1335799322,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '76064fa3712ee298b3-23794147',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'codes' => 0,
    'item' => 0,
    'pagelink' => 0,
    'hot10' => 0,
    'latest10' => 0,
    'mall_hot20' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.6',
  'unifunc' => 'content_4fa3712f8288b',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_4fa3712f8288b')) {function content_4fa3712f8288b($_smarty_tpl) {?><?php if (!is_callable('smarty_function_fixedUrl')) include 'D:\\APMServ5.2.6\\www\\htdocs\\quan\\ThinkPHP\\Extend\\Vendor\\Smarty\\plugins\\function.fixedUrl.php';
if (!is_callable('smarty_modifier_fixed_uploadfile_url')) include 'D:\\APMServ5.2.6\\www\\htdocs\\quan\\ThinkPHP\\Extend\\Vendor\\Smarty\\plugins\\modifier.fixed_uploadfile_url.php';
?><?php echo $_smarty_tpl->getSubTemplate ((@GROUP_NAME)."/".(@THEME_NAME)."/Public/header.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<?php echo $_smarty_tpl->getSubTemplate ((@GROUP_NAME)."/".(@THEME_NAME)."/Public/nav.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<div class="w990 clear">
        <div id="main">
            <div class="main_l">
                <div id="main_l_l" class="clear">
                    <h2>最近被领取的优惠券</h2>
                    <ul class="coupons-list" id="J_CouponsList" style="margin-left: 5px;">
<?php  $_smarty_tpl->tpl_vars['item'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['item']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['codes']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['item']->key => $_smarty_tpl->tpl_vars['item']->value){
$_smarty_tpl->tpl_vars['item']->_loop = true;
?>          
<li>
    <div class="coupon-wrapper">
        <div class="scissors">
        </div>
        <h2><a href="<?php echo smarty_function_fixedUrl(array('url'=>"Code/view?id=".($_smarty_tpl->tpl_vars['item']->value['c_id'])),$_smarty_tpl);?>
" title="<?php if ($_smarty_tpl->tpl_vars['item']->value['title']){?><?php echo $_smarty_tpl->tpl_vars['item']->value['title'];?>
<?php }else{ ?><?php echo $_smarty_tpl->tpl_vars['item']->value['m_name'];?>
<?php }?><?php if ($_smarty_tpl->tpl_vars['item']->value['c_type']==1){?>满<?php echo $_smarty_tpl->tpl_vars['item']->value['money_max'];?>
减<?php echo $_smarty_tpl->tpl_vars['item']->value['money_reduce'];?>
元优惠码<?php }else{ ?><?php echo $_smarty_tpl->tpl_vars['item']->value['money_amount'];?>
代金券<?php }?>" target="_blank"><?php if ($_smarty_tpl->tpl_vars['item']->value['title']){?><?php echo $_smarty_tpl->tpl_vars['item']->value['title'];?>
<?php }else{ ?><?php echo $_smarty_tpl->tpl_vars['item']->value['m_name'];?>
<?php }?><?php if ($_smarty_tpl->tpl_vars['item']->value['c_type']==1){?>满<?php echo $_smarty_tpl->tpl_vars['item']->value['money_max'];?>
减<?php echo $_smarty_tpl->tpl_vars['item']->value['money_reduce'];?>
元优惠券<?php }else{ ?><?php echo $_smarty_tpl->tpl_vars['item']->value['money_amount'];?>
代金券<?php }?></a><!--<i class="hot">hot</i>--></h2>
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
</em>代金券<?php }?></span><span class="store-logo">
                <img src="<?php echo smarty_modifier_fixed_uploadfile_url($_smarty_tpl->tpl_vars['item']->value['logo']);?>
" style="display: block;"></span> </span>
            <span class="right">
                
                <em class="free"><?php if ($_smarty_tpl->tpl_vars['item']->value['price_type']==1){?>免费<?php }elseif($_smarty_tpl->tpl_vars['item']->value['price_type']==2){?><?php echo $_smarty_tpl->tpl_vars['item']->value['price'];?>
元<?php }elseif($_smarty_tpl->tpl_vars['item']->value['price_type']==3){?><?php echo $_smarty_tpl->tpl_vars['item']->value['price'];?>
积分<?php }?></em>
                
                <span class="<?php if ($_smarty_tpl->tpl_vars['item']->value['amount']-$_smarty_tpl->tpl_vars['item']->value['fetched_amount']>0){?><?php if ($_smarty_tpl->tpl_vars['item']->value['expiry_type']==1&&$_smarty_tpl->tpl_vars['item']->value['expiry']>0){?><?php if ($_smarty_tpl->tpl_vars['item']->value['price_type']==1){?>get<?php }else{ ?>sale<?php }?><?php }else{ ?>expire<?php }?><?php }else{ ?>pulled<?php }?>"><b></b>立即领取</span>
                
            </span></a>
        
        <div class="info">
            
            <span><?php if ($_smarty_tpl->tpl_vars['item']->value['expiry_type']==1){?><?php if ($_smarty_tpl->tpl_vars['item']->value['expiry']==0){?>已结束<?php }else{ ?>还剩 <i><?php echo $_smarty_tpl->tpl_vars['item']->value['expiry'];?>
</i> 天<?php }?><?php }else{ ?>长期有效<?php }?> </span><span>已领数量：<i><?php echo $_smarty_tpl->tpl_vars['item']->value['fetched_amount'];?>
</i></span><span>最近领取</span>
            
            <span><?php echo $_smarty_tpl->tpl_vars['item']->value['nick'];?>
</span>
        </div>
        
    </div>
</li>
<?php } ?>
</ul>
<ul class="pager"><?php echo $_smarty_tpl->tpl_vars['pagelink']->value;?>
</ul>
                </div>
            </div>
            <div class="main_r" style="width: 320px;">
                <ul class="sidebar">
                    <li class="gray">
                        <h3>
                            热门优惠券</h3>
                        <ul class="hot_coupon">
                            <?php  $_smarty_tpl->tpl_vars['item'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['item']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['hot10']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['item']->key => $_smarty_tpl->tpl_vars['item']->value){
$_smarty_tpl->tpl_vars['item']->_loop = true;
?>  
                            <li><a class="img_wrap" href="<?php echo smarty_function_fixedUrl(array('url'=>"Code/view?id=".($_smarty_tpl->tpl_vars['item']->value['c_id'])),$_smarty_tpl);?>
">
                                <img src="<?php echo smarty_modifier_fixed_uploadfile_url($_smarty_tpl->tpl_vars['item']->value['logo']);?>
"></a>
                                <div class="img_detail">
                                    <p class="name">
                                        <a title="<?php if ($_smarty_tpl->tpl_vars['item']->value['title']){?><?php echo $_smarty_tpl->tpl_vars['item']->value['title'];?>
<?php }else{ ?><?php echo $_smarty_tpl->tpl_vars['item']->value['m_name'];?>
<?php }?><?php if ($_smarty_tpl->tpl_vars['item']->value['c_type']==1){?>满<?php echo $_smarty_tpl->tpl_vars['item']->value['money_max'];?>
减<?php echo $_smarty_tpl->tpl_vars['item']->value['money_reduce'];?>
元优惠码<?php }else{ ?><?php echo $_smarty_tpl->tpl_vars['item']->value['money_amount'];?>
代金券<?php }?>" href="<?php echo smarty_function_fixedUrl(array('url'=>"Code/view?id=".($_smarty_tpl->tpl_vars['item']->value['c_id'])),$_smarty_tpl);?>
"><?php if ($_smarty_tpl->tpl_vars['item']->value['title']){?><?php echo $_smarty_tpl->tpl_vars['item']->value['title'];?>
<?php }else{ ?><?php echo $_smarty_tpl->tpl_vars['item']->value['m_name'];?>
<?php }?><?php if ($_smarty_tpl->tpl_vars['item']->value['c_type']==1){?>满<?php echo $_smarty_tpl->tpl_vars['item']->value['money_max'];?>
减<?php echo $_smarty_tpl->tpl_vars['item']->value['money_reduce'];?>
元优惠券<?php }else{ ?><?php echo $_smarty_tpl->tpl_vars['item']->value['money_amount'];?>
代金券<?php }?></a></p>
                                    <p class="btn_wrap">
                                        <a title="<?php if ($_smarty_tpl->tpl_vars['item']->value['title']){?><?php echo $_smarty_tpl->tpl_vars['item']->value['title'];?>
<?php }else{ ?><?php echo $_smarty_tpl->tpl_vars['item']->value['m_name'];?>
<?php }?><?php if ($_smarty_tpl->tpl_vars['item']->value['c_type']==1){?>满<?php echo $_smarty_tpl->tpl_vars['item']->value['money_max'];?>
减<?php echo $_smarty_tpl->tpl_vars['item']->value['money_reduce'];?>
元优惠码<?php }else{ ?><?php echo $_smarty_tpl->tpl_vars['item']->value['money_amount'];?>
代金券<?php }?>" class="btn" href="<?php echo smarty_function_fixedUrl(array('url'=>"Code/view?id=".($_smarty_tpl->tpl_vars['item']->value['c_id'])),$_smarty_tpl);?>
"><span>立即领取</span></a></p>
                                    <p class="score_now">
                                        已领：<?php echo $_smarty_tpl->tpl_vars['item']->value['fetched_amount'];?>
张</p>
                                    <p class="score_old">
                                        <?php if ($_smarty_tpl->tpl_vars['item']->value['c_type']==1){?>满<del><?php echo $_smarty_tpl->tpl_vars['item']->value['money_max'];?>
</del>减<del><?php echo $_smarty_tpl->tpl_vars['item']->value['money_reduce'];?>
</del><?php }else{ ?><del><?php echo $_smarty_tpl->tpl_vars['item']->value['money_amount'];?>
</del>代金券<?php }?>
                                    </p>
                                </div>
                            </li>
                            <?php } ?>
                        </ul>
                    </li>
                    <li class="yellow">
                        <h3>
                            最新发布优惠券</h3>
                        <ol class="rank_coupon">
                            
                            <?php  $_smarty_tpl->tpl_vars['item'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['item']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['latest10']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
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
元优惠券<?php }else{ ?><?php echo $_smarty_tpl->tpl_vars['item']->value['money_amount'];?>
代金券<?php }?></a></li>
                            <?php } ?>
                            
                        </ol>
                    </li>
                    <li class="green">
                        <h3>
                            热门搜索</h3>
                        <ul class="multicol">
                        	<?php  $_smarty_tpl->tpl_vars['item'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['item']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['mall_hot20']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['item']->key => $_smarty_tpl->tpl_vars['item']->value){
$_smarty_tpl->tpl_vars['item']->_loop = true;
?>
                            <li><a title="<?php echo $_smarty_tpl->tpl_vars['item']->value['name'];?>
优惠券" href="<?php echo smarty_function_fixedUrl(array('url'=>"Mall/view?id=".($_smarty_tpl->tpl_vars['item']->value['id'])),$_smarty_tpl);?>
"><?php echo $_smarty_tpl->tpl_vars['item']->value['name'];?>
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
<?php /* Smarty version Smarty-3.1.6, created on 2012-05-04 13:59:58
         compiled from "D:\APMServ5.2.6\www\htdocs\quan\Tpl\Home\default\Index\index.html" */ ?>
<?php /*%%SmartyHeaderCode:116694fa3705e301c37-56248397%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '6285df98c703c8885400c19912ff1534b54401bc' => 
    array (
      0 => 'D:\\APMServ5.2.6\\www\\htdocs\\quan\\Tpl\\Home\\default\\Index\\index.html',
      1 => 1335944149,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '116694fa3705e301c37-56248397',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'mall_recs' => 0,
    'item' => 0,
    'coupons4cate' => 0,
    'item1' => 0,
    'daybest10' => 0,
    'hot10' => 0,
    'fetched10' => 0,
    'cates' => 0,
    'latest10' => 0,
    '_CFG' => 0,
    'mall_hot20' => 0,
    'friendlinks' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.6',
  'unifunc' => 'content_4fa370601ea9c',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_4fa370601ea9c')) {function content_4fa370601ea9c($_smarty_tpl) {?><?php if (!is_callable('smarty_function_fixedUrl')) include 'D:\\APMServ5.2.6\\www\\htdocs\\quan\\ThinkPHP\\Extend\\Vendor\\Smarty\\plugins\\function.fixedUrl.php';
if (!is_callable('smarty_modifier_fixed_uploadfile_url')) include 'D:\\APMServ5.2.6\\www\\htdocs\\quan\\ThinkPHP\\Extend\\Vendor\\Smarty\\plugins\\modifier.fixed_uploadfile_url.php';
if (!is_callable('smarty_modifier_date_format')) include 'D:\\APMServ5.2.6\\www\\htdocs\\quan\\ThinkPHP\\Extend\\Vendor\\Smarty\\plugins\\modifier.date_format.php';
?><?php echo $_smarty_tpl->getSubTemplate ((@GROUP_NAME)."/".(@THEME_NAME)."/Public/header.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<?php echo $_smarty_tpl->getSubTemplate ((@GROUP_NAME)."/".(@THEME_NAME)."/Public/nav.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<div class="w990 clear">
        <div class="gray" id="indexshop">
            <ul>
                <?php  $_smarty_tpl->tpl_vars['item'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['item']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['mall_recs']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['item']->key => $_smarty_tpl->tpl_vars['item']->value){
$_smarty_tpl->tpl_vars['item']->_loop = true;
?>
                <li>
                    <div class="store-item">
                        <a href="<?php echo smarty_function_fixedUrl(array('url'=>"Mall/view?id=".($_smarty_tpl->tpl_vars['item']->value['c_id'])),$_smarty_tpl);?>
" title="<?php echo $_smarty_tpl->tpl_vars['item']->value['name'];?>
" class="store-logo" target="_blank">
                            <img width="80px" height="40px" alt="<?php echo $_smarty_tpl->tpl_vars['item']->value['name'];?>
" src="<?php echo smarty_modifier_fixed_uploadfile_url($_smarty_tpl->tpl_vars['item']->value['logo']);?>
" style="display: block;">
                        </a><a href="<?php echo smarty_function_fixedUrl(array('url'=>"Mall/view?id=".($_smarty_tpl->tpl_vars['item']->value['c_id'])),$_smarty_tpl);?>
" title="<?php echo $_smarty_tpl->tpl_vars['item']->value['name'];?>
" class="store-name" target="_blank"><?php echo $_smarty_tpl->tpl_vars['item']->value['name'];?>
</a>
                    </div>
                </li>
                <?php } ?>
            </ul>
        </div>
        <div href="javascript:;" class="" id="moreshop">
            <b class="arrow"></b><span class="more-text"><a href="<?php echo smarty_function_fixedUrl(array('url'=>"Mall/lists"),$_smarty_tpl);?>
">更多商家</a></span> <span class="less-text">收起</span>
        </div>
        <div style="padding-top: 0;" id="main">
            <div class="main_l">
            <!-- Baidu Button BEGIN -->
    <div id="bdshare" class="bdshare_t bds_tools_32 get-codes-bdshare">
		<a class="bds_qzone" title="分享到QQ空间"></a>
        <a class="bds_tsina" title="分享到新浪微博"></a>
        <a class="bds_renren" title="分享到人人网"></a>
        <a class="bds_kaixin001" title="分享到开心网"></a>
        <a class="bds_tqf" title="分享到腾讯朋友"></a>
        <a class="bds_douban" title="分享到豆瓣网"></a>
        <a class="bds_taobao" title="分享到淘宝"></a>
        <a class="bds_ty" title="分享到天涯社区"></a>
        <a class="bds_baidu" title="分享到百度搜藏"></a>
        <span class="bds_more">更多</span>
		<a class="shareCount"></a>                
    </div>
<!-- Baidu Button END -->
<br />
<span>&nbsp;</span>
<div class="clear">&nbsp;</div>
                <div class="main_l_i">
                    <div class="main_l_c_c">
                    <?php  $_smarty_tpl->tpl_vars['item1'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['item1']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['coupons4cate']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
 $_smarty_tpl->tpl_vars['item1']->index=-1;
foreach ($_from as $_smarty_tpl->tpl_vars['item1']->key => $_smarty_tpl->tpl_vars['item1']->value){
$_smarty_tpl->tpl_vars['item1']->_loop = true;
 $_smarty_tpl->tpl_vars['item1']->index++;
 $_smarty_tpl->tpl_vars['item1']->first = $_smarty_tpl->tpl_vars['item1']->index === 0;
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']['coupons4cate']['first'] = $_smarty_tpl->tpl_vars['item1']->first;
?>
                    <h1 <?php if (!$_smarty_tpl->getVariable('smarty')->value['foreach']['coupons4cate']['first']){?>class="mt10"<?php }?>><?php echo $_smarty_tpl->tpl_vars['item1']->value['cate']['name'];?>
</h1>
                    <ul class="coupons-list">
                    <?php  $_smarty_tpl->tpl_vars['item'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['item']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['item1']->value['coupons']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
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
<?php } ?>
</div>
</div>
</div>
            <div style="width: 320px;" class="main_r">
                <ul class="sidebar">
                    
                    <li class="gray">
                        <h3>
                            每日精选促销(<?php echo smarty_modifier_date_format(time(),"%m-%d");?>
)</h3>
                        <ul class="hot_coupon">
                            <?php  $_smarty_tpl->tpl_vars['item'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['item']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['daybest10']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['item']->key => $_smarty_tpl->tpl_vars['item']->value){
$_smarty_tpl->tpl_vars['item']->_loop = true;
?>
                            <li><a target="_blank" title="<?php if ($_smarty_tpl->tpl_vars['item']->value['title']){?><?php echo $_smarty_tpl->tpl_vars['item']->value['title'];?>
<?php }else{ ?><?php echo $_smarty_tpl->tpl_vars['item']->value['m_name'];?>
<?php }?><?php if ($_smarty_tpl->tpl_vars['item']->value['c_type']==1){?>满<?php echo $_smarty_tpl->tpl_vars['item']->value['money_max'];?>
减<?php echo $_smarty_tpl->tpl_vars['item']->value['money_reduce'];?>
元优惠码<?php }else{ ?><?php echo $_smarty_tpl->tpl_vars['item']->value['money_amount'];?>
代金券<?php }?>" class="img_wrap" href="<?php echo smarty_function_fixedUrl(array('url'=>"Code/view?id=".($_smarty_tpl->tpl_vars['item']->value['c_id'])),$_smarty_tpl);?>
">
                                <img alt="<?php if ($_smarty_tpl->tpl_vars['item']->value['title']){?><?php echo $_smarty_tpl->tpl_vars['item']->value['title'];?>
<?php }else{ ?><?php echo $_smarty_tpl->tpl_vars['item']->value['m_name'];?>
<?php }?><?php if ($_smarty_tpl->tpl_vars['item']->value['c_type']==1){?>满<?php echo $_smarty_tpl->tpl_vars['item']->value['money_max'];?>
减<?php echo $_smarty_tpl->tpl_vars['item']->value['money_reduce'];?>
元优惠码<?php }else{ ?><?php echo $_smarty_tpl->tpl_vars['item']->value['money_amount'];?>
代金券<?php }?>" src="<?php echo smarty_modifier_fixed_uploadfile_url($_smarty_tpl->tpl_vars['item']->value['logo']);?>
" align="absmiddle"></a>
                                <div class="img_detail">
                                    <p class="name">
                                        <a target="_blank" title="<?php if ($_smarty_tpl->tpl_vars['item']->value['title']){?><?php echo $_smarty_tpl->tpl_vars['item']->value['title'];?>
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
代金券<?php }?></a> </p>
                                    <p class="btn_wrap">
                                        <a target="_blank" title="<?php if ($_smarty_tpl->tpl_vars['item']->value['title']){?><?php echo $_smarty_tpl->tpl_vars['item']->value['title'];?>
<?php }else{ ?><?php echo $_smarty_tpl->tpl_vars['item']->value['m_name'];?>
<?php }?><?php if ($_smarty_tpl->tpl_vars['item']->value['c_type']==1){?>满<?php echo $_smarty_tpl->tpl_vars['item']->value['money_max'];?>
减<?php echo $_smarty_tpl->tpl_vars['item']->value['money_reduce'];?>
元优惠码<?php }else{ ?><?php echo $_smarty_tpl->tpl_vars['item']->value['money_amount'];?>
代金券<?php }?>" class="btn" href="<?php echo smarty_function_fixedUrl(array('url'=>"Code/view?id=".($_smarty_tpl->tpl_vars['item']->value['c_id'])),$_smarty_tpl);?>
"><span>去看看</span></a></p>
                                        
                                       <p class="score_old flwindex_tuijian">
                                    </p>
                                    
                                </div>
                            </li>
                            <?php } ?>
                         </ul>
                    </li>
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
                    <li class="gray">
                        <h3>
                            大家都在领什么券</h3>
                        <ul class="hot_coupon">
                        	<?php  $_smarty_tpl->tpl_vars['item'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['item']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['fetched10']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
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
                                    <p>
                                        已领数量：<?php echo $_smarty_tpl->tpl_vars['item']->value['fetched_amount'];?>
张</p>
                                    <p>
                                        领取时间：<?php echo $_smarty_tpl->tpl_vars['item']->value['fetch_time'];?>
</p>
                                    <p>
                                        领取用户：
                                        <?php echo $_smarty_tpl->tpl_vars['item']->value['nick'];?>

                                    </p>
                                </div>
                            </li>
                            <?php } ?>
                        </ul>
                    </li>
                    <li class="general">
                        <h3>
                            优惠券分类列表</h3>
                        <ul class="twocol">
                            
                            <li><a href="<?php echo smarty_function_fixedUrl(array('url'=>"Code/latest?cate_id=0&t_type=0&cate_id2=0&p=1"),$_smarty_tpl);?>
" target="_blank" title="全部优惠券">
                                全部</a></li>
                            <?php  $_smarty_tpl->tpl_vars['item'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['item']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['cates']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['item']->key => $_smarty_tpl->tpl_vars['item']->value){
$_smarty_tpl->tpl_vars['item']->_loop = true;
?>
                            <?php if ($_smarty_tpl->tpl_vars['item']->value['level']==0){?>
                            <li><a href="<?php echo smarty_function_fixedUrl(array('url'=>"Code/latest?cate_id=".($_smarty_tpl->tpl_vars['item']->value['id'])."&t_type=0&cate_id2=0&p=1"),$_smarty_tpl);?>
" target="_blank" title="<?php echo $_smarty_tpl->tpl_vars['item']->value['name'];?>
优惠券">
                                <?php echo $_smarty_tpl->tpl_vars['item']->value['name'];?>
</a></li>
                             <?php }?>
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
                    <!--
                    <li class="gray_b">
                        <h3>
                            最新加入<?php echo $_smarty_tpl->tpl_vars['_CFG']->value['site_name'];?>
的会员</h3>
                        <ul class="user">
                            <li><a title="Elaine粉红色小苦逼" href="http://www.quanmama.com/u/1935967727@weibo.com.html" target="_blank">
                                <img src="http://tp4.sinaimg.cn/1935967727/50/5624282828/0" alt="Elaine粉红色小苦逼">Elaine粉红色小苦逼</a></li>
                            <li><a title="一淘仲由" href="http://www.quanmama.com/u/1081719795@weibo.com.html" target="_blank">
                                <img src="http://tp4.sinaimg.cn/1081719795/50/5597314250/1" alt="一淘仲由">一淘仲由</a></li>
                        </ul>
                    </li>
                    
                    <li>
                        <div class="clear">
                        </div>
                        <div class="hot_you rightTit">
                            <a rel="nofollow" href="http://www.57zhe.com/?source=quanmama" target="_blank">
                                <img width="300px" src="/images/57zhe.jpg"></a>
                        </div>
                    </li>
                    -->
                    
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
                    <li class="gray">
                        <h3>友情链接</h3>
                        <ul class="threecol">
                            <?php  $_smarty_tpl->tpl_vars['item'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['item']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['friendlinks']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['item']->key => $_smarty_tpl->tpl_vars['item']->value){
$_smarty_tpl->tpl_vars['item']->_loop = true;
?>
                            <?php if ($_smarty_tpl->tpl_vars['item']->value['link_type']==1){?>
                            <li><a href="<?php echo $_smarty_tpl->tpl_vars['item']->value['link_url'];?>
" target="_blank"><?php if ($_smarty_tpl->tpl_vars['item']->value['link_code']){?><?php echo $_smarty_tpl->tpl_vars['item']->value['link_code'];?>
<?php }else{ ?><?php echo $_smarty_tpl->tpl_vars['item']->value['site_name'];?>
<?php }?></a></li>
                            <?php }?>
                            <?php } ?>
                            <div class="clear">
                            </div>
                        </ul>
                        <ul class="threecol">
                            <?php  $_smarty_tpl->tpl_vars['item'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['item']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['friendlinks']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['item']->key => $_smarty_tpl->tpl_vars['item']->value){
$_smarty_tpl->tpl_vars['item']->_loop = true;
?>
                            <?php if ($_smarty_tpl->tpl_vars['item']->value['link_type']==2){?>
                            <li><a href="<?php echo $_smarty_tpl->tpl_vars['item']->value['link_url'];?>
" target="_blank"><img src="<?php echo smarty_modifier_fixed_uploadfile_url($_smarty_tpl->tpl_vars['item']->value['link_code']);?>
" width="75" height="45" /></a></li>
                            <?php }?>
                            <?php } ?>
                            <div class="clear">
                            </div>
                        </ul>
                        <p style="padding-left:15px;">友情链接合作请联系 QQ:<?php echo $_smarty_tpl->tpl_vars['_CFG']->value['service_qq'];?>
</p>
                    </li>
                    
                </ul>
            </div>
        </div>
    </div>
<script type="text/javascript" id="bdshare_js" data="type=tools" ></script>
<script type="text/javascript" id="bdshell_js"></script>
<script type="text/javascript">
	document.getElementById("bdshell_js").src = "http://bdimg.share.baidu.com/static/js/shell_v2.js?cdnversion=" + new Date().getHours();
</script>
<?php echo $_smarty_tpl->getSubTemplate ((@GROUP_NAME)."/".(@THEME_NAME)."/Public/footer.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>
<?php }} ?>
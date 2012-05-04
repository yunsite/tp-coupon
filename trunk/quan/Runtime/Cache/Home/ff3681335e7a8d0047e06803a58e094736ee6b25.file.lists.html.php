<?php /* Smarty version Smarty-3.1.6, created on 2012-05-04 14:12:52
         compiled from "D:\APMServ5.2.6\www\htdocs\quan\Tpl\Home\default\Mall\lists.html" */ ?>
<?php /*%%SmartyHeaderCode:148304fa3736400b039-48489513%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'ff3681335e7a8d0047e06803a58e094736ee6b25' => 
    array (
      0 => 'D:\\APMServ5.2.6\\www\\htdocs\\quan\\Tpl\\Home\\default\\Mall\\lists.html',
      1 => 1335967147,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '148304fa3736400b039-48489513',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'malls4cate' => 0,
    'item1' => 0,
    'item' => 0,
    'daybest10' => 0,
    'hot10' => 0,
    'fetched10' => 0,
    'latest10' => 0,
    '_CFG' => 0,
    'mall_hot20' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.6',
  'unifunc' => 'content_4fa37364bd193',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_4fa37364bd193')) {function content_4fa37364bd193($_smarty_tpl) {?><?php if (!is_callable('smarty_function_fixedUrl')) include 'D:\\APMServ5.2.6\\www\\htdocs\\quan\\ThinkPHP\\Extend\\Vendor\\Smarty\\plugins\\function.fixedUrl.php';
if (!is_callable('smarty_modifier_fixed_uploadfile_url')) include 'D:\\APMServ5.2.6\\www\\htdocs\\quan\\ThinkPHP\\Extend\\Vendor\\Smarty\\plugins\\modifier.fixed_uploadfile_url.php';
if (!is_callable('smarty_modifier_date_format')) include 'D:\\APMServ5.2.6\\www\\htdocs\\quan\\ThinkPHP\\Extend\\Vendor\\Smarty\\plugins\\modifier.date_format.php';
?><?php echo $_smarty_tpl->getSubTemplate ((@GROUP_NAME)."/".(@THEME_NAME)."/Public/header.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<?php echo $_smarty_tpl->getSubTemplate ((@GROUP_NAME)."/".(@THEME_NAME)."/Public/nav.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<div class="w990 clear">
        <div style="padding-top: 0;" id="main" class="mt10">
            <div class="main_l">
                <div class="main_l_i">
                    <div class="main_l_c_c">
                    <?php  $_smarty_tpl->tpl_vars['item1'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['item1']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['malls4cate']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
 $_smarty_tpl->tpl_vars['item1']->index=-1;
foreach ($_from as $_smarty_tpl->tpl_vars['item1']->key => $_smarty_tpl->tpl_vars['item1']->value){
$_smarty_tpl->tpl_vars['item1']->_loop = true;
 $_smarty_tpl->tpl_vars['item1']->index++;
 $_smarty_tpl->tpl_vars['item1']->first = $_smarty_tpl->tpl_vars['item1']->index === 0;
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']['malls4cate']['first'] = $_smarty_tpl->tpl_vars['item1']->first;
?>
                    <h1 <?php if (!$_smarty_tpl->getVariable('smarty')->value['foreach']['malls4cate']['first']){?>class="mt10"<?php }?>><?php echo $_smarty_tpl->tpl_vars['item1']->value['cate']['name'];?>
</h1>
                    <ul class="mall-list">
                    <?php  $_smarty_tpl->tpl_vars['item'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['item']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['item1']->value['malls']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['item']->key => $_smarty_tpl->tpl_vars['item']->value){
$_smarty_tpl->tpl_vars['item']->_loop = true;
?>                      
					<li>
    				<a href="<?php echo smarty_function_fixedUrl(array('url'=>"Mall/view?id=".($_smarty_tpl->tpl_vars['item']->value['id'])),$_smarty_tpl);?>
" target="_blank"><img src="<?php echo smarty_modifier_fixed_uploadfile_url($_smarty_tpl->tpl_vars['item']->value['logo']);?>
" class="mlogo"></a>
                    <h2><a href="<?php echo smarty_function_fixedUrl(array('url'=>"Mall/view?id=".($_smarty_tpl->tpl_vars['item']->value['id'])),$_smarty_tpl);?>
" target="_blank"><?php echo $_smarty_tpl->tpl_vars['item']->value['name'];?>
优惠券</a></h2>
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
                </ul>
            </div>
        </div>
    </div>
<?php echo $_smarty_tpl->getSubTemplate ((@GROUP_NAME)."/".(@THEME_NAME)."/Public/footer.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>
<?php }} ?>
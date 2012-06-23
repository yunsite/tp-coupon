<?php
/**
 * TaoAction.class.php
 * @copyright			copyright(c) 2011 - 2012 极好居
 * @author				anqiu xiao
 * @contact				QQ:89249294 E-mail:jihaoju@qq.com
 * @date				Fri Jun 15 14:40:24 CST 2012
 */
class TaoAction extends HomeCommonAction
{
    /**
     * 默认操作
     * 
     */
    public function index()
    {
    	$page = isset($_REQUEST['p']) && $_REQUEST['p'] >= 1 ? $_REQUEST['p'] : 1;
		$pageLimit = 10;
    	$cid = isset($_REQUEST['cid']) && $_REQUEST['cid'] ? intval($_REQUEST['cid']) : 0;
    	$t_type = isset($_REQUEST['t_type']) ? intval($_REQUEST['t_type']) : 0;
    	//分类
    	$categorys = TaoShopCategoryService::getAll();
    	$this->assign('categorys', $categorys);
    	$this->assign('cid', $cid);
    	
    	$params = array('cid' => $cid, 't_type'=>$t_type);
		$limit = array('begin'=>($page-1)*$pageLimit, 'offset'=>$pageLimit);
		$shopModel = D('TaoShop');
		$keys = array();
		$res = $shopModel->front($keys, $params, $limit);
		$this->assign('shops', $res['data']);
		$page_url = reUrl(MODULE_NAME."/".ACTION_NAME."?cid=$cid&p=[page]");
		$page_url = str_replace('%5bpage%5d', '[page]', $page_url);
		$p=new Page($page,
		$pageLimit,
		$res['count'],
		$page_url,
		5,
		5);
		$pagelink=$p->showStyle(3);
		$this->assign('pagelink', $pagelink);
		
    	$this->assign('page_title', '淘宝优惠券 - ' . $this->_CFG['site_title']);
    	$this->assign('page_keywords', $this->_CFG['site_keywords']);
    	$this->assign('page_description', $this->_CFG['site_description']);
    	$this->display();
    }
}
<?php
/**
 * TaoCouponAction.class.php
 * @copyright			copyright(c) 2011 - 2012 极好居
 * @author				anqiu xiao
 * @contact				QQ:89249294 E-mail:jihaoju@qq.com
 * @date				Thu Jun 14 17:00:05 CST 2012
 */
class TaoCouponAction extends AdminCommonAction
{
	private $_is_active = null;
	public function index()
	{
		import('@.Com.taobao.Taobao');
		$taobaoObj = Taobao::getInstance();
		$acts = $taobaoObj->getActivity();
		print_r($acts);
		exit();
		
		$localTimeObj = LocalTime::getInstance();
		$page = isset($_REQUEST['page']) && $_REQUEST['page'] >= 1 ? $_REQUEST['page'] : 1;
    	$pageLimit = 15;
    	$ccmModel = D('TaoShop');
    	$params = array(
    					'cid'		=>	isset($_REQUEST['cid']) && $_REQUEST['cid'] ? intval($_REQUEST['cid']) : 0,
    					'kw'		=>	isset($_REQUEST['kw']) && $_REQUEST['kw'] ? $_REQUEST['kw'] : '',
    					'is_active' =>	$this->_is_active,
    					);
    	$keys = array();
    	$res = $ccmModel->getAll($keys, $params, array('begin'=>($page-1)*$pageLimit, 'offset'=>$pageLimit));
    	$shops = array();
    	foreach ($res['data'] as $rs){
    		$rs['updatetime'] = $rs['updatetime'] ? $localTimeObj->local_strtotime($rs['updatetime']) : '';
    		$shops[] = $rs;
    	}
    	$this->assign('shops', $shops);
    	$page_url = "?g=".GROUP_NAME."&m=".MODULE_NAME."&a=".ACTION_NAME."&page=[page]";
    	unset($params['is_active']);
    	foreach ($params as $key => $val){
    		$page_url .= "&$key=$val";
    	}
    	$p=new Page($page,
    			$pageLimit,
    			$res['count'],
    			$page_url,
    			5,
    			5);
    	$pagelink=$p->showStyle(3);
    	$this->assign('pagelink', $pagelink);
    	$category = array();
		$cccService = service('TaoShopCategory');
		$data = $cccService->getTree();
		foreach ($data as $rs){
			$category[$rs['id']] = $rs;
			$category[$rs['id']]['prefix'] = str_repeat("&nbsp;&nbsp;&nbsp;&nbsp;",$rs['level']);
		}
		$this->assign('category', $category);
		$this->assign('ur_href', '淘宝优惠券管理 &gt; 优惠券列表');
		$this->assign('_hash_', buildFormToken());
		$this->display();
	}
	
	public function edit()
	{
		$id = intval($_REQUEST['id']);
		$taoShopModel = D('TaoShop');
		$shop = $taoShopModel->info($id);
		$shop or die('id invalid.');
		if($this->isPost()){
			if(C('TOKEN_ON') && ! checkFormToken($_REQUEST)){
				die('hack attemp.');
			}
			if(! $_REQUEST['cid']){
				exit('data invalid.');
			}
			$data = array(
						'cid'		=>	intval($_REQUEST['cid']),
						'seo_title'	=>	$_REQUEST['seo_title'],
						'desc'		=>	$_REQUEST['desc'],
						'bulletin'	=>	$_REQUEST['bulletin'],
						'seo_keywords'	=>	$_REQUEST['seo_keywords'],
						'seo_desc'	=>	$_REQUEST['seo_desc'],
						);
			if($taoShopModel->update($id, $data)){
				$this->assign('jumpUrl', '?g='.GROUP_NAME.'&m='.MODULE_NAME);
				$this->success('编辑成功');
			}else{
				$this->error('编辑失败');
			}
		}
		$this->assign('shop', $shop);
		$category = array();
		$cccService = service('TaoShopCategory');
		$data = $cccService->getTree();
		foreach ($data as $rs){
			$category[$rs['id']] = $rs;
			$category[$rs['id']]['prefix'] = str_repeat("&nbsp;&nbsp;&nbsp;&nbsp;",$rs['level']);
		}
		$this->assign('category', $category);
		$this->assign('ur_href', '淘宝店铺管理 &gt; 店铺管理');
		$this->assign('_hash_', buildFormToken());
		$this->display('post');
	}
	
	/**
	 * 添加优惠券第一步
	 *
	 */
	public function add()
	{
		$s_id = $_REQUEST['s_id'] ? intval($_REQUEST['s_id']) : 0;
		$taoShopModel = D('TaoShop');
		$shop = $taoShopModel->info($s_id);
		$shop or die('id invalid.');
		
		$this->assign('ur_href', '淘宝优惠券管理 &gt; 添加优惠券 &gt; 第一步');
		$this->assign('_hash_', buildFormToken());
		$this->display();
	}
	
	/**
	 * 添加优惠券第二步
	 *
	 */
	public function add_step2()
	{
		$page = isset($_REQUEST['page']) && $_REQUEST['page'] >= 1 ? $_REQUEST['page'] : 1;
		$pageLimit = 40;
		$cid = $_REQUEST['cid'] ? intval($_REQUEST['cid']) : 0;
		$kw = $_REQUEST['kw'];
		if(! $cid && !$kw){
			exit('data invalid.');
		}
		import('@.Com.taobao.Taobao');
		$taobaoObj = Taobao::getInstance();
		$params = array(
					'cid'		=>	$cid,
					'kw'		=>	$kw,
					'page'		=>	$page
					);
		$res = $taobaoObj->getTaobaokeItems($params);
		$res['total'] = $res['total'] > 99*40 ? 99*40 : $res['total'];
		$items = $res['items'];
		$this->assign('items', $items);
		$page_url = "?g=".GROUP_NAME."&m=".MODULE_NAME."&a=".ACTION_NAME."&cid=$cid&kw=$kw&page=[page]";
		$p=new Page($page,
		$pageLimit,
		$res['total'],
		$page_url,
		5,
		5);
		$pagelink=$p->showStyle(3);
		$this->assign('pagelink', $pagelink);
		$this->assign('ur_href', '淘宝优惠券管理 &gt; 添加优惠券 &gt; 第二步');
		$this->assign('_hash_', buildFormToken());
		$this->display();
	}
}
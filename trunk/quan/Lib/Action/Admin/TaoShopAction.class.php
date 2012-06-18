<?php
/**
 * TaoShopAction.class.php
 * @copyright			copyright(c) 2011 - 2012 极好居
 * @author				anqiu xiao
 * @contact				QQ:89249294 E-mail:jihaoju@qq.com
 * @date				Thu Jun 14 17:00:05 CST 2012
 */
class TaoShopAction extends AdminCommonAction
{
	private $_is_active = null;
	public function index()
	{
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
		$this->assign('ur_href', '淘宝店铺管理 &gt; 店铺列表');
		$this->assign('_hash_', buildFormToken());
		$this->display();
	}
	
	public function select()
	{
		$this->_is_active = 1;
		$this->index();
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
	 * 添加店铺第一步
	 *
	 */
	public function add()
	{
		$parent_id = $_REQUEST['parent_id'] ? intval($_REQUEST['parent_id']) : 0;
		import('@.Com.taobao.Taobao');
		$taobaoObj = Taobao::getInstance();
		$item_cates = $taobaoObj->getItemCates($parent_id);
		$this->assign('item_cates', $item_cates);
		$this->assign('ur_href', '淘宝店铺管理 &gt; 添加店铺 &gt; 第一步');
		$this->assign('_hash_', buildFormToken());
		$this->display();
	}
	
	/**
	 * 添加店铺第二步
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
		$this->assign('ur_href', '淘宝店铺管理 &gt; 添加店铺 &gt; 第二步');
		$this->assign('_hash_', buildFormToken());
		$this->display();
	}
	
	public function add_step3()
	{
		if($this->isAjax()){
			if(C('TOKEN_ON') && ! checkFormToken($_REQUEST)){
				die('hack attemp.');
			}
			if(! $_REQUEST['nick']){
				exit();
			}
			$nick = $_REQUEST['nick'];
			if(M('tao_shop')->field('id')->where("nick='$nick'")->find()){
				$this->ajaxReturn('', buildFormToken(), 1);
			}else{
				import('@.Com.taobao.Taobao');
				$taobaoObj = Taobao::getInstance();
				$data = $taobaoObj->createShopByNick($nick);
				if(empty($data)){
					$this->ajaxReturn('', buildFormToken(), 0);
				}
				$taoshopModel = D('TaoShop');
				$data['is_active'] = 1;
				if($taoshopModel->_add($data)){
					$this->ajaxReturn('', buildFormToken(), 1);
				}else{
					$this->ajaxReturn('', buildFormToken(), 0);
				}
			}
		}
	}
	
	/**
	 * 激活
	 *
	 */
	public function active()
	{
		if($this->isAjax()){
			$id = intval($_REQUEST['id']);
			$ccmModel = D('TaoShop');
			$data = array('is_active' => 1);
			if($ccmModel->update($id, $data)){
				$this->ajaxReturn('', '', 1);
			}else{
				$this->ajaxReturn('', '激活失败', 0);
			}
		}
	}
	
	/**
	 * 屏蔽
	 *
	 */
	public function unactive()
	{
		if($this->isAjax()){
			$id = intval($_REQUEST['id']);
			$ccmModel = D('TaoShop');
			$data = array('is_active' => 0);
			if($ccmModel->update($id, $data)){
				//屏蔽旗下所有优惠券、删除推荐信息
				M("tao_coupon")->where("s_id='$id'")->save(array('is_active' => 0));
				M('tao_shop_rec')->where("s_id='$id'")->delete();
				//清除缓存
				$params = null;
				B('TaoShopRecs', $params);
				$this->ajaxReturn('', '', 1);
			}else{
				$this->ajaxReturn('', '屏蔽失败', 0);
			}
		}
	}
	
	public function rec_pos()
	{
		$rec_pos = M('tao_shop_rec_pos')->order('id DESC')->select();
		$this->assign('rec_pos', $rec_pos);
		$this->assign('ur_href', '淘宝店铺管理 &gt; 推荐位管理');
		$this->assign('_hash_', buildFormToken());
		$this->display();
	}
	
	public function add_rec_pos()
	{
		if($this->isAjax()){
			if(!$_REQUEST['name']){
				exit('data invalid.');
			}
			if(M('tao_shop_rec_pos')->add(array('name'=>$_REQUEST['name']))){
				$this->ajaxReturn('', '', 1);
			}else{
				$this->ajaxReturn('', '', 0);
			}
		}
	}
	
	public function del_rec_pos()
	{
		if($this->isAjax()){
			if(!$_REQUEST['id']){
				exit('data invalid.');
			}
			$id = intval($_REQUEST['id']);
			if(M('tao_shop_rec_pos')->where("id='$id'")->delete()){
				M('tao_shop_rec')->where("position='$id'")->delete();
				//清除缓存
				$params = null;
				B('TaoShopRecs', $params);
				$this->ajaxReturn('', '', 1);
			}else{
				$this->ajaxReturn('', '', 0);
			}
		}
	}
	
	/**
	 * 推荐
	 *
	 */
	public function rec()
	{
		$id = intval($_REQUEST['id']);
		$ccmModel = D('TaoShop');
		$shop = $ccmModel->info($id);
		if($shop['is_active'] == 0){
			$this->error('该商家已被屏蔽');
		}
		if($this->isPost()){
			$position = $_REQUEST['position'];
			if(M('tao_shop_rec')->where("s_id='$id' AND position='$position'")->find()){
				$this->assign('jumpUrl', '?g='.GROUP_NAME.'&m='.MODULE_NAME.'&a=rec_shops');
				$this->success('推荐成功');
			}
			$data = array(
						's_id'			=>	$id,
						'position'		=>	$position
						);
			if(M('tao_shop_rec')->data($data)->add()){
				//清除缓存
				$params = null;
				B('TaoShopRecs', $params);
				$this->assign('jumpUrl', '?g='.GROUP_NAME.'&m='.MODULE_NAME.'&a=rec_shops');
				$this->success('推荐成功');
			}else{
				$this->error('操作失败');
			}
		}
		$this->assign('shop', $shop);
		$mall_rec_position_conf = M('tao_shop_rec_pos')->order("id DESC")->select();
		$this->assign('mall_rec_position_conf', $mall_rec_position_conf);
		$this->assign('ur_href', '淘宝店铺管理 &gt; 推荐店铺');
		$this->display();
	}
	
	/**
	 * 取消推荐到首页
	 *
	 */
	public function unrec()
	{
		if($this->isAjax()){
			if(C('TOKEN_ON') && ! checkFormToken($_REQUEST)){
				die('hack attemp.');
			}
			if(empty($_REQUEST['id'])){
				$this->ajaxReturn('', '请选择店铺', 0);
			}
			$id = $_REQUEST['id'];
			if(M('tao_shop_rec')->where("id IN ($id)")->delete()){
				//清除缓存
				$params = null;
				B('TaoShopRecs', $params);
				$this->ajaxReturn('', buildFormToken(), 1);
			}else{
				$this->ajaxReturn('', '操作失败', 0);
			}
		}
	}
	
	/**
	 * 推荐店铺列表
	 *
	 */
	public function rec_shops()
	{
		$ccrsService = service('TaoShopRecs');
		$shops = array();
		$res = $ccrsService->getAll();
		foreach ($res as $rs){
			foreach ($rs as $r){
				$pos = M('tao_shop_rec_pos')->where("id='$r[position]'")->find();
				$r['position'] = $pos['name'];
				$shops[] = $r;
			}
		}
		$this->assign('shops', $shops);
		$this->assign('ur_href', '淘宝店铺管理 &gt; 推荐店铺列表');
		$this->assign('_hash_', buildFormToken());
		$this->display();
	}
}
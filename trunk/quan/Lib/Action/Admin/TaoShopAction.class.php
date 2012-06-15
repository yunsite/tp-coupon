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
	public function index()
	{
		
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
			$nick = $_REQUEST['nick'];
			if(M('tao_shop_category')->field('id')->where("id='$cid'")->find()){
				$this->ajaxReturn('', buildFormToken(), 1);
			}else{
				$data = array(
							'id'	=>	$cid,
							'name'	=>	$name
							);
				if(M('tao_shop_category')->add($data)){
					//清除缓存
					$params = null;
					B('TaoShopCategory', $params);
					$this->ajaxReturn('', buildFormToken(), 1);
				}else{
					$this->ajaxReturn('', buildFormToken(), 0);
				}
			}
		}
	}
}
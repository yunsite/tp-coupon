<?php
/**
 * TaoShopCategoryAction.class.php
 * @copyright			copyright(c) 2011 - 2012 极好居
 * @author				anqiu xiao
 * @contact				QQ:89249294 E-mail:jihaoju@qq.com
 * @date				Thu Jun 14 17:15:46 CST 2012
 */
class TaoShopCategoryAction extends AdminCommonAction
{
	public function index()
	{
		$category = array();
		$cccService = service('TaoShopCategory');
		$data = $cccService->getTree();
		foreach ($data as $rs){
			$category[$rs['id']] = $rs;
			$category[$rs['id']]['prefix'] = str_repeat("&nbsp;&nbsp;&nbsp;&nbsp;",$rs['level']);
		}
		$this->assign('category', $category);
		$this->assign('ur_href', '淘宝店铺分类管理 &gt; 分类列表');
		$this->assign('_hash_', buildFormToken());
		$this->display();
	}
	
	public function add()
	{
		if($this->isAjax()){
			if(C('TOKEN_ON') && ! checkFormToken($_REQUEST)){
				die('hack attemp.');
			}
			$cid = intval($_REQUEST['id']);
			$name = $_REQUEST['name'];
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
		import('@.Com.taobao.Taobao');
		$taobaoObj = Taobao::getInstance();
		$tao_shop_categorys = $taobaoObj->ShopCatesList();
		$this->assign('tao_shop_categorys', $tao_shop_categorys);
		$this->assign('ur_href', '淘宝店铺分类管理 &gt; 添加分类');
		$this->assign('_hash_', buildFormToken());
		$this->display();
	}
	
	public function del()
	{
		if($this->isAjax()){
			$id = intval($_REQUEST['id']);
			if(M('tao_shop_category')->where("id='$id'")->delete()){
				//清除缓存
				$params = null;
				B('TaoShopCategory', $params);
				$this->ajaxReturn('', '', 1);
			}else{
				$this->ajaxReturn('', '删除失败', 0);
			}
		}
	}
}
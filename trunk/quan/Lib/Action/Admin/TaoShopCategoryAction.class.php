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
					//TODO:清除缓存
					
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
}
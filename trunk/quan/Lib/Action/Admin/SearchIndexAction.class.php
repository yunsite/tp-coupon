<?php
/**
 * SearchIndexAction.class.php
 * @copyright			copyright(c) 2011 - 2012 极好居
 * @author				anqiu xiao
 * @contact				QQ:89249294 E-mail:jihaoju@qq.com
 * @date				Sat Apr 07 16:01:16 CST 2012
 */
class SearchIndexAction extends AdminCommonAction
{
	/**
	 * 更新商城全文索引
	 *
	 */
	public function updateCouponCodeMall()
	{
		if($this->isPost() && $this->isAjax()){
			if(C('TOKEN_ON') && ! checkFormToken($_POST)){
				die('hack attemp.');
			}
			set_time_limit(0);
			$mallModel = D('CouponCodeMall');
			$mallModel->_updateFullIndex();
			$this->ajaxReturn('', buildFormToken(), 1);
		}
		$this->assign('_hash_', buildFormToken());
		$this->assign('ur_href', '更新商城全文索引');
		$this->display();
	}
	
	/**
	 * 更新淘宝店铺全文索引
	 *
	 */
	public function updateTaoShop()
	{
		if($this->isPost() && $this->isAjax()){
			if(C('TOKEN_ON') && ! checkFormToken($_POST)){
				die('hack attemp.');
			}
			set_time_limit(0);
			$shopModel = D('TaoShop');
			$shopModel->_updateFullIndex();
			$this->ajaxReturn('', buildFormToken(), 1);
		}
		$this->assign('_hash_', buildFormToken());
		$this->assign('ur_href', '更新淘宝店铺全文索引');
		$this->display();
	}
}
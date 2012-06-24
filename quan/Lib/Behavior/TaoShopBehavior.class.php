<?php
/**
 * TaoShopBehavior.class.php
 * @copyright			copyright(c) 2011 - 2012 极好居
 * @author				anqiu xiao
 * @contact				QQ:89249294 E-mail:jihaoju@qq.com
 * @date				Sun Jun 24 15:00:57 CST 2012
 */
class TaoShopBehavior extends Behavior 
{
	public function run(&$params)
	{
		$ccmService = service('TaoShop');
		$ccmService->clearCache($params['id']);
		if(isset($params['seller_id'])){
			$ccmService->clearItemsCache($params['seller_id']);
		}
		$params = null;
		B('TaoShopRecs', $params);
	}
}
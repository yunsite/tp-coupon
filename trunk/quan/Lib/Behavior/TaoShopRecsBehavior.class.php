<?php
/**
 * TaoShopRecsBehavior.class.php
 * @copyright			copyright(c) 2011 - 2012 极好居
 * @author				anqiu xiao
 * @contact				QQ:89249294 E-mail:jihaoju@qq.com
 * @date				Mon Jun 18 22:28:44 CST 2012
 */
class TaoShopRecsBehavior extends Behavior 
{
	public function run(&$params)
	{
		$ccmrService = service('TaoShopRecs');
		$ccmrService->clearCache();
	}
}
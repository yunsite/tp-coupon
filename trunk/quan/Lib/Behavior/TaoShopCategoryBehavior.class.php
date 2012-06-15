<?php
/**
 * TaoShopCategoryBehavior.class.php
 * @copyright			copyright(c) 2011 - 2012 极好居
 * @author				anqiu xiao
 * @contact				QQ:89249294 E-mail:jihaoju@qq.com
 * @date				Sun Apr 08 15:28:14 CST 2012
 */
class TaoShopCategoryBehavior extends Behavior 
{
	public function run(&$params)
	{
		$cccService = service('TaoShopCategory');
		$cccService->clearCaches();
	}
}
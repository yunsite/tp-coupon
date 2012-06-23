<?php
/**
 * TaoCouponRecsBehavior.class.php
 * @copyright			copyright(c) 2011 - 2012 极好居
 * @author				anqiu xiao
 * @contact				QQ:89249294 E-mail:jihaoju@qq.com
 * @date				Sun Jun 24 01:08:05 CST 2012
 */
class TaoCouponRecsBehavior extends Behavior 
{
	public function run(&$params)
	{
		$ccmrService = service('TaoCouponRecs');
		$ccmrService->clearCache();
	}
}
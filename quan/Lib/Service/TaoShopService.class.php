<?php
/**
 * TaoShopService.class.php
 * @copyright			copyright(c) 2011 - 2012 极好居
 * @author				anqiu xiao
 * @contact				QQ:89249294 E-mail:jihaoju@qq.com
 * @date				Sun Jun 24 14:58:31 CST 2012
 */
class TaoShopService
{
	private $_expire = null;
	
	public function __construct()
	{
		$_cfg = load_config();
		$cache_time = $_cfg['taobao_shop_items_cache_time'] ? $_cfg['taobao_shop_items_cache_time'] : 120;
		$this->_expire = 60*floatval($cache_time);
	}
	
	public function info($id)
	{
		if(! C('DATA_CACHE_ON')){
			$ccmModel = D('TaoShop');
			return $data = $ccmModel->info($id);
		}
		$data = S('shop_'.$id);
		if(! $data){
			$ccmModel = D('TaoShop');
			$data = $ccmModel->info($id);
			S('shop_'.$id, $data);
		}
		return $data;
	}
	
	public function clearCache($id)
	{
		if(C('DATA_CACHE_ON')) S('shop_'.$id, null);
	}
	
	public function clearItemsCache($seller_id)
	{
		if(C('DATA_CACHE_ON')) S('shop_rec_items_'.$seller_id, null);
	}
	
	public function tao_shop_recommend_items($seller_id, $limit=10)
	{
		if(! C('DATA_CACHE_ON')){
			return $data = self::_tao_shop_recommend_items($seller_id, $limit);
		}
		$data = S('shop_rec_items_'.$seller_id, '', $this->_expire);
		if(! $data || ! $data[$limit]){
			if(! is_array($data)) $data = array();
			if(! is_array($data[$limit])) $data[$limit] = array();
			$data[$limit] = self::_tao_shop_recommend_items($seller_id, $limit);
			S('shop_rec_items_'.$seller_id, $data, $this->_expire);
		}
		return $data[$limit];
	}
	
	public static function _tao_shop_recommend_items($seller_id, $limit=10)
	{
		import('@.Com.taobao.Taobao');
		$taobaoObj = Taobao::getInstance();
		$result = $taobaoObj->getShoprecommendItems($seller_id, $limit);
		return $result;
	}
}
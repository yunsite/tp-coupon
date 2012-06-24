<?php
/**
 * TaoShopRecsService.class.php
 * @copyright			copyright(c) 2011 - 2012 极好居
 * @author				anqiu xiao
 * @contact				QQ:89249294 E-mail:jihaoju@qq.com
 * @date				Mon Jun 18 22:29:20 CST 2012
 */
class TaoShopRecsService
{
	public function getAll()
	{
		if(! C('DATA_CACHE_ON')){
			$data = self::_getAll();
			return $data;
		}
		$data = F('tao_shop_recs');
		if(! $data){
			$data = self::_getAll();
			F('tao_shop_recs', $data);
		}
		return $data;
	}
	
	public function recs_by_position($pos_id)
	{
		$all = $this->getAll();
		return $res = isset($all[$pos_id]) && $all[$pos_id] ? $all[$pos_id] : array();
	}
	
	public function clearCache()
	{
		if(C('DATA_CACHE_ON')) F('tao_shop_recs', null);
	}
	
	private static function _getAll()
	{
		$rec_table = M('tao_shop_rec')->getTableName();
		$m_table = M('tao_shop')->getTableName();
		$res = M('tao_shop_rec')->field("$rec_table.*,m.title,m.pic_path")->join($m_table." AS m ON m.id=$rec_table.s_id")->order($rec_table.'.sort_order ASC')->select();
		$data = array();
		foreach ($res as $rs){
			if (!isset($data[$rs['position']])) {
				$data[$rs['position']] = array();
			}
			$data[$rs['position']][] = $rs;
		}
		return $data;
	}
}
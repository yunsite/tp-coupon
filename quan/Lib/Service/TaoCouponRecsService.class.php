<?php
/**
 * TaoCouponRecsService.class.php
 * @copyright			copyright(c) 2011 - 2012 极好居
 * @author				anqiu xiao
 * @contact				QQ:89249294 E-mail:jihaoju@qq.com
 * @date				Sun Jun 24 01:08:32 CST 2012
 */
class TaoCouponRecsService
{
	public function getAll()
	{
		if(! C('DATA_CACHE_ON')){
			$data = $this->_getAll();
			return $data;
		}
		$data = F('tao_coupon_recs');
		if(! $data){
			$data = $this->_getAll();
			F('tao_coupon_recs', $data);
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
		if(C('DATA_CACHE_ON')) F('tao_coupon_recs', null);
	}
	
	private function _getAll()
	{
		$rec_table = M('tao_coupon_rec')->getTableName();
		$c_table = M('tao_coupon')->getTableName();
		$s_table = M('tao_shop')->getTableName();
		$res = M('tao_coupon_rec')
				->field("$rec_table.*,c.title,c.s_id,c.s_title,c.c_type,c.money_max,c.money_reduce,c.money_amount,s.level,s.pic_path")
				->join($c_table." AS c ON c.c_id=$rec_table.c_id")
				->join($s_table." AS s ON s.id=c.s_id")
				->order($rec_table.'.sort_order ASC')->select();
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
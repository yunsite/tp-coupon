<?php
/**
 * TaoCouponModel.class.php
 * @copyright			copyright(c) 2011 - 2012 极好居
 * @author				anqiu xiao
 * @contact				QQ:89249294 E-mail:jihaoju@qq.com
 * @date				Mon Jun 18 16:02:53 CST 2012
 */
/**
 * 优惠码模型类
 */
class TaoCouponModel extends RelationModel 
{
	protected $_link = array(
							'Data'	=>	array(
											'mapping_type'	=>	HAS_ONE,
											'class_name'	=>	'TaoCouponData',
											'foreign_key'	=>	'c_id',
											'mapping_name'	=>	'data',
											'mapping_fields'=>	'activity_id,seller_id,fetch_link,fetch_limit,directions,seo_title,seo_keywords,seo_desc',
											),
							);
							
    /**
     * 添加
     * 
     * @int				$id
     * @param array     $params
     * @return bool
     */
    public function _add(array $params)
    {
    	return  $this->data($params)->add();
    }
    
    /**
     * 更新信息
     * 
     * @param array				$id
     * @param array				$params
     * @return bool
     */
    public function _edit($id, array $params)
    {
    	$this->where("c_id='$id'")->save($params);
    	return true;
    }
    
    public function update($id, array $params)
    {
    	return $this->_edit($id, $params);
    }
    
    /**
     * 删除信息
     * 
     * @param array				$id
     * @return bool
     */
    public function _delete($id)
    {
    	$this->where("c_id='$id'")->delete();
        return true;
    }
    
    /**
     * 获取信息
     * 
     * @param int	$id
     * @return array
     */
    public function info($id)
    {
    	return $this->where("c_id='$id'")->relation(true)->find();
    }

    public function getAll(
    						array $keys = array(),
    						array $params = array(),
    						array $limit = array())
	{
		$result = array('count'=>0,'data'=>array());
		if(empty($keys)){
    		$fields = "*";
    	}else{
    		$fields = implode(',', $keys);
    	}
    	$where = '1=1';
    	if(isset($params['kw']) && $params['kw']){
    		$where .= " AND `s_title` LIKE '%$params[kw]%'";
    	}
    	$result['count'] = $this->where($where)->count();
    	$result['data'] = $this->field($fields)->where($where)
    							->order('c_id DESC')
    							->limit("$limit[begin], $limit[offset]")->select();
    	return $result;
	}
	
	/**
     * 前台优惠券列表
     *
     * @param array $keys
     * @param array $params
     * @param array $limit
     */
    public function front(array $params=array(), array $limit=array())
    {
    	$result = array('count'=>0,'data'=>array());
    	$fields = 'c.*, m.pic_path,m.level';
    	$sql = " FROM " . $this->getTableName() . " AS c LEFT JOIN " . M('tao_shop')->getTableName() . " AS m ON m.id=c.s_id";
    	$sql .= " WHERE c.is_active=1";
    	if(isset($params['addtime']) && $params['addtime']){
    		$sql .= " AND c.addtime>=$params[addtime]";
    	}
    	if(isset($params['cid']) && $params['cid']){
    		$sql .= " AND m.cid='$params[cid]'";
    	}
	    $res = $this->query("SELECT COUNT(*) AS c_count" . $sql . " LIMIT 1");
	    $result['count'] = empty($res) ? 0 : $res[0]['c_count'];
	    $sql .= " ORDER BY c.sort_order ASC, c.expiry DESC, c.c_id DESC";
	    if(isset($limit['begin']) && isset($limit['offset'])){
    		$sql .= " LIMIT $limit[begin],$limit[offset]";
    	}
    	$result['data'] = $this->query("SELECT $fields" . $sql);
    	return $result;
    }
    
    /**
     * 最新优惠券列表
     *
     * @param int	$m_id
     * @param int $limit
     */
    public function latest($s_id=null, $limit=10)
    {
    	$fields = 'c.c_id,c.title,c.s_id,c.s_title,c.c_type,c.money_max,c.money_reduce,c.money_amount, m.pic_path';
    	$sql = " FROM " . $this->getTableName() . " AS c LEFT JOIN " . M('tao_shop')->getTableName() . " AS m ON m.id=c.s_id";
    	$sql .= " WHERE c.is_active=1";
    	if($s_id){
    		$sql .= " AND c.s_id='$s_id'";
    	}
    	$sql .= " ORDER BY c.c_id DESC,c.expiry DESC LIMIT $limit";
    	$res = $this->query("SELECT $fields" . $sql);
    	return $res;
    }
    
    /**
     * 随机优惠券
     *
     * @param unknown_type $limit
     */
    public function randoms($limit=10)
    {
    	$today = LocalTime::getInstance()->local_strtotime(date('Y-m-d 23:59:59'));
    	$fields = 'c.*, m.pic_path';
    	$sql = " FROM " . $this->getTableName() . " AS c LEFT JOIN " . M('tao_shop')->getTableName() . " AS m ON m.id=c.s_id";
    	$sql .= " WHERE c.is_active=1 AND c.expiry>=$today";
    	$sql .= " ORDER BY RAND() DESC LIMIT $limit";
    	$res = $this->query("SELECT $fields" . $sql);
    	return $res;
    }
    
    /**
     * 商家所有优惠券
     *
     * @param int	$m_id
     * @param int $limit
     */
    public function all4mall($s_id, array $keys=array(), $extra=null)
    {
    	$fields = empty($keys) ? '*' : implode(',', $keys);
    	$where = "is_active=1 AND s_id='$s_id'";
    	if($extra){
    		$where .= " AND c_id NOT IN ($extra)";
    	}
    	return $this->field($fields)->where($where)->order("sort_order ASC, c_id DESC,expiry DESC")->select();
    }
    
    /**
     * 最新分类优惠券列表
     *
     * @param int	$m_id
     * @param int $limit
     */
    public function coupons4cate($cate_id, $limit=4, array $keys=array())
    {
    	$fields = 'm.pic_path';
    	foreach ($keys as $key){
    		$fields .= ',c.'.$key;
    	}
    	$sql = " FROM " . $this->getTableName() . " AS c LEFT JOIN " . M('tao_shop')->getTableName() . " AS m ON m.id=c.s_id";
    	$sql .= " WHERE c.is_active=1 AND m.cid IN ($cate_id)";
    	$sql .= " ORDER BY c.sort_order ASC,c.c_id DESC,c.expiry DESC LIMIT $limit";
    	$res = $this->query("SELECT $fields" . $sql);
    	return $res;
    }
}
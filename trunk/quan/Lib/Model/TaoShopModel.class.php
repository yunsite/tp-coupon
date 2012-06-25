<?php
/**
 * TaoShopModel.class.php
 * @copyright			copyright(c) 2011 - 2012 极好居
 * @author				anqiu xiao
 * @contact				QQ:89249294 E-mail:jihaoju@qq.com
 * @date				Sun Apr 08 01:41:24 CST 2012
 */
/**
 * 淘宝商家模型类
 */
class TaoShopModel extends RelationModel 
{
	protected $_link = array(
							'Coupons'	=>	array(
											'mapping_type'	=>	HAS_MANY,
											'class_name'	=>	'TaoCoupon',
											'foreign_key'	=>	's_id',
											'mapping_name'	=>	'coupons',
											'mapping_fields'=>	'c_id,title,c_type,money_max,money_reduce,money_amount',
											'mapping_order'	=>	'sort_order ASC,c_id DESC',
											'condition'		=>	'is_active=1',
											'mapping_limit'	=>	8
											),
							);

	protected function _initialize()
	{
		parent::_initialize();
		$nowtime = LocalTime::getInstance()->gmtime();
		$this->_link['Coupons']['condition'] .= ' AND expiry>='.$nowtime;
	}
	
    /**
     * 添加
     * 
     * @int				$id
     * @param array     $params
     * @return bool
     */
    public function _add(array $params)
    {
    	$title_match = segment($params['title']);
		$params['title_match'] = implode(' ', array_unique($title_match));
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
    	$title_match = segment($params['title']);
		$params['title_match'] = implode(' ', array_unique($title_match));
    	$this->where("id='$id'")->save($params);
    	return true;
    }
    
    public function update($id, array $params)
    {
    	$this->where("id='$id'")->save($params);
    	return true;
    }
    
    /**
     * 更新全文索引
     * 
     * @return bool
     */
    public function _updateFullIndex()
	{
		$res = $this->field('id,title')->select();
		foreach ($res as $params){
			$data = array();
			$title_match = segment($params['title']);
			$data['title_match'] = implode(' ', array_unique($title_match));
			$this->where("id='$params[id]'")->save($data);
		}
    	return true;
	}
    
    /**
     * 删除信息
     * 
     * @param array				$id
     * @return bool
     */
    public function _delete($id)
    {
    	$this->where("id='$id'")->delete();
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
    	return $this->where("id='$id'")->find();
    }
    
    public function getInfoBySid($sid)
    {
    	static $shop = array();
    	if(isset($shop[$sid])) return $shop[$sid];
    	return $shop[$sid] = $this->where("sid='$sid'")->find();
    }
    
    public function search($kw)
    {
    	$where = 'is_active=1';
    	$match = segment($kw);
    	if(empty($match)){
    		$where .= " AND `title` LIKE '%$kw%'";
    	}else{
    		$match = implode(' ', array_unique($match));
    		$where .= " AND (`title` LIKE '%$kw%' ) OR (MATCH(title_match) AGAINST('*$match*' IN BOOLEAN MODE))";
    	}
    	$fields = "id,nick,title,`desc`,pic_path,shop_click_url";
    	return $this->field($fields)->where($where)->order('id DESC')->select();
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
    	if(isset($params['is_active']) && $params['is_active'] !== null){
    		$where .= " AND is_active='$params[is_active]'";
    	}
    	if(isset($params['cid']) && $params['cid']){
    		$where .= " AND cid='$params[cid]'";
    	}
    	if(isset($params['kw']) && $params['kw']){
    		$match = segment($params['kw']);
    		if(empty($match)){
    			$where .= " AND `title` LIKE '%$params[kw]%'";
    		}else{
    			$match = implode(' ', array_unique($match));
    			$where .= " AND ((`title` LIKE '%$params[kw]%' ) OR (MATCH(title_match) AGAINST('*$match*' IN BOOLEAN MODE)))";
    		}
    	}
    	$result['count'] = $this->field($fields)->where($where)->count();
    	$result['data'] = $this->field($fields)->where($where)
    							->order('sort_order ASC, id DESC')
    							->limit("$limit[begin], $limit[offset]")->select();
    	return $result;
	}
	
	public function front(
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
    	$where = 'is_active=1';
    	if(isset($params['cid']) && $params['cid']){
    		$where .= " AND cid='$params[cid]'";
    	}
    	$order = '';
    	if(isset($params['t_type']) && $params['t_type'] > 1){
    		switch (intval($params['t_type'])){
    			case 2:
    				$order = 'yesterdaysearched DESC,';
    				break;
    			case 3:
    				$order = 'daysearched DESC,';
    				break;
    			case 4:
    				$order = 'weeksearched DESC,';
    				break;
    			case 5:
    				$order = 'monthsearched DESC,';
    				break;
    		}
    	}
    	$result['count'] = $this->field($fields)->where($where)->count();
    	$result['data'] = $this->field($fields)->where($where)
    							->relation(true)
    							->order($order . 'sort_order ASC, id DESC')
    							->limit("$limit[begin], $limit[offset]")->select();
    	return $result;
	}
}
<?php
/**
 * TaoCouponAction.class.php
 * @copyright			copyright(c) 2011 - 2012 极好居
 * @author				anqiu xiao
 * @contact				QQ:89249294 E-mail:jihaoju@qq.com
 * @date				Thu Jun 14 17:00:05 CST 2012
 */
class TaoCouponAction extends AdminCommonAction
{
	private $_code_type_conf;
	private $_code_price_conf;
	private $_code_expiry_conf;
	
	protected function _initialize()
    {
    	parent::_initialize();
    	$this->_code_type_conf = array(
    								1	=>	'减免券',
    								2	=>	'代金券',
    								);
    	$this->_code_price_conf = array(
    								1	=>	'免费',
    								2	=>	'付费',
    								3	=>	'积分',
    								);
    	$this->_code_expiry_conf = array(
    								1	=>	'有限制',
    								2	=>	'无限制',
    								);
    }
    
    public function index()
	{
		$page = isset($_REQUEST['page']) && $_REQUEST['page'] >= 1 ? $_REQUEST['page'] : 1;
    	$pageLimit = 15;
    	$localTimeObj = LocalTime::getInstance();
    	$ccModel = D('TaoCoupon');
    	$params = array(
    					'kw'		=>	isset($_REQUEST['kw']) && $_REQUEST['kw'] ? $_REQUEST['kw'] : ''
    					);
    	$keys = array();
    	$res = $ccModel->getAll($keys, $params, array('begin'=>($page-1)*$pageLimit, 'offset'=>$pageLimit));
    	$codes = array();
    	foreach ($res['data'] as $rs){
    		if($rs['expiry_type'] == 1){
    			$rs['expiry'] = $localTimeObj->local_date($this->_CFG['date_format'], $rs['expiry']);
    		}
    		$codes[] = $rs;
    	}
    	$this->assign('codes', $codes);
    	$page_url = "?g=".GROUP_NAME."&m=".MODULE_NAME."&a=".ACTION_NAME."&page=[page]";
    	foreach ($params as $key => $val){
    		$page_url .= "&$key=$val";
    	}
    	$p=new Page($page,
    			$pageLimit,
    			$res['count'],
    			$page_url,
    			5,
    			5);
    	$pagelink=$p->showStyle(3);
    	$this->assign('pagelink', $pagelink);
		$this->assign('_hash_', buildFormToken());
		$this->assign('ur_href', '淘宝优惠券管理 &gt; 优惠券列表');
		$this->display();
	}
	
	public function records()
	{
		$c_id = intval($_REQUEST['c_id']);
		$page = isset($_REQUEST['page']) && $_REQUEST['page'] >= 1 ? $_REQUEST['page'] : 1;
    	$pageLimit = 15;
    	$localTimeObj = LocalTime::getInstance();
    	$ccModel = M('TaoCouponRecords');
    	$res = array();
    	$res['count'] = $ccModel->where("c_id='$c_id'")->count();
    	$res['data'] = $ccModel->where("c_id='$c_id'")->order('id DESC')->limit(($page-1)*$pageLimit.','.$pageLimit)->select();
    	$records = array();
    	foreach ($res['data'] as $rs){
    		$rs['fetch_time'] = $localTimeObj->local_date($this->_CFG['time_format'], $rs['fetch_time']);
    		$records[] = $rs;
    	}
    	$this->assign('records', $records);
    	$page_url = "?g=".GROUP_NAME."&m=".MODULE_NAME."&a=".ACTION_NAME."&c_id=$c_id&page=[page]";
    	foreach ($params as $key => $val){
    		$page_url .= "&$key=$val";
    	}
    	$p=new Page($page,
    			$pageLimit,
    			$res['count'],
    			$page_url,
    			5,
    			5);
    	$pagelink=$p->showStyle(3);
    	$this->assign('pagelink', $pagelink);
		$this->assign('ur_href', '淘宝优惠券管理 &gt; 领取记录');
		$this->display();
	}
    
    public function add()
	{
		if($this->isPost()){
			if(C('TOKEN_ON') && ! checkFormToken($_REQUEST, 'hash')){
				die('hack attemp.');
			}
			if((! $_REQUEST['s_title'] || ! $_REQUEST['s_id'] || ! $_REQUEST['c_type'] || ! $_REQUEST['expiry_type']
			 || ! $_REQUEST['fetch_limit'] || ! $_REQUEST['price_type'])
			 || ($_REQUEST['c_type'] == 1 && (! $_REQUEST['money_max'] || ! $_REQUEST['money_reduce']))
			 || ($_REQUEST['c_type'] == 2 && ! $_REQUEST['money_amount'])
			 || ($_REQUEST['expiry_type'] == 1 && ! $_REQUEST['expiry'])
			 || ($_REQUEST['price_type'] == 2 && ! $_REQUEST['price_2'])
			 || ($_REQUEST['price_type'] == 3 && ! $_REQUEST['price_3'])
			 || ((! $_REQUEST['activity_id'] || !$_REQUEST['seller_id']) && !$_REQUEST['fetch_link'])){
				$this->error('请填写所有的必填项');
			}
			$localTimeObj = LocalTime::getInstance();
			$data = array(
						's_id'			=>	intval($_REQUEST['s_id']),
						's_title'		=>	$_REQUEST['s_title'],
						'title'			=>	$_REQUEST['title'],
						'c_type'		=>	$_REQUEST['c_type'],
						'expiry_type'	=>	$_REQUEST['expiry_type'],
						'price_type'	=>	$_REQUEST['price_type'],
						'addtime'		=>	$localTimeObj->gmtime()
						);
			if($_REQUEST['c_type'] == 1){
				$data['money_max'] = floatval($_REQUEST['money_max']);
				$data['money_reduce'] = floatval($_REQUEST['money_reduce']);
			}elseif($_REQUEST['c_type'] == 2){
				$data['money_amount'] = floatval($_REQUEST['money_amount']);
			}
			if($_REQUEST['expiry_type'] == 1){
				$data['expiry'] = $localTimeObj->local_strtotime($_REQUEST['expiry'] . ' 23:59:59');
			}else if($_REQUEST['expiry_type'] == 2){
				$data['expiry'] = $localTimeObj->local_strtotime('2029-12-31 23:59:59');
			}
			if($_REQUEST['price_type'] == 2){
				$data['price'] = floatval($_REQUEST['price_2']);
			}elseif($_REQUEST['price_type'] == 3){
				$data['price'] = floatval($_REQUEST['price_3']);
			}
			$ccModel = D('TaoCoupon');
			$c_id = 0;
			if($c_id = $ccModel->_add($data)){
				//插入附属表数据
				$data = array(
							'c_id'			=>	$c_id,
							'activity_id'	=>	intval($_REQUEST['activity_id']),
							'seller_id'		=>	intval($_REQUEST['seller_id']),
							'fetch_link'	=>	$_REQUEST['fetch_link'],
							'fetch_limit'	=>	$_REQUEST['fetch_limit'],
							'directions'	=>	$_REQUEST['directions'],
							'seo_title'		=>	$_REQUEST['seo_title'],
							'seo_keywords'	=>	$_REQUEST['seo_keywords'],
							'seo_desc'		=>	$_REQUEST['seo_desc']
							);
				$ccdModel = D('TaoCouponData');
				$ccdModel->_add($data);
				$this->assign('jumpUrl', '?g='.GROUP_NAME.'&m='.MODULE_NAME);
				$this->success('添加成功');
			}else{
				$this->error('添加失败');
			}
		}
		$this->assign('code_type_conf', $this->_code_type_conf);
		$this->assign('code_price_conf', $this->_code_price_conf);
		$this->assign('code_expiry_conf', $this->_code_expiry_conf);
		$this->assign('fetch_limit_conf', CouponCodeConf::fetch_limit_conf());
		$this->assign('ur_href', '淘宝优惠券管理 &gt; 添加优惠券');
		$this->assign('_hash_', buildFormToken('hash'));
		$this->display('post');
	}
	
	public function edit()
	{
		$c_id = intval($_REQUEST['c_id']);
		$ccModel = D('TaoCoupon');
		$code = $ccModel->info($c_id);
		$code or die('id invalid.');
		$localTimeObj = LocalTime::getInstance();
		if($this->isPost()){
			if(C('TOKEN_ON') && ! checkFormToken($_REQUEST, 'hash')){
				die('hack attemp.');
			}
			if((! $_REQUEST['s_title'] || ! $_REQUEST['s_id'] || ! $_REQUEST['c_type'] || ! $_REQUEST['expiry_type']
			 || ! $_REQUEST['fetch_limit'] || ! $_REQUEST['price_type'])
			 || ($_REQUEST['c_type'] == 1 && (! $_REQUEST['money_max'] || ! $_REQUEST['money_reduce']))
			 || ($_REQUEST['c_type'] == 2 && ! $_REQUEST['money_amount'])
			 || ($_REQUEST['expiry_type'] == 1 && ! $_REQUEST['expiry'])
			 || ($_REQUEST['price_type'] == 2 && ! $_REQUEST['price_2'])
			 || ($_REQUEST['price_type'] == 3 && ! $_REQUEST['price_3'])
			 || ((! $_REQUEST['activity_id'] || !$_REQUEST['seller_id']) && !$_REQUEST['fetch_link'])){
				$this->error('请填写所有的必填项');
			}
			$data = array(
						's_id'			=>	intval($_REQUEST['s_id']),
						's_title'		=>	$_REQUEST['s_title'],
						'title'			=>	$_REQUEST['title'],
						'c_type'		=>	$_REQUEST['c_type'],
						'expiry_type'	=>	$_REQUEST['expiry_type'],
						'price_type'	=>	$_REQUEST['price_type'],
						);
			if($_REQUEST['c_type'] == 1){
				$data['money_max'] = floatval($_REQUEST['money_max']);
				$data['money_reduce'] = floatval($_REQUEST['money_reduce']);
			}elseif($_REQUEST['c_type'] == 2){
				$data['money_amount'] = floatval($_REQUEST['money_amount']);
			}
			if($_REQUEST['expiry_type'] == 1){
				$data['expiry'] = $localTimeObj->local_strtotime($_REQUEST['expiry'] . ' 23:59:59');
			}else{
				$data['expiry'] = 0;
			}
			if($_REQUEST['price_type'] == 2){
				$data['price'] = floatval($_REQUEST['price_2']);
			}elseif($_REQUEST['price_type'] == 3){
				$data['price'] = floatval($_REQUEST['price_3']);
			}
			if($ccModel->_edit($c_id, $data)){
				//插入附属表数据
				$data = array(
							'c_id'			=>	$c_id,
							'activity_id'	=>	intval($_REQUEST['activity_id']),
							'seller_id'		=>	intval($_REQUEST['seller_id']),
							'fetch_link'	=>	$_REQUEST['fetch_link'],
							'fetch_limit'	=>	$_REQUEST['fetch_limit'],
							'directions'	=>	$_REQUEST['directions'],
							'seo_title'		=>	$_REQUEST['seo_title'],
							'seo_keywords'	=>	$_REQUEST['seo_keywords'],
							'seo_desc'		=>	$_REQUEST['seo_desc']
							);
				$ccdModel = D('TaoCouponData');
				$ccdModel->_edit($c_id, $data);
				$this->assign('jumpUrl', '?g='.GROUP_NAME.'&m='.MODULE_NAME);
				$this->success('编辑成功');
			}else{
				$this->error('编辑失败');
			}
		}
		if($code['expiry_type'] == 1){
    		$code['expiry'] = $localTimeObj->local_date($this->_CFG['date_format'], $code['expiry']);
    	}
    	$this->assign('code', $code);
		$this->assign('code_type_conf', $this->_code_type_conf);
		$this->assign('code_price_conf', $this->_code_price_conf);
		$this->assign('code_expiry_conf', $this->_code_expiry_conf);
		$this->assign('fetch_limit_conf', CouponCodeConf::fetch_limit_conf());
		$this->assign('ur_href', '淘宝优惠券管理 &gt; 编辑优惠券');
		$this->assign('_hash_', buildFormToken('hash'));
		$this->display('post');
	}
	
	public function del()
	{
		if($this->isAjax()){
			$c_id = intval($_REQUEST['id']);
			M('tao_coupon')->where("c_id='$c_id'")->delete();
			M('tao_coupon_records')->where("c_id='$c_id'")->delete();
			M('tao_coupon_data')->where("c_id='$c_id'")->delete();
			$this->ajaxReturn('', '删除成功' ,1);
		}
	}
	
	public function view()
	{
		$c_id = intval($_REQUEST['c_id']);
		$ccModel = D('TaoCoupon');
		$code = $ccModel->info($c_id);
		$code or die('id invalid.');
		import('@.Com.Util.Ubb');
		$localTimeObj = LocalTime::getInstance();
		if($code['expiry_type'] == 1){
    		$code['expiry'] = $localTimeObj->local_date($this->_CFG['date_format'], $code['expiry']);
    	}
    	$fetch_limit_conf = CouponCodeConf::fetch_limit_conf();
    	$code['fetch_limit'] = $fetch_limit_conf[$code['data']['fetch_limit']];
    	$code['data']['directions'] = Ubb::ubb2html($code['data']['directions']);
    	$this->assign('code', $code);
		$this->assign('ur_href', '淘宝优惠券管理 &gt; 优惠券详情');
		$this->display();
	}
	
	/**
	 * 批量采集第一步
	 *
	 */
	public function gather()
	{
		$this->assign('ur_href', '淘宝优惠券管理 &gt; 采集淘宝网淘券优惠券');
		$this->display();
	}
	
	/**
	 * 批量采集第二步
	 *
	 */
	public function gather_step2()
	{
		$start_page = intval($_REQUEST['start_page']);
		$end_page = intval($_REQUEST['end_page']);
		if(! $start_page || ! $end_page){
			exit('data invalid.');
		}
		$end_page = $end_page < $start_page ? $start_page : $end_page;
		$this->assign('start_page', $start_page);
		$this->assign('end_page', $end_page);
		$this->assign('ur_href', '淘宝优惠券管理 &gt; 采集淘宝网淘券优惠券');
		$this->display();
	}
	
	public function gather_handler()
	{
		$page = intval($_REQUEST['page']);
		$snoopy = new Snoopy();
		$snoopy->referer = "http://www.taobao.com";
		$URI = 'http://taoquan.taobao.com/coupon/coupon_list.htm?startFee=-1.0&category=-1&keyWord=&order=order&desc=true&currentPage='.$page;
		$snoopy->fetch($URI);
		$html = $snoopy->results;
		unset($snoopy);
		$html = iconv('gbk', 'utf-8', $html);
		preg_match_all('/<li class="coupon-item J_CouponItem">(.*)<\/li>/isU',$html,$tt);
		$temp = $tt[1];
		$coupon = array();
		$localTimeObj = LocalTime::getInstance();
		$taoShopModel = D('TaoShop');
		$ccModel = D('TaoCoupon');
		$tcdModel = D('TaoCouponData');
		foreach ($temp as $c){
			$coupon = $this->_queryCoupon($c);
			if(!$coupon['money_reduce'] || !$coupon['activity_id'] || !$coupon['seller_id']) continue;
			$shop = $taoShopModel->getInfoBySid($coupon['sid']);
			if(!$shop) continue;
			$data = array(
						's_id'			=>	$shop['id'],
						's_title'		=>	$shop['title'],
						'c_type'		=>	1,
						'expiry_type'	=>	1,
						'price_type'	=>	1,
						'money_max'		=>	$coupon['money_max'],
						'money_reduce'	=>	$coupon['money_reduce'],
						'expiry' 		=>  $localTimeObj->local_strtotime($coupon['expiry']),
						'addtime'		=>	$localTimeObj->gmtime()
						);
			$c_id = 0;
			if($c_id = $ccModel->_add($data)){
				//插入附属表数据
				$data = array(
							'c_id'			=>	$c_id,
							'activity_id'	=>	$coupon['activity_id'],
							'seller_id'		=>	$coupon['seller_id'],
							'fetch_limit'	=>	101
							);
				$tcdModel->_add($data);
			}
		}
		$this->ajaxReturn('','',1);
	}
	
	private function _queryCoupon($str)
	{
		$regex = '/http:\/\/shop([0-9]+)\.taobao\.com/is';
		preg_match($regex, $str, $matches);
		$sid = $matches[1];

		$regex = '/<p class="coupon-num">&yen;([0-9]+)元<\/p>/is';
		preg_match($regex, $str, $matches);
		$money_reduce = $matches[1];

		$regex = '/<p class="cond">使用条件：订单满([0-9\.]+)元<\/p>/is';
		preg_match($regex, $str, $matches);
		$money_max = $matches[1];

		$regex = '/<p>有效期至([0-9]+)年([0-9]+)月([0-9]+)日<\/p>/is';
		preg_match($regex, $str, $matches);
		$expiry = $matches[1] .'-'. $matches[2] .'-'. $matches[3] . ' 23:59:59';

		$regex = '/combo\/between\.htm\?activityId=([0-9]+)&sellerId=([0-9]+)&shopTitle=/is';
		preg_match($regex, $str, $matches);
		$activity_id = $matches[1];
		$seller_id = $matches[2];

		return $return = array(
							'sid'				=>	$sid,
							'money_reduce'		=>	$money_reduce,
							'money_max'			=>	$money_max,
							'expiry'			=>	$expiry,
							'seller_id'			=>	$seller_id,
							'activity_id'		=>	$activity_id
							);
	}
}
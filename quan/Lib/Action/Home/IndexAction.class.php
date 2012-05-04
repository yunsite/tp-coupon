<?php
/**
 * IndexAction.class.php
 * @copyright			copyright(c) 2011 - 2012 极好居
 * @author				anqiu xiao
 * @contact				QQ:89249294 E-mail:jihaoju@qq.com
 * @date				Tue Apr 03 14:56:43 CST 2012
 */
class IndexAction extends HomeCommonAction
{
    /**
     * 默认操作
     * 
     */
    public function index()
    {
    	$localTimeObj = LocalTime::getInstance();
		$today = $localTimeObj->local_strtotime(date('Y-m-d 23:59:59'));
    	//商家分类
		$cccService = service('CouponCodeCategory');
		$cates = $cccService->getTree();
		$all_cates = $cccService->getAll();
		$this->assign('cates', $cates);
		//分类优惠券
		$ccModel = D('CouponCode');
		$coupons4cate = array();
		foreach ($cates as $c){
			if($c['level'] ==0 && $all_cates[$c['id']]['show_index']==1){
				$cate_ids = is_array($cates[$c['id']]['childs'])
							? $cates[$c['id']]['childs']
							: array();
				$cate_ids[] = $c['id'];
				$cate_ids = implode(',', $cate_ids);
				$res = $ccModel->coupons4cate($cate_ids, 6);
				$coupons = array();
				foreach ($res as $rs){
					if($rs['expiry_type'] == 1){
						if(($rs['expiry'] - $today) == 0){
							$rs['expiry'] = 1;
						}else{
							$rs['expiry'] = ($rs['expiry'] - $today) > 0 ? ceil(($rs['expiry'] - $today)/(3600*24)) : 0;
						}
					}
					$coupons[] = $rs;
				}
				$coupons4cate[] = array(
										'cate'		=>	$c,
										'coupons'	=>	$coupons
										);
			}
		}
		$this->assign('coupons4cate', $coupons4cate);
    	//推荐商家
    	$ccmrService = service('CouponCodeMallRecs');
    	$mall_recs = $ccmrService->recs_by_position(101);
    	$this->assign('mall_recs', $mall_recs);
    	$ccService = service('CouponCode');
    	//最新10个优惠券
		$latest10 = $ccService->mall_latest();
		$this->assign('latest10', $latest10);
    	//本周最多被领取的10个优惠券
		$hot10 = $ccService->hottest('week', 10);
		$this->assign('hot10', $hot10);
		//最近被领取的10个优惠券
		$fetched10 = array();
		$data = $ccService->fetch_latest(10);
		foreach ($data as $d){
			$d['fetch_time'] = $localTimeObj->local_date('H:i:s', $d['fetch_time']);
			$fetched10[] = $d;
		}
		$this->assign('fetched10', $fetched10);
    	//每日精选
		$daybest10 = array();
		$time = $localTimeObj->local_strtotime(date('Y-m-d 00:00:00'));
		$daybest10 = $ccService->daybest($time, 10);
		$this->assign('daybest10', $daybest10);
		//友情链接
		$friendlinks = array();
		$flService = service('FriendLinks');
		$res = $flService->getAll();
		if(is_array($res[101])){
			foreach ($res[101] as $r){
				$friendlinks[] = $res['all'][$r];
			}
		}
		$this->assign('friendlinks', $friendlinks);
    	$this->assign('page_title', '');
    	$this->assign('page_keywords', $this->_CFG['site_keywords']);
    	$this->assign('page_description', $this->_CFG['site_description']);
    	$this->display();
    }
}
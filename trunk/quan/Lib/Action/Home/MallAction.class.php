<?php
/**
 * MallAction.class.php
 * @copyright			copyright(c) 2011 - 2012 极好居
 * @author				anqiu xiao
 * @contact				QQ:89249294 E-mail:jihaoju@qq.com
 * @date				Tue Apr 03 14:56:43 CST 2012
 */
class MallAction extends HomeCommonAction
{
    /**
     * 优惠码详情
     *
     */
    public function view()
    {
    	$id = intval($_REQUEST['id']);
    	$ccmService = service('CouponCodeMall');
    	$mall = $ccmService->info($id);
    	$mall or die('id invliad.');
    	$localTimeObj = LocalTime::getInstance();
		$today = $localTimeObj->local_strtotime(date('Y-m-d 23:59:59'));
    	import('@.Com.Util.Ubb');
    	$mall['description'] = Ubb::ubb2html($mall['description']);
    	$mall['how2use'] = Ubb::ubb2html($mall['how2use']);
    	$this->assign('mall', $mall);
    	//该商家的优惠券
    	$cModel = D('CouponCode');
    	$res = $cModel->all4mall($id);
    	$codes = array();
		foreach ($res as $rs){
			if($rs['expiry_type'] == 1){
				if(($rs['expiry'] - $today) == 0){
					$rs['expiry'] = 1;
				}else{
					$rs['expiry'] = ($rs['expiry'] - $today) > 0 ? ceil(($rs['expiry'] - $today)/(3600*24)) : 0;
				}
			}
			$codes[] = $rs;
		}
		$this->assign('codes', $codes);
    	$this->assign('page_title', $mall['name'] . '优惠券 - ');
    	$this->assign('page_keywords', $this->_CFG['site_keywords']);
    	$this->assign('page_description', $this->_CFG['site_description']);
    	$this->display();
    }
    
    /**
     * 使用方法
     *
     */
    public function how2use()
    {
    	$id = intval($_REQUEST['id']);
    	$ccmService = service('CouponCodeMall');
    	$mall = $ccmService->info($id);
    	$mall or die('id invliad.');
    	$localTimeObj = LocalTime::getInstance();
		$today = $localTimeObj->local_strtotime(date('Y-m-d 23:59:59'));
    	import('@.Com.Util.Ubb');
    	$mall['description'] = Ubb::ubb2html($mall['description']);
    	$mall['how2use'] = Ubb::ubb2html($mall['how2use']);
    	$this->assign('mall', $mall);
    	//该商家的优惠券
    	$cModel = D('CouponCode');
    	$res = $cModel->all4mall($id);
    	$codes = array();
		foreach ($res as $rs){
			if($rs['expiry_type'] == 1){
				if(($rs['expiry'] - $today) == 0){
					$rs['expiry'] = 1;
				}else{
					$rs['expiry'] = ($rs['expiry'] - $today) > 0 ? ceil(($rs['expiry'] - $today)/(3600*24)) : 0;
				}
			}
			$codes[] = $rs;
		}
		$this->assign('codes', $codes);
    	$this->assign('page_title', $mall['name'] . '优惠券 - ');
    	$this->assign('page_keywords', $this->_CFG['site_keywords']);
    	$this->assign('page_description', $this->_CFG['site_description']);
    	$this->display();
    }
    
    public function lists()
    {
    	$localTimeObj = LocalTime::getInstance();
		$today = $localTimeObj->local_strtotime(date('Y-m-d 23:59:59'));
    	//商家分类
		$cccService = service('CouponCodeCategory');
		$cates = $cccService->getTree();
		//分类商家
		$ccmService = service('CouponCodeMall');
		$mallModel = D('CouponCodeMall');
		$malls4cate = array();
		foreach ($cates as $c){
			if($c['level'] ==0){
				$cate_ids = is_array($cates[$c['id']]['childs'])
							? $cates[$c['id']]['childs']
							: array();
				$cate_ids[] = $c['id'];
				$cate_ids = implode(',', $cate_ids);
				$res = $mallModel->malls4cate($cate_ids);
				$malls = array();
				foreach ($res as $rs){
					$malls[] = $ccmService->info($rs['id']);
				}
				if(empty($malls)){
					continue;
				}
				$malls4cate[] = array(
										'cate'		=>	$c,
										'malls'	=>	$malls
										);
			}
		}
		$this->assign('malls4cate', $malls4cate);
    	$this->assign('page_title', '');
    	$this->assign('page_keywords', $this->_CFG['site_keywords']);
    	$this->assign('page_description', $this->_CFG['site_description']);
    	$this->display();
    }
    
    public function search()
    {
    	$kw = $_REQUEST['kw'];
    	if(empty($kw)) redirect(reUrl('Mall/lists'));
    	$mallModel = D('CouponCodeMall');
    	$mall = $mallModel->search($kw);
    	//只有一个结果符合，直接跳转到商家信息页
    	if(count($mall) == 1){
    		$mall =current($mall);
    		$localTimeObj = LocalTime::getInstance();
			$nowtime = $localTimeObj->gmtime();
			$yestoday = $nowtime-24*3600;
    		$yesterdaysearched = (date('Ymd', $mall['updatetime']) == date('Ymd', $yestoday)) ? $mall['daysearched'] : $mall['yesterdaysearched'];
    		$daysearched = (date('Ymd', $mall['updatetime']) == date('Ymd', $nowtime)) ? ($mall['daysearched'] + 1) : 1;
    		$weeksearched = (date('YW', $mall['updatetime']) == date('YW', $nowtime)) ? ($mall['weeksearched'] + 1) : 1;
    		$monthsearched = (date('Ym', $mall['updatetime']) == date('Ym', $nowtime)) ? ($mall['monthsearched'] + 1) : 1;
			$data = array(
							'yesterdaysearched'		=>	$yesterdaysearched,
							'daysearched'			=>	$daysearched,
							'weeksearched'			=>	$weeksearched,
							'monthsearched'			=>	$monthsearched,
							'updatetime'			=>	$nowtime
							);
			$mallModel->update($mall['id'], $data);
    		redirect(reUrl('Mall/view?id='.$mall['id']));
    	}else if(count($mall) > 1){
    		$localTimeObj = LocalTime::getInstance();
			$nowtime = $localTimeObj->gmtime();
			$yestoday = $nowtime-24*3600;
    		foreach ($mall as $m){
    			$yesterdaysearched = (date('Ymd', $m['updatetime']) == date('Ymd', $yestoday)) ? $m['daysearched'] : $m['yesterdaysearched'];
    			$daysearched = (date('Ymd', $m['updatetime']) == date('Ymd', $nowtime)) ? ($m['daysearched'] + 1) : 1;
    			$weeksearched = (date('YW', $m['updatetime']) == date('YW', $nowtime)) ? ($m['weeksearched'] + 1) : 1;
    			$monthsearched = (date('Ym', $m['updatetime']) == date('Ym', $nowtime)) ? ($m['monthsearched'] + 1) : 1;
    			$data = array(
    			'yesterdaysearched'		=>	$yesterdaysearched,
    			'daysearched'			=>	$daysearched,
    			'weeksearched'			=>	$weeksearched,
    			'monthsearched'			=>	$monthsearched,
    			'updatetime'			=>	$nowtime
    			);
    			$mallModel->update($m['id'], $data);
    		}
    		$this->assign('malls', $mall);
    		$this->assign('kw', $kw);
    		$this->assign('page_title', $kw . '搜索结果 - ');
    		$this->assign('page_keywords', $this->_CFG['site_keywords']);
    		$this->assign('page_description', $this->_CFG['site_description']);
    		$this->display();
    	}else{
    		$this->error('没有找到您要搜索的商家');
    	}
    }
    
    /**
     * 跳转到商家购物链接
     *
     */
    public function out()
    {
    	$id = intval($_REQUEST['id']);
    	$ccmService = service('CouponCodeMall');
    	$mall = $ccmService->info($id);
    	$mall or die('id invliad.');
    	//可加入统计代码
    	
    	redirect($mall['gourl']);
    }
}
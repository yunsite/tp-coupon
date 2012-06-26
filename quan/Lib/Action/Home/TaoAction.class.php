<?php
/**
 * TaoAction.class.php
 * @copyright			copyright(c) 2011 - 2012 极好居
 * @author				anqiu xiao
 * @contact				QQ:89249294 E-mail:jihaoju@qq.com
 * @date				Fri Jun 15 14:40:24 CST 2012
 */
class TaoAction extends HomeCommonAction
{
	public function index()
	{
		$page = isset($_REQUEST['p']) && $_REQUEST['p'] >= 1 ? $_REQUEST['p'] : 1;
		$pageLimit = 20;
		$localTimeObj = LocalTime::getInstance();
		$today = $localTimeObj->local_strtotime(date('Y-m-d 23:59:59'));
		$addtime = 0;
    	$cid = isset($_REQUEST['cid']) && $_REQUEST['cid'] ? intval($_REQUEST['cid']) : 0;
    	$t_type = isset($_REQUEST['t_type']) ? intval($_REQUEST['t_type']) : 0;
    	$this->assign('cid', $cid);
    	$this->assign('t_type', $t_type);
    	//分类
    	$tscService = service('TaoShopCategory');
    	$categorys = $tscService->getAll();
    	$this->assign('categorys', $categorys);
    	switch ($t_type){
			case 1:
				$addtime = $localTimeObj->local_strtotime(date('Y-m-d 00:00:00'));
				break;
			case 2:
				$addtime = $localTimeObj->local_strtotime(date('Y-m-d 00:00:00', strtotime('-3 day')));
				break;
			case 3:
				$addtime = $localTimeObj->local_strtotime(date('Y-m-d 00:00:00', strtotime('-7 day')));
				break;
			case 4:
				$addtime = $localTimeObj->local_strtotime(date('Y-m-d 00:00:00', strtotime('-30 day')));
				break;
		}
    	$params = array('cid' => $categorys[$cid]['cid'], 'addtime'=>$addtime);
		$limit = array('begin'=>($page-1)*$pageLimit, 'offset'=>$pageLimit);
		$tcModel = D('TaoCoupon');
		$keys = array();
		$res = $tcModel->front($params, $limit);
		$coupons = array();
		foreach ($res['data'] as $rs){
			if($rs['expiry_type'] == 1){
				$rs['expiry_timestamp'] = $rs['expiry'] + $this->_CFG['timezone']*3600;
				if(($rs['expiry'] - $today) == 0){
					$rs['expiry'] = 1;
				}else{
					$rs['expiry'] = ($rs['expiry'] - $today) > 0 ? ceil(($rs['expiry'] - $today)/(3600*24)) : 0;
				}
			}
			$coupons[] = $rs;
		}
		$this->assign('coupons', $coupons);
		$page_url = reUrl(MODULE_NAME."/".ACTION_NAME."?cid=$cid&t_type=$t_type&p=[page]");
		$page_url = str_replace('%5bpage%5d', '[page]', $page_url);
		$p=new Page($page,
		$pageLimit,
		$res['count'],
		$page_url,
		5,
		5);
		$pagelink=$p->showStyle(3);
		$this->assign('pagelink', $pagelink);
		$nowtime = LocalTime::getInstance()->gmtime();
    	$this->assign('nowtime', $nowtime);
    	$this->assign('page_title', '淘宝优惠券 - ' . $this->_CFG['site_title'] . ' - ');
    	$this->assign('page_keywords', $this->_CFG['site_keywords']);
    	$this->assign('page_description', $this->_CFG['site_description']);
    	$this->display();
	}
	
    /**
     * 淘宝店大全
     * 
     */
    public function shops()
    {
    	$page = isset($_REQUEST['p']) && $_REQUEST['p'] >= 1 ? $_REQUEST['p'] : 1;
		$pageLimit = 10;
    	$cid = isset($_REQUEST['cid']) && $_REQUEST['cid'] ? intval($_REQUEST['cid']) : 0;
    	$t_type = isset($_REQUEST['t_type']) ? intval($_REQUEST['t_type']) : 0;
    	//分类
    	$tscService = service('TaoShopCategory');
    	$categorys = $tscService->getAll();
    	$this->assign('categorys', $categorys);
    	$this->assign('cid', $cid);
    	
    	$params = array('cid' => $categorys[$cid]['cid'], 't_type'=>$t_type);
		$limit = array('begin'=>($page-1)*$pageLimit, 'offset'=>$pageLimit);
		$shopModel = D('TaoShop');
		$keys = array();
		$res = $shopModel->front($keys, $params, $limit);
		$this->assign('shops', $res['data']);
		$page_url = reUrl(MODULE_NAME."/".ACTION_NAME."?cid=$cid&p=[page]");
		$page_url = str_replace('%5bpage%5d', '[page]', $page_url);
		$p=new Page($page,
		$pageLimit,
		$res['count'],
		$page_url,
		5,
		5);
		$pagelink=$p->showStyle(3);
		$this->assign('pagelink', $pagelink);
		$nowtime = LocalTime::getInstance()->gmtime();
    	$this->assign('nowtime', $nowtime);
    	$this->assign('page_title', '淘宝优惠券 - ' . $this->_CFG['site_title'] . ' - ');
    	$this->assign('page_keywords', $this->_CFG['site_keywords']);
    	$this->assign('page_description', $this->_CFG['site_description']);
    	$this->display();
    }
    
    public function show()
    {
    	$c_id = intval($_REQUEST['id']);
		$c_id or die('id invalid.');
		$ccModel = D('TaoCoupon');
		$detail = $ccModel->info($c_id);
		if(! $detail || $detail['is_active'] == 0){
			$this->error('该优惠券已下架，请选择商家其他的优惠券');
		}
		$fetch_limit_conf = CouponCodeConf::fetch_limit_conf();
		$ccmService = service('TaoShop');
		$shop = $ccmService->info($detail['s_id']);
		$localTimeObj = LocalTime::getInstance();
		$today = $localTimeObj->local_strtotime(date('Y-m-d 23:59:59'));
		if($detail['expiry_type'] == 1){
			$detail['expiry_timestamp'] = $detail['expiry'] + $this->_CFG['timezone']*3600;
			if(($detail['expiry'] - $today) == 0){
				$detail['expiry'] = 1;
			}else{
				$detail['expiry'] = ($detail['expiry'] - $today) > 0 ? ceil(($detail['expiry'] - $today)/(3600*24)) : 0;
			}
		}
		$title = '';
		if($detail['title']){
			$title .= $detail['title'];
		}else{
			$title .= $shop['title'];
			if($detail['c_type'] ==1){
				$title .= '满'.$detail['money_max'].'减'.$detail['money_reduce'].'元优惠券';
			}else{
				$title .= $detail['money_amount'] . '元代金券';
			}
		}
		if($detail['data']['seo_title']){
			$page_title = $detail['data']['seo_title'];
		}else{
			$page_title = '淘宝优惠券 - ' . $title;
		}
		$detail['title'] = $title;
		import('@.Com.Util.Ubb');
		$detail['data']['directions'] = Ubb::ubb2html($detail['data']['directions']);
		$detail['data']['fetch_limit'] = $fetch_limit_conf[$detail['data']['fetch_limit']];
		$this->assign('detail', $detail);
		$this->assign('shop', $shop);
		$nowtime = LocalTime::getInstance()->gmtime();
    	$this->assign('nowtime', $nowtime);
		//其他优惠券
		$keys = array('c_id','s_title', 'title','c_type','money_max','money_reduce','money_amount','expiry_type','expiry');
    	$others = $ccModel->all4mall($detail['s_id'], $keys, $c_id);
    	$this->assign('others', $others);
    	$this->assign('page_title', $page_title . ' - ');
		$this->assign('page_keywords', $detail['data']['seo_keywords'] ? $detail['data']['seo_keywords'] : $this->_CFG['site_keywords']);
		$this->assign('page_description', $detail['data']['seo_desc'] ? $detail['data']['seo_desc'] : $this->_CFG['site_description']);
		$this->display();
    }
    
    public function shop()
    {
    	$id = intval($_REQUEST['id']);
    	$ccmService = service('TaoShop');
		$shop = $ccmService->info($id);
		$shop or die('id invalid.');
    	$this->assign('shop', $shop);
    	$nowtime = LocalTime::getInstance()->gmtime();
    	$this->assign('nowtime', $nowtime);
    	//店铺的优惠券
    	$tcModel = D('TaoCoupon');
    	$keys = array('c_id','s_title', 'title','c_type','money_max','money_reduce','money_amount','expiry_type','expiry');
    	$coupons = $tcModel->all4mall($id, $keys);
    	$this->assign('coupons', $coupons);
    	if($shop['seo_title']){
    		$page_title = $shop['seo_title'];
    	}else{
    		$page_title = '淘宝优惠券 - ' . $shop['title'] . '优惠券/淘宝代金券/代金券';
    	}
    	$this->assign('page_title', $page_title . ' - ');
		$this->assign('page_keywords', $shop['seo_keywords'] ? $shop['seo_keywords'] : $this->_CFG['site_keywords']);
		$this->assign('page_description', $shop['seo_desc'] ? $shop['seo_desc'] : $this->_CFG['site_description']);
		$this->display();
    }
    
    public function out()
    {
    	$id = intval($_REQUEST['id']);
    	$ccmService = service('TaoShop');
		$shop = $ccmService->info($id);
		$shop or die('id invalid.');
		if ($shop['shop_click_url']){
			redirect($shop['shop_click_url']);
		}else{
			redirect('http://shop'.$shop['sid'].'.taobao.com');
		}
    }
    
    public function out_item()
    {
    	$item_id = intval($_REQUEST['item_id']);
		if ($_REQUEST['click_url']){
			redirect($_REQUEST['click_url']);
		}else{
			redirect($_REQUEST['item_url']);
		}
    }
    
    /**
     * 领取优惠券
     *
     */
	public function pull()
	{
		if($this->isAjax()){
			$this->_check_login();
			$c_id = intval($_REQUEST['c_id']);
			$c_id or die('id invalid.');
			$ccModel = D('TaoCoupon');
			$detail = $ccModel->info($c_id);
			$detail or die('id invalid.');
			if($detail['is_active'] == 0){
				$this->ajaxReturn('', '该优惠券已下架，请选择商家其他的优惠券', 0);
			}
			$localTimeObj = LocalTime::getInstance();
			$nowtime = $localTimeObj->gmtime();
			$today = $localTimeObj->local_strtotime(date('Y-m-d 23:59:59'));
			//是否过期
			if($detail['expiry_type'] == 1 && $detail['expiry'] < $today){
				$this->ajaxReturn('', '该优惠券已过期，请选择商家其他的优惠券', 0);
			}
			//剩余数量
			/*
			if($detail['fetched_amount'] >= $detail['amount']){
				$this->ajaxReturn('', '该优惠券已发放完毕，请选择其他的优惠券', 0);
			}
			*/
			//领取限制
			$ccrModel = M('TaoCouponRecords');
			//每个账户一张
			if($detail['data']['fetch_limit'] == 101){
				if($ccrModel->field('id')->where("c_id='$c_id' AND user_id='".$this->_user['user_id']."'")->find()){
					$this->ajaxReturn('', '您已领取过该优惠券，请选择其他的优惠券', 0);
				}
			}
			//每个账户每天一张
			else if($detail['data']['fetch_limit'] == 102){
				$b_time = $localTimeObj->local_strtotime(date('Y-m-d 00:00:00'));
				$e_time = $today;
				$where = "c_id='$c_id' AND user_id='".$this->_user['user_id']."'";
				$where .= " AND fetch_time>='$b_time' AND fetch_time<='$e_time'";
				if($ccrModel->field('id')->where($where)->find()){
					$this->ajaxReturn('', '您今天已领取过该优惠券，请选择其他的优惠券', 0);
				}
			}
			//付费情况
			if($detail['price_type'] != 1){
				$userModel = D('User');
				$user = $userModel->info($this->_user['user_id'], array('money', 'credit'));
				//付费
				if($detail['price_type'] == 2){
					if($user['money'] < $detail['price']){
						$this->ajaxReturn('', '您的账户金额不足，请先到帐号中心充值再来购买。请点击<a href="'.reUrl('Payment/pay').'" target="_blank">在线充值</a>', 0);
					}
					$spend = Consume::spend($this->_user['user_id'], $detail['price'], Consume::TYPE_MONEY);
				}
				//积分
				else if($detail['price_type'] == 3){
					if($user['credit'] < $detail['price']){
						$this->ajaxReturn('', '您的账户积分不足，请选择其他的优惠券', 0);
					}
					$spend = Consume::spend($this->_user['user_id'], $detail['price'], Consume::TYPE_CREDIT);
				}
				if($spend !== 1){
					$this->ajaxReturn('', '支付失败，请重试', 0);
				}
			}
			$data = array(
						'c_id'		=>	$c_id,
						'user_id'	=>	$this->_user['user_id'],
						'nick'		=>	$this->_user['nick'],
						'fetch_time'=>	$nowtime
						);
			$result = $ccrModel->add($data);
			if($result){
				$ccmService = service('TaoShop');
				$shop = $ccmService->info($detail['s_id']);
				//更新领取数量
				$ccModel->update($c_id, array('fetched_amount'=>($detail['fetched_amount']+1)));
				//更新昨日、今日、本周、本月等领取数量
				$yestoday = $nowtime-24*3600;
				$ccdModel = D('TaoCouponData');
				$r = $ccdModel->info($c_id, array('yesterdayfetched', 'dayfetched', 'weekfetched', 'monthfetched', 'updatetime'));
				$yesterdayfetched = (date('Ymd', $r['updatetime']) == date('Ymd', $yestoday)) ? $r['dayfetched'] : $r['yesterdayfetched'];
				$dayfetched = (date('Ymd', $r['updatetime']) == date('Ymd', $nowtime)) ? ($r['dayfetched'] + 1) : 1;
				$weekfetched = (date('YW', $r['updatetime']) == date('YW', $nowtime)) ? ($r['weekfetched'] + 1) : 1;
				$monthfetched = (date('Ym', $r['updatetime']) == date('Ym', $nowtime)) ? ($r['monthfetched'] + 1) : 1;
				$data = array(
							'yesterdayfetched'		=>	$yesterdayfetched,
							'dayfetched'			=>	$dayfetched,
							'weekfetched'			=>	$weekfetched,
							'monthfetched'			=>	$monthfetched,
							'updatetime'			=>	$nowtime
							);
				$ccdModel->update($c_id, $data);
				//发表一条微博
				if(($this->_CFG['sina_wb_open'] && $_SESSION['sina']['token']['access_token'])
					|| ($this->_CFG['qq_open'] && $_SESSION['qq']["access_token"])){
					$title = '';
					if($detail['title']){
						$title .= $detail['title'];
					}else{
						$title .= $detail['s_title'];
						if($detail['c_type'] ==1){
							$title .= '满'.$detail['money_max'].'减'.$detail['money_reduce'].'元优惠券';
						}else{
							$title .= $detail['money_amount'] . '元代金券';
						}
					}
					$url = 'http://' . $_SERVER['HTTP_HOST'] . reUrl('Tao/show?id='.$c_id);
					$pic_path = tao_shop_logo($shop['pic_path']);
					$text = '我刚刚在#'.$this->_CFG['site_name'].'#领取了一张【'.$title.'】，数量有限，抢完为止，一般人我不告诉！'.$url;
					if($this->_CFG['sina_wb_open'] && $_SESSION['sina']['token']['access_token']){
						include_once( DOC_ROOT_PATH . 'Addons/plugins/login/sina.class.php' );
						$sina = new sina();
						$sina->upload($text, $pic_path);
					}else if ($this->_CFG['qq_open'] && $_SESSION['qq']["access_token"]){
						include_once( DOC_ROOT_PATH . 'Addons/plugins/login/qq.class.php' );
						$qq = new qq();
						//发送微博
						$qq->add_t($text);
						//发送空间分享
						$title = '我刚刚在'.$this->_CFG['site_name'].'领取了一张【'.$title.'】，数量有限，抢完为止，一般人我不告诉！';
						$site = $_SERVER['HTTP_HOST'];
						$qq->add_share($title, $url, $site, $pic_path);
					}
				}
				if($detail['data']['fetch_link']){
					$coupon_url = $detail['data']['fetch_link'];
				}else{
					$coupon_url = 'http://ecrm.taobao.com/shopbonusapply/buyer_apply.htm?activity_id='.$detail['data']['activity_id'].'&seller_id='.$detail['data']['seller_id'];
				}
				$data = array(
							'shop_click_url'   =>	$shop['shop_click_url'],
							'coupon_url'	   =>	$coupon_url
							);
				$this->ajaxReturn($data, '领取成功', 1);
			}else{
				$this->ajaxReturn('', '领取失败', 0);
			}
		}
	}
}
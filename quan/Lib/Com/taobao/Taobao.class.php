<?php
class Taobao
{
	private static $_instance = null;
	private $_topClient = null;
	private $_taobao_nick = '';
	private $_taobao_pid = 0;
	
	private function __construct()
	{
		ini_set('include_path', ini_get('include_path').PATH_SEPARATOR. LIB_PATH."Com".DIRECTORY_SEPARATOR."taobao".DIRECTORY_SEPARATOR.'standard'.DIRECTORY_SEPARATOR);
		require_once('RequestCheckUtil.php');
		require_once('TopClient.php');
		$cfg = load_config();
		$this->_topClient = new TopClient;
		$this->_topClient->appkey = $cfg['taobao_appkey0'];
		$this->_topClient->secretKey = $cfg['taobao_appsecret0'];
		$this->_taobao_nick = $cfg['taobao_nick'];
		$pid = explode('_', $cfg['taobao_ali_pid']);
		$this->_taobao_pid = $pid[1];
	}
	
	public static function getInstance()
	{
		return new self();
	}
	
	/**
	 * 获取前台显示的店铺类目
	 *
	 * @return array
	 */
	public function ShopCatesList()
	{
		require_once('Request/ShopcatsListGetRequest.php');
		$req = new ShopcatsListGetRequest;
		$req->setFields("cid,parent_cid,name,is_parent");
		$resp = $this->_topClient->execute($req);
		return is_array($resp) && isset($resp['shop_cats']['shop_cat']) ? $resp['shop_cats']['shop_cat'] : array();
	}
	
	/**
	 * 淘宝客店铺搜索
	 *
	 */
	public function getTaobaokeShops(array $params)
	{
		require_once('Request/TaobaokeShopsGetRequest.php');
		$req = new TaobaokeShopsGetRequest;
		$req->setFields("user_id, click_url, shop_title, commission_rate, seller_credit, shop_type, auction_count, total_auction");
		$req->setCid($params['cid']);
		$req->setKeyword($params['kw']);
		$req->setPageNo($params['page']);
		$req->setPageSize(40);
		$req->setNick($this->_taobao_nick);
		$req->setPid($this->_taobao_pid);
		return $resp = $this->_topClient->execute($req);
	}
	
	/**
	 * 根据卖家昵称获取店铺信息
	 *
	 * @param string $nick
	 * @return array
	 */
	public function getShopByNick($nick)
	{
		require_once('Request/ShopGetRequest.php');
		$req = new ShopGetRequest;
		$req->setFields("sid,cid,title,nick,desc,bulletin,pic_path,created,modified,shop_score");
		$req->setNick($nick);
		return $resp = $this->_topClient->execute($req);
	}
	
	/**
	 * 获取指定类目或指定关键字淘宝客商品列表
	 *
	 * @param array $params
	 */
	public function getTaobaokeItems(array $params)
	{
		require_once('Request/TaobaokeItemsGetRequest.php');
		$req = new TaobaokeItemsGetRequest;
		$req->setFields("num_iid,title,nick,pic_url,price,click_url,commission,commission_rate,commission_num,commission_volume,shop_click_url,seller_credit_score,item_location,volume");
		$req->setNick($this->_taobao_nick);
		$req->setPid($this->_taobao_pid);
		$req->setKeyword($params['kw']);
		$req->setCid($params['cid']);
		$req->setPageNo($params['page']);
		$req->setPageSize(40);
		$resp = $this->_topClient->execute($req);
		$result = array('items' => array(), 'total' => 0);
		if(is_array($resp) && isset($resp['taobaoke_items']['taobaoke_item'])){
			$result['items'] = $resp['taobaoke_items']['taobaoke_item'];
			$result['total'] = $resp['total_results'];
		}
		return $result;
	}
	
	/**
	 * 获取商品类目
	 *
	 * @param int $parent_id
	 * @return array
	 */
	public function getItemCates($parent_id)
	{
		require_once('Request/ItemcatsGetRequest.php');
		$req = new ItemcatsGetRequest;
		$req->setFields("cid,parent_cid,name,is_parent");
		$req->setParentCid($parent_id);
		$resp = $this->_topClient->execute($req);
		return is_array($resp) && isset($resp['item_cats']['item_cat']) ? $resp['item_cats']['item_cat'] : array();
	}
	
	/**
	 * 获取用户信息
	 *
	 * @param unknown_type $nick
	 * @param unknown_type $sessionKey
	 * @return unknown
	 */
	public function getUserInfo($nick=null, $sessionKey=null)
	{
		if($nick === null && $sessionKey === null){
			return null;
		}
		require_once('Request/UserGetRequest.php');
		$req = new UserGetRequest;
		$req->setFields("uid,seller_credit,type,location,created");
		$req->setNick($nick);
		$resp = $this->_topClient->execute($req, $sessionKey);
		return is_array($resp) && isset($resp['user']) ? $resp['user'] : array();
	}
	
	/**
	 * 获取店铺信息
	 *
	 * @param unknown_type $nick
	 */
	public function getShopInfo($nick)
	{
		require_once('Request/ShopGetRequest.php');
		$req = new ShopGetRequest;
		$req->setFields('sid,cid,title,nick,desc,bulletin,pic_path,created,modified,shop_score');
		$req->setNick($nick);
		$resp = $this->_topClient->execute($req);
		return is_array($resp) && isset($resp['shop']) ? $resp['shop'] : array();
	}
	
	public function convertShops($ids)
	{
		require_once('Request/TaobaokeShopsConvertRequest.php');
		$req = new TaobaokeShopsConvertRequest;
		$req->setFields("user_id,shop_title,click_url,commission_rate");
		$req->setSids($ids);
		$req->setNick($this->_taobao_nick);
		$req->setPid($this->_taobao_pid);
		$resp = $this->_topClient->execute($req);
		return is_array($resp) && isset($resp['taobaoke_shops']['taobaoke_shop']) ? $resp['taobaoke_shops']['taobaoke_shop'] : array();
	}
	
	/**
	 * 添加店铺
	 *
	 * @param string $nick
	 * @return array
	 */
	public function createShopByNick($nick)
	{
		$tao_shop = $this->getShopInfo($nick);
		$taoke_shop = $this->convertShops($tao_shop['sid']);
		$tao_user = $this->getUserInfo($nick);
		$return = array();
		$return['nick'] = $nick;
		$return['uid'] = $tao_user['uid'];
		$return['cid'] = $tao_shop['cid'];
		$return['consumer_protection'] = $tao_user['consumer_protection'] ? 1 : 0;
		$return['level'] = $tao_user['seller_credit']['level'];
		$return['score'] = $tao_user['seller_credit']['score'];
		$return['total_num'] = $tao_user['seller_credit']['total_num'];
		$return['good_num'] = $tao_user['seller_credit']['good_num'];
		$return['city'] = $tao_user['location']['city'];
		$return['state'] = $tao_user['location']['state'];
		$return['sid'] = $tao_shop['sid'];
		$return['title'] = $tao_shop['title'];
		$return['pic_path'] = $tao_shop['pic_path'];
		$return['desc'] = $tao_shop['desc'];
		$return['bulletin'] = $tao_shop['bulletin'];
		$return['created'] = LocalTime::getInstance()->local_strtotime($tao_shop['created']);
		$return['shop_click_url'] = $taoke_shop['click_url'];
		$return['type'] = $tao_user['type'];
		$return['item_score'] = $tao_shop['shop_score']['item_score'];
		$return['service_score'] = $tao_shop['shop_score']['service_score'];
		$return['delivery_score'] = $tao_shop['shop_score']['delivery_score'];
		$return['commission_rate'] = $taoke_shop['commission_rate'];
		$return['good'] = ($return['good_num']/$return['total_num'])*100;
		$return['addtime'] = LocalTime::getInstance()->gmtime();
		return $return;
	}
	
	public function getActivity()
	{
		require_once('Request/PromotionActivityGetRequest.php');
		$req = new PromotionActivityGetRequest;
		//$req->setActivityId(585448);
		$resp = $this->_topClient->execute($req);
		return is_array($resp) && isset($resp['activitys']) ? $resp['activitys'] : array();
	}
}
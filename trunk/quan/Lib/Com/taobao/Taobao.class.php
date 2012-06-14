<?php
class Taobao
{
	private static $_instance = null;
	private $_topClient = null;
	
	private function __construct()
	{
		ini_set('include_path', ini_get('include_path').PATH_SEPARATOR. LIB_PATH."Com".DIRECTORY_SEPARATOR."taobao".DIRECTORY_SEPARATOR.'standard'.DIRECTORY_SEPARATOR);
		require_once('RequestCheckUtil.php');
		require_once('TopClient.php');
		$cfg = load_config();
		$this->_topClient = new TopClient;
		$this->_topClient->appkey = $cfg['taobao_appkey0'];
		$this->_topClient->secretKey = $cfg['taobao_appsecret0'];
	}
	
	public static function getInstance()
	{
		return new self();
	}
	
	public function ShopCatesList()
	{
		require_once('Request/ShopcatsListGetRequest.php');
		$req = new ShopcatsListGetRequest;
		$req->setFields("cid,parent_cid,name,is_parent");
		$resp = $this->_topClient->execute($req);
		return is_array($resp) && isset($resp['shop_cats']['shop_cat']) ? $resp['shop_cats']['shop_cat'] : array();
	}
}
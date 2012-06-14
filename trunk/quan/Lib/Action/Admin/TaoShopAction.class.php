<?php
/**
 * TaoShopAction.class.php
 * @copyright			copyright(c) 2011 - 2012 极好居
 * @author				anqiu xiao
 * @contact				QQ:89249294 E-mail:jihaoju@qq.com
 * @date				Thu Jun 14 17:00:05 CST 2012
 */
class TaoShopAction extends AdminCommonAction
{
	public function add()
	{
		header("Content-Type:text/html;charset=UTF-8");
		ini_set('include_path', ini_get('include_path').PATH_SEPARATOR. LIB_PATH."Com".DIRECTORY_SEPARATOR."taobao".DIRECTORY_SEPARATOR.'standard'.DIRECTORY_SEPARATOR);
		require_once('RequestCheckUtil.php');
		require_once('TopClient.php');
		require_once('Request/ShopGetRequest.php');
		$c = new TopClient;
		$c->appkey = $this->_CFG['taobao_appkey0'];
		$c->secretKey = $this->_CFG['taobao_appsecret0'];
		$req = new ShopGetRequest;
		$req->setFields("sid,cid,title,nick,desc,bulletin,pic_path,created,modified,shop_score");
		$req->setNick("百谷香旗舰店");
		$resp = $c->execute($req);
		print_r($resp);
	}
}
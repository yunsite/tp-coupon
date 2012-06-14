<?php
/**
 * TaoShopCategoryAction.class.php
 * @copyright			copyright(c) 2011 - 2012 极好居
 * @author				anqiu xiao
 * @contact				QQ:89249294 E-mail:jihaoju@qq.com
 * @date				Thu Jun 14 17:15:46 CST 2012
 */
class TaoShopCategoryAction extends AdminCommonAction
{
	public function add()
	{
		header("Content-Type:text/html;charset=UTF-8");
		ini_set('include_path', ini_get('include_path').PATH_SEPARATOR. LIB_PATH."Com".DIRECTORY_SEPARATOR."taobao".DIRECTORY_SEPARATOR.'standard'.DIRECTORY_SEPARATOR);
		require_once('RequestCheckUtil.php');
		require_once('TopClient.php');
		require_once('Request/ShopcatsListGetRequest.php');
		$c = new TopClient;
		$c->appkey = $this->_CFG['taobao_appkey0'];
		$c->secretKey = $this->_CFG['taobao_appsecret0'];
		$req = new ShopcatsListGetRequest;
		$req->setFields("cid,parent_cid,name,is_parent");
		$resp = $c->execute($req);
		print_r($resp);
	}
}
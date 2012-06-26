<?php
/**
 * taobao.class.php
 * @copyright			copyright(c) 2011 - 2012 极好居
 * @author				anqiu xiao
 * @contact				QQ:89249294 E-mail:jihaoju@qq.com
 * @date				Wed Jun 20 14:21:46 CST 2012
 */
include_once( 'taobao/tbauth.class.php' );
class tb
{
	public function getUrl()
	{
		$url = "https://oauth.taobao.com/authorize?response_type=code&client_id=".TAOBAO_LOGIN_APPKEY."&redirect_uri=".urlencode(TAOBAO_LOGIN_CALLBACK).'&scope=promotion';
		return $url;
	}
	
	public function getOffUrl()
	{
		$url = 'https://oauth.taobao.com/logoff?client_id='.TAOBAO_LOGIN_APPKEY.'&redirect_uri=http://'.$_SERVER['HTTP_HOST'].__ROOT__.'/';
		return $url;
	}
	
	public function initToken($code)
	{
		$o = tbauth::getInstance(TAOBAO_LOGIN_APPSECRET, TAOBAO_LOGIN_APPKEY, TAOBAO_LOGIN_CALLBACK);
		$resp = $o->getToken($code);
		if($resp !== null){
			$_SESSION['taobao']["access_token"] = $resp['access_token'];
			$_SESSION['taobao']["expiry"] 		= $resp['expires_in'];
			return $_SESSION['taobao']["access_token"];
		}
		return null;
	}
	
	/**
	 * 淘宝的OPENID即为淘宝用户昵称
	 *
	 * @return string
	 */
	function get_openid()
	{
		if(! isset($_SESSION['taobao']["openid"]) || ! $_SESSION['taobao']["openid"]){
			$tu = $this->userInfo();
			$_SESSION['taobao']["openid"] = $tu['nick'];
		}
		return $_SESSION['taobao']["openid"];
	}

	//用户资料
	function userInfo()
	{
		import('@.Com.taobao.Taobao');
		$taobaoObj = Taobao::getInstance(TAOBAO_LOGIN_APPKEY, TAOBAO_LOGIN_APPSECRET);
		$user = $taobaoObj->getUserInfo(null, $_SESSION['taobao']["access_token"]);
		return $user;
	}
}
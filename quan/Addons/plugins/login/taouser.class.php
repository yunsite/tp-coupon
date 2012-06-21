<?php
/**
 * taouser.class.php
 * @copyright			copyright(c) 2011 - 2012 极好居
 * @author				anqiu xiao
 * @contact				QQ:89249294 E-mail:jihaoju@qq.com
 * @date				Thu Jun 21 10:04:47 CST 2012
 */
class taouser
{
	public function getUrl()
	{
		$url = 'https://oauth.taobao.com/authorize?response_type=user&client_id='.TAOBAO_LOGIN_APPKEY.'&redirect_uri='.urlencode(TAOBAO_LOGIN_CALLBACK);
		return $url;
	}
	
	/**
	 * 淘宝的OPENID即为淘宝用户昵称
	 *
	 * @return string
	 */
	function get_openid($req = null)
	{
		if($req !== null){
			$top_parameters = base64_decode($req['top_parameters']);
			$top_sign = base64_decode($req['top_sign']);
			//TODO:校验返回值是否合法
			/*
			if(md5($top_parameters.TAOBAO_LOGIN_APPSECRET) != $top_sign){
				return null;
			}
			*/
			parse_str($top_parameters);
			if(isset($nick)){				
				$_SESSION['taobao']["openid"] = $nick;
			}else{
				return null;
			}
		}
		return isset($_SESSION['taobao']["openid"]) ? $_SESSION['taobao']["openid"] : null;
	}
}
<?php
class tbauth_utils
{
	/*
	 * POST 请求
	 */
	public static function post($sUrl,$aPOSTParam){
		$oCurl = curl_init();
		if(stripos($sUrl,"https://")!==FALSE){
			curl_setopt($oCurl, CURLOPT_SSL_VERIFYPEER, FALSE);
			curl_setopt($oCurl, CURLOPT_SSL_VERIFYHOST, false);
		}
		$aPOST = array();
		foreach($aPOSTParam as $key=>$val){
			$aPOST[] = $key."=".urlencode($val);
		}
		curl_setopt($oCurl, CURLOPT_URL, $sUrl);
		curl_setopt($oCurl, CURLOPT_RETURNTRANSFER, 1 );
		curl_setopt($oCurl, CURLOPT_POST,true);
		curl_setopt($oCurl, CURLOPT_POSTFIELDS, join("&", $aPOST));
		$sContent = curl_exec($oCurl);
		$aStatus = curl_getinfo($oCurl);
		curl_close($oCurl);
		if(intval($aStatus["http_code"])==200){
			return $sContent;
		}else{
			return FALSE;
		}
	}

	public static function do_post($url, $data)
	{
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
		curl_setopt($ch, CURLOPT_POST, TRUE);
		curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
		curl_setopt($ch, CURLOPT_URL, $url);
		$ret = curl_exec($ch);

		curl_close($ch);
		return $ret;
	}

	public static function get_url_contents($url)
	{
		if (ini_get("allow_url_fopen") == "1")
		return file_get_contents($url);

		$ch = curl_init();
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
		curl_setopt($ch, CURLOPT_URL, $url);
		$result =  curl_exec($ch);
		curl_close($ch);

		return $result;
	}
	
	public static function parseJson($input)
	{
		if(!function_exists('json_decode'))
		{
			function json_decode($input)
			{
				$comment = false;
				$out = '$x=';
	 
				for ($i=0; $i<strlen($input); $i++)
				{
					if (!$comment)
					{
					if (($input[$i] == '{') || ($input[$i] == '['))       $out .= ' array(';
					else if (($input[$i] == '}') || ($input[$i] == ']'))   $out .= ')';
					else if ($input[$i] == ':')    $out .= '=>';
					else                         $out .= $input[$i];         
				}
				else $out .= $input[$i];
				if ($input[$i] == '"' && $input[($i-1)]!="\\")    $comment = !$comment;
				}
				eval($out . ';');
				return $x;
			}
		}
		return json_decode($input,1);	
	}
}

class tbauth
{
	private static $_instance = null;
	private $_appsecret;
	private $_appkey;
	private $_callback;
	private $_auth_url;
	private function __construct($appsecret, $appkey, $callback)
	{
		$this->_appsecret = $appsecret;
		$this->_appkey = $appkey;
		$this->_callback = $callback;
		$this->_auth_url = 'https://oauth.taobao.com/token';
	}
	
	public static function getInstance($appsecret, $appkey, $callback)
	{
		if(self::$_instance === null){
			self::$_instance = new self($appsecret, $appkey, $callback);
		}
		return self::$_instance;
	}
	
	public function getToken($code)
	{
		$data = array(
					'grant_type'	=>	'authorization_code',
					'code'			=>	$code,
					'redirect_uri'	=>	$this->_callback,
					'client_id'		=>	$this->_appkey,
					'client_secret'	=>	$this->_appsecret
					);
		$resp = tbauth_utils::post($this->_auth_url, $data);
		$result = tbauth_utils::parseJson($resp);
		if(is_array($result) && isset($result['access_token'])){
			return $result;
		}else{
			return null;
		}
	}
}
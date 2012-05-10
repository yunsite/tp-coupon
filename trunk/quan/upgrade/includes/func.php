<?php
//公共函数
function isPost()
{
	if(strtolower($_SERVER['REQUEST_METHOD']) == 'post'){
		return true;
	}
	return false;
}

function isGet()
{
	if(strtolower($_SERVER['REQUEST_METHOD']) == 'get'){
		return true;
	}
	return false;
}

if(!function_exists('file_put_contents')) {
	function file_put_contents($filename, $s) {
		$fp = @fopen($filename, 'w');
		@fwrite($fp, $s);
		@fclose($fp);
		return TRUE;
	}
}

function showjsmessage($message) {
	echo '<script type="text/javascript">showmessage(\''.addslashes($message).' \');</script>'."\r\n";
	flush();
	ob_flush();
}
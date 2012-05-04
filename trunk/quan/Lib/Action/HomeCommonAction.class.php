<?php
/**
 * HomeCommonAction.class.php
 * @copyright			copyright(c) 2011 - 2012 极好居
 * @author				anqiu xiao
 * @contact				QQ:89249294 E-mail:jihaoju@qq.com
 * @date				Mon Apr 16 14:49:49 CST 2012
 */
class HomeCommonAction extends CommonAction
{
	protected $_user = null;
	protected function _initialize()
	{
		parent::_initialize();
		//禁止通过URL访问的操作
    	if(in_array(MODULE_NAME.'.'.strtolower(ACTION_NAME), C('APP_ACTION_DENY_LIST'))){
    		die('Hacking attempt.');
    	}
    	//初始化用户信息
    	$this->_init_user();
    	//验证登陆
    	$this->_check_login();
    	if(! $this->isAjax() && ! $this->isPost()){
    		//热门搜索
    		$mall_hot20 = array();
    		$mallService = service('CouponCodeMall');
    		$mall_hot20 = $mallService->hottest('week', 20);
    		$this->assign('mall_hot20', $mall_hot20);
    	}
	}
	
	private function _init_user()
	{
		$this->_user = array('user_id' => 0,'nick' => '','avatar'=>'','credit'=>0,'money'=>0);
		$auth = cookie('auth');
		if($auth){
			$auth = authcode($auth, 'DECODE', C('AUTH'));
			$arr = explode("\t", $auth);
			if(count($arr) == 2){
				$avatar = cookie('avatar');
				if(empty($avatar)){
					$ucService = service('Uc');
					$avatar = $ucService->get_avatar($arr[0]);
				}
				$userModel = D('User');
				$user = $userModel->info($arr[0], array('money', 'credit'));
				$this->_user = array(
							  'user_id' => $arr[0],
							  'nick' 	=> $arr[1],
							  'avatar'	=> $avatar,
							  'credit'	=> $user['credit'],
							  'money'	=> $user['money']
							  );
			}
		}
    	if(! $this->isAjax() && ! $this->isPost()){
    		$this->assign('user', $this->_user);
    	}
	}
	
	protected function _check_login()
	{
		if(in_array(MODULE_NAME, C('LOGIN_MODULES'))
		 && ! in_array(MODULE_NAME . '.' . strtolower(ACTION_NAME), C('NOT_LOGIN_ACTIONS'))
		 && ! $this->_user['user_id']){
			if($this->isAjax()){
				$this->ajaxReturn('', '未登录', 0);
			}else{
				redirect(reUrl('User/login'));
			}
		}
	}
}
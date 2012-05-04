<?php
/**
 * ArticleAction.class.php
 * @copyright			copyright(c) 2011 - 2012 极好居
 * @author				anqiu xiao
 * @contact				QQ:89249294 E-mail:jihaoju@qq.com
 * @date				Thu Apr 26 23:42:11 CST 2012
 */
class ArticleAction extends HomeCommonAction
{
    /**
     * 友情链接
     * 
     */
    public function links()
    {
		//友情链接
		$friendlinks = array();
		$flService = service('FriendLinks');
		$res = $flService->getAll();
		$friendlinks = $res['all'];
		$this->assign('friendlinks', $friendlinks);
    	$this->assign('page_title', '友情链接 - ');
    	$this->assign('page_keywords', $this->_CFG['site_keywords']);
    	$this->assign('page_description', $this->_CFG['site_description']);
    	$this->display();
    }
}
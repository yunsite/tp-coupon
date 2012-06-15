<?php
/**
 * TaoAction.class.php
 * @copyright			copyright(c) 2011 - 2012 极好居
 * @author				anqiu xiao
 * @contact				QQ:89249294 E-mail:jihaoju@qq.com
 * @date				Fri Jun 15 14:40:24 CST 2012
 */
class TaoAction extends HomeCommonAction
{
    /**
     * 默认操作
     * 
     */
    public function index()
    {
    	
    	$this->assign('page_title', ' - ' . $this->_CFG['site_title']);
    	$this->assign('page_keywords', $this->_CFG['site_keywords']);
    	$this->assign('page_description', $this->_CFG['site_description']);
    	$this->display();
    }
}
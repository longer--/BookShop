<?php
class EmptyAction extends Action {
    public function index() {  
        $this->_empty();
    }

    public function _empty() {  
        header('HTTP/1.1 404 Not Found');
        
		$seos = array(array(
			'title'       => '404',
			'description' => 'Page not found',
		));
		R('Public/setSeos', $seos);
        
        $this->display('Public:404');  
    }  
}  

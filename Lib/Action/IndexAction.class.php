<?php
class IndexAction extends Action {
    public function index() {
		/** 配置SEO */
		$title = array('title', 'Home');
		R('Public/setSeo', $title);

        R('Public/regCrtPage');

		/** 输出页面 */
		$this->show();
    }
}

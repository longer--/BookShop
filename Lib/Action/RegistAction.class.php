<?php
/**
 *  注册动作控制器
 *
 *  @author   Santino Wu
 *  @date     2013-12-27
 *  @package  Action
 */
class RegistAction extends Action {
    public function index() {
        /** 配置SEO */
        $seos = array(array(
            'title' => 'Regist',
            'description' => 'Create your account',
        ));
        R('Public/setSeos', $seos);

        R('Public/regCrtPage');

        $this->show();
    }
}

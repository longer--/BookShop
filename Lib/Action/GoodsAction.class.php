<?php
/**
 *  商品控制器
 *
 *  @author   Santino Wu
 *  @date     2014-01-24
 *  @package  Action
 */
class GoodsAction extends Action {

    public function index() {
        /** 配置SEO */
        $seos = array(
            'title' => 'Goods',
            'description' => 'Search goods what you want',
        );
        R('Public/setSeos', array($seos));
        
        /** 注册当前路径 */
        R('Public/regCrtPage');

        $this->display();
    }
}

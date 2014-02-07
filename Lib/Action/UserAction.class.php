<?php
/**
 *  用户动作控制器
 *
 *  @author   Santino Wu
 *  @date     2014-01-28
 *  @package  Action
 */
class UserAction extends Action {

    /**
     *  构造方法
     */
    public function __construct() {
        parent::__construct();
    }

    /**
     *  入口
     *
     *  @author  Santino Wu
     *  @date    2014-01-28
     *  @return  void
     */
    public function index() {
        if (!$this->logined)
            header('Location: /User/signin');

        $this->display();
    }

    /**
     *  登陆
     *
     *  @author  Santino Wu
     *  @date    2014-01-28
     *  @return  void
     */
    public function login() {
        $this->display();
    }

    /**
     *  检查用户合法性
     *
     *  @author  Santino Wu
     *  @date    2014-01-28
     *  @return  bool
     */
    public function checkValid() {
        return false;
    }

    /**
     *  检查是否Token登陆
     *
     *  @author  Santino Wu
     *  @date    2014-01-28
     *  @return  bool
     */
    private function checkToken() {
        return false;
    }

    /**
     *  检查邮箱是否唯一
     */
    private function checkEmailUnique() {
        return false;
    }

    /**
     *  检查用户名是否唯一
     */
    private function checkUserNameUnique() {
        return false;
    }

    /**
     *  登出
     *
     *  @author  Santino Wu
     *  @date    2014-01-28
     *  @return  void
     */
    public function logout() {

    }

    /**
     *  注册
     */
    public function regist() {
        return bool;
    }
}

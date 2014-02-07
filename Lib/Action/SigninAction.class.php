<?php
/**
 *  用户登陆控制器
 *
 *  @author   Santino Wu
 *  @package  Action
 */
class SigninAction extends Action {

    /**
     *  JSON 返回格式
     *  ---- ---- ---- ----
     *  {
     *    status: 操作状态,  --  boolean
     *    info:   提示信息,  --  string
     *    data:   返回数据,  --  mixed
     *  }
     */

    public function index() {
        /** 配置SEO */
        $seos = array(array(
            'title' => 'Sign-In',
            'description' => 'Sign in as your account',
        ));
        R('Public/setSeos', $seos);

        R('Public/regCrtPage');

        if (session('is_signin')) {
            R('Public/showMessage', array('You have already sign-ined'));

            return;
        }

        $this->show();
    }

    /**
     *  登陆
     *
     *  @author  Santino Wu
     *  @access  public
     *  @param   none
     *  @return  void
     */
    public function doSignin() {
        if (!$this->isAjax()) die('Access denied');

        /** 初始化 */
        $userModel = M('user');
        $jsonData  = array();
        $username  = '';

        if (session('is_signin') !== null) {
            $jsonData = array(
                'status' => false,
                'info'   => 'You have already sign-ined',
            );
            $this->ajaxReturn($jsonData, 'JSON');
        }

        /**
         *  验证令牌
         *  暂时关闭验证表单令牌
         *  由于ThinkPHP3.2不支持AJAX验证表单,
         *  转而采取客户端防止重复提交的方案。
         */
        /**if (!$userModel->autoCheckToken($_POST)) {
            $this->ajaxReturn(false, 'Wrong token', 0);

            return;
        }*/

        /** 验证用户名和密码 */
        $username  = $userModel->where("(username = '%s' OR email = '%s') AND password = '%s'",
                                        array($_POST['username'], $_POST['username'], md5($_POST['password'])))
                                ->getField('username');

        if (empty($username)) {
            $jsonData = array(
                'status' => false,
                'info'   => 'Fail to sign-in, please check your name or e-mail and password!',
            );
            $this->ajaxReturn($jsonData, 'JSON');
        } else {
            $this->autoSignin($username);

            $jsonData = array(
                'status' => true,
                'info'   => 'Sign-in successful',
                'retUrl' => session('last_page'),
            );
            $this->ajaxReturn($jsonData, 'JSON');
        }
    }

    public function autoSignin($username) {
        session('is_signin', true);
        session('username',  R('Security/encrypt', array($username)));
    }

    /**
     *  登出
     *
     *  @author  Santino Wu
     *  @date    2013-12-29
     *  @param   none
     *  @return  void
     */
    public function doSignout() {
        /** 配置SEO */
        $seos = array(array(
            'title' => 'Sign-Out',
            'description' => 'Sign out',
        ));
        R('Public/setSeos', $seos);

        R('Public/regCrtPage');

        if (session('is_signin')) {
            session('is_signin', null);
            session('username',  null);

            R('Public/showMessage', array(array(
                'title'   => 'Tip',
                'content' => 'Sign out successful, you have already sign-outed'
            )));

            return;
        } else {
            R('Public/showMessage', array(array(
                'title'   => 'Tip',
                'content' => 'Fail to sign out, you did not sign in'
            )));

            return;
        }
    }
}

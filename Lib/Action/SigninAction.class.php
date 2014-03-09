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
     *  禁用JavaScript时能够正常使用
     *  @author  Santino Wu
     *  @access  public
     *  @param   none
     *  @return  void
     */
    public function doSignin() {
        if (session('is_signin') !== null) {
            if ($this->isAjax()) {
                $jsonData = array(
                    'status' => false,
                    'info'   => 'You have already sign-ined',
                );
                $this->ajaxReturn($jsonData, 'JSON');
            } else {
                R('Public/showMessage', array('You have already sign-ined'));
            }
        }

        /** 初始化 */
        $userModel = M('user');
        $jsonData  = array();
        $username  = '';

        /**
         *  验证令牌
         *  暂时关闭验证表单令牌
         *  由于ThinkPHP3.2不支持AJAX验证表单,
         *  转而采取客户端防止重复提交的方案。
         */
        if (!$this->isAjax() && !$userModel->autoCheckToken($_POST)) {
            R('Public/showMessage', array('Wrong token, please refresh previous page', true));
        }

        /** 验证用户名和密码 */
        $username  = $userModel->where("(username = '%s' OR email = '%s') AND password = '%s'",
                                        array($_POST['username'], $_POST['username'], md5($_POST['password'])))
                                ->getField('username');

        if (empty($username)) {
            if ($this->isAjax()) {
                $jsonData = array(
                    'status' => false,
                    'info'   => 'Fail to sign-in, please check your name or e-mail and password!',
                );
                $this->ajaxReturn($jsonData, 'JSON');
            } else {
                R('Public/showMessage', array('Fail to sign-in, please check your name or e-mail and password!', true));
            }
        } else {
            $this->autoSignin($username);

            if ($this->isAjax()) {
                $jsonData = array(
                    'status' => true,
                    'info'   => 'Signed in successful',
                    'retUrl' => session('last_page'),
                );
                $this->ajaxReturn($jsonData, 'JSON');
            } else {
                R('Public/showMessage', array('Signed in successful'));
            }
        }
    }

    private function autoSignin($username) {
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

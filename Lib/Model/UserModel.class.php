<?php
/**
 *  用户表模型类
 *  @ahthor   Santino Wu
 *  @date     2013-12-22
 *  @package  Model
 */

class UserModel extends Model {
    /** 定义自动验证 */
    protected $_validate = array(
        /** 用户名 */
        array('username', 'regex', 'Username is not matched', Model::MUST_VALIDATE, '/^\w(6,32)$/'),
        /** 密码 */
        array('password', 'regex', 'Password is not matched', Model::MUST_VALIDATE, '/^[\w(6,32)$/'),
		/** 电子邮箱 */
		array('email', 'email', 'E-mail is not matched', Model::MUST_VALIDATE);
    );
    /** 定义自动完成 */
    protected $_auto = array(
        
    );
    /** 定义表字段 */
    protected $fields = array(
        'id', 'username', 'password', 'email', 'verified', 'rec_date',
        /** 主键 */
        '_pk' => 'id',
        /** 主键自增 */
        '_autoinc' => true,
    );
}

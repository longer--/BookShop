<?php
/**
 *  网络安全控制器
 *
 *  @todo     是否将这个安全类作为一个基类使用，然后拓展？
 *            就目前的项目而言，一个安全类足以满足需求。
 *  @author   Santino Wu
 *  @date     2014-01-18
 *  @package  Action
 */
class SecurityAction extends Action {
    /** @var $_encryption_key string 加密密钥 */
    private $_encryption_key = null;

    /**
     *  构造函数
     *  初始化
     *  @author  Santino Wu
     *  @date    2014-01-18
     *  @access  public
     *  @param   none
     *  @return  void
     */
    public function __construct() {
        parent::__construct();

        $this->_initConfigs();
    }

    /**
     *  初始化配置
     *
     *  @author  Santino Wu
     *  @date    2014-01-18
     *  @access  private
     *  @param   none
     *  @return  void
     */
    private function _initConfigs() {
        $this->_encryption_key = C('SECURITY.ENCRYPTION_KEY');
    }
    
    /**
     * 加密数据
     *
     * @param   $message  string  待加密数据
     * @return  mixed             加密失败时返回false，否则返回已加密数据
     */
    public function encrypt($message)
    {
        if (!is_string($message) || empty($message)) return false;

        $message = trim($message);
        $iv = substr(md5(sha1($this->_encryption_key)), 0, mcrypt_get_iv_size(MCRYPT_CAST_256,MCRYPT_MODE_CFB));
        return base64_encode(mcrypt_cfb(MCRYPT_CAST_256, $this->_encryption_key, $message, MCRYPT_ENCRYPT, $iv));
    }
    
    /**
     * 解密数据
     *
     * @param   $message  string  已加密数据
     * @return  mixed             解密失败时返回false，否则返回已解密数据
     */
    public function decrypt($message)
    {
        if (!is_string($message) || empty($message)) return false;

        $message = base64_decode(trim($message));
        $iv = substr(md5(sha1($this->_encryption_key)), 0, mcrypt_get_iv_size(MCRYPT_CAST_256,MCRYPT_MODE_OFB));
        return mcrypt_cfb(MCRYPT_CAST_256, $this->_encryption_key, $message, MCRYPT_DECRYPT, $iv);
    }
}

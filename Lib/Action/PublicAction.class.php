<?php
defined('BOOK_SHOP_PROJECT') or exit();

/**
 *  Public控制器
 *  包含对外接口
 *  @author   Santino Wu
 *  @date     2013-12-15
 *  @package  Action
 */
class PublicAction extends Action {
    /**
     *  @var $_seoSettingsAllowed  存放SEO配置映射列表
     */
    protected $_seoSettingsAllowed = array(
        'projectName' => 'SEO.DEFAULT_PROJECT_NAME',
        'htmlLang'    => 'SEO.DEFAULT_HTML_LANG',
        'title'       => 'SEO.DEFAULT_TITLE',
        'charset'     => 'SEO.DEFAULT_CHARSET',
        'keywords'    => 'SEO.DEFAULT_KEYWORDS',
        'description' => 'SEO.DEFAULT_DESCRIPTION',
    );
    /**
     *  @var $_messageConfigs 自定义消息配置
     */
    protected $_messageConfigs = array(
        'title'    => 'Warning',
        'interval' => 5,
    );

    /**
     *  构造函数
     *
     *  @author  Santion Wu
     *  @date    2014-01-18
     *  @access  public
     *  @param   none
     *  @reutrn  void
     */
    public function __construct() {
        parent::__construct();

        /** 初始化SEO */
        $this->getSeo();
    }
    
    /**
     *  获取默认SEO的方法
     * 
     *  @author  Santino Wu
     *  @date    2013-12-18
     *  @access  public
     *  @param   none
     *  @return  void
     */
    public function getSeo() {
        foreach ($this->_seoSettingsAllowed as $key => $val) $this->$key = C($val);
    }

    /**
     *  配置SEO的方法
     *  多个配置
     *  ---- ---- ---- ----
     *  格式
     *  array(
     *      [key] => [val]
     *  )
     *  ---- ---- ---- ----
     *  @author  Santion Wu
     *  @param   $settings   array
     *  @return  void
     */
    public function setSeos(array $settings) {
        foreach ($settings as $key => $val) $this->setSeo($key, $val);
    }

    /**
     *  配置SEO的方法
     *
     *  @todo    keywords中关键字应该使用逗号(,)分割
     *  @author  Santino Wu
     *  @date    2013-12-18
     *  @param   $key        配置键
     *  @param   $val        配置值
     *  @return  void
     */
    public function setSeo($key, $val) {
        if (!in_array($key, array_keys($this->_seoSettingsAllowed))) return;

        $this->$key = $key === 'title' ? $val . ' | ' . $this->$key : $val;
    }

    /**
     *  获取错误页面
     *  定制错误页面
     *  @author  Santino Wu
     *  @date    2013-12-21
     *  @param   $e    array  ThinkPHP异常
     *  @return  void
     *  @todo    解决$this->show([模版])输出无效的问题
     */
    /**public function getErrorPage(array $e) {
        
    }*/

    /**
     *  注册当前页面
     *  主要用于返回上一页页面
     *  @author  Santino Wu
     *  @date    2013-12-27
     *  @param   none
     *  @return  void
     */
    public function regCrtPage($isAction = false) {
        $crtPage = session('current_page');
        if ($isAction) {
            if ($crtPage !== __ACTION__) {
                session('last_page', $crtPage);
                session('current_page', __URL__);
            }
        } else {
            if ($crtPage !== __URL__) {
                session('last_page', $crtPage);
                session('current_page', __URL__);
            }
        }
    }

    /**
     *  定制错误页面
     *
     *  @author  Santino Wu
     *  @date    2014-01-20
     *  @param   $message     ixed     消息
     *  @param   $is_refresh  boolean  是否刷新上一页页面（用于刷新表单TOKEN）
     *  @param   $is_ajax     boolean  是否为ajax显示
     *  @return  void
     */
    public function showMessage($message, $is_refresh = false, $ajax = false) {
        extract($message);

        if ($ajax || IS_AJAX) {
            $jsonData = array(
                'status'   => $status   ? true      : false,
                'title'    => $title    ? $title    : $this->_messageConfigs['title'],
                'info'     => $content  ? $content  : '',
                'interval' => $interval ? $interval : $this->_messageConfigs['interlval'],
                'retUrl'   => session('last_page') ? session('last_page') : '/',
            );
            $this->ajaxReturn($jsonData, 'JSON');
        }

        /** 初始化消息 */
        $msg = array(
            'status'  => $status ? $status : 1,
            'title'   => $this->_messageConfigs['title'],
            'content' => '',
            'interval' => $this->_messageConfigs['interval'],
            'lastPage' => session('last_page') ? session('last_page') : '/',
            'crtPage' => session('current_page') ? session('current_page') : '/',
            'refresh' => $is_refresh,
        );

        if (is_array($message)) {
            !empty($title)   && $msg['title']   = $title;
            !empty($content) && $msg['content'] = $content;
        } elseif (is_string($message)) {
            !empty($message) && $msg['content'] = $message;
        } else {
            throw new ThinkException('Incomplete Message');
        }

        $this->message = $msg;

        /** 禁止静态缓存 */
        //C('HTML_CACHE_ON', false);

        $this->display('Public:show_message');
    }

    /**
     *  jQuery.load()方法与服务器接口
     *
     *  @author  Santino Wu
     *  @date    2014-01-28
     *  @access  public
     *  @param   array       $data
     *  @return  string
     *  ---- ---- ---- ----
     *  通过传递过来的参数指定要执行的方法和方法的参数
     *  array(
     *      class:      className,      - string, required
     *      method:     methodName,     - string, required
     *      params:     paramList,      - array
     *      template:   templateName,   - string, required
     *  )
     */
    public function loadHtml($json, $tpl) {
        if (!$this->isAjax()) die('Access denied');

        $html = '';
        
        return $html;
    }
}

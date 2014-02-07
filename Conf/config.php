<?php
return array(
    /** REWRITE模式 */
    'URL_MODEL' => 2, 

    /** 数据库配置 */
    'DB_DSN' => 'mysql://santinocom:2709@localhost:3306/santinocom',
    'DB_PREFIX' => 'stc_',

    /** 表单验证 */
    'TOKEN_ON' => true,
    'TOKEN_NAME' => '__hash__',

    /** 加载拓展配置文件 */
    /** @todo 解决未能加载SEO配置的问题 */
    #'LOAD_EXT_CONFIG' => array(
    #    /** 加载SEO配置文件 */
    #    'SEO' => 'seo',
    #),*/

    /** 自定义SEO配置 */
    'SEO' => array(
        'DEFAULT_PROJECT_NAME' => 'Santino Wu\'s Book Shop',
        'DEFAULT_HTML_LANG'    => 'zh-CN',
        'DEFAULT_CHARSET'      => 'utf-8',
        'DEFAULT_TITLE'        => 'Santino Wu\'s Book Shop',
        'DEFAULT_KEYWORDS'     => 'santino wu book shop',
        'DEFAULT_DESCRIPTION'  => 'Santino Wu\'s Work',
    ),

    /** 定制错误页面 */
    'TMPL_EXCEPTION_FILE'=> APP_PATH . 'Tpl/Public/error.php',
    //'ERROR_PAGE' => APP_PATH . '/Public/error.html', // 定义错误跳转页面URL地址

    /** 自定义安全类配置 */
    'SECURITY' => array(
        /** 加密密钥 */
        'ENCRYPTION_KEY' => 'C1?2ds7!tj_s3*24',
    ),

    /** 自定义加载资源文件配置 */
    'LOAD_RESOURCE' => array(
        /** 资源文件目录，以逗号分割 */
        'FILE_PATH' => array(
            APP_PATH . 'Public/',
            APP_PATH . 'Public/js/',
            APP_PATH . 'Public/css/',
        ),
        'FILE_REG_EXP'   => '/^[\w|\-|\.]+$/i',
        'FILE_SEPARATOR' => '|',
        /**  缓存文件存储方式存储（File） */
        /** 
         *  存储路径为APP_PATH[项目目录]/PATH，
         *  如未指定存储路径则按系统默认缓存路径（APP_PATH/Runtime/Temp）储存
         */
        'CACHE_PATH'   => null,
        /** 过期时间（秒数）默认为1小时 */
        'CACHE_EXPIRE' => 1 * 60 * 60,
        //'CACHE_EXPIRE' => 5,
        /** 缓存文件队列长度，默认为20 */
        'CACHE_LENGTH' => 20,
    ),
);

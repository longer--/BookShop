<?php
/**
 *  资源控制器
 *  管理css文件和js文件，使用ThinkPHP默认缓存存储方式（File）
 *  @author   Santino Wu
 *  @date     2014-01-30
 *  @package  Action
 */
class ResourceAction extends Action {
    /**
     *  构造函数
     *  初始化
     *  @author  Santino Wu
     *  @date    2014-01-30
     *  @param   none
     *  @return  void
     */
    public function __construct() {
        parent::__construct();
    }

    /**
     *  加载资源文件
     *  加载、合并文件，确保加载的文件已压缩
     *  Notice:  一般情况下CSS使用minify进行压缩和合并，因为minify压缩JS总有不可避免的错误
     *  @author  Santino Wu
     *  @date    2014-01-30
     *  @param   $files      string
     *  @param   $type       string
     *  @return  void
     */
    private function loadRes($fileName, $type) {
        if (empty($fileName)) die('');

        /** 初始化 */
        $regExp  = null;
        $sep     = null;
        $pathes  = null;
        $path    = null;
        $suf     = null;
        $files   = null;
        $file    = null;
        $content = null;
        $c       = null;
        $cFile   = null;
        $cName   = null;
        $cPath   = null;
        $cExpire = null;
        $cLength = null;

        //$type    = strtolower($type);

        $sep    = C('LOAD_RESOURCE.FILE_SEPARATOR');
        $pathes = C('LOAD_RESOURCE.FILE_PATH');
        $regExp = C('LOAD_RESOURCE.FILE_REG_EXP');
        $files  = explode($sep, $fileName);
        if ($files === false) die('');

        /** 剔除非法文件名 */
        foreach ($files as $key => $val) {
            if (preg_match($regExp, $val, $matches) === 0) {
                unset($files[$key]);
            } else {
                $suf = strpos($val, ".{$type}") === false ? ".{$type}" : '';
                $files[$key] = $val . $suf;
            }
        }
        if (empty($files)) die('');

        /** 获取缓存文件名 */
        //sort($files) && $cName = md5(implode('', $files));
        $cFile = $files;
        sort($cFile) && $cName = implode('-', $cFile);
        if ($cName === null) die('');

        /** 读取缓存（如果缓存存在） */
        $cPath   = C('LOAD_RESOURCE.CACHE_PATH');
        $cExpire = C('LOAD_RESOURCE.CACHE_EXPIRE');
        $cLength = C('LOAD_RESOURCE.CACHE_LENGTH');
        S(array(
            'type'   => 'File',
            'temp'   => $cPath,
            'expire' => $cExpire,
            'length' => $cLength,
        ));
        $content = S($cName);
        if ($content !== false) die($content);

        /** 获取文件内容 */
        $content = '';
        $c = null;
        foreach ($pathes as $path) {
            foreach ($files as $val) {
                /** 判断文件是否存在 */
                $file = "{$path}{$val}";
                #if (!file_exists($file)) {
                #    $content .= "/** 404: file not found! ({$path}{$val}) */\n";
                #    continue;
                #}
                if (!file_exists($file)) continue;

                $c = file_get_contents($file);

                /** 压缩内容 */
                // 删除单行注释
                //$c = preg_replace("/\/\/.*/", '', $c);
                // 删除多行注释
                //$c = str_replace(array("\r\n", "\r", "\n"), '',$c);
                //$c = preg_replace("/\/\*\b(?:(?!\*\/).)*\b\*\//", '', $c);
                // 替换缩进符号
                //$c = preg_replace("/\t*(\ ){2,}/", ' ', $c);

                $content .= "{$c}\n";
            }
        }

        /** 将数据进行缓存 */
        if (!empty($content)) {
            $cDate = date('Y-m-d H:i:s');
            $eDate = date('Y-m-d H:i:s', time() + $cExpire);
            S($cName, "/**\n *  RESOURCE CACHE\n *  CREATION TIME: {$cDate}\n *  EXPIRATION TIME: {$eDate}\n */\n" . $content);
        }

        echo $content;
    }

    /**
     *  加载JS文件
     *
     *  @author  Santino Wu
     *  @date    2014-01-30
     *  @param   $files      string
     *  @return  void
     */
    public function loadJs($files) {
        header('Content-Type:Application/x-javascript;Charset=utf-8');
        $this->loadRes($files, 'js');
    }

    /**
     *  加载CSS文件
     *
     *  @author  Santino Wu
     *  @date    2014-01-30
     *  @param   $files      string
     *  @return  void
     */
    public function loadCss($files) {
        header('Content-Type:text/css;Charset=utf-8');
        $this->loadRes($files, 'css');
    }

    /**
     *  读取css文件
     *  将目标文件合并并压缩后输出
     *  @author  Santino Wu
     *  @date    2014-01-30
     *  @param   array       $files  文件列表
     *  @return  string
     *  ---- ---- ---- ----
     *  第一种解决方案：使用minify项目来实现。优点是该项目为开源项目，代码成熟；缺点是无法轻松地集成到ThinkPHP框架中。
     *  第二种解决方案：自己编写一个类来实现。优点是能够集成到ThinkPHP框架中，而且维护方便；缺点是与开源项目相比不成熟。
     *  ---- ---- ---- ----
     *  第二种解决方案的思路：
     *  1. 通过获取HTTP请求GET参数；
     *  2. 遍历获取文件内容（判断是否已有缓存内容，若有则读取缓存内容并直接跳到第5步骤）；
     *  3. 通过正则表达式对文件内容进行压缩；
     *  4. 对文件进行缓存（想对文件名进行排序然后获取该文件名串的哈希值，通过ThinkPHP内置的缓存框架缓存内容）；
     *  5. 返回HTTP响应。
     *  Notice：对文件进行压缩可以先以一种简单的算法来实现，后期再优化算法。
     */
}

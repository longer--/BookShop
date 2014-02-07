<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="<?php echo ($htmlLang); ?>">
<head>
<meta http-equiv="content-type" content="text/html;charset=<?php echo ($charset); ?>">
<title><?php echo ($title); ?></title>
<meta name="keywords" content="<?php echo ($keywords); ?>">
<meta name="description" content="<?php echo ($description); ?>">
<meta name="viewport" content="width=device-width,initial-scale=1,maximum-scale=1">
<link rel="shortcut icon" href="__PUBLIC__/img/favicon.ico" />
<link rel="apple-touch-icon" href="__PUBLIC__/img/touchicon.png" />
<!--<link rel="stylesheet" type="text/css" href="__PUBLIC__/css/bootstrap.min.css" />
<link rel="stylesheet" type="text/css" href="__PUBLIC__/css/main.css" />-->
<link rel="stylesheet" href="/Minify/?b=Public/css&f=bootstrap.min.css,main.css" />
<!--<script type="text/javascript" src="/Minify/?b=Public/js&f=jquery-1.10.2.min.js,bootstrap.min.js,navbar-scroll.js"></script>-->
<script type="text/javascript" src="/Resource/loadJs/files/jquery-1.10.2.min|bootstrap.min|stn.navbar-scroll.min"></script>


</head>
<body>
<!-- header -->
<div id="header" class="container">
    <!-- navbar -->
    <nav id="navbar" class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <!-- .navbar-header -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="/"><?php echo ($projectName); ?></a>
        </div><!-- /.navbar-header -->

        <!-- .navbar-collapse -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav">
                <li id="signin"><a href="">Something01</a></li>
                <li id="regist"><a href="">Something02</a></li>
            </ul>

            <ul class="nav navbar-nav navbar-right">
                <?php if(empty($_SESSION['username'])): ?><li>
                    <!-- .navbar-text -->
                    <p class="navbar-text navbar-right">
                        <a href="/Signin">Sign in</a> or <a href="/Regist">Create account</a>
                    </p><!-- /.navbar-text -->
                </li>
                <?php else: ?>
                <!-- .dropdown -->
                <li class="dropdown">
                    <!--<a href="#" class="dropdown-toggle" data-toggle="dropdown"><?php echo (session('username')); ?>&nbsp;<b class="caret"></b></a>-->
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><?php echo R('Security/decrypt', array(session('username')));?>&nbsp;<b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <li><a href="/User">Information</a></li>
                        <li><a href="/Order">My orders</a></li>
                        <li class="divider"></li>
                        <li><a href="/Signin/doSignout">Sign out</a></li>
                    </ul>
                </li><!-- /.dropdown --><?php endif; ?>
            </ul>
        </div><!-- /.navbar-collapse -->
    </nav>
    <!-- /navbar -->
</div>

<!-- /header -->

<!-- content -->
<div id="content" class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="page-header">
                <h3><?php echo ($message["title"]); ?></h3>
                <p><?php echo ($message["content"]); ?></p>
                <small>This page will <a id="lastpage" href="<?php echo ($message["lastPage"]); ?>">jump to the previous page</a> in <b id="interval" class="text-info"><?php echo ($message["interval"]); ?></b> seconds</small>
            </div>
        </div>
    </div>
</div>
<!-- /content -->

<!-- footer -->
<div class="container">
	<nav class="navbar navbar-default" role="navigation">
        <address class="text-right text-info">
            <strong>Santino</strong><br>
            Jieyang, Guangdong, China<br>
            <abbr title="Phone">P:</abbr> 1358021****
        </address>

        <address class="text-right text-info">
            <strong>Santino Wu</strong><br>
            <a href="mailto:wsq_bill@126.com?cc=249393953@qq.com&amp;subject=%20-%20Emai%20ro%20antinoCom%20-%20&amp;body=--%20Thi%20%20%20-mai%20ro%20antin%20u'%20ebsite%20--">wsq_bill@126.com</a>
        </address>
	</nav>
</div>

<!--[if lt IE 9]
<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
<script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
[endif]-->
<script type="text/javascript">
jQuery(function ($){
    /** Start scroll watching and change .navbar effect */
    $.fn.navBarScroll();
});
</script>

<!-- /footer -->

<script type="text/javascript">
/** jQuery插件版本：
;(function ($) {
    $.fn.extend({
        'jump': function (options) {
            options = $.extend({
                target:      'interval',
                lastpage:    'lastpage',
                interval:    6,
                speed:       1 * 1000,
                minInterval: 5,
            });
            
            var target = $('#' + options.target),
                href   = $('#' + options.lastpage).attr('href');
            if (!$.isNumeric(target.html()) || target.html() < options.min) target.html(options.interval);
            var timer  = setInterval(function () {
                var interval = target.html();
                if (interval > 0) {
                    target.html(--interval);
                } else {
                    clearInterval(timer);
                    location.href = href;
                }
            }, options.speed);

            return this;
        },
    });
})(jQuery);
(function ($) {
    $.fn.jump();
})(jQuery);*/
/** JS原生版本 */
(function () {
    var target = document.getElementById('interval'),
        href   = document.getElementById('lastpage').href;
    var timer  = setInterval(function () {
        var interval = target.innerHTML;
        if (interval > 0) {
            target.innerHTML = --interval;
        } else {
            clearInterval(timer);
            location.href = href;
        }
   }, 1000);
})();
</script>
</body>
</html>
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
            <h2 class="text-center text-success">Heading <small>What is supported to show?</small></h2>
        </div>
    </div>
    <div class="row">
        <div class="col-md-1"></div>
        <div class="col-md-10">
            <div id="carousel-example-generic" class="carousel slide" data-ride="carousel" data-interval="3000">
                <!-- Indicators -->
                <ol class="carousel-indicators">
                    <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
                    <li data-target="#carousel-example-generic" data-slide-to="1"></li>
                    <li data-target="#carousel-example-generic" data-slide-to="2"></li>
                </ol>

                <!-- Wrapper for slides -->
                <div class="carousel-inner">
                    <div class="item active">
                        <img src="__PUBLIC__/img/1.jpg" alt="Sunset">
                        
                        <!--<div class="carousel-caption">
                        <p>夕阳下的棒球运动员</p>
                        </div>-->
                    </div>
                    <div class="item">
                        <img src="__PUBLIC__/img/2.jpg" alt="Waver">
                        
                        <!--<div class="carousel-caption">
                        <p>挑战汹涌浪涛的舞者</p>
                        </div>-->
                    </div>
                    <div class="item">
                        <img src="__PUBLIC__/img/3.jpg" alt="Ridder">
                        
                        <!--<div class="carousel-caption">
                        <samll>酣畅淋漓地来一场别样马拉松</samll>
                        </div>-->
                    </div>
                </div>

                <!-- Controls -->
                <a class="left carousel-control" href="#carousel-example-generic" data-slide="prev">
                    <span class="glyphicon glyphicon-chevron-left"></span>
                </a>
                <a class="right carousel-control" href="#carousel-example-generic" data-slide="next">
                    <span class="glyphicon glyphicon-chevron-right"></span>
                </a>
            </div>
        </div>
        <div class="col-md-1"></div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <p>Bootstrap! Make development so easy!</p>
            <p>Bootstrap! Make development so easy!</p>
            <p>Bootstrap! Make development so easy!</p>
            <p>Bootstrap! Make development so easy!</p>
            <p>Bootstrap! Make development so easy!</p>
            <p>Bootstrap! Make development so easy!</p>
            <p>Bootstrap! Make development so easy!</p>
            <p>Bootstrap! Make development so easy!</p>
            <p>Bootstrap! Make development so easy!</p>
            <p>Bootstrap! Make development so easy!</p>
            <p>Bootstrap! Make development so easy!</p>
            <p>Bootstrap! Make development so easy!</p>
            <p>Bootstrap! Make development so easy!</p>
            <p>Bootstrap! Make development so easy!</p>
            <p>Bootstrap! Make development so easy!</p>
            <p>Bootstrap! Make development so easy!</p>
            <p>Bootstrap! Make development so easy!</p>
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

</body>
</html>
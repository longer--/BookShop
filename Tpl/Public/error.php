<!DOCTYPE html>
<html lang="zh-CN">
<head>
<meta charset="utf-8"/>
<title>Error</title>
<meta name="keywords" content="error"/>
<meta name="description" content="An error page"/>
<meta name="viewport" content="width=device-width"/>
<link rel="shortcut icon" href="/Public/img/favicon.ico"/>
<link rel="apple-touch-icon" href="/Public/img/touchicon.png"/>
<link rel="stylesheet" href="/Public/css/bootstrap.min.css" />
<link rel="stylesheet" href="/Public/css/main.css" />
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
            <a class="navbar-brand" href="/">Santino Wu</a>
        </div><!-- /.navbar-header -->

        <!-- .navbar-collapse -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <p class="navbar-text navbar-right">
                <a href="/Signin">Sign in</a> or <a href="/Regist">Create account</a>
            </p>
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
                <h1>Error occured!&nbsp;&nbsp;<small>There is something wrong with this page</small></h1>
            </div>
            <div>
                <dl class="dl-horizontal">
                    <dt>File</dt>
                    <dd><?php echo $e['file']; ?></dd>
                    <dt>line</dt>
                    <dd><?php echo $e['line']; ?></dd>
                    <dt>Message</dt>
                    <dd><?php echo $e['message']; ?></dd>
                    <dt>Trace</dt>
                    <dd>
                        <?php
                            if (is_array($e['trace'])) {
                                foreach ($e['trace'] as $key => $val) {
                                    echo "{$key}: {$val}";
                                }
                            } else {
                                echo $e['trace'];
                            }
                        ?>
                    </dd>
                </dl>
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
            <a href="mailto:wsq_bill@126.com?cc=249393953@qq.com&subject= - Email From SantinoCom - &body=-- This is an E-mail from santino wu's website --">wsq_bill@126.com</a>
        </address>
	</div>
</div>
<!-- /footer -->

<script type="text/javascript" src="/Public/js/jquery-1.10.2.min.js"></script>
<script type="text/javascript" src="/Public/js/bootstrap.min.js"></script>
<script type="text/javascript" src="/Public/js/navbar-scroll.js"></script>
<!--[if lt IE 9]-->
<!--<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
<script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>-->
<!--[endif]-->
<script type="text/javascript">
jQuery(function ($){
    /** Start scroll watching and change .navbar effect */
    $.fn.navBarScroll('#navbar');
});
</script>

</body>
</html>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>鸿山物联网小镇管理系统 安装</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- Le styles -->
    <link href="__PUBLIC__/install/css/bootstrap.css-v=2.3.2.css" rel="stylesheet">
    <link href="__PUBLIC__/install/css/bootstrap-responsive.css" rel="stylesheet">
    <link href="__PUBLIC__/install/css/install.css" rel="stylesheet">

    <script src="__PUBLIC__/install/js/jquery.min.js-v=2.1.4"></script>
    <script src="__PUBLIC__/install/js/bootstrap.js"></script>

    <link rel="shortcut icon" href="__PUBLIC__/img/favicon.ico"/>
</head>
<style>
    #step li a {
        color: #fff;
    }

    #step li {
        margin-top: 5px;
    }

    .active {
        margin-top: 5px;
    }

    .active a {
        background: #ED5565 !important;
        border-radius: 10%;
    }
</style>
<body data-spy="scroll" data-target=".bs-docs-sidebar">
<!-- Navbar
================================================== -->
<div class="navbar navbar-inverse navbar-fixed-top">
    <div class="navbar-inner" style="background:#1AB394;">
        <div class="container">
            <button type="button" class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="brand" target="_blank" href="#" style="color: #ffffff;">安装程序</a>
            <div class="nav-collapse collapse">
                <ul id="step" class="nav">
                    <block name="header"></block>
                </ul>
            </div>
        </div>
    </div>
</div>

<div class="jumbotron masthead">
    <div class="container">
        <block name="body"></block>
    </div>
</div>


<!-- Footer
================================================== -->
<footer class="footer navbar-fixed-bottom">
    <div class="container">
        <div>
            <block name="footer"></block>
        </div>
    </div>
</footer>
</body>
<script>
    function CloseWebPage() {
        if (navigator.userAgent.indexOf("MSIE") > 0) {
            if (navigator.userAgent.indexOf("MSIE 6.0") > 0) {
                window.opener = null;
                window.close();
            } else {
                window.open('', '_top');
                window.top.close();
            }
        }
        else if (navigator.userAgent.indexOf("Firefox") > 0) {
            window.location.href = 'about:blank ';
        } else {
            window.opener = null;
            window.open('', '_self', '');
            window.close();
        }
    }
</script>
</html>

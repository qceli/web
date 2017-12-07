<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>登录 - 物联网小镇</title>

    <!-- Bootstrap Core CSS -->
    <link href="__PUBLIC__/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="__PUBLIC__/vendor/metisMenu/metisMenu.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="__PUBLIC__/dist/css/sb-admin-2.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="__PUBLIC__/vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body>
<div class="container">
    <div class="row">
        <div class="col-md-4 col-md-offset-4">
            <div class="login-panel panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">管理员登录</h3>
                </div>
                <div class="panel-body">
                    <form role="form">
                        <fieldset>
                            <div class="form-group">
                                <input id="username" class="form-control" placeholder="用户名" name="username" type="email"
                                       autofocus>
                            </div>
                            <div class="form-group">
                                <input id="password" class="form-control" placeholder="密码" name="password"
                                       type="password" value="">
                            </div>
                            <div class="form-group">
                                <input id="verifyCode" class="form-control" placeholder="验证码" name="verifyCode"
                                       type="text">
                                <img src="{:U('Login/verifyCodeServlet')}"
                                     onclick="javascript:this.src='{:U('Login/verifyCodeServlet')}?id='+  Math.random();"
                                     alt="看不清,换一个,请点我"/>
                            </div>
                            <div class="checkbox">
                                <label>
                                    <input id="remember" name="remember" type="checkbox" value="">记住我
                                </label>
                            </div>
                            <!-- Change this to a button or input when using this as a form -->
                            <a id="button" type="button" href="#" class="btn btn-lg btn-success btn-block">登 录</a>
                        </fieldset>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- jQuery -->
<script src="__PUBLIC__/vendor/jquery/jquery.min.js"></script>

<!-- Bootstrap Core JavaScript -->
<script src="__PUBLIC__/vendor/bootstrap/js/bootstrap.min.js"></script>

<!-- Metis Menu Plugin JavaScript -->
<script src="__PUBLIC__/vendor/metisMenu/metisMenu.min.js"></script>

<!-- Custom Theme JavaScript -->
<script src="__PUBLIC__/dist/js/sb-admin-2.js"></script>
<script type="text/javascript">
    $(document).ready(function () {
        $("#button").on('click', function () {
            $.post("{:U('Login/loginValidate')}",
                {
                    username: $("#username").val(),
                    password: $("#password").val(),
                    verifyCode: $("#verifyCode").val(),
                    remember: $("#remember").val()
                },
                function (res) {
                    if (res === 'OK') {
                        location.href = "{:U('Index/index')}";
                    } else {
                        alert(res);
                    }
                });
        });
    });
</script>
</body>

</html>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="__PUBLIC__/activity/reset.css">
    <link rel="stylesheet" href="__PUBLIC__/activity/show.css">
    <title>无锡鸿山物联网小镇</title>
</head>

<body>
<div class="all">
    <p class="jieshao">无锡鸿山物联网小镇微信公众号</p>
    <img class="erweima" src="__PUBLIC__/activity/erweima_08.png" alt="">
    <div class="butt">
        <div class="center">
            <div><img src="__PUBLIC__/activity/power.png" alt=""> <span>我要点亮</span></div>
        </div>
    </div>
    <p class="foot">—— 无锡鸿山物联网小镇 ——</p>
</div>

<script src="__PUBLIC__/activity/lib/jquery.js"></script>
<script type="text/javascript">
    $(document).ready(function () {
        $(".center").on("click", function () {
            $(".center img").attr("src", "__PUBLIC__/activity/power1.png");
            $(this).css({"box-shadow": "0 0 18px white", "color": "red"});
            setTimeout(function () {
                window.location.href = "{:U('LightActivity/index')}";
            }, 400);
        });
    });
</script>
</body>
</html>
<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1,maximum-scale=1,user-scalable=no"/>
    <title>智慧停车</title>


    <link rel="stylesheet" type="text/css" href="/Public/css/wdpark.css">
</head>
<body>
    <div class="bg-img">
        <div class="park-title">剩余车位</div>
        <div class="park" bindtap="voidPark">
            <div class="parkSearch-img"><image src="https://api.smalltown.wshoto.com/Public/images/microprogram/P.png"></image></div>
            <div class="void-num" onclick="voidPark()">当前剩余车位  <?php echo ($data['data']['freeParkingSpace']); ?>，点击查看</div>
        </div>
        <div class="surplusPark-img" onclick="mineCar()">
            <img src="https://api.smalltown.wshoto.com/Public/images/microprogram/surplus-park.png" />
        </div>
    </div>

</body>
<script src="http://cdn.static.runoob.com/libs/jquery/1.10.2/jquery.min.js"></script>
<script>
    $(".park-area div").click(function() {
        var id = $(this).data("id");
        console.log(id)
        $(this).siblings().removeClass("active");
        $(this).addClass("active");
        $("#" + id).siblings().css("display", "none");
        $("#" + id).css("display", "block");
    })

    function mineCar() {
        $("body").append('<div id="prompt"><div class="prompt-background"></div>' +
            '<div class="prompt-content">' +
            '<div>' + '敬请期待' + '</div>' +
            ' <div onclick="closePrompt()">我知道了</div>' +
            ' </div></div>');
    }

    function voidPark() {
        location.href = "voidpark.html";
    }

    function closePrompt() {
        $("#prompt").remove();
    }
</script>
</html>
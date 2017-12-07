<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=800, initial-scale=0.5, minimum-scale=0.5, maximum-scale=2.0, user-scalable=yes"/>
    <title>鸿山物联网小镇中心区</title>
    <link rel="stylesheet" type="text/css" href="__PUBLIC__/css/map.css">
    <style>
        html, body {
            width: 100%;
            height: 100%;
            padding: 0;
            margin: 0;
        }

        .img-wrap {
            position: absolute;
            width: 169%;
        }

        .position {
            position: absolute;
            width: 40px;
            height: 40px;
        }

        #position8 {
            left: 118%;
            top: 73%;
        }

        #position9 {
            left: 125%;
            top: 45%;
        }

        #position10 {
            left: 111%;
            top: 54%;
        }

        /*#position11 {*/
        /*left: 68%;*/
        /*top: 87%;*/
        /*}*/
        /*#position12 {*/
        /*left: 59%;*/
        /*top: 65%;*/
        /*}*/
        #mb_con {
            position: absolute;
            width: 100px;
            background: red;
            left: 51%;
            top: 50%;
            -webkit-transform: translate(-50%, -50%);
            -moz-transform: translate(-50%, -50%);
            -ms-transform: translate(-50%, -50%);
            -o-transform: translate(-50%, -50%);
            transform: translate(-50%, -50%);
        }
    </style>
</head>
<body>
<div style="width: 100%; height: 100%; overflow: scroll; position: relative;-webkit-overflow-scrolling: touch;">
    <div class="maplists">
        <div id="maplist1" onclick="arroundMap()">小镇周边配套</div>
        <div id="maplist2" class="active">小镇中心区</div>
    </div>
    <img class="img-wrap" src="__PUBLIC__/images/microprogram/maps-2.jpg"/>

    <!--<img class="position img-tap" id="position8" src="images/position.png" />-->
    <!--<img class="position img-tap" id="position9" src="images/position.png" />-->
    <!--<img class="position img-tap" id="position10" src="images/position.png" />-->
    <!--<img class="position" id="position11" src="images/position.png" />-->
    <!--<img class="position" id="position12" src="images/position.png" />-->
</div>

</body>
<script src="http://cdn.static.runoob.com/libs/jquery/1.10.2/jquery.min.js"></script>
<script src="__PUBLIC__/js/public.js"></script>
<script>
    function arroundMap() {
        location.href = "map.html";
    }

    $('#position8').click(function () {
        var msg = "项目占地385亩，建筑面积18万平米，总投资15亿元。建成后将成为世界最大的海洋公园之一。项目内包含九大海洋动物及其生态展区、八大演艺剧场以及各国演员与动物的花车巡游，是集动物展示与表演、各国演员演艺及游乐设备为一体的大型海洋公园。";
        $.MsgBox.Alert("无锡长乔海洋王国主题公园", msg);
    });
    $("#position9").bind("click", function () {
        var msg = "项目占地面积15亩，位于丽笙酒店西侧，以伯渎河为天然景观条件，临水视野得天独厚。以丽笙酒店整体性为基础，满足旅游度假住宿、商务会议、大型宴会、餐饮等需求，在建筑立面上与原有建筑相协调。充分体现出建筑的功能性、豪华性和专属性，满足客户的归属感，塑造具有吸引力的城市形象，并对周边产生强有力的带动作用。";
        $.MsgBox.Alert("丽笙酒店二期", msg);
    });

    $("#position10").bind("click", function () {
        var msg = "项目位于锡梅路以南、飞凤路以西，总占地108亩，总建筑面积约7万平米，总投资约7亿元。吴越水街的建筑以传统仿古建筑形式为主调，外观古朴典雅，内饰简约时尚。建成后将会成为一条集商业、美食、旅游配套、游憩、购物于一体的生态休闲景观带。";
        $.MsgBox.Alert("吴越水街", msg);
    });
</script>
</html>
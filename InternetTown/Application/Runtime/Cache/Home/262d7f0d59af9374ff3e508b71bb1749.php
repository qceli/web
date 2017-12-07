<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=800, initial-scale=0.5, minimum-scale=0.5, maximum-scale=2.0, user-scalable=yes"/>
    <title>鸿山物联网小镇周边配套</title>
    <link rel="stylesheet" type="text/css" href="/Public/css/map.css">
    <style>
        html, body{
            width: 100%;
            height: 100%;
            padding: 0;
            margin: 0;
        }
        .img-wrap {
            position: absolute;
            width: 240%;
        }
        .position {
            position: absolute;
            width: 40px;
            height: 40px;
        }
        #position1 {
            left: 195%;
            top: 66%;
        }
        #position2 {
            left: 173%;
            top: 60%;
        }
        #position3 {
            left: 173%;
            top: 66%;
        }
        #position4 {
            left: 163%;
            top: 52%;
        }
        /*#position5 {*/
            /*left: 68%;*/
            /*top: 87%;*/
        /*}*/
        #position6 {
            left: 141%;
            top: 40%;
        }
        #position7 {
            left: 162%;
            top: 66%;
        }
        #mb_con{
            position: absolute;
            width:100px;
            background: red;
            left: 51%;
            top: 50%;
            -webkit-transform: translate(-50%,-50%);
            -moz-transform: translate(-50%,-50%);
            -ms-transform: translate(-50%,-50%);
            -o-transform: translate(-50%,-50%);
            transform: translate(-50%,-50%);
        }
    </style>
</head>
<body>
<div style="width: 104%; height: 100%; overflow: scroll; position: relative;-webkit-overflow-scrolling: touch;">
    <div class="maplists">
        <div id="maplist1" class="active">小镇周边配套</div>
        <div id="maplist2" onclick="centerMap()">小镇中心区</div>
    </div>
    <img class="img-wrap" src="/Public/images/microprogram/map-1.jpg" />

    <img class="position" id="position1" src="/Public/images/microprogram/position.png" />
    <img class="position" id="position2" src="/Public/images/microprogram/position.png" />
    <img class="position" id="position3" src="/Public/images/microprogram/position.png" />
    <img class="position" id="position4" src="/Public/images/microprogram/position.png" />
    <img class="position" id="position6" src="/Public/images/microprogram/position.png" />
    <img class="position" id="position7" src="/Public/images/microprogram/position.png" />

</div>
</body>
<script src="http://cdn.static.runoob.com/libs/jquery/1.10.2/jquery.min.js"></script>
<script src="/Public/js/public.js"></script>
<script>

    function centerMap() {
        location.href = "map2.html";
    }

    $('#position1').click(function(){
        var msg = "梁鸿国家湿地公园占地3465亩。2009年8月正式对外营业；2011年10月晋级国家级湿地公园（首批全国共12家）；2015年被评为国家水利风景区。目前已建成湿地体验区、展示区、保育区、管理服务区、休闲区以及部分湿地农业区，一期展示面积为1333亩。";
        $.MsgBox.Alert("梁鸿国家湿地公园", msg);
    });
    $('#position2').click(function(){
        var msg = "中华赏石园占地300亩，投资4亿元，由中国观赏石协会与无锡高新区（新吴区）联手打造，于2011年10月开园，2013年10月被评为4A级景区。赏石园由赏石文化交流中心（石博馆）、赏石交易区、赏石园林三部分组成，展示来自国内外精品800余件，是国际观赏石集散中心和中国观赏石第一园林。";
        $.MsgBox.Alert("中华赏石园", msg);
    });
    $('#position3').click(function(){
        var msg = "项目占地4.5平方公里，2004年全国十大考古新发现、全国重点文物保护单位、国家“十一五”重点大遗址保护工程、国家级考古遗址公园、4A级景区。一期工程“两馆”（鸿山遗址博物馆、中国吴文化博物馆）于2008年10月建成开放。由遗址博物馆展示区、生态农业展示区、实地生态展示区、鸿山遗址本体保护展示区四部分组成。收藏2300件珍贵文物，馆藏精品如无锡市的市徽 玉飞凤、青瓷三足缶、盘蛇玲珑球等。";
        $.MsgBox.Alert("鸿山遗址博物馆", msg);
    });
    $('#position4').click(function(){
        var msg = "项目占地10万平方米，建筑面积3.8万平方米，于2012年9月开业。由卡尔森全球酒店集团输出国际五星品牌“Radisson Blu”并管理。酒店采用仿古园林式建筑，融合江南吴地文化元素，致力打造江南首席国际五星级园林式商务度假酒店。客房数量196间，宴会厅面积680平方米。";
        $.MsgBox.Alert("梁鸿湿地丽笙度假酒店", msg);
    });
    $('#position5').click(function(){
        var msg = "项目占地123亩，位于吴博园主入口地段，是由世界500强、日本排名第一的大和房屋开发建设的低密度高品质住宅产品。项目建筑面积8万平米，2012年底开工建设，2014年4月对外销售。大和将日本先进的智能社区理念同步引入，依托先进的物联网技术，将小区的安防、门禁、停车高度智能化，并与日本松下合作开发智能家居HEMS系统，实现智能家电的远程操控、统一管理以及家庭自动化。";
        $.MsgBox.Alert("吴月雅境", msg);
    });
    $('#position6').click(function(){
        var msg = "无锡新瑞医院是一所集医、教、研于一体的三级综合性医院，由无锡新吴区政府委托上海交通大学医学院附属瑞金医院进行管理。医院一期占地100亩，总投资约15亿元，核定床位600张，学科专业齐全，医院将植入物联网技术，打造成医疗物联网应用示范项目。";
        $.MsgBox.Alert("无锡新瑞医院（上海瑞金医院无锡分院）", msg);
    });
    $('#position7').click(function(){
        var msg = "项目占地139亩，由无锡奥体建设开发有限责任公司开发建设，拟建设27幢住宅、商业、会所及4000㎡幼儿园，建成后可容纳1050户居民入住。项目以人为本，通过多层次景观渗透，打造生态人居环境；建成高舒适度低能耗绿色科技住宅2.0版。";
        $.MsgBox.Alert("奥体紫兰苑", msg);
    });
    function placeList() {

    }
</script>
</html>
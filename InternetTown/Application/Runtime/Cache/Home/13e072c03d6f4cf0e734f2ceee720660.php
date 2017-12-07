<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1,maximum-scale=1,user-scalable=no"/>
    <title>智慧停车</title>

    <link rel="stylesheet" type="text/css" href="/Public/css/airmonitor.css">
</head>
<body>
    <div class="bg-img">
        <div class="location">无锡</div>
        <div class="wind">
            <div class="wind-img"><img src="https://api.smalltown.wshoto.com/Public/images/microprogram/wind.png" /></div>
            <div>风速/风向</div>
            <div class="position">
                <div>西</div>
                <div class="speed"><?php echo ($data['FS']); ?>米/秒</div>
            </div>
        </div>
        <div class="humidity">
            <div class="humidity-img"><img src="https://api.smalltown.wshoto.com/Public/images/microprogram/humidity.png" /></div>
            <div>湿度</div>
            <div class="humidity-num"><?php echo ($data['SD']); ?>%</div>
        </div>
        <div class="temperature">
            <div class="temperature-img">
                <div class="temperature-num"><?php echo ($data['WD']); ?></div>
                <div class="deg">℃</div>
            </div>
        </div>
        <div class="bottom">
            <div class="bottom-title">
                <span class="title-name">气压：</span>
                <span class="title-num"><?php echo ($data['YL']); ?></span>
            </div>
            <div class="bottom-line">
                <div class="weather-list">
                    <div class="list1">PM2.5</div>
                    <div class="list2"><?php echo ($data['KLW25']); ?></div>
                </div>
                <div class="weather-list">
                    <div class="list1">CO</div>
                    <div class="list2"><?php echo ($data['YYHT']); ?></div>
                </div>
                <div class="weather-list">
                    <div class="list1">O3</div>
                    <div class="list2"><?php echo ($data['CY']); ?></div>
                </div>
            </div>
            <div class="bottom-line">
                <div class="weather-list">
                    <div class="list1">PM10</div>
                    <div class="list2"><?php echo ($data['KLW10']); ?></div>
                </div>
                <div class="weather-list">
                    <div class="list1">SO2</div>
                    <div class="list2"><?php echo ($data['EYHL']); ?></div>
                </div>
                <div class="weather-list">
                    <div class="list1">NO2</div>
                    <div class="list2"><?php echo ($data['EYHD']); ?></div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
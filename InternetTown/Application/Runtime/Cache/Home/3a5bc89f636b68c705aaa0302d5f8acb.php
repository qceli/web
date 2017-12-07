<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width,initial-scale=1,minimum-scale=1,maximum-scale=1,user-scalable=no"/>
    <title>智慧停车</title>

    <link rel="stylesheet" type="text/css" href="/Public/css/voidpark.css">
</head>
<body>
<div class="bg-img">
    <div style="overflow-y:auto;height:100%;">
        <div class="top">
            <div>剩余车位总数：<span class="freeNum"><?php echo ($data['data']['freeParkingSpace']); ?></span></div>
            <div>以下显示为空车位编号</div>
        </div>
        <div class="park-nums">
            <div>
                <div class="park-area" bindtap="tabFun">
                    <div class="active" data-id="0">A区</div>
                    <div class="" data-id="1">B区</div>
                    <div class="" data-id="2">C区</div>
                    <div class="" data-id="3">D区</div>
                </div>
                <div>
                    <div class="area-nums" id="0">
                        <?php if(is_array($a_area)): foreach($a_area as $key=>$a): ?><div class="detail"><?php echo ($a['berthNo']); ?></div><?php endforeach; endif; ?>
                    </div>
                    <div class="area-nums" id="1" style="display:none">
                        <?php if(is_array($b_area)): foreach($b_area as $key=>$b): ?><div class="detail"><?php echo ($b['berthNo']); ?></div><?php endforeach; endif; ?>
                    </div>
                    <div class="area-nums" id="2" style="display:none">
                        <?php if(is_array($c_area)): foreach($c_area as $key=>$c): ?><div class="detail"><?php echo ($c['berthNo']); ?></div><?php endforeach; endif; ?>
                    </div>
                    <div class="area-nums" id="3" style="display:none">
                        <?php if(is_array($d_area)): foreach($d_area as $key=>$d): ?><div class="detail"><?php echo ($d['berthNo']); ?></div><?php endforeach; endif; ?>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>

</body>
<script src="http://cdn.static.runoob.com/libs/jquery/1.10.2/jquery.min.js"></script>
<script>
    $(".park-area div").click(function () {
        var id = $(this).data("id");
        $(this).siblings().removeClass("active");
        $(this).addClass("active");
        $("#" + id).siblings().css("display", "none");
        $("#" + id).css("display", "block");
    })

</script>

</html>
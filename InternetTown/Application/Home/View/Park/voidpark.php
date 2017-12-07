<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width,initial-scale=1,minimum-scale=1,maximum-scale=1,user-scalable=no"/>
    <title>智慧停车</title>

    <link rel="stylesheet" type="text/css" href="__PUBLIC__/css/voidpark.css">
</head>
<body>
<div class="bg-img">
    <div style="overflow-y:auto;height:100%;">
        <div class="top">
            <div>剩余车位总数：<span class="freeNum">{$data['data']['freeParkingSpace']}</span></div>
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
                        <foreach item="a" name="a_area">
                            <div class="detail">{$a['berthNo']}</div>
                        </foreach>
                    </div>
                    <div class="area-nums" id="1" style="display:none">
                        <foreach item="b" name="b_area">
                            <div class="detail">{$b['berthNo']}</div>
                        </foreach>
                    </div>
                    <div class="area-nums" id="2" style="display:none">
                        <foreach item="c" name="c_area">
                            <div class="detail">{$c['berthNo']}</div>
                        </foreach>
                    </div>
                    <div class="area-nums" id="3" style="display:none">
                        <foreach item="d" name="d_area">
                            <div class="detail">{$d['berthNo']}</div>
                        </foreach>
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
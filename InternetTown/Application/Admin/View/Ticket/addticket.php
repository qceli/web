<!DOCTYPE html>
<!doctype html>
<html lang="zh_CN">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title></title>
    <link href="__PUBLIC__/LigerUI/lib/ligerUI/skins/Aqua/css/ligerui-all.css" rel="stylesheet" type="text/css"/>
    <link href="__PUBLIC__/LigerUI/lib/ligerUI/skins/Gray/css/all.css" rel="stylesheet" type="text/css"/>
    <link href="__PUBLIC__/LigerUI/lib/ligerUI/skins/ligerui-icons.css" rel="stylesheet" type="text/css"/>
    <script src="__PUBLIC__/LigerUI/lib/jquery/jquery-1.9.0.min.js" type="text/javascript"></script>
    <script src="__PUBLIC__/LigerUI/lib/jquery.cookie.js" type="text/javascript"></script>
    <script src="__PUBLIC__/LigerUI/lib/ligerUI/js/ligerui.all.js" type="text/javascript"></script>
    <style>
        td {
            padding: 5px;
        }
    </style>
</head>
<body>
<div id="addticket">
    <table>
        <tbody>
        <tr>
            <td>
                <label for="billcode">发票代码</label>
            </td>
            <td>
                <div class="l-text" style="width: 200px;">
                    <input id="billcode" name="billcode" type="text" class="ui-textbox l-text-field"
                           ligeruiid="textbox1"/>
                </div>
            </td>
        </tr>
        <tr>
            <td>
                <label for="ticket_name">票名</label>
            </td>
            <td>
                <div class="l-text" style="width: 200px;">
                    <input id="ticket_name" name="ticket_name" type="text" class="ui-textbox l-text-field"
                           ligeruiid="textbox1"/>
                </div>
            </td>
        </tr>
        <tr>
            <td>
                <input type="hidden" id="ticket_pic" name="ticket_pic" value=""/>
                <label for="ticket_thumbnail">缩略图</label>
            </td>
            <td>
                <div style="width: 200px;">
                    <input id="ticket_thumbnail" type="file" ligeruiid="textbox1"
                           onchange="readFile(this)"/>
                </div>
            </td>
        </tr>
        <tr>
            <td>
                <label for="ticket_price">票价</label>
            </td>
            <td>
                <div class="l-text" style="width: 200px;">
                    <input id="ticket_price" name="ticket_price" type="text" class="ui-textbox l-text-field"
                           ligeruiid="textbox1"/>
                </div>
            </td>
        </tr>
        <tr>
            <td>
                <label for="warning">购票须知</label>
            </td>
            <td>
                <textarea id="warning" name="warning" class="ui-textarea" rows="10" cols="20"
                          style="width:400px;"></textarea>
            </td>
        </tr>
        <tr>
            <td>
                <label for="sight_info">景点特色</label>
            </td>
            <td>
                <textarea id="sight_info" name="sight_info" class="ui-textarea" rows="10" cols="20"
                          style="width:400px;"></textarea>
            </td>
        </tr>
        </tbody>
    </table>
</div>
<script type="text/javascript">
    function readFile(obj) {
        var file = obj.files[0];
        //判断类型是不是图片
        if (!/image\/\w+/.test(file.type)) {
            $.ligerDialog.warning("请确保文件为图像类型");
            return false;
        }
        var reader = new FileReader();
        reader.readAsDataURL(file);
        reader.onload = function (e) {
            $("#ticket_pic").val(this.result); //就是base64
        }
    }

    $(function () {
        $("#addticket").ligerForm();
    });
</script>
</body>
</html>
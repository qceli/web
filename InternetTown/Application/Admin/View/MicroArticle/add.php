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
    <!--    <script src="__PUBLIC__/LigerUI/lib/jquery/jquery-1.9.0.min.js" type="text/javascript"></script>-->
    <script type="text/javascript" src="__PUBLIC__/umeditor/third-party/jquery.min.js"></script>
    <script src="__PUBLIC__/LigerUI/lib/jquery.cookie.js" type="text/javascript"></script>
    <script src="__PUBLIC__/LigerUI/lib/ligerUI/js/ligerui.all.js" type="text/javascript"></script>
    <link href="__PUBLIC__/umeditor/themes/default/css/umeditor.css" rel="stylesheet" type="text/css"/>
    <script type="text/javascript" src="__PUBLIC__/umeditor/third-party/template.min.js"></script>
    <script type="text/javascript" charset="UTF-8" src="__PUBLIC__/umeditor/umeditor.config.js"></script>
    <script type="text/javascript" charset="UTF-8" src="__PUBLIC__/umeditor/umeditor.min.js"></script>
    <script type="text/javascript" src="__PUBLIC__/umeditor/lang/zh-cn/zh-cn.js"></script>
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
                <label for="title">微刊标题</label>
            </td>
            <td>
                <div class="l-text" style="width: 250px;">
                    <input id="title" name="title" type="text" width="250px" class="ui-textbox l-text-field"
                           ligeruiid="textbox1"/>
                </div>
            </td>
        </tr>
        <tr>
            <td>
                <label for="category">微刊分类</label>
            </td>
            <td>
                <select id="category" name="category" class="ui-textbox l-text" style="width: 220px;">
                    <foreach name="categorys" item="category">
                        <option value="{$category.id}">{$category.name}</option>
                    </foreach>
                </select>
            </td>
        </tr>
        <tr>
            <td>
                <label for="content">微刊内容</label>
            </td>
            <td>
                <textarea id="content" name="content" class="ui-textarea" rows="10" cols="20"
                          style="width:600px;height: 380px;"></textarea>
            </td>
        </tr>
        </tbody>
    </table>
</div>
<script type="text/javascript">
    $(function () {
        window.um = UM.getEditor('content');
        $("#addticket").ligerForm();
    });
</script>
</body>
</html>
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
<div id="ticket_info">
    <table>
        <tbody>
        <tr>
            <td>
                <h1>取票号:</h1>
            </td>
        </tr>
        <tr>
            <td>
                <h1 style="font-size: 50px;">{$ticket}</h1>
            </td>
        </tr>
        </tbody>
    </table>
</div>
<script type="text/javascript">
    $(function () {
        $("#ticket_info").ligerForm();
    });
</script>
</body>
</html>
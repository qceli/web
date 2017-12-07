<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<!doctype html>
<html lang="zh_CN">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title></title>
    <link href="/Public/LigerUI/lib/ligerUI/skins/Aqua/css/ligerui-all.css" rel="stylesheet" type="text/css"/>
    <link href="/Public/LigerUI/lib/ligerUI/skins/Gray/css/all.css" rel="stylesheet" type="text/css"/>
    <link href="/Public/LigerUI/lib/ligerUI/skins/ligerui-icons.css" rel="stylesheet" type="text/css"/>
    <script type="text/javascript" src="/Public/umeditor/third-party/jquery.min.js"></script>
    <script src="/Public/LigerUI/lib/jquery.cookie.js" type="text/javascript"></script>
    <script src="/Public/LigerUI/lib/ligerUI/js/ligerui.all.js" type="text/javascript"></script>

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
                <h2><?php echo ($art["title"]); ?></h2>
            </td>
        </tr>
        <tr>
            <td>
                <h4>作者：<?php echo ($art["author"]); ?>   <small>发布时间：<?php echo (date('Y-m-d H:i:s', $art["created_time"])); ?></small></h4>
            </td>
        </tr>
        <tr>
            <td>
                <p><?php echo (htmlspecialchars_decode($art["content"])); ?></p>
            </td>
        </tr>
        </tbody>
    </table>
</div>
<script type="text/javascript">
    $(function () {
        $("#addticket").ligerForm();
    });
</script>
</body>
</html>
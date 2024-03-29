<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
    <link href="__PUBLIC__/LigerUI/lib/ligerUI/skins/Aqua/css/ligerui-all.css" rel="stylesheet" type="text/css">
    <script src="__PUBLIC__/LigerUI/lib/jquery/jquery-1.9.0.min.js"></script>
    <script src="__PUBLIC__/LigerUI/lib/ligerUI/js/ligerui.all.js"></script>
    <style type="text/css">
        td {
            padding: 5px;
        }
    </style>
</head>
<body>
<div id="add_user_form">
    <table>
        <tbody>
        <tr>
            <td>
                <label for="group">用户组：</label>
            </td>
            <td>
                <select name="group" id="group">
                    <foreach name="admingroups" item="group">
                        <option value="{$group.id}">{$group.name}</option>
                    </foreach>
                </select>
            </td>
        </tr>
        <tr>
            <td>
                <label for="username">用户名：</label>
            </td>
            <td>
                <div class="l-text" style="width: 178px;">
                    <input id="username" name="username" type="text" class="ui-textbox l-text-field"
                           ligeruiid="textbox2" style="width: 174px;" validate="{required:true}"/>
                </div>
            </td>
        </tr>
        <tr>
            <td>
                <label for="password">密码：</label>
            </td>
            <td>
                <div class="l-text" style="width: 178px;">
                    <input id="password" name="password" type="password" class="ui-textbox l-text-field"
                           ligeruiid="password1" style="width: 174px;" validate="{required:true}"/>
                </div>
            </td>
        </tr>
        <tr>
            <td>
                <label for="repwd">确认密码：</label>
            </td>
            <td>
                <div class="l-text" style="width: 178px;">
                    <input id="repwd" name="repwd" type="password" class="ui-textbox l-text-field"
                           ligeruiid="password2" style="width: 174px;" validate="{required:true}"/>
                </div>
            </td>
        </tr>
        </tbody>
    </table>
</div>
<script type="text/javascript">
    $(function () {
        $("#add_user_form").ligerForm();
    });
</script>
</body>
</html>
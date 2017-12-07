<?php if (!defined('THINK_PATH')) exit();?><html>
<head>
    <title></title>
    <link href="/Public/LigerUI/lib/ligerUI/skins/Aqua/css/ligerui-all.css" rel="stylesheet" type="text/css"/>
    <script src="/Public/LigerUI/lib/jquery/jquery-1.9.0.min.js" type="text/javascript"></script>
    <script src="/Public/LigerUI/lib/ligerUI/js/ligerui.all.js" type="text/javascript"></script>
    <style type="text/css">
        td {
            padding: 5px;
        }
    </style>
</head>
<body>
<div id="addCategory">
    <table>
        <tbody>
        <tr>
            <td>
                <label for="parent_id">上层分类：</label>
            </td>
            <td>
                <select name="parent_id" id="parent_id">
                    <option value="0">一级菜单</option>
                    <?php if(is_array($categorys)): foreach($categorys as $key=>$category): ?><option value="<?php echo ($category["id"]); ?>"><?php echo ($category["name"]); ?></option><?php endforeach; endif; ?>
                </select>
            </td>
        </tr>
        <tr>
            <td>
                <label for="name">分类名称：</label>
            </td>
            <td>
                <div class="l-text" style="width: 260px;">
                    <input type="text" name="name" id="c_name" class="ui-textbox l-text-field" ligeruiid="textbox1"
                           width="260px;"/>
                </div>
            </td>
        </tr>
        </tbody>
    </table>
</div>
<script type="text/javascript">
    $(function () {
        $("#addCategory").ligerForm();
    });
</script>
</body>
</html>
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
<div id="">
    <table>
        <tbody>
        <tr>
            <td>
                <label for="parent_id">上层分类：</label>
            </td>
            <td>
                <input type="hidden" id="c_id" name="c_id" value="<?php echo ($cate["id"]); ?>"/>
                <select name="parent_id" id="parent_id">
                    <option value="0">一级菜单</option>
                    <?php if(is_array($categorys)): foreach($categorys as $key=>$category): if($category["id"] == $cate['parent_id']): ?><option value="<?php echo ($category["id"]); ?>" selected><?php echo ($category["name"]); ?></option>
                            <?php else: ?>
                            <option value="<?php echo ($category["id"]); ?>"><?php echo ($category["name"]); ?></option><?php endif; endforeach; endif; ?>
                </select>
            </td>
        </tr>
        <tr>
            <td>
                <label for="name">分类名称：</label>
            </td>
            <td>
                <div style="width: 260px;">
                    <input type="text" name="c_name" id="c_name" class="ui-textbox" ligeruiid="textbox1"
                           width="260px;" height="23px;" value="<?php echo ($cate["name"]); ?>"/>
                </div>
            </td>
        </tr>
        <tr>
            <td></td>
            <td></td>
        </tr>
        </tbody>
    </table>
</div>
<script type="text/javascript">
    $(function () {
        $("#editCategory").ligerForm();
    });
</script>
</body>
</html>
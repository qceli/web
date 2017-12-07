<?php if (!defined('THINK_PATH')) exit();?><html>
<head>
    <title></title>
    <link href="/Public/LigerUI/lib/ligerUI/skins/Aqua/css/ligerui-all.css" rel="stylesheet" type="text/css"/>
    <link href="/Public/LigerUI/lib/ligerUI/skins/Gray/css/all.css" rel="stylesheet" type="text/css"/>
    <link href="/Public/LigerUI/lib/ligerUI/skins/ligerui-icons.css" rel="stylesheet" type="text/css"/>
    <script src="/Public/LigerUI/lib/jquery/jquery-1.9.0.min.js" type="text/javascript"></script>
    <script src="/Public/LigerUI/lib/jquery.cookie.js" type="text/javascript"></script>
    <script src="/Public/LigerUI/lib/ligerUI/js/core/base.js" type="text/javascript"></script>
    <script src="/Public/LigerUI/lib/ligerUI/js/plugins/ligerToolBar.js" type="text/javascript"></script>
    <script src="/Public/LigerUI/lib/ligerUI/js/plugins/ligerDialog.js" type="text/javascript"></script>
    <script src="/Public/LigerUI/lib/ligerUI/js/plugins/ligerGrid.js" type="text/javascript"></script>
    <script src="/Public/LigerUI/lib/ligerUI/js/plugins/ligerFilter.js" type="text/javascript"></script>
    <script src="/Public/LigerUI/lib/ligerUI/js/plugins/ligerDrag.js" type="text/javascript"></script>
    <script src="/Public/LigerUI/lib/ligerUI/js/plugins/ligerResizable.js" type="text/javascript"></script>
    <script src="/Public/LigerUI/ligerGrid.showFilter.js" type="text/javascript"></script>
    <script type="text/javascript">

        //去掉  大于小于包括,并改变顺序
        $.ligerDefaults.Filter.operators['string'] =
            $.ligerDefaults.Filter.operators['text'] =
                ["like", "equal", "notequal", "startwith", "endwith"];

        //这个例子展示了本地过滤，你也可以在服务器端过滤(将过滤规则组成json，以一个参数提交给服务器)
        //相见ligerGrid.showFilter.js
        $(function () {
            var CustomersData = {Rows: [], Total: 0};
        <?php if(is_array($admingroups)): foreach($admingroups as $key=>$admingroup): ?>CustomersData.Rows.push({
                    "id": "<?php echo ($admingroup["id"]); ?>",
                    "name": "<?php echo ($admingroup["name"]); ?>"
                });<?php endforeach; endif; ?>

            window['g'] = $("#maingrid4").ligerGrid({
                columns: [
                    {display: 'ID', name: 'id', width: 40, align: 'center'},
                    {display: '名称', name: 'name', heightAlign: 'center'}
                ], data: $.extend(true, {}, CustomersData), pageSize: 30,
                toolbar: {
                    items: [
                        {text: '添加', click: itemclick, icon: 'add'},
                        {text: '修改', click: itemclick, icon: 'modify'},
                        {text: '删除', click: itemclick, icon: 'delete'}
                    ]
                },
                width: '100%', height: '99%', checkbox: false
            });
            $("#pageloading").hide();
        });

        function itemclick(item) {
            if (item.icon === 'add') {
                $.ligerDialog.prompt('添加分组', '分组名称', function (yes, value) {
                    if (yes && value !== "")
                        $.post("<?php echo U('System/groupAdd');?>", {group_name: value}, function (res) {
                            if (!res.status) {
                                $.ligerDialog.error(res.msg);
                            } else {
                                $.ligerDialog.success(res.msg, '添加成功！', function () {
                                    location.href = location;
                                })
                            }
                        });
                });
            }
            if (item.icon === 'modify') {
                var row = window['g'].getSelectedRow();
                if (!row) {
                    $.ligerDialog.warning('请选择操作行！');
                    return false;
                }
                $.ligerDialog.prompt('修改分组', row.name, function (yes, value) {
                    if (yes && value !== "")
                        $.post("<?php echo U('System/groupEdit');?>", {gid:row.id, group_name:value}, function(res) {
                            if (!res.status) {
                                $.ligerDialog.error(res.msg);
                            } else {
                                $.ligerDialog.success(res.msg, '修改成功！', function () {
                                    location.href = location;
                                })
                            }
                        })
                });
            }
            if (item.icon === 'delete') {
                var row = window['g'].getSelectedRow();
                if (!row) {
                    $.ligerDialog.warn('请选择操作行！');
                    return false;
                }
                $.ligerDialog.confirm('确认删除？', '删除', function (yes) {
                    if (yes)
                        $.post("<?php echo U('System/groupDel');?>", {"gid": row.id}, function (res) {
                            if (!res.status) {
                                $.ligerDialog.error(res.msg);
                            } else {
                                $.ligerDialog.success(res.msg, '删除成功！', function () {
                                    location.href = location;
                                });
                            }
                        });
                });
            }
        }
    </script>
</head>
<body style="padding: 4px; overflow: hidden;">
<div class="l-loading" style="display: block" id="pageloading">
</div>
<div id="maingrid4" style="margin: 0; padding: 0">
</div>
<div style="display: none;">
</div>
</body>
</html>
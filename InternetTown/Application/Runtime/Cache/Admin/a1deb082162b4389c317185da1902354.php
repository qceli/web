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
            <?php if(is_array($categorys)): foreach($categorys as $key=>$category): ?>CustomersData.Rows.push({
                        "id":"<?php echo ($category["id"]); ?>",
                        "parent_id":"<?php echo ($category["parent_id"]); ?>",
                        "name":"<?php echo ($category["name"]); ?>"
                    });<?php endforeach; endif; ?>
            window['g'] = $("#maingrid4").ligerGrid({
                columns: [
                    {display: 'ID', name: 'id', width: 40, align: 'center'},
                    {display: '上级分类', name: 'parent_id', width: 120, align: 'center'},
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
                $.ligerDialog.open({
                    width:390,
                    height:150,
                    title:'添加分类',
                    slide:false,
                    url:"<?php echo U('System/categoryAdd');?>",
                    buttons:[
                        {text:"添加", onclick:function(item, dialog){
                            submitForm(item, dialog, 'add');
                        }},
                        {text:"取消", onclick:function (item, dialog) {
                            dialog.close();
                        }}
                    ]
                });
            }
            if (item.icon === 'modify') {
                var row = window['g'].getSelectedRow();
                if (!row) {
                    $.ligerDialog.alert('请选择操作行！');
                    return;
                }
                $.ligerDialog.open({
                    width: 390,
                    height: 150,
                    title: '编辑内容',
                    url: "<?php echo U('System/categoryEdit');?>",
                    urlParms: {
                        id:row.id
                    },
                    slide: true,
                    buttons: [
                        {
                            text: '完成', onclick: function (item, dialog) {
                            submitForm(item, dialog, 'edit');
                        }
                        },
                        {
                            text: '取消', onclick: function (item, dialog) {
                            dialog.close();
                        }
                        }
                    ]
                });
            }
            if (item.icon === 'delete') {
                var row = window['g'].getSelectedRow();
                if (!row) {
                    $.ligerDialog.alert('请选择操作行！');
                    return false;
                }
                $.ligerDialog.confirm('确认删除？', '删除', function (yes) {
                    if (yes)
                        $.post("<?php echo U('System/categoryDel');?>", {id:row.id}, function(res) {
                            if (!res.status)
                                $.ligerDialog.error(res.msg);
                            else {
                                $.ligerDialog.success(res.msg, '成功', function(){
                                    location.href = location;
                                })
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
<script type="text/javascript">
    function submitForm(item, dialog, type) {
        var iframe_elm = dialog.frame.document;
        var c_name = $("#c_name", iframe_elm).val();
        var parent_id = $("#parent_id", iframe_elm).val();
        console.log(c_name);
        console.log(parent_id);
        if (c_name === "") {
            $.ligerDialog.error("分类名不可为空！");
            return false;
        }
        var url;
        if (type === 'add')
            url = "<?php echo U('System/categoryAdd');?>";
        else if (type === 'edit')
            url = "<?php echo U('System/categoryEdit');?>";
        $.ajax({
            url: url,
            type: "post",
            dataType: "json",
            data: {
                id : $("#c_id", iframe_elm).val(),
                parent_id: parent_id,
                name: c_name
            },
            success: function (res) {
                if (!res.status) {
                    $.ligerDialog.error(res.msg, '失败', function() {
                        dialog.close();
                    });
                } else {
                    $.ligerDialog.success(res.msg, '成功', function (){
                        location.href = location;
                    });
                }
            },
            error: function (xhr) {
                $.ligerDialog.error(xhr.state);
            }
        });
    }
</script>
</body>
</html>
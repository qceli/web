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
            <?php if(is_array($micro_arts)): foreach($micro_arts as $key=>$m_art): ?>CustomersData.Rows.push({
                    "id":"<?php echo ($m_art["id"]); ?>",
                    "title":"<?php echo ($m_art["title"]); ?>",
                    "category":"<?php echo ($m_art["category"]); ?>",
                    "author":"<?php echo ($m_art["author"]); ?>",
                    "created_time":"<?php echo (date('Y-m-d H:i:s', $m_art["created_time"])); ?>",
                    "content":<?php echo ($m_art["content"]); ?>
                });<?php endforeach; endif; ?>

            window['g'] = $("#maingrid4").ligerGrid({
                columns: [
                    {display: 'ID', name: 'id', width: 40, align: 'center'},
                    {display: '标题', name: 'title', minWidth: 200, align: 'center'},
                    {display: '分类', name: 'category', minWidth: 170, align: 'center'},
                    {display: '作者', name: 'author', minWidth: 120, align: 'center'},
                    {display: '发布时间', name: 'created_time', minWidth: 170, heightAlign: 'center'},
                    {display: '内容', name: 'content', minWidth: 360, align: 'center'}
                ], data: $.extend(true, {}, CustomersData), pageSize: 30,
                toolbar: {
                    items: [
                        {text: '查看', click: itemclick, icon: 'search2'},
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
            if (item.icon === 'search2') {
                var row = window['g'].getSelectedRow();
                if (!row) {
                    $.ligerDialog.alert('请选择操作行！');
                    return false;
                }
                $.ligerDialog.open({
                    height: 500,
                    width: 700,
                    title: '查看',
                    url: "<?php echo U('MicroArticle/detail');?>",
                    urlParms: {
                        id: row.id
                    },
                    slide: true,
                    buttons: [
                        {
                            text: '确定', onclick: function (item, dialog) {
                            dialog.close();
                        }
                        }
                    ]
                });
            }
            if (item.icon === 'add') {
                $.ligerDialog.open({
                    height: 600,
                    width: 700,
                    title: '添加内容',
                    url: "<?php echo U('MicroArticle/add');?>",
                    slide: true,
                    buttons: [
                        {
                            text: '添加', onclick: function (item, dialog) {
                            submitForm(item, dialog, 'add');
                        }
                        },
                        {
                            text: '取消', onlick: function (item, dialog) {
                            dialog.close();
                        }
                        }
                    ]
                });
            }
            if (item.icon === 'modify') {
                var row = window['g'].getSelectedRow();
                if (!row) {
                    $.ligerDialog.alert('请选择操作行！');
                    return false;
                }
                $.ligerDialog.open({
                    height: 600,
                    width: 700,
                    title: '编辑内容',
                    url: "<?php echo U('MicroArticle/edit');?>",
                    urlParms:{
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
                $.ligerDialog.confirm('确定删除此行？', function (yes) {
                    if (yes) {
                        $.post("<?php echo U('MicroArticle/del');?>", {id: row.id}, function (res) {
                            if (!res.status) {
                                $.ligerDialog.error(res.msg);
                            } else {
                                $.ligerDialog.success(res.msg, '删除成功', function () {
                                    location.href = location;
                                })
                            }
                        })
                    }
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
        if ($("#title", iframe_elm).val() === "") {
            $.ligerDialog.alert("标题不可为空！");
            return false;
        }
        var url;
        if (type === 'add')
            url = "<?php echo U('MicroArticle/add');?>";
        else if (type === 'edit')
            url = "<?php echo U('MicroArticle/edit');?>";
        $.ajax({
            url: url,
            type: "post",
            dataType: "json",
            data: {
                id:$("#c_id", iframe_elm).val(),
                title: $("#title", iframe_elm).val(),
                category: $("#category", iframe_elm).val(),
                content: dialog.frame.window.um.getContent()
            },
            success: function (res) {
                if (!res.status) {
                    $.ligerDialog.alert(res.msg);
                } else {
                    $.ligerDialog.success(res.msg, '添加成功', function () {
                        location.href = location;
                    });
                }
            },
            error: function (xhr) {
                $.ligerDialog.alert(xhr.state);
            }
        });
    }
</script>
</body>
</html>
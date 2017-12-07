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
            <?php if(is_array($tickets)): foreach($tickets as $key=>$ticket): ?>CustomersData.Rows.push({
                        "id":"<?php echo ($ticket["id"]); ?>",
                        "billcode":"<?php echo ($ticket["billcode"]); ?>",
                        "ticket_name":"<?php echo ($ticket["ticket_name"]); ?>",
                        "warning":<?php echo ($ticket["warning"]); ?>,
                        "sight_info":<?php echo ($ticket["sight_info"]); ?>,
                        "ticket_price":"<?php echo ($ticket["ticket_price"]); ?>",
                        "add_time":"<?php echo (date('Y-m-d H:i:s', $ticket["add_time"])); ?>"
                    });<?php endforeach; endif; ?>
            window['g'] = $("#maingrid4").ligerGrid({
                columns: [
                    {display: 'ID', name: 'id', width: 40, align: 'center'},
                    {display: '发票代码', name: 'billcode', Width: 60, align: 'center'},
                    {display: '票名', name: 'ticket_name', Width: 60, align: 'center'},
                    {display: '购票须知', name: 'warning', Width: 60, align: 'center'},
                    {display: '景点特色', name: 'sight_info', width: 170, align: 'center'},
                    {display: '票价', name: 'ticket_price', Width: 60, align: 'center'},
                    {display: '添加日期', name: 'add_time', heightAlign: 'center'}

                ], data: $.extend(true, {}, CustomersData), pageSize: 30,
                toolbar: {
                    items: [
                        {text: '添加', click: itemclick, icon: 'add'},
                        {text: '修改', click: itemclick, icon: 'modify'},
                        {text: '删除', click: itemclick, icon: 'delete'},
//                        {text: '分享二维码', click: itemclick, icon: 'back'}
                    ]
                },
                allowAdjustColWidth:true,
                resizable:true,
                width: '100%', height: '99%', checkbox: false
            });
            $("#pageloading").hide();
        });

        function itemclick(item) {
            if (item.icon === 'add') {
                $.ligerDialog.open({
                    height: 550,
                    width: 550,
                    title: '添加门票',
                    url: "<?php echo U('Ticket/add');?>",
                    slide: false,
                    buttons: [
                        {
                            text: '添加', onclick: function (item, dialog) {
                            submitForm(item, dialog, 'add');
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
            if (item.icon === 'modify') {
                var row = window['g'].getSelectedRow();
                if (!row) {
                    $.ligerDialog.alert('请选择操作行！');
                    return false;
                }
                $.ligerDialog.open({
                    height: 550,
                    width: 550,
                    title: '编辑内容',
                    url: "<?php echo U('Ticket/edit');?>",
                    urlParms: {
                        id:row.id
                    },
                    slide: false,
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
                if (!row){
                    $.ligerDialog.alert('请选择操作行！');
                    return false;
                }
                $.ligerDialog.confirm('确定要删除？',function (yes) {
                    if (yes) {
                        $.post("<?php echo U('Ticket/del');?>", {id:row.id}, function (res) {
                            if (!res.status) {
                                $.ligerDialog.error(res.msg);
                            } else{
                                $.ligerDialog.success(res.msg);
                                location.href = location;
                            }
                        })
                    }
                });
            }
            if (item.icon === 'back') {
                $.ligerDialog.open({
                    width: 550,
                    height: 600,
                    title: "公众号二维码",
                    url: "",
                    slide: false,
                    buttons: [
                        {
                            text: '下载', onclick: function (item, dialog) {
                            alert('download');
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
        if ($("#ticket_name", iframe_elm).val() === "") {
            $.ligerDialog.warning("票名不可为空！");
            return false;
        }
        var url;
        if (type === 'add')
            url = "<?php echo U('Ticket/add');?>";
        else if (type === 'edit')
            url = "<?php echo U('Ticket/edit');?>";
        $.ajax({
            url: url,
            type: "post",
            dataType: "json",
            data: {
                id:$("#tid", iframe_elm).val(),
                billcode: $("#billcode", iframe_elm).val(),
                ticket_name: $("#ticket_name", iframe_elm).val(),
                ticket_pic:$("#ticket_pic", iframe_elm).val(),
                ticket_price: $("#ticket_price", iframe_elm).val(),
                warning: $("#warning", iframe_elm).val(),
                sight_info: $("#sight_info", iframe_elm).val()
            },
            success: function (res) {
                if (!res.status) {
                    $.ligerDialog.error(res.msg);
                } else {
                    $.ligerDialog.success(res.msg, '添加成功', function () {
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
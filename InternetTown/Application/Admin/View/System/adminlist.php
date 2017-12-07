<html>
<head>
    <title></title>
    <link href="__PUBLIC__/LigerUI/lib/ligerUI/skins/Aqua/css/ligerui-all.css" rel="stylesheet" type="text/css"/>
    <link href="__PUBLIC__/LigerUI/lib/ligerUI/skins/Gray/css/all.css" rel="stylesheet" type="text/css"/>
    <link href="__PUBLIC__/LigerUI/lib/ligerUI/skins/ligerui-icons.css" rel="stylesheet" type="text/css"/>
    <script src="__PUBLIC__/LigerUI/lib/jquery/jquery-1.9.0.min.js" type="text/javascript"></script>
    <script src="__PUBLIC__/LigerUI/lib/jquery.cookie.js" type="text/javascript"></script>
    <script src="__PUBLIC__/LigerUI/lib/ligerUI/js/core/base.js" type="text/javascript"></script>
    <script src="__PUBLIC__/LigerUI/lib/ligerUI/js/plugins/ligerToolBar.js" type="text/javascript"></script>
    <script src="__PUBLIC__/LigerUI/lib/ligerUI/js/plugins/ligerDialog.js" type="text/javascript"></script>
    <script src="__PUBLIC__/LigerUI/lib/ligerUI/js/plugins/ligerGrid.js" type="text/javascript"></script>
    <script src="__PUBLIC__/LigerUI/lib/ligerUI/js/plugins/ligerFilter.js" type="text/javascript"></script>
    <script src="__PUBLIC__/LigerUI/lib/ligerUI/js/plugins/ligerDrag.js" type="text/javascript"></script>
    <script src="__PUBLIC__/LigerUI/lib/ligerUI/js/plugins/ligerResizable.js" type="text/javascript"></script>
    <script src="__PUBLIC__/LigerUI/ligerGrid.showFilter.js" type="text/javascript"></script>
    <script type="text/javascript">

        //去掉  大于小于包括,并改变顺序
        $.ligerDefaults.Filter.operators['string'] =
            $.ligerDefaults.Filter.operators['text'] =
                ["like", "equal", "notequal", "startwith", "endwith"];

        //这个例子展示了本地过滤，你也可以在服务器端过滤(将过滤规则组成json，以一个参数提交给服务器)
        //相见ligerGrid.showFilter.js
        $(function () {
            var CustomersData = {Rows: [], Total: 0};
            <foreach name = "adminusers" item = "adminuser" >
                    CustomersData.Rows.push({
                        "id": "{$adminuser.id}",
                        "name": "{$adminuser.username}",
                        "group":"{$adminuser.gid}",
                        "created_time":"{$adminuser.created_time|date='Y-m-d H:s:i',###}",
                        "last_login":"{$adminuser.last_login|date='Y-m-d H:s:i',###}",
                        "login_time":"{$adminuser.login_count}"
                    });
            </foreach>
            window['g'] = $("#maingrid4").ligerGrid({
                columns: [
                    {display: 'ID', name: 'id', width: 40, align: 'center'},
                    {display: '名称', name: 'name', heightAlign: 'center'},
                    {display: '组名', name: 'group', heightAlign: 'center'},
                    {display: '添加时间', name: 'created_time', heightAlign: 'center'},
                    {display: '上次登录', name: 'last_login', heightAlign: 'center'},
                    {display: '登录次数', name: 'login_time', heightAlign: 'center'}
                ], data: $.extend(true, {}, CustomersData), pageSize: 30,
                toolbar: {
                    items: [
                        {text: '添加', click: itemclick, icon: 'add'},
//                        {text: '修改', click: itemclick, icon: 'modify'},
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
                    height:240,
                    width:330,
                    title:"添加管理员",
                    url:"{:U('System/adminUserAdd')}",
                    slide:false,
                    buttons:[
                        {text:'添加', onclick:function(item,dialog){
                            submitForm(item, dialog, 'add');
                        }},
                        {text:'取消', onclick:function(item,dialog){
                            dialog.close();
                        }}
                    ]
                });
            }
            if (item.icon === 'delete') {
                var row = window['g'].getSelectedRow();
                if (!row) {
                    $.ligerDialog.warning('请选择操作行！');
                    return;
                }
                $.ligerDialog.confirm('确认删除？', '删除', function (yes) {
                    if (yes)
                        $.post("{:U('System/adminUserDel')}", {uid:row.id}, function (res) {
                            if (!res.status)
                                $.ligerDialog.error(res.msg);
                            else {
                                $.ligerDialog.success(res.msg, '成功', function () {
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
        if ($("#username", iframe_elm).val() === ""
            || $("#password", iframe_elm).val() === ""
        || $("#repwd", iframe_elm).val() === "") {
            $.ligerDialog.warning("输入不可为空！");
            return false;
        }

        if ($("#password", iframe_elm).val() !== $("#repwd", iframe_elm).val()) {
            $.ligerDialog.error("两次密码输入不一致！");
            return false;
        }
        $.ajax({
            url: "{:U('System/adminUserAdd')}",
            type: "post",
            dataType: "json",
            data: {
                username: $("#username", iframe_elm).val(),
                password: $("#password", iframe_elm).val(),
                repwd: $("#repwd", iframe_elm).val(),
                group: $("#group", iframe_elm).val()
            },
            success: function (res) {
                if (!res.status) {
                    $.ligerDialog.error(res.msg);
                } else {
                    $.ligerDialog.success(res.msg, '添加成功！', function(){
                        location.href = location;
                    });
                }
            },
            error: function (xhr) {
                $.ligerdialog.error(xhr.state);
            }
        });
    }
</script>
</body>
</html>

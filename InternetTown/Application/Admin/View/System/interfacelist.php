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

            window['g'] = $("#maingrid4").ligerGrid({
                columns: [
                    {display: 'ID', name: 'id', width: 40, align: 'center'},
                    {display: '名称', name: 'created_time', heightAlign: 'center'}
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
                $.ligerDialog.prompt('添加', '景点名称', function (yes, value) {
                    if (yes) alert(value);
                });
            }
            if (item.icon === 'modify') {
                var row = window['g'].getSelectedRow();
                if (!row) {
                    alert('请选择操作行！');
                    return;
                }
                $.ligerDialog.open({
                    height: 700,
                    width: 700,
                    title: '编辑内容',
                    url: "",
                    slide: false,
                    data: {
                        title: ""
                    },
                    buttons: [
                        {
                            text: '完成', onclick: function (item, dialog) {
                            submitForm(item, dialog);
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
                $.ligerDialog.confirm('确认删除？', '删除', function (yes) {
                    if (yes) alert('yes');
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
    function submitForm(item, dialog) {
        var iframe_elm = dialog.frame.document;
        if (iframe_elm.getElementById("title").value == "") {
            alert("标题不可为空！");
            return false;
        }
        $.ajaxSetup({
            data: {csrfmiddlewaretoken: '{{ csrf_token }}'}
        });
        $.ajax({
            url: "",
            type: "post",
            dataType: "json",
            data: {
                title: iframe_elm.getElementById("title").value,
                category: iframe_elm.getElementById("category").value,
                content: iframe_elm.getElementById("content").value
            },
            success: function (res) {
                if (!res.status) {
                    alert(res.msg);
                } else {
                    alert(res.msg);
                    dialog.close();
                    location.href = location;
                }
            },
            error: function (xhr) {
                alert(xhr.state);
            }
        });
    }
</script>
</body>
</html>

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
    <script src="__PUBLIC__/LigerUI/lib/ligerUI/js/plugins/ligerForm.js" type="text/javascript"></script>
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
        function render_grid(params) {
            window['g'] = $("#maingrid4").ligerGrid({
                columns: [
                    {display: 'ID', name: 'id', width: 40, align: 'center'},
                    {display: '订单号', name: 'trade_no', minWidth: 60, align: 'center'},
                    {display: '景点名称', name: 't_name', minWidth: 60, align: 'center'},
                    {display: '购票人数', name: 'count', width: 240, align: 'center'},
                    {display: '总价', name: 'price', heightAlign: 'center'},
                    {display: '购买用户', name: 'customer', width: 170, align: 'center'},
                    {display: '联系电话', name: 'phone', width: 170, align: 'center'},
                    {display: '购买时间', name: 'buy_time', width: 170, align: 'center'},
                    {display: '使用时间', name: 'use_time', width: 170, align: 'center'},
                    {display: '状态', name: 'status', width: 170, align: 'center'}
                ], data: $.extend(true, {}, params), pageSize: 30,
                toolbar: {
                    items: [
                        {text: '查看', click: itemclick, icon: 'search2'},
                        {text: '刷新', click: itemclick, icon: 'refresh'}
                    ]
                },
                width: '100%', height: '99%', checkbox: false
            });
            $("#pageloading").hide();

            $("#search_form").ligerForm();
        }
        $(function () {
            var CustomersData = {Rows: [], Total: 0};

            <foreach name='ticket_order_info' item='ticket_order'>
                    CustomersData.Rows.push({
                        "id":{$ticket_order.id},
                        "trade_no":"{$ticket_order.trade_no}",
                        "t_name":"{$ticket_order.t_name}",
                        "count":{$ticket_order.count},
                        "price":{$ticket_order.price},
                        "customer":"{$ticket_order.customer}",
                        "phone":"{$ticket_order.phone}",
                        "use_time":"{$ticket_order.use_time|date="Y-m-d",###}",
                        "buy_time":"{$ticket_order.buy_time|date="Y-m-d",###}",
                        "status":"{$ticket_order.status}"
                    });
            </foreach>

            CustomersData.Total = "{$counts}";

            render_grid(CustomersData);
        });

        function itemclick(item) {
            if (item.icon === 'search2') {
                var row = window['g'].getSelectedRow();
                if (!row) {
                    $.ligerDialog.warning('请选择操作行！');
                    return false;
            }
                $.ligerDialog.open({
                    height: 250,
                    width: 300,
                    title: '查看详情',
                    url: "{:U('Index/ticket_info')}",
                    urlParms: {
                        tid: row.id
                    },
                    slide: false,
                    buttons: [
                        {
                            text: '领票', onclick: function (item, dialog) {
                            changeStatus(row);
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
            if (item.icon === 'refresh') {
                location.href = location;
            }
        }

        function search_data() {
            var phone = $("#phone").val();
            var my_reg = /^((13|14|15|17|18)[0-9]{1}\d{8})$/;
            if (phone == '') {
                $.ligerDialog.error('请输入手机号！');
                return false;
            } else if (!my_reg.test(phone) || phone.length !== 11) {
                $.ligerDialog.error('请输入有效的手机号！');
                return false;
            }

            $.post("{:U('Index/search')}", {phone: phone}, function (res) {
                if (!res.status)
                    $.ligerDialog.error(res.msg);
                else {
                    var rows = window['g'].rows;
                    var data = {Rows:[], Total:res.tickets.length};
                    data.Rows=res.tickets;
                    render_grid(data);
                }
            });
        }

        function changeStatus(row) {
            $.post("{:U('Index/changeStatus')}", {tid: row.id}, function (res) {
                if (!res.status) {
                    $.ligerDialog.error(res.msg);
                } else {
                    $.ligerDialog.success(res.msg, '成功', function () {
                        location.href = location;
                    });
                }
            });
        }

    </script>
    <style type="text/css">
        td {
            padding: 5px;
        }
    </style>
</head>
<body style="padding: 4px; overflow: hidden;">
<div class="vis">
    <br/>
    <div class="to" style="left: 0;visibility: hidden"></div>
    <div style="position:relative;top: -7px;display: inline-block;left: 22px;">
        <h3 style="font-weight: 500;display: inline-block;position:relative;top:0; left: -10px;">购票手机号查询: </h3>
        <input type="text" id="phone" style="border: 1px solid #D0D0D0;height: 20px ;line-height: 20px;width: 154px"/>
        <button onclick="search_data()">查询</button>
    </div>
    <br>
</div>
<div class="l-loading" style="display: block" id="pageloading">
</div>
<div id="maingrid4" style="margin: 0; padding: 0">
</div>
<div style="display: none;">
</div>
</body>
</html>

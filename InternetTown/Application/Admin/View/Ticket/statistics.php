<!doctype html>
<html lang="zh_CN">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <script src="__PUBLIC__/js/echarts.js"></script>
</head>
<body style="background-color: #EEEEEE">
<h3>数据统计：</h3>
<div class="">
    {$weekPriceSum}
    <!-- 雷达图 -->
    <div id="s-left" style="width: 70%;height: 500px;background-color: white;"></div>
    <!-- 直线图 -->
    <div id="s-right" style="width: 50%;height: 400px;"></div>
</div>
<script src="__PUBLIC__/js/jquery-1.9.0.min.js"></script>
<script type="text/javascript">
    // 基于准备好的dom， 初始化echarts实例
    var myChart = echarts.init(document.getElementById("s-left"));
    $.post("{:U('Ticket/statistics')}").done(function (res) {

        var date_arr = [];
        var priceSum = [];
        var saleCount = [];
        var useCount = [];
        var backCount = [];

        $.each(res, function (i) {
            date_arr.push(res[i].day);
        });
        $.each(res, function (i) {
            priceSum.push(parseFloat(res[i].pricesum));
        });
        $.each(res, function (i) {
            saleCount.push(res[i].salecount);
        });
        $.each(res, function (i) {
            useCount.push(res[i].usecount);
        });
        $.each(res, function (i) {
            backCount.push(res[i].backcount);
        });
        myChart.setOption({
            title: {
                text: '门票销量统计',
                subtext: '最近七天的销售数据'
            },
            tooltip: {
                trigger: 'axis'
            },
            legend: {
                data: ['销售额', '售出数', '核销数', '退票数']
            },
            toolbox: {
                show: true,
                feature: {
                    mark: {show: true},
                    dataView: {show: true, readOnly: false},
                    magicType: {show: true, type: ['line', 'bar']},
                    restore: {show: true},
                    saveAsImage: {show: true}
                }
            },
            xAxis: {
                data: date_arr
            },
            yAxis: {},
            series: [
                {
                    name: '销售额',
                    type: 'bar',
                    data: priceSum,
                    default: 'line',
                    markPoint: {
                        data: [
                            {type: 'max', name: '最大值'},
                            {type: 'min', name: '最小值'}
                        ]
                    },
                    markLine: {
                        data: [
                            {type: 'average', name: '平均值'}
                        ]
                    }
                },
                {
                    name: '售出数',
                    type: 'bar',
                    data: saleCount,
                    default: 'line',
                    markPoint: {
                        data: [
                            {type: 'max', name: '最大值'},
                            {type: 'min', name: '最小值'}
                        ]
                    },
                    markLine: {
                        data: [
                            {type: 'average', name: '平均值'}
                        ]
                    }
                },
                {
                    name: '核销数',
                    type: 'bar',
                    data: useCount,
                    default: 'line',
                    markPoint: {
                        data: [
                            {type: 'max', name: '最大值'},
                            {type: 'min', name: '最小值'}
                        ]
                    },
                    markLine: {
                        data: [
                            {type: 'average', name: '平均值'}
                        ]
                    }
                },
                {
                    name: '退票数',
                    type: 'bar',
                    data: backCount,
                    default: 'line',
                    markPoint: {
                        data: [
                            {type: 'max', name: '最大值'},
                            {type: 'min', name: '最小值'}
                        ]
                    },
                    markLine: {
                        data: [
                            {type: 'average', name: '平均值'}
                        ]
                    }
                }
            ]
        })
    });
</script>
</body>
</html>
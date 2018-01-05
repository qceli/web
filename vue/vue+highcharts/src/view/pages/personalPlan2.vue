<!--  -->
<template>
    <div>
        <div class="total">
            <div>         
                <div class="model">
                    <Icon type="navicon-round"></Icon>
                    当前需求概况
                </div>
                <div>
                    <div>
                        标题
                    </div>
                    <div></div>
                </div>
                <div></div>
            </div>
            <div style="margin: 10px;">         
                <div class="model">
                <Icon type="navicon-round"></Icon>
                计划工时统计
                </div>
                <high-charts :id="id" :option="option"></high-charts>
            </div>
            <div>         
                <div class="model">
                <Icon type="navicon-round"></Icon>
                实际工时统计
                </div>

            </div>

        </div>
        <div>
            <div>
                <div class="model">
                    <Icon type="navicon-round"></Icon>
                    进度明细
                </div>
            </div>
        </div>
    </div>
</template>

<script>
// 导入chart组件
import HighCharts from './highcharts.vue'
// 导入chart组件模拟数据
// import options from './chart-options/options'
export default {
    data () {
        return {
            id: 'test',
            option: {
                chart: {
                    type: 'line'
                },
                title: {
                    text: '月平均气温'//表头文字
                },
                subtitle: {
                    text: '数据来源: WorldClimate.com'//表头下文字
                },
                xAxis: {//x轴显示的内容
                    categories: ['一月', '二月', '三月', '四月', '五月', '六月', '七月', '八月', '九月', '十月', '十一月', '十二月'],
　　　　　　　　　　　　　　　　　　　　　　　　plotbands:[{//可以显示一个方块，如果需要的话可以更改透明度和颜色
　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　from:4.5,
　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　to:6.5,
　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　color:'rgba(68,170,213,0)'//透明度和颜色
　　　　　　　　　　　　　　　　　　　　　　　　　　　　}]
                                                },

                    yAxis: {//y轴显示的内容
                    title: {
                        text: '气温 (°C)'
                    }
                },
                plotOptions: {
                    line: {
                        dataLabels: {
                            enabled: true // 开启数据标签
                        },
                        enableMouseTracking: false // 关闭鼠标跟踪，对应的提示框、点击事件会失效
                    }
                },
                series: [{//两条数据
                    name: '东京',
                    data: [7.0, 6.9, 9.5, 14.5, 18.4, 21.5, 25.2, 26.5, 23.3, 18.3, 13.9, 9.6]
                }, {
                    name: '伦敦',
                    data: [3.9, 4.2, 5.7, 8.5, 11.9, 15.2, 17.0, 16.6, 14.2, 10.3, 6.6, 4.8]
                }]
            }
        };
    },
    components: {
        HighCharts
    },

    computed: {},

    methods: {}
}

</script>

<!-- Add 'scoped' attribute to limit CSS to this component only -->
<style scoped>
    .total {
        display: flex;
    }
    .total > div {
        flex: 1;
        margin: 10px 0;
        padding: 10px;
        border: 1px solid #cccccc;
        background-color: #ffffff;
    }
</style>
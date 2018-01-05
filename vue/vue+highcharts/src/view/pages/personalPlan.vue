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
                <high-charts :id="id" :option="option" class="circleCharts"></high-charts>
            </div>
            <div>         
                <div class="model">
                <Icon type="navicon-round"></Icon>
                实际工时统计
                </div>
                <high-charts :id="id1" :option="option1" class="circleCharts"></high-charts>

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
                    plotBackgroundColor: null,
                    plotBorderWidth: null,
                    plotShadow: false
                },
                title: {
                    text: ''
                },
                tooltip: {
                    headerFormat: '{series.name}<br>',
                    pointFormat: '{point.name}: <b>{point.percentage:.1f}%</b>'
                },
                series: [{
                    type: 'pie',
                    name: '浏览器访问量占比',
                    data: [
                        ['Firefox',   45.0],
                        ['IE',       26.8],
                        {
                            name: 'Chrome',
                            y: 12.8,
                            sliced: true,
                            selected: true
                        },
                        ['Safari',    8.5],
                        ['Opera',     6.2],
                        ['其他',   0.7]
                    ]
                }]
            },
            id1: 'test1',
            option1: {
                chart: {
                    plotBackgroundColor: null,
                    plotBorderWidth: null,
                    plotShadow: false
                },
                title: {
                    text: ''
                },
                tooltip: {
                    headerFormat: '{series.name}<br>',
                    pointFormat: '{point.name}: <b>{point.percentage:.1f}%</b>'
                },
                series: [{
                    type: 'pie',
                    name: '浏览器访问量占比',
                    data: [
                        ['Firefox',   45.0],
                        ['IE',       26.8],
                        {
                            name: 'Chrome',
                            y: 12.8,
                            sliced: true,
                            selected: true
                        },
                        ['Safari',    8.5],
                        ['Opera',     6.2],
                        ['其他',   0.7]
                    ]
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

    rect, .circleCharts {
        min-width:300px;
        max-height:300px;
    }
    /* .highcharts-background, .highcharts-plot-background, .highcharts-root {
        min-width:300px !important;
        height:300px !important;
    } */
</style>
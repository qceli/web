<!--  -->
<template>
  <div>
    <div class="showpaln">
        <div class="span4">
            <div class="model">
                <Icon type="edit"></Icon>
                需求计划录入
            </div>
            <div>
                <Menu mode="horizontal" theme="light" active-name="1">
                    <MenuItem name="1">
                        <Icon type="android-chat"></Icon>
                        分析
                    </MenuItem>
                    <MenuItem name="2">
                        <Icon type="network"></Icon>
                        开发
                    </MenuItem>
                    <MenuItem name="3">
                        <Icon type="android-expand"></Icon>
                        DAT测试
                    </MenuItem>
                    <MenuItem name="4">
                        <Icon type="android-expand"></Icon>
                        UAT测试
                    </MenuItem>
                    <MenuItem name="5">
                        <Icon type="android-contract"></Icon>
                        预生产
                    </MenuItem>
                    <MenuItem name="6">
                        <Icon type="android-contract"></Icon>
                        生产
                    </MenuItem>
                </Menu>
            </div>
            <div class="calcDay">
                <div>
                    <div>
                        <Icon type="ios-information" color="#357acc"></Icon>
                        开始时间：{{data1[0].starttime}}
                    </div>
                </div>
                <div>
                    <div>
                        <Icon type="ios-checkmark" color="#0f8859"></Icon>
                        结束时间：{{data1[0].endtime}}
                    </div>
                </div>
                <div>
                    <div class="days">
                        <Icon type="ios-information" color="#f99811"></Icon>
                        工时总计：{{}}
                    </div>
                </div>
            </div>
            <div style="height: 75px;overflow:auto;">
                <!-- <Table :columns="columns1" :data="data1"></Table> -->
                <table>
                    <tr v-for="data in data1">
                        <td style="flex: 2">{{data.name}}</td>
                        <td style="flex: 4">
                            <DatePicker type="date" placeholder="" style="width: 200px" placement="top-start" :value="data.starttime"></DatePicker>
                        </td>
                        <td style="flex: 1">-</td>
                        <td style="flex: 4">
                            <DatePicker type="date" placeholder="" style="width: 200px" placement="top-start" :value="data.endtime"></DatePicker>
                        </td>
                        <td style="flex: 2">{{data.day}}</td>
                        <td style="flex: 2">
                            <Icon type="paintbrush"></Icon>
                        </td>
                    </tr>
                </table>
                
            </div>
        </div>
        <div class="span2">
            <div class="model">
                <Icon type="chatbox-working"></Icon>
                操作日志
            </div>
            <div style="margin-top:5px;height: 180px;overflow:auto;">
                <Steps :current="2" direction="vertical">
                    <Step title="已完成" content="这里是该步骤的描述信息"></Step>
                    <Step title="已完成" content="这里是该步骤的描述信息"></Step>
                    <Step title="进行中" content="这里是该步骤的描述信息"></Step>
                    <Step title="待进行" content="这里是该步骤的描述信息"></Step>
                </Steps>
            </div>
        </div>
    </div>
  </div>
</template>

<script>
export default {
  data () {
    return {
        data1: [
            {
                name: 'celi',
                starttime: '2017-12-23',
                endtime: '2017-12-23',
                day: 1,
                edit: 1
            },
            {
                name: 'celi',
                starttime: '2017-12-24',
                endtime: '2017-12-24',
                day: 1,
                edit: 1
            },
            {
                name: 'celi',
                starttime: '2017-12-25',
                endtime: '2017-12-26',
                day: 2,
                edit: 1
            }
        ],
        allDay: '',
        endTime: '',
        length: '',
        stepLists: [
            {
                firstpeople: 'celi(负责人)',
                secondpeople: 'hhh（分析）',
                starttime: '2017-12-25 16:21',
                state: 1
            },
            {
                firstpeople: 'celi(负责人)',
                secondpeople: 'hhh（分析）',
                starttime: '2017-12-25 16:21',
                state: 0
            },
            {
                firstpeople: 'celi(负责人)',
                secondpeople: 'hhh（分析）',
                starttime: '2017-12-25 16:21',
                state: 1
            },
            {
                firstpeople: 'celi(负责人)',
                secondpeople: 'hhh（分析）',
                starttime: '2017-12-25 16:21',
                state: 1
            }
        ]
    };
  },
  watch: {

  },

  components: {},

  computed: {},

  methods: {
    // $(function () {  
    //     alert(123);  
    // });  
  }
}

</script>

<!-- Add 'scoped' attribute to limit CSS to this component only -->
<style scoped>
    .showpaln {
        display: flex;
        margin: 20px 0;
        height: 250px;
        width: calc(100% - 20px);
    }
    .span4 {
        flex: 4;
        padding: 0 10px;
        margin-right: 10px;
        border: 1px solid #cccccc;
        background-color: #ffffff;
    }
    .span2 {
        flex: 2;
        padding: 0 10px;
        border: 1px solid #cccccc;
        background-color: #ffffff;
    }
    .calcDay {
        margin: 10px 0;
        display: flex;
    }
    .calcDay >div {
        flex: 1;
    }
    .calcDay >div>div {
        line-height: 32px;
        padding: 0 7px;
        font-size: 12px;
        border: 1px solid #dddee1;
        border-radius: 4px;
        color: #495060;
        width: 200px;
        display: inline-block;
        height: 32px;
        background-color: #e8f3fd;
    }
    .days {
        background-color: #fff5e4 !important;
    }
    table {
        width: 100%;
        
    }
    tr {
        width: 100%;
        display: flex;
        height: 30px;
        margin: 5px 0;
    }
    td {
        text-align: center;
        line-height: 30px;
    }
</style>
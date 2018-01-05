
<template>
    <div>
        <div class="planDetail">
            <div>
                录入时间
                <DatePicker type="date" placeholder="" style="width: 200px" placement="top-start" :value="row.time"></DatePicker>
            </div>
            <div>
                工总内容
                <Input v-model="value" placeholder="Enter something..." style="width: 200px"></Input>
            </div>
            <div>
                工总时长
                <Select v-model="model1" style="width:200px">
                    <Option v-for="item in timeList" :value="item.value" :key="item.value">{{ item.label }}</Option>
                </Select>
            </div>
            <div>
                完成状态
                <i-switch v-model="switch1" @on-change="change"></i-switch>
            </div>
        </div>
        <!-- <Row class="expand-row">
            <Col span="8">
                <span class="expand-key">Job: </span>
                <span class="expand-value">{{ row.job }}</span>
            </Col>
            <Col span="8">
                <span class="expand-key">Interest: </span>
                <span class="expand-value">{{ row.interest }}</span>
            </Col>
            <Col span="8">
                <span class="expand-key">Birthday: </span>
                <span class="expand-value">{{ row.birthday }}</span>
            </Col>
        </Row> -->
    </div>
</template>
<script>
    export default {
        props: {
            row: Object
        },
        data () {
            return {
                value: '',
                timeList: [
                    {
                        value: 1,
                        label: 1
                    },
                    {
                        value: 2,
                        label: 2
                    },
                    {
                        value: 3,
                        label: 3
                    },
                    {
                        value: 4,
                        label: 4
                    },
                    {
                        value: 5,
                        label: 5
                    },
                    {
                        value: 6,
                        label: 6
                    },
                    {
                        value: 7,
                        label: 7
                    },
                    {
                        value: 8,
                        label: 8
                    }
                ],
                model1: '',
                switch1: false
            }
        },
        methods: {
            change (id) {
                this.$Message.info('开关状态：' + status + ",id:" + id);
            }
        }
    };
</script>
<style scoped>
    .expand-row{
        margin-bottom: 16px;
    }
    .planDetail {
        display: flex;
    }
    .planDetail>div {
        flex: 1;
    }
</style>
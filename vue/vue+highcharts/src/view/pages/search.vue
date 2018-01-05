<!--  -->
<template>
  <div>
    <div class="condition">
        <div>
            <span>客户姓名</span>
            <Input class="inputWidth" v-model="value1" placeholder="客户姓名"></Input>
            <span>证件类型</span>
            <Select v-model="model1" style="width:150px;">
                <Option v-for="item in cityList" :value="item.value" :key="item.value">{{ item.label }}</Option>
            </Select>
            <span>证件号</span>
            <Input class="inputWidth" v-model="value2" placeholder="证件号"></Input>
        </div>
        <div>
            <span>保单号</span>
            <Input class="inputWidth" v-model="value3" placeholder="保单号"></Input>
            <span>投保单号</span>
            <Input class="inputWidth" v-model="value4" placeholder="投保单号"></Input>
        </div>
        <Button class="search" type="primary" icon="ios-search">查询</Button>
    </div>
    <div>
        <Table border :columns="columns1" :data="formDatas" :height="400"></Table>
    </div>
  </div>
</template>

<script>
export default {
  data () {
    return {
        cityList: [
            {
                value: '身份证',
                label: '身份证'
            },
            {
                value: '驾驶证',
                label: '驾驶证'
            },
            {
                value: '护照',
                label: '护照'
            }
        ],
        model1: '',
        value1: '',
        value2: '',
        value3: '',
        value4: '',
        columns1: [
            {
                title: 'Name',
                key: 'name'
            },
            {
                title: 'Age',
                key: 'age'
            },
            {
                title: 'Address',
                key: 'address'
            },
            {
                title: 'Detail',
                key: 'detail',
                render: (createElement, params)=> {
                    return createElement('div',[
                        createElement('Button',{
                            props: {
                                type: 'primary',
                                size: 'small'
                            },
                            on: {
                                click: () => {
                                    this.show(params.index)
                                }
                            }
                        },this.filter(params.row))
                    ])
                }
            }
        ],
        formDatas: [
            {'id': 1,'name': 1,'age': 2,'address': 3,'address': 4,'detail': 0},
            {'id': 2,'name': 11,'age': 12,'address': 13,'address': 14,'detail': 0},
            {'id': 3,'name': 21,'age': 22,'address': 23,'address': 24,'detail': 1},
            {'id': 4,'name': 11,'age': 12,'address': 13,'address': 14,'detail': 1},
            {'id': 5,'name': 21,'age': 22,'address': 23,'address': 24,'detail': 0},
            {'id': 6,'name': 11,'age': 12,'address': 13,'address': 14,'detail': 1},
            {'id': 7,'name': 21,'age': 22,'address': 23,'address': 24,'detail': 1},
            {'id': 8,'name': 11,'age': 12,'address': 13,'address': 14,'detail': 0},
            {'id': 9,'name': 21,'age': 22,'address': 23,'address': 24,'detail': 1},
            {'id': 10,'name': 11,'age': 12,'address': 13,'address': 14,'detail': 1},
            {'id': 11,'name': 21,'age': 22,'address': 23,'address': 24,'detail': 1},
            {'id': 12,'name': 11,'age': 12,'address': 13,'address': 14,'detail': 1},
            {'id': 13,'name': 21,'age': 22,'address': 23,'address': 24,'detail': 1}
        ],
        dataId: '',
    };
  },
  methods: {
    show (index) {
        this.$Modal.info({
            title: 'User Info',
            content: `Name：${this.formDatas[index].name}<br>Age：${this.formDatas[index].age}<br>Address：${this.formDatas[index].address}`
        })
    },
    filter(item){
        let text = null;
        if(item.detail === 0){  
            text = "通过"
        }else if(item.detail ===1){
            text = "失败"
        }
        return text
    }
  }
}

</script>

<!-- Add 'scoped' attribute to limit CSS to this component only -->
<style scoped>
    .condition {
        height: 180px;
        padding: 10px 40px;
    }
    .condition>div {
        height: 60px;
        line-height: 60px;
    }
    .condition>div>span {
        width: 60px;
        display: inline-block;
        text-align: right;
        margin-right: 10px;
    }
    .inputWidth {
        width: 150px;
        margin-right: 20px;
    }
    .search {
        float: right;
    }


</style>
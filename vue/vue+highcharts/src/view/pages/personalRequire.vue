<!--  -->
<template>
  <div>
    <div>         
      <div class="model">
        <Icon type="navicon-round"></Icon>
        需求清单列表
      </div>
      <Table border :columns="columns7" :data="data6" :height="240" @on-row-click="personalDetail"></Table>
    </div>
    <personaplan></personaplan>
  </div>
</template>

<script>
import PersonaPlan from "./personalPlan.vue"
    export default {
        data () {
            return {
                columns7: [
                    {
                        title: '需求编号',
                        key: 'code',
                        width: 150,
                        render: (h, params) => {
                            return h('div', [
                                h('strong', params.row.code)
                            ]);
                        }
                    },
                    {
                        title: '标题',
                        key: 'title',
                        width: 200,
                        render: (h, params) => {
                            return h('div', [
                                h('strong', {
                                  style: {
                                    border: 'solid 1px #e09b85',
                                    color: '#e09b85'
                                  }
                                },params.row.title)
                            ]);
                        }
                    },
                    {
                        title: '提出日期',
                        key: 'time',
                        width: 150,
                        sortable: true
                    },
                    {
                        title: '提出人',
                        key: 'people'
                    },
                    {
                        title: '需求部门',
                        key: 'department'
                    }
                ],
                data6: [
                    {
                        code: 'CQ_20171223',
                        title: '关于开发xxx的系统',
                        clock: 1,
                        time: '2017-12-23',
                        people: 'celi',
                        department: '技术部'
                    },
                    {
                        code: 'CQ_20171230',
                        title: '增加。。。',
                        clock: 1,
                        time: '2017-12-30',
                        people: 'celi',
                        department: '技术部'
                    },
                    {
                        code: 'CQ_20171230',
                        title: 'OA系统',
                        clock: 1,
                        time: '2017-12-30',
                        people: 'celi',
                        department: '技术部'
                    },
                    {
                        code: 'CQ_20171230',
                        title: 18,
                        clock: 1,
                        time: '2017-12-30',
                        people: 'celi',
                        department: '技术部'
                    },
                    {
                        code: 'CQ_20171230',
                        title: 18,
                        clock: 1,
                        time: '2017-12-30',
                        people: 'celi',
                        department: '技术部'
                    }
                ]
            }
        },
        components: {
          personaplan: PersonaPlan
        },
        methods: {
          personalDetail (params) {
            console.log(params)
              // this.$Modal.info({
              //     title: 'User Info',
              //     content: `需求编号：${this.data6[index].code}<br>标题：${this.data6[index].title}<br>Address：${this.data6[index].address}`
              // })
          },
          // remove (index) {
          //     this.data6.splice(index, 1);
          // }
        }
    }
</script>

<!-- Add 'scoped' attribute to limit CSS to this component only -->
<style scoped>

</style>
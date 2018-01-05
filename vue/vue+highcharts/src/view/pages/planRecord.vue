<!--  -->
<template>
    <div>
      <div class="planrecord">
        <div>         
          <div class="model">
            <Icon type="navicon-round"></Icon>
            需求清单列表
          </div>
          <Table border :columns="columns7" :data="data6" :height="240"></Table>
          </br>
          <Page :total="100"></Page>

        </div>
      </div>
      <showplan></showplan>
      <div id="calendar"></div> 
    </div>
</template>
<script>
import ShowPlan from "./showPlan.vue"
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
                        title: '锁定',
                        key: 'clock',
                        width: 100,
                        align: 'center',
                        render: (h, params) => {
                            return h('div', [
                                h('Button', {
                                    props: {
                                        type: 'primary',
                                        // size: 'small'
                                         shape: "circle",
                                         icon: "locked"
                                    },
                                    style: {
                                        marginRight: '5px'
                                    },
                                    on: {
                                        clock: () => {
                                            this.show(params.index)
                                        }
                                    }
                                }, 'View')
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
                    },
                    {
                        title: '操作',
                        key: 'action',
                        width: 150,
                        align: 'center',
                        render: (h, params) => {
                            return h('div', [
                                h('Button', {
                                    props: {
                                        type: 'primary',
                                        size: 'small'
                                    },
                                    style: {
                                        marginRight: '5px'
                                    },
                                    on: {
                                        click: () => {
                                            this.publish(params.index)
                                        }
                                    }
                                }, '分配'),
                                h('Button', {
                                    props: {
                                        type: 'error',
                                        size: 'small'
                                    },
                                    on: {
                                        click: () => {
                                            this.show(params.index)
                                        }
                                    }
                                }, '查看')
                            ]);
                        }
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
          showplan: ShowPlan
        },
        methods: {
          clock (index) {
            console.log("clock:" + index)
          },
          publish (index) {
            console.log("publish:" + index);
            $('.calendar').calendar()
          },
          show (index) {
              this.$Modal.info({
                  title: 'User Info',
                  content: `需求编号：${this.data6[index].code}<br>标题：${this.data6[index].title}<br>Address：${this.data6[index].address}`
              })
          },
          // remove (index) {
          //     this.data6.splice(index, 1);
          // }
        }
    }
</script>


<!-- Add 'scoped' attribute to limit CSS to this component only -->
<style scoped>
  .planrecord {
    height: 360px;
    width: calc(100% - 20px);
    padding: 0 10px;
    border: 1px solid #cccccc;
    background-color: #ffffff;
  }
</style>
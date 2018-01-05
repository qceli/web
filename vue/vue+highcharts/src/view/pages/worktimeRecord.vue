<!--  -->
<template>
  <div>
    <div>         
      <div class="model">
        <Icon type="navicon-round"></Icon>
        个人需求列表
      </div>
      <Table :columns="columns10" :data="data9"></Table>
      </br>
      <Button type="success" style="margin-right:20px;">保存</Button>

    </div>
  </div>
</template>

<script>
import expandRow from './expand-row.vue';
    export default {
        components: { expandRow },
        data () {
            return {
                columns10: [
                    {
                        type: 'expand',
                        width: 50,
                        render: (h, params) => {
                            return h(expandRow, {
                                props: {
                                    row: params.row
                                }
                            })
                        }
                    },
                    {
                        title: '需求编号',
                        key: 'code'
                    },
                    {
                        title: '标题',
                        key: 'title'
                    },
                    {
                        title: '负责阶段',
                        key: 'progress',
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
                                }, params.row.progress)
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
                data9: [
                    {
                        id: 1,
                        code: 'CQ_20171223',
                        title: '关于开发xxx的系统',
                        progress: '分析',
                        time: '2017-12-23',
                        people: 'celi',
                        department: '技术部'
                    },
                    {
                        id: 2,
                        code: 'CQ_20171223',
                        title: '增加。。。',
                        progress: '测试',
                        time: '2017-12-23',
                        people: 'celi',
                        department: '技术部'
                    },
                    {
                        id: 3,
                        code: 'CQ_20171223',
                        title: 'OA系统',
                        progress: '开发',
                        time: '2017-12-23',
                        people: 'celi',
                        department: '技术部'
                    },
                    {
                        id: 4,
                        code: 'CQ_20171223',
                        title: '关于开发xxx的系统',
                        progress: '分析',
                        time: '2017-12-23',
                        people: 'celi',
                        department: '技术部'
                    }
                ]
            }
        }
    }

</script>

<!-- Add 'scoped' attribute to limit CSS to this component only -->
<style scoped>

</style>
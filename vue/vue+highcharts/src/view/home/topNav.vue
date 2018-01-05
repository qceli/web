<!--  -->
<template>
  <div>
      <Menu mode="horizontal" :theme="theme" active-name="1" @on-select="onSelect">
        <MenuItem name="search">
            <Icon type="ios-paper"></Icon>
            内容管理
        </MenuItem>
        <MenuItem name="user">
            <Icon type="ios-people"></Icon>
            用户管理
        </MenuItem>
        <Submenu name="3">
            <template slot="title">
                <Icon type="settings"></Icon>
                计划管理
            </template>
            <!-- <MenuGroup title="使用"> -->
                <MenuItem name="planrecord">计划录入</MenuItem>
                <MenuItem name="worktimerecord">工时统计</MenuItem>
            <!-- </MenuGroup> -->
            <!-- <MenuGroup title="留存">
                <MenuItem name="3-4">用户留存</MenuItem>
                <MenuItem name="3-5">流失用户</MenuItem>
            </MenuGroup> -->
        </Submenu>
        <Submenu name="4">
            <template slot="title">
                <Icon type="stats-bars"></Icon>
                需求查看
            </template>
            <!-- <MenuGroup title="留存"> -->
                <MenuItem name="personalrequire">个人需求查看</MenuItem>
                <MenuItem name="quarterrequire">季度需求查看</MenuItem>
                <MenuItem name="requireprogress">需求进度查看</MenuItem>
            <!-- </MenuGroup> -->
        </Submenu>
        <MenuItem style="float:right;" name="login">
            <Icon type="arrow-right-a"></Icon>
            退出
        </MenuItem>
        <MenuItem style="float:right;" name="personal">
            <Icon type="person"></Icon>
            个人中心
        </MenuItem>
    </Menu>
  </div>
</template>

<script>
export default {
    data () {
        return {
            theme: 'dark'
        }
    },
    methods:{
        onSelect(name){
            console.log(name);
            if ( name == 'login' ) {
                this.$store.commit('loginOut', '');
                
            }
            this.$router.push({name:name});
        }
    }
}

</script>

<!-- Add 'scoped' attribute to limit CSS to this component only -->
<style scoped>

</style>
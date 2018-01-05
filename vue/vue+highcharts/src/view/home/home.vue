<template>
    <div>
      <topnav></topnav>
      <div class="content">
        <router-view></router-view>
      </div>
    </div>
</template>
<script>
import topnav from "./topNav.vue"
// import '../../assets/bootstrap/bootstrap-year-calendar.css'
// import '../../assets/bootstrap/bootstrap-year-calendar.js'
export default {
  data () {
      return {
      }
  },   
  components: {
    "topnav": topnav
  },
  methods:{
   
  }
}

</script>
<style>
  .content {
    padding: 10px 20px;
    height: calc(100% - 60px);
    background-color: #f8f8f9;
  }
  .model {
    height: 50px;
    line-height: 50px;
    color: #333333;
    border-bottom: 1px solid #cccccc;
    font-weight: bold;
  }
</style>


<!--  -->
<template>
  <div>
      <Input v-model="value1" placeholder="开始时间" style="width: 150px"></Input>
      <Input v-model="value2" placeholder="结束时间" style="width: 150px"></Input>
      <Button type="ghost" @click="calc">计算</Button>
      <label>时间格式：2014-07-10</label>
      <div>
          <label>{{value3}}</label>
      </div>
  </div>
</template>

<script>
import { calctime } from '../../common/js/util';
export default {
  data () {
    return {
        value1: '',
        value2: '',
        value3: ''
    };
  },

  components: {},

  computed: {},

  methods: {
      calc () {
          console.log("calc");
          let startTime = this.value1;
          let endTime = this.value2;
          return calctime(startTime, endTime)
        // let time1 = Date.parse(new Date(startTime));        // startTime 时间格式：2014-07-10 10:21:12
        // let time2 = Date.parse(new Date(endTime));
        // let time3 = '相差'+Math.abs(parseInt((time2 - time1)/1000/3600/24))+'天';
        // console.log("time3:" + time3)

        //   let starttime = startTime.replace(new RegExp("-","gm"),"/");   // 时间格式：2014-07-10 10:21:12 转换为 2014/12/25 20:11:11
        //   let endtime = endTime.replace(new RegExp("-","gm"),"/");
        //   console.log("starttime:" + starttime + ",endtime:" + endtime)
        //   let starttimeHaoMiao = (new Date(starttime)).getTime();        // starttime 时间格式：2014/12/25 20:11:11
        //   let endtimeHaoMiao = (new Date(endtime)).getTime(); 
        //   console.log("starttimeHaoMiao:" + starttimeHaoMiao + ",endtimeHaoMiao:" + endtimeHaoMiao)
        //   this.value3 = endtimeHaoMiao - starttimeHaoMiao;
      }
  }
}

</script>

<!-- Add 'scoped' attribute to limit CSS to this component only -->
<style scoped>

</style>
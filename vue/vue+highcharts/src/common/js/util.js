export function calctime (startTime, endTime) {                // 时间格式：2014-07-10 10:21:12
    let time1 = Date.parse(new Date(startTime));
    let time2 = Date.parse(new Date(endTime));
    let time3 = '相差'+Math.abs(parseInt((time2 - time1)/1000/3600/24))+'天';
    console.log("time3:" + time3)

}
export function calcTime (startTime, endTime) {

    let starttime = startTime.replace(new RegExp("-","gm"),"/");   // 时间格式：2014-07-10 10:21:12 转换为 2014/12/25 20:11:11
    let endtime = endTime.replace(new RegExp("-","gm"),"/");
    console.log("starttime:" + starttime + ",endtime:" + endtime)
    let starttimeHaoMiao = (new Date(starttime)).getTime();        // starttime 时间格式：2014/12/25 20:11:11, 得到毫秒数  
    let endtimeHaoMiao = (new Date(endtime)).getTime(); 
    console.log("starttimeHaoMiao:" + starttimeHaoMiao + ",endtimeHaoMiao:" + endtimeHaoMiao)
    this.value3 = endtimeHaoMiao - starttimeHaoMiao;
}

// export {
//     calctime,
//     calcTime
// }

// 默认数据长度初始值为零
var lengthall = 0;
// 默认数据出事长度为零
// 获取数据
var date = [];
var date1 = [];
// 备用数组
var date2 = ["https://api.smalltown.wshoto.com/Public/screen/image/1.jpg", "https://api.smalltown.wshoto.com/Public/screen/image/2.jpg", "https://api.smalltown.wshoto.com/Public/screen/image/3.jpg", "https://api.smalltown.wshoto.com/Public/screen/image/4.jpg", "https://api.smalltown.wshoto.com/Public/screen/image/5.jpg", "https://api.smalltown.wshoto.com/Public/screen/image/6.jpg", "https://api.smalltown.wshoto.com/Public/screen/image/7.jpg", "https://api.smalltown.wshoto.com/Public/screen/image/8.jpg", "https://api.smalltown.wshoto.com/Public/screen/image/9.jpg", "https://api.smalltown.wshoto.com/Public/screen/image/10.jpg",
    "https://api.smalltown.wshoto.com/Public/screen/image/11.jpg", "https://api.smalltown.wshoto.com/Public/screen/image/12.jpg", "https://api.smalltown.wshoto.com/Public/screen/image/13.jpg", "https://api.smalltown.wshoto.com/Public/screen/image/14.jpg", "https://api.smalltown.wshoto.com/Public/screen/image/15.jpg", "https://api.smalltown.wshoto.com/Public/screen/image/16.jpg", "https://api.smalltown.wshoto.com/Public/screen/image/17.jpg", "https://api.smalltown.wshoto.com/Public/screen/image/18.jpg", "https://api.smalltown.wshoto.com/Public/screen/image/19.jpg", "https://api.smalltown.wshoto.com/Public/screen/image/20.jpg",
    "https://api.smalltown.wshoto.com/Public/screen/image/21.jpg", "https://api.smalltown.wshoto.com/Public/screen/image/22.jpg", "https://api.smalltown.wshoto.com/Public/screen/image/23.jpg", "https://api.smalltown.wshoto.com/Public/screen/image/24.jpg", "https://api.smalltown.wshoto.com/Public/screen/image/25.jpg", "https://api.smalltown.wshoto.com/Public/screen/image/26.jpg", "https://api.smalltown.wshoto.com/Public/screen/image/27.jpg", "https://api.smalltown.wshoto.com/Public/screen/image/28.jpg", "https://api.smalltown.wshoto.com/Public/screen/image/29.jpg", "https://api.smalltown.wshoto.com/Public/screen/image/30.jpg",
    "https://api.smalltown.wshoto.com/Public/screen/image/31.jpg", "https://api.smalltown.wshoto.com/Public/screen/image/32.jpg", "https://api.smalltown.wshoto.com/Public/screen/image/33.jpg", "https://api.smalltown.wshoto.com/Public/screen/image/34.jpg", "https://api.smalltown.wshoto.com/Public/screen/image/35.jpg", "https://api.smalltown.wshoto.com/Public/screen/image/36.jpg", "https://api.smalltown.wshoto.com/Public/screen/image/37.jpg", "https://api.smalltown.wshoto.com/Public/screen/image/38.jpg", "https://api.smalltown.wshoto.com/Public/screen/image/39.jpg", "https://api.smalltown.wshoto.com/Public/screen/image/40.jpg",
    "https://api.smalltown.wshoto.com/Public/screen/image/41.jpg", "https://api.smalltown.wshoto.com/Public/screen/image/42.jpg", "https://api.smalltown.wshoto.com/Public/screen/image/43.jpg", "https://api.smalltown.wshoto.com/Public/screen/image/44.jpg", "https://api.smalltown.wshoto.com/Public/screen/image/45.jpg", "https://api.smalltown.wshoto.com/Public/screen/image/46.jpg", "https://api.smalltown.wshoto.com/Public/screen/image/47.jpg", "https://api.smalltown.wshoto.com/Public/screen/image/48.jpg", "https://api.smalltown.wshoto.com/Public/screen/image/49.jpg", "https://api.smalltown.wshoto.com/Public/screen/image/50.jpg",
    "https://api.smalltown.wshoto.com/Public/screen/image/51.jpg", "https://api.smalltown.wshoto.com/Public/screen/image/52.jpg", "https://api.smalltown.wshoto.com/Public/screen/image/53.jpg", "https://api.smalltown.wshoto.com/Public/screen/image/54.jpg", "https://api.smalltown.wshoto.com/Public/screen/image/55.jpg", "https://api.smalltown.wshoto.com/Public/screen/image/56.jpg", "https://api.smalltown.wshoto.com/Public/screen/image/57.jpg", "https://api.smalltown.wshoto.com/Public/screen/image/58.jpg", "https://api.smalltown.wshoto.com/Public/screen/image/59.jpg", "https://api.smalltown.wshoto.com/Public/screen/image/60.jpg",
    "https://api.smalltown.wshoto.com/Public/screen/image/61.jpg", "https://api.smalltown.wshoto.com/Public/screen/image/62.jpg", "https://api.smalltown.wshoto.com/Public/screen/image/63.jpg", "https://api.smalltown.wshoto.com/Public/screen/image/64.jpg", "https://api.smalltown.wshoto.com/Public/screen/image/65.jpg", "https://api.smalltown.wshoto.com/Public/screen/image/66.jpg", "https://api.smalltown.wshoto.com/Public/screen/image/67.jpg", "https://api.smalltown.wshoto.com/Public/screen/image/68.jpg", "https://api.smalltown.wshoto.com/Public/screen/image/69.jpg", "https://api.smalltown.wshoto.com/Public/screen/image/70.jpg",
    "https://api.smalltown.wshoto.com/Public/screen/image/71.jpg", "https://api.smalltown.wshoto.com/Public/screen/image/72.jpg", "https://api.smalltown.wshoto.com/Public/screen/image/73.jpg", "https://api.smalltown.wshoto.com/Public/screen/image/74.jpg", "https://api.smalltown.wshoto.com/Public/screen/image/75.jpg", "https://api.smalltown.wshoto.com/Public/screen/image/76.jpg", "https://api.smalltown.wshoto.com/Public/screen/image/77.jpg", "https://api.smalltown.wshoto.com/Public/screen/image/78.jpg", "https://api.smalltown.wshoto.com/Public/screen/image/79.jpg", "https://api.smalltown.wshoto.com/Public/screen/image/80.jpg",
    "https://api.smalltown.wshoto.com/Public/screen/image/81.jpg", "https://api.smalltown.wshoto.com/Public/screen/image/82.jpg", "https://api.smalltown.wshoto.com/Public/screen/image/83.jpg", "https://api.smalltown.wshoto.com/Public/screen/image/84.jpg", "https://api.smalltown.wshoto.com/Public/screen/image/85.jpg", "https://api.smalltown.wshoto.com/Public/screen/image/86.jpg", "https://api.smalltown.wshoto.com/Public/screen/image/87.jpg", "https://api.smalltown.wshoto.com/Public/screen/image/88.jpg", "https://api.smalltown.wshoto.com/Public/screen/image/89.jpg", "https://api.smalltown.wshoto.com/Public/screen/image/90.jpg",
    "https://api.smalltown.wshoto.com/Public/screen/image/91.jpg", "https://api.smalltown.wshoto.com/Public/screen/image/92.jpg", "https://api.smalltown.wshoto.com/Public/screen/image/93.jpg", "https://api.smalltown.wshoto.com/Public/screen/image/94.jpg", "https://api.smalltown.wshoto.com/Public/screen/image/95.jpg", "https://api.smalltown.wshoto.com/Public/screen/image/96.jpg", "https://api.smalltown.wshoto.com/Public/screen/image/97.jpg", "https://api.smalltown.wshoto.com/Public/screen/image/98.jpg", "https://api.smalltown.wshoto.com/Public/screen/image/99.jpg", "https://api.smalltown.wshoto.com/Public/screen/image/100.jpg",
    "https://api.smalltown.wshoto.com/Public/screen/image/101.jpg", "https://api.smalltown.wshoto.com/Public/screen/image/102.jpg", "https://api.smalltown.wshoto.com/Public/screen/image/103.jpg", "https://api.smalltown.wshoto.com/Public/screen/image/104.jpg", "https://api.smalltown.wshoto.com/Public/screen/image/105.jpg", "https://api.smalltown.wshoto.com/Public/screen/image/106.jpg", "https://api.smalltown.wshoto.com/Public/screen/image/107.jpg", "https://api.smalltown.wshoto.com/Public/screen/image/108.jpg", "https://api.smalltown.wshoto.com/Public/screen/image/109.jpg", "https://api.smalltown.wshoto.com/Public/screen/image/110.jpg",
    "https://api.smalltown.wshoto.com/Public/screen/image/111.jpg", "https://api.smalltown.wshoto.com/Public/screen/image/112.jpg", "https://api.smalltown.wshoto.com/Public/screen/image/113.jpg", "https://api.smalltown.wshoto.com/Public/screen/image/114.jpg", "https://api.smalltown.wshoto.com/Public/screen/image/115.jpg", "https://api.smalltown.wshoto.com/Public/screen/image/116.jpg", "https://api.smalltown.wshoto.com/Public/screen/image/117.jpg", "https://api.smalltown.wshoto.com/Public/screen/image/118.jpg", "https://api.smalltown.wshoto.com/Public/screen/image/119.jpg", "https://api.smalltown.wshoto.com/Public/screen/image/120.jpg",
    "https://api.smalltown.wshoto.com/Public/screen/image/121.jpg", "https://api.smalltown.wshoto.com/Public/screen/image/122.jpg", "https://api.smalltown.wshoto.com/Public/screen/image/123.jpg", "https://api.smalltown.wshoto.com/Public/screen/image/124.jpg", "https://api.smalltown.wshoto.com/Public/screen/image/125.jpg", "https://api.smalltown.wshoto.com/Public/screen/image/126.jpg", "https://api.smalltown.wshoto.com/Public/screen/image/127.jpg", "https://api.smalltown.wshoto.com/Public/screen/image/128.jpg", "https://api.smalltown.wshoto.com/Public/screen/image/129.jpg", "https://api.smalltown.wshoto.com/Public/screen/image/130.jpg",
    "https://api.smalltown.wshoto.com/Public/screen/image/131.jpg", "https://api.smalltown.wshoto.com/Public/screen/image/132.jpg", "https://api.smalltown.wshoto.com/Public/screen/image/133.jpg", "https://api.smalltown.wshoto.com/Public/screen/image/134.jpg", "https://api.smalltown.wshoto.com/Public/screen/image/135.jpg", "https://api.smalltown.wshoto.com/Public/screen/image/136.jpg", "https://api.smalltown.wshoto.com/Public/screen/image/137.jpg", "https://api.smalltown.wshoto.com/Public/screen/image/138.jpg", "https://api.smalltown.wshoto.com/Public/screen/image/139.jpg", "https://api.smalltown.wshoto.com/Public/screen/image/140.jpg",
    "https://api.smalltown.wshoto.com/Public/screen/image/141.jpg", "https://api.smalltown.wshoto.com/Public/screen/image/142.jpg", "https://api.smalltown.wshoto.com/Public/screen/image/143.jpg", "https://api.smalltown.wshoto.com/Public/screen/image/144.jpg", "https://api.smalltown.wshoto.com/Public/screen/image/145.jpg", "https://api.smalltown.wshoto.com/Public/screen/image/146.jpg", "https://api.smalltown.wshoto.com/Public/screen/image/147.jpg", "https://api.smalltown.wshoto.com/Public/screen/image/148.jpg", "https://api.smalltown.wshoto.com/Public/screen/image/149.jpg", "https://api.smalltown.wshoto.com/Public/screen/image/150.jpg",
    "https://api.smalltown.wshoto.com/Public/screen/image/151.jpg", "https://api.smalltown.wshoto.com/Public/screen/image/152.jpg", "https://api.smalltown.wshoto.com/Public/screen/image/153.jpg", "https://api.smalltown.wshoto.com/Public/screen/image/154.jpg", "https://api.smalltown.wshoto.com/Public/screen/image/155.jpg", "https://api.smalltown.wshoto.com/Public/screen/image/156.jpg", "https://api.smalltown.wshoto.com/Public/screen/image/157.jpg", "https://api.smalltown.wshoto.com/Public/screen/image/158.jpg", "https://api.smalltown.wshoto.com/Public/screen/image/159.jpg", "https://api.smalltown.wshoto.com/Public/screen/image/160.jpg",
    "https://api.smalltown.wshoto.com/Public/screen/image/161.jpg", "https://api.smalltown.wshoto.com/Public/screen/image/162.jpg", "https://api.smalltown.wshoto.com/Public/screen/image/163.jpg", "https://api.smalltown.wshoto.com/Public/screen/image/164.jpg", "https://api.smalltown.wshoto.com/Public/screen/image/165.jpg", "https://api.smalltown.wshoto.com/Public/screen/image/166.jpg", "https://api.smalltown.wshoto.com/Public/screen/image/167.jpg", "https://api.smalltown.wshoto.com/Public/screen/image/168.jpg", "https://api.smalltown.wshoto.com/Public/screen/image/169.jpg", "https://api.smalltown.wshoto.com/Public/screen/image/170.jpg",
    "https://api.smalltown.wshoto.com/Public/screen/image/171.jpg", "https://api.smalltown.wshoto.com/Public/screen/image/172.jpg", "https://api.smalltown.wshoto.com/Public/screen/image/173.jpg", "https://api.smalltown.wshoto.com/Public/screen/image/174.jpg", "https://api.smalltown.wshoto.com/Public/screen/image/175.jpg", "https://api.smalltown.wshoto.com/Public/screen/image/176.jpg", "https://api.smalltown.wshoto.com/Public/screen/image/177.jpg", "https://api.smalltown.wshoto.com/Public/screen/image/178.jpg", "https://api.smalltown.wshoto.com/Public/screen/image/179.jpg", "https://api.smalltown.wshoto.com/Public/screen/image/180.jpg",
    "https://api.smalltown.wshoto.com/Public/screen/image/181.jpg", "https://api.smalltown.wshoto.com/Public/screen/image/182.jpg", "https://api.smalltown.wshoto.com/Public/screen/image/183.jpg", "https://api.smalltown.wshoto.com/Public/screen/image/184.jpg", "https://api.smalltown.wshoto.com/Public/screen/image/185.jpg", "https://api.smalltown.wshoto.com/Public/screen/image/186.jpg", "https://api.smalltown.wshoto.com/Public/screen/image/187.jpg", "https://api.smalltown.wshoto.com/Public/screen/image/188.jpg", "https://api.smalltown.wshoto.com/Public/screen/image/189.jpg", "https://api.smalltown.wshoto.com/Public/screen/image/190.jpg",
    "https://api.smalltown.wshoto.com/Public/screen/image/191.jpg", "https://api.smalltown.wshoto.com/Public/screen/image/192.jpg", "https://api.smalltown.wshoto.com/Public/screen/image/193.jpg", "https://api.smalltown.wshoto.com/Public/screen/image/194.jpg", "https://api.smalltown.wshoto.com/Public/screen/image/195.jpg", "https://api.smalltown.wshoto.com/Public/screen/image/196.jpg", "https://api.smalltown.wshoto.com/Public/screen/image/197.jpg", "https://api.smalltown.wshoto.com/Public/screen/image/198.jpg", "https://api.smalltown.wshoto.com/Public/screen/image/199.jpg", "https://api.smalltown.wshoto.com/Public/screen/image/200.jpg",
    "https://api.smalltown.wshoto.com/Public/screen/image/201.jpg", "https://api.smalltown.wshoto.com/Public/screen/image/202.jpg", "https://api.smalltown.wshoto.com/Public/screen/image/203.jpg", "https://api.smalltown.wshoto.com/Public/screen/image/204.jpg", "https://api.smalltown.wshoto.com/Public/screen/image/206.jpg", "https://api.smalltown.wshoto.com/Public/screen/image/207.jpg", "https://api.smalltown.wshoto.com/Public/screen/image/208.jpg", "https://api.smalltown.wshoto.com/Public/screen/image/209.jpg", "https://api.smalltown.wshoto.com/Public/screen/image/210.jpg",
    "https://api.smalltown.wshoto.com/Public/screen/image/211.jpg", "https://api.smalltown.wshoto.com/Public/screen/image/212.jpg", "https://api.smalltown.wshoto.com/Public/screen/image/213.jpg", "https://api.smalltown.wshoto.com/Public/screen/image/214.jpg", "https://api.smalltown.wshoto.com/Public/screen/image/215.jpg", "https://api.smalltown.wshoto.com/Public/screen/image/216.jpg", "https://api.smalltown.wshoto.com/Public/screen/image/217.jpg", "https://api.smalltown.wshoto.com/Public/screen/image/218.jpg", "https://api.smalltown.wshoto.com/Public/screen/image/219.jpg", "https://api.smalltown.wshoto.com/Public/screen/image/220.jpg",
    "https://api.smalltown.wshoto.com/Public/screen/image/221.jpg", "https://api.smalltown.wshoto.com/Public/screen/image/222.jpg", "https://api.smalltown.wshoto.com/Public/screen/image/223.jpg", "https://api.smalltown.wshoto.com/Public/screen/image/224.jpg", "https://api.smalltown.wshoto.com/Public/screen/image/225.jpg", "https://api.smalltown.wshoto.com/Public/screen/image/226.jpg", "https://api.smalltown.wshoto.com/Public/screen/image/227.jpg", "https://api.smalltown.wshoto.com/Public/screen/image/228.jpg", "https://api.smalltown.wshoto.com/Public/screen/image/229.jpg", "https://api.smalltown.wshoto.com/Public/screen/image/230.jpg",
    "https://api.smalltown.wshoto.com/Public/screen/image/231.jpg", "https://api.smalltown.wshoto.com/Public/screen/image/232.jpg", "https://api.smalltown.wshoto.com/Public/screen/image/233.jpg", "https://api.smalltown.wshoto.com/Public/screen/image/234.jpg", "https://api.smalltown.wshoto.com/Public/screen/image/235.jpg", "https://api.smalltown.wshoto.com/Public/screen/image/236.jpg"
];

$(".all").bind("dblclick", function () {
    location.href = location;
})
$(function(){
    $(document).keydown(function(e){
        var e = e ||window.event;
        if(e.keyCode === 32){
                $(".music")[0].play();
                setTimeout(function () {
                    var first = setInterval(function () {
                        clearInterval(first);
                        first = '';
                        var test11 = setInterval(test1, 300);
                        setTimeout(function () {
                            clearInterval(test11);
                        }, 3000);
                        setTimeout(function () {
                            var test22 = setInterval(test2, 250);
                            setTimeout(function () {
                                clearInterval(test22);
                            }, 5000);
                        }, 3000);
                        setTimeout(function () {
                            var test33 = setInterval(test3, 200);
                            setTimeout(function () {
                                clearInterval(test33);
                            }, 5000);
                        }, 7000);
                        // 增加四个阶段，累计一下获取一次数据拼上去，然后运行！

                        setTimeout(function () {
                            var test44 = setInterval(test4, 150);
                            setTimeout(function () {
                                clearInterval(test44);
                            }, 500);
                        }, 12000);
                        // 第二次拼接
                        setTimeout(function () {
                            var test66 = setInterval(test6, 150);
                            setTimeout(function () {
                                clearInterval(test66);
                            }, 4000);
                        }, 12500);      
                        // 第二次获取
                        setTimeout(function () {
                            var test44 = setInterval(test4, 100);
                            setTimeout(function () {
                                clearInterval(test44);
                            }, 500);
                        }, 16500);
                        // 第三次拼接
                        setTimeout(function () {
                            var test77 = setInterval(test7, 100);
                            setTimeout(function () {
                                clearInterval(test77);
                            }, 6000);
                        }, 17000);  
                        // 第四次获取
                        setTimeout(function () {
                            var test44 = setInterval(test4, 50);
                            setTimeout(function () {
                                clearInterval(test44);
                            }, 500);
                        }, 23000);
                        // 第四次拼接
                        setTimeout(function () {
                            var test88 = setInterval(test8, 50);
                            setTimeout(function () {
                                clearInterval(test88);
                            }, 6000);
                        }, 23500);  
                        // 第五次获取
                        setTimeout(function () {
                            var test44 = setInterval(test4, 50);
                            setTimeout(function () {
                                clearInterval(test44);
                            }, 500);
                        }, 29500);                      
                        setTimeout(function () {
                            var test55 = setInterval(test5, 50);
                            setTimeout(function () {
                                clearInterval(test55);
                            }, 14000);
                        }, 30000);
        
                    }, 1000);
                }, 3000);
            
        }
    })
})
// 设置获取数据的时间间隔
// 假定每张图片的初始宽度10px，高度为10；
var startwidth = 10;
var startheight = 10;
// 获取浏览器视口的宽度和高度
var bodyWidth = document.body.clientWidth;
var bodyHeight = document.body.clientHeight;
// 获取中心点坐标作为八边形和圆的中心坐标；以二维码的中心为中心
// 获取二维码的宽度；
var erweimawidth = $(".turn1").width();
var erweimaheight = $(".turn1").height();
var x = $(".turn1").position().left + erweimawidth / 2;
var y = -($(".turn1").position().top + erweimaheight / 2);
// 二维码空白内边距
// 左边距
var a = 23.9;
// 上边距
var b = 26.0;
// 每一个方格的宽高，因为宽=高，所以设一个变量
var c = 11;
var num = [
    { left: a, top: b + 0 * c }, { left: a + c, top: b + 0 * c }, { left: a + 2 * c, top: b + 0 * c }, { left: a + 3 * c, top: b + 0 * c }, { left: a + 4 * c, top: b }, { left: a + 5 * c, top: b + 0 * c }, { left: a + 6 * c, top: b + 0 * c }, , { left: a + 9 * c, top: b + 0 * c }, { left: a + 15 * c, top: b + 0 * c }, { left: a + 16 * c, top: b + 0 * c }, { left: a + 18 * c, top: b + 0 * c }, { left: a + 19 * c, top: b + 0 * c }, { left: a + 20 * c, top: b + 0 * c }, { left: a + 21 * c, top: b + 0 * c }, { left: a + 22 * c, top: b + 0 * c }, { left: a + 23 * c, top: b + 0 * c }, { left: a + 24 * c, top: b + 0 * c },
    { left: a, top: b + 1 * c }, { left: a + 6 * c, top: b + 1 * c }, { left: a + 9 * c, top: b + 1 * c }, { left: a + 11 * c, top: b + 1 * c }, { left: a + 13 * c, top: b + 1 * c }, { left: a + 14 * c, top: b + 1 * c }, { left: a + 16 * c, top: b + 1 * c }, { left: a + 18 * c, top: b + 1 * c }, { left: a + 24 * c, top: b + 1 * c },
    { left: a, top: b + 2 * c }, { left: a + 2 * c, top: b + 2 * c }, { left: a + 3 * c, top: b + 2 * c }, { left: a + 4 * c, top: b + 2 * c }, { left: a + 6 * c, top: b + 2 * c }, { left: a + 9 * c, top: b + 2 * c }, { left: a + 11 * c, top: b + 2 * c }, { left: a + 14 * c, top: b + 2 * c }, { left: a + 15 * c, top: b + 2 * c }, { left: a + 16 * c, top: b + 2 * c }, { left: a + 18 * c, top: b + 2 * c }, { left: a + 20 * c, top: b + 2 * c }, { left: a + 21 * c, top: b + 2 * c }, { left: a + 22 * c, top: b + 2 * c }, { left: a + 24 * c, top: b + 2 * c },
    { left: a, top: b + 3 * c }, { left: a + 2 * c, top: b + 3 * c }, { left: a + 3 * c, top: b + 3 * c }, { left: a + 4 * c, top: b + 3 * c }, { left: a + 6 * c, top: b + 3 * c }, { left: a + 8 * c, top: b + 3 * c }, { left: a + 11 * c, top: b + 3 * c }, { left: a + 12 * c, top: b + 3 * c }, { left: a + 14 * c, top: b + 3 * c }, { left: a + 18 * c, top: b + 3 * c }, { left: a + 20 * c, top: b + 3 * c }, { left: a + 21 * c, top: b + 3 * c }, { left: a + 22 * c, top: b + 3 * c }, { left: a + 24 * c, top: b + 3 * c },
    { left: a, top: b + 4 * c }, { left: a + 2 * c, top: b + 4 * c }, { left: a + 3 * c, top: b + 4 * c }, { left: a + 4 * c, top: b + 4 * c }, { left: a + 6 * c, top: b + 4 * c }, { left: a + 10 * c, top: b + 4 * c }, { left: a + 12 * c, top: b + 4 * c }, { left: a + 13 * c, top: b + 4 * c }, { left: a + 14 * c, top: b + 4 * c }, { left: a + 15 * c, top: b + 4 * c }, { left: a + 18 * c, top: b + 4 * c }, { left: a + 20 * c, top: b + 4 * c }, { left: a + 21 * c, top: b + 4 * c }, { left: a + 22 * c, top: b + 4 * c }, { left: a + 24 * c, top: b + 4 * c },
    { left: a, top: b + 5 * c }, { left: a + 6 * c, top: b + 5 * c }, { left: a + 8 * c, top: b + 5 * c }, { left: a + 10 * c, top: b + 5 * c }, { left: a + 11 * c, top: b + 5 * c }, { left: a + 12 * c, top: b + 5 * c }, { left: a + 15 * c, top: b + 5 * c }, { left: a + 18 * c, top: b + 5 * c }, { left: a + 24 * c, top: b + 5 * c },
    { left: a, top: b + 6 * c }, { left: a + c, top: b + 6 * c }, { left: a + 2 * c, top: b + 6 * c }, { left: a + 3 * c, top: b + 6 * c }, { left: a + 4 * c, top: b + 6 * c }, { left: a + 5 * c, top: b + 6 * c }, { left: a + 6 * c, top: b + 6 * c }, { left: a + 8 * c, top: b + 6 * c }, { left: a + 10 * c, top: b + 6 * c }, { left: a + 12 * c, top: b + 6 * c }, { left: a + 14 * c, top: b + 6 * c }, { left: a + 16 * c, top: b + 6 * c }, { left: a + 18 * c, top: b + 6 * c }, { left: a + 19 * c, top: b + 6 * c }, { left: a + 20 * c, top: b + 6 * c }, { left: a + 21 * c, top: b + 6 * c }, { left: a + 22 * c, top: b + 6 * c }, { left: a + 23 * c, top: b + 6 * c }, { left: a + 24 * c, top: b + 6 * c },
    { left: a + 8 * c, top: b + 7 * c }, { left: a + 11 * c, top: b + 7 * c }, { left: a + 14 * c, top: b + 7 * c }, { left: a + 15 * c, top: b + 7 * c }, { left: a + 16 * c, top: b + 7 * c },
    { left: a + c, top: b + 08 * c }, { left: a + 2 * c, top: b + 08 * c }, { left: a + 6 * c, top: b + 08 * c }, { left: a + 9 * c, top: b + 08 * c }, { left: a + 10 * c, top: b + 08 * c }, { left: a + 13 * c, top: b + 08 * c }, { left: a + 14 * c, top: b + 08 * c }, { left: a + 16 * c, top: b + 08 * c }, { left: a + 18 * c, top: b + 08 * c }, { left: a + 19 * c, top: b + 08 * c }, { left: a + 21 * c, top: b + 08 * c },
    { left: a, top: b + 09 * c }, { left: a + 2 * c, top: b + 09 * c }, { left: a + 3 * c, top: b + 09 * c }, { left: a + 8 * c, top: b + 09 * c }, { left: a + 9 * c, top: b + 09 * c }, { left: a + 12 * c, top: b + 09 * c }, { left: a + 13 * c, top: b + 09 * c }, { left: a + 14 * c, top: b + 09 * c }, { left: a + 18 * c, top: b + 09 * c }, { left: a + 19 * c, top: b + 09 * c }, { left: a + 20 * c, top: b + 09 * c }, { left: a + 24 * c, top: b + 09 * c },

    { left: a, top: b + 10 * c }, { left: a + c, top: b + 10 * c }, { left: a + 5 * c, top: b + 10 * c }, { left: a + 6 * c, top: b + 10 * c }, { left: a + 9 * c, top: b + 10 * c }, { left: a + 10 * c, top: b + 10 * c }, { left: a + 15 * c, top: b + 10 * c }, { left: a + 17 * c, top: b + 10 * c }, , { left: a + 20 * c, top: b + 10 * c }, { left: a + 21 * c, top: b + 10 * c }, { left: a + 22 * c, top: b + 10 * c }, { left: a + 23 * c, top: b + 10 * c },

    { left: a, top: b + 11 * c }, { left: a + 3 * c, top: b + 11 * c }, { left: a + 4 * c, top: b + 11 * c }, { left: a + 5 * c, top: b + 11 * c }, { left: a + 7 * c, top: b + 11 * c }, { left: a + 9 * c, top: b + 11 * c }, { left: a + 10 * c, top: b + 11 * c }, { left: a + 11 * c, top: b + 11 * c }, { left: a + 13 * c, top: b + 11 * c }, { left: a + 20 * c, top: b + 11 * c }, { left: a + 21 * c, top: b + 11 * c }, { left: a + 22 * c, top: b + 11 * c }, { left: a + 23 * c, top: b + 11 * c }, { left: a + 24 * c, top: b + 11 * c },
    { left: a + 2 * c, top: b + 12 * c }, { left: a + 3 * c, top: b + 12 * c }, { left: a + 5 * c, top: b + 12 * c }, { left: a + 6 * c, top: b + 12 * c }, { left: a + 8 * c, top: b + 12 * c }, { left: a + 10 * c, top: b + 12 * c }, { left: a + 12 * c, top: b + 12 * c }, { left: a + 13 * c, top: b + 12 * c }, { left: a + 15 * c, top: b + 12 * c }, { left: a + 17 * c, top: b + 12 * c }, { left: a + 19 * c, top: b + 12 * c }, { left: a + 21 * c, top: b + 12 * c }, { left: a + 22 * c, top: b + 12 * c }, { left: a + 24 * c, top: b + 12 * c },

    { left: a + c, top: b + 13 * c }, { left: a + 2 * c, top: b + 13 * c }, { left: a + 8 * c, top: b + 13 * c }, { left: a + 9 * c, top: b + 13 * c }, { left: a + 10 * c, top: b + 13 * c }, { left: a + 20 * c, top: b + 13 * c }, { left: a + 22 * c, top: b + 13 * c }, { left: a + 23 * c, top: b + 13 * c },

    { left: a, top: b + 14 * c }, { left: a + c, top: b + 14 * c }, { left: a + 3 * c, top: b + 14 * c }, { left: a + 4 * c, top: b + 14 * c }, { left: a + 6 * c, top: b + 14 * c }, { left: a + 9 * c, top: b + 14 * c }, { left: a + 11 * c, top: b + 14 * c }, { left: a + 12 * c, top: b + 14 * c }, { left: a + 14 * c, top: b + 14 * c }, { left: a + 17 * c, top: b + 14 * c }, { left: a + 18 * c, top: b + 14 * c }, { left: a + 20 * c, top: b + 14 * c }, { left: a + 22 * c, top: b + 14 * c }, { left: a + 23 * c, top: b + 14 * c },

    { left: a + 5 * c, top: b + 15 * c }, { left: a + 9 * c, top: b + 15 * c }, { left: a + 11 * c, top: b + 15 * c }, { left: a + 12 * c, top: b + 15 * c }, { left: a + 13 * c, top: b + 15 * c }, { left: a + 14 * c, top: b + 15 * c }, { left: a + 16 * c, top: b + 15 * c }, { left: a + 17 * c, top: b + 15 * c }, { left: a + 20 * c, top: b + 15 * c }, { left: a + 22 * c, top: b + 15 * c }, { left: a + 24 * c, top: b + 15 * c },

    { left: a, top: b + 16 * c }, { left: a + c, top: b + 16 * c }, { left: a + 6 * c, top: b + 16 * c }, { left: a + 7 * c, top: b + 16 * c }, { left: a + 10 * c, top: b + 16 * c }, { left: a + 12 * c, top: b + 16 * c }, { left: a + 13 * c, top: b + 16 * c }, { left: a + 16 * c, top: b + 16 * c }, { left: a + 17 * c, top: b + 16 * c }, { left: a + 18 * c, top: b + 16 * c }, { left: a + 19 * c, top: b + 16 * c }, { left: a + 20 * c, top: b + 16 * c }, { left: a + 22 * c, top: b + 16 * c }, { left: a + 24 * c, top: b + 16 * c },

    { left: a + 8 * c, top: b + 17 * c }, { left: a + 10 * c, top: b + 17 * c }, { left: a + 11 * c, top: b + 17 * c }, { left: a + 14 * c, top: b + 17 * c }, { left: a + 15 * c, top: b + 17 * c }, { left: a + 16 * c, top: b + 17 * c }, { left: a + 20 * c, top: b + 17 * c }, { left: a + 21 * c, top: b + 17 * c }, { left: a + 24 * c, top: b + 17 * c },

    { left: a, top: b + 18 * c }, { left: a + c, top: b + 18 * c }, { left: a + 2 * c, top: b + 18 * c }, { left: a + 3 * c, top: b + 18 * c }, { left: a + 4 * c, top: b + 18 * c }, { left: a + 5 * c, top: b + 18 * c }, { left: a + 6 * c, top: b + 18 * c }, { left: a + 9 * c, top: b + 18 * c }, { left: a + 11 * c, top: b + 18 * c }, { left: a + 13 * c, top: b + 18 * c }, { left: a + 16 * c, top: b + 18 * c }, { left: a + 18 * c, top: b + 18 * c }, { left: a + 20 * c, top: b + 18 * c }, { left: a + 21 * c, top: b + 18 * c }, { left: a + 22 * c, top: b + 18 * c }, { left: a + 23 * c, top: b + 18 * c }, { left: a + 24 * c, top: b + 18 * c },

    { left: a, top: b + 19 * c }, { left: a + 6 * c, top: b + 19 * c }, { left: a + 11 * c, top: b + 19 * c }, { left: a + 12 * c, top: b + 19 * c }, { left: a + 13 * c, top: b + 19 * c }, { left: a + 16 * c, top: b + 19 * c }, { left: a + 20 * c, top: b + 19 * c }, { left: a + 22 * c, top: b + 19 * c }, { left: a + 23 * c, top: b + 19 * c }, { left: a + 24 * c, top: b + 19 * c },

    { left: a, top: b + 20 * c }, { left: a + 2 * c, top: b + 20 * c }, { left: a + 3 * c, top: b + 20 * c }, { left: a + 4 * c, top: b + 20 * c }, { left: a + 6 * c, top: b + 20 * c }, { left: a + 14 * c, top: b + 20 * c }, { left: a + 16 * c, top: b + 20 * c }, { left: a + 17 * c, top: b + 20 * c }, { left: a + 18 * c, top: b + 20 * c }, { left: a + 19 * c, top: b + 20 * c }, { left: a + 20 * c, top: b + 20 * c }, { left: a + 21 * c, top: b + 20 * c },

    { left: a, top: b + 21 * c }, { left: a + 2 * c, top: b + 21 * c }, { left: a + 3 * c, top: b + 21 * c }, { left: a + 4 * c, top: b + 21 * c }, { left: a + 6 * c, top: b + 21 * c }, { left: a + 9 * c, top: b + 21 * c }, { left: a + 10 * c, top: b + 21 * c }, { left: a + 11 * c, top: b + 21 * c }, { left: a + 12 * c, top: b + 21 * c }, { left: a + 13 * c, top: b + 21 * c }, { left: a + 15 * c, top: b + 21 * c }, { left: a + 16 * c, top: b + 21 * c }, { left: a + 18 * c, top: b + 21 * c },

    { left: a, top: b + 22 * c }, { left: a + 2 * c, top: b + 22 * c }, { left: a + 3 * c, top: b + 22 * c }, { left: a + 4 * c, top: b + 22 * c }, { left: a + 6 * c, top: b + 22 * c }, { left: a + 8 * c, top: b + 22 * c }, { left: a + 9 * c, top: b + 22 * c }, { left: a + 12 * c, top: b + 22 * c }, { left: a + 13 * c, top: b + 22 * c }, { left: a + 14 * c, top: b + 22 * c }, { left: a + 16 * c, top: b + 22 * c }, { left: a + 18 * c, top: b + 22 * c }, { left: a + 19 * c, top: b + 22 * c }, { left: a + 22 * c, top: b + 22 * c }, { left: a + 23 * c, top: b + 22 * c }, { left: a + 24 * c, top: b + 22 * c },

    { left: a, top: b + 23 * c }, { left: a + 6 * c, top: b + 23 * c }, { left: a + 8 * c, top: b + 23 * c }, { left: a + 10 * c, top: b + 23 * c }, { left: a + 12 * c, top: b + 23 * c }, { left: a + 14 * c, top: b + 23 * c }, { left: a + 16 * c, top: b + 23 * c }, { left: a + 17 * c, top: b + 23 * c }, { left: a + 19 * c, top: b + 23 * c }, { left: a + 20 * c, top: b + 23 * c }, { left: a + 21 * c, top: b + 23 * c }, { left: a + 22 * c, top: b + 23 * c },

    { left: a, top: b + 24 * c }, { left: a + c, top: b + 24 * c }, { left: a + 2 * c, top: b + 24 * c }, { left: a + 3 * c, top: b + 24 * c }, { left: a + 4 * c, top: b + 24 * c }, { left: a + 5 * c, top: b + 24 * c }, { left: a + 6 * c, top: b + 24 * c }, { left: a + 11 * c, top: b + 24 * c }, { left: a + 12 * c, top: b + 24 * c }, { left: a + 17 * c, top: b + 24 * c }, { left: a + 18 * c, top: b + 24 * c }, { left: a + 20 * c, top: b + 24 * c }, { left: a + 21 * c, top: b + 24 * c }, { left: a + 24 * c, top: b + 24 * c },


]
var niaoni = 1;
var error1 = 0;
var error2 = 0;
var error3 = 0;
var error4 = 0;
var error5 = 0;
var error6 = 0;
var error7 = 0;
var error8 = 0;
function test1() {
    error1 += 1;
    if (error1 === 1) {
        date = date.concat(date2.slice(0, 11));
        // console.log(date)
    }
    test();
}
function test2() {
    error2 += 1;
    if (error2 === 1) {
        date = date.concat(date2.slice(11, 21));
        // console.log(date)
    }
    test()
}
function test3() {
    error3 += 1;
    if (error3 === 1) {
        date = date.concat(date2.slice(21, 51));
        // console.log(date)
    }
    test();
}
function test6() {
    error6 += 1;
    if (error6 === 1) {
        date = date.concat(date2.slice(51, 112));
        // console.log(date)
    }
    test();
}
function test7() {
    error7 += 1;
    if (error7 === 1) {
        date = date.concat(date2.slice(112, 173));
        // console.log(date)
    }
    test();
}
function test8() {
    error8 += 1;
    if (error8 === 1) {
        date = date.concat(date2.slice(173, 234));
        // console.log(date)
    }
    test();
}
function test4() {
    getCategoryData();
    test();
}
function test5() {
    error5 += 1;
    if (error5 === 1) {
        date =   date.concat(date.concat(date2.slice()));
        console.log(date)
    }
    test();
}
function getCategoryData() {
    $.get('https://api.smalltown.wshoto.com/Home/LightActivity/headImg', function (data) {
        var length1 = date1.length;
        console.log(length1)
        date1 = data.headimgurl;
        date = date.concat(date1.slice(length1));
        length1 = date1.length;
        console.log(length1)
    })
}
function test() {
    var length = $(".turn1 img").length;
    // if判断填加图片数量限制
    if (length < 318 && date[length]) {
        // console.log(length)
        var suijishu = Math.abs(Math.floor(Math.random() * num.length))
        // console.log(suijishu)
        var point = num[suijishu]
        $(".turn1").append("<img/>");
        num.splice(suijishu, 1)
        // // 获取随机颜色代表，图片
        // var color = ["red", "orange", "yellow", "green", "blue", "black", "pink", "lightgrey"];
        // // console.log(color.length)
        // var colornumber = color[Math.ceil(Math.random() * color.length - 1)];
        // var x = bodyWidth/2;
        // var y = startheight/2;
        // console.log($(".turn1").position().left + "-----------" + $(".turn1").position().top)
        var centerpoint = [x, y];
        // console.log(centerpoint)
        // 假设初始位置都是在圆上，以适口宽度作为圆的直径；
        var r = bodyWidth / 2;
        // 确定初始定位点的left的范围,计算的中心点都是在圆上的；获取随机left值；
        var startleft = Math.floor(Math.random() * (bodyWidth - startwidth / 2));
        // 去顶初始定位点的top的范围，同样也是按照中心点在圆上进行计算的；
        var thebigest = r + y;
        var littleest = -(y - r);//在x轴以上是正值；
        var starttop = Math.ceil(Math.random() * thebigest) - Math.ceil(Math.random() * littleest)
        // 中间先不说；
        // 确定一下八边形的大小，首先图片展示在二维码的八个角上，并且接下来要进行放大，放大后图片不能覆盖二维码，所以，设定宽度为二维码的二倍；
        // 放大图片的大小不到二维码那么大，假设只需要放大为二维码的二分之一（这个数据可以改变）
        var eightwidth = 2 * erweimawidth;
        // 确定各个坐标点的位置；
        // 分区域进行，以八边形的边的中间位置来进行划分；1，2为上部区域分别定位八边形的左右的两个角；3，4为右边区域，分管八边形右边的上下角；剩下的类推；
        // 确定落点的位置
        // 假设设定好后图片的大小为二维码的2分之一
        var key = 3 * erweimawidth / 8
        // 图片要想以确定的点为中心那么需要向左和向上移动自己的宽高的1/2;
        // 依次排列：上-左右，右上下，下右左，左下上；
        var pointlefta = x - 5 * erweimawidth / 8;
        var pointleftb = x + erweimawidth / 8;
        var pointleftc = x + 3 * erweimawidth / 4;
        var pointleftd = x - 5 * erweimawidth / 4;
        var pointtopa = y + 5 * erweimawidth / 4;
        var pointtopb = y - 3 * erweimawidth / 4;
        var pointtopc = y + 5 * erweimawidth / 8;
        var pointtopd = y - erweimawidth / 8;
        var downpoint =
            [{ left: pointlefta, top: -pointtopa },
            { left: pointleftb, top: -pointtopa },
            { left: pointleftc, top: -pointtopc },
            { left: pointleftc, top: -pointtopd },
            { left: pointleftb, top: -3 * pointtopb / 4 + key / 8 },
            { left: pointlefta, top: -3 * pointtopb / 4 + key / 8 },
            { left: pointleftd, top: -pointtopd },
            { left: pointleftd, top: -pointtopc }];
        // 有落点了，现在可以获取每一张图片的起始位置了；
        //圆的标准方程式是（x-a）^2+(y-b)^2=r^2 : Math.pow(10,2);
        // x=Math.sqrt(r^2-(y-b)^2)+a
        // y=Math.sqrt(r^2-(x-a)^2)+b
        // var trueleft = Math.sqrt(Math.pow(r, 2) - Math.pow(starttop - y, 2)) + x;
        // var truetop = Math.sqrt(Math.pow(r, 2) - Math.pow(startleft - x, 2)) + y;
        // 横坐标startleft 无论何时都是一个正的值,符合圆标准方程的话;
        // 在第一区域的时候我要求它,起始点应该在左上方和右上方;
        var truetopa = Math.sqrt(Math.pow(r, 2) - Math.pow(startleft - x, 2)) + y;
        // 在第二区域的时候我要求它,起始点应该在右上方和右下方;
        var truelefta = Math.sqrt(Math.pow(r, 2) - Math.pow(starttop - y, 2)) + x
        // console.log(r + "===" + x + "---" + y + "----" + starttop + "=====" + trueleft)
        // 在第三区域的时候我要求它,起始点应该在下左和下右方; 
        var truetopb = -Math.sqrt(Math.pow(r, 2) - Math.pow(startleft - x, 2)) + y;
        // 在第四区域的时候我要求它,起始点应该在左下和左上方;
        var trueleftb = -Math.sqrt(Math.pow(r, 2) - Math.pow(starttop - y, 2)) + x;
        // 定义四个动画;
        if (length % 8 == 1 && point) {
            var point1 = point
            $(".turn1 img").eq(length).css({ "position": "absolute", "width": startwidth + "px", "height": startheight + "px", "left": startleft + "px", "top": -truetopa + "px", "opacity": 0.6 }).attr("src", date[length])
                .animate({ "left": downpoint[1].left + "px", "top": downpoint[1].top + "px", "opacity": 1, "width": key + "px", "height": key + "px", "border-radius": 8 + "px" }, 700)
                .animate({ "left": downpoint[1].left - key / 8 + "px", "top": downpoint[1].top + "px", "opacity": 1, "width": 5 * key / 4 + "px", "height": 5 * key / 4 + "px", "border-radius": 8 + "px" }, 900)
                .animate({ "left": point1.left, "top": point1.top, "opacity": 1, "width": c + "px", "height": c + "px", "border-radius": 0 + "px" }, 200)
        } else if (length % 8 == 2 && point) {
            var point2 = point
            $(".turn1 img").eq(length).css({ "position": "absolute", "width": startwidth + "px", "height": startheight + "px", "left": startleft + "px", "top": -truetopa + "px", "opacity": 0.6 }).attr("src", date[length])
                .animate({ "left": downpoint[0].left + "px", "top": downpoint[0].top + "px", "opacity": 1, "width": key + "px", "height": key + "px", "border-radius": 8 + "px" }, 700)
                .animate({ "left": downpoint[0].left - key / 8 + "px", "top": downpoint[0].top + "px", "opacity": 1, "width": 5 * key / 4 + "px", "height": 5 * key / 4 + "px", "border-radius": 8 + "px" }, 900)
                .animate({ "left": point2.left, "top": point2.top, "opacity": 1, "width": c + "px", "height": c + "px", "border-radius": 0 + "px" }, 200)
        } else if (length % 8 == 3 && point) {
            var point3 = point
            $(".turn1 img").eq(length).css({ "position": "absolute", "width": startwidth + "px", "height": startheight + "px", "left": truelefta + "px", "top": -starttop + "px", "opacity": 0.6 }).attr("src", date[length])
                .animate({ "left": downpoint[3].left + "px", "top": downpoint[3].top + "px", "opacity": 1, "width": key + "px", "height": key + "px", "border-radius": 8 + "px" }, 700)
                .animate({ "left": downpoint[3].left - key / 8 + "px", "top": downpoint[3].top + "px", "opacity": 1, "width": 5 * key / 4 + "px", "height": 5 * key / 4 + "px", "border-radius": 8 + "px" }, 900)
                .animate({ "left": point3.left, "top": point3.top, "opacity": 1, "width": c + "px", "height": c + "px", "border-radius": 0 + "px" }, 200)
        } else if (length % 8 == 4 && point) {
            var point4 = point
            $(".turn1 img").eq(length).css({ "position": "absolute", "width": startwidth + "px", "height": startheight + "px", "left": truelefta + "px", "top": -starttop + "px", "opacity": 0.6 }).attr("src", date[length])
                .animate({ "left": downpoint[2].left + "px", "top": downpoint[2].top + "px", "opacity": 1, "width": key + "px", "height": key + "px", "border-radius": 8 + "px" }, 700)
                .animate({ "left": downpoint[2].left - key / 8 + "px", "top": downpoint[2].top + "px", "opacity": 1, "width": 5 * key / 4 + "px", "height": 5 * key / 4 + "px", "border-radius": 8 + "px" }, 900)
                .animate({ "left": point4.left, "top": point4.top, "opacity": 1, "width": c + "px", "height": c + "px", "border-radius": 0 + "px" }, 200)
        } else if (length % 8 == 5 && point) {
            var point5 = point
            $(".turn1 img").eq(length).css({ "position": "absolute", "width": startwidth + "px", "height": startheight + "px", "left": startleft + "px", "top": -truetopb + "px", "opacity": 0.6 }).attr("src", date[length])
                .animate({ "left": downpoint[5].left + "px", "top": downpoint[5].top + "px", "opacity": 1, "width": key + "px", "height": key + "px", "border-radius": 8 + "px" }, 700)
                .animate({ "left": downpoint[5].left - key / 8 + "px", "top": downpoint[5].top + key / 8 + "px", "opacity": 1, "width": 5 * key / 4 + "px", "height": 5 * key / 4 + "px", "border-radius": 8 + "px" }, 900)
                .animate({ "left": point5.left, "top": point5.top, "opacity": 1, "width": c + "px", "height": c + "px", "border-radius": 0 + "px" }, 200)
        } else if (length % 8 == 6 && point) {
            var point6 = point
            $(".turn1 img").eq(length).css({ "position": "absolute", "width": startwidth + "px", "height": startheight + "px", "left": startleft + "px", "top": -truetopb + "px", "opacity": 0.6 }).attr("src", date[length])
                .animate({ "left": downpoint[4].left + "px", "top": downpoint[4].top + "px", "opacity": 1, "width": key + "px", "height": key + "px", "border-radius": 8 + "px" }, 700)
                .animate({ "left": downpoint[4].left - key / 8 + "px", "top": downpoint[4].top + key / 8 + "px", "opacity": 1, "width": 5 * key / 4 + "px", "height": 5 * key / 4 + "px", "border-radius": 8 + "px" }, 900)
                .animate({ "left": point6.left, "top": point6.top, "opacity": 1, "width": c + "px", "height": c + "px", "border-radius": 0 + "px" }, 200)
        } else if (length % 8 == 7 && point) {
            var point7 = point
            $(".turn1 img").eq(length).css({ "position": "absolute", "width": startwidth + "px", "height": startheight + "px", "left": trueleftb + "px", "top": -starttop + "px", "opacity": 0.6 }).attr("src", date[length])
                .animate({ "left": downpoint[7].left + "px", "top": downpoint[7].top + "px", "opacity": 1, "width": key + "px", "height": key + "px", "border-radius": 8 + "px" }, 700)
                .animate({ "left": downpoint[7].left - key / 8 + "px", "top": downpoint[7].top + "px", "opacity": 1, "width": 5 * key / 4 + "px", "height": 5 * key / 4 + "px", "border-radius": 8 + "px" }, 900)
                .animate({ "left": point7.left, "top": point7.top, "opacity": 1, "width": c + "px", "height": c + "px", "border-radius": 0 + "px" }, 200)
        } else if (length % 8 == 0 && point) {
            var point8 = point
            $(".turn1 img").eq(length).css({ "position": "absolute", "width": startwidth + "px", "height": startheight + "px", "left": trueleftb + "px", "top": -starttop + "px", "opacity": 0.6 }).attr("src", date[length])
                .animate({ "left": downpoint[6].left + "px", "top": downpoint[6].top + "px", "opacity": 1, "width": key + "px", "height": key + "px", "border-radius": 8 + "px" }, 700)
                .animate({ "left": downpoint[6].left - key / 8 + "px", "top": downpoint[6].top + "px", "opacity": 1, "width": 5 * key / 4 + "px", "height": 5 * key / 4 + "px", "border-radius": 8 + "px" }, 900)
                .animate({ "left": point8.left, "top": point8.top, "opacity": 1, "width": c + "px", "height": c + "px", "border-radius": 0 + "px" }, 200)
        }
    } else {
        // console.log(length)
        // clearInterval(test5);

        if (length === 318) {
            niaoni += 1;
            if (niaoni === 2) {
                setTimeout(function () {
                    $(".test2").addClass("niu");
                    $(".zhezhao").addClass("greyzhezhao")

                    setTimeout(function () {
                        $(".turn2 img").addClass("border")
                        $(".welcome").animate({ "left": 50 + "%", "width": 1125 + "px", "opacity": 1, "font-size": 70 + "px", "top": 73 + "vh", "margin-left": -565 + "px" }, 2000)
                    }, 2000);
                    var jumpnum = -1;
                    setTimeout(function () {
                        var jumprun = setInterval(jump, 200);
                        setTimeout(function () {
                            clearInterval(jumprun);
                            $(".music")[0].pause();
                        }, 3000);
                    }, 4000);
                    function jump() {
                        jumpnum++;
                        if (jumpnum < 12) {
                            $(".welcome span").eq(jumpnum).addClass("jump")
                        }
                    }
                }, 3000);
            }
        }
    }

}
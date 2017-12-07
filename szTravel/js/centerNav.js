$("div[class^='Nav-']").click(function() {
    var name = $(this).attr("class");
    var show = name.split(' ')[0];
    $("div[class^='Nav-']").removeClass("leftNav-active");
    $(this).parent().siblings().removeClass("leftNav-active");
    $(this).parent().addClass("leftNav-active");
    var arr = show.split('-')[1];
    $("li[class^='first']").removeClass("leftnav-active");
    $("li[class^='second']").removeClass("leftnav-active");
    if (arr == "zero" || arr == "first") {
        $(".first-1").addClass("leftnav-active");
        $("div[id^='first-']").css("display", "none");
        $("div[id^='second-']").css("display", "none");
        $("#third").css("display", "none");
        $("#first-1").css("display", "block");
    }
    if (arr == "second") {
        $(".second-1").addClass("leftnav-active");
        $("div[id^='first-']").css("display", "none");
        $("div[id^='second-']").css("display", "none");
        $("#third").css("display", "none");
        $("#second-1").css("display", "block");
    }
    if (arr == "third") {
        $("div[id^='first-']").css("display", "none");
        $("div[id^='second-']").css("display", "none");
        $("#third").css("display", "block");
    }
});

$(".nav-ul li").click(function(){
    var show = $(this).attr("class");
    $("#" + show).siblings().css("display", "none");
    $("#" + show).css("display", "block");
    var arr = show.split('-');
    var nowNav = arr[0] + "-nav";
    $("." + nowNav).siblings().removeClass("leftNav-active");
    $("." + nowNav).addClass("leftNav-active");

    $(this).siblings().removeClass("leftnav-active");
    if (arr != "first") {
        $("li[class^='first']").removeClass("leftnav-active");
    }
    if (arr != "second") {
        $("li[class^='second']").removeClass("leftnav-active");
    }
    if (arr != "third") {
        $("li[class^='second']").removeClass("leftnav-active");
    }
    $(this).addClass("leftnav-active");
});

$(".right-nav li").click(function(){
    var show = $(this).attr("class");
    $("#" + show).siblings().css("display", "none");
    $("#" + show).css("display", "block");
    $(this).siblings().removeClass("rightNav-active");
    $(this).addClass("rightNav-active");
});

$("span[class^='address-' ]").click(function(){
    var show = $(this).attr("class");
    var name = show.split('-')[1];
    var names = name + "-address";
    $("." + names).siblings().css("display", "none");
    $("." + names).css("display", "block");
});
$("span[class^='traveller-' ]").click(function(){
    var show = $(this).attr("class");
    var name = show.split('-')[1];
    var names = name + "-traveller";
    $("." + names).siblings().css("display", "none");
    $("." + names).css("display", "block");
});
$(".back-address").click(function(){
    $(".look-address").css("display", "none");
    $(".editor-address").css("display", "none");
    $("#second-2").css("display", "block");
});
$(".back-traveller").click(function(){
    $(".add-traveller").css("display", "none");
    $(".look-traveller").css("display", "none");
    $(".editor-traveller").css("display", "none");
    $("#second-3").css("display", "block");
});
$(".cancel-traveller").click(function(){
    $(".add-traveller").css("display", "none");
    $(".look-traveller").css("display", "none");
    $(".editor-traveller").css("display", "none");
    $("#second-3").css("display", "block");
});

$(".traveller-add").click(function(){
    var show = $(this).attr("class");
    var name = show.split('-')[1];
    var names = name + "-traveller";
    $("." + names).siblings().css("display", "none");
    $(".add-traveller").css("display", "block");
    $(".add-traveller").css("display", "block");
});

$(function(){

    $(".tcdPageCode-allList").paginate({
        count         : 10,
        start         : 1,
        display     : 12,
        border                    : true,
        border_color            : '#666',
        border_hover_color        : '##4d95f7',
        text_color              : '#666',
        background_color        : 'none',
        text_hover_color          : '#2573AF',
        background_hover_color    : 'none',
        images        : false,
        mouse        : 'press',
        onChange:function(p){
            alert("p="+p);//输出的p为页码
        }
    });
    $(".tcdPageCode-noUse").paginate({
        count         : 10,
        start         : 1,
        display     : 12,
        border                    : true,
        border_color            : '#666',
        border_hover_color        : '##4d95f7',
        text_color              : '#666',
        background_color        : 'none',
        text_hover_color          : '#2573AF',
        background_hover_color    : 'none',
        images        : false,
        mouse        : 'press',
        onChange:function(p){
            alert("p="+p);//输出的p为页码
        }
    });
    $(".tcdPageCode-noPay").paginate({
        count         : 10,
        start         : 1,
        display     : 12,
        border                    : true,
        border_color            : '#666',
        border_hover_color        : '##4d95f7',
        text_color              : '#666',
        background_color        : 'none',
        text_hover_color          : '#2573AF',
        background_hover_color    : 'none',
        images        : false,
        mouse        : 'press',
        onChange:function(p){
            alert("p="+p);//输出的p为页码
        }
    });
});
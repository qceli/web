$(".info-box").click(function() {
    $(this).siblings().removeClass("choose");
    $(this).addClass("choose");
    $(this).siblings().children().css("visibility", "hidden");
    $(this).children().css("visibility", "visible");
});

$("[class^=navli-]").click(function() {
    var name = $(this).attr("class").split(' ')[0];
    $(this).siblings().removeClass("detailNavs-active");
    $(this).addClass("detailNavs-active");
    $("#" + name).css("display", "block");
    $("#" + name).siblings().css("display", "none");
});

// $('.info-box').click(function () {
//     $('.info-box').removeClass('choose');
//     $(this).addClass('choose');
//     $(this).siblings().children().css("visibility", "hidden");
//     $(this).children().css("visibility", "visible");
//     // $('.choose-1').css('display','inline-block')
// });



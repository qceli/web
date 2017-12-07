$("[ca^=customAvtive]").click(function() {
    $(this).siblings().removeClass("customActive");
    $(this).toggleClass("customActive");
});
$(document).ready(function () {
    $('.scrollTop').click(function () {
        window.scrollTo({top: 0})
    })
    // $('.scrollTop').click(function () {
    //     $('html').animate({scrollTop:'0'},100);
    // })
    var box=$(window);
    var nav=$('header nav');
    var posEnd=0;

    box.scroll(function () {
        var posStart=box.scrollTop();
        if (posStart>posEnd){
            nav.addClass('hidden');
        } else {
           nav.removeClass('hidden');
        }
        posEnd=posStart;
    })
})
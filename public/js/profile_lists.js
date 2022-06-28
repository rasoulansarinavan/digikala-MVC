$(document).ready(function () {
$('.tab').on('click',function () {
    var index = $(this).index();
    var child = $('.child');
    child.fadeOut();
    child.eq(index).fadeIn();
})
})
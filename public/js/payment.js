$(document).ready(function () {

    $('.paymentsItems .item ').on('click', function () {
        $('.paymentsItems .item').removeClass('active');
        $(this).find('input').prop('checked', true);
        $(this).addClass('active')
    })
    $('.paymentsItems li:first-child input').trigger('click');
})
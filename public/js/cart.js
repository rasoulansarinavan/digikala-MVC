$(document).ready(function () {

    $('.increase , .decrease').on('click', function () {
        var input = $(this).parent('.quantity').find('input');
        var basket_id = $(this).parent('.quantity').find('input').attr('data-basket-id');
        var val = input.attr('value');
        if ($(this).hasClass('increase')) {
            input.attr('value', parseInt(val) + 1);
            var number = input.val();

        } else {
            input.attr('value', parseInt(val) - 1);
            var number = input.val();

            if (val <= 1) {
                input.attr('value', 1);
            }
        }
        updateBasket(number, basket_id);
    })

    function updateBasket(number, basket_id) {
        var url = 'cart/updateBasket';
        var data = {'number': number, 'basket_id': basket_id};
        $.post(url, data, function (msg) {

            var basketItems = msg[0];
            var totalPrice = msg[1];
            var totalDiscount = msg[2];
            var totalNumber = msg[3];
            // برای آپدیت تعداد کالا در سبد خرید برای قسمت قمز رنگ در هدر  زمانی که دکمه های افزایش increase  و decrease  کلیلک میشوند
            $('.basketNumber').html(totalNumber)
            // برای آپدیت تعداد کالا در سبد خرید برای قسمت قمز رنگ در هدر  زمانی که دکمه های افزایش increase  و decrease  کلیلک میشوند
            $('.cartPrice .title').html('قیمت کالاها ('+totalNumber+')')
            $.each(basketItems, function (index, value) {
                var number = value['number'];
                var price = value['price'];
                var basketId = value['basket_id'];
                var discount = value['discount'];
                var tag = $('#cart').find('[data-basket-id="' + basketId + '"]')
                tag.find('.productPrice span').html(((price * number) - (price * number * discount) / 100).toLocaleString())
            })
            $('.cartPrice .price span').html(totalPrice.toLocaleString())
            $('.cartDiscount .discount span').html(totalDiscount.toLocaleString())
            $('.cartTotalPrice .price span').html((totalPrice - totalDiscount).toLocaleString())

        }, 'json');
    }

    var pageName = 'cart'
    if (pageName == 'cart') {
        $('.basket').remove()
    }
})
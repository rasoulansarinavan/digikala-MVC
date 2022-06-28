<?php

$basket = $data['basket'];
$totalPrice = $data['totalPrice'];
$totalDiscount = $data['totalDiscount'];
$payment = $data['payment'];
$delivery = $data['delivery'];


?>

<main>
    <form action="payment/saveOrder" method="post">
        <div class="container flex" id="payment">
            <div class="right">
                <div class="payment box">
                    <div class="header">شیوه پرداخت</div>
                    <ul class="paymentsItems">
                        <?php
                        foreach ($payment as $item) {

                            ?>
                            <li class="item">
                                <input type="radio" name="payment" value="<?= $item['id'] ?>">
                                <?= $item['title'] ?>
                                <p class="description"><?= $item['description'] ?></p>
                            </li>
                            <?php
                        }
                        ?>
                    </ul>
                </div>

                <div class="offerCode box">
                    <div class="header">کد تخفیف</div>
                    <div class="offerForm">
                        <input type="text" placeholder="افزودن کد تخفیف" name="code">
                        <a onclick="checkOfferCode()">ثبت</a>
                    </div>
                    <div class="message">
                    </div>
                </div>

            </div>


            <div class="left">
                <div class="cartPrice flex">
                    <div class="title">قیمت کالاها</div>
                    <div class="price"><span><?= number_format($totalPrice) ?></span>تومان</div>
                </div>
                <div class="cartDiscount flex">
                    <div class="title">تخفیف کالاها</div>
                    <div class="discount"><span> <?= number_format($totalDiscount) ?></span> تومان</div>
                </div>
                <div class="cartTotalPrice flex">
                    <div class="title">جمع</div>
                    <div class="price"><span><?= number_format($totalPrice - $totalDiscount) ?></span> تومان</div>
                </div>
                <div class="cartPrice flex">
                    <div class="title">هزینه ارسال</div>
                    <div class="price deliveryPrice"><span><?= number_format($delivery['price']) ?></span>تومان</div>
                </div>
                <div class="cartTotalPrice flex">
                    <div class="title">مبلغ قابل پرداخت</div>
                    <div class="price finalPrice">
                        <span><?= number_format($delivery['price'] + ($totalPrice - $totalDiscount)); ?></span>تومان
                    </div>
                </div>
                <button class="continue">ادامه فرایند خرید</button>
            </div>

        </div>
    </form>
</main>
<?php
require('views/shipping/add_address.php');
?>
<script src="public/js/payment.js"></script>
<script>
    function checkOfferCode() {
        var code = $('.offerForm input').val();
        var url = 'payment/checkOfferCode'
        var data = {'code': code}
        $.post(url, data, function (msg) {
            console.log(msg)
            var checkCode = msg[0]
            var totalPrice = msg[1]
            var error = '<p class="error">کد تخفیف نامعتبر است</p>'
            var valid = '<p class="valid">کد تخفیف معتبر است</p>'

            if (checkCode == 0) {
                $('.offerCode .message').html(error)
            } else {
                $('.offerCode .message').html(valid)
                $('.finalPrice span').html(totalPrice.toLocaleString())
            }
        }, 'json')
    }

    var pageName = 'payment'
    if (pageName == 'payment') {
        $('.basket').remove()
    }
</script>
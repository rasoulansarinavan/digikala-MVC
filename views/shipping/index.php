<?php
$deliveryItems = $data['deliveryItems'];
$basket = $data['basket'];
$totalPrice = $data['totalPrice'];
$totalDiscount = $data['totalDiscount'];
$address = $data['address'];


?>

<main>
    <div class="container flex" id="shipping">
        <div class="right">
            <div class="address box">
                <div class="header">آدرس تحویل سفارش</div>
                <ul class="addressItems flex">

                    <?php
                    foreach ($address as $item) {
                        ?>
                        <li class="item">
                            <div class="action flex">
                                <input type="radio" name="x" value="<?= $item['id'] ?>">
                                <i class="fal fa-edit" onclick="editAddress(<?= $item['id'] ?>)"></i>
                            </div>
                            <span class="name"><?= $item['name'] ?><?= $item['family'] ?></span>
                            <span class="mobile"><?= $item['mobile'] ?></span>
                            <span class="address"><?= $item['address'] ?></span>
                        </li>
                        <?php
                    }
                    ?>
                    <li class="addAddress">
                        <i class="fas fa-plus"></i>
                        <span>افزودن آدرس جدید</span>
                    </li>

                </ul>
            </div>
            <div class="delivery box">
                <div class="header">شیوه و زمان ارسال</div>
                <ul class="deliveryItems">
                    <?php
                    foreach ($deliveryItems as $item) {

                        ?>
                        <li class="item" onclick="deliveryPrice(<?= $item['id'] ?>)">
                            <input type="radio" name="delivery" value="<?= $item['id'] ?>">
                            <div class="flex">
                                <div class="deliveryTitle"><?= $item['title'] ?></div>
                                <div class="deliveryPrice">
                                    هزینه ارسال: <span><?= number_format($item['price']); ?></span> تومان
                                </div>
                            </div>
                        </li>
                        <?php
                    }
                    ?>
                </ul>
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
                <div class="price deliveryPrice"><span>در حال محاسبه</span>تومان</div>
            </div>
            <div class="cartTotalPrice flex">
                <div class="title">مبلغ قابل پرداخت</div>
                <div class="price finalPrice"><span>در حال محاسبه</span>تومان</div>
            </div>
            <a href="payment" class="continue">ادامه فرایند خرید</a>
        </div>
    </div>
</main>
<?php
require('views/shipping/add_address.php');
?>
<script src="public/js/shipping.js"></script>
<script>

    function editAddress(address_id) {
        edit_address_id = address_id;

        var url = 'shipping/editAddress/' + address_id + '';
        var data = {}
        $.post(url, data, function (msg) {
            console.log(msg)

            $('input[name=name]').val(msg['name'])
            $('input[name=family]').val(msg['family'])
            $('input[name=mobile]').val(msg['mobile'])
            $('textarea[name=address]').val(msg['address'])
            $('input[name=pelak]').val(msg['pelak'])
            $('input[name=vahed]').val(msg['vahed'])
            $('input[name=post_code]').val(msg['post_code'])


        }, 'json')
    }
</script>
<script>
    function deliveryPrice(delivery_id) {
        var url = 'shipping/deliveryPrice/' + delivery_id + '';
        var data = {}
        $.post(url, data, function (msg) {
            console.log(msg);

            var deliverySelected = msg[0];
            var deliveryPrice = deliverySelected['price'];

            $('.left .deliveryPrice span').html(deliveryPrice.toLocaleString());
            var finalPrice = msg[1];
            $('.left .finalPrice span').html(finalPrice.toLocaleString());
        }, 'json')
        var pageName = 'shipping'
        if (pageName == 'shipping') {
            $('.basket').remove()
        }
    }
</script>
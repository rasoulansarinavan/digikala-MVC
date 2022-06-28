<div class="profileLeft" id="order">

    <div class="header flex">
        <div class="title">جزییات سفارش</div>
        <div class="orderDate">
            <?= $order['order_date'] ?>
        </div>
        <div class="orderNumber">
            <?= $order['order_number'] ?>
        </div>
    </div>
    <div class="receiverDetail">
        <div class="flex">
            <div class="family">
                تحویل گیرنده:
                <span>   <?= $order['address']['name'] ?> <?= $order['address']['family'] ?></span>
            </div>
            <div class="mobile">
                شماره تماس:

                <span>  <?= $order['address']['mobile'] ?></span>
            </div>
        </div>
        <div class="address">
            ارسال به :
            <span>          <?= $order['address']['province'] ?>،  <?= $order['address']['city'] ?>،  <?= $order['address']['address'] ?></span>
        </div>

    </div>
    <div class="orderPrice flex">
        <div class="flex">
            <div class="priceTotal">
                مبلغ کل:

                <span> <?= number_format($order['price']) ?></span>
                تومان
            </div>
            <div class="discountTotal">
                تخفیف

                <span>210000</span>
                تومان
            </div>
            <div class="deliveryPrice">
                :هزینه ارسال

                <span>210000</span>
                تومان
            </div>
        </div>

        <div class="orderStatus">
            <span>
                <?php

                $title = '';
                $width = '';
                if ($order['status'] == 1) {
                    $title = 'مرجوعی';
                    $width = 12.5;
                } elseif ($order['status'] == 2) {
                    $title = 'در انتظار تایید';
                    $width = 25;
                } elseif ($order['status'] == 3) {
                    $title = 'پرداخت شده';
                    $width = 37.5;
                } elseif ($order['status'] == 4) {
                    $title = 'تایید شده';
                    $width = 50;
                } elseif ($order['status'] == 5) {
                    $title = 'در حا پردازش انبار';
                    $width = 62.5;
                } elseif ($order['status'] == 6) {
                    $title = 'در حال ارسال';
                    $width = 75;
                } elseif ($order['status'] == 7) {
                    $title = 'ارسال شده';
                    $width = 87.5;
                } elseif ($order['status'] == 8) {
                    $title = 'تحویل داد شده';
                    $width = 100;
                }

                ?>
                <?= $title ?>

            </span>
            <div class="status">

                <div class="percent" style="width: <?= $width ?>%"></div>
            </div>
        </div>
    </div>
    <div class="basket">
        <?php
        $basket = $order['basket'];
        foreach ($basket as $item) {
            ?>

            <div class="item flex">
                <div class="img"><img src="public/images/product/<?= $item['id'] ?>/product_115.jpg" alt=""></div>
                <div class="details">
                    <div class="title">
                        <?= $item['title'] ?>
                    </div>
                    <div class="color">
                        <span class="circle" style="background: <?= $item['hex_code'] ?>"></span>
                        <span class="colorTitle"><?= $item['colorTitle'] ?></span>
                    </div>
                    <div class="guarantee">
                        <i class="far fa-shield-check"></i>
                        <?= $item['guaranteeTitle'] ?>
                    </div>
                    <div class="price">
                        قیمت واحد:
                        <span><?= number_format($item['price']) ?></span>
                        تومان
                    </div>
                </div>

            </div>
            <?php
        }
        ?>
    </div>


</div>
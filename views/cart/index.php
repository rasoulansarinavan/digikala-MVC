<?php
$basket = $data['basket'];
$totalPrice = $data['totalPrice'];
$totalDiscount = $data['totalDiscount'];
//print_r($data);
?>

<main>
    <div class="container flex" id="cart">
        <?php
        if ($totalNumber == !0) {
            ?>
            <div class="right">
                <ul class="productItems">
                    <?php
                    foreach ($basket as $row) {
                        ?>
                        <li class="item flex" data-basket-id="<?= $row['basket_id'] ?>">
                            <div class="img">
                                <img src="public/images/product/<?= $row['id'] ?>/product_350.jpg" alt="">
                            </div>
                            <div class="details">
                                <div class="productName"><?= $row['title']; ?></div>
                                <div class="productColor flex">
                                    <span class="circle" style="background: <?= $row['hex_code'] ?>"></span>
                                    <?= $row['colorTitle'] ?>
                                </div>
                                <div class="productGuarantee">
                                    <i class="fa fa-shield-check"></i>
                                    <?= $row['guaranteeTitle'] ?>
                                </div>
                                <div class="productDiscount">
                                    تخفیف <span><?= $row['discount'] ?></span> درصد
                                </div>
                                <div class="action flex">
                                    <div class="quantity">
                                        <button class="increase">+</button>
                                        <input type="text" data-basket-id="<?= $row['basket_id'] ?>"
                                               value="<?= $row['number'] ?>">
                                        <button class="decrease">-</button>
                                    </div>
                                    <div class="remove" onclick="removeBasketItemAjax(<?= $row['basket_id'] ?>)">
                                        <i class="fa fa-trash"></i>
                                        حذف
                                    </div>
                                    <div class="productPrice">
                                        <span><?= number_format(($row['price'] * $row['number']) - ($row['price'] * $row['number'] * $row['discount']) / 100); ?></span>
                                        تومان
                                    </div>
                                </div>
                            </div>
                        </li>
                        <?php
                    }
                    ?>
                </ul>
            </div>
            <div class="left">
                <div class="cartPrice flex">
                    <div class="title">قیمت کالاها (<?= $totalNumber ?>)</div>
                    <div class="price"><span><?= number_format($totalPrice) ?></span>تومان</div>
                </div>
                <div class="cartDiscount flex">
                    <div class="title">تخفیف کالاها</div>
                    <div class="discount"><span> <?= number_format($totalDiscount) ?></span> تومان</div>
                </div>
                <div class="cartTotalPrice flex">
                    <div class="title">جمع سبد خرید</div>
                    <div class="price"><span><?= number_format($totalPrice - $totalDiscount) ?></span> تومان</div>
                </div>
                <?php
                $user = Model::sessionGet('user_id');
                if ($user !='') {
                    ?>
                    <a href="shipping" class="continue">ادامه فرایند خرید</a>
                    <?php
                } else {
                    ?>
                    <a class="continue login">ورود و ثبت سفارش</a>
                    <?php
                }
                ?>
            </div>
            <?php
        } else {
            ?>
            <div class="emptyBasket">
                <div class="emptyBasket__img">
                    <img src="public/images/empty.svg" alt="">
                </div>
                <div class="emptyBasket__title">
                    سبد خرید شما خالی است
                </div>
            </div>
            <?php
        }
        ?>
    </div>
</main>
<script>  function removeBasketItemAjax(basket_id) {
        var url = 'cart/removeBasketItemAjax/' + basket_id + '';
        var data = {};
        $.post(url, data, function (msg) {
            location.reload();
        })
    }
</script>
<script src="public/js/cart.js"></script>
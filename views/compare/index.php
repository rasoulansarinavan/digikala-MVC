<?php
$product = $data['product'];

?>
<main>
    <div class="container" id="compare">
        <div class="navBar flex">
            <nav>
                <ul class="flex">
                    <li><a href="">دیجی کالا </a></li>
                    <li><a href="">کالای دیجیتال </a></li>
                    <li><a href="">موبایل </a></li>
                    <li><a href="">گوشی موبایل</a></li>
                </ul>
            </nav>

        </div>
        <div class="compare_title">
            لیست مقایسه گوشی موبایل
        </div>
        <div class="items">
            <ul class="flex">
                <li class="product_item">
                    <div class="img">
                        <img src="public/images/product/<?= $product['id'] ?>/product_350.jpg" alt="">
                    </div>
                    <div class="product_item_title">
                        <?= $product['title'] ?>
                    </div>
                    <div class="product_item_price">
                        <?= number_format($product['price']) ?> تومان
                    </div>
                    <a target="_blank" class="product_view_button" href="product/index/<?= $product['id'] ?>">مشاهده و
                        خرید محصول</a>
                </li>
                <li class="product_item" id="addProduct">
                    <div class="product_item_add_img">
                        <i class="far fa-plus"></i>
                        <div class="product_item_add_title">
                            برای افزودن کالا به لیست مقایسه کلیک کنید.
                        </div>
                    </div>
                    <a target="_blank" class="product_view_add_button" href="">افزودن کالا و مقایسه</a>
                </li>
            </ul>
        </div>
        <?php
        $features = $product['features'];
        foreach ($features as $feature) {
            ?>
            <div class="compare_features">
                <h4 class="compare_features_title">
                    <?= $feature['title'] ?>
                </h4>
                <ul class="compare_features_list">
                    <?php
                    foreach ($feature['children'] as $child) {
                        ?>
                        <li class="compare_features_item">
                            <div><?=$child['title']?></div>
                        </li>
                        <li class="compare_features_value">
                            <div><?=$child['value']?></div>
                        </li>
                        <?php
                    }
                    ?>
                </ul>
            </div>
            <?php
        }
        ?>
        <?php
        require('modal.php');
        ?>
    </div>
</main>
<script>
    function addProductForCompare() {
        $('.compare_modal').fadeIn()
        var url = ''
        var data = {}
        $.post(url, data, function (msg) {
            console.log(msg)
        })
    }

    )
</script>



<?php
//print_r($favorites);
?>
<div class="box">
                    <span class="headLine">
                    لیست آخرین نیازمندیها
                    </span>
    <div class="personalInfo">
        <?php
        foreach ($favorites as $item) {
            ?>
            <div class="flex">

                    <div class="productImage">
                        <img src="public/images/product/<?= $item['id'] ?>/product_115.jpg" alt="">
                    </div>
                    <p class="productInfo">
                        <?= $item['title'] ?>
                        <span class="price">
                                <?= number_format($item['price']) ?> تومان
                            </span>
                    </p>

                <div class="removeProduct">

                    <span></span>
                </div>
            </div>
            <?php
        }
        ?>
        <div class="action">
            <a href="profile/lists">
                مشاهده و ویرایش لیست مورد نیاز
            </a>
        </div>
    </div>
</div>



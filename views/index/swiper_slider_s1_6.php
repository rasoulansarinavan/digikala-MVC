<div class="swiper-container s1 swiper1">
    <div class="headLine">
                    <span>
                        محصولات پربازدید اخیر
                    </span>
    </div>
    <div class="swiper-wrapper">
        <?php
        $mostVisited = $data[2];
        foreach ($mostVisited as $row) {
            ?>

            <div class="swiper-slide">
                <a class="card" href="product/index/<?= $row['id']; ?>">
                    <div class="image">
                        <img src="public/images/product/<?= $row['id']; ?>/product_350.jpg" alt="">
                    </div>
                    <div class="title">
                        <?= $row['title']; ?>
                    </div>
                    <div class="price">
                        <div class="oldPrice">
                            <del><?=number_format($row['price']); ?></del>
                            <span class="percent"><?= $row['discount']; ?>%</span>
                        </div>
                        <div class="newPrice">
                            <span><?= number_format($row['price_total']) ?></span>
                            <span>تومان</span>
                        </div>
                    </div>
                </a>
            </div>
            <?php
        }
        ?>

    </div>
    <div class="swiper-button-next next"></div>
    <div class="swiper-button-prev prev"></div>
</div>
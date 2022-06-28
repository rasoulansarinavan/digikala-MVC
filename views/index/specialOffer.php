<article class="specialOffer">
    <section class="slider container flex">
        <div class="right">
            <a class="banner" href="public/">
            </a>
            <div class="showAll">مشاهده همه</div>
        </div>
        <div class="swiper-container s1">
            <div class="swiper-wrapper">
                <?php
                $special = $data[1];
                foreach ($special as $row) {
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
                                    <del><?= $row['price']; ?></del>
                                    <span class="percent"><?= $row['discount']; ?>%</span>
                                </div>
                                <div class="newPrice">
                                    <span><?= $row['price_total']; ?></span>
                                    <span>تومان</span>
                                </div>
                            </div>
                            <div class="timer" data-countdown="<?= $row['time_special']; ?>"></div>
                        </a>
                    </div>
                    <?php
                }
                ?>
            </div>
            <div class="swiper-button-next next"></div>
            <div class="swiper-button-prev prev"></div>
        </div>
    </section>
</article>
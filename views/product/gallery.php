<section class="gallery">
    <?php
//    print_r($productInfo);
    if ($productInfo['special'] == 1) {
        ?>
        <div class="galleryHeader flex">
            <div>
                <img src="public/images/banner/offerBaner.svg" alt="">
            </div>
            <div class="timer" data-countdown="<?= $productInfo['time_special'] ?>"></div>
        </div>
        <?php
    }
    ?>
    <div class="galleryOptions">
        <ul>
            <li class="flex
            <?php
            if (isset($productInfo['favorite']['id'])) echo 'active' ?>">
                <i class="far fa-heart" onclick="addToFavorites(<?= $productInfo['id'] ?>)"></i>
                <div class="tooltip">
                    افزودن به علاقه مندی ها
                </div>
            </li>
            <li class="flex">
                <i class="far fa-share-alt"></i>
                <div class="tooltip">
                    اشتراک گذاری
                </div>
            </li>
            <li class="flex">
                <i class="far fa-bell-on"></i>
                <div class="tooltip">
                    اطلاع رسانی شگفت انگیز
                </div>
            </li>
            <li class="flex">
                <i class="far fa-chart-line"></i>
                <div class="tooltip">
                    نمودار قیمت
                </div>
            </li>
            <li class="flex">
                <a href="compare/index/<?= $productInfo['id'] ?>" target="_blank" class="compare">
                    <i class="far fa-window-restore"></i>
                </a>
                <div class="tooltip">
                    مقایسه
                </div>
            </li>
        </ul>
    </div>
    <div class="image">
        <img id="zoomImage" src="public/images/product/<?= $productInfo['id'] ?>/product_350.jpg" alt=""
             data-zoom-image="public/images/product/<?= $productInfo['id'] ?>/product_1280.jpg">
    </div>
    <div class="imgGallery">
        <ul class="flex">
            <?php
            $images = $data['images'];
            //            print_r($images);
            foreach ($images as $row) {
                ?>
                <li class="showGallery">
                    <img src="public/images/product/<?= $row['product_id'] ?>/gallery/small/<?= $row['img'] ?>" alt=""
                         data-image-1280="public/images/product/<?= $row['product_id'] ?>/gallery/large/<?= $row['img'] ?>">
                </li>
                <?php
            }
            ?>
        </ul>
    </div>
</section>
<script src='public/js/jquery.zoom.min.js'></script>
<script>
    function addToFavorites(product_id) {
        var url = 'product/addToFavorites/' + product_id + ''
        var data = {}
        $.post(url, data, function (msg) {
            console.log(msg)
            $(' .galleryOptions ul li').addClass('active');
        })
    }
</script>

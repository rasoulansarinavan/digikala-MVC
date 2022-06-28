<div class="modalBox" id="imageGallery">
    <div class="modalContainer">
        <div class="title flex">
            تصاویر رسمی
            <i class="fal fa-times closeModel"></i>
        </div>
        <div class="contain flex">
            <div class="right">

                <span class='zoom' id='ex1'> <img src='public/images/product/4/product_1280.jpg' id='jack'
                                                  alt='Daisy on the Ohoopee'/></span>
            </div>
            <div class="left">
                <div class="productTitle">
                    گوشی موبایل سامسونگ مدل A52s 5G SM-A528B/DS دو سیم‌کارت ظرفیت 256 گیگابایت و رم 8 گیگابایت
                </div>
                <ul class="flex">
                    <?php
                    foreach ($images as $row) {
                        ?>
                        <li class="showGallery">
                            <img src="public/images/product/<?= $row['product_id'] ?>/gallery/small/<?= $row['img']; ?>"
                                 data-image-1280=public/images/product/<?= $row['product_id'] ?>/gallery/large/<?= $row['img']; ?>"
                                 alt="">
                        </li>
                        <?php
                    }
                    ?>
                </ul>
            </div>
        </div>
    </div>
</div>

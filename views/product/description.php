<section class="description">
    <div class="productTittleFa">
        <h1><?= $productInfo['title']; ?></h1>
    </div>
    <div class="productConfig">
                    <span class="productTittleEn">
                        Samsung Galaxy A52s 5G Dual SIM 256GB And 8GB Ram Mobile
                    </span>
        <div class="engagement flex">
            <div class="item">
                <i class="fas fa-star"></i>
                ۴.۲ (۱۲۱۶)
            </div>
            <div class="comments">
                ۸۴۵ دیدگاه کاربران
            </div>
            <div class="questionsAnswers">
                ۲۹۷ پرسش و پاسخ
            </div>
        </div>
        <div class="directory">
            <ul class="flex">
                <li>
                    برند :
                    <a href="">سامسونگ</a>
                </li>
                <li>
                    دسته بندی :
                    <a href="">گوشی موبایل</a>
                </li>
            </ul>
        </div>
    </div>

    <div class="productColor flex">
        <span>انتخاب رنگ :</span>
        <div class="colors">
            <?php
            foreach ($productInfo['colors'] as $color) {
                ?>
                <input type="radio" id="<?= $color['title']; ?>" name="colors" checked="checked"
                       value="<?= $color['id'] ?>">
                <label for="<?= $color['title']; ?>">
                    <span style="background-color: <?= $color['hex_code']; ?>"></span>
                    <?= $color['title']; ?>
                </label>
                <?php
            }
            ?>

        </div>
    </div>

    <div class="productFeatures">
        <ul data-title="ویژگی های کالا">
            <li>حافظه داخلی : 256 گیگابایت</li>
            <li>شبکه های ارتباطی :
                5G، 4G، 3G، 2G
            </li>
            <li> اندازه صفحه نمایش :
                6.0 اینچ و بزرگتر
            </li>
            <li>دقت صفحه نمایش :
                Full HD| 1920 x1080
            </li>
            <li>طبقه‌بندی :
                کاربری مالتی‌مدیا ، کاربری عمومی
            </li>
            <li>ساختار بدنه :
                قاب جلویی و پشتی از جنس شیشه
            </li>
            <li>سایر قابلیت‌ها :
                شیشه سرامیکی مقاوم در برابر خراش
            </li>
        </ul>
        <div class="showMore">
                        <span>
                           + مشاهده بیشتر
                        </span>
        </div>
    </div>
</section>

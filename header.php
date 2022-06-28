<!DOCTYPE html>
<html lang="en">
<head>
    <base href="<?= BASE ?>">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1">
    <title>فروشگاه اینترنتی دیجی کالا</title>
    <link rel="stylesheet" href="public/css/style.css" type="text/css">
    <link rel="stylesheet" href="public/fonts/iranyekan/WebFonts/css/stylef.css">
    <link rel="stylesheet" href="public/fonts/iranyekan/Farsi_numerals/WebFonts/css/fontiran.css">
    <link rel="stylesheet" href="public/fonts/FontAwesome.Pro.6.0.0.Beta3/Web/css/all.min.css">
    <link rel="stylesheet" href="public/css/swiper.min.css">
    <script src="public/js/jquery-3.6.0.min.js"></script>
    <script src="public/js/jquery.countdown.min.js"></script>
    <script src="public/js/jquery.elevateZoom-2.2.3.min.js"></script>
    <script src="public/js/jquery-ui.js"></script>
    <link rel="stylesheet" href="//code.jquery.com/ui/1.13.0/themes/base/jquery-ui.css">
    <link rel="stylesheet" href="public/css/kamadatepicker.min.css">
    <script src="public/js/kamadatepicker.min.js"></script>
    <?php
    Model::sessionInit();
    $user = Model::sessionGet('user_id');
    $basket = Model::getBasketInfo()[0];
    $totalPrice = Model::getBasketInfo()[1];
    $totalNumber = Model::getBasketInfo()[3];
    ?>
</head>
<body>
<header>
    <div class="header">
        <div class="headerRight">
            <a href="public/" class="logo"></a>
            <i class="fal fa-search"></i>
            <input type="text" class="searchBox" placeholder="جستجو در دیجی کالا...">
            <i class="fa fa-times-circle"></i>
            <div class="searchResult" hidden>
                <ul class="searchResult__items">
                </ul>
            </div>
        </div>
        <div class="headerLeft">
            <?php
            if ($user == '') {
                ?>
                <a href="javascript:void(0)" class="login">
                    <i class="far fa-user-alt"></i>
                    ورود به حساب کاربری
                </a>
                <?php
            } else {
                ?>
                <a href="javascript:void(0)" class="login">
                    <i class="far fa-user-alt"></i>
                    خوش آمدید
                    <i class="far fa-chevron-down" style="font-size: 10px"></i>
                </a>
                <?php
            }
            ?>
            <div class="basketIcon">
                <i class="far fa-shopping-cart"></i>
                <?php
                if ($totalNumber == !0) {
                    ?>
                    <div class="basket">
                        <div class="basketHeader flex">
                            <span><?= $totalNumber ?> کالا</span>
                            <a class="showBasket" href="cart">مشاهده سبد خرید</a>
                        </div>
                        <div class="basketBody">
                            <?php
                            foreach ($basket as $item) {
                                ?>
                                <div class="basketBody__product__item flex">
                                    <div class="basketBody__img">
                                        <img src="public/images/product/<?= $item['id'] ?>/product_115.jpg" alt="">
                                    </div>
                                    <div class="basketBody__product_info">
                                        <a href="#" class="title"><?= $item['title'] ?></a>
                                        <div class="action flex">
                                            <span><?= $item['number'] ?> عدد </span>
                                            <i class="fa fa-trash" onclick="removeProduct(<?= $item['id'] ?>,this)"></i>
                                        </div>
                                    </div>
                                </div>
                                <?php
                            }
                            ?>

                        </div>
                        <div class="basketFooter flex">
                            <div class="basketFooter__Price">
                                مبلغ قال پرداخت
                                <span><?= number_format($totalPrice) ?> تومان </span>
                            </div>
                            <a href="shipping" class="basketFooter__submit">ثبت سفارش</a>
                        </div>
                    </div>
                    <?php
                }
                ?>
                <span class="basketNumber"><?= $totalNumber ?></span>
            </div>
        </div>
    </div>
    <nav>
        <div class="container">
            <ul class="flex">
                <li class="menu1">
                    <ul class="flex">
                        <li class="menu1_item category">
                            <a>
                                دسته بندی کالاها
                            </a>
                            <?php
                            require ('views/index/mega_menu.php')
                            ?>
                        </li>
                        <li class="menu1_item"><a href="public/">سوپرمارکت</a></li>
                        <li class="menu1_item"><a href="public/">تخفیف هاوپیشنهادها</a></li>
                        <li class="menu1_item"><a href="public/">دیجی کالای من</a></li>
                        <li class="menu1_item"><a href="public/">دیجی پلاس</a></li>
                        <li class="menu1_item"><a href="public/">دیجی کلاب</a></li>
                        <li class="menu1_item"><a href="public/">سوالی دارید؟</a></li>
                    </ul>
                </li>
                <li class="sendTo">
                    <span> لطفا شهر و استان خود را انتخاب کنید</span>
                </li>
            </ul>
        </div>
    </nav>
</header>
<div class="overLay" hidden></div>

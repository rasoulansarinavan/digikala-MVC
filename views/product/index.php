<main>
    <div class="container" id="product">
        <div class="navBar flex">
            <nav>
                <ul class="flex">
                    <li><a href="">دیجی کالا </a></li>
                    <li><a href="">کالای دیجیتال </a></li>
                    <li><a href="">موبایل </a></li>
                    <li><a href="">گوشی موبایل</a></li>
                </ul>
            </nav>
            <div class="feedBack">
                <a>بازخورد درباره این کالا</a>
            </div>
        </div>
        <article class="flex">
            <?php
            $productInfo = $data['productInfo'];
            $images = $data['images'];
//            print_r($data);
            require('gallery.php');
            require('description.php');
            require('details.php');
            ?>
        </article>
        <?php require('swiper_slider.php'); ?>
        <section class="tab">
            <ul class="flex" id="tabs">
                <li class="active"><a>نقد و بررسی</a></li>
                <li><a>مشخصات</a></li>
                <li><a>نظرات کاربران</a></li>
                <li><a>پرسش و پاسخ</a></li>
            </ul>
            <div id="tabChildes">
                <div class=" tab1 hidden">
                </div>
                <div class="tab2 hidden">
                </div>
                <div class="tab3 hidden">
                </div>
                <div class="tab4 hidden">
                </div>

                <!--                                --><?php //=
                //                                require('tab1.php');
                //                                require('tab2.php');
                //                                require('tab3.php');
                //                                require('tab4.php');
                //                                ?>

            </div>
        </section>
    </div>
</main>

<?php
require('modal_feedback.php');
require('modal_bestPrice.php');
require('modal_imageGallery.php');
?>

<script src="public/js/product.js"></script>

<script>
    $('#product #tabs li').click(function () {
        $('#product #tabs li').removeClass('active');
        $(this).addClass('active');
        var child = $('#product #tabChildes .hidden');

        child.fadeOut(0);
        var index = $(this).index();
        child.eq(index).slideToggle();

        var idProduct = '<?= $productInfo['id'] ?>';
        var idCategory = '<?= $productInfo['category_id'] ?>';
        var url = ('product/tabs/' + idProduct + '/' + idCategory + '');
        var data = {'number': index}
        $.post(url, data, function (msg) {
            child.html(msg);
        })
    })

</script>

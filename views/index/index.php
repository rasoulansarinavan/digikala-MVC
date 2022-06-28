<main>
    <article id="index">
        <?php
        require('swiper_slider.php');
        require('specialOffer.php');
        require('banner1.php');
        require('marketSlider.php');
        require('banner1_2.php');
        ?>
        <article class="box container">
            <?php require('boxContainer.php'); ?>
            <section>
                <?php require('swiper_slider_s1.php');
                require('banner1_3.php');
                require('swiper_slider_s1_2.php');
                ?>
            </section>
            <section>
                <?php require('swiper_slider_s1_3.php'); ?>
            </section>
            <section>
                <?php require('banner1_4.php'); ?>
            </section>
            <section>
                <?php require('swiper_slider_s1_4.php'); ?>
            </section>
            <section>
                <?php require('swiper_slider_s1_5.php'); ?>
            </section>
            <section>
                <?php require('swiper_slider_s1_6.php'); ?>
            </section>
            <section>
                <?php require('swiper_slider_s1_7.php'); ?>
            </section>
            <section>
                <?php require('swiper_slider_s1_8.php'); ?>
            </section>
            <section class="brand">
                <?php require('swiper_slider_s1_9.php'); ?>
            </section>
            <section>
                <?php require('swiper_slider_s1_10.php'); ?>
            </section>
        </article>
    </article>
</main>


<script type="text/javascript" src="public/js/swiper-bundle.min.js"></script>
<script>
    var swiper0 = new Swiper('.s0', {
        slidesPerView: 1,
        spaceBetween: 30,
        loop: true,
        pagination: {
            el: '.swiper-pagination',
            clickable: true,
        },
        autoplay: {
            delay: 2500,
            disableOnInteraction: false,
        },
        navigation: {
            nextEl: '.swiper-button-next',
            prevEl: '.swiper-button-prev',
        },
    });
</script>
<script>
    var swiper1 = new Swiper('.s1', {
        spaceBetween: 20,
        slidesPerView: 4,
        direction: getDirection(),
        navigation: {
            nextEl: '.swiper-button-next',
            prevEl: '.swiper-button-prev',
        },
        on: {
            resize: function () {
                swiper.changeDirection(getDirection());
            },
        },
    });

    function getDirection() {
        var windowWidth = window.innerWidth;
        var direction = window.innerWidth <= 760 ? 'vertical' : 'horizontal';

        return direction;
    }
</script>
<script src="public/js/main.js">
</script>


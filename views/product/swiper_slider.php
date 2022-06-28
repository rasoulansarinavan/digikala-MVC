<section>
    <div class="swiper-container s1 swiper1">
        <div class="headLine">
                    <span>
                         محصولات مرتبط
                    </span>
        </div>
        <div class="swiper-wrapper">
            <div class="swiper-slide">
                <a class="card" href="">
                    <div class="image">
                        <img src="public/images/product/m1.jpg" alt="">
                    </div>
                    <div class="title">
                        محصول شماره 1
                    </div>
                    <div class="price">
                        <div class="oldPrice">
                            <del>23000</del>
                            <span class="percent">20%</span>
                        </div>
                        <div class="newPrice">
                            <span>18000</span>
                            <span>تومان</span>
                        </div>
                    </div>
                </a>
            </div>
            <div class="swiper-slide">
                <a class="card" href="">
                    <div class="image">
                        <img src="public/images/product/m2.jpg" alt="">
                    </div>
                    <div class="title">
                        محصول شماره 2
                    </div>
                    <div class="price">
                        <div class="oldPrice">
                            <del>23000</del>
                            <span class="percent">20%</span>
                        </div>
                        <div class="newPrice">
                            <span>18000</span>
                            <span>تومان</span>
                        </div>
                    </div>
                </a>
            </div>
            <div class="swiper-slide">
                <a class="card" href="">
                    <div class="image">
                        <img src="public/images/product/m3.jpg" alt="">
                    </div>
                    <div class="title">
                        محصول شماره 3
                    </div>
                    <div class="price">
                        <div class="oldPrice">
                            <del>23000</del>
                            <span class="percent">20%</span>
                        </div>
                        <div class="newPrice">
                            <span>18000</span>
                            <span>تومان</span>
                        </div>
                    </div>
                </a>
            </div>
            <div class="swiper-slide">
                <a class="card" href="">
                    <div class="image">
                        <img src="public/images/product/m4.jpg" alt="">
                    </div>
                    <div class="title">
                        محصول شماره 4
                    </div>
                    <div class="price">
                        <div class="oldPrice">
                            <del>23000</del>
                            <span class="percent">20%</span>
                        </div>
                        <div class="newPrice">
                            <span>18000</span>
                            <span>تومان</span>
                        </div>
                    </div>
                </a>
            </div>
            <div class="swiper-slide">
                <a class="card" href="">
                    <div class="image">
                        <img src="public/images/product/m5.jpg" alt="">
                    </div>
                    <div class="title">
                        محصول شماره 5
                    </div>
                    <div class="price">
                        <div class="oldPrice">
                            <del>23000</del>
                            <span class="percent">20%</span>
                        </div>
                        <div class="newPrice">
                            <span>18000</span>
                            <span>تومان</span>
                        </div>
                    </div>
                </a>
            </div>
            <div class="swiper-slide">
                <a class="card" href="">
                    <div class="image">
                        <img src="public/images/product/m6.jpg" alt="">
                    </div>
                    <div class="title">
                        محصول شماره 6
                    </div>
                    <div class="price">
                        <div class="oldPrice">
                            <del>23000</del>
                            <span class="percent">20%</span>
                        </div>
                        <div class="newPrice">
                            <span>18000</span>
                            <span>تومان</span>
                        </div>
                    </div>
                </a>
            </div>
            <div class="swiper-slide">
                <a class="card" href="">
                    <div class="image">
                        <img src="public/images/product/m7.jpg" alt="">
                    </div>
                    <div class="title">
                        محصول شماره 7
                    </div>
                    <div class="price">
                        <div class="oldPrice">
                            <del>23000</del>
                            <span class="percent">20%</span>
                        </div>
                        <div class="newPrice">
                            <span>18000</span>
                            <span>تومان</span>
                        </div>
                    </div>
                </a>
            </div>
            <div class="swiper-slide">
                <a class="card" href="">
                    <div class="image">
                        <img src="public/images/product/m8.jpg" alt="">
                    </div>
                    <div class="title">
                        محصول شماره 8
                    </div>
                    <div class="price">
                        <div class="oldPrice">
                            <del>23000</del>
                            <span class="percent">20%</span>
                        </div>
                        <div class="newPrice">
                            <span>18000</span>
                            <span>تومان</span>
                        </div>
                    </div>
                </a>
            </div>
        </div>
        <div class="swiper-button-next next"></div>
        <div class="swiper-button-prev prev"></div>
    </div>
</section>
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


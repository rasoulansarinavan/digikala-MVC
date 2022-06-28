<?php
$options = Model::getOptions();
?>

<?php
$user = Model::sessionGet('user_id');
if ($user == '') {
    ?>
    <div id="loginModal" style="display: none">
        <div class="contain">
            <div class="header">
                ورود
            </div>
            <label>
                پست الکترونیکی خود را وارد کنید
                <input type="text" name="email">
            </label>
            <label>
                رمز عبور خود را وارد کنید
                <input type="password" name="password">
            </label>
            <div class="error">
            </div>
            <button onclick="checkUserLogin()" class="login">
                ورود به دیجی کالا
            </button>
        </div>
    </div>
    <?php
}
?>

<footer>
    <div class="scrollTop flex">
        برگشت به بالا
    </div>
    <div class="contain container">
        <nav class="feature flex container mx1450">
            <a href="public/"><img src="public/css/images/footer/item1.svg" alt="">
                <div class="itemTitle">
                    امکان تحویل اکسپرس
                </div>
            </a>
            <a href="public/"><img src="public/css/images/footer/item2.svg" alt="">
                <div class="itemTitle">
                    امکان پرداخت در محل
                </div>
            </a>
            <a href="public/"><img src="public/css/images/footer/item3.svg" alt="">
                <div class="itemTitle">
                    7 روز هفته,24 ساعته
                </div>
            </a>
            <a href="public/"><img src="public/css/images/footer/item4.svg" alt="">
                <div class="itemTitle">
                    7 روز ضمانت بازگشت کالا
                </div>
            </a>
            <a href="public/"><img src="public/css/images/footer/item5.svg" alt="">
                <div class="itemTitle">
                    ضمانت اصل بودن کالا
                </div>
            </a>
        </nav>
        <div class="middleBar flex container mx1450">
            <div class="right flex">
                <nav>
                    <a href="public/">راهنمای خرید از دیجی کالا</a>
                    <a href="public/">نحوه ثبت سفارش</a>
                    <a href="public/">نحوه ثبت سفارش</a>
                    <a href="public/">نحوه ثبت سفارش</a>
                </nav>
                <nav>
                    <a href="public/">خدمات مشتریان</a>
                    <a href="public/">نحوه ثبت سفارش</a>
                    <a href="public/">نحوه ثبت سفارش</a>
                    <a href="public/">نحوه ثبت سفارش</a>
                </nav>
                <nav>
                    <a href="public/">با دیجی کالا</a>
                    <a href="public/">نحوه ثبت سفارش</a>
                    <a href="public/">نحوه ثبت سفارش</a>
                    <a href="public/">نحوه ثبت سفارش</a>
                </nav>
            </div>
            <div class="left">
                <div>از تخفیف ها و جدیدترین های دیجی کالا با خبر شوید:</div>
                <div class="form">
                    <form action="">
                        <input type="text" placeholder="آدرس ایمیل خودرا وارد کنید">
                        <button>ارسال</button>
                    </form>
                </div>
                <div>
                    دیجی کالا را در شبکه های اجتماعی دنبال کنید:
                </div>
                <div class="socialMedia flex">
                    <a href="<?= $options['twitter_footer']; ?>"><i class="fab fa-twitter"></i></a>
                    <a href="<?= $options['instagram_footer']; ?>"><i class="fab fa-instagram"></i></a>
                    <a href="<?= $options['linkedin_footer']; ?>"><i class="fab fa-linkedin"></i></a>
                </div>
            </div>
        </div>
        <nav class="contactUs flex container">
            <ul class="flex">
                <li>هفت روز هفته 24 ساعته در خدمت شما هستیم</li>
                <li>شماره تماس: <a href="public/"><?= $options['phone_footer']; ?></a></li>
                <li> آدرس ایمیل: <a href="public/"><?= $options['email_footer']; ?></a></li>
            </ul>
            <div class="downloadApp flex">
                <a href="<?= $options['download_app_sib']; ?>"><img src="public/css/images/footer/sibe.svg" alt=""></a>
                <a href="<?= $options['download_app_googleplay']; ?>"><img src="public/css/images/footer/playstore.svg"
                                                                           alt=""></a>
                <a href="<?= $options['download_app_bazar']; ?>"><img src="public/css/images/footer/bazzar.svg" alt=""></a>
            </div>
        </nav>
    </div>
    <div class="info">
        <div class="description flex container">
            <div class="right">
                <h1>
                    فروشگاه اینترنتی دیجی‌کالا، بررسی، انتخاب و خرید آنلاین
                </h1>
                <p>
                    دیجی‌کالا به عنوان یکی از قدیمی‌ترین فروشگاه های اینترنتی با بیش از یک دهه تجربه، با پایبندی به سه
                    اصل، پرداخت در محل، ۷ روز ضمانت بازگشت کالا و تضمین اصل‌بودن کالا موفق شده تا همگام با فروشگاه‌های
                    معتبر جهان، به بزرگ‌ترین فروشگاه اینترنتی ایران تبدیل شود. به محض ورود به سایت دیجی‌کالا با دنیایی
                    از کالا رو به رو می‌شوید! هر آنچه که نیاز دارید و به ذهن شما خطور می‌کند در اینجا پیدا خواهید کرد.
                </p>
            </div>
            <div class="left flex">
                <a href="public/"><img width="170px" src="public/css/images/footer/c1.png" alt=""></a>
                <a href="public/"><img width="170px" src="public/css/images/footer/c2.png" alt=""></a>
                <a href="public/"><img width="170px" src="public/css/images/footer/c3.png" alt=""></a>
            </div>
        </div>
        <nav class="partners ">
            <ul class="flex container">
                <li><a href="public/"><img src="public/css/images/footer/digi%20pay.svg" alt=""></a></li>
                <li><a href="public/"><img src="public/css/images/footer/digi%20style.svg" alt=""></a></li>
                <li><a href="public/"><img src="public/css/images/footer/digikala%20mag.svg" alt=""></a></li>
                <li><a href="public/"><img src="public/css/images/footer/digikala%20club.svg" alt=""></a></li>
                <li><a href="public/"><img src="public/css/images/footer/digikala%20aff.svg" alt=""></a></li>
                <li><a href="public/"><img src="public/css/images/footer/digikala%20fidibo.svg" alt=""></a></li>
            </ul>
        </nav>
        <div class="copyRight">
            <p>
                <?= $options['copy_right_footer']; ?>
            </p>
        </div>
    </div>
</footer>

<script>
    $('[data-countdown]').each(function () {
        var $this = $(this), finalDate = $(this).data('countdown');
        $this.countdown(finalDate, function (event) {
            $this.html(event.strftime('%H:%M:%S'));
        });
    });
</script>

<script>
    $('.login').on('click', function () {

        $('#loginModal').fadeIn()
        $('body').addClass('active');
    })

    function checkUserLogin() {
        var email = $("input[name='email']").val();
        var password = $('input[name="password"]').val();

        var url = 'login/checkUserLogin';
        var data = {'email': email, 'password': password};
        $.post(url, data, function (msg) {
            console.log(msg);
            if (msg == 1) {
                window.location = window.location.href;
            } else {
                var error = '<div>نام کاربری یا رمز عبور اشتباه است </div>';
                $('#loginModal .error').html(error);
            }
        })
    }

    //function of close modal if press ESC
    $(document).keydown(function (e) {
        if (e.keyCode === 27) {
            $('#loginModal').fadeOut();
            $('body').removeClass('active');
            $('.compare_modal').fadeOut();
        }
    })
    //function of close modal if outside click//
    var modal = document.getElementById('loginModal');

    window.addEventListener("click", OutSide);

    function OutSide(e) {
        if (e.target == modal) {
            modal.style.display = 'none';
            $('body').removeClass('active');
        }
    }

    function removeProduct(product_id, tag) {
        var trashIcon = $(tag)
        var productItem = trashIcon.parents('.basketBody__product__item')
        var url = 'index/removeProduct/' + product_id + ''
        var data = {}
        $.post(url, data, function (msg) {
            console.log(msg)
            productItem.fadeOut()
            var totalPrice = msg[1]
            var totalNumber = msg[3]
            $('.basketNumber').html(totalNumber)
            $('.basketHeader span').html(totalNumber + 'کالا')
            $('.basketFooter__Price span').html(totalPrice + 'تومان')

            // برای زمانی که تعداد سبد خرید صفر شو صفحه رفرش شود

            if (totalNumber == 0) {
                window.location.reload();
            }
            // برای زمانی که تعداد سبد خرید صفر شو صفحه رفرش شود


        }, 'json')
    }

    $('.searchBox').keyup(function () {
        $(this).addClass('active')
        $('.searchResult').fadeIn()
        $('.headerRight .fa-times-circle').fadeIn()
        $('.overLay').fadeIn()
        var title = $(this).val()

        var url = 'index/search'
        var data = {'title': title}
        $.post(url, data, function (msg) {
            console.log(msg)
            $('.searchResult__items').html('');

            if (msg != 0) {
                $.each(msg, function (index, value) {
                    var productName = value['title']
                    var id = value['id']
                    var price = value['price'].toLocaleString()

                    var searchResult = '<li class="resultItem"><a href="product/index/' + id + '" class="flex"><div class="resultItem__title">' + productName + '</div><div class="resultItem__price">' + price + ' تومان</div></a></li>'
                    $('.searchResult__items').append(searchResult);
                })
            } else {
                $('.searchResult__items').html('');
            }
        }, 'json')
    })

    $('.fa-times-circle').on('click', function () {
        //$(this).fadeOut(0)
        $('.searchResult').fadeOut()
        $('.overLay').fadeOut()
        $('.searchBox').removeClass('active')
        $('.searchBox').val('')
        $('.compare_modal').fadeOut()


    })

    $('.mega_menu_level_1_item').hover(function () {
        $('.mega_menu_level_2').removeClass('show')
        $(this).find('.mega_menu_level_2').addClass('show')
    }, function () {

    })
    $('.category').hover(function () {
        $('.mega_menu').fadeIn()
        $('.overLay').fadeIn()
    }, function () {
        $('.mega_menu').fadeOut()
        $('.overLay').fadeOut()
    })
</script>

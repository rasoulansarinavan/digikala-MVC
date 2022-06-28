<?php
$product_id = $data ['product_id'];


?>
<article>
    <div class="questionsAnswer">
        پرسش و پاسخ
        <span>پرسش خود را در مورد محصول مطرح نمایید</span>
    </div>
    <textarea id="question" cols="30" rows="10"></textarea>
    <div class="sendQuestion flex">
        <button id="sendQuestion" onclick="sendQuestion(<?= $product_id ?>,this)">ثبت پرسی</button>
        <div class="agreementCheck">
            <input type="checkbox" id="check">
            <label for="check">
                اولین پاسخی که به پرسش من داده شد، از طریق ایمیل به من اطلاع دهید.
                با انتخاب دکمه “ثبت پرسش”، موافقت خود را با
                <a href=""> قوانین انتشار محتوا</a>
                در دیجی کالا اعلام می کنم.
            </label>
        </div>
    </div>
    <div class="filters flex">
        <span>نظرات کاربران</span>
        <ul class="flex">
            <li>نظر خریداران</li>
            <li>مفیدترین نظرات</li>
            <li>جدیدترین نظرات</li>
        </ul>
    </div>
    <?php
    $questions = $data ['questions'];

    foreach ($questions as $item) {
        ?>


        <ul class="question">
            <li class="flex questionItem">
                <div class="right">
                                    <span>
                                        پرسش
                                    </span>
                    <span class="userName">
                                        محمد حمیدی
                                    </span>
                </div>
                <div class="left">
                    <?= $item['context'] ?>
                    <div class="bottom flex">
                        <div class="time">
                            <?= $item['time'] ?>
                        </div>
                        <div class="answer">
                            به این پرسش پاسخ دهید
                        </div>
                    </div>

                </div>
            </li>


            <li class="flex writeAnswer">
                <div class="right">
                                    <span>
                                        پاسخ
                                    </span>
                </div>
                <div class="left flex">
                    <div class="answerForm">
                                        <span>
                                            به این سوال پاسخ دهید
                                        </span>
                        <textarea>

                        </textarea>
                        <button onclick="sendAnswer(<?= $item['id'] ?>,<?= $item['product_id'] ?>,this)">
                            ثبت پاسخ
                        </button>
                    </div>
                    <ul class="answerInfo">
                        <li>
                            قبلا از این محصول استفاده کرده‌اید؟
                            <p>
                                همیشه بهتر است، به سوالاتی پاسخ بدهید که سوال شخصی شما پیش از این بوده و
                                با تجربه یا تحقیق پاسخ آن را بدست آورده اید.
                            </p>
                        </li>
                        <li>
                            خوانندگان خود را آموزش دهید
                            <p>
                                اگر سوال پرسیده شده مربوط به تخصص یا تجربه شماست، بدون تعصب، پاسخ مرتبط
                                را به شیوه ای که خواننده بتواند از آن استفاده کند، ارائه دهید.

                            </p>
                        </li>
                        <li>
                            خودتان باشید، آموزنده باشید
                            <p>
                                نظرات و انتقادات خودتان را بازگو کنید اما به یاد داشته باشید که نظراتتان
                                باید منطقی باشد.

                            </p>
                        </li>
                        <li>
                            مختصرگو باشید
                            <p>
                                خلاق باشید اما موضوع نقد را فراموش نکنید، یک عنوان جذاب همیشه خوانندگان
                                را جذب می کند.

                            </p>
                        </li>
                        <li>
                            خوانا بنویسید
                            <p>
                                یک ویرایش صحیح و کنترل املای صحیح کلمات اعتبار بیشتری به نقد و بررسی
                                نوشته شده توسط شما می دهد. همچنین برای بالا رفتن خوانایی، فاصله بین
                                پاراگراف ها و بالت گذاری را رعایت کنید.

                            </p>
                        </li>

                    </ul>

                </div>
            </li>
            <?php
            $answers = $item['answers'];
            foreach ($answers as $row) {
                ?>
                <li class="flex answerItem">
                    <div class="right">
                                    <span>
                                        پاسخ
                                    </span>
                        <span class="userName">
                                        محمد حمیدی
                                    </span>
                    </div>
                    <div class="left">
                        <?= $row['context'] ?>
                        <div class="bottom flex">
                            <div class="time">
                                <?= $row['time'] ?>
                            </div>
                            <ul class="flex answerLike">
                                <li class="yes">
                                    ۱۳ بله
                                </li>
                                <li class="no">
                                    ۵ خیر
                                </li>

                            </ul>
                        </div>

                    </div>
                </li>
                <?php
            }
            ?>
        </ul>
        <?php
    }
    ?>

</article>


<script>
    var answer = $('#product .tab #tabChildes .tab4 article .question li .left .bottom .answer');

    answer.click(function () {
        $(this).parents('.question').find('.writeAnswer').slideToggle();

    });

    function sendAnswer(question_id, product_id, tag) {
        var buttonTag = $(tag)
        var answer = buttonTag.parents('.answerForm').find('textarea').val()
        var url = 'product/sendAnswer/' + question_id + ''
        var data = {'answer': answer, 'product_id': product_id}
        $.post(url, data, function (msg) {
            console.log(msg)
            if (msg == '') {
                $('.answerForm button').html('پاسخ شما بعد از تایید نمایش داده میشود')
            }
        });
    }

    function sendQuestion(product_id, tag) {
        var buttonTag = $(tag)
        var question = buttonTag.parents('article').find('#question').val()

        var url = 'product/sendQuestion/' + product_id + ''
        var data = {'question': question}

        $.post(url, data, function (msg) {
            console.log(msg)
            if (msg == '') {
                $('.sendQuestion button').html('پرسش شما بعد از تایید نمایش داده میشود')
            }
        });
    }

</script>
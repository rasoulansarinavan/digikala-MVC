<article>
    <h2 class="h2">امتیاز کاربر به:
        <span>
                                Samsung Galaxy A52s 5G SM-A528B/DS Dual SIM 256GB And 8GB Ram Mobile Phone
                            </span>
        <span>
                                بیش از (<?= $comments_number = $data['comments_number'] ?> نفر) از خریداران این محصول را پیشنهاد داده‌اند
                            </span>
    </h2>
    <section>
        <div class="flex">
            <div class="rating">
                <ul>
                    <?php
                    $comment_param_new = $data['comment_param_new'];
                    $scores_total = $data['scores_total'];
                    foreach ($comment_param_new
                             as $item) {
                        $score = $scores_total[$item['id']];
                        ?>
                        <li class="flex">
                            <div class="items">
                                <?= $item['title'] ?>
                            </div>
                            <div class="value">
                                <div class="rate" style="width: <?= $score * 20 ?>%"></div>
                            </div>
                            <div><?= $score ?></div>
                        </li>
                        <?php
                    }
                    ?>
                </ul>
            </div>
            <div class="addComment">
                                <span>
                                    دیدگاه خود را درباره این کالا بیان کنید
                                </span>
                <p>
                    برای ثبت نظر لازم است ابتدا وارد حساب کاربری خود شوید اگر این محصول را قبلا از
                    دیجی کالا خریده باشید نظر شما به عنوان مالک محصول ثبت خواهد شد
                </p>
                <a href="">افزودن نظر جدید</a>
            </div>
        </div>
    </section>
    <div class="filters flex">
                        <span>
                            نظرات کاربران
                        </span>
        <ul class="flex">
            <li>نظر خریداران</li>
            <li>مفیدترین نظرات</li>
            <li>جدیدترین نظرات</li>
        </ul>
    </div>
    <div class="productComments">
        <ul>
            <?php
            $comments = $data['comments'];
            foreach ($comments as $row) {
                ?>
                <li class="flex">
                    <div class="userInfo">
                                        <span class="userName">
                                            رسول انصاری
                                            <span>خریدار</span>
                                        </span>
                        <span class="time"><?= $row['time'] ?></span>
                    </div>
                    <div class="matnComment">
                        <p class="commentTitle">
                            <?= $row['title'] ?>
                        </p>
                        <p class="comment"><?= $row['context'] ?>
                        </p>
                        <ul class="positive">
                            <li>خوش دست بودن</li>
                        </ul>
                        <ul class="negative">
                            <li>باطری متوسط</li>
                        </ul>
                    </div>
                </li>
                <?php
            }
            ?>
        </ul>
    </div>
</article>


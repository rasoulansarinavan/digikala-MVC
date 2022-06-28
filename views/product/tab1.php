<div class="tab1Container">
    <h2 class="h2">
        نقد و بررسی اجمالی
        <span>
                                Samsung Galaxy A52s 5G SM-A528B/DS Dual SIM 256GB And 8GB Ram Mobile Phone
                            </span>
    </h2>
    <section class="expertSummary flex">
        <div class="contain">
            <?= $introduction = $data['introduction'];
            $review = $data['review'];
            ?>
            <div id="showMore1">نمایش بیشتر</div>
        </div>
        <span></span>
    </section>
    <div class="articles">
        <?php
        foreach ($review as $item) {
            ?>
            <section class="contentArticle">
                <button>-</button>
                <h3><?= $item['title'] ?></h3>
                <p><?= $item['review'] ?></p>
            </section>
            <?php
        }
        ?>
    </div>
</div>
<script>
    var showMore1 = $('#showMore1');
    var div = $('#product .tab #tabChildes .tab1 .tab1Container .expertSummary > div');

    showMore1.click(function () {
        if (div.hasClass('active')) {
            showMore1.text('+ نمایش بیشتر')
        } else {
            showMore1.text('- نمایش کمتر')
        }
        div.toggleClass('active');
        showMore1.toggleClass('active');
    })


    var button = $('#product .tab #tabChildes .tab1 .tab1Container .articles section > button');

    button.click(function () {
        var matn = $(this).parents('.contentArticle').find('p');

        if (matn.hasClass('hidden')) {
            $(this).parents('.contentArticle').find('button').text('-')
        } else {
            $(this).parents('.contentArticle').find('button').text('+')
        }
        matn.toggleClass('hidden');
    })
</script>


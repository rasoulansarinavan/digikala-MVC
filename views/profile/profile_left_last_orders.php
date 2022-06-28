<div class="lastProduct_title">
    آخرین سفارش‌ها
</div>
<div class="table_orders">
    <div class="table_orders_header flex">
        <div class="table_order_header_item fb10">#</div>
        <div class="table_order_header_item fb16">شماره سفارش
        </div>
        <div class="table_order_header_item fb16">تاریخ ثبت سفارش
        </div>
        <div class="table_order_header_item fb16">مبلغ قابل پرداخت
        </div>
        <div class="table_order_header_item fb16">مبلغ کل
        </div>
        <div class="table_order_header_item fb16">عملیات پرداخت
        </div>
        <div class="table_order_header_item fb10">جزییات</div>

    </div>
    <div class="table_orders_body">
        <?php

        $i = 1;
        foreach ($order as $item) {
            ?>
            <div class="flex">
                <div class="table_order_item fb10">
                    <?= $i ?>
                </div>
                <div class="table_order_item fb16">
                    <?= $item['order_number'] ?>
                </div>
                <div class="table_order_item fb16">
                    <?= $item['order_date'][0] ?>
                </div>
                <div class="table_order_item fb16">
                    <?= $item['price'] ?>
                </div>
                <div class="table_order_item fb16">
                    <?= $item['price'] ?>
                </div>
                <div class="table_order_item fb16">عملیات پرداخت
                </div>
                <a href="profile/orders/<?= $item['id'] ?>" class="table_order_item fb10 details">
                    <i class="fal fa-chevron-left"></i>
                </a>
            </div>
            <?php
            $i++;
        }

        ?>


    </div>
</div>
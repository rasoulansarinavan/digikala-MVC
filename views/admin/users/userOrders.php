<?php
require('views/admin/admin_header.php');

$orders = $data['orders'];
?>


<style>
    p, button {
        font-family: iranyekan;
    }
</style>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="d-flex align-items-center">
            <div class="mr-auto">
                <h3 class="page-title">سفارشات</h3>
                <div class="d-inline-block align-items-center">
                    <nav>
                        <ol class="breadcrumb">

                            <li class="breadcrumb-item active" aria-current="page"> تعداد سفارشات
                                : <?= sizeof($orders) ?></li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>

    <!-- Main content -->
    <section class="content">

        <div class="row">
            <div class="col-12">
                <div class="box">
                    <div class="box-body">
                        <div class="table-responsive">
                            <table id="productorder" class="table table-hover no-wrap product-order"
                                   data-page-size="10">
                                <thead>
                                <tr class="bg-secondary">
                                    <th>ردیف</th>
                                    <th>تاریخ سفارش</th>
                                    <th>مبلغ</th>
                                    <th>نوع پرداخت</th>
                                    <th>نوع ارسال</th>
                                    <th>سفارشات</th>
                                    <th>جزییات سفارش</th>
                                    <th>وضعیت سفارش</th>
                                </tr>
                                </thead>
                                <tbody>

                                <?php
                                $i = 1;
                                foreach ($orders

                                as $row) {
                                ?>
                                <tr>
                                    <td><?= $i ?></td>
                                    <td><?= $row['order_date'] ?></td>
                                    <td><?= number_format($row['price']) ?></td>
                                    <td><?= $row['pay_type'] ?></td>
                                    <td><?= $row['delivery']['title'] ?></td>
                                    <td>
                                        <?php
                                        foreach ($row['basket'] as $item) {
                                            ?>
                                            <a class="btn btn-primary m-1" href="product/index/<?= $item['id'] ?>">نمایش
                                                محصول</a>
                                            <?php
                                        }
                                        ?>
                                    </td>
                                    <td>
                                        <a target="_blank" class="btn btn-success-outline"
                                           href="adminOrder/detail/<?= $row['id'] ?>">جزییات
                                            سفارش</a>
                                    </td>
                                    <?php
                                    $i++;
                                    }
                                    ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->


<?php
require('views/admin/admin_footer.php');
?>

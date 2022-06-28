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
                <h3 class="page-title">مدیریت سفارشات</h3>
                <div class="d-inline-block align-items-center">
                    <nav>
                        <ol class="breadcrumb">

                            <li class="breadcrumb-item active" aria-current="page"> تعداد سفارشات : <?=sizeof($orders)?></li>
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
                                    <th>تاریخ</th>
                                    <th>تحویل گیرنده</th>
                                    <th>موبایل</th>
                                    <th>مبلغ کل</th>
                                    <th>استان</th>
                                    <th>شهر</th>
                                    <th>جزییات سفارش</th>
                                </tr>
                                </thead>
                                <tbody>

                                <?php
                                $i = 1;
                                foreach ($orders as $row) {
                                    ?>
                                    <tr>
                                        <td><?= $i ?></td>
                                        <td><?= $row['order_date'] ?></td>
                                        <td><?= $row['address']['name'] ?> <?= $row['address']['family'] ?></td>
                                        <td><?= $row['address']['mobile'] ?></td>
                                        <td><?= $row['price'] ?></td>
                                        <td><?= $row['address']['province'] ?></td>
                                        <td><?= $row['address']['city'] ?></td>
                                        <td><a href="adminOrder/detail/<?=$row['id']?>" type="button" class="btn btn-danger mb-5"
                                           target="_blank">جزییات</a></td>
                                    </tr>
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

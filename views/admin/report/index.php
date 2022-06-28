<?php
@$reports = $data['reports'][0];
@$startDate = $data['reports'][1];
$startDate = Model::shamsi($startDate)[2];
@$endDate = $data['reports'][2];
$endDate = Model::shamsi($endDate)[2];

$totalPrice = $data['reports'][3];

require('views/admin/admin_header.php');
?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="d-flex align-items-center">
            <div class="mr-auto">
                <h3 class="page-title">گزارش گیری</h3>
            </div>
        </div>
    </div>

    <!-- Main content -->
    <section class="content">

        <div class="row">
            <div class="col-12">
                <div class="box">


                    <form class="form" action="adminReports/index" method="post">
                        <div class="box-body">
                            <h4 class="box-title text-info">سفارشات
                                <?php
                                if (isset($reports)) {
                                    ?>از
                                    تاریخ (  <?= $startDate ?>  <span style="color: red">الی</span>  <?= $endDate ?> )
                                    <?php
                                }
                                ?>
                            </h4>
                            <hr class="my-15">
                            <div class="row">
                                <div class="col-md-5">
                                    <div class="form-group">
                                        <label>تاریخ شروع</label>
                                        <input autocomplete="off" id="startDate" name="startDate" type="text" class="form-control"
                                               placeholder="">
                                    </div>
                                </div>
                                <div class="col-md-5">
                                    <div class="form-group">
                                        <label>تاریخ پایان</label>
                                        <input autocomplete="off" id="endDate" name="endDate" type="text" class="form-control"
                                               placeholder="">
                                    </div>
                                </div>

                                <div class="col-md-2" style="display: flex;align-items: center">
                                    <input type="submit" class="btn btn-primary btn-outline" value="ثبت">
                                </div>
                            </div>
                            <div>
                                <div class="callout callout-success font-size-20">
                                    فروش کل : <?= number_format($totalPrice) ?>
                                </div>
                                <div class="callout callout-danger font-size-20">
                                    تعداد کل سفارشات : <?= sizeof($reports) ?>
                                </div>
                            </div>
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
                                    if (isset($reports)){
                                    $i = 1;
                                    foreach ($reports as $row) {
                                        ?>
                                        <tr>
                                            <td><?= $i ?></td>
                                            <td><?= Model::shamsi($row['order_date'])[2] ?></td>
                                            <td><?= $row['address']['name'] ?> <?= $row['address']['family'] ?></td>
                                            <td><?= $row['address']['mobile'] ?></td>
                                            <td><?= number_format($row['price']) ?></td>
                                            <td><?= $row['address']['province'] ?></td>
                                            <td><?= $row['address']['city'] ?></td>
                                            <td><a href="adminOrder/detail/<?= $row['id'] ?>" type="button"
                                                   class="btn btn-danger mb-5"
                                                   target="_blank">جزییات</a></td>
                                        </tr>
                                        <?php
                                        $i++;
                                    }
                                    ?>
                                    </tbody>
                                    <?php
                                    }
                                    ?>
                                </table>
                            </div>
                        </div>
                        <!-- /.box-body -->


                </div>
                </form>

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

<script>
    $(document).ready(function () {
        kamaDatepicker('endDate', {
            buttonsColor: 'red',
            markToday: 'true',
            markHolidays: 'true',
            gotoToday: 'true',
            highlightSelectedDay: 'true',
            sync: 'true',
        });
    })
    $(document).ready(function () {
        kamaDatepicker('startDate', {
            buttonsColor: 'red',
            markToday: 'true',
            markHolidays: 'true',
            gotoToday: 'true',
            highlightSelectedDay: 'true',
            sync: 'true',
        });
    })
</script>

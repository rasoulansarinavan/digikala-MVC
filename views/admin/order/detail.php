<?php
$order = $data['order'];
$basketItems = $order[0]['basket'];
$address = $order[0]['address'];
$delivery = $order[0]['delivery'];
$offer = $order[0]['offer_code'];
$order_status = $data['order_status'];


require('views/admin/admin_header.php');
?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="d-flex align-items-center">
            <div class="mr-auto">
                <h3 class="page-title">جزییات سفارش</h3>
                <div class="d-inline-block align-items-center">
                    <nav>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="#"><i class="mdi mdi-home-outline"></i></a></li>
                            <li class="breadcrumb-item" aria-current="page">e-Commerce</li>
                            <li class="breadcrumb-item active" aria-current="page">Checkout</li>
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
                    <div class="box-header">
                        <h4 class="box-title">Product Summary</h4>
                    </div>
                    <div class="box-body">
                        <div class="table-responsive">
                            <table class="table table-bordered">
                                <thead>
                                <tr>
                                    <th>تصویر محصول</th>
                                    <th>نام محصول</th>
                                    <th>تعداد</th>
                                    <th class="w-200">قیمت واحد</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php
                                foreach ($basketItems as $item) {
                                    ?>
                                    <tr>
                                        <td><img src="public/images/product/<?= $item['id'] ?>/product_115.jpg" alt=""
                                                 width="80"></td>
                                        <td><?= $item['title'] ?></td>
                                        <td><?= $item['number'] ?></td>
                                        <td><?= number_format($item['price']) ?> تومان</td>
                                    </tr>
                                    <?php
                                }
                                ?>
                                </tbody>
                            </table>
                        </div>

                        <hr>
                        <div class="col-lg-12 col-md-12 col-sm-12">
                            <h4 class="box-title mt-40">جزییات سفارش</h4>
                            <div class="table-responsive">
                                <table class="table">
                                    <tbody>
                                    <tr>
                                        <td width="390">گیرنده</td>
                                        <td> <?= $address['name'] ?> <?= $address['family'] ?> </td>
                                    </tr>
                                    <tr>
                                        <td width="390">وضعیت سفارش</td>
                                        <td>
                                            <form style="display: flex"
                                                  action="adminOrder/detail/<?= $order[0]['id'] ?>" method="post">
                                                <div class="col-md-4">
                                                    <select class="selectpicker" name="status">
                                                        <?php
                                                        foreach ($order_status as $item) {
                                                            if ($order[0]['status'] == $item['id']) {
                                                                $selected = 'selected';
                                                            } else {
                                                                $selected = '';
                                                            }

                                                            ?>
                                                            <option <?= $selected ?>
                                                                    value="<?= $item['id'] ?>"><?= $item['title'] ?></option>
                                                            <?php
                                                        }
                                                        ?>
                                                    </select>
                                                </div>
                                                <input type="submit" class="btn btn-success" value="تغییر وضعیت">
                                            </form>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>موبایل</td>
                                        <td> <?= $address['mobile'] ?> </td>
                                    </tr>
                                    <tr>
                                        <td>استان و شهر</td>
                                        <td><?= $address['province'] ?> , <?= $address['city'] ?></td>
                                    </tr>
                                    <tr>
                                        <td>آدرس</td>
                                        <td> <?= $address['address'] ?> پلاک : <?= $address['vahed'] ?> واحد
                                            : <?= $address['pelak'] ?> </td>
                                    </tr>
                                    <tr>
                                        <td>تاریخ سفارش</td>
                                        <td> <?= $order[0]['order_date'] ?></td>
                                    </tr>

                                    <tr>
                                        <td>نوع ارسال</td>
                                        <td> <?= $delivery['title'] ?></td>
                                    </tr>
                                    <tr>
                                        <td>هزینه ارسال</td>
                                        <td> <?= number_format($delivery['price']) ?> تومان</td>
                                    </tr>
                                    <tr>
                                        <td>مبلغ تخفیف</td>
                                        <td> <?= number_format($order[0]['discount']) ?> تومان</td>
                                    </tr>
                                    <tr style="background: #414344; color: #fff">
                                        <td>کد تخفیف</td>
                                        <td>  <?= $offer[0] ?> | <?= $offer[1] ?>%</td>
                                    </tr>
                                    <tr>
                                        <td>نوع پرداخت</td>
                                        <td> <?= $order[0]['pay_type'] ?></td>
                                    </tr>
                                    <tr style="background: #f62d51; color: #fff;">
                                        <td>مبلغ کل سفارش</td>
                                        <td style=" font-size: 17px; font-weight: 800;"><?= number_format($order[0]['price']) ?>
                                            تومان
                                        </td>
                                    </tr>

                                    </tbody>
                                </table>
                            </div>
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

<?php
require('views/admin/admin_header.php');

$specials = $data['specials'];
$products = $data['products'];
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
                <h3 class="page-title">محصولات شگفت انگیز</h3>
                <div class="d-inline-block align-items-center">
                    <nav>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="#"><i class="mdi mdi-home-outline"></i></a></li>
                            <li class="breadcrumb-item" aria-current="page">e-Commerce</li>
                            <li class="breadcrumb-item active" aria-current="page">Orders</li>
                        </ol>
                    </nav>
                </div>
            </div>
            <a style="color:#fff;" type="button" class="btn btn-success mb-5" data-toggle="modal"
               data-target="#myModal" onclick="removespecialsId()">افزودن
            </a>
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
                                    <th>محصول</th>
                                    <th>قیمت</th>
                                    <th>قیمت با تخفیف</th>
                                    <th>زمان شروع</th>
                                    <th>زمان پایان</th>
                                    <th> تخفیف</th>
                                    <th> عملیات</th>
                                </tr>
                                </thead>
                                <tbody>

                                <?php
                                foreach ($specials as $row) {
                                    $time_start = $row['time_start'];
                                    $time_start = Model::shamsi($time_start)[2];
                                    $time_end = $row['time_end'];
                                    $time_end = Model::shamsi($time_end)[2];
                                    ?>
                                    <tr>
                                        <td><?= $row['id'] ?></td>
                                        <td><?= $row['title'] ?></td>
                                        <td><?= number_format($row['price']) ?> تومان</td>
                                        <td style="color: red"><?= number_format($row['price_total']) ?> تومان</td>
                                        <td><?= $time_start ?></td>
                                        <td><?= $time_end ?></td>
                                        <td style="color: orangered">
                                            %<?= $row['discount'] ?>
                                        </td>
                                        <td>
                                            <a onclick="updateSpecial(<?= $row['id'] ?>)" data-toggle="modal"
                                               href="" data-target="#myModal" class="btn btn-primary mb-5" target="_blank">ویرایش</a>
                                        </td>
                                    </tr>
                                    <?php
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
<!-- Popup Model Plase Here -->
<div id="myModal" class="modal fade in" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
     aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="myModalLabel">افزودن محصول شگفت انگیز</h4>
                <a type="button" class="close" data-dismiss="modal" aria-hidden="true">×</a>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <label class="col-md-12">نام محصول</label>
                    <div class="col-md-12">
                        <input type="text" class="form-control" placeholder="" name="title"></div>
                </div>
                <div class="form-group">
                    <label class="col-md-12">انتخاب محصول</label>
                    <div class="col-md-12">
                        <select class="form-control" name="product">
                            <option>انتخاب کنید</option>
                            <?php
                            foreach ($products
                                     as $item) {
                                if ($item['id'] == $specials_id) {
                                    $selected = 'selected';
                                } else {
                                    $selected = '';
                                }
                                ?>
                                <option value="<?= $item['id'] ?>" <?= $selected ?> > <?= $item['title']; ?></option>
                                <?php
                            }
                            ?>
                        </select>
                    </div>
                    <input type="hidden" name="specials_id">
                </div>
                <div class="form-group">
                    <label class="col-md-12">تاریخ شروع</label>
                    <div class="col-md-12">
                        <input type="text" id="time_start" class="form-control" placeholder="" name="time_start">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-12">تاریخ پایان</label>
                    <div class="col-md-12">
                        <input type="text" id="time_end" class="form-control" placeholder="" name="time_end"></div>
                </div>
                <div class="form-group">
                    <label class="col-md-12">مقدار تخفیف به درصد</label>
                    <div class="col-md-12">
                        <input type="text" class="form-control" placeholder="" name="discount"></div>
                </div>
                <div class="modal-footer">
                    <input type="submit" class="btn btn-success" value="ذخیره" onclick="addSpecial()">
                    <a type="button" class="btn btn-default float-right" data-dismiss="modal">خروج</a>
                </div>
            </div>

        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
    <script>

        function updateSpecial(product_id) {
            $('.modal-body select option[value=' + product_id + '] ').attr("selected", "selected")
        }

        function removeAjax(id) {
            var url = 'adminspecials/removeAjax/' + id + '';
            var data = {}
            $.post(url, data, function (msg) {
            });
        }

        function addSpecial() {
            var time_start = $('.modal-body input[name="time_start"]').val();
            var time_end = $('.modal-body input[name="time_end"]').val();
            var discount = $('.modal-body input[name="discount"]').val();
            var product_id = $('.modal-body select[name="product"]').val();
            var url = 'adminProduct/addSpecial'
            var data = {'time_start': time_start, 'time_end': time_end, 'discount': discount, 'product_id': product_id}
            $.post(url, data, function (msg) {
                console.log(msg)
                window.location.reload();
            })
        }
    </script>

    <?php
    require('views/admin/admin_footer.php');
    ?>
    <script>
        $(document).ready(function () {
            kamaDatepicker('time_start', {
                buttonsColor: 'red',
                markToday: 'true',
                markHolidays: 'true',
                gotoToday: 'true',
                highlightSelectedDay: 'true',
                sync: 'true',
            });
        })
        $(document).ready(function () {
            kamaDatepicker('time_end', {
                buttonsColor: 'red',
                markToday: 'true',
                markHolidays: 'true',
                gotoToday: 'true',
                highlightSelectedDay: 'true',
                sync: 'true',
            });
        })
    </script>

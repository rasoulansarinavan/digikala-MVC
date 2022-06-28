<?php
require('views/admin/admin_header.php');
$products = $data['products'];
$colors = $data['colors'];
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
                <h3 class="page-title">محصولات</h3>
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
            <a href="adminProduct/addProduct" style="color:#fff;" class="btn btn-success mb-5">افزودن</a>
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
                                    <th style="width: 50%">نام محصول</th>
                                    <th>قیمت</th>
                                    <th>تخفیف</th>
                                    <th>نقد و بررسی</th>
                                    <th>ویژگی</th>
                                    <th>گالری تصاویر</th>
                                    <th>ویرایش</th>
                                    <th>حذف</th>
                                </tr>
                                </thead>
                                <tbody>

                                <?php
                                foreach ($products as $row) {
                                    ?>
                                    <tr>
                                        <td><?= $row['id'] ?></td>
                                        <td><?= $row['title'] ?></td>
                                        <td><?= $row['price'] ?></td>
                                        <td><?= $row['discount'] ?></td>
                                        <td><a href="adminProduct/review/<?= $row['id'] ?>"
                                               class="btn btn-secondary mb-5" target="_blank">نقد </a></td>
                                        <td><a href="adminProduct/attributes/<?= $row['id'] ?>"
                                               class="btn btn-secondary mb-5" target="_blank">ویژگی </a></td>
                                        <td><a href="adminProduct/productGalleryImage/<?= $row['id'] ?>"
                                               class="btn btn-success mb-5" target="_blank">گالری </a></td>
                                        <td><a href="adminProduct/addProduct/<?= $row['id'] ?>"
                                               class="btn btn-yellow mb-5" target="_blank">ویرایش</a></td>
                                        <td><a type="button" class="btn btn-danger mb-5 sa-params" data-id="<?= $row['id'] ?>">حذف</a></td>
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
                <h4 class="modal-title" id="myModalLabel">افزودن دسته بندی</h4>
                <a type="button" class="close" data-dismiss="modal" aria-hidden="true">×</a>
            </div>
            <div class="modal-body">
                <form action="adminproducts/index/<?= $products_id ?>" method="post"
                      class="form-horizontal">
                    <div class="form-group">
                        <label class="col-md-12">نام دسته بندی</label>
                        <div class="col-md-12">
                            <input type="text" class="form-control" placeholder="" name="title"></div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-12">دسته والد</label>
                        <div class="col-md-12">
                            <select class="form-control" name="products">
                                <option>انتخاب کنید</option>
                                <?php
                                foreach ($products
                                         as $item) {
                                    if ($item['id'] == $products_id) {
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
                        <input type="hidden" name="products_id">
                    </div>
                    <div class="modal-footer">
                        <input type="submit" class="btn btn-success" value="ذخیره">
                        <a type="button" class="btn btn-default float-right" data-dismiss="modal">خروج</a>
                    </div>
                </form>
            </div>

        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
    <script>
        function editproducts(products_id, products_title) {
            $('form input[name="title"]').val(products_title);
            $('form input[name="products_id"]').val(products_id);
        }

        function removeproductsId() {
            $('form input[name="title"]').val('');
            $('form input[name="products_id"]').val('');
        }

        function removeAjax(id) {
            var url = 'adminProduct/removeAjaxProduct/' + id + '';
            var data = {}
            $.post(url, data, function (msg) {
            });
        }
    </script>
    <?php
    require('views/admin/admin_footer.php');
    ?>

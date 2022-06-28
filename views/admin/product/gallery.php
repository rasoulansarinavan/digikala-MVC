<?php
require('views/admin/admin_header.php');
$images = $data['images'];
$productInfo = $data['productInfo'];
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
                    <h3 class="page-title">گالری تصاویر</h3>
                    <div class="d-inline-block align-items-center">
                        <nav>
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item active" aria-current="page"><?= $productInfo['title'] ?></li>
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
                            <form action="adminProduct/productGalleryImage/<?= $productInfo['id'] ?>" method="post"
                                  enctype="multipart/form-data">
                                <div class="col-md-12 text-center">
                                    <h4 class="box-title mt-20">آپلود تصویر</h4>
                                    <div class="product-img text-left" style="text-align-last: center">
                                        <div class="fileupload btn btn-outline btn-success">
                                            <span><i class="ion-upload mr-5"></i>Upload Anonther Image</span>
                                            <input type="file" class="upload" name="image">
                                        </div>
                                    </div>
                                    <div class="form-actions mt-10">
                                        <input type="submit" class="btn btn-outline btn-success" value="ذخیره">
                                    </div>
                                </div>

                            </form>
                            <div class="table-responsive">
                                <table id="productorder" class="table table-hover no-wrap product-order"
                                       data-page-size="10">
                                    <thead>
                                    <tr class="bg-secondary">
                                        <th style="width: 10%;">ردیف</th>
                                        <th>تصویر</th>
                                        <th style="width: 20%;">حذف</th>
                                    </tr>
                                    </thead>
                                    <tbody>

                                    <?php
                                    foreach ($images as $row) {
                                        ?>
                                        <tr>
                                            <td><?= $row['id'] ?></td>
                                            <td>
                                                <img src="public/images/product/<?= $row['product_id'] ?>/gallery/small/<?= $row['img'] ?>"
                                                     alt=""></td>

                                            <td><a type="button" class="btn btn-danger mb-5 sa-params"
                                                   data-id="<?= $row['id'] ?>">حذف</a></td>
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

    <script>

        function removeAjax(id) {
            var url = 'adminProduct/removeAjaxGalleryImage/' + id + '';
            var data = {}
            $.post(url, data, function (msg) {
                console.log(msg);
            });
        }
    </script>
<?php
require('views/admin/admin_footer.php');
?>
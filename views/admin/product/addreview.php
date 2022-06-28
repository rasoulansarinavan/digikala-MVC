<?php
require('views/admin/admin_header.php');
$review = $data['review'];
$productInfo = $data['productInfo'];

$edit = 0;
if (isset($review['title'])) {
    $edit = 1;
}
?>
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="d-flex align-items-center">
                <div class="mr-auto">
                    <?php
                    if ($edit == 1) {

                        ?>
                        <h3 class="page-title">ویرایش نقد و بررسی </h3>
                        <?php
                    } else {
                        ?>
                        <h3 class="page-title">اضافه کردن نقد بررسی</h3>
                        <?php
                    }
                    ?>
                    <div class="d-inline-block align-items-center">
                        <nav>
                            <ol class="breadcrumb">

                                <li class="breadcrumb-item" aria-current="page"><?= $productInfo['title'] ?></li>

                            </ol>
                        </nav>
                    </div>
                </div>
                <div class="right-title">
                    <div class="dropdown">
                        <button class="btn btn-outline dropdown-toggle no-caret" type="button" data-toggle="dropdown"><i
                                    class="mdi mdi-dots-horizontal"></i></button>
                        <div class="dropdown-menu dropdown-menu-right">
                            <a class="dropdown-item" href="#"><i class="mdi mdi-share"></i>Activity</a>
                            <a class="dropdown-item" href="#"><i class="mdi mdi-email"></i>Messages</a>
                            <a class="dropdown-item" href="#"><i class="mdi mdi-help-circle-outline"></i>FAQ</a>
                            <a class="dropdown-item" href="#"><i class="mdi mdi-settings"></i>Support</a>
                            <div class="dropdown-divider"></div>
                            <button type="button" class="btn btn-success">Submit</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Main content -->
        <section class="content">

            <div class="row">
                <div class="col-12">
                    <div class="box">
                        <div class="box-header with-border">
                            <h4 class="box-title">
                            </h4>
                        </div>
                        <div class="box-body">
                            <form action="adminProduct/addReview/<?= $productInfo['id'] ?>/<?= @$review['id'] ?>"
                                  class="form-element"
                                  method="post">
                                <div class="form-body">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="text-info">عنوان نقد و بررسی</label>
                                                <input name="title" type="text" class="form-control"
                                                       placeholder="عنوان نقد خود را وارد کنید"
                                                       value="<?= @$review['title'] ?>">
                                            </div>
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label class="text-info">متن نقد و بررسی</label>
                                                        <textarea id="editor1" name="review" rows="10" cols="80">
                                                 "<?= @$review['review'] ?>"
                                                </textarea>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-actions mt-10">
                                            <input type="submit" class="btn btn-outline btn-success" value="ذخیره">
                                            <input type="button" class="btn btn-outline btn-danger" value="انصراف">
                                        </div>
                            </form>
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
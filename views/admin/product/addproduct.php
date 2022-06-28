<?php
require('views/admin/admin_header.php');
$category = $data['category'];
$colors = $data['colors'];
$guarantee = $data['guarantee'];
$productInfo = $data['productInfo'];
$colorsInfo = $data['colorsInfo'];
$compareItem = $data['compareItem'];
//print_r($productInfo);
$edit = 0;
if (isset($productInfo['title'])) {
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
                        <h3 class="page-title">ویرایش محصول</h3>
                        <?php
                    } else {
                        ?>
                        <h3 class="page-title">اضافه کردن محصول</h3>
                        <?php
                    }
                    ?>
                    <div class="d-inline-block align-items-center">
                        <nav>
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="#"><i class="mdi mdi-home-outline"></i></a></li>
                                <li class="breadcrumb-item" aria-current="page">e-Commerce</li>
                                <li class="breadcrumb-item active" aria-current="page">Edit</li>
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
                            <h4 class="box-title"> جزییات محصول
                                (
                                <?php
                                if ($edit == 1) {
                                    echo $productInfo['title']
                                    ?>
                                    <?php
                                }
                                ?>
                                )
                            </h4>
                        </div>
                        <div class="box-body">
                            <form action="adminProduct/addProduct/<?= @$productInfo['id'] ?>" class="form-element"
                                  method="post" enctype="multipart/form-data">
                                <div class="form-body">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="text-info">نام محصول</label>
                                                <input name="title" type="text" class="form-control"
                                                       placeholder="نام محصول را وارد کنید"
                                                       value="<?= @$productInfo['title'] ?>">
                                            </div>
                                        </div>
                                        <!--/span-->
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="text-info">موجودی</label>
                                                <input name="number" type="text" class="form-control"
                                                       placeholder="Lorem Ipsum Text..."
                                                       value="<?= @$productInfo['number'] ?>">
                                            </div>
                                        </div>
                                        <!--/span-->
                                    </div>
                                    <!--/row-->
                                    <!--/row-->
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="text-info">دسته بندی</label>
                                                <select name="category_id" class="form-control"
                                                        data-placeholder="Choose a Category"
                                                        tabindex="1">
                                                    <?php
                                                    @$category_id = $productInfo['category_id'];
                                                    foreach ($category as $row) {
                                                        if ($category_id == $row['id']) {
                                                            $selected = 'selected';
                                                        } else {
                                                            $selected = '';
                                                        }
                                                        ?>
                                                        <option value="<?= $row['id'] ?>"<?= $selected ?>><?= $row['title'] ?></option>
                                                        <?php
                                                    }
                                                    ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="text-info">انتخاب گارانتی</label>
                                                <select name="guarantee" class="form-control"
                                                        data-placeholder="Choose a Category"
                                                        tabindex="1">
                                                    <?php
                                                    @$guarantee_id = $productInfo['guarantee'];
                                                    foreach ($guarantee as $row) {
                                                        if ($guarantee_id == $row['id']) {
                                                            $selected = 'selected';
                                                        } else {
                                                            $selected = '';
                                                        }
                                                        ?>
                                                        <option value="<?= $row['id'] ?>"<?= $selected ?>><?= $row['title'] ?></option>
                                                        <?php
                                                    }
                                                    ?>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <!--/row-->
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="text-info">انتخاب رنگ</label>
                                                <select name="colors[]" class="selectpicker" multiple>
                                                    <?php
                                                    foreach ($colors as $row) {
                                                        if (in_array($row['id'], $colorsInfo)) {
                                                            $selected = 'selected';
                                                        } else {
                                                            $selected = '';
                                                        }
                                                        ?>
                                                        <option value="<?= $row['id'] ?>"<?= $selected ?>><?= $row['title'] ?></option>
                                                        <?php
                                                    }
                                                    ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="text-info">نوع کالا</label>
                                                <select name="compare_type" class="selectpicker" multiple>
                                                    <?php
                                                    foreach ($compareItem as $item) {
                                                        $compareItem_id = $productInfo['compare_type'];
                                                        if ($compareItem_id == $item['id']) {
                                                            $selected = 'selected';
                                                        } else {
                                                            $selected = '';
                                                        }
                                                        ?>
                                                        <option value="<?= $item['id'] ?>" <?= $selected ?>><?= $item['title'] ?></option>
                                                        <?php
                                                    }
                                                    ?>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="text-info">قیمت</label>
                                                <div class="input-group">
                                                    <div class="input-group-addon"><i class="ti-money"></i></div>
                                                    <input name="price" type="text" class="form-control"
                                                           placeholder="270" value="<?= @$productInfo['price'] ?>">
                                                </div>
                                            </div>
                                        </div>
                                        <!--/span-->
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="text-info">تخفیف</label>
                                                <div class="input-group">
                                                    <div class="input-group-addon"><i class="ti-cut"></i></div>
                                                    <input name="discount" type="text" class="form-control"
                                                           placeholder="50%" value="<?= @$productInfo['discount'] ?>">
                                                </div>
                                            </div>
                                        </div>
                                        <!--/span-->
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label class="text-info">Product Description</label>
                                                <textarea id="editor1" name="introduction" rows="10" cols="80">
                                                   <?= @$productInfo['introduction'] ?>"
                                                </textarea>
                                            </div>
                                        </div>
                                    </div>
                                    <!--/row-->
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Meta Title</label>
                                                <input type="text" class="form-control"></div>
                                        </div>
                                        <!--/span-->
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Meta Keyword</label>
                                                <input type="text" class="form-control"></div>
                                        </div>
                                        <!--/span-->
                                        <div class="col-md-3">
                                            <h4 class="box-title mt-20">Upload Image</h4>
                                            <div class="product-img text-left">
                                                <img src="public/images/product/<?= $productInfo['id'] ?>/product_600.jpg"
                                                     alt="">
                                                <div class="fileupload btn btn-outline btn-success">
                                                    <span><i class="ion-upload mr-5"></i>Upload Anonther Image</span>
                                                    <input type="file" class="upload" name="image">
                                                </div>
                                                <button class="btn btn-outline btn-info">Edit</button>
                                                <button class="btn btn-outline btn-danger">Delete</button>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <h4 class="box-title mt-40">General Info</h4>
                                            <div class="table-responsive">
                                                <table class="table no-border td-padding">
                                                    <tbody>
                                                    <tr>
                                                        <td>
                                                            <input type="text" class="form-control" placeholder="Brand">
                                                        </td>
                                                        <td>
                                                            <input type="text" class="form-control"
                                                                   placeholder="Sellar">
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <input type="text" class="form-control"
                                                                   placeholder="Delivery Condition">
                                                        </td>
                                                        <td>
                                                            <input type="text" class="form-control"
                                                                   placeholder="Knock Down">
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <input type="text" class="form-control" placeholder="Color">
                                                        </td>
                                                        <td>
                                                            <input type="text" class="form-control"
                                                                   placeholder="Gift Pack">
                                                        </td>
                                                    </tr>
                                                    </tbody>
                                                </table>
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
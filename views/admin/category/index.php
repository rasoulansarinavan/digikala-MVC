<?php
require('views/admin/admin_header.php');
$getSubCategory = $data['Subcategory'];
$category = $data['category'];
$category_id = $data['category_id'];
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
                    <h3 class="page-title">دسته بندی ها</h3>
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
                   data-target="#myModal" onclick="removeCategoryId()">افزودن
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
                                        <th style="width: 10%;">ردیف</th>
                                        <th>نام دسته</th>
                                        <th style="width: 20%;">عملیات</th>
                                        <th style="width: 20%;">ویژگی ها</th>
                                        <th style="width: 20%;">انتخاب</th>
                                    </tr>
                                    </thead>
                                    <tbody>

                                    <?php
                                    foreach ($getSubCategory as $row) {
                                        ?>
                                        <tr>
                                            <td><?= $row['id'] ?></td>
                                            <td><?= $row['title'] ?></td>
                                            <td>
                                                <a href="adminCategory/index/<?= $row['id'] ?>"
                                                   class="btn btn-icon-circle btn-success"
                                                   data-toggle="tooltip" data-original-title="مشاهده زیر دسته ها">
                                                    <i class=" ti-eye"></i>
                                                </a>
                                                <a onclick="editCategory(<?= $row['id'] ?>,'<?= $row['title'] ?>')"
                                                   href="javascript:void(0)"
                                                   class="btn btn-icon-circle btn-info"
                                                   data-original-title="ویرایش" data-toggle="modal"
                                                   data-target="#myModal">
                                                    <i class="ti-marker-alt"></i>
                                                </a>
                                                <a href="javascript:void(0)"
                                                   class="btn btn-icon-circle btn-danger sa-params"
                                                   data-original-title="حذف" data-toggle="tooltip"
                                                   data-id="<?= $row['id'] ?>">
                                                    <i class="ti-trash"></i>
                                                </a>
                                            <td><a href="adminCategory/attributes/<?= $row['id'] ?>"
                                                   class="btn btn-secondary mb-5" target="_blank">ویژگی ها </a>
                                            </td>
                                            <td>
                                            <td>
                                                <div class="checkbox">
                                                    <input type="checkbox" id="basic_checkbox_1">
                                                </div>
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
                <h4 class="modal-title" id="myModalLabel">افزودن دسته بندی</h4>
                <a type="button" class="close" data-dismiss="modal" aria-hidden="true">×</a>
            </div>
            <div class="modal-body">
                <form action="adminCategory/index/<?= $category_id ?>" method="post"
                      class="form-horizontal">
                    <div class="form-group">
                        <label class="col-md-12">نام دسته بندی</label>
                        <div class="col-md-12">
                            <input type="text" class="form-control" placeholder="" name="title"></div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-12">دسته والد</label>
                        <div class="col-md-12">
                            <select class="form-control" name="category">
                                <option>انتخاب کنید</option>
                                <?php
                                foreach ($category
                                         as $item) {
                                    if ($item['id'] == $category_id) {
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
                        <input type="hidden" name="category_id">
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
        function editCategory(category_id, category_title) {
            $('form input[name="title"]').val(category_title);
            $('form input[name="category_id"]').val(category_id);
        }

        function removeCategoryId() {
            $('form input[name="title"]').val('');
            $('form input[name="category_id"]').val('');
        }

        function removeAjax(id) {
            var url = 'adminCategory/removeAjax/' + id + '';
            var data = {}
            $.post(url, data, function (msg) {
            });
        }
    </script>
<?php
require('views/admin/admin_footer.php');
?>
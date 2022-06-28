<?php
require('views/admin/admin_header.php');

$attributes = $data['attributes'];
$categoryInfo = $data['categoryInfo'];
$attributeInfo = $data['attributeInfo'];
print_r($data);

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
                    <h3 class="page-title">ویژگی ها</h3>
                    <div class="d-inline-block align-items-center">
                        <nav>
                            <ol class="breadcrumb">

                                <li class="breadcrumb-item" aria-current="page"> دسته بندی
                                    ( <?= $categoryInfo['title'] ?> )
                                </li>
                                <li class="breadcrumb-item active" aria-current="page">
                                    ویژگی(<?= @$attributeInfo['title'] ?>)
                                </li>
                            </ol>
                        </nav>
                    </div>
                </div>
                <a style="color:#fff;" type="button" class="btn btn-success mb-5" data-toggle="modal"
                   data-target="#myModal" onclick="removeAttributesId()">افزودن
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
                                        <th>عنوان ویژگی</th>
                                        <th>ویرایش</th>
                                        <?php
                                        if (!isset($attributeInfo['id'])) {
                                            ?>
                                            <th style="width: 20%;">زیر ویژگی ها</th>
                                            <?php
                                        }
                                        ?>
                                        <th style="width: 20%;">حذف</th>
                                    </tr>
                                    </thead>
                                    <tbody>

                                    <?php
                                    foreach ($attributes as $row) {
                                        ?>
                                        <tr>
                                            <td><?= $row['id'] ?></td>
                                            <td><?= $row['title'] ?></td>
                                            <td>
                                                <a onclick="editAttribute (<?= $row['id'] ?>,'<?= $row['title'] ?>')"
                                                   href="javascript:void(0)"
                                                   class="btn btn-secondary mb-5"
                                                   data-original-title="ویرایش" data-toggle="modal"
                                                   data-target="#myModal">
                                                    ویرایش
                                                </a>
                                            </td>
                                            <?php
                                            if (!isset($attributeInfo['id'])) {
                                                ?>
                                                <td>
                                                    <a href="adminCategory/attributes/<?= $row['category_id'] ?>/<?= $row['id'] ?>"
                                                       class="btn btn-secondary mb-5">زیر ویژگی ها </a>
                                                </td>
                                                <?php
                                            }
                                            ?>
                                            <td><a type="button" class="btn btn-danger mb-5 sa-params"
                                                   data-id="<?= $row['id'] ?>">حذف</a>
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
                <h4 class="modal-title" id="myModalLabel">افزودن ویژگی</h4>
                <a type="button" class="close" data-dismiss="modal" aria-hidden="true">×</a>
            </div>
            <div class="modal-body">
                <form action="adminCategory/attributes/<?= $categoryInfo['id'] ?>/<?= @$attributeInfo['id'] ?>"
                      method="post"
                      class="form-horizontal">
                    <div class="form-group">
                        <label class="col-md-12">عنوان ویژگی</label>
                        <div class="col-md-12">
                            <input type="text" class="form-control" placeholder="" name="title"></div>
                    </div>
                    <div class="form-group">
                        <input type="hidden" name="attr_id" value="">
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
        function editAttribute(attributes_id, attributes_title) {
            $('form input[name="title"]').val(attributes_title);
            $('form input[name="attr_id"]').val(attributes_id);
        }

        function removeAttributesId() {
            $('form input[name="title"]').val('');
            $('form input[name="attr_id"]').val('');
        }

        function removeAjax(id) {
            var url = 'adminCategory/removeAjaxAttribute/' + id + '';
            var data = {}
            $.post(url, data, function (msg) {
                console.log(msg);
            });
        }
    </script>
<?php
require('views/admin/admin_footer.php');
?>
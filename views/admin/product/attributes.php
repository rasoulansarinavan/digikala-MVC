<?php
require('views/admin/admin_header.php');
$attributes = $data['attributes'];
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
                <h3 class="page-title">ویژگی ها</h3>
                <div class="d-inline-block align-items-center">
                    <nav>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item" aria-current="page"><?= $productInfo['title'] ?></li>
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
                    <!-- /.box-header -->
                    <div class="box-body">
                        <form action="" method="post">
                            <input type="hidden" name="submit">
                            <div class="row">
                                <div class="col-12">
                                    <?php
                                    foreach ($attributes as $row) {
                                        ?>
                                        <div class="form-group row">
                                            <label for="example-text-input"
                                                   class="col-sm-2 col-form-label"><?= $row['title'] ?></label>
                                            <div class="col-sm-10">
                                                <input name="value<?= $row['id'] ?>" class="form-control" type="text"
                                                       value="<?= $row['value'] ?>"
                                                       id="example-text-input">
                                                <input type="hidden" name="id[]" value="<?= $row['id'] ?>">
                                            </div>
                                        </div>
                                        <?php
                                    }
                                    ?>
                                </div>
                                <!-- /.col -->
                            </div>
                            <!-- /.row -->
                            <div class="form-actions mt-10">
                                <input type="submit" class="btn btn-outline btn-success" value="ذخیره">
                                <input type="button" class="btn btn-outline btn-danger" value="انصراف">
                            </div>
                        </form>
                    </div>
                    <!-- /.box-body -->
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

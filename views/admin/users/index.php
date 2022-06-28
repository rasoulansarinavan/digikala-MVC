<?php
require('views/admin/admin_header.php');

$users = $data['users'];
$usersLevel = $data['usersLevel'];

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
                <h3 class="page-title">مدیریت کاربران</h3>
                <div class="d-inline-block align-items-center">
                    <nav>
                        <ol class="breadcrumb">

                            <li class="breadcrumb-item active" aria-current="page"> تعداد کاربران
                                : <?= sizeof($users) ?></li>
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
                        <div class="table-responsive">
                            <table id="productorder" class="table table-hover no-wrap product-order"
                                   data-page-size="10">
                                <thead>
                                <tr class="bg-secondary">
                                    <th>ردیف</th>
                                    <th>نام ونام خانوادگی</th>
                                    <th>موبایل</th>
                                    <th>ایمیل</th>
                                    <th>سفارشات</th>
                                    <th>تغییر سطح</th>
                                </tr>
                                </thead>
                                <tbody>

                                <?php
                                $i = 1;
                                foreach ($users as $row) {
                                ?>
                                <tr>
                                    <td><?= $i ?></td>
                                    <td><?= $row['name'] ?></td>
                                    <td><?= $row['mobile'] ?></td>
                                    <td><?= $row['email'] ?></td>
                                    <td><a class="btn btn-primary" href="adminUsers/userOrders/<?= $row['id'] ?>">سفارشات</a>
                                    </td>
                                    <td>
                                        <select class="input-group selectpicker"
                                                onchange="changeLevel(<?= $row['id'] ?>,this)">
                                            <?php
                                            foreach ($usersLevel as $level) {
                                                if ($level['id'] == $row['level']) {
                                                    $selected = 'selected';
                                                } else {
                                                    $selected = '';
                                                }
                                                ?>
                                                <option <?= $selected ?>
                                                        value="<?= $level['id'] ?>"><?= $level['title'] ?></option>
                                                <?php
                                            }
                                            ?>
                                        </select>
                                    </td>
                                    <?php
                                    $i++;
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
    function changeLevel(user_id, tag) {
        var selectTag = $(tag)
        var level = selectTag.val()
        var url = 'adminUsers/changeLevel/' + user_id + ''
        var data = {'level': level}
        $.post(url, data, function (msg) {
            console.log(msg)
            window.location.reload();
        });

    }
</script>

<?php
require('views/admin/admin_footer.php');
?>

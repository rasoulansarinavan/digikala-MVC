<?php
require('views/admin/admin_header.php');

$questions = $data['questions'];
$status = $data['status'];

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

                            <li class="breadcrumb-item active" aria-current="page"> تعداد سفارشات
                                : <?= sizeof($questions) ?></li>
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
                                    <th>تاریخ</th>
                                    <th>متن سوال</th>
                                    <th>پاسخ ها</th>
                                    <th>تغییر سطح</th>
                                </tr>
                                </thead>
                                <tbody>

                                <?php
                                $i = 1;
                                foreach ($questions

                                as $row) {
                                ?>
                                <tr>
                                    <td><?= $i ?></td>
                                    <td><?= $row['user']['name'] ?></td>
                                    <td><?= $row['time'] ?></td>
                                    <td><?= $row['context'] ?></td>
                                    <td><a target="_blank" class="btn btn-primary"
                                           href="adminQuestions/answers/<?= $row['id'] ?>">پاسخ ها</a>
                                    </td>
                                    <td>


                                        <select class="input-group selectpicker"
                                                onchange="changeStatus(<?= $row['id'] ?>,this)">
                                            <?php
                                            foreach ($status as $item) {
                                                if ($row['status'] == $item['id']) {
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
    function changeStatus(question_id, tag) {
        var selectTag = $(tag)
        var status = selectTag.val()
        var url = 'adminQuestions/changeStatus/' + question_id + ''
        var data = {'status': status}
        $.post(url, data, function (msg) {
            console.log(msg)
            window.location.reload();
        })
    }
</script>

<?php
require('views/admin/admin_footer.php');
?>

<?php
require_once '../../connect/session_ckeck.php';
require_once '../../connect/functions.php';

$id = $_GET['id'];
$sql = new specise();
$query = $sql->selectid($id);
$data = mysqli_fetch_object($query);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Admin|Dashboard</title>
    <?php
    include '../../build/script.php';
    ?>
</head>

</script>

<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">


        <?php
        // Navbar Admin
        require '../sub/navbar.php';
        // Aside Admin
        require '../sub/aside.php';
        // Manage Pages Admin
        require '../sub/side_manage.php';
        // Reports Admin   
        require '../sub/side_reports.php';
        ?>

        </ul>

        <!-- /.sidebar-menu -->
        <!-- /.sidebar -->
        </aside>

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1>ManagePages สายพันธุ์</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <button class="btn btn-info btn-sm " href="" onclick="window.history.go(-1);"><i class="fas fa-arrow-alt-left"></i></button>
                            </ol>
                        </div>
                    </div>
                </div><!-- /.container-fluid -->
            </section>
            <!-- /.content-header -->

            <!-- Main content -->
            <section class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-12">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="card card-outline card-warning">
                                        <div class="card-header ">
                                            <h3 class="card-title">แก้ไขข้อมูลสายพันธุ์</h3>
                                        </div>
                                        <!-- /.card-header -->
                                        <!-- form start -->
                                        <form action="../process/update_spec.php" method="POST" enctype="multipart/form-data">
                                            <div class="card-body">
                                                <div class="form-group row">
                                                    <div class="input-group">
                                                        <label for="Picturespecise" class="col-sm-2  control-label col-form-label">รูปภาพ :</label>
                                                        <div class="col-sm">
                                                            <input type="file" class="form-control" id="file" name="file" onchange="readURLedit(this)">
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="form-group row">
                                                    <div class="input-group">
                                                        <label for="specname" class="col-sm-2  control-label col-form-label">ชื่อสายพันธุ์ : </label>
                                                        <div class="col-sm">
                                                            <input type="text" class="form-control" id="specname" name="specname" value="<?php echo $data->spec_name; ?>" required>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <div class="input-group">
                                                        <label for="Specisedetail" class="col-sm-2  control-label col-form-label">รายละเอียด : </label>
                                                        <div class="col-sm">
                                                            <textarea type="text" class="form-control" id="specdetail" name="specdetail"><?php echo $data->spec_detail; ?></textarea>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- /.card-body -->
                                            <div class="card-footer text-right">
                                                <button type="submit" id="submit" name="submit" class="btn btn-info">Save</button>
                                                <button type="reset" class="btn btn-warning">Reset</button>
                                                
                                            </div>
                                            <input type="hidden" id="id" name="id" value="<?php echo $data->id; ?>" >
                                            <input type="hidden" id="spec_pic" name="spec_pic" value="<?php echo $data->spec_pic; ?>" >
                                        </form>
                                        <!-- /.form end -->
                                    </div>
                                    <!-- /.card -->
                                </div>
                                <div class="col-md-6">
                                    <div class="card card-warning">
                                        <div class="card-header">
                                            <h3 class="card-title">Preview รูปภาพ</h3>
                                        </div>
                                        <!-- form start -->
                                        <form method="post">
                                            <div class="card-body">
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <h4 class="text-center">รูปภาพเก่า</h4>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <h4 class="text-center">รูปภาพที่อัพโหลด</h4>
                                                    </div>
                                                </div>
                                                <?php
                                                if ($data->spec_pic != NULL) {
                                                ?>
                                                    <div class="col-sm">
                                                        <img src="<?php echo "../../dist/img/spec_upload/$data->spec_pic"; ?>" class="rounded float-start d-block h-25 w-25">
                                                    </div>
                                                <?php
                                                }
                                                ?>
                                                <div class="col-sm">
                                                    <div id="imgControl2" class="d-none">
                                                        <img id="imgUpload2" class="rounded float-end d-block h-50 w-50">
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- /.card-body -->

                                        </form>
                                        <!-- /.form end -->
                                    </div>
                                    <!-- /.card -->
                                </div>

                            </div>
                            <!-- /.col -->
                        </div>
                        <!-- /.row -->
                    </div>
                    <!-- /.container-fluid -->
            </section>
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->
        <?php require '../sub/fooster.php'; ?>

    </div>
    <!-- ./wrapper -->

</body>
<script src="../../dist/js/imgshow.js"></script>
<script>
    // data table
    $(function() {
        $("#example1").DataTable({
            "responsive": true,
            "lengthChange": false,
            "autoWidth": false,
            "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
        }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
    });

    function del(id) {
        Swal.fire({
            title: 'คุณแน่ใจ ?',
            text: "ต้องการลบข้อมูลนี้ใช่หรือไม่ ",
            icon: 'warning',
            showCancelButton: true,
            CancelButtonText: 'ยกเลิก',
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'ตกลง'
        }).then((result) => {
            if (result.isConfirmed) {
                window.location = "../delete/delete_species?del=" + id;
            }
        })
    };
</script>

</html>

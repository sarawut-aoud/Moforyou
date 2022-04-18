<?php
require '../../connect/session_ckeck.php';
require_once '../../connect/functions.php';
//เก็บ id จาก session
$id = $_SESSION['id'];
$farmid = $_SESSION['farm_id'];

$sql = new farm();
$fcheck = $sql->checkregisfarm($id);

// เช็คว่ามีการลงทะเบียนฟาร์มหรือไม่
$result = mysqli_num_rows($fcheck);
//ถ้าไม่มีส่งไปหน้าลงทะเบียน
if (empty($result)) {
    require_once '../alert/check_farm.php';
} else {
    // ถ้ามีแสดง tag นี้
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>MoForYou</title>

    <?php require '../../build/script.php'; ?>
    <link rel="stylesheet" href="../main/_listmenu.css">
</head>


<body class="hold-transition sidebar-collapse layout-top-nav">
    <div class="wrapper">

        <!-- Navbar -->
        <?php require '../sub/navbar.php'; ?>
        <!-- /.navbar -->

        <!-- Content Wrapper. Contains page content -->
        <section class="content">
            <div class="content-wrapper">
                <!-- Content Header (Page header) -->
                <div class="content-header">
                    <div class="container">
                        <!-- Manage -->
                        <div class="row justify-content-center">
                            <div class="col-md-8">
                                <!-- general form elements -->
                                <div class="card card-primary">
                                    <div class="card-header card-cow"">
                                        <h3 class=" text-center ">ผสมพันธุ์</h3>
                                    </div>
                                    <!-- /.card-header -->
                                    <!-- form start -->
                                    <form method=" POST" id="frm_breed">
                                        <div class=" card-body">
                                            <div class="form-group row">
                                                <div class="d-flex align-items-center ">
                                                    <label class=" col-form-label" for="cow_id_male">
                                                        <img class="img-circle elevation-2  " src="../../dist/img/icon/male.png" alt="ตัวผุ้">
                                                    </label>
                                                    <div class="col-md">
                                                        <select class="form-control select2" id="cow_id_male" data-placeholder="เลือกโคตัวผู้"></select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <div class="d-flex align-items-center ">
                                                    <label class=" col-form-label" for="cow_id_female">
                                                        <img class="img-circle elevation-2  " src="../../dist/img/icon/female.png" alt="ตัวเมีย">
                                                    </label>
                                                    <div class="col-md">
                                                        <select class="form-control select2 " id="cow_id_female" data-placeholder="เลือกโคตัวเมีย"></select>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <div class=" input-group justify-content-center">
                                                    <label class=" col-form-label" for="cow_id_female">
                                                        <span ><strong style="font-size: 24px;">ประมาณวันที่ </strong><span id="timeabout"></span></span>
                                                    </label>

                                                </div>
                                            </div>
                                        </div>
                                        <!-- /.card-body -->

                                        <div class="card-footer text-end">
                                            <button type="reset" class="btn btn-secondary reset">ยกเลิก</button>
                                            <button type="submit" id="submit" name="submit" class="btn btn-primary submit">ยืนยันการผสมพันธุ์</button>
                                        </div>
                                        </form>
                                    </div>
                                    <!-- /.card -->

                                </div>
                                <!-- ./col -->
                            </div>
                            <!-- ./row -->

                        </div><!-- /.container-fluid -->
                    </div>
                    <!-- /.content-header -->

                    <div class="container">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="card">
                                    <div class="card-header card-outline card-blue">
                                        <h3 class=" text-center">ผสมพันธุ์</h3>
                                    </div>
                                    <!-- /.card-header -->
                                    <div class="card-body">
                                        <!-- table -->
                                        <table id="example1" class="table table-bordered table-striped table-hover">
                                            <!-- head table -->
                                            <thead>
                                                <tr>
                                                    <th>#</th>
                                                    <th>ระหว่าง</th>
                                                    <th>แก้ไข / ลบข้อมูล</th>
                                                </tr>
                                            </thead>
                                            <!-- /.head table -->
                                            <!-- body table -->
                                            <tbody>
                                                <tr>
                                                    <td style="width: 20%;"></td>
                                                    <td style="width: 50%;"></td>
                                                    <td style="width:30%;" class="text-center">
                                                        <a class="btn btn-info" id="">
                                                            <i class="fa fa-pen-alt"></i>
                                                        </a>
                                                        <a class="btn btn-danger" id="">
                                                            <i class="fa fa-trash"></i>
                                                        </a>
                                                    </td>
                                                </tr>
                                            </tbody>
                                            <!-- /.body table -->

                                        </table>
                                        <!-- /.table -->
                                    </div>
                                    <!-- /.card-body -->
                                </div>
                                <!-- /.card -->
                            </div>
                        </div>

                    </div>


                </div>
                <!-- /.content-wrapper -->
        </section>
        <!-- Main Footer -->
        <?php require '../sub/footer.php'; ?>
    </div>

    <!-- ./wrapper -->
    <script src="../../dist/js/datatable.js"></script>
    <script>
        $(document).ready(function() {
            $('#timeabout').html('00-00-0000').css('color','red');

        });
    </script>
</body>

</html>
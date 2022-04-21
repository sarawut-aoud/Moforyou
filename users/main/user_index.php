<?php
require '../../connect/session_ckeck.php';
require_once '../../connect/functions.php';

$id = $_SESSION['id'];
$sql = new farm();
$fcheck = $sql->checkregisfarm($id);
$selectdata = $sql->selectfarm($id);
$result_data = $selectdata->fetch_object();
// เช็คว่ามีการลงทะเบียนฟาร์มหรือไม่
$result = mysqli_num_rows($fcheck);
//ถ้าไม่มีส่งไปหน้าลงทะเบียน
if (empty($result)) {
    require_once '../alert/check_farm.php';
} else {
    while ($obj = $fcheck->fetch_object()) {
        $_SESSION['farm_id'] = $obj->id;
    }


?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>MoForYou</title>

        <?php require '../../build/script.php'; ?>
    </head>
    <style>
        .main-footer {
            padding: 0 0 0 0;
            width: 100%;
        }

        .far {
            color: white;
        }

        .far:hover {
            color: saddlebrown;
        }
    </style>

    <body class="hold-transition sidebar-collapse layout-top-nav">
        <div class="wrapper">

            <!-- Navbar -->
            <?php require '../sub/navbar.php'; ?>
            <!-- /.navbar -->

            <!-- Content Wrapper. Contains page content -->
            <div class="content-wrapper">
                <!-- Content Header (Page header) -->
                <div class="content-header">
                    <div class="container">

                    </div><!-- /.container-fluid -->
                </div>
                <!-- /.content-header -->

                <!-- Main content -->
                <div class="content ">
                    <div class="container ">
                        <div class="row mb-5 ">
                            <div class="col-md-12  col-sm-12">
                                <div class="card">
                                    <div class="card-header card-outline card-info">
                                        <h2 class="text-center m-0">ยินดีตอนรับ</h2>
                                    </div>
                                    <div class="card-body ">
                                        <div class="justify-content-between">
                                            <p class="card-text ">
                                                คุณ : <?php echo $_SESSION['fullname']; ?>

                                            </p>
                                            <p>
                                                ฟาร์ม : <?php echo $result_data->farmname; ?>
                                            </p>
                                        </div>

                                    </div>

                                </div>
                            </div>
                            <div class="col-md-6  col-sm-12 ">
                                <div class="card card-primary card-outline">
                                    <div class="card-header">
                                        <h5 class="text-center m-0">ผสมพันธุ์ครั้งล่าสุด</h5>
                                    </div>
                                    <div class="card-body">
                                        <div class="d-flex justify-content-between">

                                            <h5 class="card-title mb-4">
                                            </h5>
                                            <h5 class="card-title mb-4">
                                                วันที่ xx-xx-xxx
                                            </h5>
                                        </div>
                                        <p class="card-text">
                                            ตัวผู้ : สีทอง <a href="#" class="card-link">ดูรายละเอียด</a>
                                        </p>
                                        <p class="card-text">
                                            ตัวเมีย : สีแหบ <a href="#" class="card-link"> ดูรายละเอียด</a>
                                        </p>

                                    </div>
                                </div><!-- /.card -->
                                <div class="card card-purple card-outline">
                                    <div class="card-header">
                                        <h5 class="text-center m-0">การรักษา</h5>
                                    </div>
                                    <div class="card-body">

                                        <h6 class="card-title">Special title treatment</h6>

                                        <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
                                        <a href="#" class="btn btn-primary">Go somewhere</a>
                                    </div>
                                </div>
                            </div>

                            <!-- /.col-md-6 -->
                            <div class="col-lg-6 col-md-12 col-sm-12 mb-5">
                                <div class="card card-fuchsia card-outline">
                                    <div class="card-header">
                                        <h5 class=" m-0 text-center">โคภายในฟาร์ม</h5>
                                    </div>
                                    <div class="card-body">
                                        <div class="d-flex justify-content-center">
                                            <h6 class="card-title">ทั้งหมด : ตัว</h6>
                                        </div>
                                        <p class="card-text">พ่อโค : ตัว</p>
                                        <p class="card-text">แม่โค : ตัว</p>
                                        <a href="../report/req-cow.php" class="btn btn-primary">ดูรายละเอียด</a>
                                    </div>
                                </div>

                                <div class="card card-success card-outline ">
                                    <div class="card-header">
                                        <h5 class="text-center m-0">การเจริญเติบโต</h5>
                                    </div>
                                    <div class="card-body">
                                        <h6 class="card-title">Special title treatment</h6>

                                        <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
                                        <a href="#" class="btn btn-primary">ดูรายละเอียด</a>
                                    </div>
                                </div>
                            </div>
                            <!-- /.col-md-6 -->
                        </div>
                        <!-- /.row -->
                    </div><!-- /.container-fluid -->
                </div>
                <!-- /.content -->
            </div>
            <!-- /.content-wrapper -->
            <!-- Main Footer -->
            <?php require '../sub/footer.php'; ?>
        </div>
        <!-- ./wrapper -->
    </body>

    </html>
<?php

} ?>
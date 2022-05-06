<?php
require '../../connect/session_ckeck.php';
require_once '../../connect/functions.php';
$id = $_SESSION['id'];

$sql = new farm();
$fcheck = $sql->checkregisfarm($id);

// เช็คว่ามีการลงทะเบียนฟาร์มหรือไม่
$result = mysqli_num_rows($fcheck);
//ถ้าไม่มีส่งไปหน้าลงทะเบียน
if (empty($result)) {
    require_once '../alert/check_farm.php';
} else {
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>MoForYou</title>

    <?php require '../../build/script.php'; ?>
    <link rel="stylesheet" href="./_listreport.css">
</head>


<body class="hold-transition sidebar-collapse layout-top-nav">
    <div class="wrapper">

        <!-- Navbar -->
        <?php require '../sub/navbar.php'; ?>
        <!-- /.navbar -->

        <!-- Content Wrapper. Contains page content -->
        <div class="bgimg content-wrapper">
            <!-- Content Header (Page header) -->
            <div class="content-header">
                <div class="container ">
                    <!-- Manage -->
                    <div class="row  mt-5 mb-5">
                        <div class="col-md-12 ">
                            <div class="card shadow">
                                <div class="card-body">
                                    <h2 class=" col-md-12 col-sm-12 text-center"><i class="fa fa-file-chart-pie"></i> รายงานข้อมูล</h2>
                                    <hr class="mt-2 mb-2">
                                    <!-- list Manage -->
                                    <ul class="nav nav-pills " id="custom-content-below-tab">

                                        <li class="nav-item  col-md-4 col-sm-12 col-6 mt-2">
                                            <a class="btn btn-lg box_list-1 shadow" href="../report/rep-house" role="button">
                                                <div class="row justify-content-center">
                                                    <img class="imggg " src="../../dist/img/icon/rep-1 (6).png">

                                                    <span class="txt-resp mt-2">โรงเรือน</span>
                                                </div>
                                            </a>
                                        </li>

                                        <li class="nav-item  col-md-4 col-sm-12 col-6 mt-2">
                                            <a class="btn btn-lg box_list-2 shadow" href="../report/req-herd" role="button">
                                                <div class="row justify-content-center">
                                                    <img class="imggg " src="../../dist/img/icon/rep-1 (7).png">

                                                    <span class="txt-resp mt-2">ฝูงโค</span>
                                                </div>
                                            </a>
                                        </li>
                                        <li class="nav-item  col-md-4 col-sm-12 col-6 mt-2">
                                            <a class="btn btn-lg box_list-3 shadow" href="../report/req-cow" role="button">
                                                <div class="row justify-content-center">
                                                    <img class="imggg " src="../../dist/img/icon/req-cow.png">

                                                    <span class="txt-resp mt-2">โคเนื้อ</span>
                                                </div>
                                            </a>
                                        </li>
                                        <li class="nav-item  col-md-4 col-sm-12 col-6 mt-2">
                                            <a class="btn btn-lg bt_list-4 shadow" href="../report/req-breed" role="button">
                                                <div class="row justify-content-center">
                                                    <img class="imggg " src="../../dist/img/icon/rep-1 (8).png">
                                                    <span class="txt-resp mt-2">ผสมพันธุ์</span>
                                                </div>
                                            </a>
                                        </li>
                                        <li class="nav-item  col-md-4 col-sm-12 col-6 mt-2">
                                            <a class="btn btn-lg bt_list-4 shadow" href="../report/req-disease" role="button">
                                                <div class="row justify-content-center">
                                                    <img class="imggg " src="../../dist/img/icon/medical-checkup.png">

                                                    <span class="txt-resp mt-2">โรค/อาการป่วย</span>
                                                </div>
                                            </a>
                                        </li>
                                        <li class="nav-item  col-md-4 col-sm-12 col-6 mt-2">
                                            <a class="btn btn-lg bt_list-5 shadow" href="../report/req-heal" role="button">
                                                <div class="row justify-content-center">
                                                    <img class="imggg " src="../../dist/img/icon/rep-1 (1).png">

                                                    <span class="txt-resp mt-2">ประวัติการรักษา</span>
                                                </div>
                                            </a>
                                        </li>
                                        <li class="nav-item  col-md-4 col-sm-12 col-6 mt-2">
                                            <a class="btn btn-lg bt_list-5 shadow" href="../report/req-foodrecord" role="button">
                                                <div class="row justify-content-center">
                                                    <img class="imggg " src="../../dist/img/icon/food.png">

                                                    <span class="txt-resp mt-2">ประวัติการให้อาหาร</span>
                                                </div>
                                            </a>
                                        </li>
                                        <li class="nav-item  col-md-12 col-sm-12 mt-2">
                                            <a class="btn btn-lg bt_list shadow" href="./_listmenu" role="button">
                                                <i class="fa fa-arrow-alt-to-left"></i>
                                                <span class="ml-3">ย้อนกลับ</span>
                                            </a>
                                        </li>

                                    </ul>
                                    <!--/. list Manage -->
                                </div>
                                <!-- ./card-body -->
                            </div>
                            <!-- ./card -->
                        </div>
                        <!-- ./col -->
                    </div>
                    <!-- ./row -->
                </div><!-- /.container-fluid -->
            </div>
            <!-- /.content-header -->

        
        </div>
        <!-- /.content-wrapper -->
        <!-- Main Footer -->
        <?php require '../sub/footer.php'; ?>
    </div>
    <!-- ./wrapper -->
</body>

</html>
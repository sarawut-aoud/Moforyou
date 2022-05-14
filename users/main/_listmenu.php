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
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta http-equiv="Content-Type" content="text/html; charset=windows-874">
    <meta http-equiv="Content-Type" content="text/html; charset=tis-620">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>MoForYou</title>

    <?php require '../../build/script.php'; ?>
    <link rel="stylesheet" href="./_listmenu.css">
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
                    <div class="row mt-5 mb-5">
                        <div class="col-md-12 ">
                            <div class="card shadow">
                                <div class="card-body">
                                    <!-- list Manage -->
                                    <h2 class=" col-md-12 col-sm-12 text-center"><i class="fa fa-list-alt"></i> รายการเมนู</h2>
                                    <hr class="mt-2 mb-2">
                                    <ul class="nav nav-pills justify-content-center" id="custom-content-below-tab">
                                        <li class="nav-item col-md-4 col-sm-12 col-6 mt-2">
                                            <a class="btn btn-lg box_list-1 shadow" href="../listmenu/_tabhouse.php" role="button">
                                                <div class="row justify-content-center">
                                                    <img class="imggg " src="../../dist/img/icon/barn.png">
                                                    <span class=" txt-resp mt-2  ">โรงเรือน</span>
                                                </div>
                                            </a>
                                        </li>
                                        <li class="nav-item  col-md-4 col-sm-12 col-6 mt-2">
                                            <a class="btn btn-lg box_list-2 shadow" role="button" href="../listmenu/_tabherd.php">
                                                <div class="row justify-content-center">
                                                    <img class="imggg" src="../../dist/img/icon/smart-farm.png">
                                                    <span class=" mt-2   txt-resp">ฝูงโค</span>
                                                </div>
                                            </a>
                                        </li>

                                        <li class="nav-item  col-md-4 col-sm-12 col-6 mt-2">
                                            <a class="btn btn-lg box_list-3 shadow" href="../listmenu/_tabcow.php" role="button">
                                                <div class="row justify-content-center">
                                                    <img class="imggg" src="../../dist/img/icon/sacred-cow.png">
                                                    <span class="txt-resp mt-2">โคเนื้อ</span>
                                                </div>
                                            </a>
                                        </li>

                                        <li class="nav-item  col-md-4 col-sm-12 col-6 mt-2">
                                            <a class="btn btn-lg bt_list-4 shadow" href="../listmenu/_tabbreed.php" role="button">
                                                <div class="row justify-content-center">
                                                    <img class="imggg" src="../../dist/img/icon/breed.png">
                                                    <span class="txt-resp mt-2">ผสมพันธุ์</span>
                                                </div>
                                            </a>
                                        </li>
                                        <li class="nav-item  col-md-4 col-sm-12 col-6 mt-2">
                                            <a class="btn bt_list-5 shadow" href="../listmenu/_tabfood.php" role="button">
                                                <div class="row justify-content-center">
                                                    <img class="imggg" src="../../dist/img/icon/ต้นข้าว.png">
                                                    <span class="txt-resp mt-2">อาหาร</span>
                                                </div>

                                            </a>
                                        </li>
                                        <li class="nav-item  col-md-4 col-sm-12 col-6 mt-2">

                                            <a class=" btn btn-lg bt_list-6 shadow" href="../listmenu/_tabheal.php" role="button">
                                                <div class="row justify-content-center">
                                                    <img class="imggg" src="../../dist/img/icon/disease.png">
                                                    <span class="txt-resp mt-2">บันทึก โรค/ประวัติการรักษา</span>
                                                </div>
                                            </a>

                                        </li>
                                        <li class="nav-item  col-md-4 col-sm-12 col-6 mt-2">
                                            <a class="btn btn-lg bt_list-7 shadow" href="../listmenu/_tabgivefood.php" role="button">
                                                <div class="row justify-content-center">
                                                    <img class="imggg" src="../../dist/img/icon/feed.png">
                                                    <span class="txt-resp mt-2">ให้อาหาร</span>
                                                </div>
                                            </a>
                                        </li>
                                        <li class="nav-item  col-md-4 col-sm-12 col-6 mt-2">
                                            <a class="btn btn-lg bt_list-8 shadow" href="../doctor/_tabdoctor.php" role="button">
                                                <div class="row justify-content-center">
                                                    <img class="imggg" src="../../dist/img/icon/doctor.png">
                                                    <span class="txt-resp mt-2">สัตวแพทย์</span>
                                                </div>
                                            </a>
                                        </li>
                                        <li class="nav-item  col-md-4 col-sm-12 col-6 mt-2">
                                            <a class="btn btn-lg bt_list-9 shadow" href="./_listReport.php" role="button">
                                                <div class="row justify-content-center">
                                                    <img class="imggg" src="../../dist/img/icon/report.png">
                                                    <span class="txt-resp mt-2">รายงานข้อมูล</span>
                                                </div>
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

            <!-- Main content -->


        </div>
        <!-- /.content-wrapper -->
        <!-- Main Footer -->
        <?php require '../sub/footer.php'; ?>
    </div>
    <!-- ./wrapper -->
</body>

</html>
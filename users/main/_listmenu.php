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

?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="utf-8">
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
                        <div class="row mt-5">
                            <div class="col-md-12 ">
                                <div class="card shadow">
                                    <div class="card-body">
                                        <!-- list Manage -->
                                        <h2 class=" col-md-12 col-sm-12 text-center"><i class="fa fa-list-alt"></i> รายการเมนู</h2>
                                        <hr class="mt-2 mb-2">
                                        <ul class="nav nav-pills justify-content-center" id="custom-content-below-tab">
                                            <li class="nav-item col-md-4 col-sm-12 mt-2">
                                                <a class="btn btn-lg bt_list-1 shadow" href="../listmenu/_tabhouse" role="button">โรงเรือน</a>
                                            </li>
                                            <li class="nav-item  col-md-4 col-sm-12 mt-2">
                                                <a class="btn btn-lg bt_list-1 shadow" role="button" href="../listmenu/_tabherd">ฝูงโค</a>
                                            </li>

                                            <li class="nav-item  col-md-4 col-sm-12 mt-2">
                                                <a class="btn btn-lg bt_list-1 shadow" href="../listmenu/_tabcow" role="button">โคเนื้อ</a>
                                            </li>

                                            <li class="nav-item  col-md-4 col-sm-12 mt-2">
                                                <a class="btn btn-lg bt_list-2 shadow" href="../listmenu/_tabbreed" role="button">ผสมพันธุ์</a>
                                            </li>
                                            <li class="nav-item  col-md-4 col-sm-12 mt-2">
                                                <a class="btn btn-lg bt_list-2 shadow" href="#tab-farm" role="button">โรค/อาการป่วย</a>
                                            </li>
                                            <li class="nav-item  col-md-4 col-sm-12 mt-2">
                                                <a class="btn btn-lg bt_list-2 shadow" href="#tab-farm" role="button">การรักษา</a>
                                            </li>
                                            <li class="nav-item  col-md-4 col-sm-12 mt-2">
                                                <a class="btn btn-lg bt_list shadow" href="#tab-farm" role="button">อาหารโคเนื้อ</a>
                                            </li>
                                            <li class="nav-item  col-md-4 col-sm-12 mt-2">
                                                <a class="btn btn-lg bt_list shadow" href="#tab-farm" role="button">ให้อาหาร</a>
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

                        <!-- Report -->
                        <div class="row  ">
                            <div class="col">
                                <div class="card shadow">
                                    <div class="card-body">
                                        <h2 class=" col-md-12 col-sm-12 text-center"><i class="fa fa-file-chart-pie"></i> รายงานข้อมูล</h2>
                                        <hr class="mt-2 mb-2">
                                        <!-- list Manage -->
                                        <ul class="nav nav-pills justify-content-center" id="custom-content-below-tab">
                                            <li class="nav-item  col-md-4 col-sm-12 mt-2">
                                                <a class="btn btn-lg bt_list-1 shadow" href="../report/rep-house" role="button">โรงเรือน</a>
                                            </li>

                                            <li class="nav-item  col-md-4 col-sm-12 mt-2">
                                                <a class="btn btn-lg bt_list-1 shadow" href="../report/req-herd" role="button">ฝูงโค</a>
                                            </li>
                                            <li class="nav-item  col-md-4 col-sm-12 mt-2">
                                                <a class="btn btn-lg bt_list-1 shadow" href="../report/req-cow" role="button">โคเนื้อ</a>
                                            </li>
                                            <li class="nav-item  col-md-4 col-sm-12 mt-2">
                                                <a class="btn btn-lg bt_list-2 shadow" href="../report/req-breed" role="button">ผสมพันธุ์</a>
                                            </li>
                                            <li class="nav-item  col-md-4 col-sm-12 mt-2">
                                                <a class="btn btn-lg bt_list-2 shadow" href="../report/req-disease" role="button">โรค/อาการป่วย</a>
                                            </li>
                                            <li class="nav-item  col-md-4 col-sm-12 mt-2">
                                                <a class="btn btn-lg bt_list-2 shadow" href="#" role="button">การเจริญเติบโต</a>
                                            </li>
                                            <li class="nav-item  col-md-4 col-sm-12 mt-2">
                                                <a class="btn btn-lg bt_list shadow" href="#" role="button">ประวัติการให้อาหาร</a>
                                            </li>
                                            <li class="nav-item  col-md-4 col-sm-12 mt-2">
                                                <a class="btn btn-lg bt_list shadow" href="#tab-farm" role="button">ประวัติการรักษา</a>
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
                        <div class="row  mb-5">
                            <div class="col">
                                <div class="card shadow">
                                    <div class="card-body">
                                        <h2 class=" col-md-12 col-sm-12 text-center"><i class="fa fa-book-medical"></i> สัตวแพทย์</h2>
                                        <hr class="mt-2 mb-2">
                                        <!-- list Manage -->
                                        <ul class="nav nav-pills justify-content-center" id="custom-content-below-tab">
                                            <li class="nav-item  col-md-6 col-sm-12 mt-2">
                                                <a class="btn btn-lg bt_doc-1 shadow" href="../doctor/_tabdoctor" role="button">เพิ่มข้อมูลติดต่อสัตวแพทย์/รายชื่อสัตวแพทย์ฟาร์ม</a>
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
<?php } ?>
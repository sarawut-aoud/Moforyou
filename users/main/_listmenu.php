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
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <div class="content-header">
                <div class="container">
                    <!-- Manage -->
                    <div class="row  ">
                        <div class="col">
                            <div class="card ">
                                <div class="card-body">
                                    <!-- list Manage -->
                                    <span class="btn btn-lg bt_list col-md-12 col-sm-12 " href="#">รายการเมนู</span>
                                    <hr class="mt-2 mb-2">
                                    <ul class="nav nav-pills justify-content-center" id="custom-content-below-tab">
                                        <li class="nav-item  col-md-12 col-sm-12 mt-2">
                                            <a class="btn btn-lg bt_list " href="#tab-farm" role="button">ลงทะเบียนฟาร์ม</a>
                                        </li>
                                        <li class="nav-item  col-md-4 col-sm-12 mt-2">
                                            <a class="btn btn-lg bt_list" role="button" aria-selected="false">ฝูงโค</a>
                                        </li>
                                        <li class="nav-item col-md-4 col-sm-12 mt-2">
                                            <a class="btn btn-lg bt_list" href="../listmenu/_tab_house" role="button">โรงเรือน</a>
                                        </li>
                                        <li class="nav-item  col-md-4 col-sm-12 mt-2">
                                            <a class="btn btn-lg bt_list " href="#tab-farm" role="button">โคเนื้อ</a>
                                        </li>
                                        <li class="nav-item  col-md-4 col-sm-12 mt-2">
                                            <a class="btn btn-lg bt_list " href="#tab-farm" role="button">สายพันธุ์โคเนื้อ</a>
                                        </li>
                                        <li class="nav-item  col-md-4 col-sm-12 mt-2">
                                            <a class="btn btn-lg bt_list " href="#tab-farm" role="button">ผสมพันธุ์</a>
                                        </li>
                                        <li class="nav-item  col-md-4 col-sm-12 mt-2">
                                            <a class="btn btn-lg bt_list " href="#tab-farm" role="button">โรค/อาการป่วย</a>
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
                            <div class="card ">
                                <div class="card-body">
                                    <span class="btn btn-lg bt_list col-md-12 col-sm-12 " href="#">รายงานข้อมูล</span>
                                    <hr class="mt-2 mb-2">
                                    <!-- list Manage -->
                                    <ul class="nav nav-pills justify-content-center" id="custom-content-below-tab">
                                        <li class="nav-item  col-md-4 col-sm-12 mt-2">
                                            <a class="btn btn-lg bt_list " href="#tab-farm" role="button">ฟาร์ม</a>
                                        </li>
                                        <li class="nav-item  col-md-4 col-sm-12 mt-2">
                                            <a class="btn btn-lg bt_list" role="button" aria-selected="false">โคเนื้อ</a>
                                        </li>
                                        <li class="nav-item col-md-4 col-sm-12 mt-2">
                                            <a class="btn btn-lg bt_list" href="#tab-specise" role="button">สายพันธุ์โคเนื้อ</a>
                                        </li>
                                        <li class="nav-item  col-md-4 col-sm-12 mt-2">
                                            <a class="btn btn-lg bt_list " href="#tab-farm" role="button">ฟาร์ม</a>
                                        </li>
                                        <li class="nav-item  col-md-4 col-sm-12 mt-2">
                                            <a class="btn btn-lg bt_list " href="#tab-farm" role="button">ฟาร์ม</a>
                                        </li>
                                        <li class="nav-item  col-md-4 col-sm-12 mt-2">
                                            <a class="btn btn-lg bt_list " href="#tab-farm" role="button">ฟาร์ม</a>
                                        </li>

                                        <li class="nav-item  col-md-4 col-sm-12 mt-2">
                                            <a class="btn btn-lg bt_list " href="#tab-farm" role="button">ฟาร์ม</a>
                                        </li>
                                        <li class="nav-item  col-md-4 col-sm-12 mt-2">
                                            <a class="btn btn-lg bt_list " href="#tab-farm" role="button">ฟาร์ม</a>
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
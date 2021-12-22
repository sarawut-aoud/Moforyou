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
    // ถ้ามีแสดง tag นี้
    
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

        .fas {
            color: white;
        }

        .fas:hover {
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
                <div class="content">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="card">
                                    <div class="card-body">
                                        <h5 class="card-title">Card title</h5>

                                        <p class="card-text">
                                            Some quick example text to build on the card title and make up the bulk of the card's
                                            content.
                                        </p>

                                        <a href="#" class="card-link">Card link</a>
                                        <a href="#" class="card-link">Another link</a>
                                    </div>
                                </div>

                                <div class="card card-primary card-outline">
                                    <div class="card-body">
                                        <h5 class="card-title">Card title</h5>

                                        <p class="card-text">
                                           <?php  echo $_SESSION['fullname']; ?>
                                        
                                        </p>
                                        <a href="#" class="card-link">Card link</a>
                                        <a href="#" class="card-link">Another link</a>
                                    </div>
                                </div><!-- /.card -->
                            </div>
                            <!-- /.col-md-6 -->
                            <div class="col-lg-6">
                                <div class="card">
                                    <div class="card-header">
                                        <h5 class="card-title m-0">Featured</h5>
                                    </div>
                                    <div class="card-body">
                                        <h6 class="card-title">Special title treatment</h6>

                                        <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
                                        <a href="#" class="btn btn-primary">Go somewhere</a>
                                    </div>
                                </div>

                                <div class="card card-primary card-outline">
                                    <div class="card-header">
                                        <h5 class="card-title m-0">Featured</h5>
                                    </div>
                                    <div class="card-body">
                                        <h6 class="card-title">Special title treatment</h6>

                                        <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
                                        <a href="#" class="btn btn-primary">Go somewhere</a>
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
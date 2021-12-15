<?php
require '../../connect/session_ckeck.php';
require_once '../../connect/functions.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>MoForYou</title>
    
    <?php require '../../build/script.php';
           
    ?>
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
                            <div class="card card-info">
                                <div class="card-header">
                                    <h3 class="card-title">แก้ไขข้อมูลส่วนตัว</h3>
                                </div>
                                <!-- /.card-header -->
                                <!-- form start -->
                                <form>
                                    <div class="card-body">
                                        <div class="text-center">
                                            <img src="../../../../main_2/dist/img/user-01.jpg" class="rounded card-img-top  w-25" alt="image">
                                        </div>
                                        <div class="form-group">
                                            <label for="fname">ชื่อ-นามสกุล</label>
                                            <input type="text" class="form-control" id="fname" placeholder="ชื่อ-นามสกุล">
                                        </div>
                                        <div class="form-group">
                                            <label for="email">Email</label>
                                            <input type="email" class="form-control" id="email" placeholder="Email">
                                        </div>
                                        <div class="form-group">
                                            <label for="phone">เบอร์โทรศัพท์</label>
                                            <input type="tel" class="form-control" name="phone" id="phone" placeholder="123-456-7890" required="required" title="123-456-7890" pattern="^\([0-9]{3}\)\s[0-9]{3}-[0-9]{4}$">
                                        </div>

                                    </div>
                                    <!-- /.card-body -->

                                    <div class="card-footer text-end">
                                        <button type="submit" id="submit" name="submit" class="btn btn-info">ยืนยัน</button>
                                    </div>
                                </form>
                            </div>
                            <!-- /.card -->
                        </div>
                        <div class="col-lg-6">
                            <div class="card card-success">
                                <div class="card-header">
                                    <h3 class="card-title">แก้ไขข้อมูลฟาร์ม</h3>
                                </div>
                                <!-- /.card-header -->
                                <!-- form start -->
                                <form>
                                    <div class="card-body">
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">ชื่อโรงเรือน</label>
                                            <input type="text" class="form-control" id="exampleInputEmail1" placeholder="ชื่อโรงเรือน">
                                        </div>

                                    </div>
                                    <!-- /.card-body -->

                                    <div class="card-footer text-end">
                                        <button type="submit" id="submit" name="submit" class="btn btn-primary">เพิ่ม</button>
                                    </div>
                                </form>
                            </div>
                            <!-- /.card -->
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
<script type="text/javascript" src="../../dist/js/phone.js"></script>
</html>
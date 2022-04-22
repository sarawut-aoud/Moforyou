<?php
require_once '../../connect/session_ckeck.php';
require '../../connect/functions.php';
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
                            <h1>ManagePages โรคและอาการป่วย</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="./admin_index">Home</a></li>
                                <li class="breadcrumb-item active">Diseased</li>
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
                        <div class="col-5">
                            <div class="card card-primary shadow">
                                <div class="card-header  ">
                                    <h3 class="text-center">เพิ่มข้อมูลโรคหรืออาการป่วย</h3>
                                </div>
                                <div class="card-body ">
                                    <div class="from-group row">
                                        <div class="input-group">
                                            <label class="col-from-label" for="name">
                                                ชื่อโรคหรืออาการป่วยโค :
                                            </label>
                                            <div class="col-md">
                                                <input type="text" class=" form-control" id="name" placeholder="ชื่อโรคหรืออาการป่วย" title="ชื่อโรคหรืออาการป่วย" required>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-footer text-end">
                                    <button type="reset" class="btn  btn-secondary reset">ยกเลิก</button>
                                    <button type="submit" id="btn" class="btn btn-primary submit">ยืนยันการเพิ่มข้อมูล</button>
                                </div>
                            </div>
                        </div>
                        <div class="col-7">

                            <div class="card card-warning">
                                <div class="card-header ">
                                    <h3 class="text-center">โรคและอาการป่วย</h3>
                                </div>
                                <!-- /.card-header -->
                                <div class="card-body">
                                    <!-- table -->
                                    <table id="example1" class="table table-bordered table-striped table-hover">
                                        <!-- head table -->
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>โรค/ป่วย</th>
                                                <th>Edit&Delete</th>
                                            </tr>
                                        </thead>
                                        <!-- /.head table -->
                                        <!-- body table -->
                                        <tbody>
                                            <tr>
                                                <td>Win 95+</td>
                                                <td> 4</td>

                                                <td>
                                                    <center>
                                                        <a class="btn btn-info btnEdit" id="">
                                                            <i class="fas fa-pencil-alt"></i>

                                                        </a>
                                                        <a class="btn btn-danger btnDels" id="">
                                                            <i class="fas fa-trash-alt"></i>
                                                        </a>
                                                    </center>
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
    <script src="../../dist/js/datatable.js"></script>

</body>

</html>
<?php
require_once '../../connect/session_ckeck.php';
require '../../connect/functions.php';
$sql = new farm();
$query = $sql->selectfarm('admin');
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
                            <h1>ManagePages ฟาร์ม</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="./admin_index">Home</a></li>
                                <li class="breadcrumb-item active">Farm</li>
                            </ol>
                        </div>
                    </div>
                </div><!-- /.container-fluid -->
            </section>
            <!-- /.content-header -->

            <!-- Main Content -->
            <section class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header card-outline card-blue ">
                                    <h3 class="text-center">ฟาร์ม</h3>
                                </div>
                                <!-- /.card-header -->
                                <div class="card-body">
                                    <!-- table -->
                                    <table id="example1" class="table table-bordered table-striped table-hover">
                                        <!-- head table -->
                                        <thead>

                                            <tr>
                                                <th>#</th>
                                                <th>ฟาร์ม</th>
                                                <th>อำเภอ</th>
                                                <th>จังหวัด</th>
                                                <th>เจ้าของฟาร์ม</th>
                                                <th>Edit&Delete</th>
                                            </tr>
                                        </thead>
                                        <!-- /.head table -->
                                        <!-- body table -->
                                        <tbody>
                                            <?php while ($row = $query->fetch_object()) {

                                            ?>
                                                <tr>
                                                    <td><?php echo $row->id ?></td>
                                                    <td><?php echo $row->farmname ?></td>
                                                    <td><?php @$get_tombon = file_get_contents('https://raw.githubusercontent.com/sarawut-pcru/Thailand_Map/main/json/tombon.json');
                                                        $tombon = json_decode($get_tombon);
                                                        foreach ($tombon as $value) {
                                                            if ($row->district_id == $value->id) { //? check id amphur
                                                                echo  $value->name_th;
                                                            }
                                                        }; ?></td>
                                                    <td><?php echo $row->farmname ?></td>
                                                    <td><?php echo $row->fullname ?></td>
                                                    <td>
                                                        <center>
                                                            <a class="btn btn-info edit_data" title="แก้ไขข้อมูล" id="<?php echo $row->id ?>">
                                                                <i class="fas fa-pencil-alt"></i>
                                                            </a>
                                                            <a class="btn btn-danger" title="ลบข้อมูล" id="<?php echo $row->id ?>">
                                                                <i class="fas fa-trash-alt"></i>
                                                            </a>
                                                        </center>
                                                    </td>
                                                </tr>
                                            <?php } ?>
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

</body>
<script src="../../dist/js/datatable.js"></script>
<script></script>

</html>
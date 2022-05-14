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
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta http-equiv="Content-Type" content="text/html; charset=windows-874">
    <meta http-equiv="Content-Type" content="text/html; charset=tis-620">
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
            <div class="bgimg content-wrapper">
                <!-- Content Header (Page header) -->

                <div class="content-header">
                    <div class="container">
                        <div class="row mb-4 mt-4 justify-content-beetween ">

                            <div class="col-md-12">
                                <button class="btn btn-info col-3 btn-lg float-end""  onclick=" window.history.go(-1);"><i class="fa fa-arrow-alt-left"></i></button>
                            </div>
                        </div>
                        <div class="row  mb-5">
                            <div class="col-md-12">
                                <div class="card  ">
                                    <?php
                                    $data = new herd();
                                    $row1 = $data->refherd($farmid);
                                    $rs1 = mysqli_fetch_object($row1);
                                    ?>
                                    <div class="card-header card-outline card-blue">
                                        <h3 class=" text-center">ฝูงโค ของ <?php echo $rs1->farmname ?></h3>
                                    </div>
                                    <!-- /.card-header -->
                                    <div class="card-body">
                                        <!-- table -->
                                        <div class=" text-end mb-3">
                                            <a class="btn btn-outline-danger "><img src="../../dist/img/icon/pdf.png" width="40px"></a>
                                            <a href="../print/print_herd.php?farm=<?php echo $farmid; ?>" class="btn btn-outline-primary "><img src="../../dist/img/icon/printer.png" width="40px"></a>
                                        </div>
                                        <table id="example1" class="table table-bordered table-striped table-hover">
                                            <!-- head table -->
                                            <thead>

                                                <tr align="center">
                                                    <th>#</th>
                                                    <th>ชื่อโรงเรือน</th>
                                                    <th>ชื่อฝูง</th>
                                                    <th>จำนวนโคในฝูง</th>

                                                </tr>

                                            </thead>
                                            <!-- /.head table -->
                                            <!-- body table -->
                                            <tbody>
                                                <?php
                                                $data = new herd();
                                                $row = $data->refherdcountcow($farmid);
                                                $i = 1;
                                                while ($rs = mysqli_fetch_object($row)) {
                                                ?>
                                                    <tr>
                                                        <td style="width: 10%;"><?php echo $i; ?></td>
                                                        <td style="width: 30%;"><?php echo $rs->house_name; ?></td>
                                                        <td style="width: 30%;"><?php echo $rs->herd_name; ?></td>
                                                        <td style="width: 18%"><?php echo $rs->cow; ?></td>
                                                        <!--  -->
                                                    </tr>
                                                <?php
                                                    $i++;
                                                } ?>
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
            </div>
            <!-- /.content-wrapper -->
        </section>
        <!-- Main Footer -->
        <?php require '../sub/footer.php'; ?>
    </div>

    <!-- ./wrapper -->
</body>
<script src="../../dist/js/datatable.js">
</script>

</html>
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
                                <div class="card card-success ">
                                    <?php
                                    $data = new heal();
                                    $row1 = $data->refheal($farmid);
                                    $rs1 = mysqli_fetch_object($row1);
                                    ?>
                                    <div class="card-header ">
                                        <h3 class=" text-center">ประวัติการรักษา ของ <?php echo $rs1->farmname ?></h3>
                                    </div>
                                    <!-- /.card-header -->
                                    <div class="card-body">
                                        <!-- table -->
                                        <div class=" text-end mb-3">
                                            <a href="../pdf/pdf_heal.php?farm=<?php echo $farmid; ?>" class="btn btn-outline-danger "><img src="../../dist/img/icon/pdf.png" width="40px"></a>
                                            <a href="../print/print_heal.php?farm=<?php echo $farmid; ?>" class="btn btn-outline-primary "><img src="../../dist/img/icon/printer.png" width="40px"></a>
                                        </div>
                                        <table id="example1" class="table table-bordered table-striped table-hover">
                                            <!-- head table -->
                                            <thead>
                                                <tr>
                                                    <th>#</th>
                                                    <th>ชื่อโค</th>
                                                    <th>โรค / อาการป่วย</th>

                                                    <th>วันที่เริ่มรักษา</th>
                                                    <th>วันที่สิ้นสุดการรักษา</th>
                                                    <th>รักษากับสัตวแพยท์</th>

                                                </tr>
                                            </thead>
                                            <!-- /.head table -->
                                            <!-- body table -->
                                            <tbody>
                                                <?php
                                                require_once '../../connect/function_datetime.php';
                                                $data = new heal();
                                                $row = $data->select_healbyfarm($farmid);
                                                $i = 1;
                                                while ($rs = $row->fetch_object()) {
                                                    if ($rs->detail != NULL && $rs->healmore != NULL) {
                                                        $dis = $rs->detail . ' และ ' . $rs->healmore;
                                                    } else if ($rs->detail == NULL) {
                                                        $dis = $rs->healmore;
                                                    } else {
                                                        $dis = $rs->detail;
                                                    }
                                                    if ($rs->doctor_id != NULL) {
                                                        $data = new doctor();
                                                        $row = $data->select_docbyfarm($farmid);
                                                        while ($rsdoc = $row->fetch_object()) {
                                                            if ($rsdoc->id == $rs->doctor_id) {
                                                                $doctor = $rsdoc->name;
                                                            } else {
                                                                $doctor = '';
                                                            }
                                                        }
                                                    } else {
                                                        $doctor = '';
                                                    }
                                                    if ($rs->healstart == null) {
                                                        $start = '';
                                                    } else {
                                                        $start = DateThai($rs->healstart);
                                                    }
                                                    if ($rs->healend == NULL) {
                                                        $end = '';
                                                    } else {
                                                        $end = DateThai($rs->healend);
                                                    }


                                                ?>
                                                    <tr>
                                                        <td><?php echo $i; ?></td>
                                                        <td><?php echo $rs->cow_name; ?></td>
                                                        <td><?php echo  $dis; ?></td>

                                                        <td><?php echo $start; ?></td>
                                                        <td><?php echo  $end; ?></td>
                                                        <td><?php echo  $doctor; ?></td>


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
    <script src="../../dist/js/datatable.js"></script>
</body>


</html>
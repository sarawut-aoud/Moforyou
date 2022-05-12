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
                                                $data = new cow();
                                                $row1 = $data->refcow($farmid);
                                                $rs1 = mysqli_fetch_object($row1);
                                                ?>
                                    <div class="card-header card-cow">
                                        <h3 class=" text-center">โคเนื้อ ของ <?php echo $rs1->farmname?></h3>
                                    </div>
                                    <!-- /.card-header -->
                                    <div class="card-body">
                                        <!-- table -->
                                        <table id="example1" class="table table-bordered table-striped table-hover">
                                            <!-- head table -->
                                            <thead>

                                                <tr align="center">
                                                    <th>#</th>
                                                    <th>#</th>
                                                    <th>ชื่อ</th>
                                                    <th>เพศ</th>
                                                    <th>สายพันธุ์</th>
                                                    <th>โรงเรือน</th>
                                                    <th>ฝูง</th>
                                                    <th>อายุ</th>

                                                </tr>

                                            </thead>
                                            <!-- /.head table -->
                                            <!-- body table -->
                                            <tbody>
                                                <?php
                                                $datahouse = new cow();
                                                $row = $datahouse->selectdatacowbyfarmer($farmid);
                                                $i = 1;
                                                while ($rs = mysqli_fetch_object($row)) {

                                                    if ($rs->cow_pic != NULL) {
                                                        $img =   "src='../../dist/img/cow_upload/" . $rs->cow_pic . "'";
                                                    } else {
                                                        $img =   "src='../../dist/img/icon/sacred-cow.png'";
                                                    }
                                                    $datenew = date_create($rs->date);
                                                    $datenow = date_create(date('d-m-Y'));
                                                    $datediff = date_diff($datenow, $datenew);
                                                    $diff = $datediff->format("%a");
                                                    $years = floor($diff / 365);
                                                    $months = floor(($diff - ($years * 365)) / 30);
                                                    $day =  $diff - (($years * 365) + ($months * 30));
                                                ?>
                                                    <tr>
                                                        <td style="width: 10%;"><?php echo $i; ?></td>
                                                        <td style="width:10%" class="text-center"><img <?php echo $img; ?> class="rounded w-100"></td>
                                                        <td><?php echo $rs->cow_name; ?></td>
                                                        <td><?php echo $rs->gender; ?></td>
                                                        <td><?php echo $rs->spec_name; ?></td>
                                                        <td><?php echo $rs->house_name; ?></td>
                                                        <td><?php echo $rs->herd_name; ?></td>
                                                        <td><?php echo  $years . " ปี " . $months . " เดือน " . $day . " วัน "; ?></td>
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
<script src="../../dist/js/datatableprint.js">
</script>

</html>
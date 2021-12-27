<?php
require '../../connect/session_ckeck.php';
require_once '../../connect/functions.php';
//เก็บ id จาก session
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
        <link rel="stylesheet" href="../main/_listmenu.css">
    </head>


    <body class="hold-transition sidebar-collapse layout-top-nav">
        <div class="wrapper">

            <!-- Navbar -->
            <?php require '../sub/navbar.php'; ?>
            <!-- /.navbar -->

            <!-- Content Wrapper. Contains page content -->
            <section class="content">
                <div class="content-wrapper">
                    <!-- Content Header (Page header) -->
                    <div class="content-header">
                        <div class="container">
                            <!-- Manage -->
                            <div class="row justify-content-center">
                            <div class="col-md-4">
                                    <button class="btn btn-info col-3 btn-lg float-start"" ><i class="fas fa-qrcode"></i></button>
                                </div>   
                            <div class="col-md-8">
                                    <!-- general form elements -->
                                    <div class="card card-primary">
                                        <div class="card-header">
                                            <h3 class="card-title">เพิ่มข้อมูลโรงเรือน</h3>
                                        </div>
                                        <!-- /.card-header -->
                                        <!-- form start -->
                                        <form method="post">
                                            <div class="card-body">
                                                <div class="form-group">
                                                    <label for="exampleInputEmail1">ชื่อโรงเรือน</label>
                                                    <input type="text" class="form-control" id="hname" name="hname" placeholder="ชื่อโรงเรือน">
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
                                <!-- ./col -->
                            </div>
                            <!-- ./row -->

                        </div><!-- /.container-fluid -->
                    </div>
                    <!-- /.content-header -->

                    <div class="container ">
                        <div class="row mb-5">
                            <div class="col-md-12">
                                <div class="card">
                                    <div class="card-header card-outline card-blue">
                                        <h3 class=" text-center">โรงเรือน</h3>
                                    </div>
                                    <!-- /.card-header -->
                                    <div class="card-body">
                                        <!-- table -->
                                        <table id="example1" class="table table-bordered table-striped table-hover">
                                            <!-- head table -->
                                            <thead>

                                                <tr>
                                                    <th>#</th>
                                                    <th>ชื่อโรงเรือน</th>
                                                    <th>แก้ไข / ลบข้อมูล</th>
                                                </tr>

                                            </thead>
                                            <!-- /.head table -->
                                            <!-- body table -->
                                            <tbody>
                                                <?php
                                                $datahouse = new house();
                                                $row = $datahouse->gethouseFarmid($id);
                                                while ($rs = mysqli_fetch_object($row)) {
                                                ?>
                                                    <tr>
                                                        <td style="width: 20%;"><?php echo $rs->id; ?></td>
                                                        <td style="width: 50%;"><?php echo $rs->house_name; ?></td>
                                                        <td style="width:30%;" class="text-center">
                                                            <a class="btn btn-info" href="../update-form/_house?id=<?php echo $rs->id; ?>">
                                                                <i class="far fa-pen-alt"></i>
                                                            </a>
                                                            <a class="btn btn-danger" onclick="del(<?php echo $rs->id; ?>)">
                                                                <i class="far fa-trash"></i>
                                                            </a>
                                                        </td>
                                                    </tr>
                                                <?php } ?>
                                            </tbody>
                                            <!-- /.body table -->
                                            <!-- foot table -->
                                            <tfoot>
                                                <tr>
                                                    <th>#</th>
                                                    <th>ชื่อโรงเรือน</th>
                                                    <th>แก้ไข / ลบข้อมูล</th>
                                                </tr>
                                            </tfoot>
                                            <!-- /.foot table -->
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
                <!-- /.content-wrapper -->
            </section>
            <!-- Main Footer -->
            <?php require '../sub/footer.php'; ?>
        </div>

        <!-- ./wrapper -->
    </body>
    <script src="../../dist/js/datatable.js">
    </script>
    <script>
        function del(id) {
            Swal.fire({
                title: 'คุณแน่ใจ ?',
                text: "ต้องการลบข้อมูลนี้ใช่หรือไม่ ",
                icon: 'warning',
                showCancelButton: true,
                CancelButtonText: 'ยกเลิก',
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'ตกลง'
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location = "../delete-form/del_house?del=" + id;
                }
            })
        };
    </script>

    </html>
<?php
}
require '../../connect/alert.php';
$sql = new house();
if (isset($_POST['submit'])) {
    $hname = $_POST['hname'];
    $farmid = $_SESSION['id'];
    $sql = $sql->addhouse($hname, $farmid);

    if ($sql) {
        echo success_1("Successful!!", "./_tabhouse.php"); // "แสดงอะไร","ส่งไปหน้าไหน"

    } else {
        echo "<script>alert('Something went wrong! Please try again.');</script>";
        echo "<script>window.location.href='./register'</script>";
    }
}
?>
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
    $id_farm = $_GET['id'];

    $sql = new house();
    $query = $sql->selhouse($id_farm);
    $rs = mysqli_fetch_object($query);

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
                            <div class="row mb-4 mt-4 justify-content-center ">
                                <div class="col-md-8">
                                    <button class="btn btn-info col-3 btn-lg float-end"" href="" onclick=" window.history.go(-1);"><i class="fas fa-arrow-alt-left"></i></button>
                                </div>
                            </div>

                            <div class="row justify-content-center">
                                <div class="col-md-8">
                                    <!-- general form elements -->
                                    <div class="card  card-warning">
                                        <div class="card-header">
                                            <h3 class="card-title">แก้ไขข้อมูลโรงเรือน</h3>
                                        </div>
                                        <!-- /.card-header -->
                                        <!-- form start -->
                                        <form method="post">
                                            <div class="card-body">
                                                <div class="form-group">
                                                    <label>ชื่อโรงเรือน</label>
                                                    <input type="text" class="form-control" id="hname" name="hname" value="<?php echo $rs->house_name; ?>">
                                                </div>

                                            </div>
                                            <!-- /.card-body -->
                                            <div class="card-footer text-end">
                                                <button type="submit" id="submit" name="submit" class="btn btn-info">ยืนยันการแก้ไข</button>
                                            </div>
                                            <input type="hidden" id="id" name="id" value="<?php echo $rs->id; ?>">
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
                </div>
                <!-- /.content-wrapper -->
            </section>
            <!-- Main Footer -->
            <?php require '../sub/footer.php'; ?>
        </div>

        <!-- ./wrapper -->
    </body>
   

    </html>
<?php
}
require '../../connect/alert.php';

if (isset($_POST['submit'])) {
    $id = $_POST['id'];
    $hname = $_POST['hname'];

    $sql = $sql->updatehouse($hname, $id);

    if ($sql) {
        echo success_1("Successful!!", "../listmenu/_tabhouse"); // "แสดงอะไร","ส่งไปหน้าไหน"

    } else {
        echo "<script>alert('Something went wrong! Please try again.');</script>";
        echo "<script>window.location.href='./register'</script>";
    }
}
?>
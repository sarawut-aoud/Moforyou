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
            <section class="content mb-5">
                <div class="content-wrapper mb-5">
                    <!-- Content Header (Page header) -->
                    <div class="content-header">
                        <div class="container">
                            <!-- Manage -->
                            <div class="row justify-content-center">
                                <div class="col-md-8">
                                    <!-- general form elements -->
                                    <div class="card ">
                                        <div class="card-header card-cow ">
                                            <h3 class="text-center text-white">เพิ่มข้อมูลโคเนื้อ</h3>
                                        </div>
                                        <!-- /.card-header -->
                                        <!-- form start -->
                                        <form action="" enctype="multipart/form-data" id="frm_cow">
                                            <div class="card-body">
                                                <div class="row">
                                                    <div class="col-md-4 ">
                                                        <div class="row justify-content-center">
                                                            <img class=" img-rounded w-50 h-50" src="../../dist/img/icon/sacred-cow.png" alt="ตัว">
                                                            <div class="form-group row">
                                                                <div class="input-group">
                                                                    <div class="col-md mt-3">
                                                                        <input type="file" class="form-control" id="inputfile" name="file" placeholder="00/00/0000">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-8">
                                                        <div class="form-group row">
                                                            <div class="input-group">
                                                                <label class="col-form-label col-4" for="namecow">ชื่อโค : </label>
                                                                <div class="col-md">
                                                                    <input type="text" class="form-control" id="namecow" placeholder="ชื่อโค" require>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="form-group row">
                                                            <div class="input-group">
                                                                <label class="col-form-label col-4" for="cowdate">วันที่เกิด/รับเข้ามา </label>
                                                                <div class="col-md">
                                                                    <input type="date" class="form-control" id="cowdate" placeholder="00/00/0000">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="form-group row">
                                                            <div class="input-group">
                                                                <label class="col-form-label col-4" for="species_id">สายพันธุ์ : </label>
                                                                <div class="col-md ">
                                                                    <select class="form-control select2" id="species_id" data-placeholder="เลือกสายพันธุ์" require></select>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row ">
                                                    <div class="form-group row">
                                                        <div class="input-group">
                                                            <label class="col-form-label col-2" for="weightcow">น้ำหนัก : </label>
                                                            <div class="col-md-4">
                                                                <input type="number" class="form-control " id="weightcow" placeholder="น้ำหนัก" require>
                                                            </div>
                                                            <label class="col-form-label col-2" for="highcow">ส่วนสูง : </label>
                                                            <div class="col-md-4">
                                                                <input type="number" class="form-control " id="highcow" placeholder="น้ำหนัก" require>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <div class="input-group">
                                                            <label class="col-form-label col-2" for="fathercow">พ่อโค : </label>
                                                            <div class="col-md-4">
                                                                <input type="text" class="form-control " id="fathercow" placeholder="พ่อโค">
                                                            </div>
                                                            <label class="col-form-label col-2" for="mothercow">แม่โค : </label>
                                                            <div class="col-md-4">
                                                                <input type="text" class="form-control " id="mothercow" placeholder="แม่โค">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <div class="input-group">
                                                            <label class="col-form-label col-md-2 col-sm" for="house_id">โรงเรือน : </label>
                                                            <div class="col-sm-12  col-md-4">
                                                                <select class="form-control select2" id="house_id" data-placeholder="เลือกโรงเรือน" require></select>
                                                            </div>
                                                            <label class="col-form-label col-md-2 col-sm" for="herd_id">ฝูง : </label>
                                                            <div class="col-sm-12 col-md-4">
                                                                <select class="form-control select2" id="herd_id" data-placeholder="เลือกฝูง" require></select>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="form-group row">
                                                        <div class="input-group justify-content-center">
                                                            <div class="d-flex col-form-label">
                                                                <div class="form-group clearfix mr-3">
                                                                    <div class="icheck-primary d-inline  ">
                                                                        <input type="radio" id="radioPrimary1" name="r1" value="1" checked>
                                                                        <label for="radioPrimary1" class="align-self-center">
                                                                            <img class="img-circle elevation-2 " src="../../dist/img/icon/male.png" alt="ตัว">
                                                                        </label>
                                                                    </div>
                                                                </div>
                                                                <div class="form-group clearfix mr-3">
                                                                    <div class="icheck-pink d-inline ">
                                                                        <input type="radio" id="radioPrimary2" name="r1" value="2">
                                                                        <label for="radioPrimary2">
                                                                            <img class="img-circle elevation-2  " src="../../dist/img/icon/female.png" alt="ตัวเมีย">
                                                                        </label>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- /.card-body -->

                                            <div class="card-footer text-end">
                                                <button type="reset" class="btn btn-secondary reset">ยกเลิก</button>
                                                <button type="submit" class="btn   btn-cow submit">ยืนยันการเพิ่มข้อมูล</button>
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

                    <div class="container mb-5">
                        <div class="row mb-5">
                            <div class="col-md-12">
                                <div class="card">
                                    <div class="card-header card-outline card-blue">
                                        <h3 class=" text-center">ข้อมูลโค</h3>
                                    </div>
                                    <!-- /.card-header -->
                                    <div class="card-body">
                                        <!-- table -->
                                        <table id="example1" class="table table-bordered table-striped table-hover">
                                            <!-- head table -->
                                            <thead>
                                                <tr>
                                                    <th>#</th>
                                                    <th>ชื่อโค</th>
                                                    <th>แก้ไข / ลบข้อมูล</th>
                                                </tr>
                                            </thead>
                                            <!-- /.head table -->
                                            <!-- body table -->
                                            <tbody>
                                                <tr>
                                                    <td>123</td>
                                                    <td>145</td>
                                                    <td class="text-center">
                                                        <a class="btn btn-info btnEdit" id="">
                                                            <i class="far fa-pen-alt"></i>
                                                        </a>
                                                        <a class="btn btn-danger btnDels" id="">
                                                            <i class="far fa-trash"></i>
                                                        </a>
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


        <script>
            $(document).ready(function() {

                var farm_id = '<?php echo $_SESSION['id']; ?>';
                $.ajax({
                    type: 'get',
                    dataType: 'json',
                    url: '../process/_cow.php',
                    data: {
                        id: farm_id,
                        function: "getdatahouse",
                    },
                    success: function(result) {
                        var data = '<option value="" selected disabled>--เลือกโรงเรือน--</option>';
                        for (i in result) {
                            data += '<option value="' + result[i].house_id + '" > ' + result[i].housename + '</option>';
                        }
                        $('#house_id').html(data);

                        $('#house_id').change(function() {
                            var house_id = $('#house_id').val();
                            $.ajax({
                                type: 'get',
                                dataType: 'json',
                                url: '../process/_cow.php',
                                data: {
                                    id: house_id,
                                    function: "getdataherd",
                                },
                                success: function(result) {
                                    var data = '<option value="" selected disabled>--เลือกโรงเรือน--</option>';
                                    for (i in result) {
                                        data += '<option value="' + result[i].house_id + '" > ' + result[i].housename + '</option>';
                                    }
                                    $('#herd_id').html(data);

                                }
                            });

                        });
                    }
                });

            });
        </script>
    </body>


    </html>
<?php } ?>
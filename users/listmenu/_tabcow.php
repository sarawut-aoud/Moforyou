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
            <section class="content mb-5">
                <div class="bgimg  content-wrapper mb-5">
                    <!-- Content Header (Page header) -->
                    <div class="content-header">
                        <div class="container">
                            <!-- Manage -->
                            <div class="row justify-content-center">
                                <div class="col-md-8">
                                    <!-- general form elements -->
                                    <div class="card  shadow-lg">
                                        <div class="card-header card-cow ">
                                            <h3 class="text-center text-white">เพิ่มข้อมูลโคเนื้อ</h3>
                                        </div>
                                        <!-- /.card-header -->
                                        <!-- form start -->
                                        <form method="POST" enctype="multipart/form-data">
                                            <div class="card-body">
                                                <div class="row">
                                                    <div class="col-md-4 ">
                                                        <div class="row justify-content-center">
                                                            <img class=" img-rounded w-50 h-50" src="../../dist/img/icon/sacred-cow.png" alt="ตัว">
                                                            <div class="form-group row">
                                                                <div class="input-group">
                                                                    <div class="col-md mt-3">
                                                                        <input type="file" class="form-control" id="inputfile" name="file">
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
                                                                    <input type="text" class="form-control" id="namecow" name="namecow" placeholder="ชื่อโค" require>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="form-group row">
                                                            <div class="input-group">
                                                                <label class="col-form-label col-4" for="cowdate">วันที่เกิด/รับเข้ามา </label>
                                                                <div class="col-md">
                                                                    <input type="datetime-local" class="form-control" id="cowdate" name="cowdate" placeholder="00/00/0000">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="form-group row">
                                                            <div class="input-group">
                                                                <label class="col-form-label col-4" for="species_id">สายพันธุ์ : </label>
                                                                <div class="col-md ">
                                                                    <select class="form-control select2" id="species_id" name="species_id" data-placeholder="เลือกสายพันธุ์" require></select>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row ">
                                                    <div class="form-group row">
                                                        <div class="input-group">
                                                            <label class="col-form-label col-sm-2" for="weightcow">น้ำหนัก : </label>
                                                            <div class="col-md-4">
                                                                <input type="number" class="form-control " id="weightcow" name="weightcow" placeholder="น้ำหนัก" require>
                                                            </div>
                                                            <label class="col-form-label col-sm-2" for="highcow">ส่วนสูง : </label>
                                                            <div class="col-md-4">
                                                                <input type="number" class="form-control " id="highcow" name="highcow" placeholder="ส่วนสูง" require>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!-- <div class="form-group row">
                                                        <div class="input-group">
                                                            <label class="col-form-label col-sm-2" for="fathercow">พ่อโค : </label>
                                                            <div class="col-md-4">
                                                                <input type="text" class="form-control " id="fathercow" name="fathercow" placeholder="พ่อโค">
                                                            </div>
                                                            <label class="col-form-label col-sm-2" for="mothercow">แม่โค : </label>
                                                            <div class="col-md-4">
                                                                <input type="text" class="form-control " id="mothercow" name="mothercow" placeholder="แม่โค">
                                                            </div>
                                                        </div>
                                                    </div> -->
                                                    <div class="form-group row">
                                                        <div class="input-group">
                                                            <label class="col-form-label col-md-2 col-sm" for="house_id">โรงเรือน : </label>
                                                            <div class="col-sm-12  col-md-4">
                                                                <select class="form-control select2" id="house_id" name="house_id" data-placeholder="เลือกโรงเรือน" require></select>
                                                            </div>
                                                            <label class="col-form-label col-md-2 col-sm" for="herd_id">ฝูง : </label>
                                                            <div class="col-sm-12 col-md-4">
                                                                <select class="form-control select2" id="herd_id" name="herd_id" data-placeholder="เลือกฝูง" require></select>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="form-group row">
                                                        <div class="input-group justify-content-center">
                                                            <div class="d-flex col-form-label">
                                                                <div class="form-group clearfix mr-3">
                                                                    <div class="icheck-primary d-inline  ">
                                                                        <input type="radio" id="radioPrimary1" name="gender" value="1" checked>
                                                                        <label for="radioPrimary1" class="align-self-center">
                                                                            <img class="img-circle elevation-2 " src="../../dist/img/icon/male.png" alt="ตัว">
                                                                        </label>
                                                                    </div>
                                                                </div>
                                                                <div class="form-group clearfix mr-3">
                                                                    <div class="icheck-pink d-inline ">
                                                                        <input type="radio" id="radioPrimary2" name="gender" value="2">
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
                                                <button type="submit" name="submit_cow" id="submit_cow" class="btn  btn-cow ">ยืนยันการเพิ่มข้อมูล</button>
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
                                                    <th>#</th>
                                                    <th>ชื่อโค</th>
                                                    <th>ส่วนสูง</th>
                                                    <th>น้ำหนัก</th>
                                                    <th>โรงเรือน</th>
                                                    <th>ฝูง</th>
                                                    <th>สายพันธุ์</th>
                                                    <th>เพศ</th>
                                                    <th>แก้ไข / ลบข้อมูล</th>
                                                </tr>
                                            </thead>
                                            <!-- /.head table -->
                                            <!-- body table -->
                                            <tbody>
                                                <?php
                                                $datahouse = new cow();
                                                $row = $datahouse->selectdatacowbyfarmer($farmid);
                                                while ($rs = $row->fetch_object()) {
                                                    if ($rs->cow_pic != NULL) {
                                                        $img =   "src='../../dist/img/cow_upload/" . $rs->cow_pic . "'";
                                                    } else {
                                                        $img =   "src='../../dist/img/icon/sacred-cow.png'";
                                                    }

                                                ?>
                                                    <tr>
                                                        <td><?php echo $rs->id; ?></td>
                                                        <td style="width:10%" class="text-center"><img <?php echo $img; ?> class="rounded w-100"></td>
                                                        <td><?php echo $rs->cow_name; ?></td>
                                                        <td><?php echo $rs->high; ?></td>
                                                        <td><?php echo $rs->weight; ?></td>
                                                        <td><?php echo $rs->house_name; ?></td>
                                                        <td><?php echo $rs->herd_name; ?></td>
                                                        <td><?php echo $rs->spec_name; ?></td>
                                                        <td><?php echo $rs->gender; ?></td>

                                                        <td class="text-center">
                                                            <a class="btn btn-info btnEdit" id="<?php echo $rs->id; ?>">
                                                                <i class="fa fa-pen-alt"></i>
                                                            </a>
                                                            <a class="btn btn-danger btnDels" id="<?php echo $rs->id; ?>">
                                                                <i class="fa fa-trash"></i>
                                                            </a>
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
                        </div>

                    </div>
                    <?php require_once 'modalcow.php'; ?>

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

                var farm_id = '<?php echo $_SESSION['farm_id']; ?>';


                $.ajax({
                    type: 'get',
                    dataType: 'json',
                    url: '../process/_cow.php',
                    data: {
                        id: '',
                        function: "getdataspecies",
                    },
                    success: function(result) {
                        var data = '<option value="" selected disabled>--เลือกสายพันธุ์--</option>';
                        for (i in result) {
                            data += '<option value="' + result[i].spec_id + '" > ' + result[i].spec_name + '</option>';
                        }
                        $('#species_id').html(data);
                    }
                });

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
                                        data += '<option value="' + result[i].herd_id + '" > ' + result[i].herdname + '</option>';
                                    }
                                    $('#herd_id').html(data);

                                }
                            });

                        });
                    }
                });
                $(document).on('click', '.btnEdit', function(e) {
                    e.preventDefault();
                    var id = $(this).attr('id');
                    var txt = 'แก้ไขข้อมูลโค';
                    $.ajax({
                        type: 'get',
                        dataType: 'json',
                        url: '../process/_cow.php',
                        data: {
                            function: 'showdata',
                            id: id,
                        },
                        success: function(result) {
                            $('#modalEdit').modal('show');
                            $('#modaltextcenter').html(txt);
                            $('#modalnamecow').val(result.cowname);
                            $('#modal_cowdate').val(result.cow_date);
                            $('#modalweightcow').val(result.weight);
                            $('#modalhighcow').val(result.high);
                            // $('#modalfathercow').val(result.cow_father);
                            // $('#modalmothercow').val(result.cow_mother);
                            $('#modal_cowid').val(result.cow_id);
                            if (result.cow_pic != null) {

                                $('#modalimg').attr('src', "../../dist/img/cow_upload/" + result.cow_pic + "");

                            } else {

                                $('#modalimg').attr('src', "../../dist/img/icon/sacred-cow.png");

                            }
                            if (result.cow_gender == '1') {
                                $('#modalradioPrimary1').prop('checked', true);
                            } else if (result.cow_gender == '2') {
                                $('#modalradioPrimary2').prop('checked', true);
                            } else {
                                $('#modalradioPrimary1').prop('checked', false);
                                $('#modalradioPrimary2').prop('checked', false);
                            }
                            $.ajax({
                                type: 'get',
                                dataType: 'json',
                                url: '../process/_cow.php',
                                data: {
                                    id: '',
                                    function: "getdataspecies",
                                },
                                success: function(results) {
                                    var data = '';
                                    for (i in results) {
                                        if (results[i].spec_id == result.spec_id) {
                                            data += '<option value="' + results[i].spec_id + '" selected > ' + results[i].spec_name + ' </option>';

                                        } else {
                                            data += '<option value="' + results[i].spec_id + '" > ' + results[i].spec_name + '</option>';
                                        }
                                    }
                                    $('#modalspecies_id').html(data);
                                }
                            });

                            $.ajax({
                                type: 'get',
                                dataType: 'json',
                                url: '../process/_cow.php',
                                data: {
                                    id: farm_id,
                                    function: "getdatahouse",
                                },
                                success: function(results) {
                                    var data = '';
                                    for (i in results) {
                                        if (results[i].house_id == result.house_id) {
                                            data += '<option value="' + results[i].house_id + '" selected > ' + results[i].housename + '</option>';

                                        } else {
                                            data += '<option value="' + results[i].house_id + '" > ' + results[i].housename + '</option>';

                                        }
                                    }
                                    $('#modalhouse_id').html(data);


                                    var house_id = $('#modalhouse_id').val();
                                    $.ajax({
                                        type: 'get',
                                        dataType: 'json',
                                        url: '../process/_cow.php',
                                        data: {
                                            id: house_id,
                                            function: "getdataherd",
                                        },
                                        success: function(results) {
                                            var data = '';
                                            for (i in results) {
                                                if (results[i].herd_id == result.herd_id) {
                                                    data += '<option value="' + results[i].herd_id + '"selected > ' + results[i].herdname + '</option>';

                                                } else {
                                                    data += '<option value="' + results[i].herd_id + '" > ' + results[i].herdname + '</option>';
                                                }
                                            }
                                            $('#modalherd_id').html(data);

                                        }
                                    });


                                    $('#modalhouse_id').change(function() {
                                        var house_id = $('#modalhouse_id').val();
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
                                                    data += '<option value="' + result[i].herd_id + '" > ' + result[i].herdname + '</option>';
                                                }
                                                $('#modalherd_id').html(data);

                                            }
                                        });

                                    });
                                }
                            });


                        }
                    })
                })
                // delete
                $(document).on('click', '.btnDels', function(e) {
                    e.preventDefault();

                    var id = $(this).attr('id');
                    var _row = $(this).parent();
                    Swal.fire({
                        title: 'คุณต้องการลบข้อมูลใช่หรือไม่ ?',
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonColor: '#3085d6',
                        cancelButtonColor: '#d33',
                        confirmButtonText: "ยืนยัน",
                        cancelButtonText: "ยกเลิก",
                    }).then((btn) => {
                        if (btn.isConfirmed) {
                            $.ajax({
                                type: 'get',
                                dataType: 'json',
                                url: '../process/_cow.php',
                                data: {
                                    function: 'del',
                                    id: id,
                                },
                                success: function(result) {
                                    if (result.status == 200) {
                                        toastr.success(
                                            result.message,
                                            '', {
                                                timeOut: 1000,
                                                fadeOut: 1000,
                                                onHidden: function() {
                                                    // location.reload();
                                                    _row.closest('tr').remove();
                                                }
                                            }
                                        );
                                    } else {
                                        toastr.warning(
                                            result.message,
                                            '', {
                                                timeOut: 1000,
                                                fadeOut: 1000,
                                                onHidden: function() {
                                                    location.reload();
                                                }
                                            }
                                        );
                                    }
                                }
                            });
                        }
                    })

                });


            });
        </script>
    </body>

    </html>
<?php
    require_once '../../connect/toastr.php';
    require_once '../../connect/resize.php';
    // insert
    if (isset($_POST['submit_cow'])) {
        $sql = new cow();

        if (empty($_POST['species_id'])) {
            echo '<script>
                    $(document).ready(function(){
                        $("#species_id").focus();
                    })
                 </script>';
            echo warning_toast('กรุณาเลือกสายพันธ์ุ ');
        } else if (empty($_POST['house_id'])) {
            echo '<script>
                    $(document).ready(function(){
                        $("#house_id").focus();
                    })
                </script>';
            echo warning_toast('กรุณาเลือกโรงเรือน ');
        } else if (empty($_POST['herd_id'])) {
            echo '<script>
                    $(document).ready(function(){
                        $("#herd_id").focus();
                    })
                </script>';
            echo warning_toast('กรุณาเลือกฝูง');
        } else {

            $namecow =  $_POST['namecow'];
            $cowdate =  $_POST['cowdate'];
            $species_id =  $_POST['species_id'];
            $weightcow =  $_POST['weightcow'];
            $highcow =  $_POST['highcow'];
            // $fathercow =  $_POST['fathercow'];
            // $mothercow =  $_POST['mothercow'];
            $house_id =  $_POST['house_id'];
            $herd_id =  $_POST['herd_id'];
            $gender =  $_POST['gender'];
            $picture = $_FILES['file']['tmp_name'];
            //? function ลดขนาดรูปภาพ
            function imageResize($imageResourceId, $width, $height)
            {
                $targetWidth = $width < 1280 ? $width : 1280;
                $targetHeight = ($height / $width) * $targetWidth;
                $targetLayer = imagecreatetruecolor($targetWidth, $targetHeight);
                imagecopyresampled($targetLayer, $imageResourceId, 0, 0, 0, 0, $targetWidth, $targetHeight, $width, $height);
                return $targetLayer;
            }

            if (empty($namecow) || empty($cowdate)  || empty($weightcow) || empty($highcow)  || empty($gender)) {

                echo warning_toast('โปรดระบุข้อมูลบางส่วนให้ครบ');
            } else {
                if (!empty($picture)) {
                    $time = date('Ymdhis');
                    $sourceProperties = getimagesize($picture);
                    $fileNewName = $time;
                    $folderPath = "../../dist/img/cow_img/";
                    $ext = $_FILES['file']['name'];
                    $imageType = $sourceProperties[2];
                    echo resize($picture, $imageType, $folderPath, $fileNewName, $ext, $sourceProperties);
                    copy($picture, "../../dist/img/cow_upload/" . $ext);

                    $query = $sql->addcow($namecow, $cowdate, $highcow, $weightcow, $species_id, $herd_id, $house_id, $gender, $ext, $farmid);
                    echo success_toasts("บันทึกข้อมูลสำเร็จ", "./_tabcow.php");
                } else {
                    $query = $sql->addcow($namecow, $cowdate, $highcow, $weightcow,  $species_id, $herd_id, $house_id, $gender, '', $farmid);
                    echo success_toasts("บันทึกข้อมูลสำเร็จ", "./_tabcow.php");
                } // check picture
            } // check Undendifind values
        } // check select
    } //isset submit_cow
    // update
    if (isset($_POST['btnsave'])) {
        if (empty($_POST['modalspecies_id'])) {
            echo '<script>
                    $(document).ready(function(){
                        $("#modalspecies_id").focus();
                    })
                 </script>';
            echo warning_toast('กรุณาเลือกสายพันธ์ุ ');
        } else if (empty($_POST['modalhouse_id'])) {
            echo '<script>
                    $(document).ready(function(){
                        $("#modalhouse_id").focus();
                    })
                </script>';
            echo warning_toast('กรุณาเลือกโรงเรือน ');
        } else if (empty($_POST['modalherd_id'])) {
            echo '<script>
                    $(document).ready(function(){
                        $("#modalherd_id").focus();
                    })
                </script>';
            echo warning_toast('กรุณาเลือกฝูง');
        } else {
            $idcow = $_POST['modal_cowid'];
            $namecow =  $_POST['modalnamecow'];
            $cowdate =  $_POST['modal_cowdate'];
            $species_id =  $_POST['modalspecies_id'];
            $weightcow =  $_POST['modalweightcow'];
            $highcow =  $_POST['modalhighcow'];
            // $fathercow =  $_POST['modalfathercow'];
            // $mothercow =  $_POST['modalmothercow'];
            $house_id =  $_POST['modalhouse_id'];
            $herd_id =  $_POST['modalherd_id'];
            $gender =  $_POST['gender'];
            $picture = $_FILES['file']['tmp_name'];
            //? function ลดขนาดรูปภาพ
            function imageResize($imageResourceId, $width, $height)
            {
                $targetWidth = $width < 1280 ? $width : 1280;
                $targetHeight = ($height / $width) * $targetWidth;
                $targetLayer = imagecreatetruecolor($targetWidth, $targetHeight);
                imagecopyresampled($targetLayer, $imageResourceId, 0, 0, 0, 0, $targetWidth, $targetHeight, $width, $height);
                return $targetLayer;
            }
            if (empty($namecow) || empty($cowdate)  || empty($weightcow) || empty($highcow)  || empty($gender)) {

                echo warning_toast('โปรดระบุข้อมูลบางส่วนให้ครบ');
            } else {
                if (!empty($picture)) {
                    $time = date('Ymdhis');
                    $sourceProperties = getimagesize($picture);
                    $fileNewName = $time;
                    $folderPath = "../../dist/img/cow_img/";
                    $ext = $_FILES['file']['name'];
                    $imageType = $sourceProperties[2];
                    echo resize($picture, $imageType, $folderPath, $fileNewName, $ext, $sourceProperties);
                    copy($picture, "../../dist/img/cow_upload/" . $ext);

                    $query = $sql->update_cow($namecow, $cowdate, $highcow, $weightcow,  $species_id, $herd_id, $house_id, $gender, $ext, $idcow);
                    echo success_toasts("แก้ไขข้อมูลโคสำเร็จ", "./_tabcow.php");
                } else {
                    $query = $sql->update_cow($namecow, $cowdate, $highcow, $weightcow,  $species_id, $herd_id, $house_id, $gender, '', $idcow);
                    echo success_toasts("แก้ไขข้อมูลโคสำเร็จ", "./_tabcow.php");
                } // check picture
            } // check Undendifind values
        } // check select spec_id / house_id / herd_id
    } // isset btnsave
}
?>
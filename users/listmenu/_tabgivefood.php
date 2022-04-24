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
            <div class="bgimg content-wrapper mb-5">
                <!-- Content Header (Page header) -->
                <div class="content-header ">
                    <div class="container col-10">
                        <!-- Manage -->
                        <div class="row justify-content-around">
                            <div class="col-lg-5 col-md-12">
                                <div class="card  shadow">
                                    <div class="card-header card-food">
                                        <h3 class="text-center"> <i class="fa fa-plus-circle"></i> เพิ่มการให้อาหาร</h3>
                                    </div>

                                    <form method="POST" id="frm_data">
                                        <div class="card-body ">
                                            <div class="form-group row ">
                                                <div class=" input-group">
                                                    <label class=" col-form-label col-sm-3" for="foodid">รายการอาหาร: </label>
                                                    <div class="col-md">
                                                        <select class="form-control select2" name="foodid" id="foodid" data-placeholder="รายการอาหาร" required="required" title="รายการอาหาร"></select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group row ">
                                                <div class=" input-group">
                                                    <label class=" col-form-label col-sm-3" for="foodweight">น้ำหนักอาหาร: (kg.)</label>
                                                    <div class="col-md">
                                                        <input type="number" class="form-control" onkeypress="number(event);" min="0" name="foodweight" id="foodweight" placeholder="น้ำหนักอาหาร" required="required" title="น้ำหนักอาหาร">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group row ">
                                                <div class=" input-group">
                                                    <label class=" col-form-label col-sm-3" for="cowid">เลือกโค : </label>
                                                    <div class="col-md">
                                                        <select class="form-control select2" name="cowid" id="cowid" data-placeholder="เลือกโค" required="required" title="เลือกโค"></select>

                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group row ">
                                                <div class=" input-group">
                                                    <label class=" col-form-label col-sm-3" for="cow_weight">น้ำหนักโคก่อนให้อาหาร :</label>
                                                    <div class="col-md">
                                                        <input type="number" class="form-control " name="cow_weight" id="cow_weight" onkeypress="number(event);" min="0" placeholder="น้ำหนักโคก่อนให้อาหาร" title="น้ำหนักโคก่อนให้อาหาร" required="required">

                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group row ">
                                                <div class=" input-group">
                                                    <label class=" col-form-label col-sm-3" for="date">วันที่ให้อาหาร :</label>
                                                    <div class="col-md">
                                                        <input type="date" class="form-control " name="date" id="date" title="ระบุ" required="required">

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- /.card-body -->

                                        <div class="card-footer text-end">
                                            <button type="reset" class="btn  btn-secondary reset">ยกเลิก</button>
                                            <button type="submit" id="btn" class="btn btn-info submit">ยืนยันการเพิ่มข้อมูล</button>
                                        </div>
                                    </form>
                                </div>
                                <!-- /.card -->
                            </div>
                            <div class="col-lg-7 col-md-12">
                                <div class="card ">
                                    <div class="card-header card-food">
                                        <h3 class="text-center"> <i class="fa fa-wheat"></i> การให้อาหาร</h3>
                                    </div>
                                    <!-- /.card-header -->

                                    <!-- form start -->
                                    <form>
                                        <div class="card-body">

                                            <div class="card-body">
                                                <!-- table -->
                                                <table id="example1" class="table table-bordered table-striped table-hover">
                                                    <!-- head table -->
                                                    <thead>
                                                        <tr>
                                                            <th>#</th>
                                                            <th>ชื่อโค</th>
                                                            <th>รายการอาหาร</th>
                                                            <th>วันที่ให้อาหาร</th>
                                                            <th>น้ำหนักอาหาร</th>
                                                            <th>แก้ไข / ลบข้อมูล</th>
                                                        </tr>
                                                    </thead>
                                                    <!-- /.head table -->
                                                    <!-- body table -->
                                                    <tbody>
                                                        <?php
                                                        function DateThai($strDate)
                                                        {
                                                            $strYear = date("Y", strtotime($strDate)) + 543;
                                                            $strMonth = date("n", strtotime($strDate));
                                                            $strDay = date("j", strtotime($strDate));
                                                            $strHour = date("H", strtotime($strDate));
                                                            $strMinute = date("i", strtotime($strDate));
                                                            $strSeconds = date("s", strtotime($strDate));
                                                            $strMonthCut = array("", "ม.ค.", "ก.พ.", "มี.ค.", "เม.ย.", "พ.ค.", "มิ.ย.", "ก.ค.", "ส.ค.", "ก.ย.", "ต.ค.", "พ.ย.", "ธ.ค.");
                                                            $strMonthThai = $strMonthCut[$strMonth];
                                                            if ($strHour == '00' && $strMinute == '00') {
                                                                return "$strDay $strMonthThai $strYear   ";
                                                            } else {
                                                                return "$strDay $strMonthThai $strYear $strHour:$strMinute  ";
                                                            }
                                                        }
                                                        $data = new recordfood();
                                                        $row = $data->select_recordbyfarm($farmid);
                                                        while ($rs = $row->fetch_object()) {
                                                        ?>
                                                            <tr>
                                                                <td><?php echo $rs->id; ?></td>
                                                                <td><?php echo $rs->cow_name; ?></td>
                                                                <td><?php echo $rs->foodname; ?></td>
                                                                <td><?php echo DateThai($rs->date); ?></td>
                                                                <td><?php echo $rs->weight_food; ?></td>

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

    <script src="../../dist/js/datatable.js"></script>
    <script src="../../dist/js/numlock.js"></script>
    <script>
        $(document).ready(function() {
            $(document).on('click', '.reset', function(e) {
                e.preventDefault();
                $('#btn').removeClass();
                $('#btn').html('ยืนยันการเพิ่มข้อมูล');
                $('#btn').addClass('btn btn-info submit');
                $('#frm_data')[0].reset();
                $('#foodid').val(0).trigger("change");
                $('#cowid').val(0).trigger("change");

            })
            toastr.options = {
                'closeButton': false,
                'debug': false,
                'newestOnTop': false,
                'progressBar': false,
                'positionClass': 'toast-top-right',
                'preventDuplicates': false,
                'onclick': null,
                'showDuration': '300',
                'hideDuration': '1000',
                'timeOut': '5000',
                'extendedTimeOut': '1000',
                'showEasing': 'swing',
                'hideEasing': 'linear',
                'showMethod': 'fadeIn',
                'hideMethod': 'fadeOut'
            }

            var farm_id = '<?php echo $_SESSION['farm_id']; ?>';


            $.ajax({
                type: "get",
                dataType: "json",
                url: "../process/_givefood.php",
                data: {
                    function: "showfood",
                    farm_id: farm_id,
                },
                success: function(result) {
                    var data = '<option value="" selected disabled >เลือกอาหาร</option>';
                    for (i in result) {
                        data += '<option value="' + result[i].id + '" >' + result[i].name + '</option>';
                    }
                    $('#foodid').html(data);
                }
            })
            $.ajax({
                type: "get",
                dataType: "json",
                url: "../process/_givefood.php",
                data: {
                    function: "showcow",
                    farm_id: farm_id,
                },
                success: function(result) {
                    var data = '<option value="" selected disabled >เลือกอาหาร</option>';
                    for (i in result) {
                        data += '<option value="' + result[i].id + '" >' + result[i].cowname + '</option>';
                    }
                    $('#cowid').html(data);
                }
            })

            $(document).on('click', '.submit', function(e) {
                e.preventDefault();
                var foodid = $('#foodid').val();
                var foodweight = $('#foodweight').val();
                var cowid = $('#cowid').val();
                var cow_weight = $('#cow_weight').val();
                var date = $('#date').val();

                $.ajax({
                    type: "post",
                    dataType: "json",
                    url: '../process/_givefood.php',
                    data: {
                        function: "insert",
                        foodid: foodid,
                        foodweight: foodweight,
                        cowid: cowid,
                        cow_weight: cow_weight,
                        date: date,
                        farm_id: farm_id,
                    },
                    success: function(result) {
                        if (result.status == 200) {
                            toastr.success(
                                result.message,
                                '', {
                                    timeOut: 1000,
                                    fadeOut: 1000,
                                    onHidden: function() {
                                        location.reload();
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
                })
            });
            // update

            $(document).on('click', '.btnEdit', function(e) {
                e.preventDefault();
                $('#btn').removeClass();
                $('#btn').html('ยืนยันการแก้ไข');
                $('#btn').addClass('btn btn-warning btnsave');

                var id = $(this).attr('id');

                $.ajax({
                    type: "get",
                    dataType: "json",
                    url: '../process/_givefood.php',
                    data: {
                        function: "showdata",
                        id: id,
                    },
                    success: function(result) {

                        // $('#foodid').val();
                        $('#foodweight').val(result.foodweight);
                        // $('#cowid').val();
                        $('#cow_weight').val(result.cow_weight);
                        $('#date').val(result.date);
                        var racordid = result.id;

                        $.ajax({
                            type: "get",
                            dataType: "json",
                            url: "../process/_givefood.php",
                            data: {
                                function: "showfood",
                                farm_id: farm_id,
                            },
                            success: function(results) {
                                var data = '';
                                for (i in results) {
                                    if (results[i].id == result.foodid) {
                                        data += '<option value="' + results[i].id + '"selected >' + results[i].name + '</option>';

                                    } else {
                                        data += '<option value="' + results[i].id + '" >' + results[i].name + '</option>';

                                    }
                                }
                                $('#foodid').html(data);
                            }
                        })
                        $.ajax({
                            type: "get",
                            dataType: "json",
                            url: "../process/_givefood.php",
                            data: {
                                function: "showcow",
                                farm_id: farm_id,
                            },
                            success: function(results) {
                                var data = '';
                                for (i in results) {
                                    if (results[i].id == result.cowid) {
                                        data += '<option value="' + results[i].id + '" selected >' + results[i].cowname + '</option>';

                                    } else {
                                        data += '<option value="' + results[i].id + '" >' + results[i].cowname + '</option>';

                                    }
                                }
                                $('#cowid').html(data);
                            }
                        })

                        /// update ข้อมูล
                        $(document).on('click', '.btnsave', function(e) {
                            e.preventDefault();
                            var foodid = $('#foodid').val();
                            var foodweight = $('#foodweight').val();
                            var cowid = $('#cowid').val();
                            var cow_weight = $('#cow_weight').val();
                            var date = $('#date').val();
                            $.ajax({
                                type: "post",
                                dataType: "json",
                                url: '../process/_givefood.php',
                                data: {
                                    function: "update",
                                    foodid: foodid,
                                    foodweight: foodweight,
                                    cowid: cowid,
                                    cow_weight: cow_weight,
                                    date: date,
                                    foodid: foodid,
                                },
                                success: function(result) {
                                    if (result.status == 200) {
                                        toastr.success(
                                            result.message,
                                            '', {
                                                timeOut: 1000,
                                                fadeOut: 1000,
                                                onHidden: function() {
                                                    location.reload();
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
                            })


                        })
                    }
                })

            })
            // delete data

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
                            url: '../process/_givefood.php',
                            data: {
                                function: 'delete',
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

            })
        })
    </script>


</body>

</html>
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
            <div class="content-wrapper">
                <!-- Content Header (Page header) -->
                <div class="content-header">
                    <div class="container">
                        <!-- Manage -->
                        <div class="row justify-content-center">
                            <div class="col-md-8">
                                <!-- general form elements -->
                                <div class="card card-primary">
                                    <div class="card-header card-cow"">
                                        <h3 class=" text-center ">ผสมพันธุ์</h3>
                                    </div>
                                    <!-- /.card-header -->
                                    <!-- form start -->
                                    <form method=" POST" id="frm_breed">
                                        <div class=" card-body">
                                            <div class="form-group row">
                                                <div class="d-flex align-items-center ">
                                                    <label class=" col-form-label" for="cow_id_male">
                                                        <img class="img-circle elevation-2  " src="../../dist/img/icon/male.png" alt="ตัวผุ้">
                                                    </label>
                                                    <div class="col-md">
                                                        <select class="form-control select2" id="cow_id_male" data-placeholder="เลือกพ่อโค"></select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <div class="d-flex align-items-center ">
                                                    <label class=" col-form-label" for="cow_id_female">
                                                        <img class="img-circle elevation-2  " src="../../dist/img/icon/female.png" alt="ตัวเมีย">
                                                    </label>
                                                    <div class="col-md">
                                                        <select class="form-control select2 " id="cow_id_female" data-placeholder="เลือกแม่โค"></select>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <div class=" input-group justify-content-center">
                                                    <label class=" col-form-label">
                                                        <span><strong style="font-size: 24px;">ประมาณวันที่ </strong><span id="timeabout"></span></span>
                                                    </label>

                                                </div>
                                            </div>
                                            <div id="shownotification" class="d-none">
                                                <div class="form-group row">
                                                    <div class=" input-group justify-content-center">
                                                        <label class=" col-form-label ">
                                                            <span id="notification" style="font-size:18px;"></span>
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                        <!-- /.card-body -->

                                        <div class="card-footer text-end">
                                            <button type="reset" class="btn btn-secondary reset">ยกเลิก</button>
                                            <button type="submit" id="submit" name="submit" class="btn btn-primary submit">ยืนยันการผสมพันธุ์</button>
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
                        <div class="row">
                            <div class="col-md-12">
                                <div class="card">
                                    <div class="card-header card-outline card-blue">
                                        <h3 class=" text-center">ผสมพันธุ์</h3>
                                    </div>
                                    <!-- /.card-header -->
                                    <div class="card-body">
                                        <!-- table -->
                                        <table id="example1" class="table table-bordered table-striped table-hover">
                                            <!-- head table -->
                                            <thead>
                                                <tr>
                                                    <th>#</th>
                                                    <th>ระหว่าง</th>
                                                    <th>วันที่/เวลา</th>
                                                    <th>แก้ไข / ลบข้อมูล</th>
                                                </tr>
                                            </thead>
                                            <!-- /.head table -->
                                            <!-- body table -->
                                            <tbody>
                                                <?php
                                                $data = new breed();
                                                $row = $data->select_breed_all($farmid);
                                                while ($rs = $row->fetch_object()) {
                                                ?>
                                                    <tr>
                                                        <td style="width: 10%;"><?php echo $rs->id; ?></td>
                                                        <td><?php echo $rs->namemale . ' และ ' . $rs->namefemale ?></td>
                                                        <td><?php echo $rs->breed_date; ?></td>
                                                        <td class="text-center">
<<<<<<< HEAD
                                                            <a class="btn btn-info " id="<?php echo $rs->id; ?>">
                                                                <i class="fa fa-pen-alt"></i>
                                                            </a>
                                                            <a class="btn btn-danger " id="<?php echo $rs->id; ?>">
=======
                                                            <a class="btn btn-info btn_edit" id="<?php echo $rs->id; ?>">

                                                                <i class="fa fa-pen-alt"></i>
                                                            </a>
                                                            <a class="btn btn-danger btn_del" id="<?php echo $rs->id; ?>">
>>>>>>> 385574715c56c1aa6579503c9cda276ca366b657
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
                    <?php require_once "modaltabbreed.php"
                    ?>


                </div>
                <!-- /.content-wrapper -->
        </section>
        <!-- Main Footer -->
        <?php require '../sub/footer.php'; ?>
    </div>

    <!-- ./wrapper -->

    <script>
        $(document).ready(function() {
                    var farm_id = '<?php echo $_SESSION['farm_id']; ?>'

                    $('#timeabout').html('00-00-0000').css('color', 'red');
                    $('#modal_timeabout').html('00-00-0000').css('color', 'red');


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

                    $.ajax({
                        type: "get",
                        dataType: 'json',
                        url: '../process/_breed.php',
                        data: {
                            function: "showfemale",
                            farm_id: farm_id,
                        },
                        success: function(result) {
                            var data = '<option value="" selected disabled>--เลือกแม่โค--</option>';
                            for (i in result) {
                                data += '<option value="' + result[i].cow_id + '" > ' + result[i].cow_name + '</option>';
                            }
                            $('#cow_id_female').html(data);
                            //$('#modal_cow_id_female').html(data);

                        }
                    })
                    $.ajax({
                        type: "get",
                        dataType: 'json',
                        url: '../process/_breed.php',
                        data: {
                            function: "showmale",
                            farm_id: farm_id,
                        },
                        success: function(result) {
                            var data = '<option value="" selected disabled>--เลือกพ่อพันธุ์โค--</option>';
                            for (i in result) {
                                data += '<option  value="' + result[i].cow_id + '" > ' + result[i].cow_name + '</option>';
                            }
                            $('#cow_id_male').html(data);
                            // $('#modal_cow_id_male').html(data);

                        }
                    })


                    $(document).on('click', '.submit', function(e) {
                        e.preventDefault();
                        var female = $('#cow_id_female').val();
                        var male = $('#cow_id_male').val();
                        $.ajax({
                            type: "post",
                            dataType: 'json',
                            url: '../process/_breed.php',
                            data: {
                                function: "insert",
                                farm_id: farm_id,
                                female: female,
                                male: male,
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
                                                $('#cow_id_male').focus();
                                            }
                                        }
                                    );
                                }
                            }
                        })
                    })
                    // show date + 282 day
                    $('#cow_id_female,#cow_id_male').change(function(e) {
                        var female = $('#cow_id_female').val();

                        var male = $('#cow_id_male').val();

                        if (male != undefined && female != undefined) {
                            function toThaiDateString(date) {
                                let monthNames = [
                                    "มกราคม", "กุมภาพันธ์", "มีนาคม", "เมษายน",
                                    "พฤษภาคม", "มิถุนายน", "กรกฎาคม", "สิงหาคม.",
                                    "กันยายน", "ตุลาคม", "พฤศจิกายน", "ธันวาคม"
                                ];

                                let year = date.getFullYear() + 543;
                                let month = monthNames[date.getMonth()];
                                let numOfDay = date.getDate();

                                let hour = date.getHours().toString().padStart(2, "0");
                                let minutes = date.getMinutes().toString().padStart(2, "0");
                                let second = date.getSeconds().toString().padStart(2, "0");

                                return `${numOfDay} ${month} ${year} `; //+
                                // `${hour}:${minutes}:${second} น.`;
                            }
                            const d = new Date();
                            d.setDate(d.getDate() + 282);
                            $('#timeabout').html(toThaiDateString(d)).css('color', 'red');

                        }
                    });
                    $(document).on('click', '.btn_edit', function(e) {
                        e.preventDefault();

                        var txt = 'แก้ไขการผสมพันธุ์';
                        var id = $(this).attr('id');

                         $.ajax({
                             type: "get",
                             dataType: 'json',
                             url: '../process/_breed.php',
                             data: {
                                function: "showedit",
                                id: id,

                            },
                            success: function(rs) {
                                var id = rs.id;
                                var idcowmale = rs.cowmale;
                                var idcowfemale = rs.cowfemale;
                                $('#modalEdit').modal('show');
                                $.ajax({
                                    type: "get",
                                    dataType: 'json',
                                    url: '../process/_breed.php',
                                    data: {
                                        function: "showfemale",
                                        farm_id: farm_id,
                                    },
                                    success: function(result) {
                                        var data = '';
                                        for (i in result) {
                                            if (result[i].cow_id == idcowfemale){
                                                data += '<option value="' + result[i].cow_id + '" selected> ' + result[i].cow_name + '</option>';
                                                
                                            }else{
                                                data += '<option value="' + result[i].cow_id + '" > ' + result[i].cow_name + '</option>';
                                                
                                            }
                                        }
                                        //$('#cow_id_female').html(data);
                                        $('#modal_cow_id_female').html(data);

                                    }
                                })
                                $.ajax({
                                    type: "get",
                                    dataType: 'json',
                                    url: '../process/_breed.php',
                                    data: {
                                        function: "showmale",
                                        farm_id: farm_id,
                                    },
                                    success: function(result) {
                                        var data = '';
                                        for (i in result) {
                                            if (result[i].cow_id == idcowmale){
                                                data += '<option value="' + result[i].cow_id + '" selected> ' + result[i].cow_name + '</option>';
                                                
                                            }else{
                                                data += '<option value="' + result[i].cow_id + '" > ' + result[i].cow_name + '</option>';
                                                
                                            }
                                        }
                                        //$('#cow_id_male').html(data);
                                        $('#modal_cow_id_male').html(data);

                                    }
                              
                                })
                             }

                            })
                        })

                    })
    </script>
    <script src="../../dist/js/datatable.js"></script>
</body>

</html>
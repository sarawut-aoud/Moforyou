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
                    <div class="container col-11">
                        <!-- Manage -->
                        <div class="row ">
                            <div class="col-lg-4 col-md-12">
                                <div class="card card-info shadow">
                                    <div class="card-header">
                                        <h3 class="text-center"><i class="fa fa-plus-circle"></i> เพิ่มข้อมูลโรค/อาการป่วย</h3>
                                    </div>
                                    <form method="POST" id="frm_dis">
                                        <div class="card-body">

                                            <div class="form-group row ">
                                                <div class=" input-group">
                                                    <label class=" col-form-label col-sm-3" for="cowid">เลือกโคเนื้อ : </label>
                                                    <div class="col-md">
                                                        <select class="form-control select2" name="cowid" id="cowid" data-placeholder="เลือกโค" required="required" title="กรุณาเลือก"></select>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="form-group row ">
                                                <div class=" input-group">
                                                    <label class=" col-form-label col-sm-3" for="disease">โรค / อาการป่วย :</label>
                                                    <div class="col-md">
                                                        <select class="form-control select2" name="disease" id="disease" data-placeholder="เลือกโรคอาการป่วย" required="required" title="กรุณาเลือก"></select>

                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group row ">
                                                <div class=" input-group">
                                                    <label class=" col-form-label col-sm-3" for="disease_more">อื่นๆ :</label>
                                                    <div class="col-md">
                                                        <input type="text" class="form-control " name="disease_more" id="disease_more" placeholder="ระบุโรคอาการป่วย(ถ้าไม่มีให้เลือก)" title="กรุณาระบุ"></ร>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group row ">
                                                <div class=" input-group">
                                                    <label class=" col-form-label col-sm-3" for="disease_date">วันทีเริ่มแสดงอาการ :</label>
                                                    <div class="col-md">
                                                        <input type="date" class="form-control " name="disease_date" id="disease_date" title="กรุณาระบุ" required>
                                                    </div>
                                                </div>
                                            </div>
                                            <hr>
                                            <h3 class="text-center col p-0 m-0"> <i class="fa fa-briefcase-medical"></i> การรักษา</h3>
                                            <hr>
                                            <div class="form-group row ">
                                                <div class=" input-group">
                                                    <label class=" col-form-label col-sm-3" for="docid">สัตวแพทย์ : </label>
                                                    <div class="col-md">
                                                        <select class="form-control select2" name="docid" id="docid" data-placeholder="เลือกสัตวแพทย์" title="กรุณาเลือก">

                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group row ">
                                                <div class=" input-group">
                                                    <label class=" col-form-label col-sm-3" for="healstart">วันที่เริ่มรักษา :</label>
                                                    <div class="col-md">
                                                        <input type="date" class="form-control" name="healstart" id="healstart" title="ระบุวันที่เริ่มรักษา">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group row ">
                                                <div class=" input-group">
                                                    <label class=" col-form-label col-sm-3" for="healend">วันที่สิ้นสุดการรักษา :</label>
                                                    <div class="col-md">
                                                        <input type="date" class="form-control" name="healend" id="healend" title="ระบุวันที่สิ้นสุดการรักษา">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group row ">
                                                <div class=" input-group">
                                                    <label class=" col-form-label col-sm-3" for="detail">รายละเอียดการรักษา :</label>
                                                    <div class="col-md">
                                                        <textarea type="text" class="form-control" name="detail" id="detail" placeholder="รายละเอียดการรักษา" title="รายละเอียดการรักษา"></textarea>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- /.card-body -->
                                        <div class="card-footer text-end">
                                            <button type="reset" class="btn  btn-secondary reset_dis">ยกเลิก</button>
                                            <button type="submit" id="btn" class="btn btn-info submit_dis">ยืนยันการเพิ่มข้อมูล</button>
                                        </div>
                                    </form>
                                </div>
                                <!-- /.card -->

                            </div>

                            <div class="col-lg-8 col-md-12">
                                <div class="card card-warning shadow">
                                    <div class="card-header ">
                                        <h3 class="text-center"> โรค อาการป่วย / การรักษา</h3>
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
                                                            <th>โรค / อาการป่วย</th>
                                                            <th>วันทีเริ่มแสดงอาการ</th>
                                                            <th>วันที่เริ่มรักษา</th>
                                                            <th>วันที่สิ้นสุดการรักษา</th>
                                                            <th>รักษากับสัตวแพยท์</th>
                                                            <th>แก้ไข / ลบข้อมูล</th>
                                                        </tr>
                                                    </thead>
                                                    <!-- /.head table -->
                                                    <!-- body table -->
                                                    <tbody>
                                                        <?php
                                                        $data = new heal();
                                                        $row = $data->select_healbyfarm($farmid);
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

                                                        ?>
                                                            <tr>
                                                                <td><?php echo $rs->id; ?></td>
                                                                <td><?php echo $rs->cow_name; ?></td>
                                                                <td><?php echo  $dis; ?></td>
                                                                <td><?php echo DateThai($rs->datestart); ?></td>
                                                                <td><?php echo DateThai($rs->healstart); ?></td>
                                                                <td><?php echo DateThai($rs->healend); ?></td>
                                                                <td><?php echo  $doctor; ?></td>

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
    <!-- <script src="../../dist/js/phone.js"></script> -->
    <script src="../../dist/js/datatable.js"></script>
    <!-- <script src="../../dist/js/numlock.js"></script> -->
    <script>
        $(document).ready(function() {
            var farmid = '<?php echo $_SESSION['farm_id']; ?>';
            $(document).on('click', '.reset_dis', function(e) {
                e.preventDefault();
                $('#btn').removeClass();
                $('#btn').html('ยืนยันการเพิ่มข้อมูล');
                $('#btn').addClass('btn btn-info submit_dis');
                $('#frm_dis')[0].reset();
                $('#cowid').val(0).trigger("change");
                $('#disease').val(0).trigger("change");
                $('#docid').val(0).trigger("change");


            });


            $.ajax({
                type: 'get',
                dataType: 'json',
                url: '../process/_heal.php',
                data: {
                    function: 'showcow',
                    farmid: farmid,
                },
                success: function(result) {
                    var data = '<option  value="" selected disabled>---กรุณาเลือกโค--</option>';
                    for (i in result) {
                        data += '<option value="' + result[i].id + '">' + result[i].cowname + '</option>'
                    }
                    $('#cowid').html(data);
                }
            });
            $.ajax({
                type: 'get',
                dataType: 'json',
                url: '../process/_heal.php',
                data: {
                    function: 'showdisease',
                },
                success: function(result) {
                    var data = '<option  value="0" selected disabled>---กรุณาเลือกโรคหรืออาการป่วย--</option>';
                    for (i in result) {
                        //  data += '<option value="0">ไม่มีข้อมูลโรคหรืออาการป่วยที่ต้องการ</option>';
                        data += '<option value="' + result[i].id + '">' + result[i].detail + '</option>'
                    }
                    $('#disease').html(data);
                }
            });

            $.ajax({
                type: 'get',
                dataType: 'json',
                url: '../process/_heal.php',
                data: {
                    function: 'showdoctor',
                    farmid: farmid,
                },
                success: function(result) {
                    var data = '<option  value="0" selected disabled>---กรุณาเลือกสัตวแพทย์--</option>';
                    for (i in result) {
                        //  data += '<option value="0">ไม่มีข้อมูลโรคหรืออาการป่วยที่ต้องการ</option>';
                        data += '<option value="' + result[i].id + '">' + result[i].name + '</option>'
                    }
                    $('#docid').html(data);
                }
            });

            // insert
            $(document).on('click', '.submit_dis', function(e) {
                e.preventDefault();
                var cowid = $('#cowid').val();
                var dis_id = $('#disease').val();
                var dismore = $('#disease_more').val();
                var dis_date = $('#disease_date').val();
                var doc_id = $('#docid').val();
                var healstart = $('#healstart').val();
                var healend = $('#healend').val();
                var detail = $('#detail').val();

                $.ajax({
                    type: "post",
                    dataType: 'json',
                    url: '../process/_heal.php',
                    data: {
                        function: 'insert',
                        farmid: farmid,
                        cowid: cowid,
                        dis_id: dis_id,
                        dismore: dismore,
                        dis_date: dis_date,
                        doc_id: doc_id,
                        healstart: healstart,
                        healend: healend,
                        detail: detail,
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
                }) // end ajax

            }); // end click submit
            // update
            $(document).on('click', '.btnEdit', function(e) {
                e.preventDefault();
                $('#btn').removeClass();
                $('#btn').html('ยืนยันการแก้ไข');
                $('#btn').addClass('btn btn-success btnsave');

                var id = $(this).attr('id');

                $.ajax({
                    type: 'get',
                    dataType: "json",
                    url: "../process/_heal.php",
                    data: {
                        function: 'showdata',
                        id: id,
                    },
                    success: function(result) {

                        var hid = result.id;
                        $('#disease_more').val(result.healmore);
                        $('#disease_date').val(result.datestart);
                        $('#healstart').val(result.healstart);
                        $('#healend').val(result.healend);
                        $('#detail').val(result.detail);
                        $.ajax({
                            type: 'get',
                            dataType: 'json',
                            url: '../process/_heal.php',
                            data: {
                                function: 'showcow',
                                farmid: farmid,
                            },
                            success: function(results) {
                                var data = '';
                                for (i in results) {
                                    if (results[i].id == result.cow_id) {
                                        data += '<option value="' + results[i].id + '" selected >' + results[i].cowname + '</option>'
                                    } else {
                                        data += '<option value="' + results[i].id + '">' + results[i].cowname + '</option>'
                                    }
                                }
                                $('#cowid').html(data);
                            }
                        });
                        $.ajax({
                            type: 'get',
                            dataType: 'json',
                            url: '../process/_heal.php',
                            data: {
                                function: 'showdisease',
                            },
                            success: function(results) {
                                var data = '';
                                for (i in results) {
                                    if (results[i].id == result.dis_id) {
                                        data += '<option value="' + results[i].id + '" selected >' + results[i].detail + '</option>'
                                    } else {
                                        data += '<option value="' + results[i].id + '">' + results[i].detail + '</option>'
                                    }
                                }
                                $('#disease').html(data);
                            }
                        });

                        $.ajax({
                            type: 'get',
                            dataType: 'json',
                            url: '../process/_heal.php',
                            data: {
                                function: 'showdoctor',
                                farmid: farmid,
                            },
                            success: function(results) {
                                var data = '';

                                for (i in results) {
                                    if (results[i].id == result.doc_id) {
                                        data += '<option value="' + results[i].id + '" selected >' + results[i].name + '</option>'
                                    } else {
                                        data += '<option  value="0" selected disabled>---กรุณาเลือกสัตวแพทย์--</option>';
                                        data += '<option value="' + results[i].id + '">' + results[i].name + '</option>'
                                    }
                                }
                                $('#docid').html(data);
                            }
                        });

                        $(document).on('click', '.btnsave', function(e) {
                            e.preventDefault();
                            var cowid = $('#cowid').val();
                            var dis_id = $('#disease').val();
                            var dismore = $('#disease_more').val();
                            var dis_date = $('#disease_date').val();
                            var doc_id = $('#docid').val();
                            var healstart = $('#healstart').val();
                            var healend = $('#healend').val();
                            var detail = $('#detail').val();

                            $.ajax({
                                type: "post",
                                dataType: "json",
                                url: '../process/_heal.php',
                                data: {
                                    function: 'update',
                                    id: id,
                                    cowid: cowid,
                                    dis_id: dis_id,
                                    dismore: dismore,
                                    dis_date: dis_date,
                                    doc_id: doc_id,
                                    healstart: healstart,
                                    healend: healend,
                                    detail: detail,
                                },
                                success: function(result) {
                                    // if (result.status == 200) {
                                    //     toastr.success(
                                    //         result.message,
                                    //         '', {
                                    //             timeOut: 1000,
                                    //             fadeOut: 1000,
                                    //             onHidden: function() {
                                    //                 location.reload();
                                    //             }
                                    //         }
                                    //     );
                                    // } else {
                                    //     toastr.warning(
                                    //         result.message,
                                    //         '', {
                                    //             timeOut: 1000,
                                    //             fadeOut: 1000,
                                    //             onHidden: function() {
                                    //                 location.reload();
                                    //             }
                                    //         }
                                    //     );
                                    // }
                                } // end success update
                            }); // end ajax btnsave
                        }) // end btn save

                    } // end success
                }) //end ajax
            }); //end click edit

            // delete
            $(document).on('click', '.btnDel', function(e) {
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
                            url: '../process/_heal.php',
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
            }); // end btnDel
        })
    </script>
</body>

</html>
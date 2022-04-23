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
                                                        <select class="form-control select2" name="docid" id="docid" data-placeholder="เลือกสัตวแพทย์" required="required" title="กรุณาเลือก">

                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group row ">
                                                <div class=" input-group">
                                                    <label class=" col-form-label col-sm-3" for="healstart">วันที่เริ่มรักษา :</label>
                                                    <div class="col-md">
                                                        <input type="date" class="form-control" name="healstart" id="healstart" required title="ระบุวันที่เริ่มรักษา">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group row ">
                                                <div class=" input-group">
                                                    <label class=" col-form-label col-sm-3" for="healend">วันที่สิ้นสุดการรักษา :</label>
                                                    <div class="col-md">
                                                        <input type="date" class="form-control" name="healend" id="healend" required title="ระบุวันที่สิ้นสุดการรักษา">
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
                                        <h3 class="text-center"><i class="fa fa-virus"></i> โรค อาการป่วย / การรักษา</h3>
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
                                                        $data = new doctor();
                                                        $row = $data->select_docbyfarm($farmid);
                                                        while ($rs = $row->fetch_object()) {
                                                        ?>
                                                            <tr>
                                                                <td><?php echo $rs->id; ?></td>
                                                                <td></td>
                                                                <td></td>
                                                                <td></td>
                                                                <td></td>
                                                                <td></td>
                                                                <td></td>

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
                    farmid: '<?php echo $_SESSION['farm_id']; ?>',
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
                    farmid: '<?php echo $_SESSION['farm_id']; ?>',
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
        })
    </script>
</body>

</html>
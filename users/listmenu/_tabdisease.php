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
                            <div class="col-lg-5 col-md-12">
                                <div class="card card-info shadow">
                                    <div class="card-header">
                                        <h3 class="text-center"><i class="fa fa-shield-virus"></i> เพิ่มข้อมูลโรค/อาการป่วย</h3>
                                    </div>
                                    <form method="POST" id="frm_data">
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
                                                        <input type="text" class="form-control " name="disease_more" id="disease_more" placeholder="โรคอาการป่วย(ถ้าไม่มีให้เลือก)" required="required" title="กรุณาระบุ"></ร>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group row ">
                                                <div class=" input-group">
                                                    <label class=" col-form-label col-sm-3" for="disease_date">วันทีเริ่มแสดงอาการ :</label>
                                                    <div class="col-md">
                                                        <input type="date" class="form-control " name="disease_date" id="disease_date" placeholder="โรคอาการป่วย(ถ้าไม่มีให้เลือก)" required="required" title="กรุณาระบุ"></ร>
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
                                <div class="card card-green shadow">
                                    <div class="card-header">
                                        <h3 class="text-center"> <i class="fa fa-briefcase-medical"></i> การรักษา</h3>
                                    </div>
                                    <form method="POST" id="frm_data">
                                        <div class="card-body">
                                            <div class="form-group row ">
                                                <div class=" input-group">
                                                    <label class=" col-form-label" for="docname">ชื่อสัตวแพทย์ : </label>
                                                    <div class="col-md">
                                                        <input type="text" class="form-control" onkeypress="not_number(event)" name="docname" id="docname" placeholder="ชื่อ - นามสกุล" required="required" title="ชื่อ - นามสกุล">
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="form-group row ">
                                                <div class=" input-group">
                                                    <label class=" col-form-label" for="phone">เบอร์โทรศัพท์ :</label>
                                                    <div class="col-md">
                                                        <input type="tel" class="form-control" name="phone" id="phone" placeholder="123-456-7890" required="required" title="เบอร์โทร">
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
                            </div>

                            <div class="col-lg-7 col-md-12">
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
                                                            <th>ชื่อสัตวแพทย์</th>
                                                            <th>เบอร์โทรติดต่อ</th>
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
                                                                <td><?php echo $rs->name; ?></td>
                                                                <td><?php echo $rs->phone; ?></td>

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
    <script src="../../dist/js/phone.js"></script>
    <script src="../../dist/js/datatable.js"></script>
    <script src="../../dist/js/numlock.js"></script>
    <script>
        $(document).ready(function() {

            $.ajax({
                type: 'get',
                dataType: 'json',
                url: '../process/_disease.php',
                data: {
                    function: 'showcow',
                    farmid:'<?php echo $_SESSION['farm_id'];?>',
                },
                success: function(result) {
                    var data = '<option   selected disabled>---กรุณาเลือกโค--</option>';
                    for (i in result) {
                        data += '<option value="' + result[i].id + '">' + result[i].cowname + '</option>'
                    }
                    $('#cowid').html(data);
                }
            });
            $.ajax({
                type: 'get',
                dataType: 'json',
                url: '../process/_disease.php',
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
        })
    </script>
</body>

</html>
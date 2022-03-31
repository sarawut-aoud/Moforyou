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
                                    <button class="btn btn-info col-3 btn-lg float-start"" ><i class=" fas fa-qrcode"></i></button>
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
                                                            <a class="btn btn-info btnEdit" title="แก้ไขข้อมูล" id="<?php echo $rs->id; ?>">
                                                                <i class="far fa-pen-alt"></i>
                                                            </a>
                                                            <a class="btn btn-danger btnDels" title="ลบข้อมูล" id="<?php echo $rs->id; ?>">
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
        <script src="../../dist/js/datatable.js"></script>
        <script>
            //edit
            // . = class
            // # = id 
            $(document).on('click', '.submit', function(e) {
                e.preventDefault();
                var house_id = $('#HouseName').val();
                var id = '<?php echo $_SESSION['id'];?>';
                $.ajax({
                    type: 'post',
                    dataType: "json",
                    url: '../process/inserthouse.php',
                    data: {
                        id:id,
                        housename: house_id,

                    },
                    success: function(result) {

                    }
                });
                

            });
            $(document).on('click', '.btnEdits', function(e) {
                // $(document).on('click', '.btnEdits', function(e) {
                e.preventDefault();

                var id = $(this).attr('id');
                var txt_head = 'Edit farm'


                $.ajax({
                    type: 'get', //post put get delete
                    dataType: "json",
                    url: '../process/_farm.php', //ทำงานที่ไฟล์อะไร
                    data: { // ส่งค่าอะไรไปบ้าง
                        id: id,
                        function: 'showeditFarm',
                    },
                    success: function(rs) {
                        for (i in rs) {
                            if (rs[i].id == id) {
                                var farmname = rs[i].farmname;
                                var farmername = rs[i].farmername;
                            }
                        }
                        $("#modalEditFarm").modal("show");
                        $("#modaltextcenter").html(txt_head)
                        $("#farmname").val(farmname);
                        $("#name").val(farmername);

                        $('#modal_herdid').val(rs.id);



                    }
                })

            });
            // modal //
            $(document).on('click', '.btnsave', function(e) {
                // $(document).on('click', '.btnEdits', function(e) {
                e.preventDefault();

                var id = $("#modal_herdid").val();
                var fname = $("#herdname").val();
                var IDHouse = $("#house_id").val();


                var txt_head = 'Edit Herd'

                $.ajax({
                    type: 'get', //post put get delete
                    dataType: "json",
                    url: '', //ทำงานที่ไฟล์อะไร
                    data: { // ส่งค่าอะไรไปบ้าง
                        hname: fname,
                        IDHouse: IDHouse,
                        id: id,
                        function: 'modaleditherd',
                    },
                    success: function(result) {
                        if (result.status != 200) {
                            const Toast = Swal.mixin({
                                toast: true,
                                position: 'top-end',
                                showConfirmButton: false,
                                timer: 1500,
                            })
                            Toast.fire({
                                    icon: 'warning',
                                    title: result.message

                                })
                                .then((result) => {
                                    $("#modalEdit").modal("hide");
                                    location.reload();

                                })
                        } else {
                            const Toast = Swal.mixin({
                                toast: true,
                                position: 'top-end',
                                showConfirmButton: false,
                                timer: 1500,
                            })
                            Toast.fire({
                                icon: 'success',
                                title: result.message

                            }).then((result) => {
                                $("#modalEditherd").modal("hide");
                                location.reload();
                                // $('#frmModalEdit')[0].reset();
                                // $('#title').focus();
                            })
                        }

                    }
                })

            });

            // delete
            $(document).on('click', '.btnDels', function(e) {
                e.preventDefault();


                var id = $(this).attr('id');

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
                            dataType: 'JSON',
                            type: "get",
                            url: "../process/_farm.php",
                            data: {
                                id: id,

                                function: 'delsfarm',
                            },
                            success: function(result) {
                                Swal.fire({
                                    icon: 'success',
                                    title: result.message,
                                }).then((result) => {
                                    location.reload();
                                })
                            },
                        });
                    }
                })



            });
        </script>
    </body>


    </html>
<?php } ?>
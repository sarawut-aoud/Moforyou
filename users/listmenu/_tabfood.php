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
                                        <h3 class="text-center"> <i class="fa fa-plus-circle"></i> เพิ่มรายการอาหาร</h3>
                                    </div>
                                    <!-- /.card-header -->
                                    <!-- --------------------Information -------------------------------------- -->
                                    <!-- form start -->
                                    <form method="POST" id="frm_data">
                                        <div class="card-body ">
                                            <div class="form-group row ">
                                                <div class=" input-group">
                                                    <label class=" col-form-label" for="foodname">รายการอาหาร: </label>
                                                    <div class="col-md">
                                                        <input type="text" class="form-control" onkeypress="not_number(event)" name="foodname" id="foodname" placeholder="รายการอาหาร" required="required" title="รายการอาหาร">
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
                                        <h3 class="text-center"> <i class="fa fa-wheat"></i> รายการอาหาร</h3>
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
                                                            <th>รายการอาหาร</th>
                                                            <th>แก้ไข / ลบข้อมูล</th>
                                                        </tr>
                                                    </thead>
                                                    <!-- /.head table -->
                                                    <!-- body table -->
                                                    <tbody>
                                                        <?php
                                                        $data = new food();
                                                        $row = $data->select_food2($farmid);
                                                        $i = 1;
                                                        while ($rs = $row->fetch_object()) {
                                                        ?>
                                                            <tr>
                                                                <td><?php echo $i; ?></td>
                                                                <td><?php echo $rs->name; ?></td>


                                                                <td class="text-center">
                                                                    <a class="btn btn-info btnEdit" id="<?php echo $rs->id; ?>">
                                                                        <i class="fa fa-pen-alt"></i>
                                                                    </a>
                                                                    <a class="btn btn-danger btnDels" id="<?php echo $rs->id; ?>">
                                                                        <i class="fa fa-trash"></i>
                                                                    </a>
                                                                </td>
                                                            </tr>
                                                        <?php
                                                            $i++;
                                                        } ?>
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
            // btn reset
            $(document).on('click', '.reset', function(e) {
                e.preventDefault();
                $('#btn').removeClass();
                $('#btn').html('ยืนยันการเพิ่มข้อมูล');
                $('#btn').addClass('btn btn-info submit');
                $('#frm_data')[0].reset();

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


            $(document).on('click', '.submit', function(e) {
                e.preventDefault();
                var name = $('#foodname').val();

                $.ajax({
                    type: "post",
                    dataType: "json",
                    url: '../process/_food.php',
                    data: {
                        function: "insert",

                        name: name,
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
                    url: '../process/_food.php',
                    data: {
                        function: "show",
                        id: id,
                    },
                    success: function(result) {
                        $('#foodname').val(result.name);


                        var foodid = result.id;


                        /// update ข้อมูล
                        $(document).on('click', '.btnsave', function(e) {
                            e.preventDefault();
                            var name = $('#foodname').val();

                            $.ajax({
                                type: "post",
                                dataType: "json",
                                url: '../process/_food.php',
                                data: {
                                    function: "edit",
                                    name: name,

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
                            url: '../process/_food.php',
                            data: {
                                function: 'delete',
                                //foodid ของหน้าprosess id อยู่ตรงหน้านี้ คือ var id
                                foodid: id,
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
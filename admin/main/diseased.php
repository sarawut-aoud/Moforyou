<?php
require_once '../../connect/session_ckeck.php';
require '../../connect/functions.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta http-equiv="Content-Type" content="text/html; charset=windows-874">
    <meta http-equiv="Content-Type" content="text/html; charset=tis-620">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Admin|Dashboard</title>
    <?php
    include '../../build/script.php';
    ?>
</head>

</script>

<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">


        <?php
        // Navbar Admin
        require '../sub/navbar.php';
        // Aside Admin
        require '../sub/aside.php';
        // Manage Pages Admin
        require '../sub/side_manage.php';
        // Reports Admin   
        require '../sub/side_reports.php';
        ?>

        </ul>

        <!-- /.sidebar-menu -->
        <!-- /.sidebar -->
        </aside>

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1>ManagePages โรคและอาการป่วย</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="./admin_index.php">Home</a></li>
                                <li class="breadcrumb-item active">Diseased</li>
                            </ol>
                        </div>
                    </div>
                </div><!-- /.container-fluid -->
            </section>
            <!-- /.content-header -->

            <!-- Main content -->
            <section class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-5">
                            <form id="frm_data">
                                <div class="card card-primary shadow">
                                    <div class="card-header  ">
                                        <h3 id="head" class="text-center">เพิ่มข้อมูลโรคหรืออาการป่วย</h3>
                                    </div>
                                    <div class="card-body ">



                                        <div class="from-group row">
                                            <div class="input-group">
                                                <label class="col-from-label" for="name">
                                                    ชื่อโรคหรืออาการป่วยโค :
                                                </label>
                                                <div class="col-md">
                                                    <input type="text" class=" form-control" onkeypress="not_number(event)" id="name" placeholder="ชื่อโรคหรืออาการป่วย" title="ชื่อโรคหรืออาการป่วย" required>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-footer text-end">
                                        <button type="reset" class="btn  btn-secondary reset">ยกเลิก</button>
                                        <button type="submit" id="btn" title="ตกลง" class="btn btn-primary submit">ยืนยันการเพิ่มข้อมูล</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="col-7">

                            <div class="card card-warning shadow">
                                <div class="card-header ">
                                    <h3 class="text-center">โรคและอาการป่วย</h3>
                                </div>
                                <!-- /.card-header -->
                                <div class="card-body">
                                    <!-- table -->
                                    <table id="example1" class="table table-bordered table-striped table-hover">
                                        <!-- head table -->
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>โรค/อาการป่วย</th>
                                                <th>Edit&Delete</th>
                                            </tr>
                                        </thead>
                                        <!-- /.head table -->
                                        <!-- body table -->
                                        <tbody>
                                            <?php
                                            $sql = new disease();
                                            $query = $sql->select_disease('');
                                            while ($rs = $query->fetch_object()) { ?>
                                                <tr>
                                                    <td><?php echo $rs->id; ?></td>
                                                    <td><?php echo $rs->detail; ?></td>
                                                    <td>
                                                        <center>
                                                            <a class="btn btn-info btnEdit" title="แก้ไขข้อมูล" id="<?php echo $rs->id; ?>">
                                                                <i class="fas fa-pencil-alt"></i>

                                                            </a>
                                                            <a class="btn btn-danger btnDels" title="ลบข้อมูล" id="<?php echo $rs->id; ?>">
                                                                <i class="fas fa-trash-alt"></i>
                                                            </a>
                                                        </center>
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
                        <!-- /.col -->
                    </div>
                    <!-- /.row -->
                </div>
                <!-- /.container-fluid -->
            </section>
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->
        <?php require '../sub/fooster.php'; ?>

    </div>
    <!-- ./wrapper -->
    <script src="../../dist/js/datatable.js"></script>
    <script src="../../dist/js/numlock.js"></script>
    <script>
        $(document).ready(function() {
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
            $(document).on('click', '.reset', function(e) {
                e.preventDefault();
                $('#btn').removeClass();
                $('#btn').html('ยืนยันการเพิ่มข้อมูล')
                $('#head').html('เพิ่มข้อมูลโรคหรืออาการป่วย');;
                $('#btn').addClass('btn btn-primary submit');
                $('#frm_data')[0].reset();

            })
            // insert
            $(document).on('click', '.submit', function(e) {
                e.preventDefault();
                var detail = $('#name').val();
                $.ajax({
                    type: "post",
                    dataType: 'json',
                    url: "../process/_disease.php",
                    data: {
                        function: 'insert',
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
                })
            })
            // update
            $(document).on('click', '.btnEdit', function(e) {
                e.preventDefault();
                $('#btn').removeClass();
                $('#btn').html('ยืนยันการแก้ไข');
                $('#head').html('แก้ไขข้อมูลโรคหรืออาการป่วย');
                $('#btn').addClass('btn btn-warning btnsave');

                var id = $(this).attr('id');

                $.ajax({
                    type: "get",
                    dataType: "json",
                    url: '../process/_disease.php',
                    data: {
                        function: "showdata",
                        id: id,
                    },
                    success: function(result) {
                        $('#name').val(result.detail);
                        var id = result.id;

                        /// update ข้อมูล
                        $(document).on('click', '.btnsave', function(e) {
                            e.preventDefault();
                            var detail = $('#name').val();

                            $.ajax({
                                type: "post",
                                dataType: "json",
                                url: '../process/_disease.php',
                                data: {
                                    function: "update",
                                    id: id,
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
                            }) // end ajax update


                        })
                    }
                }) // end ajax showdata

            })
            //delete
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
                            url: '../process/_disease.php',
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
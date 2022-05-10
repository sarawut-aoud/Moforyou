<?php
require_once '../../connect/session_ckeck.php';
require '../../connect/functions.php';

$sql = new farmer();
$query = $sql->select_allfarmer('');

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">

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
                            <h1>ManagePages เจ้าของฟาร์ม</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="./admin_index.php">Home</a></li>
                                <li class="breadcrumb-item active">Farmer</li>
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
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header card-outline card-blue">
                                    <h3 class="text-center">เจ้าของฟาร์ม Farmer</h3>
                                </div>
                                <!-- /.card-header -->
                                <div class="card-body">
                                    <!-- table -->
                                    <table id="example1" class="table table-bordered table-striped table-hover">
                                        <!-- head table -->
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>ชื่อเจ้าของฟาร์ม</th>
                                                <th>เบอร์โทร</th>
                                                <th>อีเมล</th>
                                                <th>บัตรประชาชน</th>
                                                <th>Edit&Delete</th>
                                            </tr>
                                        </thead>
                                        <!-- /.head table -->
                                        <!-- body table -->
                                        <tbody>
                                            <?php $i = 1;
                                            while ($row = $query->fetch_object()) { ?>
                                                <tr>
                                                    <td style="width: 10%;"><?php echo $i; ?></td>
                                                    <td><?php echo $row->fullname; ?></td>
                                                    <td><?php echo $row->phone; ?></td>
                                                    <td><?php echo $row->email; ?></td>
                                                    <td><?php echo substr($row->card, 0, 7) . "******"; ?></td>
                                                    <td>
                                                        <center>
                                                            <!-- <a class="btn btn-info edit_data" href="../modal/md_spec?id=<?php echo $_SESSION["id"] ?>"> -->
                                                            <a class="btn btn-info  btnEdits" title="แก้ไขข้อมูล" id="<?php echo $row->id; ?>">
                                                                <i class="fas fa-pencil-alt"></i>
                                                            </a>
                                                            <a class="btn btn-danger btnDels" id="<?php echo $row->id; ?>">
                                                                <i class="fas fa-trash-alt" title="ลบข้อมูล"></i>
                                                            </a>
                                                        </center>
                                                    </td>

                                                </tr>
                                            <?php $i++;
                                            } ?>
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
            <?php require_once '../modalEdit.php'; ?>
        </div>
        <!-- /.content-wrapper -->
        <?php require '../sub/fooster.php'; ?>

    </div>
    <!-- ./wrapper -->

</body>
<script src="../../dist/js/datatable.js"></script>
<script>
    //edit
    // . = class
    // # = id 
    $(document).on('click', '.btnEdits', function(e) {
        // $(document).on('click', '.btnEdits', function(e) {
        e.preventDefault();

        var id = $(this).attr('id');
        var txt_head = 'Edit Farmer'

        $.ajax({
            type: 'get', //post put get delete
            dataType: "json",
            url: '../process/_farmer.php', //ทำงานที่ไฟล์อะไร
            data: { // ส่งค่าอะไรไปบ้าง
                id: id,
                function: 'showeditfarmer',
            },
            success: function(rs) {
                function UnicodeDecodeB64(str) {
                    return decodeURIComponent(atob(str));
                };
                $("#modalEdit").modal("show");
                $("#modaltextcenter").html(txt_head)
                $("#modalfullname").val(rs.fullname);
                $("#modalphone").val(rs.phone);
                $("#modalemail").val(rs.email);
                $('#modal_fid').val(rs.id);
                var personid = UnicodeDecodeB64(UnicodeDecodeB64(rs.person_id));

                $("#modalpersonid").val((personid.toString()).substr(0, 7) + "******");

            }
        })

    });
    // modal //
    $(document).on('click', '.btnsave', function(e) {
        // $(document).on('click', '.btnEdits', function(e) {
        e.preventDefault();

        var id = $("#modal_fid").val();
        var fname = $("#modalfullname").val();
        var email = $("#modalemail").val();
        var phone = $("#modalphone").val();

        var txt_head = 'Edit Farmer'

        $.ajax({
            type: 'get', //post put get delete
            dataType: "json",
            url: '../process/_farmer.php', //ทำงานที่ไฟล์อะไร
            data: { // ส่งค่าอะไรไปบ้าง
                fname: fname,
                email: email,
                phone: phone,
                id: id,
                function: 'editfarmer',
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
                        $("#modalEdit").modal("hide");
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
                    url: "../process/_farmer.php",
                    data: {
                        id: id,
                        function: 'delsfarmer',
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

</html>
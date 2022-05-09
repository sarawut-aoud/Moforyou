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

<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">
        <div class="preloader flex-column justify-content-center align-items-center">
            <img class="animation__shake" src="../../dist/img/loading.gif" alt="RELOAD">
        </div>
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
                            <h1>ManagePages ฟาร์ม</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="./admin_index.php">Home</a></li>
                                <li class="breadcrumb-item active">Farm</li>
                            </ol>
                        </div>
                    </div>
                </div><!-- /.container-fluid -->
            </section>
            <!-- /.content-header -->

            <!-- Main Content -->
            <section class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header card-outline card-blue ">
                                    <h3 class="text-center">ฟาร์ม</h3>
                                </div>
                                <!-- /.card-header -->
                                <div class="card-body">
                                    <!-- table -->
                                    <table id="example1" class="table table-bordered table-striped table-hover">
                                        <!-- head table -->
                                        <thead>

                                            <tr>
                                                <th>#</th>
                                                <th>ฟาร์ม</th>
                                                <th>อำเภอ</th>
                                                <th>จังหวัด</th>
                                                <th>เจ้าของฟาร์ม</th>
                                                <th>Edit</th>
                                            </tr>
                                        </thead>
                                        <!-- /.head table -->
                                        <!-- body table -->
                                        <tbody>
                                            <?php
                                            $sql = new farm();
                                            $query = $sql->selectfarm('admin');
                                            while ($row = $query->fetch_object()) {

                                            ?>
                                                <tr>
                                                    <td><?php echo $row->id ?></td>
                                                    <td><?php echo $row->farmname ?></td>
                                                    <td><?php @$get_tombon = file_get_contents('https://raw.githubusercontent.com/sarawut-pcru/Thailand_Map/main/json/tombon.json');
                                                        $tombon = json_decode($get_tombon);
                                                        foreach ($tombon as $value) {
                                                            if ($row->district_id == $value->id) { //? check id amphur
                                                                echo  $value->name_th;
                                                            }
                                                        }; ?></td>
                                                    <td><?php echo $row->farmname ?></td>
                                                    <td><?php echo $row->fullname ?></td>
                                                    <td>
                                                        <center>
                                                            <a class="btn btn-info btnEdits" title="แก้ไขข้อมูล" id="<?php echo $row->id ?>">
                                                                <i class="fas fa-pencil-alt"></i>
                                                            </a>
                                                            <a class="btn btn-danger btnDels" title="ลบข้อมูล" id="<?php echo $row->id ?>">
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
    <?php require_once '../modalEdit.php'; ?>
</body>
<script src="../../dist/js/datatable.js"></script>

<script>
    $(document).ready(function() {
        //edit
        // . = class
        // # = id 
        $(document).on('click', '.btnEdits', function(e) {
            // $(document).on('click', '.btnEdits', function(e) {
            e.preventDefault();

            var id = $(this).attr('id');
            var txt_head = 'Edit farm';


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
                            var district = rs[i].amphuer_id;
                        }
                    }
                    console.log(district);
                    $("#modalEditFarm").modal("show");
                    $("#modaltextcenterfarm").html(txt_head)
                    $("#farmname").val(farmname);
                    $("#name").val(farmername);
                    $('#modal_herdid').val(rs.id);

                    $.ajax({
                        type: 'get', //post put get delete
                        dataType: "json",
                        url: '../process/_farm.php', //ทำงานที่ไฟล์อะไร
                        data: { // ส่งค่าอะไรไปบ้าง
                            id: '',
                            function: 'amphuer',
                        },
                        success: function(results) {
                            var data = '';
                            for (i in results) {

                                if (results[i].amp_id == district) {
                                    data += '<option value="' + results[i].amp_id + '" selected >' + results[i].name_th + '</option>';
                                } else {
                                    data += '<option value="' + results[i].amp_id + '">' + results[i].name_th + '</option>';

                                }
                            }
                            $("#modalampher_id").html(data);

                        }

                    })


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
                            if (result.status == 200) {
                                Swal.fire({
                                    icon: 'success',
                                    title: result.message,
                                }).then((result) => {
                                    location.reload();
                                })
                            } else {
                                Swal.fire({
                                    icon: 'info',
                                    title: result.message,
                                }).then((result) => {
                                    location.reload();
                                })
                            }

                        },
                    });
                }
            })



        });
    })
</script>

</html>
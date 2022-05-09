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
                            <h1>ManagePages โคเนื้อ</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="./admin_index.php">Home</a></li>
                                <li class="breadcrumb-item active">Cow</li>
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
                                <div class="card-header card-outline card-blue">
                                    <h3 class="text-center">โคเนื้อ</h3>
                                </div>
                                <!-- /.card-header -->
                                <div class="card-body">
                                    <!-- table -->
                                    <table id="example1" class="table table-bordered table-striped table-hover">
                                        <!-- head table -->
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>#</th>
                                                <th>ชื่อโค</th>
                                                <th>ส่วนสูง</th>
                                                <th>น้ำหนัก</th>
                                                <th>เพศ</th>
                                                <th>โรงเรือน</th>
                                                <th>ฝูง</th>
                                                <th>ฟาร์ม</th>

                                                <th>แก้ไข/ลบ</th>
                                            </tr>
                                        </thead>
                                        <!-- /.head table -->
                                        <!-- body table -->
                                        <tbody>
                                            <?php
                                            $datahouse = new cow();
                                            $row = $datahouse->selectdatacowbyfarmer('');
                                            while ($rs = $row->fetch_object()) {
                                                if ($rs->cow_pic != NULL) {
                                                    $img =   "src='../../dist/img/cow_upload/" . $rs->cow_pic . "'";
                                                } else {
                                                    $img =   "src='../../dist/img/icon/sacred-cow.png'";
                                                }

                                            ?>
                                                <tr>
                                                    <td><?php echo $rs->id; ?></td>
                                                    <td style="width:10%" class="text-center"><img <?php echo $img; ?> class="rounded w-100"></td>
                                                    <td><?php echo $rs->cow_name; ?></td>
                                                    <td><?php echo $rs->high; ?></td>
                                                    <td><?php echo $rs->weight; ?></td>
                                                    <td><?php echo $rs->gender; ?></td>
                                                    <td><?php echo $rs->house_name; ?></td>
                                                    <td><?php echo $rs->herd_name; ?></td>
                                                    <td><?php echo $rs->farmname; ?></td>

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
        <?php
        require '../modalcow.php';
        require '../sub/fooster.php';
        ?>

    </div>
    <!-- ./wrapper -->

</body>
<script src="../../dist/js/datatable.js"></script>
<script>
    $(document).ready(function() {

        $(document).on('click', '.btnEdit', function(e) {
            e.preventDefault();
            var cowid = $(this).attr('id');
            $('#modalEdit').modal('show');
            $('#modaltextcenter').html('แก้ไขข้อมูลโคเนื้อ');
        })

        var farm_id = '<?php echo $_SESSION['farm_id']; ?>';




        $(document).on('click', '.btnDels', function(e) {
            e.preventDefault();
            var cowid = $(this).attr('id');
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
                        url: "../process/_cow.php",
                        data: {
                            id: id,
                            function: 'del',
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
                                    icon: 'warning',
                                    title: result.message,
                                }).then((result) => {
                                    location.reload();
                                })
                            }

                        },
                    });
                }
            })
        })


        $.ajax({
            type: 'get',
            dataType: 'json',
            url: '../process/_cow.php',
            data: {
                id: '',
                function: "getdataspecies",
            },
            success: function(result) {
                var data = '<option value="" selected disabled>--เลือกสายพันธุ์--</option>';
                for (i in result) {
                    data += '<option value="' + result[i].spec_id + '" > ' + result[i].spec_name + '</option>';
                }
                $('#species_id').html(data);
            }
        });
        $(document).on('click', '.btnEdit', function(e) {
            e.preventDefault();
            var id = $(this).attr('id');
            var txt = 'แก้ไขข้อมูลโค';
            $.ajax({
                type: 'get',
                dataType: 'json',
                url: '../process/_cow.php',
                data: {
                    function: 'showdata',
                    id: id,
                },
                success: function(result) {
                    $('#modalEdit').modal('show');
                    $('#modaltextcenter').html(txt);
                    $('#modalnamecow').val(result.cowname);
                    $('#modal_cowdate').val(result.cow_date);
                    $('#modalweightcow').val(result.weight);
                    $('#modalhighcow').val(result.high);
                    // $('#modalfathercow').val(result.cow_father);
                    // $('#modalmothercow').val(result.cow_mother);
                    $('#modal_cowid').val(result.cow_id);
                    if (result.cow_pic != null) {

                        $('#modalimg').attr('src', "../../dist/img/cow_upload/" + result.cow_pic + "");

                    } else {

                        $('#modalimg').attr('src', "../../dist/img/icon/sacred-cow.png");

                    }
                    if (result.cow_gender == '1') {
                        $('#modalradioPrimary1').prop('checked', true);
                    } else if (result.cow_gender == '2') {
                        $('#modalradioPrimary2').prop('checked', true);
                    } else {
                        $('#modalradioPrimary1').prop('checked', false);
                        $('#modalradioPrimary2').prop('checked', false);
                    }
                    $('#modalhouse_id2').val(result.spec_id);
                    $('#modalherd_id2').val(result.house_id);
                    $.ajax({
                        type: 'get',
                        dataType: 'json',
                        url: '../process/_cow.php',
                        data: {
                            id: '',
                            function: "getdataspecies",
                        },
                        success: function(results) {
                            var data = '';
                            for (i in results) {
                                if (results[i].spec_id == result.spec_id) {
                                    data += '<option value="' + results[i].spec_id + '" selected > ' + results[i].spec_name + ' </option>';

                                } else {
                                    data += '<option value="' + results[i].spec_id + '" > ' + results[i].spec_name + '</option>';
                                }
                            }
                            $('#modalspecies_id').html(data);
                        }
                    });

                    $.ajax({
                        type: 'get',
                        dataType: 'json',
                        url: '../process/_cow.php',
                        data: {
                            id: farm_id,
                            function: "getdatahouse",
                        },
                        success: function(results) {
                            var data = '';
                            for (i in results) {
                                if (results[i].house_id == result.house_id) {
                                    data += '<option value="' + results[i].house_id + '" selected > ' + results[i].housename + '</option>';

                                } else {
                                    data += '<option value="' + results[i].house_id + '" > ' + results[i].housename + '</option>';

                                }
                            }
                            $('#modalhouse_id').html(data);


                            var house_id = $('#modalhouse_id').val();
                            $.ajax({
                                type: 'get',
                                dataType: 'json',
                                url: '../process/_cow.php',
                                data: {
                                    id: house_id,
                                    function: "getdataherd",
                                },
                                success: function(results) {
                                    var data = '';
                                    for (i in results) {
                                        if (results[i].herd_id == result.herd_id) {
                                            data += '<option value="' + results[i].herd_id + '"selected > ' + results[i].herdname + '</option>';

                                        } else {
                                            data += '<option value="' + results[i].herd_id + '" > ' + results[i].herdname + '</option>';
                                        }
                                    }
                                    $('#modalherd_id').html(data);

                                }
                            });


                            $('#modalhouse_id').change(function() {
                                var house_id = $('#modalhouse_id').val();
                                $.ajax({
                                    type: 'get',
                                    dataType: 'json',
                                    url: '../process/_cow.php',
                                    data: {
                                        id: house_id,
                                        function: "getdataherd",
                                    },
                                    success: function(result) {
                                        var data = '<option value="" selected disabled>--เลือกโรงเรือน--</option>';
                                        for (i in result) {
                                            data += '<option value="' + result[i].herd_id + '" > ' + result[i].herdname + '</option>';
                                        }
                                        $('#modalherd_id').html(data);

                                    }
                                });

                            });
                        }
                    });


                }
            })
        })


    });
</script>

</html>
<?php
require_once '../../connect/toastr.php';
require_once '../../connect/resize.php';
$sql = new cow();
if (isset($_POST['btnsave'])) {
    if (empty($_POST['modalspecies_id'])) {
        echo '<script>
                $(document).ready(function(){
                    $("#modalspecies_id").focus();
                })
             </script>';
        echo warning_toast('กรุณาเลือกสายพันธ์ุ ');
    } else {
        $idcow = $_POST['modal_cowid'];
        $namecow =  $_POST['modalnamecow'];
        $cowdate =  $_POST['modal_cowdate'];
        $species_id =  $_POST['modalspecies_id'];
        $weightcow =  $_POST['modalweightcow'];
        $highcow =  $_POST['modalhighcow'];
        // $fathercow =  $_POST['modalfathercow'];
        // $mothercow =  $_POST['modalmothercow'];
        $house_id =  $_POST['modalhouse_id2'];
        $herd_id =  $_POST['modalherd_id2'];
        $gender =  $_POST['gender'];
        $picture = $_FILES['file']['tmp_name'];
        //? function ลดขนาดรูปภาพ
        function imageResize($imageResourceId, $width, $height)
        {
            $targetWidth = $width < 1280 ? $width : 1280;
            $targetHeight = ($height / $width) * $targetWidth;
            $targetLayer = imagecreatetruecolor($targetWidth, $targetHeight);
            imagecopyresampled($targetLayer, $imageResourceId, 0, 0, 0, 0, $targetWidth, $targetHeight, $width, $height);
            return $targetLayer;
        }
        if (empty($namecow) || empty($cowdate)  || empty($weightcow) || empty($highcow)  || empty($gender)) {

            echo warning_toast('โปรดระบุข้อมูลบางส่วนให้ครบ');
        } else {
            if (!empty($picture)) {
                $time = date('Ymdhis');
                $sourceProperties = getimagesize($picture);
                $fileNewName = $time;
                $folderPath = "../../dist/img/cow_img/";
                $ext = $_FILES['file']['name'];
                $imageType = $sourceProperties[2];
                echo resize($picture, $imageType, $folderPath, $fileNewName, $ext, $sourceProperties);
                copy($picture, "../../dist/img/cow_upload/" . $ext);

                $query = $sql->update_cow($namecow, $cowdate, $highcow, $weightcow,  $species_id, $herd_id, $house_id, $gender, $ext, $idcow);
                echo success_toasts("แก้ไขข้อมูลโคสำเร็จ", "./cow.php");
            } else {
                $query = $sql->update_cow($namecow, $cowdate, $highcow, $weightcow,  $species_id, $herd_id, $house_id, $gender, '', $idcow);
                echo success_toasts("แก้ไขข้อมูลโคสำเร็จ", "./cow.php");
            } // check picture
        } // check Undendifind values
    } // check select spec_id / house_id / herd_id
} // isset btnsave
?>
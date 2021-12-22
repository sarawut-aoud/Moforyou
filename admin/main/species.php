<?php
require_once '../../connect/session_ckeck.php';
require '../../connect/functions.php';

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
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
                            <h1>ManagePages สายพันธุ์</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="./admin_index">Home</a></li>
                                <li class="breadcrumb-item active">Specise</li>
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
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="card card-primary">
                                        <div class="card-header">
                                            <h3 class="card-title">เพิ่มข้อมูลสายพันธุ์</h3>
                                        </div>
                                        <!-- /.card-header -->
                                        <!-- form start -->
                                        <form  method="post">
                                            <div class="card-body">
                                                <div class="form-group ">
                                                    <label for="Picturespecise">ภาพ</label>
                                                    <input type="url" class="form-control" id="specpic" name="specpic">
                                                </div>
                                                <div class="form-group">
                                                    <label for="Namespecise">ชื่อสายพันธุ์</label>
                                                    <input type="text" class="form-control" id="specname" name="specname" placeholder="ชื่อสายพันธุ์">
                                                </div>
                                                <div class="form-group">
                                                    <label for="Specisedetail">รายละเอียด</label>
                                                    <textarea type="text" class="form-control" id="specdetail" name="specdetail"></textarea>
                                                </div>
                                            </div>
                                            <!-- /.card-body -->
                                            <div class="card-footer text-right">
                                                <button type="submit" id="submit" name="submit" class="btn btn-primary">Submit</button>
                                                <button type="reset" class="btn btn-warning">Reset</button>
                                            </div>
                                        </form>
                                        <!-- /.form end -->
                                    </div>
                                    <!-- /.card -->
                                </div>
                                <div class="col-md-6">
                                <div class="card card-warning">
                                    <div class="card-header">
                                        <h3 class="card-title">แก้ไขข้อมูลสายพันธุ์</h3>
                                    </div>
                                    <!-- /.card-header -->
                                    <!-- form start -->
                                    <form method="post">
                                        <div class="card-body">
                                            
                                            <div class="form-group ">
                                                <label for="Picturespecise">ภาพ</label>
                                                <input type="file" class="form-control" id="specpic" name="specpic">
                                            </div>
                                            <div class="form-group">
                                                <label for="Namespecise">ชื่อสายพันธุ์</label>
                                                <input type="text" class="form-control" id="specname" name="specname" placeholder="ชื่อสายพันธุ์">
                                            </div>
                                            <div class="form-group">
                                                <label for="Specisedetail">รายละเอียด</label>
                                                <textarea type="text" class="form-control" id="specdetail" name="specdetail"></textarea>
                                            </div>
                                        </div>
                                        <!-- /.card-body -->
                                        <div class="card-footer text-right">
                                            <button type="submit_edit" id="submit_edit" name="submit_edit" class="btn btn-success">Submit</button>
                                        </div>
                                    </form>
                                    <!-- /.form end -->
                                </div>
                                <!-- /.card -->
                            </div>


                            <div class="card">
                                <div class="card-header card-outline card-blue">
                                    <h3 class="text-center">สายพันธุ์</h3>
                                </div>
                                <!-- /.card-header -->
                                <div class="card-body">
                                    <!-- table -->
                                    <table id="example1" class="table table-bordered table-striped table-hover">
                                        <!-- head table -->
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>สายพันธุ์</th>
                                                <th>รายละเอียด</th>
                                                <th>Edit&Delete</th>
                                            </tr>
                                        </thead>
                                        <!-- /.head table -->
                                        <!-- body table -->
                                        <tbody>
                                            <?php
                                            $sel_data = new specise();
                                            $result = $sel_data->selspec();


                                            while ($row = mysqli_fetch_object($result)) {


                                            ?>
                                                <tr>
                                                    <td style="width: 15%;" align="center">
                                                        <img src="<?php echo $row->spec_pic; ?>" class="rounded w-100"  alt="image">
                                                    </td>
                                                    <td style="width: 15%;"><?php echo $row->spec_name; ?></td>
                                                    <td><?php echo $row->spec_detail; ?>
                                                    </td>
                                                    <td style="width: 15%;">
                                                        <center>
                                                            <a class="btn btn-info" data-toggle="modal" data-target="#md-spec">
                                                                <i class="fas fa-pencil-alt"></i>
                                                            </a>
                                                            <?php require '../modal/md_spec.php'; ?>
                                                            <a class="btn btn-danger" onclick="del(<?php echo $row->id; ?>)">
                                                                <i class=" fas fa-trash-alt"></i>
                                                                <!-- href="../delete/delete_species?del=<?php echo $row->id; ?> -->
                                                            </a>
                                                        </center>

                                                    </td>

                                                </tr>
                                            <?php } ?>
                                        </tbody>
                                        <!-- /.body table -->
                                        <!-- foot table -->
                                        <tfoot>
                                            <tr>
                                                <th>#</th>
                                                <th>สายพันธุ์</th>
                                                <th>รายละเอียด</th>
                                                <th>Edit&Delete</th>
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

</body>
<script>
    $(function() {
        $("#example1").DataTable({
            "responsive": true,
            "lengthChange": false,
            "autoWidth": false,
            "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
        }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
        $('#example2').DataTable({
            "paging": true,
            "lengthChange": false,
            "searching": false,
            "ordering": true,
            "info": true,
            "autoWidth": false,
            "responsive": true,
        });
    });

    function del(id) {
        Swal.fire({
            title: 'Are you sure?',
            text: "You want to delete ",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
            if (result.isConfirmed) {
                window.location = "../delete/delete_species?del=" + id;
            }
        })
    };
</script>

</html>
<?php


require '../../connect/alert.php';

$specdata = new specise();
if (isset($_POST['submit'])) {
    $specname = $_POST['specname'];
    $specdetail = $_POST['specdetail'];
    $specpic = $_POST['specpic'];
    // $fileupload = $_FILES['photo']['tmp_name'];
    // $fileupload_name = uniqid() . $_FILES['photo']['name'];

    $sql = $specdata->addspec($specname, $specdetail, $specpic);

    if ($sql) {
        echo success_1("เพิ่มข้อมูลสำเร็จ", "./species"); // "แสดงอะไร","ส่งไปหน้าไหน"

    } else {
        warning('โปรดลองอีกครั้ง');
    }
}


// $fileupload = $_FILES['photo']['tmp_name'];
// $fileupload_name = uniqid().$_FILES['photo']['name'];
// if($std_name && $std_address && $std_tel){
// 	$sql = "SELECT * FROM student WHERE std_name = '$std_name'";
// 	$result = mysql_query($sql,$conn);
// 	$total = mysql_fetch_array($result);

// 	if($total == 0){
// 		if($fileupload != ""){
// 			if(!is_dir("./picture")){
// 				mkdir("./picture");
// 			}
// 			copy($fileupload,"./picture/".$fileupload_name);
// 			$sql = "INSERT INTO student (std_name,std_address,std_tel,pa_id,c_id,std_pic) VALUES ('$std_name','$std_address','$std_tel','$pa_id','$c_id','$fileupload_name')";	
// 		}else{
// 			$sql = "INSERT INTO student (std_name,std_address,std_tel,pa_id,c_id) VALUES ('$std_name','$std_address','$std_tel','$pa_id','$c_id')";	
// 		}
?>
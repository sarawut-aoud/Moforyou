<?php
require '../../connect/session_ckeck.php';
// api
require  '../../connect/api_map.php';


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
                            <div class="col-md-8">
                                <!-- general form elements -->
                                <div class="card card-primary ">
                                    <div class="card-header">
                                        <h3 class="card-title">ลงทะเบียนฟาร์ม</h3>
                                    </div>
                                    <!-- /.card-header -->
                                    <!-- form start -->
                                    <form>
                                        <div class="card-body">
                                            <div class="form-group">
                                                <label for="farmname">ชื่อฟาร์ม</label>
                                                <input type="text" class="form-control" id="farmname" placeholder="ชื่อฟาร์ม">
                                            </div>
                                            <div class="form-group">
                                                <label for="address">ที่อยู่</label>
                                                <textarea type="text" class="form-control" id="address" placeholder="ที่อยู่"></textarea>
                                            </div>
                                            <div class="row">

                                                <div class="col-xl-4 col-md-12 col-sm-12">
                                                    <div class="form-group">
                                                        <label for="province">จังหวัด</label>
                                                        <select class="form-control select2" id="provinces">
                                                            <option selected="selected">-กรุณาเลือกจังหวัด-</option>
                                                            <?php foreach ($map as $values_prov) { ?>
                                                                <option value="<?php echo $values_prov->id; ?>"><?php echo $values_prov->name_th; ?></option>
                                                            <?php }
                                                            ?>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-xl-4 col-md-12 col-sm-12">
                                                    <div class="form-group">
                                                        <label for="amphures">อำเภอ</label>
                                                        <select class="form-control select2" id="amphures" disabled>
                                                            <!-- <option selected="selected">อำเภอ</option> -->

                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-xl-4 col-md-12 col-sm-12">
                                                    <div class="form-group">
                                                        <label for="district">ตำบล</label>
                                                        <select class="form-control select2" id="districts" disabled>
                                                            <!-- <option selected="selected">ตำบล</option> -->

                                                        </select>
                                                    </div>
                                                </div>
                                            </div>


                                        </div>
                                        <!-- /.card-body -->

                                        <div class="card-footer text-end">
                                            <button type="submit" id="submit" name="submit" class="btn btn-success col-4">ลงทะเบียน</button>
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
            </div>
            <!-- /.content-wrapper -->
        </section>
        <!-- Main Footer -->
        <?php require '../sub/footer.php'; ?>
    </div>

    <!-- ./wrapper -->
</body>
<script src="../../dist/js/api-province.js"></script>

</html>
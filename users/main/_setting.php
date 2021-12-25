<?php
require '../../connect/session_ckeck.php';
require_once '../../connect/functions.php';

$id = $_SESSION['id'];
// Show farmer
$sql = new farmer();
$farmer = $sql->selectfarmer($id);
$result = mysqli_fetch_object($farmer);
// Show farm
$sql = new farm();
$farm = $sql->selectfarm($id);
$result2 = mysqli_fetch_object($farm);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>MoForYou</title>

    <?php require '../../build/script.php';

    ?>
    <link rel="stylesheet" href="./_password.css">
</head>
<style>
    .main-footer {
        padding: 0 0 0 0;
        width: 100%;
    }

    .fas {
        color: white;
    }

    .fas:hover {
        color: saddlebrown;
    }
</style>

<body class="hold-transition sidebar-collapse layout-top-nav">
    <div class="wrapper">

        <!-- Navbar -->
        <?php require '../sub/navbar.php'; ?>
        <!-- /.navbar -->

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <div class="content-header">
                <div class="container">

                </div><!-- /.container-fluid -->
            </div>
            <!-- /.content-header -->

            <!-- Main content -->
            <div class="content">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="card card-info">
                                <div class="card-header">
                                    <h3 class="card-title">แก้ไขข้อมูลส่วนตัว</h3>
                                </div>
                                <!-- /.card-header -->
                                <!-- --------------------Information -------------------------------------- -->
                                <!-- form start -->
                                <form>
                                    <div class="card-body">
                                        <div class="text-center">
                                            <img src="../../dist/img/user-01.jpg" class="rounded card-img-top  w-25" alt="image">

                                        </div>
                                        <div class="form-group d-flex justify-content-center">
                                            <input type="file" class="form-control form-control-sm mt-2 col-6 " accept="image/*;capture=camera">
                                        </div>
                                        <div class="form-group">
                                            <label for="fname">ชื่อ-นามสกุล</label>
                                            <input type="text" class="form-control" id="fname" placeholder="ชื่อ-นามสกุล" value="<?php echo $result->fullname; ?>">
                                        </div>
                                        <div class="form-group">
                                            <label for="email">Email</label>
                                            <input type="email" class="form-control" id="email" placeholder="Email" value="<?php echo $result->email; ?>">
                                        </div>
                                        <div class="form-group">
                                            <label for="phone">เบอร์โทรศัพท์</label>
                                            <input type="tel" class="form-control" name="phone" id="phone" placeholder="123-456-7890" required="required" title="123-456-7890" pattern="^\([0-9]{3}\)\s[0-9]{3}-[0-9]{4}$" value="<?php echo $result->phone; ?>">
                                        </div>
                                        <div class="form-group">
                                            <label for="phone">บัตรประชาชน</label>
                                            <input type="tel" class="form-control" name="card" id="card" placeholder="123-456-7890" disabled value="<?php echo $result->card; ?>">
                                        </div>

                                    </div>
                                    <!-- /.card-body -->

                                    <div class="card-footer text-end">
                                        <button type="submit" id="submit_farmer" name="submit_farmer" class="btn btn-info">ยืนยัน</button>
                                    </div>
                                </form>
                            </div>
                            <!-- /.card -->
                        </div>
                        <div class="col-lg-6">
                            <div class="card card-success">
                                <div class="card-header">
                                    <h3 class="card-title">แก้ไขข้อมูลฟาร์ม</h3>
                                </div>
                                <!-- /.card-header -->
                                <!-- --------------------farm -------------------------------------- -->
                                <!-- form start -->
                                <form method="POST" action="">
                                    <div class="card-body">
                                        <div class="form-group">
                                            <label for="farmname">ชื่อฟาร์ม</label>
                                            <input type="text" class="form-control " placeholder="ชื่อฟาร์ม" id="farmname" value="<?php
                                                                                                            if (empty($result2)) {
                                                                                                                echo "ยังไม่ได้ลงทะเบียน";
                                                                                                            } else {
                                                                                                                echo $result2->farmname;
                                                                                                            }
                                                                                                            ?>" <?php
                                                if (empty($result2)) {
                                                    echo "disabled readonly";
                                                } else {
                                                    echo "";
                                                }
                                                ?>>
                                        </div>

                                    </div>
                                    <!-- /.card-body -->
                                    <div class="card-footer text-end">
                                        <button type="submit" id="submit_farm" name="submit_farm" class="btn btn-success">ยืนยัน</button>
                                    </div>
                                </form>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <div class="card card-warning">
                                        <div class="card-header">
                                            <h3 class="card-title">แก้ไขรหัสผ่าน</h3>
                                        </div>
                                        <!-- /.card-header -->
                                        <!-- --------------------Password -------------------------------------- -->
                                        <!-- form start -->
                                        <form method="post">
                                            <div class="card-body">
                                                <div class="form-group">
                                                    <label for="farmname">รหัสผ่านเดิม</label>
                                                    <input type="password" class="form-control" id="old_pass" name="old_pass"onblur="checkpass(this.value)" placeholder="รหัสผ่านเดิม">
                                                </div>
                                                <div class="form-group">
                                                    <label for="farmname">รหัสผ่านใหม่</label>
                                                    <input type="password" class="form-control" id="passnew" placeholder="รหัสผ่านใหม่">
                                                    <div id="strengthMessage"></div>
                                                </div>
                                                <div class="form-group">
                                                    <input type="password" class="form-control" id="confrim_passnew" placeholder="ยืนยันรหัสผ่านใหม่">
                                                </div>
                                            </div>
                                            <!-- /.card-body -->
                                            <div class="card-footer text-end">
                                                <button type="submit" id="submit_pass" name="submit_pass" class="btn btn-warning">ยืนยัน</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                                <!-- /.card -->
                            </div>
                            <!-- /.row -->
                        </div>
                        <!-- /.container -->
                    </div>
                    <!-- /.content -->
                </div>
                <!-- /.content-wrapper -->
                <!-- Main Footer -->
                <?php require '../sub/footer.php'; ?>
            </div>
            <!-- ./wrapper -->
</body>
<script type="text/javascript" src="../../dist/js/phone.js"></script>
<script>
    
     // Check Password
     function checkpass(val) {
        $.ajax({
            type: 'POST',
            url: '../../connect/checkpass.php',
            data: 'old_pass=' + val,
            success: function(data) {
                $('#old_pass').html(data);

            }
        });
    };
    // Check Confrim Password
    $('#confrim_passnew').keyup(function() {
        var pass = $('#passnew').val();
        var cpass = $('#confrim_passnew').val();
        if (cpass == "") {
            $('#confrim_passnew').attr({
                class: 'form-control '
            });
        } else if (pass != cpass) {
            $('#confrim_passnew').attr({
                class: 'form-control  is-invalid'
            });

        } else {
            $('#confrim_passnew').attr({
                class: 'form-control  is-valid'
            });

        }
    });

    // ระดับ password
    $(document).ready(function() {
        $('#passnew').keyup(function() {
            $('#strengthMessage').html(checkStrength($('#passnew').val()))
        })

        function checkStrength(password) {
            var strength = 0
            if (password.length < 6) {
                $('#strengthMessage').removeClass()
                $('#strengthMessage').addClass('Short')
                $('#submit_pass').prop('disabled', true);
                return 'Too short'
            }
        
            
            if (password.length > 7) strength += 1
            // If password contains both lower and uppercase characters, increase strength value.  
            if (password.match(/([a-z].*[A-Z])|([A-Z].*[a-z])/)) strength += 1
            // If it has numbers and characters, increase strength value.  
            if (password.match(/([a-zA-Z])/) && password.match(/([0-9])/)) strength += 1
            // If it has one special character, increase strength value.  
            if (password.match(/([!,%,&,@,#,$,^,*,?,_,~])/)) strength += 1
            // If it has two special characters, increase strength value.  
            if (password.match(/(.*[!,%,&,@,#,$,^,*,?,_,~].*[!,%,&,@,#,$,^,*,?,_,~])/)) strength += 1
            // Calculated strength value, we can return messages  
            // If value is less than 2  
           if (strength < 2) {
                $('#strengthMessage').removeClass()
                $('#strengthMessage').addClass('Weak')
                $(':input[type="submit_pass"]').prop('disabled', false);
                return 'Weak'
            } else if (strength == 2) {
                $('#strengthMessage').removeClass()
                $('#strengthMessage').addClass('Good')
                $(':input[type="submit_pass"]').prop('disabled', false);
                return 'Good'
            } else {
                $('#strengthMessage').removeClass()
                $('#strengthMessage').addClass('Strong')
                $(':input[type="submit_pass"]').prop('disabled', false);
                return 'Strong'
            }
        }
    });
</script>

</html>
<?php

require_once '../../connect/resize.php';
require_once '../../connect/alert.php';


// แก้ไขข้อมูลส่วนตัว
if (isset($_POST['submit_farmer'])) {
    $sql = new farmer();
} else 
        if (isset($_POST['submit_farm'])) {
    $sql = new farm();
} else {
    $sql = new farmer();
    // $password = md5($_POST['passnew']);

    // $updatepass = $sql->updatepass($id, $password);
}


?>
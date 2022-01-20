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
                                            <?php
                                            if ($result->picture != NULL) {
                                            ?>
                                                <img src="<?php echo "../../dist/img/user_upload/$result->picture"; ?>" class="rounded w-100">
                                            <?php
                                            } else { ?>
                                                <img src="../../dist/img/user-01.jpg" class="rounded card-img-top  w-25" alt="image">
                                            <?php } ?>
                                        </div>
                                        <div class="form-group d-flex justify-content-center">
                                            <input type="file" class="form-control form-control-sm mt-2 col-6 " id="file" name="file" accept="image/*;capture=camera">
                                        </div>
                                        <div class="form-group">
                                            <label for="fname">ชื่อ-นามสกุล</label>
                                            <input type="text" class="form-control" id="fname" name="fname" placeholder="ชื่อ-นามสกุล" value="<?php echo $result->fullname; ?>">
                                        </div>
                                        <div class="form-group">
                                            <label for="email">Email</label>
                                            <input type="email" class="form-control" id="email" name="email" placeholder="Email" value="<?php echo $result->email; ?>">
                                        </div>
                                        <div class="form-group">
                                            <label for="phone">เบอร์โทรศัพท์</label>
                                            <input type="tel" class="form-control" name="phone" id="phone" placeholder="123-456-7890" required="required" title="123-456-7890" value="<?php echo $result->phone; ?>">
                                        </div>
                                        <div class="form-group">
                                            <label for="phone">บัตรประชาชน</label>
                                            <input type="tel" class="form-control" disabled value="<?php echo $result->card; ?>">
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
                                            <input type="text" class="form-control " placeholder="ชื่อฟาร์ม" id="farmname" name="farmname" value="<?php
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
                                                    <input type="password" class="form-control" id="old_pass" name="old_pass" onblur="checkpass(this.value)" placeholder="รหัสผ่านเดิม">
                                                </div>
                                                <div class="form-group">
                                                    <label for="farmname">รหัสผ่านใหม่</label>
                                                    <input type="password" class="form-control" id="passnew" name="passnew" placeholder="รหัสผ่านใหม่">
                                                    <div id="strengthMessage"></div>
                                                </div>
                                                <div class="form-group">
                                                    <input type="password" class="form-control" id="confrim_passnew" name="confrim_passnew" placeholder="ยืนยันรหัสผ่านใหม่">
                                                </div>
                                            </div>
                                            <!-- /.card-body -->
                                            <div class="card-footer text-end">
                                                <button type="submit" id="submit_pass" name="submit_pass" class="btn btn-warning" disabled>ยืนยัน</button>
                                            </div>
                                            <input type="hidden" id="id" name="id" value="<?php echo $result->id; ?>">
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
            data: {
                id: $("#id").val(),
                old_pass: val
            },
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
            $('#submit_pass').prop('disabled',true);
        } else if (pass != cpass) {
            $('#confrim_passnew').attr({
                class: 'form-control  is-invalid'
            });
            $('#submit_pass').prop('disabled',true);

        } else {
            $('#confrim_passnew').attr({
                class: 'form-control  is-valid'
            });
            $('#submit_pass').prop('disabled',false);

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
require_once '../../connect/func_pass.php';

//todo: แก้ไขข้อมูลส่วนตัว
if (isset($_POST['submit_farmer'])) {
    $fname = $_POST['fname'];
    $email = $_POST['email'];
    $phone = preg_replace('/[-]/i', '', $_POST['phone']);
    $sql = new farmer();

    //? function ลดขนาดรูปภาพ
    function imageResize($imageResourceId, $width, $height)
    {
        $targetWidth = $width < 1280 ? $width : 1280;
        $targetHeight = ($height / $width) * $targetWidth;
        $targetLayer = imagecreatetruecolor($targetWidth, $targetHeight);
        imagecopyresampled($targetLayer, $imageResourceId, 0, 0, 0, 0, $targetWidth, $targetHeight, $width, $height);
        return $targetLayer;
    }

    //todo: check ว่ามีรูปภาพหรือไม่
    if (!empty($picture)) {
        $sourceProperties = getimagesize($picture);
        $fileNewName = $time;
        $folderPath = "../../dist/img/user_img/";
        $ext = $_FILES['file']['name'];
        $imageType = $sourceProperties[2];

        require_once '../../connect/resize.php';
        echo resize($picture, $imageType, $folderPath, $fileNewName, $ext, $sourceProperties);
        copy($specpic, "../../dist/img/user_upload/" . $ext);
        $sql = $sql->updatefarmmer_pic($id, $fname, $phone, $email, $ext);
        echo success_1("แก้ไขข้อมูลสำเร็จ", "./_setting");
    } else {
        $query = $sql->updatefarmmer($id, $fname, $phone, $email);
        echo success_1("แก้ไขข้อมูลสำเร็จ", "./_setting");
    }
}
//todo แก้ไข้ฟาร์ม
if (isset($_POST['submit_farm'])) {
    $farmname = trim($_POST['farmname']);
    $sql = new farm();
    $query = $sql->updatefarm($farmname, $id); //? $id -> SESSION -> farmmer_id
    if ($query) {
        echo success('แก้ไขชื่อฟาร์มเรียบร้อย', './_setting');
    } else {
        echo warning("โปรดลองอีกครั้ง");
    }
}
// todo: แก้ไข้ password
if (isset($_POST['submit_pass'])) {
    $user = new farmer();
    $password_new = $_POST['passnew'];

    //* เข้ารหัส password ที่ถูกแก้ไข
    $pwd = new Setpwd();
    $encode = $pwd->encode($password_new);
    $pass_sha = $pwd->Setsha256($encode);
    $pass_hash = password_hash($pass_sha, PASSWORD_ARGON2I);

    if ($password_new != '') {
        $updatepass = $user->updatepass($id, $password); //? $id ->SESSION -> farmer_id
        echo success_1("แก้ไขรหัสผ่านเรียบร้อย", './_setting');
    } else {
        echo warning("โปรดลองอีกครั้ง");
    }
}


?>
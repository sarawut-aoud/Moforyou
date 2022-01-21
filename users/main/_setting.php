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

    .far {
        color: white;
    }

    .far:hover {
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
                                            <input type="text" class="form-control" id="fname" name="fname" placeholder="ชื่อ-นามสกุล" value="<?php echo $result->fullname . $id; ?>">
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
                                        <form method="post" class="password-strength ">
                                            <div class="card-body">
                                                <div class="form-group">
                                                    <label for="farmname">รหัสผ่านเดิม</label>
                                                    <input type="password" class="form-control" id="old_pass" name="old_pass" onblur="checkpass(this.value)" placeholder="รหัสผ่านเดิม">
                                                </div>
                                                <div class="form-group">
                                                    <div class="input-group">
                                                        <input class="password-strength__input form-control" type="password" id="password-input" name="password-input" aria-describedby="passwordHelp" placeholder="Enter password" maxlength="20" />
                                                        <div class="input-group-append">
                                                            <button class="password-strength__visibility btn btn-outline-secondary" type="button">
                                                                <span class="password-strength__visibility-icon" data-visible="hidden">
                                                                    <i class="fas fa-eye-slash"></i>
                                                                </span><span class="password-strength__visibility-icon js-hidden" data-visible="visible">
                                                                    <i class="fas fa-eye"></i></span>
                                                            </button>
                                                        </div>
                                                    </div>
                                                    <small class="password-strength__error text-danger js-hidden">This symbol is not allowed!</small>
                                                    <small class="form-text text-muted mt-2" id="passwordHelp">Add 9 charachters or more, lowercase letters, uppercase letters, numbers and symbols to make the password really strong!</small>
                                                    <small>
                                                        <div class="password-strength__bar-block progress mb-4 rounded-2" style="height:15px;">
                                                            <div class="password-strength__bar progress-bar bg-danger " role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>
                                                        </div>
                                                    </small>

                                                </div>
                                                <div class="form-group">
                                                    <input type="password" class="form-control" id="confrim_passnew" name="confrim_passnew" placeholder="ยืนยันรหัสผ่านใหม่" maxlength="20">
                                                </div>
                                            </div>
                                            <!-- /.card-body -->
                                            <div class="card-footer text-end">
                                                <button type="submit" id="submit_pass" name="submit_pass" class="password-strength__submit btn btn-warning" disabled>ยืนยัน</button>
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
<script src="../../dist/js/check_pwd_strong.js"></script>
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
        var pass = $('#password-input').val();
        var cpass = $('#confrim_passnew').val();
        if (cpass == "") {
            $('#confrim_passnew').attr({
                class: 'form-control '
            });
            $('#submit_pass').prop('disabled', true);
        } else if (pass != cpass) {
            $('#confrim_passnew').attr({
                class: 'form-control  is-invalid'
            });
            $('#submit_pass').prop('disabled', true);

        } else {
            $('#confrim_passnew').attr({
                class: 'form-control  is-valid'
            });
            $('#submit_pass').prop('disabled', false);

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
    $id = $_SESSION['id'];
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
    $id = $_SESSION['id'];
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
    $id = $_SESSION['id'];
    $password_new = $_POST['password-input'];
    $pwdconfrim = $_POST['confrim_passnew'];
    //* เข้ารหัส password ที่ถูกแก้ไข
    $pwd = new Setpwd();
    $encode = $pwd->encode($password_new);
    $pass_sha = $pwd->Setsha256($encode);
    $pass_hash = password_hash($pass_sha, PASSWORD_ARGON2I);
    $updatepass = $user->updatepass($id, $pass_hash); //? $id ->SESSION -> farmer_id
    if( $updatepass){
        echo success_1("แก้ไขรหัสผ่านเรียบร้อย", './_setting');
    }
    // if (empty($pwdconfrim)) {
       
    //     if ($updatepass) {
           
    //     }
    // } else {
    //     echo warning("โปรดลองอีกครั้ง");
    // }

   
}


?>
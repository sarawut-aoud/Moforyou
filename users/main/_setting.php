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


<body class="hold-transition sidebar-collapse layout-top-nav">
    <div class="wrapper">

        <!-- Navbar -->
        <?php require '../sub/navbar.php'; ?>
        <!-- /.navbar -->

        <!-- Content Wrapper. Contains page content -->
        <div class="bgimg content-wrapper">
            <!-- Content Header (Page header) -->
            <div class="content-header">
                <div class="container">

                </div><!-- /.container-fluid -->
            </div>
            <!-- /.content-header -->

            <!-- Main content -->
            <div class="content">
                <div class="container">
                    <div class="row mb-5">
                        <div class="col-lg-6">
                            <div class="card card-info">
                                <div class="card-header">
                                    <h3 class="card-title">แก้ไขข้อมูลส่วนตัว</h3>
                                </div>
                                <!-- /.card-header -->
                                <!-- --------------------Information -------------------------------------- -->
                                <!-- form start -->
                                <form method="POST" enctype="multipart/form-data">
                                    <div class="card-body">
                                        <div class="text-center">
                                            <?php
                                            if ($result->picture != NULL) {
                                            ?>
                                                <img id="img" src="<?php echo "../../dist/img/user_upload/$result->picture"; ?>" class="rounded w-25">
                                            <?php
                                            } else { ?>

                                                <img id="imgControl1" src="../../dist/img/user-01.jpg" class="rounded card-img-top  w-25" alt="image">

                                                <div id="imgControl" class="d-none">
                                                    <img id="imgUpload" class="rounded mx-auto d-block h-50 w-50">
                                                </div>

                                            <?php } ?>
                                        </div>
                                        <div class="form-group d-flex justify-content-center">
                                            <input type="file" class="form-control form-control-sm mt-2 col-6 " id="file" name="file" accept="image/*;capture=camera" onchange="readURL(this)">

                                            <!-- Modal -->

                                        </div>
                                        <div class="form-group">
                                            <label for="fname">ชื่อ-นามสกุล</label>
                                            <input type="text" class="form-control" id="fname" name="fname" placeholder="ชื่อ-นามสกุล" value="<?php echo $result->fullname  ?>">
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
                                            <input type="tel" class="form-control" disabled value="<?php echo substr($result->card, 0, 7) . "******"; ?>">
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
                                        <button type="submit" id="submit_farm" name="submit_farm" class="btn btn-success" <?php
                                                                                                                            if (empty($result2)) {
                                                                                                                                echo "disabled";
                                                                                                                            } else {
                                                                                                                                echo "";
                                                                                                                            } ?>>ยันยืน</button>

                                    </div>
                                </form>
                            </div>
                            <div class="row">
                                <div class="col mb-3">
                                    <div class="card card-warning mb-5">
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
                                                        <input class="password-strength__input form-control" type="password" id="password-input" name="password-input" aria-describedby="passwordHelp" placeholder="รหัสผ่านใหม่" maxlength="20" />
                                                        <div class="input-group-append">
                                                            <button class="password-strength__visibility btn btn-outline-secondary" type="button">
                                                                <span class="password-strength__visibility-icon" data-visible="hidden">
                                                                    <i class="fas fa-eye-slash"></i>
                                                                </span><span class="password-strength__visibility-icon js-hidden" data-visible="visible">
                                                                    <i class="fas fa-eye"></i></span>
                                                            </button>
                                                        </div>
                                                    </div>
                                                    <small class="password-strength__error text-danger js-hidden">This
                                                        symbol is not allowed!</small>
                                                    <p>
                                                        <small class="form-text text-muted mt-2 text-center" id="passwordHelp">ใช้ อย่างน้อย 6 ตัวอักษร ผสม ด้วยตัวอักษร(A-Z) ตัวเลข(0-9)  </small>
                                                    </p>
                                                    <small>
                                                        <div class="password-strength__bar-block progress mt-2 mb-2 rounded-2" style="height:18px;">
                                                            <div id="bar" name="bar" class="password-strength__bar progress-bar bg-danger " role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>
                                                        </div>
                                                    </small>

                                                </div>
                                                <div class="form-group">
                                                    <div class="input-group">
                                                        <input class=" form-control" type="password" id="confrim_passnew" name="confrim_passnew" aria-describedby="passwordHelp" placeholder="ยืนยันรหัสผ่านใหม่" maxlength="20" />
                                                        <div class="input-group-append">
                                                            <button class="btn btn-outline-secondary" type="button" onclick="myFunction()">
                                                                <span data-visible="hidden">
                                                                    <i id="eyeshow" name="eyeshow" class="fas fa-eye-slash"></i>
                                                                </span>
                                                            </button>
                                                        </div>
                                                    </div>
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
            <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/js/bootstrap.min.js"></script>

            <script src="../../plugins/modal_img/autosize.min.js"></script>
            <script src="../../plugins/modal_img/index.all.min.js"></script>
            <script src="../../plugins/modal_img/iziToast.min.js"></script>
            <script src="../../plugins/modal_img/perfect-scrollbar.min.js"></script>
            <script src="../../plugins/modal_img/popper.min.js"></script>

            <script src="../../dist/js/modal_img.js"></script> -->
            <script src="../../dist/js/phone.js"></script>
            <script src="../../dist/js/check_pwd_strong.js"></script>
            <script>
                // load Picture
                function readURL(input) {
                    if (input.files[0]) {
                        let reader = new FileReader();
                        document.querySelector('#imgControl').classList.replace("d-none", "d-block");
                        $('#imgControl1').attr({
                            class: 'd-none'
                        });
                        reader.onload = function(e) {
                            let element = document.querySelector('#imgUpload');
                            element.setAttribute("src", e.target.result);
                        }
                        reader.readAsDataURL(input.files[0]);
                    } else {

                    }

                }
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
                $('#confrim_passnew,#password-input,#bar').keyup(function() {
                    var pass = $('#password-input').val();
                    var cpass = $('#confrim_passnew').val();
                    let value = document.getElementById("bar").getAttribute(
                        "class"); //?  get class มาเก็บไว้ใน value

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
                        if (value ==
                            'password-strength__bar progress-bar bg-danger') { //todo: check value กับ class ที่เอามาตรวจสอบ
                            $('#submit_pass').prop('disabled', true);
                        } else {
                            $('#submit_pass').prop('disabled', false);
                        }
                    }
                });

                function myFunction() {
                    var x = document.getElementById("confrim_passnew");

                    if (x.type === "password") {
                        x.type = "text";
                        $('#eyeshow').attr({
                            class: 'fas fa-eye'
                        });
                    } else {
                        x.type = "password";
                        $('#eyeshow').attr({
                            class: 'fas fa-eye-slash'
                        });
                    }
                }
            </script>
</body>

</html>
<?php

require_once '../../connect/resize.php';
// require_once '../../connect/alert.php';
require_once '../../connect/toastr.php';
require_once '../../connect/func_pass.php';
// upload ไม่ได้
//todo: แก้ไขข้อมูลส่วนตัว
if (isset($_POST['submit_farmer'])) {


    $id = $_SESSION['id'];
    $fname = $_POST['fname'];
    $email = $_POST['email'];
    $picture = $_FILES['file']['tmp_name'];
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

    if (empty($fname) || empty($email) || empty($phone)) {
        echo warning_toast('โปรดระบุข้อมูลส่วนตัวให้ครบ');
    } else {
        //todo: check ว่ามีรูปภาพหรือไม่
        if (!empty($picture)) {
            $time = date('Ymdhis');
            $sourceProperties = getimagesize($picture);
            $fileNewName = $time;
            $folderPath = "../../dist/img/user_img/";
            $ext = $_FILES['file']['name'];
            $imageType = $sourceProperties[2];

            require_once '../../connect/resize.php';
            echo resize($picture, $imageType, $folderPath, $fileNewName, $ext, $sourceProperties);


            copy($picture, "../../dist/img/user_upload/" . $ext);

            $sql = $sql->updatefarmmer_pic($id, $fname, $phone, $email, $ext);
            echo success_toasts("แก้ไขข้อมูลสำเร็จ", "./_setting");
        } else {
            $query = $sql->updatefarmmer($id, $fname, $phone, $email);
            echo success_toasts("แก้ไขข้อมูลสำเร็จ", "./_setting");
        }
    }
}
//todo แก้ไข้ฟาร์ม
if (isset($_POST['submit_farm'])) {
    $id = $_SESSION['id'];
    $farmname = trim($_POST['farmname']);
    $sql = new farm();

    if (empty($farmname)) {
        echo warning_toast("โปรดลองอีกครั้ง");
    } else {

        $query = $sql->updatefarm($farmname, $id); //? $id -> SESSION -> farmmer_id
        echo success_toasts('แก้ไขชื่อฟาร์มเรียบร้อย', './_setting');
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

    if (empty($password_new) && empty($pwdconfrim)) {
        echo warning_toast('โปรดกรอกรหัสผ่าน');
    } else {
        $updatepass = $user->updatepass($id, $pass_hash); //? $id ->SESSION -> farmer_id
        echo success_toasts("แก้ไขรหัสผ่านเรียบร้อย", './_setting');
    }
}


?>
<?php

require '../../connect/functions.php';
ob_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title> Log in | MFU</title>
    <?php require '../../build/script.php'; ?>
    <link rel="stylesheet" href="./_login.css">
</head>


<body class="hold-transition login-page bg-gd">
    <!-- login-logo -->
    <div class="login-box">
        <div class="card shadow">
            <div class="card-header text-center card-head">
                <a href="#" class="h1 text-white">MoFouYou</a>
            </div>

            <div class="card-body">
                <p class="login-box-msg"> <u><a style="font-size: 22px;" href="../main_pages/index_tab-farm">www.moforyou.com <i class="fad fa-home"></i></a></u></p>
                <div class="col-12">
                    <!-- Form -->
                    <form method="post" id="loginForm">

                        <div class="  form-floating mb-3 mt-3">
                            <input type="text" name="username" id="username" class="form-control" autocomplete="off" placeholder="Username or Email">
                            <label for="floatingInputValue"> <small><i class="fas fa-user-circle"></i> Username or Email </small></label>

                        </div>

                        <div class=" form-floating mb-3 mt-3">
                            <input type="password" name="password" id="password" class="form-control" id="floatingInputValue" placeholder="Password">
                            </i><label for="floatingInputValue"><small> <i class="fas fa-lock"></i> password </small></label>
                        </div>

                        <div class="col-12 mt-5">
                            <button type="submit" name="login" id="login" class="btn login100-form-btn btn-block">เข้าสู่ระบบ</button>
                        </div>
                        <!-- /.col -->
                    </form>
                    <!-- /.Form -->
                </div>
                <center>
                    <p class="mb-1 mt-2">
                        <a href="forgot-password">ลืมรหัสผ่าน</a>
                    </p>

                    <p class="mb-0  mt-5">
                        </i><a href="register" class="text-center"><small> สร้างบัญชีใหม่ <i class="fas fa-arrow-right"></i></a> <small>
                    </p>
                </center>

            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->

    </div>

    </div>
    <!-- /.login-box -->


</body>
<script>

</script>


</html>
<?php

require '../../connect/alert.php';
require_once '../../connect/toastr.php';
require '../../connect/func_pass.php';
ob_start();

if (isset($_POST['username'])) {

    // data
    $userdata = new registra();
    $username = trim($_POST['username']);
    $email = trim($_POST['username']);
    $password = $_POST['password'];

    // หลีกเลี่ยง SQL Injection
    $email_escape = $userdata->real_escape_string($email);
    $username_escape = $userdata->real_escape_string($username);


    if (!empty($username) && !empty($password)) {
        if ($username != "admin" && $password != "masterkey") {
            $sql = new Setpwd(); //password

            $result = $userdata->Getpwd($username_escape, $email_escape);
            if (mysqli_num_rows($result) > 0) {
                $row = mysqli_fetch_array($result);
                $encode = $sql->encode($password); // เข้ารหัส password
                $pass_sha = $sql->Setsha256($encode); //เอา pass + user เข้า hmac 
                if (password_verify($pass_sha, $row['password']) && $row['active'] == 'YES') { // เปรียบเทียบ password ที่รับค่า และ password from db
                    // Select data จาก Username or Email
                    $results = $userdata->login($row['password'], $row['username'], $row['email']);
                    $row_login = mysqli_fetch_array($results);
                    $id =  $row_login["id"];
                    $username =  $row_login["username"];
                    $fullname =   $row_login['fullname'];
                    $person_id =  $row_login['card'];
                    $phone =  $row_login['phone'];
                    $email =  strval($row_login['email']);

                    require '../../connect/func_login.php';
                    echo login($id, $username, $fullname, $person_id, $phone, $email);

                    exit();
                } else if (password_verify($pass_sha, $row['password']) && $row['active'] == 'NO') {
                    echo info_toast("โปรดยืนยันตัวตนที่ Email ของท่านก่อนเข้าสู่ระบบ ");
                } else {
                    echo warning_toast("รหัสผ่านผิด โปรดลองอีกครั้ง");
                    exit();
                }
            } else {
                echo warning_toast("ชื่อเข้าใช้งานผิดหรือรหัสผ่านผิด โปรดลองอีกครั้ง");
                exit();
            }
        } else {
            if (($username == "admin" && $password == "masterkey")) {
                session_start();
                $_SESSION["id"] = $username;
                $_SESSION["user"] = $username;
                $_SESSION["fullname"] = "Admin Moforyou";
                echo success_toast("Login Sucessful !", $_SESSION["fullname"], "../../admin/main/admin_index");
                exit();
            } else {
                echo warning_toast("ฃื่อเข้าใช้งาน หรือ รหัสผ่านผิด");
                exit();
            }
        }
    } else {
        echo warning_toast("โปรดกรอกข้อมูลลงชื่อเข้าใช้งาน");
        exit();
    }
}

?>
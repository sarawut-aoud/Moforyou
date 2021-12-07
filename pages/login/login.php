<?php
ob_start();
require '../../connect/functions.php';


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
                <p class="login-box-msg">เยี่ยมชม <u><a style="font-size: 22px;" href="../main_pages/index">หน้าแรก <i class="fad fa-home"></i></a></u></p>
                <div class="col-12">
                    <!-- Form -->
                    <form method="post" id="loginForm">

                        <div class="  form-floating mb-3 mt-3">
                            <input type="text" name="username" id="username" class="form-control" placeholder="Username or Email">
                            <label for="floatingInputValue"> <small><i class="fas fa-user-circle"></i> Username or Email </small></label>

                        </div>

                        <div class=" form-floating mb-3 mt-3">
                            <input type="password" name="password" id="password" class="form-control" id="floatingInputValue" placeholder="Password">
                            <label for="floatingInputValue"><small> <i class="fas fa-lock"></i> password </small></label>
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

$userdata = new DB_con();

if (isset($_POST['login'])) {
    
    $username = $_POST['username'];
    $password = md5($_POST['password']);

    $result = $userdata->login($username, $password);
    $num = mysqli_fetch_array($result);
    
    if(($username =="admin")&&($password=="masterkey")){
        session_start();
        $_SESSION['valid_name'] = "admin";
        $_SESSION['name'] = "admin";
        echo "<script>
        const Toast = Swal.mixin({
            toast: true,
            position: 'center',
            showConfirmButton: false,
            timer: 3000,
        })
        Toast.fire({
            icon: 'success',
            title: 'รหัสผ่านถูกต้อง'
        }).then((result)=>{
            window.location.href='../../admin/main/admin_index';
        })
       
    </script>";
    }else
    if ($num > 0) {
        session_start();
        $_SESSION['id'] = $num['id'];
        $_SESSION['fullname'] = $num['fullname'];
        echo "<script>
        const Toast = Swal.mixin({
            toast: true,
            position: 'center',
            showConfirmButton: false,
            timer: 3000,
        })
        Toast.fire({
            icon: 'success',
            title: 'รหัสผ่านถูกต้อง'
        }).then((result)=>{
            window.location.href='../../users/main/user_index';
        })
       
    </script>";
    }else {
        echo "<script>alert('Something went wrong! Please try again.');</script>";
        // echo "<script>window.location.href='./login'</script>";
    }
}
?>
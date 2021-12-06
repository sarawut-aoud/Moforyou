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

    <?php

    require '../../build/script.php'; ?>
</head>
<style>
    .bg-gd {
        background: rgb(255, 255, 255);
        background: -moz-linear-gradient(315deg, rgba(255, 255, 255, 1) 50%, rgba(207, 116, 27, 1) 50%);
        background: -webkit-linear-gradient(315deg, rgba(255, 255, 255, 1) 50%, rgba(207, 116, 27, 1) 50%);
        background: linear-gradient(315deg, rgba(255, 255, 255, 1) 50%, rgba(207, 116, 27, 1) 50%);
        filter: progid:DXImageTransform.Microsoft.gradient(startColorstr="#ffffff", endColorstr="#cf741b", GradientType=1);
    }

    .card-head {
        background: rgb(195, 104, 0);
        background: -moz-linear-gradient(90deg, rgba(195, 104, 0, 1) 0%, rgba(236, 161, 0, 1) 38%, rgba(255, 188, 0, 1) 100%);
        background: -webkit-linear-gradient(90deg, rgba(195, 104, 0, 1) 0%, rgba(236, 161, 0, 1) 38%, rgba(255, 188, 0, 1) 100%);
        background: linear-gradient(90deg, rgba(195, 104, 0, 1) 0%, rgba(236, 161, 0, 1) 38%, rgba(255, 188, 0, 1) 100%);
        filter: progid:DXImageTransform.Microsoft.gradient(startColorstr="#c36800", endColorstr="#ffbc00", GradientType=1);
    }

    .login100-form-btn {

        line-height: 1.5;
        color: #fff;
        text-transform: uppercase;

        width: 100%;
        height: 50px;
        border-radius: 25px;
        background: #c36800;
        display: -webkit-box;
        display: -webkit-flex;
        display: -moz-box;
        display: -ms-flexbox;
        display: flex;
        justify-content: center;
        align-items: center;
        padding: 0 25px;

        -webkit-transition: all 0.4s;
        -o-transition: all 0.4s;
        -moz-transition: all 0.4s;
        transition: all 0.4s;
    }

    .login100-form-btn:hover {
        background: rgba(236, 161, 0, 1);
    }

    .main-footer {
        padding: 0 0 0 0;
        width: 100%;
    }
</style>

<body class="hold-transition login-page bg-gd">
    <div class="login-box">
        <!-- /.login-logo -->

        <div class="card shadow">
            <div class="card-header text-center card-head">
                <a href="#" class="h1 text-white">MoFouYou</a>
            </div>

            <div class="card-body">
                <p class="login-box-msg">เยี่ยมชม <u><a style="font-size: 22px;" href="../main_pages/index">หน้าแรก</a></u></p>
                <div class="col-12">
                    <form method="post" id="loginForm">
                        <!-- <div class="input-group mb-3"> -->
                        <div class="  form-floating mb-3 mt-3">
                            <input type="text" name="username" id="username" class="form-control" placeholder="Username or Email">
                            <label for="floatingInputValue"> <small><i class="fas fa-user-circle"></i> Username or Email </small></label>
                            <!-- <div class="input-group-append">
                                <div class="input-group-text">
                                    <span class="fas fa-user-circle"></span>
                                </div>
                            </div> -->
                        </div>

                        <!-- <div class="input-group mb-3"> -->
                        <div class=" form-floating mb-3 mt-3">
                            <input type="password" name="password" id="password" class="form-control" id="floatingInputValue" placeholder="Password">
                            <label for="floatingInputValue"><small> <i class="fas fa-lock"></i> password </small></label>
                            <!-- <div class="input-group-append">
                                <div class="input-group-text">
                                    <span class="fas fa-lock"></span>
                                </div>
                            </div> -->

                        </div>

                        <div class="col-12 mt-5">
                            <button type="submit" name="login" id="login" class="btn login100-form-btn btn-block">เข้าสู่ระบบ</button>
                        </div>
                        <!-- /.col -->
                    </form>
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
    session_start();
    $username = $_POST['username'];
    $password = md5($_POST['password']);

    $result = $userdata->login($username, $password);
    $num = mysqli_fetch_array($result);

    if ($num > 0) {

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
           
    } else {
        echo "<script>alert('Something went wrong! Please try again.');</script>";
        // echo "<script>window.location.href='./login'</script>";
    }
}
?>

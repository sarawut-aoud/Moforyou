<!DOCTYPE html>

<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Registration</title>
    <?php require '../../build/script.php'; ?>
    <link rel="stylesheet" href="./_login.css">
</head>

<body class="hold-transition register-page bg-gd">
    <div class="col-md-4 mt-5">
        <div class="card">
            <div class="card-header text-center card-head">
                <a href="#" class="h1 text-white">MoForYou</a>
            </div>
            <div class="card-body">
                <p class="login-box-msg">สมัครเพื่อเข้าใช้งาน</p>
                <!-- Form -->
                <form method="post">
                    <div class="form-floating mb-3 mt-3 " >
                        <input type="text" class="form-control " id="username" name="username" placeholder="Username" onblur="checkusername(this.value)">
                        <label for="floatingInputValue"> <small> Username </small></label>
                        <span class="text-center " id="usernameavailable"></span>
                    </div>
                    <div class="form-floating mb-3 mt-3">
                        <input type="password" class="form-control" id="password" name="password" placeholder="Password" required>
                        <label for="floatingInputValue"> <small> password </small></label>
                        <div id="strengthMessage"></div>
                    </div>
                    <div class="form-floating mb-3 mt-3">
                        <input type="password" class="form-control " id="confirm_password" name="confirm_password" placeholder="Retype password" required></input>
                        <label for="floatingInputValue"> <small> Retype password </small></label>
                        <div style="margin-top: 7px;" id="CheckPasswordMatch"></div>
                    </div>
                    <div class="form-floating mb-3 mt-3">
                        <input type="text" class="form-control " id="fname" name="fname" placeholder="ชื่อ - นามสกุล">
                        <label for="floatingInputValue"> <small> ชื่อ - นามสกุล </small></label>
                    </div>
                    <div class="form-floating mb-3 mt-3">
                        <input type="text" class="form-control" id="card" name="card" placeholder="บัตรประชาชน" required>
                        <label for="floatingInputValue"> <small> บัตรประชาชน </small></label>
                    </div>
                    <div class="form-floating mb-3 mt-3">
                        <input type="email" class="form-control" id="email" name="email" placeholder="Email" required>
                        <label for="floatingInputValue"> <small> Email </small></label>
                    </div>
                    <div class="form-floating mb-3 mt-3">
                        <input type="text" class="form-control" id="phone" name="phone" placeholder="เบอร์โทรศัพท์">
                        <label for="floatingInputValue"> <small> เบอร์โทรศัพท์ </small></label>
                    </div>
                    <!-- /.col -->
                    <div class="col-12">
                        <button type="submit" name="submit" id="submit" class="btn login100-form-btn btn-block">สมัคร</button>
                    </div>
                    <!-- /.col -->
                </form>
                 <!-- /.Form -->
                <center>
                    <p class="mt-4 mb-0">
                        <a href="login" class="text-center">ฉันเป็นสมาชิกอยู่แล้ว</a>
                    </p>
                </center>
            </div>
            <!-- /.form-box -->
        </div><!-- /.card -->
    </div>
    <!-- /.register-box -->

</body>
<script>
    // Check Username
    function checkusername(val) {
        $.ajax({
            type: 'POST',
            url: '../../connect/checkuser_available.php',
            data: 'username=' + val,
            success: function(data) {
                $('#usernameavailable').html(data);
              
            }
        });
    };
    // Check Confrim Password
    $('#confirm_password').keyup(function() {
        var pass = $('#password').val();
        var cpass = $('#confirm_password').val();
        if (cpass == "") {
            $('#confirm_password').attr({
                class: 'form-control'
            });
        } else if (pass != cpass) {
            $('#confirm_password').attr({
                class: 'form-control is-invalid'
            });

        } else {
            $('#confirm_password').attr({
                class: 'form-control is-valid'
            });

        }
    });

    // ระดับ password
    $(document).ready(function() {
        $('#password').keyup(function() {
            $('#strengthMessage').html(checkStrength($('#password').val()))
        })

        function checkStrength(password) {
            var strength = 0
            if (password.length < 6) {
                $('#strengthMessage').removeClass()
                $('#strengthMessage').addClass('Short')
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
                return 'Weak'
            } else if (strength == 2) {
                $('#strengthMessage').removeClass()
                $('#strengthMessage').addClass('Good')
                return 'Good'
            } else {
                $('#strengthMessage').removeClass()
                $('#strengthMessage').addClass('Strong')
                return 'Strong'
            }
        }
    });
</script>
<?php
require '../../connect/functions.php';

$userdata = new DB_con();
if (isset($_POST['submit'])) {
    $card = $_POST['card'];
    $fname = $_POST['fname'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $username = $_POST['username'];
    $password = md5($_POST['password']);



    $sql = $userdata->register($card, $fname, $email, $phone, $username, $password);

    if ($sql) {
        echo "<script>alert('Registor Successful!');</script>";
        echo "<script>window.location.href='./login'</script>";
    } else {
        echo "<script>alert('Something went wrong! Please try again.');</script>";
        echo "<script>window.location.href='./register'</script>";
    }

    // if ($sql) {
    //     echo "<script>
    //         const Toast = Swal.mixin({
    //             toast: true,
    //             position: 'center',
    //             showConfirmButton: false,
    //             timer: 3000,
    //         })
    //         Toast.fire({
    //             icon: 'success',
    //             title: 'สมัครข้อมูลเสร็จสิ้น'
    //         }).then((result)=>{
    //             window.location = './register';
    //         })

    //     </script>";
    // } else {
    //     echo "<script>
    //         const Toast = Swal.mixin({
    //             toast: true,
    //             position: 'center',
    //             showConfirmButton: false,
    //             timer: 3000,
    //         })
    //         Toast.fire({
    //             icon: 'error',
    //             title: 'ไม่สามารถสมัครข้อมูลได้'
    //         }).then((result)=>{
    //             window.location = './login';
    //         })

    //     </script>";
    // }
}
?>


</html>
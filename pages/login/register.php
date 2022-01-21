<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Registrationn</title>
    <?php
    require_once '../../build/script.php';
    ?>
    <link rel="stylesheet" href="./_login.css">
</head>

<body class="bg-gd">

    <main>
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-7">
                    <div class="card shadow-lg border-0 rounded-lg mt-5">
                        <div class="card-header card-head ">
                            <h3 class="h1 text-center text-white my-4">MoForYou</h3>
                        </div>
                        <div class="card-body">
                            <p class="login-box-msg">สมัครเพื่อเข้าใช้งาน</p>
                            <form method="POST">
                                <div class="form-row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="small mb-1">Full Name</label>
                                            <input class="form-control py-4" id="fname" name="fname" type="text" placeholder="ชื่อ - นามสกุล" required>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="small mb-1">Phone</label>
                                            <input class="form-control py-4" id="phone" name="phone" type="tel" placeholder="เบอร์โทรศัพท์" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="small mb-1">Email</label>
                                    <input class="form-control py-4" id="email" name="email" type="email" pattern="[A-Za-z0-9._%+-]{3,}@[a-zA-Z]{3,}([.]{1}[a-zA-Z]{2,}|[.]{1}[a-zA-Z]{2,}[.]{1}[a-zA-Z]{2,})" aria-describedby="emailHelp" placeholder="Enter email address" required>
                                </div>
                                <div class="form-group">
                                    <label class="small mb-1">บัตรประชาชน</label>
                                    <input class="form-control py-4" id="card" name="card" type="tel" placeholder="X-XXXX-XXXXX-XX-X" aria-invalid aria-required="true" required>
                                </div>

                                <div class="form-group">
                                    <label class="small md-1">Username</label>
                                    <input class="form-control py-4" id="username" name="username" type="text" autocomplete="off" placeholder="Enter Username" onblur="checkusername(this.value)" required>
                                    <span class="text-center " id="usernameavailable"></span>
                                </div>
                                <div class="form-row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="small mb-1">Password</label>
                                            <input class="form-control py-4" id="password" name="password-input" type="password-input" autocomplete="off"placeholder="Enter password" required maxlength="20">
                                            <div id="strengthMessage"></div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="small mb-1">Confirm Password</label>
                                            <input class="form-control py-4" id="confirm_password" name="confirm_password" autocomplete="off" type="password" placeholder="Confirm password" required maxlength="20">
                                            <div style="margin-top: 7px;" id="CheckPasswordMatch"></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group mt-4 mb-0">
                                    <button type="submit" id="submit" name="submit" class="btn login100-form-btn btn-block">สมัคร</button>
                                </div>
                            </form>
                        </div>
                        <div class="card-footer text-center">
                            <div class="small"><a href="login">ฉันเป็นสมาชิกอยู่แล้ว</a></div>
                        </div>
                    </div>
                    <!-- /card -->
                </div>
            </div>
        </div>
    </main>
</body>
<script src="../../dist/js/check_pwd_strong.js"></script>
<script type="text/javascript" src="../../dist/js/phone.js"></script>
<script type="text/javascript" src="../../dist/js/id_card.js"></script>
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
        var pass = $('#password-input').val();
        var cpass = $('#confirm_password').val();
        if (cpass == "") {

            $('#confirm_password').attr({
                class: 'form-control py-4'
            });
            $('#submit').prop('disabled', false);
        } else if (pass != cpass) {
            $('#confirm_password').attr({
                class: 'form-control py-4 is-invalid'

            });
            $('#submit').prop('disabled', true);
        } else {
            $('#confirm_password').attr({
                class: 'form-control py-4 is-valid'
            });
            $('#submit').prop('disabled', false);
        }
    });

    
</script>

</html>
<?php
require '../../connect/functions.php';
require '../../connect/func_pass.php';
require '../../connect/alert.php';

if (isset($_POST['submit'])) {
   
    /// data
    $userdata = new registra();
    $card = preg_replace('/[-]/i', '', $_POST['card']);
    $fname = $_POST['fname'];
    $email = $_POST['email'];
    $phone = preg_replace('/[-]/i', '', $_POST['phone']);
    $username = $_POST['username'];
    $password = $_POST['password-input
    '];
    /// password
    $sql = new Setpwd();

    $encode = $sql->encode($password); // เข้ารหัส pass
    $pass_sha = $sql->Setsha256($encode); //เอา pass+user เข้า hmac 
    $pwd_hashed = password_hash($pass_sha, PASSWORD_ARGON2I);
 

    $sql = $userdata->register($card, $fname, $email, $phone, $username, $pwd_hashed);

    if ($sql) {
        echo success_1("Successful!!", "./login"); // "แสดงอะไร","ส่งไปหน้าไหน"

    } else {
        echo "<script>alert('Something went wrong! Please try again.');</>";
        echo "<script>window.location.href='./register'</script>";
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
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
                                            <input class="form-control py-4" id="fname" name="fname" type="text" placeholder="ชื่อ - นามสกุล" />
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="small mb-1">Phone</label>
                                            <input class="form-control py-4" id="phone" name="phone" type="tel" placeholder="0XX-XXX-XXXX" />
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="small mb-1">Email</label>
                                    <input class="form-control py-4" id="email" name="email" type="email" aria-describedby="emailHelp" placeholder="Enter email address" />
                                </div>
                                <div class="form-group">
                                    <label class="small mb-1" for="card">บัตรประชาชน</label>
                                    <input class="form-control py-4" id="card" name="card" type="tel" placeholder="X-XXXX-XXXXX-XX-X" aria-invalid aria-required="true" required />
                                </div>


                                <div class="form-group">
                                    <label class="small md-1">Username</label>
                                    <input class="form-control py-4" id="username" name="username" type="text" placeholder="Enter Username" onblur="checkusername(this.value)" />
                                    <span class="text-center " id="usernameavailable"></span>
                                </div>


                                <div class="form-row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="small mb-1" for="password">Password</label>
                                            <input class="form-control py-4" id="password" name="password" type="password" placeholder="Enter password" />
                                            <div id="strengthMessage"></div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="small mb-1">Confirm Password</label>
                                            <input class="form-control py-4" id="confirm_password" name="confirm_password" type="password" placeholder="Confirm password" />
                                            <div style="margin-top: 7px;" id="CheckPasswordMatch"></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group mt-4 mb-0">
                                    <button class="btn login100-form-btn btn-block" type="submit" name="submit" id="submit">สมัคร</button>
                                </div>
                            </form>
                        </div>
                        <div class="card-footer text-center">
                            <div class="small"><a href="login">ฉันเป็นสมาชิกอยู่แล้ว</a></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
</body>

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
        var pass = $('#password').val();
        var cpass = $('#confirm_password').val();
        if (cpass == "") {
            $('#confirm_password').attr({
                class: 'form-control py-4'
            });
        } else if (pass != cpass) {
            $('#confirm_password').attr({
                class: 'form-control py-4 is-invalid'
            });

        } else {
            $('#confirm_password').attr({
                class: 'form-control py-4 is-valid'
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
                $(':input[type="submit"]').prop('disabled', true);
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
                $(':input[type="submit"]').prop('disabled', false);
                return 'Weak'
            } else if (strength == 2) {
                $('#strengthMessage').removeClass()
                $('#strengthMessage').addClass('Good')
                $(':input[type="submit"]').prop('disabled', false);
                return 'Good'
            } else {
                $('#strengthMessage').removeClass()
                $('#strengthMessage').addClass('Strong')
                $(':input[type="submit"]').prop('disabled', false);
                return 'Strong'
            }
        }
    });
</script>

</html>
<?php
require '../../connect/functions.php';
require '../../connect/alert.php';
$userdata = new registra();
if (isset($_POST['submit'])) {
    $card = $_POST['card'];
    $fname = $_POST['fname'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $username = $_POST['username'];
    $password = md5($_POST['password']);



    $sql = $userdata->register($card, $fname, $email, $phone, $username, $password);

    if ($sql) {
        echo success_1("Successful!!", "./login"); // "แสดงอะไร","ส่งไปหน้าไหน"

    } else {
        echo "<script>alert('Something went wrong! Please try again.');</script>";
        echo "<script>window.location.href='./register'</script>";
    }
}
?>
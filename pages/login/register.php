<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta http-equiv="Content-Type" content="text/html; charset=windows-874">
    <meta http-equiv="Content-Type" content="text/html; charset=tis-620">
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
                    <form method="POST" class="password-strength ">
                        <div class="card shadow-lg border-0 rounded-lg mt-5">
                            <div class="card-header card-head ">
                                <h3 class="h1 text-center text-white my-4">MoForYou</h3>
                            </div>

                            <div class="card-body">
                                <p class="login-box-msg">สมัครเพื่อเข้าใช้งาน</p>

                                <div class="form-row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="small mb-1">ชื่อ - นามสกุล</label>
                                            <input class="form-control py-4" id="fname" name="fname" type="text" placeholder="ชื่อ - นามสกุล" required>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="small mb-1">โทรศัพท์</label>
                                            <input class="form-control py-4" id="phone" name="phone" type="tel" placeholder="เบอร์โทรศัพท์" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="small mb-1">อีเมล</label>
                                    <input class="form-control py-4" id="email" name="email" type="email" pattern="[A-Za-z0-9._%+-]{3,}@[a-zA-Z]{3,}([.]{1}[a-zA-Z]{2,}|[.]{1}[a-zA-Z]{2,}[.]{1}[a-zA-Z]{2,})" aria-describedby="emailHelp" placeholder="Enter email address" onblur="checkmail(this.value)" required>
                                    <span class="text-center " id="emailcheck"></span>

                                </div>
                                <div class="form-group">
                                    <label class="small mb-1">บัตรประชาชน</label>
                                    <input class="form-control py-4" id="card" name="card" type="tel" placeholder="X-XXXX-XXXXX-XX-X" aria-invalid aria-required="true" required>
                                </div>

                                <div class="form-group">
                                    <label class="small md-1">ชื่อเข้าใช้งาน</label>
                                    <input class="form-control py-4" id="username" name="username" type="text" autocomplete="off" placeholder="Enter Username" onblur="checkusername(this.value)" required>
                                    <span class="text-center " id="usernameavailable"></span>
                                </div>
                                <div class="form-row ">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="small mb-1">รหัสผ่าน</label>
                                            <div class="input-group">
                                                <input class="password-strength__input form-control py-4" type="password" id="password-input" name="password-input" aria-describedby="passwordHelp" placeholder="Enter password" maxlength="20" required />
                                                <div class="input-group-append">
                                                    <button class="password-strength__visibility btn btn-outline-secondary" type="button">
                                                        <span class="password-strength__visibility-icon" data-visible="hidden">
                                                            <i class="fas fa-eye-slash"></i>
                                                        </span><span class="password-strength__visibility-icon js-hidden" data-visible="visible">
                                                            <i class="fas fa-eye"></i></span>
                                                    </button>
                                                </div>
                                            </div>


                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="small mb-1">ยันยันรหัสผ่าน</label>
                                            <div class="input-group">
                                                <input class="password-strength__input form-control py-4" type="password" id="confirm_password" name="confirm_password" aria-describedby="passwordHelp" placeholder="Confirm password" maxlength="20" required />
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
                                </div>
                                <div class="col-md-12">
                                    <small class="password-strength__error text-danger js-hidden">This symbol is not allowed!</small>
                                    <small class="form-text text-muted mt-2 text-center" id="passwordHelp">ใช้ อย่างน้อย 6 ตัวอักษร ผสม ด้วยตัวอักษร(A-Z) ตัวเลข(0-9) </small>
                                    <small>
                                        <div class="password-strength__bar-block progress mt-2 mb-2 rounded-2" style="height:18px;">
                                            <div id="bar" name="bar" class="password-strength__bar progress-bar bg-danger " role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
                                    </small>
                                </div>
                                <div class="form-group mt-4 mb-0">
                                    <button type="submit" id="submit" name="submit" class="password-strength__submit btn login100-form-btn btn-block">สมัคร</button>
                                </div>
                    </form>
                </div>
                <div class="card-footer text-center">
                    <div class="small"><a href="login.php">ฉันเป็นสมาชิกอยู่แล้ว</a></div>
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
    function myFunction() {
        var x = document.getElementById("confirm_password");

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
    // Check Username
    function checkusername(val) {
        $.ajax({
            type: 'POST',
            url: '../../connect/checkuser_available.php',
            data: {
                username: val,
                function: "checkusername",
            },
            success: function(data) {
                $('#usernameavailable').html(data);

            }
        });
    };

    function checkmail(val) {
        $.ajax({
            type: 'POST',
            url: '../../connect/checkuser_available.php',
            data: {
                email: val,
                function: "checkmail",
            },
            success: function(data) {
                $('#emailcheck').html(data);

            }
        });
    };
    // Check Confrim Password
    $('#confirm_password,#password-input').keyup(function() {
        var pass = $('#password-input').val();
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
</script>
<script>
    $(document).ready(function() {
        $(document).on('click', '#submit', function(e) {
            e.preventDefault();
            var email = $('#email').val();
            var card = $('#card').val();
            var fname = $('#fname').val();
            var phone = $('#phone').val();
            var username = $('#username').val();
            var password = $('#password-input').val();
            var con_password = $('#confirm_password').val();
            $.ajax({
                type: "post",
                dataType: "json",
                url: '_recov-password.php',
                data: {
                    function: "register",
                    email: email,
                    card: card,
                    fname: fname,
                    phone: phone,
                    username: username,
                    password: password,
                    confirm_password: con_password,
                },
                success: function(result) {
                    if (result.status == 200) {
                        window.location = '../email/email_active.php?email=' + email + '';
                    } else {
                        toastr.warning(
                            result.message,
                            '', {
                                timeOut: 1000,
                                fadeOut: 1000,
                                onHidden: function() {
                                    location.reload();
                                }
                            }
                        );
                    }
                }
            })

        });
    });
</script>

</html>
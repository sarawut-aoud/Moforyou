<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta http-equiv="Content-Type" content="text/html; charset=windows-874">
    <meta http-equiv="Content-Type" content="text/html; charset=tis-620">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Recover Password </title>

    <?php require '../../build/script.php'; ?>
    <link rel="stylesheet" href="./_login.css">
</head>

<body class="hold-transition login-page bg-gd">
    <div class="login-box">
        <form method="post" class="password-strength ">
            <div class="card ">
                <div class="card-header text-center card-head">
                    <a href="#" class="h1 text-white">MoForYou</a>
                </div>
                <div class="card-body">
                    <p class="login-box-msg">---- กรอกรหัสผ่านใหม่ ----</p>


                    <div class="input-group">
                        <input class="password-strength__input form-control" required type="password" id="password-input" name="password-input" aria-describedby="passwordHelp" placeholder="Enter password" maxlength="20" />
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
                        <small class="form-text text-muted mt-2 " id="passwordHelp">
                            ใช้ อย่างน้อย 6 ตัวอักษร ผสม ด้วยตัวอักษร(A-Z) ตัวเลข(0-9) </small>
                    </p>
                    <small>
                        <div class="password-strength__bar-block progress mt-2 mb-2 rounded-2" style="height:18px;">
                            <div id="bar" name="bar" class="password-strength__bar progress-bar bg-danger " role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                    </small>

                    <div class="input-group">
                        <input class=" form-control" type="password" id="confrim_passnew" required name="confrim_passnew" aria-describedby="passwordHelp" placeholder="Confirm password" maxlength="20" />
                        <div class="input-group-append">
                            <button class="btn btn-outline-secondary" type="button" onclick="myFunction()">
                                <span data-visible="hidden">
                                    <i id="eyeshow" name="eyeshow" class="fas fa-eye-slash"></i>
                                </span>
                            </button>
                        </div>
                    </div>

                    <div class="row mt-4">

                        <div class="col-12">
                            <button disabled type="submit" class="btn login100-form-btn btn-block password-strength__submit">ยันยืนการเปลี่ยนรหัสผ่าน</button>
                        </div>
                        <!-- /.col -->
                    </div>
        </form>

        <p class="mt-3 mb-1">
            <a href="login.php">Login</a>
        </p>
    </div>
    <!-- /.login-card-body -->
    </div>
    </div>
    <!-- /.login-box -->

    <script src="../../dist/js/check_pwd_strong.js"></script>
    <script>
        $(document).ready(function() {
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
        })


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
    <script>
        $(document).ready(function() {
            $(document).on('click', '.password-strength__submit', function(e) {
                e.preventDefault();
                var pass = $('#password-input').val();
                var email = '<?php echo $_GET['email']; ?>';
                $.ajax({
                    type: 'post',
                    dataType: 'json',
                    url: '_recov-password.php',
                    data: {
                        function: "recovepass",
                        password: pass,
                        email: email,
                    },
                    success: function(result) {
                        if (result.status == 200) {
                            toastr.success(
                                result.message,
                                '', {
                                    timeOut: 1000,
                                    fadeOut: 1000,
                                    onHidden: function() {
                                        location.href = 'login.php';
                                    }
                                }
                            );
                        } else {
                            Swal.fire({
                                position: 'center',
                                icon: 'warning',
                                title: result.message,
                                showConfirmButton: false,
                                timer: 1500
                            }).then((result) => {
                                location.reload();
                            })
                        }
                    }
                })
            })



        });
    </script>
</body>

</html>
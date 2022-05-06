<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Forgot Password </title>

    <?php require '../../build/script.php'; ?>
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
        <div class="card">
            <div class="card-header text-center card-head">
                <a href="#" class="h1 text-white">MoForYou</a>
            </div>
            <div class="card-body">
                <p class="login-box-msg">คุณลืมรหัสผ่านใช่หรือไม่ ? <br>กรอก E-mail เพื่อรับรหัสผ่านใหม่ </p>
                <form method="post">
                    <span id="alertcheck"></span>
                    <div class="input-group mb-3">

                        <input type="email" class="form-control" placeholder="Email" id="email" autocomplete="off" required>

                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-envelope"></span>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <button type="submit" class="btn login100-form-btn btn-block submit">ขอรหัสผ่านใหม่</button>
                        </div>
                        <!-- /.col -->
                    </div>
                </form>
                <div class="d-flex mt-3 mb-1 ">
                    <a href="login" class="me-auto p-2">เข้าสู่ระบบ</a>
                    <a href="../login/login" class="p-2">ย้อนกลับ</a>

                </div>
            </div>
            <!-- /.login-card-body -->
        </div>
    </div>
    <!-- /.login-box -->

    <script>
        $(document).ready(function() {

            $(document).on('click', '.submit', function(e) {
                e.preventDefault();
                var email = $('#email').val();
                if (email != "") {
                    $.ajax({
                        type: 'post',
                        dataType: 'json',
                        url: '_recov-password.php',
                        data: {
                            function: "emailcheck",
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
                                            
                                            window.location = './recover-password?recov-email='+email+'';
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
                } else {
                    $("#alertcheck").show(0).html("<div align='center' class='bg-red mb-2 rounded'>โปรดระบุ Email !</div>")
                        .delay(2500).fadeOut('fast');
                }

            })


        });
    </script>
</body>

</html>
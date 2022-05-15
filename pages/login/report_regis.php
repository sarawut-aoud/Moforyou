<?php
require_once('../../connect/functions.php');
$sql = new registra();
$email = $_REQUEST['email'];
$query = $sql->report_reg($email);
$rs = $query->fetch_object();
?>
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
                                <p class="login-box-msg">ยืนยันการสมัครสมาชิก</p>


                                <div class="form-group row">
                                    <b class="col-lg-3 col-sm-3 col-md-3  text-md">ชื่อ - นามสกุล :</b>
                                    <div class="col-lg-6 col-sm-6 col-md-6">
                                        <div id=""><?php echo $rs->fullname; ?></div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <b class="col-lg-3 col-sm-3 col-md-3  text-md">โทรศัพท์ :</b>
                                    <div class="col-lg-6 col-sm-6 col-md-6">
                                        <div id=""><?php echo $rs->phone; ?></div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <b class="col-lg-3 col-sm-3 col-md-3  text-md">อีเมล :</b>
                                    <div class="col-lg-6 col-sm-6 col-md-6">
                                        <div id=""><?php echo $rs->email; ?></div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <b class="col-lg-3 col-sm-3 col-md-3  text-md">บัตรประชาชน :</b>
                                    <div class="col-lg-6 col-sm-6 col-md-6">
                                        <div id=""><?php echo $rs->card; ?></div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <b class="col-lg-3 col-sm-3 col-md-3  text-md">ชื่อเข้าใช้งาน :</b>
                                    <div class="col-lg-6 col-sm-6 col-md-6">
                                        <div id=""><?php echo $rs->username; ?></div>
                                    </div>
                                </div>


                                <div class="form-group mt-4 mb-0">
                                    <button type="submit" id="submit" name="submit" class="btn btn-outline-success btn-block">ยืนยันเพื่อสมัครสมาชิก</button>
                                    <button type="submit" id="close" name="close" class=" btn btn-outline-danger btn-block">ยกเลิกการสมัครสมาชิก</button>
                                </div>
                    </form>
                </div>

            </div>
            <!-- /card -->
        </div>
        </div>
        </div>
    </main>
</body>


<script>
    $(document).ready(function() {
        toastr.options = {
            'closeButton': false,
            'debug': false,
            'newestOnTop': false,
            'progressBar': false,
            'positionClass': 'toast-top-right',
            'preventDuplicates': false,
            'onclick': null,
            'showDuration': '300',
            'hideDuration': '1000',
            'timeOut': '5000',
            'extendedTimeOut': '1000',
            'showEasing': 'swing',
            'hideEasing': 'linear',
            'showMethod': 'fadeIn',
            'hideMethod': 'fadeOut'
        }
        var email = '<?php echo $email; ?>';
        $(document).on('click', '#submit', function(e) {
            e.preventDefault();

            Swal.fire({
                title: 'คุณต้องการยืนยันการสมัครสมาชิกใช่หรือไม่ ?',
                icon: 'info',
                showCancelButton: true,
                confirmButtonColor: '#40ad57',
                cancelButtonColor: '#d33',
                confirmButtonText: "ยืนยัน",
                cancelButtonText: "ยกเลิก",
            }).then((btn) => {
                if (btn.isConfirmed) {
                    window.location = '../email/email_active.php?email=' + email + '';
                }
            });


        });
        $(document).on('click', '#close', function(e) {
            e.preventDefault();
            Swal.fire({
                title: 'คุณต้องการยกเลิกการสมัครสมาชิกใช่หรือไม่ ?',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: "ยืนยัน",
                cancelButtonText: "ยกเลิก",
            }).then((btn) => {
                if (btn.isConfirmed) {
                    $.ajax({
                        type: "post",
                        dataType: 'json',
                        url: './_recov-password.php',
                        data: {
                            function: "cancel",
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
                                            window.location.href = '../login/login.php';

                                        }
                                    }
                                );

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
                }
            });
        })
    });
</script>

</html>
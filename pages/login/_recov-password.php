<?php
error_reporting(~E_NOTICE);
require_once '../../connect/functions.php';
$func = $_REQUEST['function'];
if (isset($func) && $func == 'emailcheck') {
    $sql = new registra();
    $email = $_POST['email'];
    $query = $sql->checkemail($email);
    $rs = $query->fetch_object();
    if (empty($rs->email)) {
        $msg = array(
            "status" => 0,
            "message" => "ไม่พบ Email นี้ในระบบ"
        );
    } else {
        $msg = array(
            "status" => 200,
            "message" => "พบ Email นี้ในระบบ"
        );
    }
    echo json_encode($msg);
    http_response_code(200);
}








if (isset($func) && $func == 'recovepass') {
    $sql = new registra();
    $email = $_POST['email'];
    $password = $_POST['password'];
    if (empty($email) || empty($password)) {
        $msg = array(
            "status" => 0,
            "message" => "ไม่สามารถขอรหัสผ่านใหม่ได้"
        );
    } else {
        //* เข้ารหัส password ที่ถูกแก้ไข
        require_once '../../connect/func_pass.php';
        $pwd = new Setpwd();
        $encode = $pwd->encode($password);
        $pass_sha = $pwd->Setsha256($encode);
        $pass_hash = password_hash($pass_sha, PASSWORD_ARGON2I);

        $query = $sql->recovepassword($email, $pass_hash);
        $msg = array(
            "status" => 200,
            "message" => "เปลี่ยนรหัสผ่านสำเร็จ"
        );
    }
    echo json_encode($msg);
    http_response_code(200);
}

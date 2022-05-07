<?php
error_reporting(~E_NOTICE);
require_once '../../connect/functions.php';
require '../../connect/func_pass.php';
$func = $_REQUEST['function'];


if (isset($func) && $func == 'register') {
    $userdata = new registra();


    $card = preg_replace('/[-]/i', '', $_POST['card']);
    $fname = $_POST['fname'];
    $email = $_POST['email'];
    $phone = preg_replace('/[-]/i', '', $_POST['phone']);
    $username = $_POST['username'];
    $password = $_POST['password'];
    $con_password = $_POST['confirm_password'];

    /// password
    $sql = new Setpwd();

    $encode = $sql->encode($password); // เข้ารหัส pass
    $pass_sha = $sql->Setsha256($encode); //เอา pass+user เข้า hmac 
    $pwd_hashed = password_hash($pass_sha, PASSWORD_ARGON2I);
    if ($con_password != $password) {
        $msg = array(
            "status" => 0,
            "message" => "ยืนยัน Password ไม่ถูกต้อง"
        );
    } else if (empty($card) || empty($fname) || empty($email) || empty($phone) || empty($username) || empty($password)) {
        $msg = array(
            "status" => 0,
            "message" => "โปรดกรอกข้อมูลให้ครบทกุช่อง"
        );
    } else {
        $sql = $userdata->register($card, $fname, $email, $phone, $username, $pwd_hashed);
        $msg = array(
            "status" => 200,
            "message" => "Successful!!"
        );
    }
    echo json_encode($msg);
    http_response_code(200);
}


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

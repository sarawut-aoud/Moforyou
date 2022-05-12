<?php
error_reporting(~E_NOTICE);

require_once '../../connect/functions.php';
require_once '../../connect/alert.php';
$username = $_REQUEST['username'];
$password = $_REQUEST['password'];

$userdata = new registra();

$result = $userdata->Getpwd($username, $email_escape);
if (mysqli_num_rows($result) > 0) {
    $sql = new Setpwd();
    $row = mysqli_fetch_array($result);
    $encode = $sql->encode($password); // เข้ารหัส password
    $pass_sha = $sql->Setsha256($encode); //เอา pass + user เข้า hmac 
    // if (password_verify($pass_sha, $row['password']) && $row['active'] == 'YES') { // เปรียบเทียบ password ที่รับค่า และ password from db
    if ((md5($pass_sha) == $row['password']) && $row['active'] == 'YES') {
        //Select data จาก Username or Email
        $sql = new registra(); //password
        $results = $sql->login($row['password'], $row['username'], $row['email']);
        $row_login = mysqli_fetch_array($results);
        $id =  $row_login["id"];
        $username =  $row_login["username"];
        $fullname =   $row_login['fullname'];
        $person_id =  $row_login['card'];
        $phone =  $row_login['phone'];
        $email =  strval($row_login['email']);
        $sql_farm = new farm();
        $query_farm = $sql_farm->checkregisfarm($id);
        $farm_check = mysqli_num_rows($query_farm);
        if (empty($farm_check)) {
            echo warning_toast("ท่านไม่ได้ลงทะเบียนฟาร์ม");
        } else {
            $row_farm =  $query_farm->fetch_array();
            $farm_id =  $row_farm['id'];
            session_start();
            $_SESSION["id"] = $id;
            $_SESSION["user"] =  $username;
            $_SESSION["fullname"] =  $fullname;
            $_SESSION["person_id"] =  $person_id;
            $_SESSION["phone"] = $phone;
            $_SESSION["email"] = $email;
            $_SESSION["farm_id"] =  $farm_id;

            echo success_toast("Login Sucessful !", $_SESSION["fullname"], "givefood.php");

            exit();
        }
    } else if (password_verify($pass_sha, $row['password']) && $row['active'] == 'NO') {
        echo info_toast("โปรดยืนยันตัวตนที่ Email ของท่านก่อนเข้าสู่ระบบ ");
    } else {
        echo warning_toast("รหัสผ่านผิด โปรดลองอีกครั้ง");
        exit();
    }
} else {
    echo warning_toast("ชื่อเข้าใช้งานผิดหรือรหัสผ่านผิด โปรดลองอีกครั้ง");
    exit();
}

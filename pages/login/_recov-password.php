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

<?php

session_start();
$_SESSION["id"] = $_POST['id'];
$_SESSION["user"] = $_POST['user'];
$_SESSION["fullname"] = $_POST['fullname'];
$_SESSION["person_id"] = $_POST['person_id'];
$_SESSION["phone"] = $_POST['phone'];
$_SESSION["email"] = $_POST['email'];



$msg = array(
    "status" => 200, "message" => "เข้าสู่ระบบสำเร็จ",
);
echo json_encode($msg);
http_response_code(200);

<?php
require_once "functions.php";
$usernamecheck = new registra();

// Getting post value
$username = $_POST['username'];

if ($username == "admin" || $username == "ADMIN" || $username == "aDmin") {
    echo "<span style='color: red;'><small> ไม่สามารถใช้ชื่อเข้าใช้งานนี้ได้</small></span>";
    echo "<script>$('#submit').prop('disabled', true);</script>";
} else {
    $sql = $usernamecheck->usernameavailable($username);

    $num = mysqli_num_rows($sql);
    if ($username == "") {
        echo "<span style=''><small></small></span>";
        echo "<script>$('#submit').prop('disabled', false);</script>";
    } else 
       if ($num > 0) {
        echo "<span style='color: red;'><small>ชื่อเข้าใช้งานซ้ำ ไม่สามารถใช้ชื่อเข้าใช้งานนี้ได้</small></span>";
        echo "<script>$('#submit').prop('disabled', true);</script>";
    } else {
        echo "<span style='color: green;'><small>สามารถใช้ ชื่อเข้าใช้งาน นี้ได้.</span>";
        echo "<script>$('#submit').prop('disabled', false);</script>";
    }
}

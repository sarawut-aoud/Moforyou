<?php
require_once "functions.php";
$sql = new registra();
$func = $_REQUEST['function'];
if ($func == 'checkusername') {
    // Getting post value
    $username = $_POST['username'];

    if ($username == "admin" || $username == "ADMIN" || $username == "aDmin") {
        echo "<span style='color: red;'><small> ไม่สามารถใช้ชื่อเข้าใช้งานนี้ได้</small></span>";
        echo "<script>$('#submit').prop('disabled', true);</script>";
    } else {
        $query = $sql->usernameavailable($username);

        $num = mysqli_num_rows($query);
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
}
if ($func == 'checkmail') {
    $email = $_POST['email'];

    $queryemail = $sql->checkemail($email);
    $num = mysqli_num_rows($queryemail);
    if ($num > 0) {
        echo "<span style='color: red;'><small>อีเมลนี้ซ้ำ ไม่สามารถใช้ได้</small></span>";
        echo "<script>$('#submit').prop('disabled', true);</script>";
    }
}
if ($func == 'checkname') {
    $name = $_POST['name'];

    $queryname = $sql->checkname($name);
    $num = mysqli_num_rows($queryname);
    if ($num > 0) {
        echo "<span style='color: red;'><small>ชื่อ - นามสกุลนี้มีการลงทะเบียนแล้ว ไม่สามารถใช้ได้</small></span>";
        echo "<script>$('#submit').prop('disabled', true);</script>";
    }
}


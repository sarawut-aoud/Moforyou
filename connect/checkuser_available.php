<?php
require_once "functions.php";
$usernamecheck = new farmmer();

// Getting post value
$username = $_POST['username'];

$sql = $usernamecheck->usernameavailable($username);

$num = mysqli_num_rows($sql);
if ($username == "") {
    echo "<span style=''><small></small></span>";
    echo "<script>$('#submit').prop('disabled', false);</script>";
} else 
   if ($num > 0) {
    echo "<span style='color: red;'><small>ไม่สามารถใช้ Username นี้ได้</small></span>";
    echo "<script>$('#submit').prop('disabled', true);</script>";
} else {
    echo "<span style='color: green;'><small>สามารถใช้ Username นี้ได้.</span>";
    echo "<script>$('#submit').prop('disabled', false);</script>";
}

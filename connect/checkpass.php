<?php
require_once "functions.php";
$passcheck = new farmer();

// Getting post value
$pass = $_POST['old_pass'];

$sql = $passcheck->passavailable($pass);

$num = mysqli_fetch_array($sql);
if ($pass == "") {
    echo "<script>$('#old_pass').attr({
        class: 'form-control '
    });</script>";
} else 
   if ($num['password'] != $pass) {

    echo "<script>$('#old_pass').attr({
        class: 'form-control is-invalid'
    });</script>";
} else {
    echo "<script>$('#old_pass').attr({
        class: 'form-control is-valid'
    });</script>";
}

<?php
error_reporting(~E_NOTICE);
require_once '../../connect/functions.php';
$sql = new registra();
$email = $_REQUEST['email'];
$query =$sql->active_id($email);
$paths = 'http://127.0.0.1/main_2/pages/login/login.php'; 
if($query){
    echo "<script>  window.location = '".$paths."';</script>";
}
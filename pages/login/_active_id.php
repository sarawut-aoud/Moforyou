<?php
error_reporting(~E_NOTICE);
require_once '../../connect/functions.php';
$sql = new registra();
$email = $_REQUEST['email'];
$query = $sql->active_id($email, 'select');
$rs = $query->fetch_object();
$paths = 'http://127.0.0.1/main_2/pages/login/login.php';


if ($rs->active == 'YES') {

    echo "<script>  window.location = '" . $paths . "';</script>";
} else {
    $query = $sql->active_id($email, 'update');
    echo "<script>
            window.setTimeout(function() {
            window.location = '../email/active_success.html';
            }, 1000);
        </script>";
}

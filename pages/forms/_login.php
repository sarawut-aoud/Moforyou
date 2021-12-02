<?php
require '../../connect/functions.php';

$userdata = new db_con();
if (isset($_POST['submit'])) {
    $username = $_POST['username'];
    $password = md5($_POST['password']);
    $fname = $_POST['fname'];
    $card = $_POST['card'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];

    $sql = $userdata->register($card, $fname, $email, $phone, $username, $password);

    
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
</body>
<script>
    window.location.href = '../login/login';
</script>
</html>
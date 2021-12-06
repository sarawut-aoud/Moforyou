<?php
require '../../connect/functions.php';

$userdata = new DB_con();

    $card = $_POST['card'];
    $fname = $_POST['fname'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $username = $_POST['username'];
    $password = md5($_POST['password']);

    $sql = $userdata->register($card, $fname, $email, $phone, $username, $password);
  
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <?php require '../../build/script.php';?>
</head>

<body>

</body>
<script>
    const Toast = Swal.mixin({
        toast: true,
        position: 'top-end',
        showConfirmButton: false,
        timer: 3000,
        timerProgressBar: true,

    })
    Toast.fire({
        icon: 'success',
        title: 'Signed in successfully'
    }).then((result)=> {
        window.location.href = '../login/register.';
    })
   
</script>

</html>
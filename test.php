<?php
include './connect/database.php';
include './connect/func_pass.php';
include './connect/functions.php';

$options = [
    'cost' => 10,
];
$sql = new Setpwd();
$userdata = new registra();
$username_escape = 'user2';
$email_escape = 'user.test@mail.com';

$getpwd = $userdata->Getpwd($username_escape, $email_escape);
$rs = mysqli_fetch_array($getpwd);
$encode = $sql->encode('123456789'); // เข้ารหัส password
$pass_sha = strtr($sql->Setsha256($encode),'+','/'); //เอา ชื่อ + pass เข้า hmac 
$pwd_hashed = strtr(password_hash($pass_sha, PASSWORD_ARGON2I),'+','/');
$pwd_encode = strtr($sql->encode($pwd_hashed),'+','/');


$pwd_decode = strtr($sql->decode($rs['password']),'+','/');

echo  $encode . "<br>";
echo  $pass_sha . "<br>";
echo $pwd_hashed . "<br>";
echo $pwd_encode . "<br>";
echo  $pwd_decode . "<br>";

if (password_verify($pwd_decode, $pwd_hashed)) {
    echo "match";
} else
    echo "error";
?>
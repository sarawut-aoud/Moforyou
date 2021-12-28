<!-- 
// ดัก sql injection  ระดับ ต่ำ -> กลาง 
// // $ตัวแปล = htmlspecialchars(htmlspecialchars(htmlspecialchars(mysqli_real_escape_string($conn,$_POST['']),ENT_COMPAT)));
$cut = explode('/',$_SERVER["REQUEST_URI"]);
foreach($cut as $cut){
    echo ucfirst(str_replace(array(".php","/"),array(""," "),$cut) . ' / ');

 -->
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
$pass_sha = $sql->Setsha256($encode); //เอา ชื่อ + pass เข้า hmac 

$pwd_hashed = password_hash($pass_sha, PASSWORD_ARGON2I);
$pwd_encode = $sql->encode($pwd_hashed); // เอา pass + password Hash มาเข้า hmac 

$pwd_decode = $sql->decode($rs['password']); //decode : get password from db  

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
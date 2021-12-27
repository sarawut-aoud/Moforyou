<?php
define('DB_SERVER', 'localhost'); // Hostname
define('DB_USER', 'root'); //Database Username
define('DB_PASS', ''); // Database Password
define('DB_NAME', 'db_moforyou'); // Database Name
date_default_timezone_set('Asia/Bangkok');
class Database
{
    // Connect Database
    public function __construct()
    {
        $conn = mysqli_connect(DB_SERVER, DB_USER, DB_PASS, DB_NAME);
        $this->dbcon = $conn;

        if (mysqli_connect_errno()) {
            echo "Failed to connect to MySQL : " . mysqli_connect_error();
        }
    }
    public function real_escape_string($valuse)
    {
        $real = mysqli_real_escape_string($this->dbcon, $valuse);
        return $real;
    }

    function encode($string)
    {
        $url = utf8_encode($string);
        $base64 = base64_encode(base64_encode($url));
        $str = strrev($base64);
        return $str;
    }
    function decode($string)
    {
        $str = strrev($string);
        $base64 = base64_decode(base64_decode($str));
        $url = urldecode($base64);
        return $url;
    }
    function Setvaliable($sting)
    {
        $time = date('His');
        $set = $sting . $time;
        return $set;
    }
    function hash256($pass, $name)
    {
        $hash256 = hash_hmac("sha256", $pass, $name);
        return $hash256;
    }
    //$hash= password_hash('', PASSWORD_DEFAULT);


    // if (password_verify(, $hash)) {
    //     echo 'Password is valid!';

    // } else {
    //     echo 'Invalid password.';
    // }



    // $name = Setvaliable("tar");
    // echo $name;
    // $pass = hash256('1234',$name);
    // echo $pass;

    // $pwd_hashed = password_hash($pass, PASSWORD_ARGON2I);


    // if (password_verify($pass,$pwd_hashed)){
    //   echo "password match";
    // }else {
    //   echo "password no match";
    // }


}

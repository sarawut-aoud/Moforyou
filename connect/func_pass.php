<?php
class Setpwd {
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
  
    function Setsha256($pass)
    {
        $hash256 = hash_hmac("sha256", $pass,'user');
        return $hash256;
    }

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

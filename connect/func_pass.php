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

    

}

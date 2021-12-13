<?php
require_once 'database.php';
class farmmer extends Database
{

    // Check username
    public function usernameavailable($uname)
    {
        $checkuser = mysqli_query($this->dbcon, "SELECT username FROM tbl_farmer WHERE username = '$uname'");
        return $checkuser;
    }

    // Resgistration 
    public function register($card, $fname, $email, $phone, $username, $password)
    {
        $reg = mysqli_query($this->dbcon, "INSERT INTO tbl_farmer(card,fullname,email,phone,username,password) 
            VALUES('$card','$fname','$email','$phone','$username','$password')");
        return $reg;
    }

    // Login 
    public function login($username, $password)
    {
        $log = mysqli_query($this->dbcon, "SELECT id, fullname  FROM tbl_farmer WHERE username = '$username' AND password = MD5('" . $password . "')");
        return $log;
    }
}
class house extends Database
{
    // Insert House 
    public function addhouse($hnmae, $farm_id)
    {
        $add_house = mysqli_query($this->dbcon, "INSERT INTO tbl_house(housename,farm_id)VALUES('$hnmae','$farm_id')");
        return $add_house;
    }
}

<?php
require_once 'database.php';
// เจ้าของฟาร์ม / สมัคร user
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
    public function login($username, $password,$email)
    {
        $log = mysqli_query($this->dbcon, "SELECT id, fullname  FROM tbl_farmer WHERE (username = '$username' OR email = '$email')AND password = MD5('" . $password . "')");
        return $log;
    }
    // test pagination 
    public function pagin()
    {
        $pag = mysqli_query($this->dbcon, "SELECT * FROM tbl_farmer");
        return $pag;
    }
    public function pagin_page($start, $perpage)
    {
        $page = mysqli_query($this->dbcon, "SELECT * FROM tbl_farmer limit {$start},{$perpage} ");
        return $page;
    }
}
// ฟาร์ม
class farm extends Database
{
    // Resgistration Farm
    public function registerfarm(){
        $regfarm = mysqli_query($this->dbcon,"INSERT INTO tbl_farm()VALUES()");
        return $regfarm;
    }
    // Check Resgistration Farm
    public function checkregisfarm($id){
        $checkfarm = mysqli_query($this->dbcon,"SELECT id FROM tbl_farm WHERE id_farmer = '$id'");
        return $checkfarm;
    }
}
// โรงเรือน
class house extends Database
{
    // Insert  
    public function addhouse($hnmae, $farm_id)
    {
        $add_house = mysqli_query($this->dbcon, "INSERT INTO tbl_house(housename,farm_id)VALUES('$hnmae','$farm_id')");
        return $add_house;
    }
    // Update
    // Delete
    // Select
}
// ฝูง
class herd extends Database
{
    // Insert 
    // Update
    // Delete
    // Select
}

// ผสมพันธุ์
class breed extends Database
{
    // Insert 
    // Update
    // Delete
    // Select
}
// All Report
class report extends Database
{
    // Select .. 
}

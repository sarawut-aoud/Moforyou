<?php
require_once 'database.php';

//  สมัคร user
class registra extends Database
{
    // Check username
    public function usernameavailable($uname)
    {
        $checkuser = mysqli_query($this->dbcon, "SELECT username FROM tbl_farmer WHERE username = '$uname'  ");
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
    public function login($password, $username, $email)
    {
        $log = mysqli_query($this->dbcon, "SELECT id,fullname,username,password,email
        FROM tbl_farmer 
        WHERE username = '" . $username . "' OR email = '$email' AND password = ('" . $password . "')");
        return $log;
    }
    //password 
    public function Getpwd($username, $email)
    {
        $getpass = mysqli_query($this->dbcon, "SELECT id,fullname,username,password FROM tbl_farmer WHERE username = '" . $username . "' OR email = '$email' ");
        return $getpass;
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
// Farmer
class farmer extends Database
{
    // Check Pass
    public function passavailable($id)
    {
        $checkpass = mysqli_query($this->dbcon, "SELECT password , id FROM tbl_farmer WHERE  id = '$id'");
        return $checkpass;
    }
    //Select 
    public function selectfarmer($id)
    {
        $sel_farmer = mysqli_query($this->dbcon, "SELECT * FROM tbl_farmer WHERE id='$id' ");
        return $sel_farmer;
    }
    // Update Farmer No picture
    public function updatefarmmer($id,$fname, $phone, $email)
    {
        $upfarmmer = mysqli_query($this->dbcon, "UPDATE tbl_farmer SET fullname = '$fname' , phone = '$phone' , email = '$email' WHERE id = '$id'");
        return $upfarmmer;
    }
    // Update Farmer Picture
    public function updatefarmmer_pic($id,$fname,$phone,$email,$picture){
        $update_pic = mysqli_query($this->dbcon,"UPDATE tbl_farmer SET fullname = '$fname' , phone = '$phone' , email = '$email' , picture = '$picture' WHERE id = '$id'");
        return $update_pic;
    }
    // Update Password
    public function updatepass($id, $password)
    {
        $up_pass = mysqli_query($this->dbcon, "UPDATE  tbl_farmer set password = '$password'  WHERE id='$id' ");
        return $up_pass;
    }
}
// ฟาร์ม
class farm extends Database
{
    // Resgistration Farm
    public function registerfarm()
    {
        $regfarm = mysqli_query($this->dbcon, "INSERT INTO tbl_farm
        ()
        VALUES
        ()
        
        ");
        return $regfarm;
    }
    // Check Resgistration Farm
    public function checkregisfarm($id)
    {
        $checkfarm = mysqli_query($this->dbcon, "SELECT * FROM tbl_farm WHERE farmmer_id = '$id'");
        return $checkfarm;
    }
    // Update 
    public function updatefarm($farmname,  $farmmer_id)
    {
        $upfarm = mysqli_query($this->dbcon, "UPDATE tbl_farm SET 
        farmname ='$farmname'
        WHERE farmmer_id='$farmmer_id'
        ");
        return $upfarm;
    }
    //Select
    public function selectfarm($id)
    {
        $sel_farm = mysqli_query($this->dbcon, "SELECT farmname FROM tbl_farm WHERE farmmer_id='$id' ");
        return $sel_farm;
    }
}
// โรงเรือน
class house extends Database
{
    // Selcet id where Farm_id
    public function gethouseFarmid($id)
    {
        $sel_houseFid = mysqli_query($this->dbcon, "SELECT * FROM tbl_house  WHERE farm_id='$id'");
        return $sel_houseFid;
    }
    // Insert  
    public function addhouse($hname, $farm_id)
    {
        $add_house = mysqli_query($this->dbcon, "INSERT INTO tbl_house
        (
            house_name,
            farm_id
        )
        VALUES
        (
            '$hname',
            '$farm_id'
        )
        ");
        return $add_house;
    }
    // Update
    public function updatehouse($hname, $id)
    {
        $up_house = mysqli_query($this->dbcon, "UPDATE tbl_house SET 
        house_name = '$hname' 
        WHERE id = '$id'");
        return $up_house;
    }
    // Delete
    public function delhouse($id)
    {
        $del_house = mysqli_query($this->dbcon, "DELETE FROM tbl_house WHERE id='$id'");
        return $del_house;
    }
    // Select all
    public function selhouse($id)
    {
        $sel_house = mysqli_query($this->dbcon, "SELECT * FROM tbl_house  WHERE id='$id'");
        return $sel_house;
    }
}
// ฝูง
class herd extends Database
{
    // Insert 
    // Update
    // Delete
    // Select
}
class specise extends Database
{

    // Insert Picure
    public function addspec_pic($specname, $specdetail, $specpic)
    {
        $add_specpic = mysqli_query($this->dbcon, "INSERT INTO tbl_species
        (
            spec_name,
            spec_detail,
            spec_pic
        )
            VALUES
        (
            '$specname',
            '$specdetail',
            '$specpic'
        )
        ");
        return $add_specpic;
    }
    // Insert No picture
    public function addspec($specname, $specdetail)
    {
        $add_spec = mysqli_query($this->dbcon, "INSERT INTO tbl_species
        (
            spec_name,
            spec_detail
        )
        VALUES
        (
            '$specname',
            '$specdetail'
        )
        ");
        return $add_spec;
    }
    // Update
    public function updatespce_pic($id, $specname, $specdetail, $specpic)
    {
        $up_specpic = mysqli_query($this->dbcon, "UPDATE tbl_species SET
        spec_name = '$specname' ,
        spec_detail ='$specdetail',
        spec_pic = '$specpic'
        
        WHERE id = '$id'
        ");
        return $up_specpic;
    }
    // Update No Picture
    public function updatespec($id, $specname, $specdetail)
    {
        $up_spec = mysqli_query($this->dbcon, "UPDATE  tbl_species SET 
        spec_name = '$specname' ,
        spec_detail ='$specdetail' 
          
        WHERE id = '$id' 
        ");
        return $up_spec;
    }
    // Delete
    public function delspec($id)
    {
        $del_spec = mysqli_query($this->dbcon, "DELETE FROM tbl_species WHERE id='$id'");
        return $del_spec;
    }
    // Select ALL
    public function selspec()
    {
        $sel_spec = mysqli_query($this->dbcon, "SELECT * FROM tbl_species  ");
        return $sel_spec;
    }
    // Select Id 
    public function selectid($id)
    {
        $selspec_id = mysqli_query($this->dbcon, "SELECT * FROM tbl_species WHERE id = '$id' ");
        return $selspec_id;
    }
}
class cow extends Database
{
    // Insert
    public function addcow()
    {
        $add_cow = mysqli_query($this->dbcon, "INSERT INTO tbl_cow()   
        VALUES()");
        return $add_cow;
    }
    // Update

    // Delete

    // Select
    public function selcow()
    {
        $sel_cow = mysqli_query($this->dbcon, "SELECT * FROM tbl_cow ");
    }
}
// ผสมพันธุ์
class breed extends Database
{
    // Insert

    // Update

    // Delete

    // Select
}
// Food
class food extends Database
{
}
// Disease
class disease extends Database
{
}
// All Report
class report extends Database
{
    // Select .. 
}

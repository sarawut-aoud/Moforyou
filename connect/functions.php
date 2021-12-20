<?php
require_once 'database.php';
//  สมัคร user
class registra extends Database
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
    public function login($username, $password, $email)
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
// Farmer
class farmer extends Database
{
    //Select 
    public function selectfarmer($id)
    {
        $sel_farmer = mysqli_query($this->dbcon,"SELECT * FROM tbl_farmer WHERE id='$id' ");
        return $sel_farmer;
    }
    // Update Farmer 
    public function updatefarmmer($fname, $phone, $email, $pic)
    {
        $upfarmmer = mysqli_query($this->dbcon, "UPDATE");
    }
}
// ฟาร์ม
class farm extends Database
{
    // Resgistration Farm
    public function registerfarm()
    {
        $regfarm = mysqli_query($this->dbcon, "INSERT INTO tbl_farm()VALUES()");
        return $regfarm;
    }
    // Check Resgistration Farm
    public function checkregisfarm($id)
    {
        $checkfarm = mysqli_query($this->dbcon, "SELECT * FROM tbl_farm WHERE farmmer_id = '$id'");
        return $checkfarm;
    }
    // Update 
    public function updatefarm($farmname, $address, $dis_id, $farmmer_id)
    {
        $upfarm = mysqli_query($this->dbcon, "UPDATE tbl_farm SET farmname ='$farmname',address = '$address',district_id='$dis_id' WHERE farmmer_id='$farmmer_id'");
        return $upfarm;
    }
    //Select
    public function selectfarm($id)
    {
        $sel_farm = mysqli_query($this->dbcon,"SELECT farmname FROM tbl_farm WHERE farmmer_id='$id' ");
        return $sel_farm;
    }
}
// โรงเรือน
class house extends Database
{
    // Insert  
    public function addhouse($hname, $farm_id)
    {
        $add_house = mysqli_query($this->dbcon,"INSERT INTO tbl_house(house_name,farm_id)
            VALUES('$hname','$farm_id')");
        return $add_house;
    }
    // Update
    public function updatehouse($hname, $farm_id)
    {
        $up_house = mysqli_query($this->dbcon, "UPDATE tbl_house SET house_name = '$hname' WHERE farm_id = '$farm_id'");
        return $up_house;
    }
    // Delete
    public function delhouse($id){
        $del_house = mysqli_query($this->dbcon,"DELETE FROM tbl_house WHERE id='$id'");
        return $del_house;
    }
    // Select
    public function selhouse($id){
        $sel_house = mysqli_query($this->dbcon,"SELECT * FROM tbl_house WHERE farm_id='$id'");
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
class specise extends Database{

    // Insert
    public function addspec($specname,$specdetail,$specpic){
        $add_spec = mysqli_query($this->dbcon,"INSERT INTO tbl_species(spec_name,spec_detail,spec_pic)
            VALUES('$specname','$specdetail','$specpic')");
        return $add_spec;
    }
    // Update
    // Delete
    public function delspec($id){
        $del_spec = mysqli_query($this->dbcon,"DELETE FROM tbl_species WHERE id='$id'");
        return $del_spec;
    }
    // Select
    public function selspec(){
        $sel_spec = mysqli_query($this->dbcon,"SELECT * FROM tbl_species");
        return $sel_spec;
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
// All Report
class report extends Database
{
    // Select .. 
}
?>
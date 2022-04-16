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
        $log = mysqli_query($this->dbcon, "SELECT id,fullname,username,password,email,phone,card
        FROM tbl_farmer 
        WHERE username = '" . $username . "' OR email = '$email' AND password = ('" . $password . "')");
        return $log;
    }
    //password 
    public function Getpwd($username, $email)
    {
        $getpass = mysqli_query($this->dbcon, "SELECT username,email,password FROM tbl_farmer WHERE username = '" . $username . "' OR email = '$email' ");
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
    //! login //
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
    //! login //
    //todo Admin manage//
    public function select_allfarmer($id)
    {
        if ($id == '') {
            $data = mysqli_query($this->dbcon, "SELECT * FROM tbl_farmer ORDER BY id ASC  ");
        } else {
            $data = mysqli_query($this->dbcon, "SELECT * FROM tbl_farmer WHERE id='$id' ");
        }
        return $data;
    }
    public function update_farmer($id, $fname, $phone, $email)
    {
        $update = mysqli_query($this->dbcon, "UPDATE tbl_farmer SET  fullname = '$fname' , phone = '$phone' , email = '$email' WHERE id = '$id'");
        return $update;
    }
    public function dels_farmer($id)
    {
        $data = mysqli_query($this->dbcon, "DELETE FROM tbl_farmer WHERE id = '$id' ");
        return $data;
    }
    //todo Admin manage//

    //* Farmmer Setting //
    // Update Farmer No picture
    public function updatefarmmer($id, $fname, $phone, $email)
    {
        $upfarmmer = mysqli_query($this->dbcon, "UPDATE tbl_farmer SET fullname = '$fname' , phone = '$phone' , email = '$email' WHERE id = '$id'");
        return $upfarmmer;
    }
    // Update Farmer Picture
    public function updatefarmmer_pic($id, $fname, $phone, $email, $picture)
    {
        $update_pic = mysqli_query($this->dbcon, "UPDATE tbl_farmer SET fullname = '$fname' , phone = '$phone' , email = '$email' , picture = '$picture' WHERE id = '$id'");
        return $update_pic;
    }
    // Update Password
    public function updatepass($id, $password)
    {
        $up_pass = mysqli_query($this->dbcon, "UPDATE tbl_farmer SET password = '$password'  WHERE id ='$id' ");
        return $up_pass;
    }
    //* Farmmer Setting //

}
// ฟาร์ม
class farm extends Database
{
    // Resgistration Farm
    public function registerfarm($farmname, $address, $district, $farmmer_id)
    {
        $regfarm = mysqli_query($this->dbcon, "INSERT INTO tbl_farm(farmname,address,district_id,farmmer_id)
        VALUES('$farmname','$address','$district','$farmmer_id')");
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
        if ($id == 'admin') {
            $sel_farm = mysqli_query($this->dbcon, "SELECT f.id,f.farmname,f.address,f.district_id,f.farmmer_id,fm.fullname
            FROM tbl_farm  AS f
            INNER JOIN tbl_farmer AS fm 
            ON (f.farmmer_id = fm.id)");
        } else if ($id == '') {
            $sel_farm = mysqli_query($this->dbcon, "SELECT COUNT(id) AS datarow FROM tbl_farm  ");
        } else {
            $sel_farm = mysqli_query($this->dbcon, "SELECT f.id,f.farmname,f.address,f.district_id,f.farmmer_id,fm.fullname
            FROM tbl_farm  AS f
            INNER JOIN tbl_farmer AS fm 
            ON (f.farmmer_id = fm.id)");
        }

        return $sel_farm;
    }
    public function delsfarm($id)
    {
        $del_farm = mysqli_query($this->dbcon, "DELETE FROM tbl_farm WHERE id='$id'");

        return $del_farm;
    }
}
// โรงเรือน
class house extends Database
{
    // Selcet id where Farm_id
    public function gethouseFarmid($id)
    {
        // if(empty($id)){
        //     $sel_houseFid = mysqli_query($this->dbcon, "SELECT * FROM tbl_house ");
        // }else{
        $sel_houseFid = mysqli_query($this->dbcon, "SELECT * FROM tbl_house  WHERE farm_id='$id'");
        // }

        return $sel_houseFid;
    }
    // Insert  
    public function inserthouse($hname, $farm_id)
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
    public function update_house($hname, $id)
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

        return  $del_house;
    }
    // Select all
    public function selecthouse($id)
    {
        if (empty($id)) {
            $sel_house = mysqli_query($this->dbcon, "SELECT id,house_name,farm_id FROM tbl_house  ORDER BY id ASC ");
        } else {
            $sel_house = mysqli_query($this->dbcon, "SELECT id,house_name,farm_id FROM tbl_house  WHERE id='$id'");
        }

        return $sel_house;
    }
}
// ฝูง
class herd extends Database
{
    // Insert 
    public function insert_herd($herdname, $house_id)
    {
        $insert = mysqli_query($this->dbcon, "INSERT INTO tbl_herd (herd_name,house_id) VALUES ('$herdname','$house_id')");
        return $insert;
    }
    // Update
    public function update_herd($hname, $hid, $id)
    {
        $update = mysqli_query($this->dbcon, "UPDATE tbl_herd SET herd_name = '$hname' , house_id = '$hid' WHERE id ='$id' ");
        return $update;
    }
    // Delete
    public function delete_herd($id)
    {
        $delete = mysqli_query($this->dbcon, "DELETE FROM tbl_herd WHERE id='$id'");
        return $delete;
    }
    // Select
    public function sel_herdDel($id)
    {
        $del = mysqli_query($this->dbcon, "SELECT count(house_id) AS rowhid FROM tbl_herd WHERE house_id='$id'");
        return $del;
    }
    public function select_herd($id)
    {
        if (empty($id)) {
            $selectadmin = mysqli_query($this->dbcon, "SELECT herd.id AS id ,herd.herd_name,house.house_name,house.id AS hid
            FROM tbl_herd AS herd 
            INNER JOIN tbl_house AS house 
            ON (herd.house_id = house.id) ORDER BY herd.id ASC ");
        } else {
            $selectadmin = mysqli_query($this->dbcon, "SELECT herd.id AS id ,herd.herd_name,house.house_name,house.id  AS hid
            FROM tbl_herd AS herd 
            INNER JOIN tbl_house AS house 
            ON (herd.house_id = house.id) 
            WHERE house.id = '$id' 
            ORDER BY herd.id ASC ");
        }
        return $selectadmin;
    }
    public function select_herd_farm($farmid)
    {
        $select = mysqli_query($this->dbcon, "SELECT herd.id AS id ,herd.herd_name,house.house_name,house.id  AS hid
            FROM tbl_herd AS herd 
            INNER JOIN tbl_house AS house 
            ON (herd.house_id = house.id) 
            WHERE house.farm_id = '$farmid' 
            ORDER BY herd.id ASC ");
        return $select;
    }
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
    public function addcow($cow_name, $cow_date, $high, $weight, $cow_father, $cow_mother, $spec_id, $herd_id, $house_id, $gender, $picture)
    {
        if (empty($picture)) {
            $add_cow = mysqli_query($this->dbcon, "INSERT INTO tbl_cow(cow_name,cow_date,high,weight,cow_father,cow_mother,spec_id,herd_id,house_id,gender)   
            VALUES(
                '$cow_name',
                '$cow_date',
                '$high',
                '$weight',
                '$cow_father',
                '$cow_mother',
                '$spec_id',
                '$herd_id',
                '$house_id',
                '$gender'
            )");
        } else {
            $add_cow = mysqli_query($this->dbcon, "INSERT INTO tbl_cow(cow_name,cow_date,high,weight,cow_father,cow_mother,spec_id,herd_id,house_id,gender,cow_pic)   
            VALUES(
                '$cow_name',
                '$cow_date',
                '$high',
                '$weight',
                '$cow_father',
                '$cow_mother',
                '$spec_id',
                '$herd_id',
                '$house_id',
                '$gender',
                '$picture'
            )");
        }

        return $add_cow;
    }
    // Update

    // Delete
    public function delete_cow($id)
    {
        $del = mysqli_query($this->dbcon, "DELETE FROM tbl_cow WHERE id = '$id' ");
        return $del;
    }
    // Select
    public function selectdatacow($id)
    {
        //IF (c.gender = 1 ,'ตัวผู้','ตัวเมีย' ) as gender
        if ($id == 'count') {
            $sel_cow = mysqli_query($this->dbcon, "SELECT count(id) AS datacow FROM tbl_cow ");
        } else {
            $sel_cow = mysqli_query($this->dbcon, "SELECT c.id , c.cow_name , c.high, c.weight, c.spec_id,c.herd_id ,c.house_id,c.cow_father,c.cow_mother,c.cow_date, c.cow_pic, c.gender as gender
       
            FROM tbl_cow AS c 
            INNER JOIN tbl_house as ho ON(c.house_id = ho.id)
            WHERE c.id = $id
            ");
        }
        return $sel_cow;
    }
    public function selectdatacowbyfarmer($id)
    {
        $sel = mysqli_query($this->dbcon, "SELECT c.id , c.cow_name , c.high, c.weight, IF (c.gender = 1 ,'ตัวผู้','ตัวเมีย' ) as gender
       
       FROM tbl_cow AS c 
       INNER JOIN tbl_house as ho ON(c.house_id = ho.id)
       WHERE ho.farm_id = $id
       ");
        return $sel;
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

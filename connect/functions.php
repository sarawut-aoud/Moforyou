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
    // Check pass
    public function checkemail($email)
    {
        $checkuser = mysqli_query($this->dbcon, "SELECT email FROM tbl_farmer WHERE email = '$email'  ");
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
    // recover password
    public function recovepassword($email, $password)
    {
        $pass = mysqli_query($this->dbcon, "UPDATE tbl_farmer SET password = '$password' WHERE email = '$email'");
        return $pass;
    }

    // test pagination 

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

    public function pagin()
    {
        $pag = mysqli_query($this->dbcon, "SELECT f.id, f.farmname , f.district_id , address , fm.fullname ,fm.email,fm.phone FROM tbl_farm as f INNER JOIN tbl_farmer as fm ON (f.farmmer_id = fm.id)");
        return $pag;
    }
    public function pagin_page($start, $perpage)
    {
        $page = mysqli_query($this->dbcon, "SELECT f.id,f.farmname , f.district_id , address , fm.fullname ,fm.email,fm.phone FROM tbl_farm as f INNER JOIN tbl_farmer as fm ON (f.farmmer_id = fm.id) limit {$start},{$perpage} ");
        return $page;
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
            $sel_house = mysqli_query($this->dbcon, "SELECT ho.id,ho.house_name,ho.farm_id,f.farmname 
            FROM tbl_house  as ho 
            INNER JOIN tbl_farm As f ON (ho.farm_id = f.id)
            
            ORDER BY id ASC ");
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
            $selectadmin = mysqli_query($this->dbcon, "SELECT herd.id AS id ,herd.herd_name,house.house_name,house.id AS hid ,f.farmname
            FROM tbl_herd AS herd 
            INNER JOIN tbl_house AS house  
            ON (herd.house_id = house.id) 
            INNER JOIN tbl_farm AS f ON(house.farm_id = f.id)  
            
            ORDER BY herd.id ASC ");
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
    public function pagin()
    {
        $pag = mysqli_query($this->dbcon, "SELECT * FROM tbl_species ");
        return $pag;
    }
    public function pagin_page($start, $perpage)
    {
        $page = mysqli_query($this->dbcon, "SELECT * FROM tbl_species limit {$start},{$perpage} ");
        return $page;
    }
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
    public function pagin()
    {
        $pag = mysqli_query($this->dbcon, "SELECT c.id ,c.cow_name,c.cow_date,c.high ,c.weight ,s.spec_name, if(c.gender =1,'พ่อโค','แม่โค') as gender ,c.cow_pic ,f.farmname
        FROM tbl_cow AS c 
        INNER JOIN tbl_species As s ON(c.spec_id = s.id) 
        INNER JOIN tbl_house AS ho ON(c.house_id = ho.id)
        INNER JOIN tbl_farm AS f ON (ho.farm_id = f.id)
         ");
        return $pag;
    }
    public function pagin_page($start, $perpage)
    {
        $page = mysqli_query($this->dbcon, "SELECT c.id ,c.cow_name,c.high ,c.cow_date,c.weight ,s.spec_name, if(c.gender =1,'พ่อโค','แม่โค') as gender ,c.cow_pic ,f.farmname
        FROM tbl_cow AS c 
        INNER JOIN tbl_species As s ON(c.spec_id = s.id) 
        INNER JOIN tbl_house AS ho ON(c.house_id = ho.id) 
        INNER JOIN tbl_farm AS f ON (ho.farm_id = f.id)
        limit {$start},{$perpage} ");
        return $page;
    }

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
    public function update_cow($cow_name, $cow_date, $high, $weight, $cow_father, $cow_mother, $spec_id, $herd_id, $house_id, $gender, $picture, $cowid)
    {
        if (empty($picture)) {
            $update = mysqli_query($this->dbcon, "UPDATE tbl_cow 
            SET cow_name = '$cow_name' ,
                cow_date = '$cow_date' ,
                high = '$high' ,
                weight='$weight',
                cow_father='$cow_father',
                cow_mother='$cow_mother',
                spec_id='$spec_id',
                herd_id='$herd_id',
                house_id='$house_id',
                gender='$gender'
            WHERE id = '$cowid'
                ");
        } else {
            $update = mysqli_query($this->dbcon, "UPDATE tbl_cow  
            SET cow_name = '$cow_name' ,
                cow_date = '$cow_date' ,
                high = '$high' ,
                weight='$weight',
                cow_father='$cow_father',
                cow_mother='$cow_mother',
                spec_id='$spec_id',
                herd_id='$herd_id',
                house_id='$house_id',
                gender='$gender',
                cow_pic='$picture' 
            WHERE id = '$cowid'
                ");
        }
        return $update;
    }
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
        if (empty($id)) {
            $sel = mysqli_query($this->dbcon, "SELECT c.id , c.cow_name , c.high, c.weight, IF (c.gender = 1 ,'ตัวผู้','ตัวเมีย' ) as gender ,
            sp.spec_name ,DATE_FORMAT(c.cow_date,'%Y-%m-%d') as date ,f.farmname
            FROM tbl_cow AS c 
            INNER JOIN tbl_house as ho ON(c.house_id = ho.id)
            INNER JOIN tbl_species as sp ON(c.spec_id = sp.id)
            INNER JOIN tbl_farm as f ON(ho.farm_id = f.id)
            
           ");
        } else {
            $sel = mysqli_query($this->dbcon, "SELECT c.id , c.cow_name , c.high, c.weight, IF (c.gender = 1 ,'ตัวผู้','ตัวเมีย' ) as gender ,
            sp.spec_name ,DATE_FORMAT(c.cow_date,'%Y-%m-%d') as date
            FROM tbl_cow AS c 
            INNER JOIN tbl_house as ho ON(c.house_id = ho.id)
            INNER JOIN tbl_species as sp ON(c.spec_id = sp.id)
            WHERE ho.farm_id = $id
           ");
        }

        return $sel;
    }

    public function datecow($farm_id)
    {
        $func = mysqli_query($this->dbcon, "SELECT c.id,DATE_FORMAT(DATE_ADD(c.cow_date,INTERVAL 18 MONTH),'%Y-%m-%d') as cow_date_add , DATE_FORMAT(c.cow_date,'%Y-%m-%d') as cow_date 
        FROM tbl_cow AS c 
        INNER JOIN tbl_house as ho ON (c.house_id = ho.id ) 
        WHERE ho.farm_id = $farm_id AND gender = '2' ");
        return $func;
    }
    public function selectcow_forbreed_male($farm_id)
    {
        $sel = mysqli_query($this->dbcon, "SELECT c.id ,c.cow_name FROM tbl_cow AS c 
        INNER JOIN tbl_house as ho ON (c.house_id = ho.id ) 
        WHERE ho.farm_id = $farm_id AND c.gender = '1' ");
        return  $sel;
    }
    public function selectcow_forbreed_female($farm_id, $cowid)
    {

        $sel = mysqli_query($this->dbcon, "SELECT c.id ,c.cow_name FROM tbl_cow AS c 
                INNER JOIN tbl_house as ho ON (c.house_id = ho.id ) 
                WHERE ho.farm_id = $farm_id AND c.gender = '2' AND c.id = $cowid  AND c.weight >= '270' ");
        return  $sel;
    }
}
// ผสมพันธุ์
class breed extends Database
{
    // Insert
    public function insertbreed($datestart, $datenext, $farm_id, $female, $male)
    {

        $insert = mysqli_query($this->dbcon, "INSERT INTO tbl_breed(breed_date,breed_date_next,farm_id,cow_id_male,cow_id_female)
            VALUES
            (
                '$datestart',
                '$datenext',
                '$farm_id',
                '$male',
                '$female'
            )
            ");

        return $insert;
    }


    // Select
    public function select_breed_all($farm_id)
    {
        if (empty($farm_id)) {
            $breed = mysqli_query($this->dbcon, "SELECT  be.id , be.breed_date , be.breed_date_next AS breednext , 
            be.farm_id , be.cow_id_male As cowmale ,be.cow_id_female AS cowfemale ,
            cm.cow_name AS namemale,cf.cow_name AS namefemale
            FROM tbl_breed AS be
            INNER JOIN tbl_cow  as cm on(be.cow_id_male=cm.id ) 
            INNER JOIN tbl_cow  as cf on(be.cow_id_female=cf.id )
           ");
        } else {
            $breed = mysqli_query($this->dbcon, "SELECT be.id , be.breed_date , be.breed_date_next AS breednext , 
            be.farm_id , be.cow_id_male As cowmale ,be.cow_id_female AS cowfemale ,
            cm.cow_name AS namemale,cf.cow_name AS namefemale  
            FROM tbl_breed AS be
            INNER JOIN tbl_cow  as cm on(be.cow_id_male=cm.id ) 
            INNER JOIN tbl_cow  as cf on(be.cow_id_female=cf.id )
            WHERE be.farm_id = $farm_id 
            ");
        }
        return $breed;
    }
    public function select_breed($id)
    {
        $selectbreed = mysqli_query($this->dbcon, "SELECT be.id , be.breed_date AS breed_date , be.breed_date_next AS breednext ,
        be.farm_id , be.cow_id_male AS cowmale ,be.cow_id_female AS cowfemale 
        FROM tbl_breed AS be
        WHERE be.id = $id
        ");
        return $selectbreed;
    }
    // Delete
    public function delete_breed($id)
    {
        $deletebreed = mysqli_query($this->dbcon, "DELETE FROM tbl_breed WHERE id ='$id'");
        return $deletebreed;
    }
    // Update

    public function update_breed($id, $cowidmale, $cowidfemale)
    {
        $updatecow = mysqli_query($this->dbcon, "UPDATE tbl_breed SET
        cow_id_male = '$cowidmale' ,
        cow_id_female ='$cowidfemale'
        
        
        WHERE id = '$id'
        ");
        return $updatecow;
    }
}

class doctor extends Database
{
    public function insert_doc($name, $phone, $farm_id)
    {
        $ins = mysqli_query($this->dbcon, "INSERT INTO tbl_doctor(name,phone,farm_id)
        VALUES('$name','$phone','$farm_id')
        ");
        return $ins;
    }
    public function update_doc($name, $phone, $docid)
    {
        $upd = mysqli_query($this->dbcon, "UPDATE tbl_doctor 
        SET name = '$name',
            phone = '$phone'
        WHERE id = '$docid'
        ");
        return $upd;
    }
    public function delete_doc($docid)
    {
        $d = mysqli_query($this->dbcon, "DELETE FROM tbl_doctor WHERE id = '$docid' ");

        return $d;
    }
    public function select_doc($docid)
    {
        if (empty($docid)) {
            $s = mysqli_query($this->dbcon, "SELECT id,name,phone,farm_id FROM tbl_doctor ");
        } else {
            $s = mysqli_query($this->dbcon, "SELECT id,name,phone,farm_id FROM tbl_doctor WHERE id = '$docid' ");
        }

        return $s;
    }
    public function select_docbyfarm($farm_id)
    {

        $s = mysqli_query($this->dbcon, "SELECT id,name,phone,farm_id FROM tbl_doctor WHERE farm_id = '$farm_id'");

        return $s;
    }
}
// Food
class food extends Database
{
    public function insert_food($name, $farm_id)
    {
        $ins = mysqli_query($this->dbcon, "INSERT INTO tbl_food(name,farm_id) VALUES ('$name','$farm_id') ");
        return $ins;
    }

    public function update_food($name, $id)
    {
        $upd = mysqli_query($this->dbcon, "UPDATE  tbl_food SET name = '$name' WHERE id = '$id' ");
        return $upd;
    }

    public function delete_food($id)
    {
        $del = mysqli_query($this->dbcon, "DELETE FROM tbl_food WHERE id = '$id' ");
        return $del;
    }

    public function select_food($id)
    {
        if (empty($id)) {
            $sel = mysqli_query($this->dbcon, "SELECT id,name FROM tbl_food ");
        } else {
            $sel = mysqli_query($this->dbcon, "SELECT id,name FROM tbl_food  WHERE id = '$id' ");
        }
        return $sel;
    }

    public function select_food2($farm_id)
    {
        if (empty($farm_id)) {
            $sel = mysqli_query($this->dbcon, "SELECT id,name FROM tbl_food ");
        } else {
            $sel = mysqli_query($this->dbcon, "SELECT id,name FROM tbl_food  WHERE farm_id = '$farm_id' ");
        }
        return $sel;
    }
}
// Disease
class disease extends Database
{
    // admin by insert
    public function insert_disease($detail)
    {
        $ins = mysqli_query($this->dbcon, "INSERT INTO tbl_disease(detail) VALUES ('$detail') ");
        return $ins;
    }
    // update by admin
    public function update_disease($detail, $id)
    {
        $upd = mysqli_query($this->dbcon, "UPDATE  tbl_disease SET detail = '$detail' WHERE id = '$id' ");
        return $upd;
    }
    // delete by admin
    public function delete_disease($id)
    {
        $del = mysqli_query($this->dbcon, "DELETE FROM tbl_disease WHERE id = '$id' ");
        return $del;
    }
    // select by admin
    public function select_disease($id)
    {
        if (empty($id)) {
            $sel = mysqli_query($this->dbcon, "SELECT id,detail FROM tbl_disease ");
        } else {
            $sel = mysqli_query($this->dbcon, "SELECT id,detail FROM tbl_disease  WHERE id = '$id' ");
        }
        return $sel;
    }
}
class heal extends Database
{
    public function insert_heal($cowid, $disid, $dismore, $datestart, $docid, $healstart, $healend, $detail, $farm_id)
    {
        if (empty($docid) && empty($healstart) && empty($healend) && empty($detail)) {
            $ins = mysqli_query($this->dbcon, "INSERT INTO tbl_heal(cowid,diseaseid,healmore,datestart,farm_id) 
            VALUES (
                '$cowid',
                '$disid',
                '$dismore',
                '$datestart',
                '$farm_id') ");
        } else {
            $ins = mysqli_query($this->dbcon, "INSERT INTO tbl_heal(cowid,diseaseid,healmore,datestart,doctor_id,healstart,healend,detail,farm_id) 
            VALUES (
                '$cowid',
                '$disid',
                '$dismore',
                '$datestart',
                '$docid',
                '$healstart',
                '$healend',
                '$detail',
                '$farm_id') ");
        }
        return $ins;
    }
    public function update_heal($cowid, $disid, $dismore, $datestart, $docid, $healstart, $healend, $detail, $id)
    {
        if (empty($docid) && empty($healstart) && empty($healend)) {
            $upd = mysqli_query($this->dbcon, "UPDATE tbl_heal 
            SET cowid='$cowid',
                diseaseid='$disid',
                healmore='$dismore',
                datestart='$datestart'   
            WHERE id = '$id' ");
        } else {
            $upd = mysqli_query($this->dbcon, "UPDATE tbl_heal 
            SET cowid='$cowid',
                diseaseid='$disid',
                healmore='$dismore',
                datestart='$datestart',
                doctor_id= '$docid',
                healstart= '$healstart',
                healend= '$healend',
                detail='$detail' 
            WHERE id = '$id'");
        }
        return $upd;
    }
    public function delete_heal($id)
    {
        $del = mysqli_query($this->dbcon, "DELETE FROM tbl_heal WHERE id = '$id' ");
        return $del;
    }
    public function select_heal($id)
    {
        if (empty($id)) {
            $sel = mysqli_query($this->dbcon, "SELECT h.id,h.cowid,h.diseaseid,h.healmore,h.datestart,h.doctor_id,h.healstart,h.healend, h.detail, f.farmname 
            FROM tbl_heal AS h 
            INNER JOIN tbl_farm AS f ON(h.farm_id = f.id)
           ");
        } else {
            $sel = mysqli_query($this->dbcon, "SELECT h.id,h.cowid,h.diseaseid,h.healmore,h.datestart,h.doctor_id,h.healstart,h.healend, h.detail, f.farmname 
            FROM tbl_heal AS h 
            INNER JOIN tbl_farm AS f ON(h.farm_id = f.id)
            WHERE h.id = '$id'
             ");
        }
        return $sel;
    }
    public function select_healbyfarm($farmid)
    {
        $sel = mysqli_query($this->dbcon, "SELECT  h.id,h.healmore,h.datestart,h.healstart,h.healend, h.detail, 
            f.farmname ,c.cow_name, h.doctor_id ,d.detail
            FROM tbl_heal AS h 
            INNER JOIN tbl_farm AS f ON(h.farm_id = f.id) 
            INNER JOIN tbl_cow AS c ON(h.cowid = c.id) 
            INNER JOIN tbl_disease AS d ON(h.diseaseid = d.id) 
            WHERE h.farm_id = '$farmid' ");
        return $sel;
    }
}
class recordfood extends Database
{
    public function insert_record($date, $wei_food, $sumwei_food, $wei_cow, $cowid, $foodid, $farm_id)
    {
        $ins = mysqli_query($this->dbcon, "INSERT INTO tbl_foodrecord(date,weight_food,sumweight_food,weight_cow,cow_id,food_id,farm_id)
        VALUES (
            '$date',
            '$wei_food',
            '$sumwei_food',
            '$wei_cow',
            '$cowid',
            '$foodid',
            '$farm_id'
        )
        ");
        return $ins;
    }
    public function update_record($date, $wei_food, $sumwei_food, $wei_cow, $cowid, $foodid, $id)
    {
        $upd = mysqli_query($this->dbcon, "UPDATE tbl_foodrecord 
            SET date = '$date',
                weight_food='$wei_food',
                sumweight_food='$sumwei_food',
                weight_cow='$wei_cow',
                cow_id ='$cowid',
                food_id='$foodid'
            WHERE id= '$id'
        ");
        return $upd;
    }
    public function delete_record($id)
    {
        $del = mysqli_query($this->dbcon, "DELETE FROM tbl_foodrecord WHERE id = '$id'");
        return $del;
    }
    public function select_sumrecordbyfarm($farm_id, $cow_id)
    {
        $sel = mysqli_query($this->dbcon, "SELECT sumweight_food AS sumweight FROM tbl_foodrecord
        WHERE farm_id = '$farm_id' AND cow_id = '$cow_id'
        ORDER BY sumweight_food DESC
        LIMIT 1;
            
        ");
        return $sel;
    }
    public function alterrecord()
    {
        $alter = mysqli_query($this->dbcon, "ALTER TABLE tbl_foodrecord AUTO_INCREMENT = 1");
        return $alter;
    }
    public function select_recordbyfarm($farm_id)
    {
        $sel = mysqli_query($this->dbcon, "SELECT fr.id,fr.date,fr.weight_food,fr.sumweight_food,fr.weight_cow,fr.cow_id,fr.food_id 
           , c.cow_name , f.name as foodname
            FROM tbl_foodrecord as fr
            INNER JOIN tbl_cow AS c  ON(fr.cow_id = c.id)
            INNER JOIN tbl_food AS f ON (fr.food_id = f.id)
            WHERE fr.farm_id = '$farm_id'
        ");
        return $sel;
    }
    public function select_record($id)
    {
        $sel = mysqli_query($this->dbcon, "SELECT fr.id,fr.date,fr.weight_food,fr.sumweight_food,fr.weight_cow,fr.cow_id,fr.food_id 
           , c.cow_name , f.name as foodname
            FROM tbl_foodrecord as fr
            INNER JOIN tbl_cow AS c  ON(fr.cow_id = c.id)
            INNER JOIN tbl_food AS f ON (fr.food_id = f.id)
            WHERE fr.id = '$id'
        ");
        return $sel;
    }
}
// All Report
class reports extends Database
{
    // user report breed
    public function req_breed($farm_id)
    {
        $re = mysqli_query($this->dbcon, "SELECT b.breed_date 
        ,cm.cow_name as male , cf.cow_name as female
        FROM tbl_breed AS b
        INNER JOIN tbl_cow AS cm ON (b.cow_id_male = cm.id)
        INNER JOIN tbl_cow AS cf ON (b.cow_id_female = cf.id)
        WHERE farm_id = '$farm_id' ORDER BY  b.breed_date DESC LIMIT 1 
        ");
        return $re;
    }
    public function req_countcow($farm_id)
    {
        $re = mysqli_query($this->dbcon, "SELECT count(c.id) as cou_cow 
        FROM tbl_cow as c
        INNER JOIN tbl_house as ho ON (c.house_id = ho.id )
        WHERE ho.farm_id = '$farm_id'");
        return $re;
    }
    public function req_countcowmale($farm_id)
    {
        $re = mysqli_query($this->dbcon, "SELECT count(c.id) as cou_male 
        FROM tbl_cow  as c
        INNER JOIN tbl_house as ho ON (c.house_id = ho.id )
        WHERE ho.farm_id = '$farm_id' AND gender = '1'");
        return $re;
    }
    public function req_countcowfemale($farm_id)
    {
        $re = mysqli_query($this->dbcon, "SELECT count(c.id) as cou_female 
        FROM tbl_cow as c
        INNER JOIN tbl_house as ho ON (c.house_id = ho.id )
        WHERE ho.farm_id = '$farm_id' AND gender = '2'");
        return $re;
    }
    public function req_givefood($farm_id)
    {
        $re = mysqli_query($this->dbcon, "SELECT date,weight_food  FROM tbl_foodrecord WHERE farm_id = '$farm_id' ORDER BY tbl_foodrecord.date DESC LIMIT 1");
        return $re;
    }
    public function req_givefoodcow($farm_id, $date)
    {
        $re = mysqli_query($this->dbcon, "SELECT count(id) AS cow FROM tbl_foodrecord WHERE farm_id = '$farm_id' AND date = '$date' ORDER BY tbl_foodrecord.date DESC");
        return $re;
    }
    public function req_heal($farm_id)
    {
        $re = mysqli_query($this->dbcon, "SELECT  h.healmore,h.healstart,h.healend 
         ,c.cow_name, doc.name as docname ,d.detail ,h.diseaseid as did
        FROM tbl_heal AS h 
        INNER JOIN tbl_farm AS f ON(h.farm_id = f.id) 
        INNER JOIN tbl_cow AS c ON(h.cowid = c.id) 
        INNER JOIN tbl_disease AS d ON(h.diseaseid = d.id) 
        INNER JOIN tbl_doctor AS doc ON(h.doctor_id = doc.id) 
        WHERE h.farm_id = '$farm_id' ");
        return $re;
    }
}

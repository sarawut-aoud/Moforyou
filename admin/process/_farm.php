<?php
error_reporting(~E_NOTICE);
require_once '../../connect/functions.php';
$get_tombon = file_get_contents('https://raw.githubusercontent.com/sarawut-pcru/Thailand_Map/main/json/tombon.json');
$sql = new farm();


$func = $_REQUEST['function'];


if (isset($func) && $func == 'showeditFarm') {

    $i = 0;
    $id = $_GET['id'];
    $query = $sql->selectfarmbyid($id);
    while ($row = $query->fetch_object()) {
        $tombon = json_decode($get_tombon);
        foreach ($tombon as $value) {
            if ($row->district_id == $value->id) { //? check id amphur
                $name_th =  $value->name_th;
            }
        }
        $userfarmer[$i] = array(
            "id" => intval($row->id),
            "farmname" => $row->farmname,
            "farmadd" => $row->address,
            "amphuer_th" => $name_th,
            "amphuer_id" => $row->district_id,
            "farmername" => $row->fullname,


        );
        $i++;
    }
    if ($userfarmer != null) {
        echo json_encode($userfarmer);
    } else {
        echo json_encode(array());
    }
}

if (isset($func) && $func == 'amphuer') {
    $tombon = json_decode($get_tombon);
    $i = 0;
    foreach ($tombon as $value) {
        //? check id amphur
        $data[$i] = array(
            "name_th" => $value->name_th,
            "amp_id" => $value->id,
        );
        $i++;
    }
    echo json_encode($data);
}



if (isset($func) && $func == 'delsfarm') {
    $id = $_GET['id'];
    $farm = $sql->selectfarmfromcow($id);
    $row = $farm->fetch_object();
    if ($row->farm_id > 0) {
        $msg = array(
            "status" => 0,
            "message" => 'มีการใช้ข้อมูลนี้อยู่ไม่สามารถลบข้อมูลได้',
        );
    } else {
        $query = $sql->delsfarm($id);
        $msg = array(
            "status" => 200,
            "message" => 'ลบข้อมูลแล้ว',
        );
    }



    echo json_encode($msg);
}

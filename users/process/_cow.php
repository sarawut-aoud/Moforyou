<?php
error_reporting(~E_NOTICE);
require_once '../../connect/functions.php';

$sqlhouse = new house();
$sqlherd = new herd();
$sqlspec = new specise();
$sqlcow = new cow();
$id = $_REQUEST['id'];
$func = $_REQUEST['function'];

if ($func == "getdataspecies") {
    $query = $sqlspec->selspec('');
    $i = 0;
    while ($row = $query->fetch_object()) {
        $data[$i] = array(
            "spec_id" => intval($row->id),
            "spec_name" => $row->spec_name,
        );
        $i++;
    }
    echo json_encode($data);
    http_response_code(200);
}
if ($func == "getdatahouse") {
    $query = $sqlhouse->gethouseFarmid($id);
    $i = 0;
    while ($row = $query->fetch_object()) {
        $data[$i] = array(
            "house_id" => intval($row->id),
            "housename" => $row->house_name,
            "farm_id" => intval($row->farm_id),
        );
        $i++;
    }
    echo json_encode($data);
    http_response_code(200);
}
if ($func == "getdataherd") {
    $query = $sqlherd->select_herd($id);
    $i = 0;
    while ($row = $query->fetch_object()) {
        $data[$i] = array(
            "herd_id" => intval($row->id),
            "herdname" => $row->herd_name,
            "house_id" => intval($row->hid),
        );
        $i++;
    }
    if ($data == null) {
        echo json_encode(array());
    } else {
        echo json_encode($data);
        http_response_code(200);
    }
}

if (isset($func) && $func == "showdata") {
    if (empty($id)) {
        $msg = array(
            "error" => true,
            "status" => 0,
            "message" => 'ไม่สามารถลบข้อมูลได้',
        );
        echo json_encode($msg);
        http_response_code(404);
    } else {
        $query = $sqlcow->selectdatacow($id);
        // $i = 0;
        while ($row = $query->fetch_object()) {
            $date = new DateTime($row->cow_date);

            $cowdate = $date->format("Y-m-d");
            $data = array(
                "cow_id" => intval($row->id),
                "cowname" => $row->cow_name,
                "high" => ($row->high),
                "weight" => ($row->weight),
                "spec_id" => intval($row->spec_id),
                "house_id" => intval($row->house_id),
                "herd_id" => intval($row->herd_id),
                "cow_date" => ($cowdate),
                "cow_father" => ($row->cow_father),
                "cow_mother" => ($row->cow_mother),
                "cow_pic" => ($row->cow_pic),
                "cow_gender" => intval($row->gender),
            );
            // $i++;
        }
        echo json_encode($data);
        http_response_code(200);
    }
}

if (isset($func) && $func == 'del') {

    if (empty($id)) {
        $msg = array(
            "error" => true,
            "status" => 0,
            "message" => 'ไม่สามารถลบข้อมูลได้',
        );
        echo json_encode($msg);
        http_response_code(404);
    } else {
        $query = $sqlcow->delete_cow($id);
        $msg = array(
            "status" => 200,
            "message" => 'ลบข้อมูลสำเร็จ',
        );

        echo json_encode($msg);
        http_response_code(200);
    }
}
// parse_str($_POST["formdata"], $_POST);
// //    echo  $file =  $_POST['file'];
//     $namecow =  $_POST['namecow'];
//     $cowdate =  $_POST['cowdate'];
//     $species_id =  $_POST['species_id'];
//     $weightcow =  $_POST['weightcow'];
//     $highcow =  $_POST['highcow'];
//     $fathercow =  $_POST['fathercow'];
//     $mothercow =  $_POST['mothercow'];
//     $house_id =  $_POST['house_id'];
//     $herd_id =  $_POST['herd_id'];
//     $gender =  $_POST['gender'];
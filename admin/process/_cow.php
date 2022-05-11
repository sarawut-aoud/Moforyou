<?php
error_reporting(~E_NOTICE);
require_once '../../connect/functions.php';
$sqlcow = new cow();
$sqlhouse = new house();
$sqlherd = new herd();
$sqlspec = new specise();
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
    // http_response_code(200);
}
if ($func == "getdatahouse") {
    $query = $sqlhouse->selecthouse($id);
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
    // http_response_code(200);
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
        // http_response_code(200);
    }
}

if (isset($func) && $func == "showdata") {
    $id = $_GET['id'];
    if (empty($id)) {
        $msg = array(
            "error" => true,
            "status" => 0,
            "message" => 'ไม่สามารถแก้ไขข้อมูลได้',
        );
        echo json_encode($msg);
        // http_response_code(404);
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
        // http_response_code(200);
    }
}

if (isset($func) && $func == 'del') {
$id = $_REQUEST['id'];
    if (empty($id)) {
        $msg = array(
            "error" => true,
            "status" => 0,
            "message" => 'ไม่สามารถลบข้อมูลได้',
        );
        echo json_encode($msg);
        // http_response_code(404);
    } else {
        $cow = $sqlcow->selectcowfrombreed($id);
        $row = $cow->fetch_object();
        if ($row->cow_id > 0) {
            $msg = array(
                "status" => 0,
                "message" => 'มีการใช้งานข้อมูลนี้อยู่ไม่สามารถลบข้อมูลได้',
            );
        } else {
            $pic = $sqlcow->selectdatacow($id);
            $result = $pic->fetch_object();

            if ($result->cow_pic != null) {
                @unlink("../../dist/img/cow_upload/$result->cow_pic");
                $query = $sqlcow->delete_cow($id);
                $msg = array(
                    "status" => 200,
                    "message" => 'ลบข้อมูลสำเร็จ',
                );
            } else {
                $query = $sqlcow->delete_cow($id);
                $msg = array(
                    "status" => 200,
                    "message" => 'ลบข้อมูลสำเร็จ',
                );
            }
        }

        echo json_encode($msg);
        // http_response_code(200);
    }
}

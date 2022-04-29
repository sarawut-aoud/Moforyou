<?php
error_reporting(~E_NOTICE);
require_once '../../connect/functions.php';


$func = $_REQUEST['function'];
$sql = new recordfood();
if (isset($func) && $func == 'showfood') {
    $food = new food();
    $farmid = $_GET['farm_id'];
    $i = 0;
    $query = $food->select_food2($farmid);
    while ($row = $query->fetch_object()) {
        $data[$i] = array(
            "id" => intval($row->id),
            "name" => $row->name,
        );
        $i++;
    }
    echo json_encode($data);
    http_response_code(200);
}
if (isset($func) && $func == 'showcow') {
    $cow = new cow();
    $farmid = $_GET['farm_id'];
    $i = 0;
    $query = $cow->selectdatacowbyfarmer($farmid);
    while ($row = $query->fetch_object()) {
        $data[$i] = array(
            "id" => intval($row->id),
            "cowname" => $row->cow_name,
            "weight" => $row->weight,
        );
        $i++;
    }
    echo json_encode($data);
    http_response_code(200);
}

if (isset($func) && $func == 'insert') {
    $foodid = $_POST['foodid'];
    $wei_food = $_POST['foodweight'];
    $wei_cow = $_POST['cow_weight'];
    $cowid = $_POST['cowid'];
    $date = $_POST['date'];
    $farm_id = $_POST['farm_id'];

    if (empty($foodid) || empty($wei_food) || empty($wei_cow) || empty($cowid) || empty($farm_id) || empty($date)) {
        $msg = array(
            "status" => 0,
            "message" => 'ไม่สามารถบันทึกข้อมูลได้',
        );
    } else {
        $querysum = $sql->select_sumrecordbyfarm($farm_id, $cowid);
        $sum = $querysum->fetch_object();
        if ($sum->sumweight == null) {
            $sumwei_food = 0 + $wei_food;
        } else {
            $sumwei_food = $sum->sumweight + $wei_food;
        }

        $query = $sql->insert_record($date, $wei_food, $sumwei_food, $wei_cow, $cowid, $foodid, $farm_id);
        $msg = array(
            "status" => 200,
            "message" => 'บันทึกข้อมูลสำเร็จ',
        );
    }
    echo json_encode($msg);
    http_response_code(200);
}
if (isset($func) && $func == 'insertall') {
    $foodid = $_POST['foodid'];
    $wei_food = $_POST['foodweight'];
    $date = $_POST['date'];
    $farm_id = $_POST['farm_id'];

    if (empty($foodid) || empty($wei_food) || empty($farm_id) || empty($date)) {
        $msg = array(
            "status" => 0,
            "message" => 'ไม่สามารถบันทึกข้อมูลได้',
        );
    } else {
        $sqlcow = new cow();
        $querycow = $sqlcow->selectdatacowbyfarmer($farm_id);
        while ($rows = $querycow->fetch_object()) {
            $querysum = $sql->select_sumrecordbyfarm($farm_id, $rows->id);
            $sum = $querysum->fetch_object();
            if ($sum->sumweight == null) {
                $sumwei_food = 0 + $wei_food;
            } else {
                $sumwei_food = $sum->sumweight + $wei_food;
            }

            $query = $sql->insert_record($date, $wei_food, $sumwei_food, $rows->weight, $rows->id, $foodid, $farm_id);
            $msg = array(
                "status" => 200,
                "message" => 'บันทึกข้อมูลสำเร็จ',
            );
        }
    }
    echo json_encode($msg);
    http_response_code(200);
}
if (isset($func) && $func == 'showdata') {
    $id = $_GET['id'];
    $query = $sql->select_record($id);
    while ($row = $query->fetch_object()) {
        $data = array(
            "id" => intval($row->id),
            "cowid" => intval($row->cow_id),
            "foodid" => intval($row->food_id),
            "date" => ($row->date),
            "cow_weight" => ($row->weight_cow),
            "foodweight" => ($row->weight_food),
        );
    }
    echo json_encode($data);
    http_response_code(200);
}
if (isset($func) && $func == 'update') {
    $foodid = $_POST['foodid'];
    $wei_food = $_POST['foodweight'];
    $wei_cow = $_POST['cow_weight'];
    $cowid = $_POST['cowid'];
    $date = $_POST['date'];
    $farm_id = $_POST['farm_id'];
    $racordid = $_POST['racordid'];
    if (empty($foodid) || empty($wei_food) || empty($wei_cow) || empty($cowid) || empty($farm_id) || empty($date)) {
        $msg = array(
            "status" => 0,
            "message" => 'ไม่สามารถบันทึกข้อมูลได้',
        );
    } else {
        $querysum = $sql->select_sumrecordbyfarm($farm_id, $cowid);
        $sum = $querysum->fetch_object();
        if ($sum->sumweight == null) {
            $sumwei_food = 0 + $wei_food;
        } else {
            $sumwei_food = $sum->sumweight + $wei_food;
        }
        $query = $sql->delete_record($racordid);
        $query = $sql->alterrecord();
        $query = $sql->insert_record($date, $wei_food, $sumwei_food, $wei_cow, $cowid, $foodid, $farm_id);
        $msg = array(
            "status" => 200,
            "message" => 'บันทึกข้อมูลสำเร็จ',
        );
    }
    echo json_encode($msg);
    http_response_code(200);
}
if (isset($func) && $func == 'delete') {
    $id = $_GET['id'];

    if (empty($id)) {
        $data = array(
            "status" => 0,
            "message" => 'ไม่สามารถลบข้อมูลได้',
        );
    } else {
        $query = $sql->delete_record($id);
        $data = array(
            "status" => 200,
            "message" => 'ลบข้อมูลสำเร็จ',
        );
    }
    echo json_encode($data);
    http_response_code(200);
}

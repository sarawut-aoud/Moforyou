<?php
error_reporting(~E_NOTICE);
require_once '../../connect/functions.php';


$sqlhouse = new house();
$sql = new herd();
$id = $_REQUEST['id'];
$func = $_REQUEST['function'];


if ($func == "getdata") {
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
    if ($data == null) {
        echo json_encode(array());
    } else {
        echo json_encode($data);
        http_response_code(200);
    }
}

if ($func == 'insert') {
    $herdname = $_POST['herdname'];
    $house_id = $_POST['house_id'];
    if (empty($herdname) || empty($house_id)) {
        $msg = array(
            "status" => 0,
            "message" => 'ไม่สามารถบันทึกข้อมูลได้',

        );
    } else {
        $query = $sql->insert_herd($herdname, $house_id);
        $msg = array(
            "status" => 200,
            "message" => 'บันทึกข้อมูลสำเร็จ',
        );
    }
    echo json_encode($msg);
    // http_response_code(200);
}
if (isset($func) && $func == 'showdata') {

    if (empty($id)) {
        $msg = array(
            "status" => 0,
            "message" => 'เกิดข้อผิดพลาด',
        );
        echo json_encode($msg);
        http_response_code(404);
    } else {
        $query = $sql->select_herd($id);
        while ($row = $query->fetch_object()) {
            $data = array(
                "herd_id" => intval($row->id),
                "herd_name" => $row->herd_name,
                "house_id" => intval($row->hid),
            );
        }
        echo json_encode($data);
        http_response_code(200);
    }
}


if (isset($func) && $func == 'edit') {
    $id = $_POST['id'];
    $herdname = $_POST['herd_name'];
    $house_id = $_POST['house_id'];
    if (empty($id) || empty($herdname) || empty($house_id)) {
        $msg = array(
            "error" => true,
            "status" => 0,
            "message" => 'ไม่สามารถแก้ไขข้อมูลได้',
        );
        echo json_encode($msg);
        http_response_code(404);
    } else {
        $query = $sql->update_herd($herdname, $house_id, $id);
        $msg = array(
            "status" => 200,
            "message" => 'แก้ไขข้อมูลสำเร็จ',
        );

        echo json_encode($msg);
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
        $query = $sql->delete_herd($id);
        $msg = array(
            "status" => 200,
            "message" => 'ลบข้อมูลสำเร็จ',
        );

        echo json_encode($msg);
        http_response_code(200);
    }
}

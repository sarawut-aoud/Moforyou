<?php
 error_reporting(~E_NOTICE);
require_once '../../connect/functions.php';

$sql = new food();

$func = $_REQUEST['function'];

if (isset($func) && $func == 'insert') {
    $name = $_POST['name'];
    $farm_id = $_POST['farm_id'];

    if (empty($farm_id) || empty($name)) {
        $msg = array(
            "status" => 0,
            "message" => 'ไม่สามารถบันทึกข้อมูลได้',
        );
    } else {
        $query = $sql->insert_food($name, $farm_id);
        $msg = array(
            "status" => 200,
            "message" => 'บันทึกข้อมูลสำเร็จ',
        );
    }
    echo json_encode($msg);
}

// $id = $_REQUEST['id'];
// $func = $_REQUEST['function'];

if (isset($func) && $func == 'show') {
    $id = $_GET['id'];
    $query = $sql->select_food($id);
    

    while ($row = $query->fetch_object()) {
        $data = array(
            "id" => intval($row->id),
            "name" => $row->name,
            
        );
    }
    echo json_encode($data);
}

if (isset($func) && $func == 'edit') {
    $foodid = $_POST['foodid'];
    $name = $_REQUEST['name'];

    if (empty($foodid) || empty($name)) {
        $msg = array(
            "error" => true,
            "status" => 0,
            "message" => 'ไม่สามารถแก้ไขข้อมูลได้',
        );
    } else {
        $query = $sql->update_food($name, $foodid);
        $msg = array(
            "status" => 200,
            "message" => 'แก้ไขข้อมูลสำเร็จ',
        );
    }
    echo json_encode($msg);
}
if (isset($func) && $func == 'delete') {
    $foodid = $_GET['foodid'];

    if (empty($foodid)) {
        $msg = array(
            "error" => true,
            "status" => 0,
            "message" => 'ไม่สามารถลบข้อมูลได้',
        );
    } else {
        $query = $sql->delete_food($foodid);
        $msg = array(
            "status" => 200,
            "message" => 'ลบข้อมูลสำเร็จ',
        );
    }
    echo json_encode($msg);
}

<?php
error_reporting(~E_NOTICE);
require_once '../../connect/functions.php';
$sql = new disease();
$func = $_REQUEST['function'];

if (isset($func) && $func == 'insert') {
    $detail = $_POST['detail'];
    if (empty($detail)) {
        $msg = array(
            "status" => 0,
            "message" => "ไม่สามารถบันทึกข้อมูลได้",
            "error" => true,
        );
    } else {
        $query = $sql->insert_disease($detail);
        $msg = array(
            "status" => 200,
            "message" => "บันทึกข้อมูลสำเร็จ",
        );
    }
    echo json_encode($msg);
    // http_response_code(200);
}
if (isset($func) && $func == 'showdata') {
    $id = $_GET['id'];

    $query = $sql->select_disease($id);
    while ($row = $query->fetch_object()) {
        $data = array(
            "detail" => $row->detail,
            "id" => intval($row->id),
        );
    }
    echo json_encode($data);
    // http_response_code(200);
}
if (isset($func) && $func == 'update') {
    $detail = $_POST['detail'];
    $id =  $_POST['id'];

    if (empty($detail) || empty($id)) {
        $msg = array(
            "status" => 0,
            "message" => "ไม่สามารถแก้ไขข้อมูลได้",
            "error" => true,
        );
    } else {
        $query = $sql->update_disease($detail, $id);
        $msg = array(
            "status" => 200,
            "message" => "แก้ไขข้อมูลสำเร็จ",
        );
    }
    echo json_encode($msg);
    // http_response_code(200);
}
if (isset($func) && $func == 'delete') {

    $id =  $_GET['id'];

    if (empty($id)) {
        $msg = array(
            "status" => 0,
            "message" => "ไม่สามารถลบข้อมูลได้",
            "error" => true,
        );
    } else {
        $dis = $sql->selectdisfromcow($id);
        $row = $dis->fetch_object();
        if ($row->diseaseid > 0) {
            $msg = array(
                "status" => 0,
                "message" => "มีการใช้ข้อมูลนี้อยู่ไม่สามารถลบข้อมูลได้",
            );
        } else {
            $query = $sql->delete_disease($id);
            $msg = array(
                "status" => 200,
                "message" => "ลบข้อมูลสำเร็จ",
            );
        }
    }
    echo json_encode($msg);
    // http_response_code(200);
}

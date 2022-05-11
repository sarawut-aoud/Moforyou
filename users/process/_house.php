<?php
error_reporting(~E_NOTICE);
require_once '../../connect/functions.php';

$sql = new house();

$id = $_REQUEST['id'];
$func = $_REQUEST['function'];

if (isset($id) && $func == 'insert') {
    $housename = $_POST['housename'];

    if (empty($id) || empty($housename)) {
        $msg = array(
            "status" => 0,
            "message" => 'ไม่สามารถบันทึกข้อมูลได้',
        );
    } else {
        $query = $sql->inserthouse($housename, $id);
        $msg = array(
            "status" => 200,
            "message" => 'บันทึกข้อมูลสำเร็จ',
        );
    }
    echo json_encode($msg);
}

// $id = $_REQUEST['id'];
// $func = $_REQUEST['function'];

if (isset($id) && $func == 'show') {
    $query = $sql->selecthouse($id);

    while ($row = $query->fetch_object()) {
        $data = array(
            "house_id" => intval($row->id),
            "housename" => $row->house_name,
            "farm_id" => intval($row->farm_id),
        );
    }
    echo json_encode($data);
}

if (isset($id) && $func == 'edit') {
    $hname = $_REQUEST['housename'];

    if (empty($id) || empty($hname)) {
        $msg = array(
            "error" => true,
            "status" => 0,
            "message" => 'ไม่สามารถแก้ไขข้อมูลได้',
        );
    } else {
        $query = $sql->update_house($hname, $id);
        $msg = array(
            "status" => 200,
            "message" => 'แก้ไขข้อมูลสำเร็จ',
        );
    }
    echo json_encode($msg);
}
if (isset($id) && $func == 'del') {
    $sql_herd = new herd();
    $query_herd = $sql_herd->sel_herdDel($id);
    $result = $query_herd->fetch_object();

    if (($result->rowhid) > 0) {
        $msg = array(
            "status" => 0,
            "message" => 'มีการใช้งานข้อมูลโรงเรือนอยู่',
        );
    } else {
        if (empty($id)) {
            $msg = array(
                "error" => true,
                "status" => 0,
                "message" => 'ไม่สามารถลบข้อมูลได้',
            );
        } else {
            $query = $sql->delhouse($id);
            $msg = array(
                "status" => 200,
                "message" => 'ลบข้อมูลสำเร็จ',
            );
        }
    }


    echo json_encode($msg);
}

<?php
 error_reporting(~E_NOTICE);
require_once '../../connect/functions.php';
$sql = new house();
$sql_herd = new herd();

$id = $_GET['id'];
$func = $_GET['function'];



if (isset($id) && $func == 'showedithouse') {
    $query = $sql->selecthouse($id);
    while ($row = $query->fetch_object()) {
        $userfarmer = array(
            "id" => intval($row->id),
            "house_name" => $row->house_name,
        );
    }

    echo json_encode($userfarmer);
}


if (isset($id) && $func == 'edithouse') {
    $hname = $_GET['hname'];

    if (empty($id) || empty($hname)) {
        $msg = array(
            "status" => 0,
            "message" => 'ไม่สามารถแก้ไขข้อมูลได้',
        );
    } else {
        $query = $sql->update_house($hname, $id);
        $msg = array(
            "status" => 200,
            "message" => 'แก้ไข้ข้อมูลสำเร็จ',
        );
    }
    echo json_encode($msg);
}



if (isset($id) && $func == 'delshouse') {

    $query_herd = $sql_herd->sel_herdDel($id);
    $result = $query_herd->fetch_object();

    if (($result->rowhid) > 0) {
        $msg = array(
            "status" => 400,
            "message" => 'มีการใช้งานข้อมูลโรงเรือนอยู่',
        );
    } else {
        $query = $sql->delhouse($id);
        $msg = array(
            "status" => 200,
            "message" => 'ลบข้อมูลแล้ว',
        );
    }
    echo json_encode($msg);
}

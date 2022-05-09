<?php
error_reporting(~E_NOTICE);
require_once '../../connect/functions.php';
$sql = new herd();


$func = $_REQUEST['function'];

if (isset($func) && $func == 'showeditherd') {
    $id = $_GET['id'];
    $query = $sql->select_herd($id);
    while ($row = $query->fetch_object()) {
        $data = array(
            "id" => intval($row->id),
            "herd_name" => $row->herd_name,
            "house_id" => intval($row->hid),
        );
    }

    echo json_encode($data);
}
if ($func == '') {
    $sql2 = new house();
    $query = $sql2->selecthouse('');
    $i = 0;
    while ($row = $query->fetch_object()) {
        $userfarmer[$i] = array(
            "id" => intval($row->id),
            "house_name" => $row->house_name,
        );
        $i++;
    }

    echo json_encode($userfarmer);
}

if (isset($func) && $func == 'modaleditherd') {
    $id = $_GET['id'];
    $hname = $_GET['hname'];
    $hid = $_GET['IDHouse'];
    if (empty($id) || empty($hname) || empty($hid)) {
        $msg = array(
            "status" => 0,
            "message" => 'ไม่สามารถแก้ไขข้อมูลได้',
        );
    } else {
        $query = $sql->update_herd($hname, $hid, $id);
        $msg = array(
            "status" => 200,
            "message" => 'แก้ไข้ข้อมูลสำเร็จ',
        );
    }
    echo json_encode($msg);
}



if (isset($func) && $func == 'delsherd') {
    $id = $_GET['id'];
    $herdcheck = $sql->selectherdfromcow($id);
    $row = $herdcheck->num_rows;
    if ($row > 0) {
        $msg = array(
            "status" => 0,
            "message" => 'มีการใช้งานข้อมูลนี้อยู่ไม่สามารถลบข้อมูลได้',
        );
    } else {
        $query = $sql->delete_herd($id);
        $msg = array(
            "status" => 200,
            "message" => 'ลบข้อมูลแล้ว',
        );
    }

    echo json_encode($msg);
}

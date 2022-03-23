<?php
require_once '../../connect/functions.php';
$sql = new herd();

$id = $_GET['id'];
$func = $_GET['function'];

if (isset($id) && $func == 'showeditherd') {
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


if (isset($id) && $func == 'editherd') {
    $hname = $_GET['hname'];
    $hid = $_GET['hid'];
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



if (isset($id) && $func == 'delsherd') {

    $querydata = $sql->delete_herd($hid);

    $query = $sql->delete_herd($id);
    $msg = array(
        "status" => 0,
        "message" => 'ลบข้อมูลแล้ว',
    );

    echo json_encode([$msg]);
}

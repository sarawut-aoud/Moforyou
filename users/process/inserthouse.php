<?php
require_once '../../connect/functions.php';

$sql = new house();

$id = $_POST['id'];
$func = $_POST['function'];

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

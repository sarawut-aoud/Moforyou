<?php
require_once '../../connect/functions.php';
$sql = new house();

$id = $_GET['id'];
$func = $_GET['function'];

if(isset($id) && $func == 'edithouse'){
    $query = $sql->selecthouse($id);
    while ($row = $query->fetch_object()) {
        $userfarmer = array(
            "id" => intval($row->id),
            "house_name" => $row->house_name,
        );
    }
 
    echo json_encode($userfarmer); 
}
if(isset($id) && $func == 'delshose'){
    $query = $sql->delhouse($id);
        $msg = array(
            "message" =>'ลบข้อมูลแล้ว',
        );

 
    echo json_encode($msg);
}
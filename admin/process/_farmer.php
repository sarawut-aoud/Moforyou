<?php
require_once '../../connect/functions.php';
$sql = new farmer();

$id = $_GET['id'];
$func = $_GET['function'];

if(isset($id) && $func == 'editfarmer'){
    $query = $sql->select_allfarmer($id);
    while ($row = $query->fetch_object()) {
        $userfarmer = array(
            "id" => intval($row->id),
            "fullname" => $row->fullname,
            "email" => $row->email,
            "phone" => ($row->phone),
            "person_id" =>   base64_encode(base64_encode(intval($row->card))),
        );
    }
 
    echo json_encode($userfarmer); 
}
if(isset($id) && $func == 'delsfarmer'){
    $query = $sql->dels_farmer($id);
        $msg = array(
            "message" =>'ลบข้อมูลแล้ว',
        );

 
    echo json_encode($msg); 
}


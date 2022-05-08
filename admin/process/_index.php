<?php
 error_reporting(~E_NOTICE);
require_once '../../connect/functions.php';
$sql_farmer = new farmer();
$sql_farm = new farm();
$sql_cow = new cow();

//  $id ='7';
$func = $_REQUEST['function'];
$userfarmer = array();
if (isset($func) && $func == 'showdatauser') {
    $query = $sql_farmer->select_allfarmer('');
    $i = 0;
    while ($row = $query->fetch_object()) {
        $userfarmer[$i] = array(
            "id" => $row->id,
            "fullname" => $row->fullname,
            "email" => $row->email,
            "phone" => $row->phone,
            "person_id" => ($row->card),
        );
        $i++;
    }

    echo json_encode($userfarmer);
}

if (isset($func) && $func == 'showdatafarm') {
    $query = $sql_farm->selectfarm('');
    while ($row = $query->fetch_object()) {
        $data = array(
            "datarow" => intval($row->datarow),
        );
    }

    echo json_encode($data);
}


if (isset($func) && $func == 'showcowdata') {
    $query = $sql_cow->selectdatacow('count');
   
    while ($row = $query->fetch_object()) {
        $data = array(
            "datarow" => intval($row->datacow),
        );
    }

    echo json_encode($data);
}

<?php
require_once '../../connect/functions.php';
$sql_farmer = new farmer();
$sql_farm = new farm();
$id = $_GET['id'];
//  $id ='7';
$func = $_GET['function'];
$userfarmer = array();
if (isset($id) && $func == 'showdatauser') {
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

if (isset($id) && $func == 'showdatafarm') {
    $query = $sql_farm->selectfarm('');
    $i = 0;

    while ($row = $query->fetch_row()) {

        $data[$i] = array(
            "row" => $i,
            "id" => $row['0'],
            "farmname" => $row['1'],
            "address" => $row['2'],
            "amphure" => $row['3'],


        );
        $i++;
    }


    echo json_encode($data);
}

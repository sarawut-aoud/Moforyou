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
    $query = $sql_farmer->select_allfarmer('', '');
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
if (isset($func) && $func == 'barchartbreed1') {

    $month = $_GET['month'];
    $year = $_GET['year'];
    $spec_id = $_GET['spec'];

    $sql = new breed();
    $i = 0;
    $query = $sql->req_breed_spec($year, $month, $spec_id);
    while ($row = $query->fetch_object()) {
        $data[$i] = array(
            "specname" => $row->spec_name,
            "numbreed" => $row->numbreed . "ตัว",
        );
        echo json_encode($data);
        $i++;
    }
}
if (isset($func) && $func == 'barchartbreed2') {

    $month = $_GET['month'];
    $year = $_GET['year'];
    $farm = $_GET['farm'];

    $sql = new breed();
    $i = 0;
    $query = $sql->req_breed_farm($year, $month, $farm);
    while ($row = $query->fetch_object()) {
        $data[$i] = array(
            "farmname" => $row->farmname,
            "numbreed" => $row->numbreed . "ตัว",
        );
        echo json_encode($data);

        $i++;
    }
}

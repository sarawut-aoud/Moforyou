<?php
// error_reporting(~E_NOTICE);
require_once '../../connect/functions.php';

$sqlhouse = new house();
$sqlherd = new herd();
$sqlspec = new specise();

$id = $_REQUEST['id'];
$func = $_REQUEST['function'];

if ($func == "getdataspecies") {
    $query = $sqlspec->selspec('');
    $i = 0;
    while ($row = $query->fetch_object()) {
        $data[$i] = array(
            "spec_id" => intval($row->id),
            "spec_name" => $row->spec_name,
        );
        $i++;
    }
    echo json_encode($data);
    http_response_code(200);
}
if ($func == "getdatahouse") {
    $query = $sqlhouse->gethouseFarmid($id);
    $i = 0;
    while ($row = $query->fetch_object()) {
        $data[$i] = array(
            "house_id" => intval($row->id),
            "housename" => $row->house_name,
            "farm_id" => intval($row->farm_id),
        );
        $i++;
    }
    echo json_encode($data);
    http_response_code(200);
}
if ($func == "getdataherd") {
    $query = $sqlherd->select_herd($id);
    $i = 0;
    while ($row = $query->fetch_object()) {
        $data[$i] = array(
            "herd_id" => intval($row->id),
            "herdname" => $row->herd_name,
            "house_id" => intval($row->hid),
        );
        $i++;
    }
    echo json_encode($data);
    http_response_code(200);
}

// if (isset($func) && $func == "insert") {
//     parse_str($_POST["formdata"], $_POST);
// //    echo  $file =  $_POST['file'];
//     $namecow =  $_POST['namecow'];
//     $cowdate =  $_POST['cowdate'];
//     $species_id =  $_POST['species_id'];
//     $weightcow =  $_POST['weightcow'];
//     $highcow =  $_POST['highcow'];
//     $fathercow =  $_POST['fathercow'];
//     $mothercow =  $_POST['mothercow'];
//     $house_id =  $_POST['house_id'];
//     $herd_id =  $_POST['herd_id'];
//     $gender =  $_POST['gender'];
    
// }

<?php
error_reporting(~E_NOTICE);
require_once '../../connect/functions.php';

$sql = new disease();
$func = $_REQUEST['function'];

if (isset($func) && $func == 'showcow') {
    $cow = new cow();
    $farmid =$_GET['farmid'];
    $query = $cow->selectdatacowbyfarmer($farmid);
    $i = 0;
    while ($row = $query->fetch_object()) {
        $data[$i] = array(
            "id" => intval($row->id),
            "cowname" => $row->cow_name,
        );
        $i++;
    }
    echo json_encode($data);
    http_response_code(200);
}
if (isset($func) && $func == 'showdoctor') {
    $cow = new doctor();
    $farmid =$_GET['farmid'];
    $query = $cow->select_docbyfarm($farmid);
    $i = 0;
    while ($row = $query->fetch_object()) {
        $data[$i] = array(
            "id" => intval($row->id),
            "name" => $row->name,
        );
        $i++;
    }
    echo json_encode($data);
    http_response_code(200);
}

if (isset($func) && $func == 'showdisease') {
    $query = $sql->select_disease('');
    $i = 0;
    while ($row = $query->fetch_object()) {
        $data[$i] = array(
            "id" => intval($row->id),
            "detail" => $row->detail,
        );
        $i++;
    }
    echo json_encode($data);
    http_response_code(200);
}

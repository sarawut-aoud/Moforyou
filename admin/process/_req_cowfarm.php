<?php
error_reporting(~E_NOTICE);
require_once '../../connect/functions.php';

$func = $_REQUEST['function'];

if (isset($func) && $func == 'showcow') {
    $farm_id = $_GET['farm_id'];
    $sql = new reports();
    $query = $sql->req_countcow($farm_id);
    $row = $query->fetch_object();
    $data = array(
        "farmname" => $row->farmname,
        "cow" => $row->cou_cow,
    );
    echo json_encode($data);
    http_response_code(200);
}

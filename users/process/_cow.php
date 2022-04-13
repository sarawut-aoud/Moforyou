<?php 
 error_reporting(~E_NOTICE);
 require_once '../../connect/functions.php';
 
 $sqlhouse = new house();
 $sqlherd = new herd(); 

 $id = $_REQUEST['id'];
$func = $_REQUEST['function'];

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
<?php
error_reporting(~E_NOTICE);
require_once '../../connect/functions.php';

$func = $_REQUEST['function'];
$sql = new reports();
if (isset($func) && $func  == 'breed') {
    $farm = $_GET['farm_id'];
    $query  = $sql->req_breed($farm);
    $row = $query->fetch_object();
    $data = array(
        "date2" => $row->breed_date,
        "namemale2" => $row->male,
        "namefemale2" => $row->female
    );
    echo json_encode($data);
    // http_response_code(200);
}
if (isset($func) && $func  == 'cow') {
    $farm = $_GET['farm_id'];
    $query  = $sql->req_countcow($farm);
    $query2  = $sql->req_countcowmale($farm);
    $query3  = $sql->req_countcowfemale($farm);
    $row = $query->fetch_object();
    $row2 = $query2->fetch_object();
    $row3 = $query3->fetch_object();
    $data = array(
        "cou_cow" => $row->cou_cow,
        "cou_male" => $row2->cou_male,
        "cou_female" => $row3->cou_female
    );
    echo json_encode($data);
    // http_response_code(200);
}
if (isset($func) && $func  == 'food') {
    $farm = $_GET['farm_id'];
    $query  = $sql->req_givefood($farm);
    $row = $query->fetch_object();
    $data = array(
        "date" => $row->date,
        "weight_food" => $row->weight_food,
        "cow" => $row->cow
    );
    echo json_encode($data);
    // http_response_code(200);
}
if (isset($func) && $func  == 'foodcow') {
    $farm = $_GET['farm_id'];
    $date = $_GET['date'];
    $query  = $sql->req_givefoodcow($farm, $date);
    $row = $query->fetch_object();
    $data = array(
        "cow" => $row->cow
    );
    echo json_encode($data);
    // http_response_code(200);
}
if (isset($func) && $func  == 'heal') {
    $farm = $_GET['farm_id'];

    $query  = $sql->req_heal($farm);
    $row = $query->fetch_object();
    $data = array(
        "date" => $row->healstart,
        "cow" => $row->cow_name,
        "heal" => $row->healmore,
        "dis" => $row->did,
        "docname" => $row->docname,
    );
    echo json_encode($data);
    // http_response_code(200);
}

if (isset($func) && $func == 'showdisease') {
    $sql = new disease();
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
    // http_response_code(200);
}
if (isset($func) && $func == 'barchart') {
    $sql = new reports();
    $sqlcow = new cow();
    $year = date('Y');
    $i = 0;
    $farm_id = $_REQUEST['farm_id'];
    $x = 1;
    $total = 0;
    $month = $_REQUEST['month'];;
    $query = $sqlcow->selectdatacowbyfarmer($farm_id);
    while ($row = $query->fetch_object()) {
        $query2 = $sql->req_recordfood_30($row->id, $year, $month); //? เอาเฉพาะ วันที่ 30 or 31 ของเดือน

        while ($row2 = $query2->fetch_object()) {


            $query3 = $sql->req_recordfood_1($row->id, $year, $month); //? เอาเฉพาะ วันที่ 1 ของเดือน


            while ($row3 = $query3->fetch_object()) {
                $sum = ($row2->weight_cow - $row3->weight_cow) / $row2->sumweight_food;
                $data[$i] = array(
                    "name" => $row->cow_name,
                    "weight" => $sum,
                    
                );
                $i++;
            }
        }
    }
    
   
    echo json_encode($data);
}

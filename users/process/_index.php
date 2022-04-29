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
    http_response_code(200);
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
    http_response_code(200);
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
    http_response_code(200);
}
if (isset($func) && $func  == 'foodcow') {
    $farm = $_GET['farm_id'];
    $date = $_GET['date'];
    $query  = $sql->req_givefoodcow($farm,$date);
    $row = $query->fetch_object();
    $data = array(
        "cow" => $row->cow
    );
    echo json_encode($data);
    http_response_code(200);
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
    http_response_code(200);
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
    http_response_code(200);
}
// $query = $sql->req_cow(3);
// $sqlspec = new specise();
// $i = 0;
// while ($row = $query->fetch_object()) {
//     $id[$i] = $row->id;
//     $query_s = $sqlspec->selectid($id[$i]);
//     $rows = $query_s->fetch_array();
//     $rs[$i] = $rows['id'];
//     if ($rs[$i] == $id[$i]) {
//         echo $rows['spec_name'];
//         $data = array(
//             "s_name" => $rows->spec_name,

//         );
//     }

//     $i++;
// }

// echo $count;

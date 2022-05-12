<?php

require_once 'connect/functions.php';
$farm_id = 1;
$sql = new reports();
    $sqlcow = new cow();
    $year = date('Y');
    $i = 0;
    $x = 1;
    $total = 0;
    $month = date('m');
    $query = $sqlcow->selectdatacowbyfarmer($farm_id);
    while ($row = $query->fetch_object()) {
        $query2 = $sql->req_recordfood_30($row->id, $year, $month); //? เอาเฉพาะ วันที่ 30 or 31 ของเดือน

        while ($row2 = $query2->fetch_object()) {


            $query3 = $sql->req_recordfood_1($row->id, $year, $month); //? เอาเฉพาะ วันที่ 1 ของเดือน


            while ($row3 = $query3->fetch_object()) {
                $sum = ($row2->weight_cow - $row3->weight_cow) / $row2->sumweight_food;
                $data[$i] = array(
                    "name" => ($row->name),
                    "sum" => $sum,
                );
                echo $sum;
            }
        }
    }

    $i++;

// $query3 = $sql->req_recordfood_1($row->id, $year, $startmonth);
// while ($row3 = $query3->fetch_object()) {

//     $sum[$i] = ($row2->weight_cow - $row3->weight_cow) / $row2->sumweight_food;
//     echo "<pre>";
//     print_r($row2);
//     print_r($row3);
//     echo "</pre>";
//     echo sprintf('%.2f', $sum[$i]);
// }
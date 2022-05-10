<?php

require_once 'connect/functions.php';
$farm_id = 3;
$sql = new reports();
$sqlcow = new cow();
$query = $sqlcow->selectdatacowbyfarmer($farm_id);
$year = date('Y');
$i = 0;
$x = 1;
$total = 0;

$startmonth = 1;
$endmonth = 12;
while ($row = $query->fetch_object()) {
    for ($startmonth; $startmonth <= $endmonth; $startmonth++) {
        if ($startmonth <= 9) {
            $startmonth = "0" . $startmonth;
        } else if ($startmonth >= 10) {
            $startmonth;
        }
        $query2 = $sql->req_recordfood_30($row->id, $year, $startmonth);
        $row2 = $query2->fetch_array();
        if ($row2 != NULL) {

            $query3 = $sql->req_recordfood_1($row->id, $year, $startmonth);
            $row3 = $query3->fetch_array();
            if ($row3 != NULL) {
                echo "<pre>";
                print_r($row2);
                print_r($row3);
                echo "</pre>";
            }
        }
    }
}

//     $query2 = $sql->req_recordfood($farm_id, $row->id, '', $year);
//     while ($rs = $query2->fetch_object()) {
//         $date_check =  date("Y-m-d", strtotime($rs->date . " -30 Day"));
//         $a = $rs->weight_cow;
//         $b =  $rs->sumweight_food;

//         $query3 =  $sql->req_recordfood($farm_id, $row->id, $date_check, '');

//         while ($rss = $query3->fetch_object()) {
//             $sum[$i] = 0;
//             $sum[$i] = ($rs->weight_cow - $rss->weight_cow) / $rs->sumweight_food;
//             $total =  $total + $sum[$i];

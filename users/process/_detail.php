<?php
error_reporting(~E_NOTICE);
require_once '../../connect/functions.php';
$sql = new reports();
$sqlcow = new cow();
$query = $sqlcow->selectdatacowbyfarmer(3);
$year = date('Y');
$i = 0;
$total = 0;

while ($row = $query->fetch_object()) {
    $query2 = $sql->req_recordfood(3, $row->id, '', $year);
    while ($rs = $query2->fetch_object()) {
        $date_check =  date("Y-m-d", strtotime($rs->date . " -30 Day"));
        $a = $rs->weight_cow;
        $b =  $rs->sumweight_food;

        $query3 =  $sql->req_recordfood('3', $row->id, $date_check, '');

        while ($rss = $query3->fetch_object()) {
            $sum[$i] = 0;
            $sum[$i] = ($rs->weight_cow - $rss->weight_cow) / $rs->sumweight_food;
            $total =  $total + $sum[$i];
            echo   round($total, 2) . "<br>";
        }
       
    }

    $i++;
}

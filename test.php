<?php

require_once 'connect/functions.php';
$farm_id = 3;
$sql = new reports();
$sqlcow = new cow();
$year = date('Y');
$i = 0;
$x = 1;
$ii = 0;
$total = 0;
$startmonth = 1;
$endmonth =12;

for ($startmonth; $startmonth <= $endmonth; $startmonth++) {
    if ($startmonth <= 9) {
        $month[$i] = "0" . $startmonth;
    } else if ($startmonth >= 10) {
        $month[$i] = $startmonth;
    }
    $query = $sqlcow->selectdatacowbyfarmer($farm_id);

    while ($row = $query->fetch_object()) {
        $query2 = $sql->req_recordfood_30($row->id, $year, $startmonth); //? เอาเฉพาะ วันที่ 30 or 31 ของเดือน
        $row2 = $query2->fetch_object();
        // while () {
        if ($row2 != NULL) {
            $datecheckmonth1[$i] =  date('m', strtotime($row2->date));
            $query3 = $sql->req_recordfood_1($row->id, $year, $startmonth); //? เอาเฉพาะ วันที่ 1 ของเดือน

            $row3 = $query3->fetch_object();
            // while () {
            $datecheckmonth2[$i] =  date('m', strtotime($row3->date));

            if ($row3 != NULL) {
                $sum = ($row2->weight_cow - $row3->weight_cow) / $row2->sumweight_food;

                echo "<pre>";
                print_r($row2);
                print_r($row3);
                echo "</pre>";
                $total =  $sum + $total;
                echo $total."<br>";
            }
          
           
            
            $ii++;


            // }
        }

        // }
    }

    $i++;
    
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

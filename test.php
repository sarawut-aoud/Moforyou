<?php
error_reporting(~E_NOTICE);
require_once 'connect/functions.php';

$sql = new cow();
$sqlbreed = new breed();
$datenow = date_create(date('d-m-Y'));

$farm_id = 1;
$func = $_REQUEST['showfemale'];

 if (isset($func) && $func == 'showfemale') {
$datecow = $sql->datecow($farm_id);
$i = 0;
while ($row = $datecow->fetch_object()) {
    echo  $row->id;
    $cow_id[$i] = $row->id;
    $cowdate[$i] =  date_create($row->cow_date);
    $cowdate_add[$i] = ($row->cow_date_add);

    $datediff[$i] = date_diff($datenow, $cowdate[$i]); //? check จากวันล่าสุดว่าครบ 18 เดือนไหม
    $diff[$i] = $datediff[$i]->format('%a'); //? แปลงออกมาเป้นวัน
    $month_now[$i] = floor(($diff[$i]) / 30); //? แปลงออกมาเป็นเดือน
    

    if ($month_now[$i] >= 18) {
        $query_selectcow = $sql->selectcow_forbreed_female($farm_id, $cow_id[$i]);
        while ($row = $query_selectcow->fetch_object()) {
            $msg[$i] = array(
                "cow_id" => intval($row->id),
                "cow_name" => $row->cow_name,
                "spec_id" => intval($row->spec_id),
                "spec_name" => ($row->spec_name),
            );
        }
    } else {
        $msg = array(
            "error" => true,
            "status" => 0,
            "message" => 'ไม่มีข้อมูล',
        );

        // http_response_code(200);
    }
    $i++;
}
echo json_encode($msg);

    // http_response_code(200);
}
<?php
error_reporting(~E_NOTICE);
require_once '../../connect/functions.php';

$sql = new cow();
$datenow = date_create(date('d-m-Y'));

$farm_id = $_REQUEST['farm_id'];
$func = $_REQUEST['function'];



if (isset($func) && $func == 'showfemale') {
    $datecow = $sql->datecow($farm_id);
    $i = 0;
    while ($row = $datecow->fetch_object()) {

        $cow_id = $row->id;
        $cowdate =  date_create($row->cow_date);
        $cowdate_add = date_create($row->cow_date_add);
        // echo  $cowdate_add . '<br>';

        $datediff = date_diff($datenow, $cowdate); // check จากวันล่าสุดว่าครบ 18 เดือนไหม
        $datediff2 = date_diff($cowdate, $cowdate_add); // check จากตารางว่า 18 เดือนไหม
        $diff = $datediff->format('%a'); //แปลงออกมาเป้นวัน
        $diff2 = $datediff2->format('%a');

        $month_now = floor(($diff) / 30); // แปลงออกมาเป็นเดือน
        $months_database = floor(($diff2) / 30);

        // echo strval($datediff);

        if ($month_now <=    $months_database) {

            $query_selectcow = $sql->selectcow_forbreed_female($farm_id, $cow_id);
            $j = 0;
            while ($row = $query_selectcow->fetch_object()) {
                $data[$j] = array(
                    "cow_id" => intval($row->id),
                    "cow_name" => $row->cow_name,
                );
                $j++;
            }
        } else {
            echo json_encode(array('message' => 'ไม่มีข้อมูล', 'status' => 200));
            http_response_code(200);
        }
        $i++;
    }
    echo json_encode($data);
    http_response_code(200);
}

if (isset($func) && $func == 'showmale') {
    $query = $sql->selectcow_forbreed_male($farm_id);
    $i = 0;
    while ($row = $query->fetch_object()) {
        $data[$i] = array(
            "cow_id" => intval($row->id),
            "cow_name" => $row->cow_name,
        );
        $i++;
    }
    echo json_encode($data);
    http_response_code(200);
}

<?php
error_reporting(~E_NOTICE);
require_once '../../connect/functions.php';

$sql = new cow();
$sqlbreed = new breed();
$datenow = date_create(date('d-m-Y'));

$farm_id = $_REQUEST['farm_id'];
$func = $_REQUEST['function'];

if (isset($func) && $func == 'showfemale') {
    $datecow = $sql->datecow($farm_id);
    $i = 0;
    while ($row = $datecow->fetch_array(MYSQLI_ASSOC)) {

        $cow_id[$i] = $row['id'];
        $cowdate[$i] =  date_create($row['cow_date']);
        $cowdate_add[$i] = ($row['cow_date_add']);

        $datediff[$i] = date_diff($datenow, $cowdate[$i]); //? check จากวันล่าสุดว่าครบ 18 เดือนไหม
        $diff[$i] = $datediff[$i]->format('%a'); //? แปลงออกมาเป้นวัน
        $month_now[$i] = floor(($diff[$i]) / 30); //? แปลงออกมาเป็นเดือน

        if ($month_now[$i] >= 18) {
            $query_selectcow = $sql->selectcow_forbreed_female($farm_id, $cow_id[$i]);
            while ($row = $query_selectcow->fetch_object()) {
                $data[$i] = array(
                    "cow_id" => intval($row->id),
                    "cow_name" => $row->cow_name,
                );
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
        $cowmale[$i] = array(
            "cow_id" => intval($row->id),
            "cow_name" => $row->cow_name,
        );
        $i++;
    }
    if (empty($cowmale)) {
        echo json_encode(array());
        http_response_code(200);
    } else {
        echo json_encode($cowmale);
        http_response_code(200);
    }
}

if (isset($func) && $func == 'insert') {
    $female = $_POST['female'];
    $male = $_POST['male'];

    if (empty($farm_id) || empty($female) || empty($male)) {
        $msg = array(
            "status" => 0,
            "message" => 'ไม่สามารถบันทึกข้อมูลได้',
        );
    } else {
        $datestart = date("Y-m-d H:i:s");
        $date = date("Y-m-d"); //? วันที่ปัจจุบัน
        $datenext = date('Y-m-d', strtotime($date . "+282 days")); //? วันที่เฉลี่ย ในการผสมพันธุ์
        $query = $sqlbreed->insertbreed($datestart, $datenext, $farm_id, $female, $male);
        $msg = array(
            "status" => 200,
            "message" => 'บันทึกข้อมูลสำเร็จ',
        );
    }
    echo json_encode($msg);
    http_response_code(200);
}
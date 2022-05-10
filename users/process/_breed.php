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
        // echo $month_now[$i];
        if ($month_now[$i] >= 18) {
            $query_selectcow = $sql->selectcow_forbreed_female($farm_id, $cow_id[$i]);
            while ($row = $query_selectcow->fetch_object()) {
                $data[$i] = array(
                    "cow_id" => intval($row->id),
                    "cow_name" => $row->cow_name,
                    "spec_id" => intval($row->spec_id),
                    "spec_name" => ($row->spec_name),
                );
            }
        } else {
            echo json_encode(array('message' => 'ไม่มีข้อมูล', 'status' => 200));
            // http_response_code(200);
        }
        $i++;
    }
    echo json_encode($data);
    // http_response_code(200);
}

if (isset($func) && $func == 'showmale') {
    $query = $sql->selectcow_forbreed_male($farm_id);
    $i = 0;
    while ($row = $query->fetch_object()) {
        $cowmale[$i] = array(
            "cow_id" => intval($row->id),
            "cow_name" => $row->cow_name,
            "spec_id" => intval($row->spec_id),
            "spec_name" => ($row->spec_name),
        );
        $i++;
    }
    if (empty($cowmale)) {
        echo json_encode(array());
        // http_response_code(200);
    } else {
        echo json_encode($cowmale);
        // http_response_code(200);
    }
}

if (isset($func) && $func == 'insert') {
    $female = $_POST['female'];
    $male = $_POST['male'];
    $date_bredd = $_POST['datebreed'];

    if (empty($farm_id) || empty($female) || empty($male) || empty($date_bredd)) {
        $msg = array(
            "status" => 0,
            "message" => 'ไม่สามารถบันทึกข้อมูลได้',
        );
    } else {
        $status = 'null';
        $datestart = date($date_bredd);
        $date = date($date_bredd); //? วันที่ปัจจุบัน
        $datenext = date('Y-m-d', strtotime($date . "+282 days")); //? วันที่เฉลี่ย ในการผสมพันธุ์
        $query = $sqlbreed->insertbreed($datestart, $datenext, $farm_id, $female, $male, $status);
        $msg = array(
            "status" => 200,
            "message" => 'บันทึกข้อมูลสำเร็จ',
        );
    }

    echo json_encode($msg);
    // http_response_code(200);
}

if (isset($func) && $func == 'showedit') {
    $id = $_GET['id'];
    $query = $sqlbreed->select_breed($id);
    $i = 0;
    while ($row = $query->fetch_object()) {
        $cowmale = array(
            "id" => intval($row->id),
            "date" => date('Y-m-d', strtotime($row->breed_date)),
            "datenext" => $row->breednext,
            "cowmale" => $row->cowmale,
            "cowfemale" => $row->cowfemale

        );
        $i++;
    }
    if (empty($cowmale)) {
        echo json_encode(array());
        // http_response_code(200);
    } else {
        echo json_encode($cowmale);
        // http_response_code(200);
    }
}
if (isset($func) && $func == 'delete') {
    $id = $_GET['id'];


    if (empty($id)) {
        $msg = array(
            "status" => 0,
            "message" => 'ไม่สามารถลบข้อมูลได้',
        );
    } else {
        $query = $sqlbreed->delete_breed($id);
        $msg = array(
            "status" => 200,
            "message" => 'ลบข้อมูลสำเร็จ',
        );
    }

    echo json_encode($msg);
    // http_response_code(200);
}
if (isset($func) && $func == 'edit') {
    $id = $_POST['update_id'];
    $cowmale = $_POST['cowmale'];
    $cowfemale = $_POST['cowfemale'];
    $date_bredd = $_POST['datebreed'];
    if (empty($id) || empty($cowmale) || empty($cowfemale)) {
        $msg = array(
            "error" => true,
            "status" => 0,
            "message" => 'ไม่สามารถแก้ไขข้อมูลได้',
        );
        echo json_encode($msg);
        // http_response_code(404);
    } else {
        $datestart = date($date_bredd);
        $date = date($date_bredd); //? วันที่ปัจจุบัน
        $datenext = date('Y-m-d', strtotime($date . "+282 days")); //? วันที่เฉลี่ย ในการผสมพันธุ์
        $query = $sqlbreed->update_breed($id, $cowmale, $cowfemale, $datestart, $datenext);
        $msg = array(
            "status" => 200,
            "message" => 'แก้ไขข้อมูลสำเร็จ',
        );

        echo json_encode($msg);
        // http_response_code(200);
    }
}
if (isset($func) && $func == 'status') {
    $id = $_POST['b_id'];
    $status = $_POST['b_status'];
    if (empty($id) || empty($status)) {
        $msg = array(
            "error" => true,
            "status" => 0,
            "message" => 'อัพเดตสถานะการตั้งครรภ์ไม่สำเร็จ',
        );
        echo json_encode($msg);
        // http_response_code(404);
    } else {
        $query = $sqlbreed->update_status($id, $status);
        $msg = array(
            "status" => 200,
            "message" => 'อัพเดตสถานะข้อมูลสำเร็จ',
        );

        echo json_encode($msg);
        // http_response_code(200);
    }
}

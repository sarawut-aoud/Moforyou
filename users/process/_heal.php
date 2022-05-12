<?php
error_reporting(~E_NOTICE);
require_once '../../connect/functions.php';

$sql = new heal();
$func = $_REQUEST['function'];

if (isset($func) && $func == 'showcow') {
    $cow = new cow();
    $farmid = $_GET['farmid'];
    $query = $cow->selectdatacowbyfarmer($farmid);
    $i = 0;
    while ($row = $query->fetch_object()) {
        $data[$i] = array(
            "id" => intval($row->id),
            "cowname" => $row->cow_name,
        );
        $i++;
    }
    echo json_encode($data);
    // http_response_code(200);
}
if (isset($func) && $func == 'showdoctor') {
    $doc = new doctor();
    $farmid = $_GET['farmid'];
    $query = $doc->select_docbyfarm($farmid);
    $i = 0;
    while ($row = $query->fetch_object()) {
        $data[$i] = array(
            "id" => intval($row->id),
            "name" => $row->name,
        );
        $i++;
    }
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
if (isset($func) && $func == 'insert') {
    $cowid = $_POST['cowid'];
    $disid = $_POST['dis_id'];
    $dismore = $_POST['dismore'];
    $datestart = $_POST['dis_date'];
    $docid = $_POST['doc_id'];
    $healstart = $_POST['healstart'];
    $healend = $_POST['healend'];
    $detail = $_POST['detail'];
    $farm_id = $_POST['farmid'];
    if (empty($cowid)  || empty($datestart)) {
        $msg = array("status" => 0, "error" => true, "message" => "ไม่สามารถบันทึกได้");
    } else {
        if ($disid = $_POST['dis_id'] == 0) {
            $dis = 1;
        } else {
            $dis = $_POST['dis_id'];
        }
        $query = $sql->insert_heal($cowid, $dis, $dismore, $datestart, $docid, $healstart, $healend, $detail, $farm_id);
        $msg = array(
            "status" => 200,
            "message" => 'บันทึกข้อมูลสำเร็จ',
        );
    }
    echo json_encode($msg);
    // http_response_code(200);
}
if (isset($func) && $func == 'showdata') {
    $id = $_GET['id'];
    $query = $sql->select_heal($id);
    // $i = 0;
    while ($row = $query->fetch_object()) {
        $data = array(
            "id" => intval($row->id),
            "cow_id" => intval($row->cowid),
            "dis_id" => intval($row->diseaseid),
            "healmore" => $row->healmore,
            "datestart" => $row->datestart,
            "doc_id" => intval($row->doctor_id),
            "healstart" => $row->healstart,
            "healend" => $row->healend,
            "detail" => $row->detail,
            "farm_name" => $row->farm_name,
        );
        // $i++;
    }
    if (empty($data)) {
        echo json_encode(array());
        // http_response_code(200);
    } else {
        echo json_encode($data);
        // http_response_code(200);
    }
}
if (isset($func) && $func == 'update') {
    $id = $_POST['id'];
    $cowid = $_POST['cowid'];
    $disid = $_POST['dis_id'];
    $dismore = $_POST['dismore'];
    $datestart = $_POST['dis_date'];
    $docid = $_POST['doc_id'];
    $healstart = $_POST['healstart'];
    $healend = $_POST['healend'];
    $detail = $_POST['detail'];

    if (empty($docid) && empty($healstart) && empty($healend) && empty($detail)) {
        $query = $sql->update_heal($cowid, $disid, $dismore, $datestart, $docid, $healstart, $healend, $detail, $id);
        $msg = array(
            "status" => 200,
            "message" => 'แก้ไขข้อมูลสำเร็จ',
        );
    } else if (isset($id) && isset($cowid) && (isset($disid) || isset($dismore)) && isset($datestart) && isset($docid)) {
        $query = $sql->update_heal($cowid, $disid, $dismore, $datestart, $docid, 'NULL', 'NULL', 'NULL', $id);
        $msg = array(
            "status" => 200,
            "message" => 'แก้ไขข้อมูลสำเร็จ',
        );
    } else if (($datestart >= $healend ||  $datestart >= $healstart) && $healend >= $healstart) {
        $msg = array("status" => 0, "error" => true, "message" => "ไม่สามารถแก้ไขได้");
    } else if (empty($id) || empty($cowid)   || empty($datestart)) {
        $msg = array("status" => 0, "error" => true, "message" => "ไม่สามารถแก้ไขได้");
    } else {

        $query = $sql->update_heal($cowid, $disid, $dismore, $datestart, $docid, $healstart, $healend, $detail, $id);
        $msg = array(
            "status" => 200,
            "message" => 'แก้ไขข้อมูลสำเร็จ',
        );
    }
    echo json_encode($msg);
    // http_response_code(200);
}
if (isset($func) && $func == 'delete') {

    $id = $_GET['id'];
    if (empty($id)) {
        $msg = array("status" => 0, "error" => true, "message" => "ไม่สามารถลบข้อมูลได้");
    } else {
        $query = $sql->delete_heal($id);
        $msg = array(
            "status" => 200,
            "message" => 'ลบข้อมูลสำเร็จ',
        );
    }
    echo json_encode($msg);
    // http_response_code(200);
}

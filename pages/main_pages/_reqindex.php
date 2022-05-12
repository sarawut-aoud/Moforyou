<?php
error_reporting(~E_NOTICE);
require_once '../../connect/functions.php';
$func = $_REQUEST['function'];

if (isset($func) && $func == 'farm') {
    $sql = new reports();

    $farm_id = $_GET['farm_id'];
    $query = $sql->req_indexfarm($farm_id);
    $row = $query->fetch_object();

    $query2 = $sql->req_countcow($farm_id);
    $row2 = $query2->fetch_object();

    $data = array(
        "farmname" => $row->farmname,
        "fullname" => $row->fullname,
        "phone" => $row->phone,
        "email" => $row->email,
        "cow" => $row2->cou_cow,
    );
    echo json_encode($data);
    // http_response_code(200);
}

if (isset($func) && $func == 'countcow') {
    $farm_id = $_GET['farm_id'];
    $query2 = $sql->req_countcow($farm_id);
    $row2 = $query2->fetch_object();
    $data = array(
        "cow" => $row2->cou_cow,
    );
    echo json_encode($data);
    // http_response_code(200);
}

if (isset($func) && $func == 'cow') {
    $cow_id = $_GET['cowid'];
    $sql = new reports();

    $query = $sql->req_indexcow($cow_id);
    $row = $query->fetch_object();

    $datenew = date_create($row->cow_date);
    $datenow = date_create(date('d-m-Y'));
    $datediff = date_diff($datenow, $datenew);
    $diff = $datediff->format("%a");
    $years = floor($diff / 365);
    $months = floor(($diff - ($years * 365)) / 30);
    $day =  $diff - (($years * 365) + ($months * 30));

    $query2 = $sql->req_indexheal($row->id);
    $row2 = $query2->fetch_object();

    function DateThai($strDate)
    {
        $strYear = date("Y", strtotime($strDate)) + 543;
        $strMonth = date("n", strtotime($strDate));
        $strDay = date("j", strtotime($strDate));
        $strHour = date("H", strtotime($strDate));
        $strMinute = date("i", strtotime($strDate));
        $strSeconds = date("s", strtotime($strDate));
        $strMonthCut = array("", "ม.ค.", "ก.พ.", "มี.ค.", "เม.ย.", "พ.ค.", "มิ.ย.", "ก.ค.", "ส.ค.", "ก.ย.", "ต.ค.", "พ.ย.", "ธ.ค.");
        $strMonthThai = $strMonthCut[$strMonth];
        if ($strHour == '00' && $strMinute == '00') {
            return "$strDay $strMonthThai $strYear   ";
        } else {
            return "$strDay $strMonthThai $strYear $strHour:$strMinute  ";
        }
    }

    if (isset($row2->datestart) && isset($row2->healstart) && isset($row2->healend)) {
        $date  = DateThai($row2->datestart);
        $date1  = DateThai($row2->healstart);
        $date2  = DateThai($row2->healend);
    } else {
        $date  = '-';
        $date1  = '-';
        $date2 = '-';
    }

    $data = array(
        "cow_id" => $row->id,
        "farm_id" => $row->farm_id,
        "name" => $row->fullname,
        "farm_name" => $row->farmname,
        "cow_name" => $row->cow_name,
        "spec_name" => $row->spec_name,
        "age" => $years . " ปี " . $months . " เดือน " . $day . " วัน ",
        "high" => $row->high,
        "weight" => $row->weight,
        "gender" => $row->gender,


    );
    echo json_encode($data);
    // http_response_code(200);
}
if (isset($func) && $func == 'reqhealloop') {
    $farm_id = $_GET['farmid'];
    $cow_id = $_GET['cowid'];
    $sql = new reports();
    $qurry = $sql->req_healmore($farm_id,  $cow_id);
    $i = 0;
    function DateThai($strDate)
    {
        $strYear = date("Y", strtotime($strDate)) + 543;
        $strMonth = date("n", strtotime($strDate));
        $strDay = date("j", strtotime($strDate));
        $strHour = date("H", strtotime($strDate));
        $strMinute = date("i", strtotime($strDate));
        $strSeconds = date("s", strtotime($strDate));
        $strMonthCut = array("", "ม.ค.", "ก.พ.", "มี.ค.", "เม.ย.", "พ.ค.", "มิ.ย.", "ก.ค.", "ส.ค.", "ก.ย.", "ต.ค.", "พ.ย.", "ธ.ค.");
        $strMonthThai = $strMonthCut[$strMonth];
        if ($strHour == '00' && $strMinute == '00') {
            return "$strDay $strMonthThai $strYear   ";
        } else {
            return "$strDay $strMonthThai $strYear $strHour:$strMinute  ";
        }
    }
    while ($rs = $qurry->fetch_object()) {

        if ($rs->datestart == null) {
            $datestart = '-';
        } else {
            $datestart = DateThai($rs->datestart);
        }
        if ($rs->healstart == null) {
            $healstart = 'ยังไม่ได้รักษา';
        } else {
            $healstart = DateThai($rs->healstart);
        }
        if ($rs->healend == null) {
            $healend = '-';
        } else {
            $healend = DateThai($rs->healend);
        }
        $data[$i] = array(
            "healmore" => $rs->healmore,
            "dis_id" => $rs->did,
            "datestart" => $datestart,
            "detail" =>  $rs->detail,
            "healstart" =>   $healstart,
            "healend" => $healend,
        );
        $i++;
    }
    echo json_encode($data);
}
if (isset($func) && $func == 'barchart1') {
    $sql = new reports();
    $sqlcow = new cow();
    $year = $_REQUEST['year'];
    $i = 0;
    
    $x = 1;
    $total = 0;
    $month = $_REQUEST['month'];;
    $query = $sqlreq->req_healanddis($month, $year);
    while ($row = $query->fetch_object()) {
       
                
                $data[$i] = array(
                    "name" => $row->cow_name,
                    "weight" => $sum,
                    
                );
                $i++;
        
    }
    
   
    echo json_encode($data);
}
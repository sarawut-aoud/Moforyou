<?php
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
        return "$strDay $strMonthThai $strYear ";
    } else {
        return "$strDay $strMonthThai $strYear $strHour:$strMinute ";
    }
}
function month($month)
{
    switch ($month) {
        case '01':
            $month_name = "มกราคม";
            break;
        case '02':
            $month_name = "กุมภาพันธ์";
            break;
        case '03':
            $month_name = "มีนาคม";
            break;
        case '04':
            $month_name = "เมษายน";
            break;
        case '05':
            $month_name = "พฤษภาคม";
            break;
        case '06':
            $month_name = "มิถุนายน";
            break;
        case '07':
            $month_name = "กรกฎาคม";
            break;
        case '08':
            $month_name = "สิงหาคม";
            break;
        case '09':
            $month_name = "กันยายน";
            break;
        case '10':
            $month_name = "ตุลาคม";
            break;
        case '11':
            $month_name = "พฤศจิกายน";
            break;
        case '12':
            $month_name = "ธันวาคม";
            break;
    }
    return  $month_name;
}

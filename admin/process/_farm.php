<?php
 error_reporting(~E_NOTICE);
require_once '../../connect/functions.php';
$sql = new farm();

$id = $_GET['id'];
$func = $_GET['function'];


if (isset($id) && $func == 'showeditFarm') {
    $query = $sql->selectfarm($id);
    $i=0;
    while ($row = $query->fetch_object()) {
        $userfarmer[$i] = array(
            "id" => intval($row->id),
            "farmname" => $row->farmname,
            "farmadd" => $row -> address,
            "farmdis" => $row -> district_id,
            "farmername" => $row -> fullname,

            
        );
        $i++;
    }

    echo json_encode($userfarmer);
}

// if (isset($id) && $func == 'editfarmer') {
//     $fname = $_GET['fname'];
//     $email = $_GET['email'];
//     $phone = $_GET['phone'];

//     if (empty($id) || empty($fname) || empty($phone) || empty($email)) {
//         $msg = array(
//             "status" => 0,
//             "message" => 'ไม่สามารถแก้ไขข้อมูลได้',
//         );
//     } else {
//         $query = $sql->update_farmer($id, $fname, $phone, $email);
//         $msg = array(
//             "status" => 200,
//             "message" => 'แก้ไข้ข้อมูลสำเร็จ',
//         );
//     }
//     echo json_encode($msg);
// }

if (isset($id) && $func == 'delsfarm') {
    $query = $sql->delsfarm($id);
    $msg = array(
        "status" => 200,
        "message" => 'ลบข้อมูลแล้ว',
    );


    echo json_encode($msg);
}

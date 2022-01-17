<?php
//ถ้าใช้งานบน ssl หรือ HTTPS แล้วให้เอา @ ออกได้เลยจ้า เพราะตัว API Request SSL 
@$get_data = file_get_contents('https://raw.githubusercontent.com/kongvut/thai-province-data/master/api_province_with_amphure_tombon.json');

$map = json_decode($get_data);

// print_r ออกมาดู
// echo '<pre>';
// print_r($map);
// print_r($get_data);
// echo '</pre>';




if (isset($_POST['function']) && $_POST['function'] == 'provinces') {

    @$get_data = file_get_contents('https://raw.githubusercontent.com/kongvut/thai-province-data/master/api_province_with_amphure_tombon.json');

    $map = json_decode($get_data);

    $i = $_POST['id'];
    echo '<option value="" selected disabled>-กรุณาเลือกอำเภอ-</option>';
    foreach ($map[$i - 1] as $value) {
        if (is_array($value) || is_object($value)) {
            foreach ($value as $amphure) {

                echo  "<option value='$amphure->id'>$amphure->name_th</option>";
            }
        }
    }
}

if (isset($_POST['function']) && $_POST['function'] == 'amphures') {

    $id = $_POST['id'];

    echo '<option value="" selected disabled>-กรุณาเลือกตำบล-</option>';
    foreach ($query as $value2) {
      echo '<option value="'.$value2['id'].'">'.$value2['name_th'].'</option>';
      
    }
}
            


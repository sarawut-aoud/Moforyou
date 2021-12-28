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
    $id = $_POST['id'];
    // $map_val = $map->$id;
     echo $id;
    // $sql = "SELECT * FROM amphures WHERE province_id='$id'";
    // $query = mysqli_query($con, $sql);
    echo '<option value="" selected disabled>-กรุณาเลือกอำเภอ-</option>';
    foreach ($map[$id-1] as $value=>$key->amphure) {
        foreach ( $key as $amp_val) {
            echo "<option value=$$amp_val->id> $amp_val->name_th</option>";
        }
    }
}


if (isset($_POST['function']) && $_POST['function'] == 'amphures') {
    $id = $_POST['id'];
    // $sql = "SELECT * FROM districts WHERE amphure_id='$id'";
    // $query = mysqli_query($con, $sql);
    echo '<option value="" selected disabled>-กรุณาเลือกตำบล-</option>';
    foreach ($query as $value2) {
        echo '<option value="' . $value2['id'] . '">' . $value2['name_th'] . '</option>';
    }
}
            


// (ทั้งหมด) https://raw.githubusercontent.com/kongvut/thai-province-data/master/api_province_with_amphure_tombon.json
// (จังหวัด) https://raw.githubusercontent.com/kongvut/thai-province-data/master/api_province.json
// (อำเภอ) https://raw.githubusercontent.com/kongvut/thai-province-data/master/api_amphure.json
// (ตำบล) https://raw.githubusercontent.com/kongvut/thai-province-data/master/api_tombon.json
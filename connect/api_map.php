<?php
//ถ้าใช้งานบน ssl หรือ HTTPS แล้วให้เอา @ ออกได้เลยจ้า เพราะตัว API Request SSL 
@$get_data = file_get_contents('https://raw.githubusercontent.com/sarawut-pcru/Thailand_Map/main/json/provinces.json');
$map = json_decode($get_data);

if (isset($_POST['function']) && $_POST['function'] == 'provinces') {

    @$get_data = file_get_contents('https://raw.githubusercontent.com/sarawut-pcru/Thailand_Map/main/json/amphur.json');
    $map = json_decode($get_data);
    $id = $_POST['id']; //todo รับค่าจาก ajax province


    echo '<option value="" selected disabled>-กรุณาเลือกอำเภอ-</option>';

    foreach ($map as $value) {
        if ($id == $value->province) { //! check จาก รหัสจังหวัด
            echo  "<option value='$value->id'>$value->name_th</option>";
        }
    }
}

if (isset($_POST['function']) && $_POST['function'] == 'amphures') {
    @$get_tombon = file_get_contents('https://raw.githubusercontent.com/sarawut-pcru/Thailand_Map/main/json/tombon.json');
    $tombon = json_decode($get_tombon);
    $id = $_POST['id'];

    echo '<option value="" selected disabled>-กรุณาเลือกตำบล-</option>';
    foreach ($tombon as $value) {
       if($id == $value->amphur){
        echo "<option value='$value->id'>$value->name_th</option>";
       }
        
    }
}

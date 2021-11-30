<?php
//ถ้าใช้งานบน ssl หรือ HTTPS แล้วให้เอา @ ออกได้เลยจ้า เพราะตัว API Request SSL 
@$get_data = file_get_contents('https://raw.githubusercontent.com/kongvut/thai-province-data/master/api_province_with_amphure_tombon.json');

$map = json_decode($get_data);

// print_r ออกมาดู
// echo '<pre>';
// print_r($map);
// print_r($get_data);
// echo '</pre>';


// (ทั้งหมด) https://raw.githubusercontent.com/kongvut/thai-province-data/master/api_province_with_amphure_tombon.json
// (จังหวัด) https://raw.githubusercontent.com/kongvut/thai-province-data/master/api_province.json
// (อำเภอ) https://raw.githubusercontent.com/kongvut/thai-province-data/master/api_amphure.json
// (ตำบล) https://raw.githubusercontent.com/kongvut/thai-province-data/master/api_tombon.json
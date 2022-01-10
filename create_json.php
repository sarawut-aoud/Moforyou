<?php
require_once './connect/functions.php';
$get_data = file_get_contents('./json/provinces.json');
$data = json_decode($get_data);

$sql = new mapthailand();



$i = 1;
$j = 1;


do {
  
  $p_id = $data[$i-1]->id;
  $p_code = $data[$i-1]->id_code;
  $p_name = $data[$i-1]->name_th;
  // echo $p_id;
  
  $dis = $sql->amphur($j);
  $rs = mysqli_fetch_object($dis);
  $apid = $rs->PROVINCE_ID;
  echo $apid;
 do {
  
    if($apid == $p_id){
      $a_id = $rs->AMPHUR_ID;
      $a_code = $rs->AMPHUR_CODE;
      $a_name = $rs->AMPHUR_NAME;
      $zipcode = $rs->POSTCODE;
      // echo $a_id."<br>";
      $amp[] = array('id' => $a_id, 'id_code' => $a_code, 'name_th' => trim($a_name), 'zipcode' => $zipcode);
    }
   
  } while ($apid>$p_id);

 
  $i = $i + 1;
} while ($i <=77 || $j<=78);
$post[] = array('id' => $p_id, 'id_code' => $p_code, 'name_th' => trim($p_name), 'amphur' => $amp);

$filename = './json/amphur.json';
$fp = fopen($filename, 'w');
fwrite($fp, json_encode($post, JSON_PRETTY_PRINT));   // here it will print the array pretty
fclose($fp);

<?php
ini_set('memory_limit', '-1');
require_once './connect/functions.php';

$sql = new mapthailand();


$pid = 1;
$dis = $sql->amphur($pid);
$row = mysqli_fetch_array($dis);

do {
 
  
  
  $prov = $sql->prov($pid);
  while($result=mysqli_fetch_object($prov)){
    
   
    $p_id = $result->PROVINCE_ID;
    $p_code = $result->PROVINCE_CODE;
    $p_name = $result->PROVINCE_NAME;
    $a_id[$pid] = $row['AMPHUR_ID'];
   
    $dist = $sql->amphur($pid);
    $row_amp = mysqli_num_rows($dist);
    if($row_amp){
      while ($rs = mysqli_fetch_object($dist)) {
     
        $amp_id = $rs->AMPHUR_ID;
        $a_code = $rs->AMPHUR_CODE;
        $a_name = $rs->AMPHUR_NAME;
        $zipcode = $rs->POSTCODE;
  
      $post[] = array('id' => $p_id, 'id_code' => $p_code, 'name_th' => trim($p_name),
      'amphur'=>[array('id' => $amp_id, 'id_code' => $a_code, 'name_th' => trim($a_name), 'zipcode' => $zipcode, 
      'tombon' => [
  
      ]
      )]);
    
      }
    }
    
  }


  $pid  = $pid + 1;

  $fileresult = $post;
  $filename = './json/rs_amp.json';
  $fp = fopen($filename, 'w');
  fwrite($fp, json_encode($fileresult, JSON_PRETTY_PRINT));   // here it will print the array pretty
  fclose($fp);
} while ($pid < 77);
// $filename = 'rs_amp.json';
// $fp = fopen($filename, 'w');
// fwrite($fp, json_encode($post, JSON_PRETTY_PRINT));   // here it will print the array pretty
// fclose($fp);
// echo "<pre>";
// print_r($a_id);
// echo "</pre>";

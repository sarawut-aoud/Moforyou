<?php
require_once './connect/functions.php';

$sql = new mapthailand();


   $dis = $sql->amphur();
  
  
  while ($rs = mysqli_fetch_object($dis)) {
  
    // $p_id = $rs->PROVINCE_ID;
    // $p_code = $rs->PROVINCE_CODE;
    // $p_name = $rs->PROVINCE_NAME;
   
     $a_id = $rs->AMPHUR_ID;
     $a_code = $rs->AMPHUR_CODE;
     $a_name = $rs->AMPHUR_NAME;
     $zipcode = $rs->POSTCODE;
    $pid = $rs->PROVINCE_ID;
   
    
 
  
    $post[] = array('provinec'=>$pid, 'id' => $a_id, 'id_code' => $a_code, 'name_th' => trim($a_name), 'zipcode' => $zipcode);
  
     
  }
  
  $filename = './amphur.json';
  $fp = fopen($filename, 'w');
  fwrite($fp, json_encode($post, JSON_PRETTY_PRINT));   // here it will print the array pretty
  fclose($fp);


  


<?php
require_once './connect/functions.php';

$sql = new mapthailand();
for($i=58;$i<=63;$i++){
  $aid = $i;
  $pid = 3;
  // $dis = $sql->amphur($pid);
  $dis = $sql->dist($aid,$pid);
  
  while ($rs = mysqli_fetch_object($dis)) {
  
    // $p_id = $rs->PROVINCE_ID;
    // $p_code = $rs->PROVINCE_CODE;
    // $p_name = $rs->PROVINCE_NAME;
   
    // $a_id = $rs->AMPHUR_ID;
    // $a_code = $rs->AMPHUR_CODE;
    // $a_name = $rs->AMPHUR_NAME;
    // $zipcode = $rs->POSTCODE;
   
    $d_id = $rs->DISTRICT_ID;
    $d_code = $rs->DISTRICT_CODE;
    $d_name = $rs->DISTRICT_NAME;
   
  
  
    $post[] = array(
       'id'=>$d_id,'id_code'=>$d_code,'name_th'=>trim($d_name)
    //   'id' => $p_id, 'id_code' => $p_code, 'name_th' => trim($p_name),
    //   'amphur' =>  [
        // array(
          //  'id' => $a_id, 'id_code' => $a_code, 'name_th' => trim($a_name), 'zipcode' => $zipcode
          //  ,'tombon' => [
  
           
          //  ]
        
      
    );
    // 'amphur' =>  array('id' => $d_amp_id, 'id_code' => $a_code, 'name_th' => trim($a_name), 'zipcode' => $zipcode),
    //  'district' => ['id' => $d_id, 'id_code' => $d_code, 'name_th' => trim($d_name)]]
  
  
  
    // 'id' => $d_id, 'id_code' => $d_code, 'name_th' => trim($d_name),
  
    // 'amphur' => array([
    //     'id' => $a_id, 'id_code' => $a_code, 'name_th' => trim($a_name), 'zipcode' => $zipcode
    // ]),
    // 'province' => array('id' => $p_id, 'id_code' => $p_code, 'name_th' => trim($p_name))
  
  }
  
  $filename = './json/rs_amp'.$i.'.json';
  $fp = fopen($filename, 'w');
  fwrite($fp, json_encode($post, JSON_PRETTY_PRINT));   // here it will print the array pretty
  fclose($fp);
  
}

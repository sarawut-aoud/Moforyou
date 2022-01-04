<?php
require_once './connect/functions.php';

$sql = new mapthailand();
$prov = $sql->prov();
$dis = $sql->distall();
while ($rs = mysqli_fetch_object($dis)) {
    $p_id = $rs->PROVINCE_ID;
    $p_code = $rs->PROVINCE_CODE;
    $p_name = $rs->PROVINCE_NAME;
    // $p_geo_id = $rs->GEO_ID;
    //amphur  
     $a_id = $rs->AMPHUR_ID;
    // // $a_code = $rs->AMPHUR_CODE;
      $a_name = $rs->AMPHUR_NAME;
    // $zipcode = $rs->POSTCODE;
    // // $a_geo_id = $rs->GEO_ID;
    // // $a_prov_id = $rs->PROVINCE_ID;
    // // district
    // $d_id = $rs->DISTRICT_ID;
    // $d_code = $rs->DISTRICT_CODE;
    // $d_name = $rs->DISTRICT_NAME;
    // $d_amp_id = $rs->AMPHUR_ID;
    //  $d_prov_id = $rs->PROVINCE_ID;
    // $d_geo_id = $rs->GEO_ID;



    $post[] = array(
        'id' => $p_id, 'id_code' => $p_code, 'name_th' => trim($p_name),'ampthur'=> [])

    ;
    // 'amphur' =>  array('id' => $d_amp_id, 'id_code' => $a_code, 'name_th' => trim($a_name), 'zipcode' => $zipcode),
    //  'district' => ['id' => $d_id, 'id_code' => $d_code, 'name_th' => trim($d_name)]]

   

    // 'id' => $d_id, 'id_code' => $d_code, 'name_th' => trim($d_name),

    // 'amphur' => array([
    //     'id' => $a_id, 'id_code' => $a_code, 'name_th' => trim($a_name), 'zipcode' => $zipcode
    // ]),
    // 'province' => array('id' => $p_id, 'id_code' => $p_code, 'name_th' => trim($p_name))

}


$fp = fopen('prov_amphur_dist.json', 'w');
fwrite($fp, json_encode($post, JSON_PRETTY_PRINT));   // here it will print the array pretty
fclose($fp);

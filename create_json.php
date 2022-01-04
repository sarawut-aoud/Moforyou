<?php 
require_once './connect/functions.php';

$sql = new mapthailand();
$distall = $sql->distall();

while ($rs = mysqli_fetch_object($distall)) {
    $p_id = $rs->PROVINCE_ID;
    $p_code = $rs->PROVINCE_CODE;
    $p_name = $rs->PROVINCE_NAME;
    $p_geo_id = $rs->GEO_ID;
    //amphur  
    $a_id = $rs->AMPHUR_ID;
    $a_code = $rs->AMPHUR_CODE;
    $a_name = $rs->AMPHUR_NAME;
    $zipcode = $rs->POSTCODE;
    $a_geo_id = $rs->GEO_ID;
    $a_prov_id = $rs->PROVINCE_ID;
    // district
    $d_id = $rs->DISTRICT_ID;
    $d_code = $rs->DISTRICT_CODE;
    $d_name = $rs->DISTRICT_NAME;
    $d_amp_id = $rs->AMPHUR_ID;
    $d_prov_id = $rs->PROVINCE_ID;
    $d_geo_id = $rs->GEO_ID;
   

    echo  $p_id .":".$p_name.":".  $a_id .":". $a_name.":".  $d_id .":". $d_name."<br>";
}
?>
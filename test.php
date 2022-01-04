<?php
@$get_data = file_get_contents('https://raw.githubusercontent.com/kongvut/thai-province-data/master/api_tombon.json');

// $map = json_decode($get_data);

// // print_r ออกมาดู
// // echo '<pre>';
// print_r($map);
// // // print_r($get_data);
// echo '</pre>';


require_once './connect/functions.php';

$sql = new mapthailand();
// $prov = $sql->prov();
// $amp = $sql->amphur();
$distall = $sql->distall();
// $rs = json_encode($query);
// district
// $id= $rs->DISTRICT_ID;
// $code=$rs->DISTRICT_CODE; 
// $name=$rs->DISTRICT_NAME;           
// $amp_id=$rs->AMPHUR_ID;
// $prov_id=$rs->PROVINCE_ID;
// $geo_id=$rs->GEO_ID;
// $post[] = array('id' => $id,'id_code' => $code,'name_th' => $name,'amp_id' => $amp_id,'prov_id'=>$prov_id,'geo_id'=> $geo_id);


// prov
// $id = $rs->PROVINCE_ID ;
// $code=$rs->PROVINCE_CODE;
// $name=$rs->PROVINCE_NAME;
// $geo_id = $rs->GEO_ID;


//  $post[] = array('id' => $id,'id_code' => $code,'name_th' => trim($name),'geo_id'=> $geo_id);



//amphur  
//     $id= $rs->AMPHUR_ID;
//      $code=$rs->AMPHUR_CODE; 
//     $name=$rs->AMPHUR_NAME;           
//     $zipcode=$rs->POSTCODE;
//      $geo_id=$rs->GEO_ID;
//      $prov_id=$rs->PROVINCE_ID;

//    $post[] = array('id' => $id,'id_code' => $code,'name_th' => trim($name),'zipcode'=>$zipcode,'geo_id'=> $geo_id,'prov_id'=>$prov_id);

while ($rs = mysqli_fetch_object($distall)) {
    // prov
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

    $post[] = array(
        'id' => $d_id, 'id_code' => $d_code, 'name_th' => trim($d_name),

        array(

            'id' => $a_id, 'id_code' => $a_code, 'name_th' => trim($a_name), 'zipcode' => $zipcode,

            array(
                'id' => $p_id, 'id_code' => $p_code, 'name_th' => trim($p_name)

            )

        )
    );
}


$fp = fopen('prov_amphur_dist.json', 'w');
fwrite($fp, json_encode($post, JSON_PRETTY_PRINT));   // here it will print the array pretty
fclose($fp);

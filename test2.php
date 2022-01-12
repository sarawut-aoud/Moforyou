<?php
//  $get_data = file_get_contents('./json/amphur.json');
// //  @$get_data = file_get_contents('https://raw.githubusercontent.com/sarawut-pcru/Thailand_Map/main/json/tombon.json');
// $data = json_decode($get_data);



// echo "<pre>";
// print_r($data);
// echo "</pre>";
// ini_set("memory_limit", "10M");
require_once './connect/functions.php';
$sql = new mapthailand();

do {
    $j = 1;


    $amp = $sql->amphur($j);
    $am = mysqli_fetch_object($amp);
    $a_id = $am->AMPHUR_ID;
    $a_code = $am->AMPHUR_CODE;
    $a_name = $am->AMPHUR_NAME;
    $zipcode = $am->POSTCODE;
    $amphur[] = array('id' => $a_id, 'id_code' => $a_code, 'name_th' => trim($a_name), 'zipcode' => $zipcode, 'tombom' => []);
    $j++;
} while ($j > $am->PROVINCE_ID);

for ($i = 1; $i <= 77; $i++) {
    $prov = $sql->prov($i);  //! จังหวัด
    $p = mysqli_fetch_object($prov);
    $p_id = $p->PROVINCE_ID;
    $p_code = $p->PROVINCE_CODE;
    $p_name = $p->PROVINCE_NAME;

    // for ($j = 1; $j <= $i; $j++) {
    //     $amp = $sql->amphur($j);
    //     $a = mysqli_fetch_object($amp);
    //     $apid = $a->PROVINCE_ID;

    //     // echo $a_name;
    //     // for ($x = 1; $x <= $a_id; $x++) {
    //     //     $tom = $sql->tombon($x);
    //     //     $tb = mysqli_fetch_object($tom);
    //     //     $t_id = $tb->DISTRICT_ID;
    //     //     $t_code = $tb->DISTRICT_CODE;
    //     //     $t_name = $tb->DISTRICT_NAME;
    //     //     $tombon[] = array('id' => $t_id, 'id_code' => $t_code, 'name_th' => trim($t_name));
    //     // }
    //     if ($apid  == $p_id) {
    //         $a_id = $a->AMPHUR_ID;
    //         $a_code = $a->AMPHUR_CODE;
    //         $a_name = $a->AMPHUR_NAME;
    //         $zipcode = $a->POSTCODE;
    //         $amphur[] = array('id' => $a_id, 'id_code' => $a_code, 'name_th' => trim($a_name), 'zipcode' => $zipcode, 'tombom' => []);
    //     }
    // }


    $post[] = array('id' => $p_id, 'id_code' => $p_code, 'name_th' => trim($p_name), 'amphur' => $amphur);
}

$filename = './json/all.json';
$fp = fopen($filename, 'w');
fwrite($fp, json_encode($post, JSON_PRETTY_PRINT));   // here it will print the array pretty
fclose($fp);

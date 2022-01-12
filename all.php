<?php
require_once './connect/functions.php';
$get_data = file_get_contents('./json/provinces.json');
$data = json_decode($get_data);

$sql = new mapthailand();



$i = 0;
$j = 1;

do {

    $p_id = $data[$i]->id;
    echo $p_id . ": data <br>";
    $p_code = $data[$i]->id_code;
    $p_name = $data[$i]->name_th;

    do {

        $dis = $sql->amphur(2);
        // echo $p_id;
        while($rs = mysqli_fetch_object($dis)){
            $a_id = $rs->AMPHUR_ID;
            echo $a_id . ": sql <br>";
            $a_code = $rs->AMPHUR_CODE;
            $a_name = $rs->AMPHUR_NAME;
            $zipcode = $rs->AMPHUR_ID;
            $provinec = $rs->PROVINCE_ID;
        
            if ($provinec == 2) {
        
                $amp[] = array('id' => $a_id, 'id_code' => $a_code, 'name_th' => trim($a_name), 'zipcode' => $zipcode);
            }
        
        }
      
      
    } while ($provinec > $p_id);

    $i = $i + 1;
    $post[] = array('id' => $p_id, 'id_code' => $p_code, 'name_th' => trim($p_name), 'amphur' => $amp);
} while ($i <2);


$filename = './json/amphur.json';
$fp = fopen($filename, 'w');
fwrite($fp, json_encode($post, JSON_PRETTY_PRINT));   // here it will print the array pretty
fclose($fp);

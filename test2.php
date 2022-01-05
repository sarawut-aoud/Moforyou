<?php
    // $get_data = file_get_contents('./amphur.json');
     @$get_data = file_get_contents('https://raw.githubusercontent.com/sarawut-pcru/Thailand_Map/main/json/tombon.json');
    $data = json_decode($get_data);

    echo $get_data;

?>
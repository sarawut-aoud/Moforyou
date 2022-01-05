<?php
    //  $get_data = file_get_contents('./prov_amphur_dist.json');
      @$get_data = file_get_contents('https://raw.githubusercontent.com/kongvut/thai-province-data/master/api_province_with_amphure_tombon.json');
    $data = json_decode($get_data);

    echo '<pre>';
    print_r($data)  ;
    echo '</pre>';

?>
<?php
@$get_data = file_get_contents('https://raw.githubusercontent.com/kongvut/thai-province-data/master/api_tombon.json');

$map = json_decode($get_data);

// print_r ออกมาดู
// echo '<pre>';
print_r($map);
// // print_r($get_data);
// echo '</pre>';




    // $map_val=$map[$id];
    // echo $map_val;
    // $sql = "SELECT * FROM amphures WHERE province_id='$id'";
    // $query = mysqli_query($con, $sql);
    
    // foreach ($map[$id] as $key) {
    //     foreach ( $key as $amp_val) {
    //        echo $amp_val->name_th;
    //     }
    // }

<?php
@$get_data = file_get_contents('https://raw.githubusercontent.com/kongvut/thai-province-data/master/api_province_with_amphure_tombon.json');

$map = json_decode($get_data);

// print_r ออกมาดู
// echo '<pre>';
// print_r($map);
// print_r($get_data);
// echo '</pre>';



     $id = 54;
    // $map_val=$map[$id];
    // echo $map_val;
    // $sql = "SELECT * FROM amphures WHERE province_id='$id'";
    // $query = mysqli_query($con, $sql);
    
    foreach ($map[$id] as $values => $amp) {
        echo $values .$amp;
       
    }

?>
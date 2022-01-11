<?php
//  $get_data = file_get_contents('./json/amphur.json');
// //  @$get_data = file_get_contents('https://raw.githubusercontent.com/sarawut-pcru/Thailand_Map/main/json/tombon.json');
// $data = json_decode($get_data);



// echo "<pre>";
// print_r($data);
// echo "</pre>";



for ($i = 1; $i <= 77; $i++) {

    echo "<p> data :" . $i."<br>"  ; //! จังหวัด

    for ($j = 1; $j <= $i; $j++) {
        echo " sql : " . $j ."<br>"; //? อำเภอ
        
        for($x = 1; $x <= $j ; $x++){
            echo " sql->tombon : " . $x ."<br>"; //todo ตำบล
        
        }
       
    }

}
?>





<?php
require_once '../../connect/functions.php';

$sql = new cow();
$query = $sql->selectcow_forbreed_female('3');
var_dump($query) ;
 
// $i = 0;
// while ($row = $query->fetch_object()) {
//     $data[$i] = array(
//         "cow_id" => intval($row->id),
//         "cow_name" => $row->cow_name,
//     );
//     $i++;
// }
// echo json_encode($data);
// http_response_code(200);

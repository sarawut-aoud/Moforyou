<?php
require_once '../../connect/functions.php';

    if(isset($_POST['id'])){
        $sql = new specise();
        $query = $sql->selectid($_POST['id']);
        $row = mysqli_fetch_array($query);
        echo json_encode($row);
    }

?>
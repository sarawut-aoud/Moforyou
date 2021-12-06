<?php 
    require "functions.php";

    $usernamechek = new DB_con();

    // รับค่าจาก value ที่ส่งมา
    $uname = $_POST['username'];
    $sql = $usernamechek->usernameavaliable($uname);

    $num  =mysqli_num_rows($sql);

    // num มากกว่า 0 = มี username ในระบบแล้ว
    if ($num>0){
        echo "<span style='color: red;'>มี Username นี้แล้ว</span>";
        echo "<script>$('#submit').prop('disabled',true);</script>";
    }else{
        echo "<span style='color: green;'>สามารถใช้ Username นี้ได้</span>";
        echo "<script>$('#submit').prop('disabled',false);</script>";
    }


?>
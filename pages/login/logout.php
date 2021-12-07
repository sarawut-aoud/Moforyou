<?php

    session_start();
    session_destroy();

?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
    <meta charset="utf-8">
    <title></title>
    <?php
        require '../../build/script.php' ;
    ?>
</head>
<body>
<script>
    Swal.fire({
        icon: 'success',
        title: 'Logout...',
        text: 'ทำการออกจากระบบเรียบร้อย',
        showCancelButton: false,
        showConfirmButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'ตกลง',
        
    }).then((result) => {
        if (result.isConfirmed) {
            window.location = "../main_pages/index";
        }else {
            window.history.go(-1);
        }
    })

</script>
</body>
</html>
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
            window.open('../../pages/login/login');
        }else {
            window.open('../../pages/login/login');
        }
    })

</script>
</body>
</html>
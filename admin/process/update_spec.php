<?php
require_once '../../connect/functions.php';
    if(!empty($_POST)){
       $sql = new specise();
       
        $name = $sql->real_escape_string($_POST["specname_modal"]);
        $detail = $sql->real_escape_string($_POST["specdetail_modal"]);

        $query = $sql->updatespec($_POST["id"],$name,$detail );
    }
    echo "<script>
    Swal.fire({
        icon: 'success',
        title: '<h1>แก้ไขข้อมูลเรียบร้อย</h1>',
        text: '',
        type: 'success',
        //showCancelButton: true,
        confirmButtonColor: '#3085d6',
        //cancelButtonColor: '#d33',
        confirmButtonText: 'ตกลง'
      }).then((result) => {
        window.location = '../main/species'
      })
    </script>";

?>
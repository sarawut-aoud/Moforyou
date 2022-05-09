<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
  <meta http-equiv="Content-Type" content="text/html; charset=windows-874">
  <meta http-equiv="Content-Type" content="text/html; charset=tis-620">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title></title>
  <?php
  require_once '../../build/script.php';
  ?>
</head>

<body>
  <script>
    Swal.fire({
      icon: 'warning',
      title: '<h1>โปรดลงทะเบียนฟาร์ม</h1>',
      text: '',
      type: 'error',
      //showCancelButton: true,
      confirmButtonColor: '#3085d6',
      //cancelButtonColor: '#d33',
      confirmButtonText: 'ตกลง'
    }).then((result) => {
      window.location = '../register-farm/regis_farm.php';
    })
  </script>
</body>

</html>
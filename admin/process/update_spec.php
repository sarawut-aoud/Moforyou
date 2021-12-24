<?php
require_once '../../connect/functions.php';
require_once '../../connect/resize.php';
if (!empty($_POST)) {
  $sql = new specise();
  $time = date('Ymdhis');
  $id =$_POST['id'];
  $name = $sql->real_escape_string($_POST["specname_modal"]);
  $detail = $sql->real_escape_string($_POST["specdetail_modal"]);
  $specpic = $_FILES['file']['tmp_name'];

  if (!empty($specpic)) {
    $sourceProperties = getimagesize($specpic);
    $fileNewName = $time;
    $folderPath = "../../dist/img/spec_img/";
    $ext = $_FILES['file']['name'];
    $imageType = $sourceProperties[2];
    echo resize($specpic, $imageType, $folderPath, $fileNewName, $ext, $sourceProperties);
    
    if ($specpic != "") {
      @unlink("../../dist/img/spec_upload/$specpic");
    }
    copy($specpic, "../../dist/img/spec_upload/" . $ext);
    $sql = $specdata->updatespce_pic($id, $name, $detail,$specpic);
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
  } else {
    $query = $sql->updatespec($id, $name, $detail);
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
  }
 }

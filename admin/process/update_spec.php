<?php
require_once '../../connect/functions.php';
require_once '../../connect/resize.php';

function imageResize($imageResourceId, $width, $height)
{
  $targetWidth = $width < 1280 ? $width : 1280;
  $targetHeight = ($height / $width) * $targetWidth;
  $targetLayer = imagecreatetruecolor($targetWidth, $targetHeight);
  imagecopyresampled($targetLayer, $imageResourceId, 0, 0, 0, 0, $targetWidth, $targetHeight, $width, $height);
  return $targetLayer;
}

$sql = new specise();
$time = date('Ymdhis');
$id = $_POST['id'];
$spec_pic = $_POST['spec_pic'];
$name = $sql->real_escape_string($_POST["specname"]);
$detail = $sql->real_escape_string($_POST["specdetail"]);
$specpic = $_FILES['file']['tmp_name'];

if ($specpic  != '') {
  $ext = $_FILES['file']['name'];
  $sourceProperties = getimagesize($specpic);
  $fileNewName = $time;
  $folderPath = "../../dist/img/spec_img/";

  $imageType = $sourceProperties[2];
  echo resize($specpic, $imageType, $folderPath, $fileNewName, $ext, $sourceProperties);

  if ($spec_pic != "") {
    @unlink("../../dist/img/spec_upload/$spec_pic");
  }
  copy($specpic, "../../dist/img/spec_upload/" . $ext);
  $sql = $sql->updatespce_pic($id, $name, $detail, $specpic);
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

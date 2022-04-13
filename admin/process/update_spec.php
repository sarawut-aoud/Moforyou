<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title></title>
  <?php require_once '../../build/script.php'; ?>
</head>

<body>
  <?php
   error_reporting(~E_NOTICE);
  require_once '../../connect/functions.php';
  require_once '../../connect/resize.php';
  require_once '../../connect/alert.php';
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
    $sql = $sql->updatespce_pic($id, $name, $detail, $ext);
    echo success('แก้ไขข้อมูลเรียบร้อย', '../main/species');
  } else {
    $query = $sql->updatespec($id, $name, $detail);
    echo success('แก้ไขข้อมูลเรียบร้อย', '../main/species');
  }
  ?>
</body>

</html>
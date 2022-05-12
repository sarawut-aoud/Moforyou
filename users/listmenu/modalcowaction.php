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
    <?php require_once '../../build/script.php'; ?>
</head>

<body>
    <?php
    require_once '../../connect/functions.php';
    require_once '../../connect/alert.php';
    require_once '../../connect/toastr.php';
    require_once '../../connect/resize.php';

    if (isset($_POST['btnmodalsave'])) {
        if (empty($_POST['modalspecies_id'])) {
            echo '<script>
                    $(document).ready(function(){
                        $("#modalspecies_id").focus();
                    })
                 </script>';
            echo warning_toast('กรุณาเลือกสายพันธ์ุ ');
        } else if (empty($_POST['modalhouse_id'])) {
            echo '<script>
                    $(document).ready(function(){
                        $("#modalhouse_id").focus();
                    })
                </script>';
            echo warning_toast('กรุณาเลือกโรงเรือน ');
        } else if (empty($_POST['modalherd_id'])) {
            echo '<script>
                    $(document).ready(function(){
                        $("#modalherd_id").focus();
                    })
                </script>';
            echo warning_toast('กรุณาเลือกฝูง');
        } else {
            $idcow = $_POST['modal_cowid'];
            $namecow =  $_POST['modalnamecow'];
            $cowdate =  $_POST['modal_cowdate'];
            $species_id =  $_POST['modalspecies_id'];
            $weightcow =  $_POST['modalweightcow'];
            $highcow =  $_POST['modalhighcow'];
            // $fathercow =  $_POST['modalfathercow'];
            // $mothercow =  $_POST['modalmothercow'];
            $house_id =  $_POST['modalhouse_id'];
            $herd_id =  $_POST['modalherd_id'];
            $gender =  $_POST['gender'];
            $picture = $_FILES['file']['tmp_name'];
            //? function ลดขนาดรูปภาพ
            function imageResize($imageResourceId, $width, $height)
            {
                $targetWidth = $width < 1280 ? $width : 1280;
                $targetHeight = ($height / $width) * $targetWidth;
                $targetLayer = imagecreatetruecolor($targetWidth, $targetHeight);
                imagecopyresampled($targetLayer, $imageResourceId, 0, 0, 0, 0, $targetWidth, $targetHeight, $width, $height);
                return $targetLayer;
            }
            if (empty($namecow) || empty($cowdate)  || empty($weightcow) || empty($highcow)  || empty($gender)) {

                echo warning_toast('โปรดระบุข้อมูลบางส่วนให้ครบ');
            } else {
                $sql = new cow();

                if (!empty($picture)) {
                    $time = date('Ymdhis');
                    $sourceProperties = getimagesize($picture);
                    $fileNewName = $time;
                    $folderPath = "../../dist/img/cow_img/";
                    $ext = $_FILES['file']['name'];
                    $imageType = $sourceProperties[2];
                    echo resize($picture, $imageType, $folderPath, $fileNewName, $ext, $sourceProperties);
                    copy($picture, "../../dist/img/cow_upload/" . $ext);

                    $query = $sql->update_cow($namecow, $cowdate, $highcow, $weightcow,  $species_id, $herd_id, $house_id, $gender, $ext, $idcow);
                    echo success_toasts("แก้ไขข้อมูลโคสำเร็จ", "./_tabcow.php");
                } else {
                    $query = $sql->update_cow($namecow, $cowdate, $highcow, $weightcow,  $species_id, $herd_id, $house_id, $gender, '', $idcow);
                    echo success_toasts("แก้ไขข้อมูลโคสำเร็จ", "./_tabcow.php");
                } // check picture
            } // check Undendifind values
        } // check select spec_id / house_id / herd_id
    } // isset btnsave
    ?>
</body>

</html>
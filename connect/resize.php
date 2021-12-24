<?php 
    function resize($name,$img,$folderPath,$fileNewName,$ext,$sourceProperties){
        switch ($img) {

            case IMAGETYPE_PNG:
                $imageResourceId = imagecreatefrompng($name);
                $targetLayer = imageResize($imageResourceId, $sourceProperties[0], $sourceProperties[1]);
                imagepng($targetLayer, $folderPath . $fileNewName . "_upload" . $ext);
                break;

            case IMAGETYPE_GIF:
                $imageResourceId = imagecreatefromgif($name);
                $targetLayer = imageResize($imageResourceId, $sourceProperties[0], $sourceProperties[1]);
                imagegif($targetLayer, $folderPath . $fileNewName . "_upload" . $ext);
                break;

            case IMAGETYPE_JPEG:
                $imageResourceId = imagecreatefromjpeg($name);
                $targetLayer = imageResize($imageResourceId, $sourceProperties[0], $sourceProperties[1]);
                imagejpeg($targetLayer, $folderPath . $fileNewName . "_upload" . $ext);
                break;

            default:
                echo "Invalid Image type.";
                exit;
                break;
        }
    }
?>
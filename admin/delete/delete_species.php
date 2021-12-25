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
    require_once '../../connect/functions.php';
    require_once '../../connect/alert.php';

    if (isset($_GET['del'])) {
        $id = $_GET['del'];
        $deletedata = new specise();
        $query = $deletedata->selectid($id);
        $result = mysqli_fetch_object($query);

        if ($result->spec_pic != NULL) {
            @unlink("../../dist/img/spec_upload/$result->spec_pic");
        }
        $sql = $deletedata->delspec($id);

        if ($sql) {
            echo success("ลบข้อมูลสำเร็จ", "../main/species");
        }
    }
    ?>
</body>

</html>
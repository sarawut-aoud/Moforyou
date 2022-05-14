<?php
require_once('../../connect/session_ckeck.php');
require_once('../../connect/function_datetime.php');
require_once('../../connect/functions.php');
$get_tombon = file_get_contents('https://raw.githubusercontent.com/sarawut-pcru/Thailand_Map/main/json/tombon.json');

$date = date('Y-m-d');
$farm_id = $_REQUEST['farm'];

$sql = new reports();
$query = $sql->print_req_house($farm_id);
$result = $query->fetch_object();
$tombon = json_decode($get_tombon);
foreach ($tombon as $value) {
    if ($result->district_id == $value->id) { //? check id amphur
        $name_th =  $value->name_th;
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta http-equiv="Content-Type" content="text/html; charset=windows-874">
    <meta http-equiv="Content-Type" content="text/html; charset=tis-620">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>MoForYou</title>
    <link rel="icon" href="../../dist/img/icon/icon.ico" type="image/x-icon" />
    <link rel="stylesheet" href="./print.css">
</head>

<body>
    <div id="paper">


        <table width="100%" style="margin-top: -30px">
            <tr>
                <td colspan="4">&nbsp;</td>
                <td align="right">สั่งพิมพ์ ณ วันที่ : <?php echo Datethai($date); ?></td>
            </tr>
            <tr>
                <td colspan="2" align="center"><img src="../../dist/img/pic2.png" style="padding-left:250px" class="float-left" width="100" height="100">

                </td>
                <td>
                    <h1 align="center" style="text-align: center; padding-right:50px;" class="text"> MoForYou</h1>
                </td>

            </tr>
            <tr>
                <td height="30"></td>
            </tr>
            <tr>
                <td style="font-size: 24px;"><strong>ฟาร์ม </strong> : <?php echo $result->farmname; ?></td>
            </tr>
            <tr>
                <td style="font-size: 24px;"><strong>ผู้ดูแลฟาร์ม </strong>: <?php echo $result->farmname; ?></td>
            </tr>
            <tr>
                <td style="font-size: 24px;"><strong>ติดต่อ </strong>: <?php echo $result->phone; ?> หรือที่ <?php echo $result->email; ?> </td>
            </tr>
            <tr>
                <td style="font-size: 24px;"><strong>ประเภทโคทื่เลี้ยง</strong> : </td>
            </tr>
            <tr>
                <td style="font-size: 24px;"><strong>ที่อยู่ </strong>: <?php echo $result->address . " ตำบล  " . $name_th; ?></td>
            </tr>

        </table>
        <br>
        <span style="font-size: 30px;"><strong>โคเนื้อของ </strong>: <?php echo "<strong>ฟาร์ม </strong>" . $result->farmname . "<strong> คุณ </strong>" .  $result->fullname;  ?></span>
        <table width="100%" cellspacing="0" class="border">
            <br>

            <tr align="center">
                <th>ลำดับ</th>
                <th style="width: 20%;">#</th>
                <th>ชื่อ</th>
                <th>เพศ</th>
                <th>สายพันธุ์</th>
                <th>โรงเรือน</th>
                <th>ฝูง</th>
                <th>อายุ</th>

            </tr>
            <?php
            $datahouse = new cow();
            $row = $datahouse->selectdatacowbyfarmer($farmid);
            $i = 1;
            while ($rs = mysqli_fetch_object($row)) {

                if ($rs->cow_pic != NULL) {
                    $img =   "src='../../dist/img/cow_upload/" . $rs->cow_pic . "'";
                } else {
                    $img =   "src='../../dist/img/icon/sacred-cow.png'";
                }
                $datenew = date_create($rs->date);
                $datenow = date_create(date('d-m-Y'));
                $datediff = date_diff($datenow, $datenew);
                $diff = $datediff->format("%a");
                $years = floor($diff / 365);
                $months = floor(($diff - ($years * 365)) / 30);
                $day =  $diff - (($years * 365) + ($months * 30));
            ?>
                <tr align="center">
                    <td><?php echo $i; ?></td>
                    <td style="width:10%"><img <?php echo $img; ?> width="100px"></td>
                    <td><?php echo $rs->cow_name; ?></td>
                    <td><?php echo $rs->gender; ?></td>
                    <td><?php echo $rs->spec_name; ?></td>
                    <td><?php echo $rs->house_name; ?></td>
                    <td><?php echo $rs->herd_name; ?></td>
                    <td><?php echo  $years . " ปี " . $months . " เดือน " . $day . " วัน "; ?></td>
                    <!--  -->
                </tr>
            <?php
                $i++;
            } ?>

        </table>

    </div>
    <div align="center">
        <input class="prn" onclick="javascript:window.print()" type="image" src="../../dist/img/icon/printer.png" width="55px" name="print1">
    </div><br>
    <div align="center">
        <button type="button" name="submit" onclick="window.history.go(-1); return false;" style="font-size: 20px;" class="btn btn-danger prn"> กลับ </button>
    </div>
    <!-- <script src="./public/js/bootstrap.min.js" crossorigin="anonymous"></script> -->
    <script>
        javascript: window.print();
    </script>
</body>

</html>
<?php
require_once('../../connect/session_ckeck.php');
require_once('../../connect/function_datetime.php');
require_once('../../connect/functions.php');
$get_tombon = file_get_contents('https://raw.githubusercontent.com/sarawut-pcru/Thailand_Map/main/json/tombon.json');
$tombon = json_decode($get_tombon);

$date = date('Y-m-d');
$farm_id = $_REQUEST['farm'];

$sql = new reports();
$query = $sql->print_req_house($farm_id);
$result = $query->fetch_object();
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
        <span style="font-size: 30px;"><strong>การผสมพันธุ์ </strong>: <?php echo "<strong>ฟาร์ม </strong>" . $result->farmname . "<strong> คุณ </strong>" .  $result->fullname;  ?></span>
        <table width="100%" cellspacing="0" class="border">
            <br>

            <tr align="center">
                <th>ลำดับ</th>
                <th>ระหว่าง</th>
                <th>วันที่ / เวลา</th>
                <th>ประมาณวันที่คลอด</th>
                <th>สถานะการตั้งท้อง</th>

            </tr>
            <?php
            $data = new breed();
            $row = $data->select_breed_all($farmid);
            $i = 1;
           
            while ($rs = mysqli_fetch_object($row)) {
                
                if ($rs->breed_status == 'y') {
                    $msg = '<span style="color:green;">แม่โคมีการตั้งท้อง</span>';
                } else if ($rs->breed_status == 'n') {
                    $msg = '<span style="color:red;">แม่โคผสมพันธุ์ไม่ติด</span>';
                } else {
                    $msg = '<span style="color:blue;">รอดูผลการตั้งครรภ์</span>';
                }
            ?>
                <tr align="center">
                    <td style="width: 10%;"><?php echo $i; ?></td>
                    <td><?php echo $rs->namemale . " และ " . $rs->namefemale; ?></td>
                    <td><?php echo DateThai($rs->breed_date); ?></td>
                    <td><?php echo DateThai($rs->breednext); ?></td>
                    <td><?php echo  $msg; ?></td>

                    <!--  -->
                </tr>
            <?php
                $i++;
            }
            ?>

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
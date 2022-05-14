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
                <td style="font-size: 24px;"><strong>ที่อยู่ </strong>: <?php echo $result->address . " ตำบล " . $name_th; ?></td>
            </tr>

        </table>
        <br>
        <span style="font-size: 30px;"><strong>ประวัติการรักษาของ </strong>: <?php echo "<strong>ฟาร์ม </strong>" . $result->farmname . "<strong> คุณ </strong>" .  $result->fullname;  ?></span>
        <table width="100%" cellspacing="0" class="border">
            <br>

            <tr align="center">
                <td width="10%">ลำดับ </td>
                <th>ชื่อโค</th>
                <th>โรค / อาการป่วย</th>

                <th>วันที่เริ่มรักษา</th>
                <th>วันที่สิ้นสุดการรักษา</th>
                <th>รักษากับสัตวแพยท์</th>

            </tr>
            <?php
            $data = new heal();
            $row = $data->select_healbyfarm($farm_id);
            $i = 1;
            while ($rs = $row->fetch_object()) {
                if ($rs->detail != NULL && $rs->healmore != NULL) {
                    $dis = $rs->detail . ' และ ' . $rs->healmore;
                } else if ($rs->detail == NULL) {
                    $dis = $rs->healmore;
                } else {
                    $dis = $rs->detail;
                }
                if ($rs->doctor_id != "") {
                    $data = new doctor();
                    $row = $data->select_docbyfarm($farm_id);
                    while ($rsdoc = $row->fetch_object()) {
                        if ($rsdoc->id == $rs->doctor_id) {
                            $doctor = $rsdoc->name;
                        } else {
                            $doctor = '-';
                        }
                    }
                } else {
                    $doctor = '-';
                }
            ?>
                <tr align="center">
                    <td><?php echo $i; ?></td>
                    <td><?php echo $rs->cow_name; ?></td>
                    <td><?php echo  $dis; ?></td>
                    <td><?php echo DateThai($rs->healstart); ?></td>
                    <td><?php echo DateThai($rs->healend); ?></td>
                    <td><?php echo  $doctor; ?></td>
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
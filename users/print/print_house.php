<?php
require_once('../../connect/session_ckeck.php');
require_once('../../connect/function_datetime.php');
require_once('../../connect/functions.php');
$date = date('Y-m-d');
$farm_id = $_REQUEST['farm'];

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
                <td style="font-size: 24px;">ฟาร์ม : </td>
            </tr>
            <tr>
                <td style="font-size: 24px;">ผู้ดูแลฟาร์ม : </td>
            </tr>
            <tr>
                <td style="font-size: 24px;">ติดต่อ : หรือ </td>
            </tr>
            <tr>
                <td style="font-size: 24px;">ประเภทโคทื่เลี้ยง : </td>
            </tr>
            <tr>
                <td style="font-size: 24px;">ที่อยู่ :</td>
            </tr>

        </table>
        <br>
        <span style="font-size: 30px;">โรงเรือนของ : </span>
        <table width="100%" border="1" cellspacing="0" class="border">
            <br>

            <tr>
                <td width="10%" align="center">ลำดับ </td>
                <td width="40%" align="center">ชื่อโรงเรือน</td>
                <td width="40%" align="center">จำนวนโคในโรงเรือน</td>

            </tr>

            <tr>
                <td align="center"></td>
                <td align="center"></td>
                <td align="center"></td>

            </tr>


            <tr>
                <td colspan="2" align="center">รวมโคทุกโรงเรือน</td>
                <td align="center"> ตัว</td>
            </tr>
        </table>

    </div>
    <div align="center">
        <input class="prn" onclick="javascript:window.print()" type="image" src="../../dist/img/icon/printer.png" width="55px" name="print1">
    </div><br>
    <div align="center">
        <button type="button" name="submit" onclick="window.history.go(-1); return false;" style="font-size: 20px;" class="btn btn-danger prn"> กลับ </button>
    </div>
    <!-- <script src="./public/js/bootstrap.min.js" crossorigin="anonymous"></script> -->
    <!-- <script>
        javascript: window.print();
    </script> -->
</body>

</html>
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
function fetch_data()
{
    $farm_id = $_REQUEST['farm'];
    $output = '';
    require_once('../../connect/functions.php');
    $sql = new reports();
    $query2 = $sql->print_req_herd($farm_id);
    $i = 1;
    while ($row = $query2->fetch_object()) {

        $output .= '<tr align="center">  
                         <td>' . $i . '</td>  
                         <td>' . $row->house_name . '</td>  
                         <td>' . $row->herd_name . '</td>  
                         <td>' . $row->cow . '</td>  
                    </tr>  
                         ';
        $i++;
    }
    return $output;
}

require_once('tcpdf/tcpdf.php');
$obj_pdf = new TCPDF('P', PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
$obj_pdf->SetCreator(PDF_CREATOR);
$obj_pdf->SetTitle("Export HTML Table data to PDF using TCPDF in PHP");
$obj_pdf->SetHeaderData('', '', PDF_HEADER_TITLE, PDF_HEADER_STRING);
$obj_pdf->setHeaderFont(array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
$obj_pdf->setFooterFont(array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));
$obj_pdf->SetDefaultMonospacedFont('freeserif');
$obj_pdf->SetFooterMargin(PDF_MARGIN_FOOTER);
$obj_pdf->SetMargins(PDF_MARGIN_LEFT, '5', PDF_MARGIN_RIGHT);
$obj_pdf->setPrintHeader(false);
$obj_pdf->setPrintFooter(false);
$obj_pdf->SetAutoPageBreak(TRUE, 10);
$obj_pdf->SetFont('freeserif', '', 10);
$obj_pdf->AddPage();
$content = '';
$content .= '  
<table width="100%" >
            <tr>
                <td colspan="3">&nbsp;</td>
                <td align="right">เอกสาร ณ วันที่ : ' . Datethai($date) . '</td>
            </tr>
            <tr>
                <td height="30"></td>
            </tr>
            <tr>
                <td ><strong>ฟาร์ม </strong> : ' . $result->farmname . ' </td>
            </tr>
            <tr>
                <td ><strong>ผู้ดูแลฟาร์ม </strong>: ' . $result->fullname . '</td>
            </tr>
            <tr>
                <td colspan="3"><strong>ติดต่อ </strong>: ' . $result->phone . ' หรือที่ ' . $result->email . ' </td>
            </tr>
           
            <tr>
                <td><strong>ที่อยู่ </strong>: ' . $result->farmname . ' ตำบล ' . $name_th . '</td>
            </tr>

        </table>
        <br>
        <br><br>';


$content .= ' <table width="100%"  border="1" style="margin-left:30px">
            <tr align="center">
                <td>ลำดับ </td>
                <td>ชื่อโรงเรือน</td>
                <td>ชื่อฝูง</td>
                <td>จำนวนโคในโรงเรือน</td>
            </tr>
';
$content .= fetch_data();
$content .= '</table>';
$obj_pdf->writeHTML($content);
$obj_pdf->Output('herd.pdf', 'I');

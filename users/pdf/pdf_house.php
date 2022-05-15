<?php
require_once('../../connect/session_ckeck.php');
$get_tombon = file_get_contents('https://raw.githubusercontent.com/sarawut-pcru/Thailand_Map/main/json/tombon.json');
$tombon = json_decode($get_tombon);
$date = date('Y-m-d');

function fetch_data()
{
    $farm_id = $_REQUEST['farm'];
    $output = '';
    require_once('../../connect/functions.php');
    $sql = new reports();
    $query2 = $sql->print_req_house($farm_id);
    $i = 1;
    while ($row = $query2->fetch_object()) {

        $output .= '<tr>  
                         <td>' . $i . '</td>  
                         <td>' . $row->house_name . '</td>  
                         <td>' . $row->cow . '</td>  
                    </tr>  
                         ';
    }
    return $output;
}
require_once('tcpdf/tcpdf.php');
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
$obj_pdf->SetFont('freeserif', '', 12);
$obj_pdf->AddPage();
$content = '';
$content .= '  
<h3 align="center">Export HTML กหฟกฟหกฟหTable data to PDF using TCPDF in PHP</h3><br /><br />  
<table border="1" cellspacing="0" cellpadding="5">  
     <tr>  
          <th width="5%">ID</th>  
          <th width="30%">ชื่อโรงเรือน</th>  
          <th width="10%">จำนวนโคในโรงเรือน</th>  
       
     </tr>  
';
$content .= fetch_data();
$content .= '</table>';
$obj_pdf->writeHTML($content);
$obj_pdf->Output('house.pdf', 'I');

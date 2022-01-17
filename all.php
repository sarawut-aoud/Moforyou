<?php
require_once './connect/database.php';
class datamap extends Database
{
    public function province($id)
    {
        $p = mysqli_query($this->dbcon, "SELECT * FROM province WHERE PROVINCE_ID = '$id'");
        return $p;
    }
    public function amp_prov($pid)
    {
        $amp = mysqli_query($this->dbcon, "SELECT a.AMPHUR_ID , a.AMPHUR_CODE,a.AMPHUR_NAME , a.POSTCODE ,a.PROVINCE_ID
                                            FROM province p INNER JOIN amphur a ON p.PROVINCE_ID = a.PROVINCE_ID 
                                            WHERE a.PROVINCE_ID ='$pid' ");
        return $amp;
    }
    public function tom_prov($pid, $aid)
    {
        $tom = mysqli_query($this->dbcon, "SELECT d.DISTRICT_ID , d.DISTRICT_CODE,d.DISTRICT_NAME ,d.PROVINCE_ID , d.AMPHUR_ID
                                             FROM province p INNER JOIN amphur a ON p.PROVINCE_ID = a.PROVINCE_ID 
                                             INNER JOIN district d ON a.AMPHUR_ID = d.AMPHUR_ID AND a.PROVINCE_ID= d.PROVINCE_ID 
                                             WHERE a.PROVINCE_ID = '$pid' and a.AMPHUR_ID = '$aid' ");
        return $tom;
    }
}

// $get_data = file_get_contents('./json/provinces.json');
// $data = json_decode($get_data);

$sql = new datamap();
$id = 1;
do {
    $query = $sql->province($id);
    $row_prov = mysqli_fetch_object($query);

    $pid = $row_prov->PROVINCE_ID;
    $pcode = $row_prov->PROVINCE_CODE;
    $pname = $row_prov->PROVINCE_NAME;

    $query_amp = $sql->amp_prov($pid);
    
    while ($rs = mysqli_fetch_object($query_amp)) {
        $aid = $rs->AMPHUR_ID;
        $acode = $rs->AMPHUR_CODE;
        $aname = $rs->AMPHUR_NAME;
        $zipcode = $rs->POSTCODE;
        $apid = $rs->PROVINCE_ID;

        if ($apid == $pid) {
            $query_tom = $sql->tom_prov($apid, $aid);
         
              
            while ($row = mysqli_fetch_object($query_tom)) {
             
                $tpid = $row->PROVINCE_ID;
                $taid = $row->AMPHUR_ID;
                $tid = $row->DISTRICT_ID;
                $tcode = $row->DISTRICT_CODE;
                $tname = $row->DISTRICT_NAME;
                
                $tb[] = array('id' => $tid, 'code' => $tcode, 'name_th' => $tname);
            
            }   
            echo "<pre>".print_r($tb)."</pre>" ;
          
                              
        }
        $amp[] = array('id' => $aid, 'code' => $acode, 'name_th' => $aname, 'zipcode' => $zipcode, 'tombon' => $tb);
        break;
    }




    $post[] = array('id' => $pid, 'code' => $pcode, 'name_th' => $pname, 'amphur' => $amp);
    $id = $id + 1;
} while ($id <= 1);


$filename = './json/all/all.json';
$fp = fopen($filename, 'w');
fwrite($fp, json_encode($post, JSON_PRETTY_PRINT));   // here it will print the array pretty
fclose($fp);

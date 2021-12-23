<?php
require_once '../../connect/functions.php';
$id = $_POST['id'];
$opt = '';
$sql = new specise();
$query = $sql->selectid($id);


$opt.= '<form method="POST" enctype="multipart/form-data">';
while ($row=mysqli_fetch_object($query)){
    $opt.= ' <div class="card-body">
        <div class="form-group ">
            <label for="Picturespecise">ภาพ</label>
            <div class="input-group">
                <div class="custom-file">
                    <input type="file" class="form-control" id="file" name="file" onchange="readURLmodal(this)" required>

                </div>
            </div>
        </div>
       <div id="imgControl2" class="d-none">
            <img id="imgUpload2" class="rounded mx-auto d-block h-50 w-50">
        </div>
        <div class="form-group">
            <label for="Namespecise">ชื่อสายพันธุ์</label>
            <input type="text" class="form-control" id="specname" name="specname" placeholder="ชื่อสายพันธุ์" 
            value="<?php echo $row->spec_name;?>"
            required>
        </div>
        <div class="form-group">
            <label for="Specisedetail">รายละเอียด</label>
            <textarea type="text" class="form-control" id="specdetail" name="specdetail"><?php echo $row->spec_detail;?></textarea>
        </div>
    </div>'; 
   

    $opt.= '</form>';


}
?>
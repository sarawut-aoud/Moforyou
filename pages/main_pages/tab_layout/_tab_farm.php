<div class="container ">

    <div class="row row-cols-1 row-cols-md-3 g-4  ">

        <?php
        @$get_tombon = file_get_contents('https://raw.githubusercontent.com/sarawut-pcru/Thailand_Map/main/json/tombon.json');
        require_once '../../connect/functions.php';
        $sql = new farm();
        $perpage = 8;  // แสดงจำนวนในแต่ละหน้า
        if (isset($_GET['page'])) {
            $page = $_GET['page'];
        } else {
            $page = 1;
        }
        $start = ($page - 1) * $perpage;


        $query = $sql->pagin_page($start, $perpage); //เป็นคำสั่งในการค้นหาข้อมูลเฉพาะหน้าที่เราคลิก


        while ($result = mysqli_fetch_assoc($query)) {

            if ($result['farmname'] != "") {
                $farm = $result['farmname'];
            } else {
                $farm = '-';
            }
            if ($result['address'] != '') {
                $address = $result['address'];
            } else {
                $address = '-';
            }
            if ($result['district_id'] != '') {
                $tombon = json_decode($get_tombon);
                foreach ($tombon as $value) {
                    if ($result['district_id'] == $value->id) { //? check id amphur
                        $district_id =  $value->name_th;
                    }
                }
            } else {
                $district_id = '-';
            }
        ?>
            <div class="card-deck">
                <div class="card ">
                    <div class="card-header card-data text-center">
                        <h3>ฟาร์ม : <?php echo $farm; ?></h3>
                    </div>
                    <div class="card-body">
                        <h5 class="card-title mb-4">ชื่อเจ้าของฟาร์ม : คุณ <?php echo $result['fullname']; ?> </h5>

                        <p class="card-text ">โคเนื้อจำนวน : <?php echo $result['cow']; ?> ตัว</p>
                        <p class="card-text ">ที่อยู่: <?php echo  $address; ?></p>
                        <p class="card-text ">อำเภอ:
                            <?php echo $district_id; ?>
                        </p>
                        <p class="card-text ">ติดต่อ : <?php echo $result['phone'] . " หรือ " . $result['email']; ?></p>
                    </div>
                    <div class="card-footer text-center">
                        <button id="<?php echo $result['id'];?>" emailfarm="<?php echo $result['email']; ?>" phone="<?php echo $result['phone']; ?>" farmmer="<?php echo $result['fullname']; ?>" class="btn btn-success modalreqfarm">ดูรายละเอียด
                        </button>
                    </div>
                </div>
            </div>
            <!-- ./col -->

        <?php } ?>

    </div>
    <div class="row justify-content-center  mt-2">

        <?php

        $query2 = $sql->pagin();
        $total_record = mysqli_num_rows($query2);
        $total_page = ceil($total_record / $perpage);
        ?>
        <nav aria-label="Page navigation example">
            <ul class="pagination justify-content-center  mb-5">
                <li class="page-item">
                    <a class="page-link" href="index_tab-farm.php?page=1" aria-label="Previous">
                        <span aria-hidden="true">Previous</span>
                    </a>
                </li>
                <?php for ($i = 1; $i <= $total_page; $i++) { ?>
                    <li class="page-item"><a class="page-link" href="index_tab-farm.php?page=<?php echo $i; ?>"><?php echo $i; ?></a></li>
                <?php } ?>
                <li class="page-item">
                    <a class="page-link" href="index_tab-farm.php?page=<?php echo $total_page; ?>" aria-label="Next">
                        <span aria-hidden="true">Next</span>
                    </a>
                </li>
            </ul>
        </nav>
    </div>
    <!-- /.row -->

</div>
<!-- /.container-fluid -->
<div class="container col-10 ">
    <div class="row row-cols-1 row-cols-md-4 g-4 p-2">
        <?php
        require_once '../../connect/functions.php';
        $sql = new cow();
        $perpage = 2;  // แสดงจำนวนในแต่ละหน้า
        if (isset($_GET['page'])) {
            $page = $_GET['page'];
        } else {
            $page = 1;
        }
        $start = ($page - 1) * $perpage;


        $query = $sql->pagin_page($start, $perpage); //เป็นคำสั่งในการค้นหาข้อมูลเฉพาะหน้าที่เราคลิก


        while ($result = $query->fetch_assoc()) {
            if ($result['cow_pic'] == NULL) {
                $picture = '../../dist/img/pic2.png';
            } else {
            }
            $datenew = date_create($result['cow_date']);
            $datenow = date_create(date('d-m-Y'));
            $datediff = date_diff($datenow, $datenew);
            $diff = $datediff->format("%a");
            $years = floor($diff / 365);
            $months = floor(($diff - ($years * 365)) / 30);
            $day =  $diff - (($years * 365) + ($months * 30));
        ?>
            <div class="card-deck p-3">
                <div class="card text-center">


                    <div class="card-header card-data">
                        <h4>ฟาร์ม : <?php echo $result['farmname']; ?></h4>
                    </div>
                    <div class="text-center p-4">
                        <img src="<?php echo $picture; ?>" class="card-img-top rounded w-50" alt="...">
                    </div>

                    <div class="card-body">
                        <p class="text-start">ชื่อโค : <?php echo $result['cow_name']; ?> </p>
                        <p class="text-start">สายพันธุ์ : <?php echo $result['spec_name']; ?> </p>
                        <p class="text-start">เพศ : <?php echo $result['gender']; ?> </p>
                        <p class="text-start">อายุ : <?php echo  $years . " ปี " . $months . " เดือน " . $day . " วัน "; ?> </p>
                    </div>
                    <div class="card-footer">
                        <button id="<?php echo $result['id']; ?>" class="btn btn-success modalreqcow">ดูรายละเอียด</button>

                    </div>
                </div>
            </div>
            <!-- ./col -->
        <?php } ?>

    </div>
    <!-- /.row -->
    <div class="row justify-content-center fixed-bottom mt-auto  p-2">
        <?php

        $query2 = $sql->pagin();
        $total_record = mysqli_num_rows($query2);
        $total_page = ceil($total_record / $perpage);
        ?>
        <nav aria-label="Page navigation example">
            <ul class="pagination justify-content-center  mb-5">
                <li class="page-item">
                    <a class="page-link" href="#_tab_cow?page=1" aria-label="Previous">
                        <span aria-hidden="true">Previous</span>
                    </a>
                </li>
                <?php for ($i = 1; $i <= $total_page; $i++) { ?>
                    <li class="page-item"><a class="page-link" href="#_tab_cow?page=<?php echo $i; ?>"><?php echo $i; ?></a></li>
                <?php } ?>
                <li class="page-item">
                    <a class="page-link" href="#_tab_cow?page=<?php echo $total_page; ?>" aria-label="Next">
                        <span aria-hidden="true">Next</span>
                    </a>
                </li>
            </ul>
        </nav>
    </div>

</div>
<!-- /.container-fluid -->
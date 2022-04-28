<div class="container">
    <div class="d-flex align-content-between flex-wrap justify-content-center">
        <dic class="p-2 bd-highlight">
            <div class="row row-cols-1 row-cols-md-3 g-4 ">

                <?php
                require_once '../../connect/functions.php';
                $sql = new specise();
                $perpage = 6;  // แสดงจำนวนในแต่ละหน้า
                if (isset($_GET['page'])) {
                    $page = $_GET['page'];
                } else {
                    $page = 1;
                }
                $start = ($page - 1) * $perpage;


                $query = $sql->pagin_page($start, $perpage); //เป็นคำสั่งในการค้นหาข้อมูลเฉพาะหน้าที่เราคลิก


                while ($row = $query->fetch_object()) {
                ?>
                    <div class="card-deck">

                        <div class="card text-center ">
                            <div class="text-center">
                                <?php
                                if ($row->spec_pic != NULL) {
                                ?>
                                    <img src="<?php echo "../../dist/img/spec_upload/$row->spec_pic" ?>" class="rounded w-100 card-img-top">
                                <?php
                                } else {
                                ?>
                                    <img src="../../main_2/dist/img/image-01.jpg" class="rounded w-50 card-img-top" alt="image">
                                <?php
                                }
                                ?>
                            </div>
                            <div class="card-body">
                                <h3 class="text-center"><?php echo $row->spec_name; ?></h3>
                                <p class="card-text"><?php echo $row->spec_detail; ?></p>

                                <!-- <a href="#" class="btn btn-success">Go somewhere</a> -->
                            </div>
                        </div>

                    </div>

                    <!-- ./col -->
                <?php } ?>

            </div>
        </dic>

        <div class="mt-auto mt-2 ">
            <div class="row justify-content-center ">
                <?php

                $query2 = $sql->pagin();
                $total_record = mysqli_num_rows($query2);
                $total_page = ceil($total_record / $perpage);
                ?>
                <nav aria-label="Page navigation example">
                    <ul class="pagination  justify-content-center mt-4">
                        <li class="page-item">
                            <a class="page-link" href="index_tab-specise?page=1" aria-label="Previous">
                                <span aria-hidden="true">Previous</span>
                            </a>
                        </li>
                        <?php for ($i = 1; $i <= $total_page; $i++) { ?>
                            <li class="page-item"><a class="page-link" href="index_tab-specise?page=<?php echo $i; ?>"><?php echo $i; ?></a></li>
                        <?php } ?>
                        <li class="page-item">
                            <a class="page-link" href="index_tab-specise?page=<?php echo $total_page; ?>" aria-label="Next">
                                <span aria-hidden="true">Next</span>
                            </a>
                        </li>
                    </ul>
                </nav>
            </div>

        </div>
    </div>
    <!-- /.row -->

</div>
<!-- /.container-fluid -->
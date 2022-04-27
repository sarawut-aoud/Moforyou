<?php
    require_once '../../connect/functions.php';
    $sql = new cow();
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>itOffside.com Pagination</title>
   <?php 
    require '../../build/script.php';
   ?>
</head>

<body style="margin-top: 10px;">
    <?php
 
    $perpage = 12;  // แสดงจำนวนในแต่ละหน้า
    if (isset($_GET['page'])) {
        $page = $_GET['page'];
    } else {
        $page = 1;
    }
    $start = ($page - 1) * $perpage;
        
   
    $query = $sql->pagin_page($start,$perpage); //เป็นคำสั่งในการค้นหาข้อมูลเฉพาะหน้าที่เราคลิก
   
    ?>
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <table class="table table-bordered table-hover">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Name</th>
                            <th>Price</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php while ($result = mysqli_fetch_assoc($query)) { ?>
                            <tr>
                                <td><?php echo $result['id']; ?></td>
                                <td><?php echo $result['fullname']; ?></td>
                                <td><?php echo $result['email']; ?></td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
                <?php
               
                $query2 =$sql->pagin();
                $total_record = mysqli_num_rows($query2);
                $total_page = ceil($total_record / $perpage);
                ?>
                <nav  aria-label="Page navigation example">
                    <ul class="pagination justify-content-end">
                        <li class="page-item">
                            <a class="page-link" href="func_pagin?page=1" aria-label="Previous">
                                <span aria-hidden="true">Previous</span>
                            </a>
                        </li>
                        <?php for ($i = 1; $i <= $total_page; $i++) { ?>
                            <li class="page-item"><a class="page-link" href="func_pagin?page=<?php echo $i; ?>"><?php echo $i; ?></a></li>
                        <?php } ?>
                        <li class="page-item">
                            <a class="page-link" href="func_pagin?page=<?php echo $total_page; ?>" aria-label="Next">
                                <span aria-hidden="true">Next</span>
                            </a>
                        </li>
                    </ul>
                </nav>
            </div>
        </div>
    </div> <!-- /container -->
  
</body>

</html>
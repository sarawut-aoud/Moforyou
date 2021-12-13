<?php

//query
$query = mysqli_query($conn, "SELECT COUNT(userid) FROM `user`");
$row = mysqli_fetch_row($query);

$rows = $row[0];

$page_rows = 5;  //จำนวนข้อมูลที่ต้องการให้แสดงใน 1 หน้า  ตย. 5 record / หน้า 

$last = ceil($rows / $page_rows);

if ($last < 1) {
    $last = 1;
}

$pagenum = 1;

if (isset($_GET['pn'])) {
    $pagenum = preg_replace('#[^0-9]#', '', $_GET['pn']);
}

if ($pagenum < 1) {
    $pagenum = 1;
} else if ($pagenum > $last) {
    $pagenum = $last;
}

$limit = 'LIMIT ' . ($pagenum - 1) * $page_rows . ',' . $page_rows;

$nquery = mysqli_query($conn, "SELECT * from  user $limit");

$paginationCtrls = '';

if ($last != 1) {

    if ($pagenum > 1) {
        $previous = $pagenum - 1;
        $paginationCtrls .= '<a href="' . $_SERVER['PHP_SELF'] . '?pn=' . $previous . '" class="btn btn-info">Previous</a> &nbsp; &nbsp; ';

        for ($i = $pagenum - 4; $i < $pagenum; $i++) {
            if ($i > 0) {
                $paginationCtrls .= '<a href="' . $_SERVER['PHP_SELF'] . '?pn=' . $i . '" class="btn btn-primary">' . $i . '</a> &nbsp; ';
            }
        }
    }

    $paginationCtrls .= '' . $pagenum . ' &nbsp; ';

    for ($i = $pagenum + 1; $i <= $last; $i++) {
        $paginationCtrls .= '<a href="' . $_SERVER['PHP_SELF'] . '?pn=' . $i . '" class="btn btn-primary">' . $i . '</a> &nbsp; ';
        if ($i >= $pagenum + 4) {
            break;
        }
    }

    if ($pagenum != $last) {
        $next = $pagenum + 1;
        $paginationCtrls .= ' &nbsp; &nbsp; <a href="' . $_SERVER['PHP_SELF'] . '?pn=' . $next . '" class="btn btn-info">Next</a> ';
    }
}
?>
<!DOCTYPE html>
<html>

<head>
    
</head>

<body>

    
    <div class="row">
        <div class="col-lg-2">
        </div>
        <div class="col-lg-6">
            <h4>Simple Pagination using PHP/MySQLi</h4>
            <table width="80%" class="table table-striped table-bordered table-hover">

                <thead>
                    <tr class="info">
                        <th>UserID</th>
                        <th>Firstname</th>
                        <th>Lastname</th>
                        <th>Username</th>
                    </tr>
                </thead>

                <tbody>
                    <?php
                    while ($crow = mysqli_fetch_array($nquery)) {
                    ?>
                        <tr>
                            <td><?php echo $crow['userid']; ?></td>
                            <td><?php echo $crow['firstname']; ?></td>
                            <td><?php echo $crow['lastname']; ?></td>
                            <td><?php echo $crow['username']; ?></td>
                        </tr>
                    <?php
                    }
                    ?>
                </tbody>
            </table>
            <div id="pagination_controls"><?php echo $paginationCtrls; ?></div>
        </div>
        <div class="col-lg-2">
        </div>
    </div>

</body>

</html>
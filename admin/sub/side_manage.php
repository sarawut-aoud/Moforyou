<li class="nav-header">MANAGE PAGES </li>
<?php
// ตัดคำ จาก URI 
$cut = explode("/", $_SERVER["REQUEST_URI"]);
//echo $div[4];
// for($i=0;$i<count($div);$i++){
//   echo $div[$i];
// }
?>

<li class="nav-item  <?php require '../sub_mange/sud_nav-item.php'; ?> ">
  <a href="#" class="nav-link  <?php
                                if ($cut[4] == 'dist_prov.php') {
                                  echo "active";
                                } else if ($cut[4] == 'farmer.php') {
                                  echo "active";
                                } else if ($cut[4] == 'house.php') {
                                  echo "active";
                                } else if ($cut[4] == 'herd.php') {
                                  echo "active";
                                } else if ($cut[4] == 'farm.php') {
                                  echo "active";
                                } else if ($cut[4] == 'species.php') {
                                  echo "active";
                                } else if ($cut[4] == 'cow.php') {
                                  echo "active";
                                } else if ($cut[4] == 'breed.php') {
                                  echo "active";
                                } else if ($cut[4] == 'food.php') {
                                  echo "active";
                                } else if ($cut[4] == 'diseased.php') {
                                  echo "active";
                                } else {
                                  echo "";
                                }
                                ?>
 ">
    <i class="nav-icon fas fa-edit"></i>
    <p>
      Forms
      <i class="fas fa-angle-left right"></i>
    </p>
  </a>
  <ul class="nav nav-treeview">
    <!-- <li class="nav-item">
      <a href="../main/dist_prov" class="nav-link <?php if ($cut[4] == 'dist_prov.php') {
                                                    echo "active";
                                                  }  ?>">
        <i class="far fa-circle nav-icon"></i>
        <p>อำเภอ - จังหวัด</p>
      </a>
    </li> -->

    <li class="nav-item">
      <a href="../main/farmer.php" class="nav-link <?php if ($cut[4] == 'farmer.php') {
                                                  echo "active";
                                                }  ?>">
        <i class="far fa-circle nav-icon"></i>
        <p>เจ้าของฟาร์ม</p>
      </a>
    </li>
    <li class="nav-item">
      <a href="../main/house.php" class="nav-link <?php if ($cut[4] == 'house.php') {
                                                echo "active";
                                              }  ?>">
        <i class="far fa-circle nav-icon"></i>
        <p>โรงเรือน</p>
      </a>
    </li>
    <li class="nav-item">
      <a href="../main/herd.php" class="nav-link <?php if ($cut[4] == 'herd.php') {
                                                echo "active";
                                              }  ?>">
        <i class="far fa-circle nav-icon"></i>
        <p>ฝูงโค</p>
      </a>
    </li>
    <li class="nav-item">
      <a href="../main/farm.php" class="nav-link <?php if ($cut[4] == 'farm.php') {
                                                echo "active";
                                              }  ?> ">
        <i class="far fa-circle nav-icon"></i>
        <p>ฟาร์ม</p>
      </a>
    </li>
    <li class="nav-item">
      <a href="../main/species.php" class="nav-link <?php if ($cut[4] == 'species.php') {
                                                  echo "active";
                                                }  ?>">
        <i class="far fa-circle nav-icon"></i>
        <p>สายพันธุ์</p>
      </a>
    </li>
    <li class="nav-item">
      <a href="../main/cow.php" class="nav-link <?php if ($cut[4] == 'cow.php') {
                                              echo "active";
                                            }  ?>">
        <i class="far fa-circle nav-icon"></i>
        <p>โคเนื้อ</p>
      </a>
    </li>
    <!-- <li class="nav-item">
      <a href="../main/breed" class="nav-link <?php if ($cut[4] == 'breed.php') {
                                                echo "active";
                                              }  ?>">
        <i class="far fa-circle nav-icon"></i>
        <p>การผสมพันธุ์</p>
      </a>
    </li> -->

    <li class="nav-item">
      <a href="../main/diseased.php" class="nav-link <?php if ($cut[4] == 'diseased.php') {
                                                    echo "active";
                                                  }  ?>">
        <i class="far fa-circle nav-icon"></i>
        <p>โรคอาการป่วย</p>
      </a>
    </li>
  </ul>
</li>
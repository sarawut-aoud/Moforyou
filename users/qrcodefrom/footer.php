<?php
// ตัดคำ จาก URI 
$cut = explode("/", $_SERVER["REQUEST_URI"]);
//echo $div[4];
// for($i=0;$i<count($div);$i++){
//   echo $div[$i];
// }
?>
<footer class="main-footer fixed-bottom d-none" style="background-color: rgba(207, 116, 27, 1);">
    <!-- <nav class="nav navbar-expand justify-content-center "> -->
    <div class="container">
        <ul class="nav nav-pills nav-fill ">
            <li class="nav-item ">
                <a class="nav-link flex-sm-fill " role="button" style="color: white;" href="../main/user_index">
                    <i class="far  fa-home" style="font-size:30px"></i>
                </a>
            </li>
            <li class=" nav-item ">
                <a class="nav-link flex-sm-fill " role="button" style="color: white; " href="../main/_listmenu">
                    <i class="far fa-bars" style="font-size:30px"></i>
                </a>
            </li>
            <li class=" nav-item ">
                <a class="nav-link flex-sm-fill " role="button" style="color: white; " href="../main/_setting">
                    <i class="far fa-user-cog" style="font-size:30px"></i>
                </a>
            </li>


        </ul>
    </div>
</footer>
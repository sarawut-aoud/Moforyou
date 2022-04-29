<?php
require '../../connect/session_ckeck.php';
require_once '../../connect/functions.php';

$id = $_SESSION['id'];
$sql = new farm();
$fcheck = $sql->checkregisfarm($id);
$selectdata = $sql->selectfarm($id);
$result_data = $selectdata->fetch_object();
// เช็คว่ามีการลงทะเบียนฟาร์มหรือไม่
$result = mysqli_num_rows($fcheck);
//ถ้าไม่มีส่งไปหน้าลงทะเบียน
if (empty($result)) {
    require_once '../alert/check_farm.php';
} else {
    while ($obj = $fcheck->fetch_object()) {
        $_SESSION['farm_id'] = $obj->id;
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>MoForYou</title>
    <?php require '../../build/script.php'; ?>
</head>
<style>
    .main-footer {
        padding: 0 0 0 0;
        width: 100%;
    }

    .far {
        color: white;
    }

    .far:hover {
        color: saddlebrown;
    }

    .card-user {
        background: rgb(107, 255, 102);
        background: linear-gradient(0deg, rgba(107, 255, 102, 1) 0%, rgba(255, 180, 11, 1) 100%);

    }

    .colorfont {
        color: white;
    }

    .colorfont:hover {
        color: saddlebrown;
    }
</style>

<body class="hold-transition sidebar-collapse layout-top-nav">
    <div class=" wrapper">
        <div class="preloader flex-column justify-content-center align-items-center">
            <img class="" src="../../dist/img/Preloader-1.gif" alt="RELOAD">
        </div>
        <!-- Navbar -->
        <?php require '../sub/navbar.php'; ?>
        <!-- /.navbar -->

        <!-- Content Wrapper. Contains page content -->
        <div class="bgimg content-wrapper">
            <!-- Content Header (Page header) -->
            <div class="content-header">
                <div class="container">

                </div><!-- /.container-fluid -->
            </div>
            <!-- /.content-header -->

            <!-- Main content -->
            <div class="content ">
                <div class="container ">
                    <div class="row  ">
                        <div class="col-md-12  col-sm-12">
                            <div class="card ">
                                <div class="card-header card-user">
                                    <h2 class="text-center m-0 "><i class="fa fa-wreath blink"></i> ยินดีตอนรับ <i class="fa fa-wreath blink"></i></h2>
                                </div>
                                <div class="card-body ">
                                    <div class="d-flex justify-content-around">
                                        <h3 class="card-text ">
                                            คุณ : <?php echo $_SESSION['fullname']; ?>
                                        </h3>
                                        <h3 class="card-text">
                                            ฟาร์ม : <?php echo $result_data->farmname; ?>
                                        </h3>
                                    </div>

                                </div>

                            </div>
                        </div>
                        <!-- <div class="row"> -->
                        <div class="col-lg-6 col-md-12 col-sm-12 ">
                            <!-- small box -->
                            <div class="small-box bg-gradient-pink">
                                <div class="inner">
                                    <h3 id="farmdata"> ผสมพันธุ์ครั้งล่าสุด</h3>
                                    <div class="d-flex justify-content-start">
                                        <p style="font-size: 18px;" id="datebreed"></p>
                                    </div>
                                    <div class="d-flex  mt-4">
                                        <p class="card-text mr-5 ml-4">
                                            ตัวผู้ : <span id="namemale"></span>
                                        </p>
                                        <p class="card-text  ml-5">
                                            ตัวเมีย : <span id="namefemale"></span>
                                        </p>
                                    </div>
                                </div>
                                <div class="icon">
                                    <i class="fas fa-venus-mars"></i>
                                </div>

                                <a href="../report/req-breed" class="small-box-footer">ดูข้อมูล <i class="fas fa-arrow-circle-right"></i></a>
                            </div>
                        </div>
                        <!-- ./col -->
                        <div class="col-lg-6 col-md-12 col-sm-12 ">
                            <!-- small box -->
                            <div class="small-box bg-gradient-olive">
                                <div class="inner">
                                    <h3>โคภายในฟาร์ม <span style="font-size: 28px;" id="cowdata"></span> ตัว </h3>
                                    <div class="d-flex justify-content-start">
                                        <p style="font-size: 18px;">จำนวนโคเนื้อทั้งหมด</p>
                                    </div>
                                    <div class="d-flex ml-5 mt-4">
                                        <p class="card-text ml-4">พ่อโค : <span id="male"> </span> ตัว</p>
                                        <p class="card-text ml-4">แม่โค : <span id="female"> </span> ตัว</p>
                                    </div>
                                </div>
                                <div class="icon">
                                    <i class="fad fa-cow"></i>
                                </div>
                                <a href="../report/req-cow" class="small-box-footer">ดูข้อมูล <i class="fas fa-arrow-circle-right"></i></a>
                            </div>
                        </div>
                        <!-- ./col -->

                        <div class="col-md-6  col-sm-12 ">

                            <div class="card card-purple card-outline">
                                <div class="card-header">
                                    <h5 class="text-center m-0"><i class="fa fa-briefcase-medical"></i> ประวัติการรักษาครั้งล่าสุด</h5>
                                </div>
                                <div class="card-body">

                                    <div class="d-flex justify-content-end">
                                        <h6 class="card-title">วันที่ : <span id="dateheal"></span> </h6>
                                    </div>
                                    <p class="card-text">โค : <span id="namecowheal"></span> </p>
                                    <p class="card-text">อาการป่วย / โรค : <span id="heal"></span></p>
                                    <p class="card-text">สัตวแพทย์ : <span id="doctorheal"></span></p>
                                    <a href="../report/req-heal" class="btn btn-primary"><i class="fas fa-search"></i> ดูรายละเอียด</a>

                                </div>
                            </div>
                        </div>

                        <!-- /.col-md-6 -->
                        <div class="col-lg-6 col-md-12 col-sm-12 ">

                            <div class="card card-success card-outline ">
                                <div class="card-header">
                                    <h5 class="text-center m-0"><i class="fa fa-wheat"></i> ประวัติการให้อาหารครั้งล่าสุด</h5>
                                </div>
                                <div class="card-body">
                                    <div class="d-flex justify-content-end">
                                        <h6 class="card-title"> วันที่ : <span id="datefood"></span> </h6>
                                    </div>
                                    <hr>
                                    <p class="card-text">ทั้งหมด <span id="cowfood"></span> ตัว</p>
                                    <p class="card-text">น้ำหนักอาหารทั้งสิ้น <span id="weightfood"></span> กิโลกรัม</p>
                                    <a href="../report/req-foodrecord" class="btn btn-primary"><i class="fas fa-search"></i> ดูรายละเอียด</a>
                                </div>
                            </div>

                        </div>
                        <!-- /.col-md-6 -->
                    </div>


                    <!-- /.container-fluid -->
                </div>
                <div class="container ">
                    <div class="row mb-5">
                        <div class="col-lg-6 col-md-12 col-sm-12 mb-5">
                            <div class="card card-primary card-outline">
                                <div class="card-header">
                                    <h3 class="card-title">
                                        <i class="far fa-chart-bar"></i>
                                        Bar Chart
                                    </h3>
                                    <div class="card-tools">
                                        <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                            <i class="fas fa-minus"></i>
                                        </button>

                                    </div>
                                </div>
                                <div class="card-body">
                                    <div id="bar-chart" style="height: 300px;"></div>
                                </div>

                            </div>
                        </div>
                        <div class="col-lg-6 col-md-12 col-sm-12 mb-5">
                            <div class="card card-primary card-outline">
                                <div class="card-header">
                                    <h3 class="card-title">
                                        <i class="far fa-chart-bar"></i>
                                        โคแต่ละสายพันธุ์
                                    </h3>
                                    <div class="card-tools">
                                        <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                            <i class="fas fa-minus"></i>
                                        </button>

                                    </div>
                                </div>
                                <div class="card-body">
                                    <div id="donut-chart" style="height: 300px;"></div>
                                </div>
                            </div>
                        </div>
                        <!-- /.row -->
                    </div>
                </div>
                <!-- /.content -->
            </div>
            <!-- /.content-wrapper -->
            <!-- Main Footer -->
            <?php require '../sub/footer.php';
            $sql = new reports();
            $farm_id = $_SESSION['farm_id'];
            $query = $sql->req_cow($farm_id);
            ?>

        </div>
        <!-- ./wrapper -->
        <!-- <script src="../../plugins/flot/jquery.flot.js"></script>

        <script src="../../plugins/flot/plugins/jquery.flot.resize.js"></script>

        <script src="../../plugins/flot/plugins/jquery.flot.pie.js"></script> -->
        <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
        <script type="text/javascript">
            google.charts.load('current', {
                'packages': ['corechart']
            });
            google.charts.setOnLoadCallback(drawChart);

            function drawChart() {
                var data = google.visualization.arrayToDataTable([
                    ['spec_name', 'cow'],
                    <?php
                    while ($row =  $query->fetch_array()) {
                        echo "['" . $row["spec_name"] . "', " . $row["cow"] . "],";
                    }
                    ?>
                ]);
                var options = {
                    is3D: true,
                    title: '',
                    //is3D:true,  
                    pieHole: 0.4,
                    colors: ['#864313', '#c9641d', '#e68c4d', '#efb78f', '#f5d4bc'],
                };
                var chart = new google.visualization.PieChart(document.getElementById('donut-chart'));
                chart.draw(data, options);
            }
        </script>

        <script>
            $(document).ready(function() {

                cache_clear();

                setInterval(function() {
                    cache_clear()
                }, 60000);
            });

            function cache_clear() {

                var farm_id = '<?php echo $_SESSION['farm_id']; ?>'
                $.ajax({
                    type: "get",
                    dataType: 'json',
                    url: '../process/_index.php',
                    data: {
                        function: 'breed',
                        farm_id: farm_id,
                    },
                    success: function(result) {

                        $('#datebreed').html(result.date2);
                        $('#namemale').html(result.namemale2);
                        $('#namefemale').html(result.namefemale2);
                    }
                });
                $.ajax({
                    type: "get",
                    dataType: 'json',
                    url: '../process/_index.php',
                    data: {
                        function: 'cow',
                        farm_id: farm_id,
                    },
                    success: function(result) {
                        $('#cowdata').html(result.cou_cow);
                        $('#male').html(result.cou_male);
                        $('#female').html(result.cou_female);
                    }
                });
                $.ajax({
                    type: "get",
                    dataType: 'json',
                    url: '../process/_index.php',
                    data: {
                        function: 'food',
                        farm_id: farm_id,
                    },
                    success: function(result) {
                        $('#datefood').html(result.date);
                        // $('#cowfood').html(result.cow);
                        $('#weightfood').html(result.weight_food);
                        var date = result.date;
                        $.ajax({
                            type: "get",
                            dataType: 'json',
                            url: '../process/_index.php',
                            data: {
                                function: 'foodcow',
                                date: date,
                                farm_id: farm_id,
                            },
                            success: function(result) {

                                $('#cowfood').html(result.cow);

                            }
                        });
                    }
                });
                $.ajax({
                    type: "get",
                    dataType: 'json',
                    url: '../process/_index.php',
                    data: {
                        function: 'heal',
                        farm_id: farm_id,
                    },
                    success: function(result) {
                        $('#dateheal').html(result.date);
                        $('#namecowheal').html(result.cow);

                        $('#doctorheal').html(result.docname);


                        var dis_id = result.dis;
                        $.ajax({
                            type: 'get',
                            dataType: 'json',
                            url: '../process/_index.php',
                            data: {
                                function: 'showdisease',
                            },
                            success: function(results) {
                                var data = '';
                                for (i in results) {
                                    if (results[i].id == dis_id) {
                                        var detail = results[i].detail
                                    }
                                }
                                if (dis_id != "") {
                                    $('#heal').html(detail + "  " + result.heal);
                                }

                            }
                        });
                    }
                });

            }
        </script>
</body>

</html>
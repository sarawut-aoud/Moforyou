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
                                        วันที่ xx-xx-xxx
                                    </div>
                                    <div class="d-flex  mt-4">
                                        <p class="card-text mr-5 ml-4">
                                            ตัวผู้ : สีทอง
                                        </p>
                                        <p class="card-text  ml-5">
                                            ตัวเมีย : สีแหบ
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
                                    <h3 id="cowdata"><span style="font-size: 28px;">โคภายในฟาร์ม </span>4</h3>
                                    <div class="d-flex justify-content-start">
                                        จำนวนโคเนื้อทั้งหมด
                                    </div>
                                    <div class="d-flex ml-5 mt-4">
                                        <p class="card-text ml-4">พ่อโค : 5 ตัว</p>
                                        <p class="card-text ml-4">แม่โค : 5 ตัว</p>
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
                                        <h6 class="card-title">วันที่ : XX-XX-XXXX </h6>
                                    </div>
                                    <p class="card-text">โค : </p>
                                    <p class="card-text">อาการป่วย / โรค :</p>
                                    <p class="card-text">สัตวแพทย์ :</p>
                                    <a href="#" class="btn btn-primary"><i class="fas fa-search"></i> ดูรายละเอียด</a>

                                </div>
                            </div>
                        </div>

                        <!-- /.col-md-6 -->
                        <div class="col-lg-6 col-md-12 col-sm-12 mb-5">

                            <div class="card card-success card-outline ">
                                <div class="card-header">
                                    <h5 class="text-center m-0"><i class="fa fa-wheat"></i> ประวัติการให้อาหารครั้งล่าสุด</h5>
                                </div>
                                <div class="card-body">
                                    <div class="d-flex justify-content-end">
                                        <h6 class="card-title">วันที่ : XX-XX-XXXX </h6>
                                    </div>
                                    <p class="card-text">ทั้งหมด ... ตัว</p>
                                    <p class="card-text">น้ำหนักอาหารทั้งสิ้น : กิโลกรัม</p>
                                    <a href="#" class="btn btn-primary"><i class="fas fa-search"></i> ดูรายละเอียด</a>
                                </div>
                            </div>

                        </div>
                        <!-- /.col-md-6 -->
                    </div>


                    <!-- /.container-fluid -->
                </div>
                <div class="container col-10 ">
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
                                        Donut Chart
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
            <?php require '../sub/footer.php'; ?>
            
        </div>
        <!-- ./wrapper -->
        <script>
            $(function() {

                /*
                 * BAR CHART
                 * ---------
                 */

                var bar_data = {
                    data: [
                        [1, 10],
                        [2, 8],
                        [3, 4],
                        [4, 13],
                        [5, 17],
                        [6, 9]
                    ],
                    bars: {
                        show: true
                    }
                }
                $.plot('#bar-chart', [bar_data], {
                    grid: {
                        borderWidth: 1,
                        borderColor: '#f3f3f3',
                        tickColor: '#f3f3f3'
                    },
                    series: {
                        bars: {
                            show: true,
                            barWidth: 0.5,
                            align: 'center',
                        },
                    },
                    colors: ['#3c8dbc'],
                    xaxis: {
                        ticks: [
                            [1, 'January'],
                            [2, 'February'],
                            [3, 'March'],
                            [4, 'April'],
                            [5, 'May'],
                            [6, 'June']
                        ]
                    }
                })
                /* END BAR CHART */

                /*
                 * DONUT CHART
                 * -----------
                 */

                var donutData = [{
                        label: 'Series2',
                        data: 30,
                        color: '#ffc324'
                    },
                    {
                        label: 'Series3',
                        data: 20,
                        color: '#ffda77'
                    },
                    {
                        label: 'Series4',
                        data: 50,
                        color: '#ff7900'
                    }
                ]
                $.plot('#donut-chart', donutData, {
                    series: {
                        pie: {
                            show: true,
                            radius: 1,
                            innerRadius: 0.5,
                            label: {
                                show: true,
                                radius: 2 / 3,
                                formatter: labelFormatter,
                                threshold: 0.1
                            }

                        }
                    },
                    legend: {
                        show: false
                    }
                })
                /*
                 * END DONUT CHART
                 */

            })

            /*
             * Custom Label formatter
             * ----------------------
             */
            function labelFormatter(label, series) {
                return '<div style="font-size:16px; text-align:center; padding:4px; color: #fff; font-weight: 600;">' +
                    label +
                    '<br>' +
                    Math.round(series.percent) + '%</div>'
            }
        </script>

</body>

</html>
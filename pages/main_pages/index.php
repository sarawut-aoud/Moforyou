<?php
require_once '../../connect/functions.php';
require_once '../../connect/function_datetime.php';
$date = date("Y-m-d");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta http-equiv="Content-Type" content="text/html; charset=windows-874">
    <meta http-equiv="Content-Type" content="text/html; charset=tis-620">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>MoForYou</title>

    <?php require '../../build/script.php'; ?>
    <link rel="stylesheet" href="./_main_page.css">
    <style>
        .card-data {
            background: rgb(255, 189, 104);
            background: radial-gradient(circle, rgba(255, 189, 104, 1) 0%, rgba(82, 48, 16, 1) 92%);
            color: white;
        }

        .edit-head {
            background: rgba(209, 128, 0, 1);
            color: #fff;
        }

        .font-big {
            font-size: 18px;
        }
    </style>

<body class=" hold-transition sidebar-collapse layout-top-nav">

    <div class=" wrapper mb-5">
        <div class="preloader flex-column justify-content-center align-items-center">
            <img class="" src="../../dist/img/Preloader-1.gif" alt="RELOAD">
        </div>
        <!-- Navbar -->
        <?php require './navbar.php'; ?>
        <!-- /.navbar -->

        <!-- Content Wrapper. Contains page content -->
        <div class="bgimg content-wrapper mt-5 ">

            <!-- Content Header (Page header) -->
            <section class=" content-header ">
                <div class=" container-fluid mt-2  ">

                    <div class=" row justify-content-center ">
                        <div class="col">
                            <ul class="nav nav-pills " id="custom-content-below-tab" role="tablist">
                                <li class="nav-item  col-md-3 col-sm-12 mt-2">
                                    <a class="bt active" id="tab-farm-tab" href="index.php">หน้าแรก</a>
                                </li>
                                <li class="nav-item  col-md-3 col-sm-12 mt-2">
                                    <a class="bt " id="tab-farm-tab" href="index_tab-farm.php">ฟาร์ม</a>
                                </li>
                                <li class="nav-item  col-md-3 col-sm-12 mt-2">
                                    <a class="bt " id="tab-cow-tab" href="index_tab-cow.php">โคเนื้อ</a>
                                </li>
                                <li class="nav-item col-md-3 col-sm-12 mt-2">
                                    <a class="bt " id="tab-specise-tab" href="index_tab-specise.php">สายพันธุ์โคเนื้อ</a>
                                </li>
                            </ul>
                        </div>

                    </div>
                </div><!-- /.container-fluid -->
            </section>
            <!-- /.content-header -->
            <!-- Main Tab -->
            <div class=" tab-content mt-3 " id="custom-content-below-tabContent">
                <!-- row card -->
                <!-- tab-1 -->
                <div class="tab-pane fade show active " id="tab-farm">
                    <?php require './tab_layout/_tab_index.php'; ?>
                </div>

                <!-- /.row card -->
            </div>
        </div>

        <!-- /.content-wrapper -->
        <?php
        require './footer.php'; ?>
        <a id="back-to-top" href="#" class="btn btn-secondary back-to-top" role="button" aria-label="Scroll to top">
            <i class="fas fa-chevron-up"></i>
        </a>
    </div>
    <!-- ./wrapper -->
    <?php
    $sql = new reports();
    $query = $sql->req_cow(''); ?>
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
                pieHole: 0.4,
                colors: ['#402E32', '#864313', '#c9641d', '#e68c4d', '#936444', '#B4876C', '#efb78f', '#f5d4bc', '#FFCFAC', '#DFE0DF'],
            };
            var chart = new google.visualization.PieChart(document.getElementById('bar1'));
            chart.draw(data, options);
        }
    </script>
    <script type="text/javascript">
        google.charts.load('current', {
            packages: ['corechart', 'bar']
        });
        google.charts.setOnLoadCallback();

        function load_monthwise_data(month, year) {

            $.ajax({
                url: "./_reqindex.php",
                method: "get",
                data: {
                    month: month,
                    year: year,
                    function: 'barchart1'
                },
                dataType: "JSON",
                success: function(data) {
                    drawMonthwiseChart1(data);
                }
            });
        }

        function drawMonthwiseChart1(chart_data) {
            var jsonData = chart_data;
            var data = new google.visualization.DataTable();
            data.addColumn('string', 'name');
            data.addColumn('number', '');
            $.each(jsonData, function(i, jsonData) {
                var detail = jsonData.detail;
                // var row = parseFloat($.trim(jsonData.row));
                var row = jsonData.row;
                data.addRows([
                    [detail, row ]
                ]);
            });
            var options = {
                title: '',
                hAxis: {
                    title: ""
                },
                legend: {
                    position: "none"
                },
            };

            var chart = new google.visualization.ColumnChart(document.getElementById('bar2'));
            chart.draw(data, options);
        }
    </script>
    <script>
        $(document).ready(function() {

            $('#month_id2,#year_id2').change(function() {
                var month = $('#month_id2').val();
                var year = $('#year_id2').val();
                if (month != '' && year != '') {
                    load_monthwise_data(month, year);
                }
            });

        });
    </script>
</body>


</html>
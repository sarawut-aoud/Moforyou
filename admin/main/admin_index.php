<?php
require '../../connect/session_ckeck.php';
require '../../connect/functions.php';
require_once '../../connect/function_datetime.php';

$date = date('Y-m-d');
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
  <meta http-equiv="Content-Type" content="text/html; charset=windows-874">
  <meta http-equiv="Content-Type" content="text/html; charset=tis-620">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <title>Admin|Dashboard</title>
  <?php
  include '../../build/script.php';
  ?>
</head>

<body class="hold-transition sidebar-mini layout-fixed">
  <div class="wrapper">
    <div class="preloader flex-column justify-content-center align-items-center">
      <img class="animation__shake" src="../../dist/img/loading.gif" alt="RELOAD">
    </div>

    <?php
    // Navbar Admin
    require '../sub/navbar.php';
    // Aside Admin
    require '../sub/aside.php';
    // Manage Pages Admin
    require '../sub/side_manage.php';
    // Reports Admin   
    require '../sub/side_reports.php';
    ?>

    </ul>

    <!-- /.sidebar-menu -->

    <!-- /.sidebar -->
    </aside>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <div class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1 class="m-0">Dashboard</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item active">Dashboard</li>
              </ol>
            </div><!-- /.col -->
          </div><!-- /.row -->
        </div><!-- /.container-fluid -->
      </div>
      <!-- /.content-header -->

      <!-- Main content -->
      <section class="content">
        <div class="container-fluid">
          <!-- Small boxes (Stat box) -->
          <?php
          require '../sub/section_header.php';
          ?>
          <!-- Main row -->
          <div class="row">

            <!-- right col (We are only adding the ID to make the widgets sortable)-->
            <!-- <section class="col-lg connectedSortable"> -->
            <!-- Calendar -->
            <div class="row ">
              <div class="col-lg-6 col-md-12 col-sm-12 ">
                <div class="card card-primary card-outline">
                  <div class="card-header">
                    <h3 class="card-title">
                      <i class="far fa-chart-bar"></i>
                      สถิติการเกิดโรคของโค
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
                  <div class="card-footer">
                    <p class="text-center">ข้อมูล ณ วันที่ : <?php echo Datethai($date); ?></>
                  </div>
                </div>
              </div>
              <div class="col-lg-6 col-md-12 col-sm-12 ">
                <div class="card card-primary card-outline">
                  <div class="card-header">
                    <h3 class="card-title">
                      <i class="far fa-chart-bar"></i>
                      จำนวนสายพันธุ์ทั้งหมด
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
                  <div class="card-footer">
                    <p class="text-center">ข้อมูล ณ วันที่ : <?php echo Datethai($date); ?></>
                  </div>
                </div>
              </div>

              <!-- /.row -->
            </div>
            <div class="row mb-5">
              <div class="col-lg-6 col-md-12 col-sm-12 mb-5">
                <div class="card card-primary card-outline">
                  <div class="card-header">
                    <h3 class="card-title">
                      <i class="far fa-chart-bar"></i>
                      ข้อมูลการผสมพันธุ์แยกตามฟาร์ม
                    </h3>
                    <div class="card-tools">
                      <button type="button" class="btn btn-tool" data-card-widget="collapse">
                        <i class="fas fa-minus"></i>
                      </button>

                    </div>
                  </div>
                  <div class="card-body">
                    <div class="form-group row">
                      <div class="input-group">
                        <label class="col-form-label " for="month_id2">เลือกเดือน : </label>
                        <div class="col-md">
                          <select class="form-select" id="month_id2">
                            <?php for ($i = 1; $i <= 12; $i++) {
                              if ($i <= 9) {
                                $month = "0" . $i;
                              } else if ($i >= 10) {
                                $month = $i;
                              }
                            ?>
                              <option value="<?php echo $month; ?>"><?php echo  month($month); ?> </option>
                            <?php } ?>
                          </select>
                        </div>
                        <label class="col-form-label " for="year_id2">เลือกปี : </label>
                        <div class="col-md">
                          <select class="form-select" id="year_id2">
                            <?php $sql2 = new breed();
                            $query2 = $sql2->selectyear();
                            while ($row = $query2->fetch_object()) {
                            ?>
                              <option value="<?php echo $row->year; ?>"><?php echo $row->year; ?> </option>
                            <?php } ?>

                          </select>
                        </div>
                        <label class="col-form-label " for="farm_id">เลือกฟาร์ม : </label>
                        <div class="col-md">
                          <select class="form-select" id="farm_id">
                            <?php $sql2 = new farm();
                            $query2 = $sql2->selectfarm('admin');
                            while ($row = $query2->fetch_object()) {
                            ?>
                              <option value="<?php echo $row->id; ?>"><?php echo $row->farmname; ?> </option>
                            <?php } ?>

                          </select>
                        </div>
                      </div>
                    </div>
                    <div id="bar-chart3" style="height: 300px;"></div>
                  </div>
                  <div class="card-footer">
                    <p class="text-center">ข้อมูล ณ วันที่ : <?php echo Datethai($date); ?></>
                  </div>
                </div>
              </div>
              <div class="col-lg-6 col-md-12 col-sm-12 mb-5">
                <div class="card card-primary card-outline">
                  <div class="card-header">
                    <h3 class="card-title">
                      <i class="far fa-chart-bar"></i>
                      ข้อมูลการผสมพันธุ์แยกตามสายพันธุ์
                    </h3>
                    <div class="card-tools">
                      <button type="button" class="btn btn-tool" data-card-widget="collapse">
                        <i class="fas fa-minus"></i>
                      </button>

                    </div>
                  </div>
                  <div class="card-body">
                    <div class="form-group row">
                      <div class="input-group">
                        <label class="col-form-label " for="month_id">เลือกเดือน : </label>
                        <div class="col-md">
                          <select class="form-select" id="month_id">
                            <?php for ($i = 1; $i <= 12; $i++) {
                              if ($i <= 9) {
                                $month = "0" . $i;
                              } else if ($i >= 10) {
                                $month = $i;
                              }

                            ?>
                              <option value="<?php echo $month; ?>"><?php echo   month($month); ?> </option>
                            <?php } ?>
                          </select>
                        </div>
                        <label class="col-form-label " for="year_id">เลือกปี : </label>
                        <div class="col-md">
                          <select class="form-select" id="year_id">
                            <?php $sql2 = new breed();
                            $query2 = $sql2->selectyear();
                            while ($row = $query2->fetch_object()) {
                            ?>
                              <option value="<?php echo $row->year; ?>"><?php echo $row->year; ?> </option>
                            <?php } ?>

                          </select>
                        </div>
                        <label class="col-form-label " for="spec_id">เลือกสายพันธุ์ : </label>
                        <div class="col-md">
                          <select class="form-select" id="spec_id">
                            <?php $sql2 = new specise();
                            $query2 = $sql2->selspec();
                            while ($row = $query2->fetch_object()) {
                            ?>
                              <option value="<?php echo $row->id; ?>"><?php echo $row->spec_name; ?> </option>
                            <?php } ?>

                          </select>
                        </div>
                      </div>
                    </div>
                    <div id="donut-chart4" style="height: 300px;"></div>

                  </div>
                  <div class="card-footer">
                    <p class="text-center">ข้อมูล ณ วันที่ : <?php echo Datethai($date); ?></>
                  </div>
                </div>
              </div>

              <!-- /.row -->
            </div>
            <!-- /.card -->

            <!-- </section> -->
            <!-- right col -->
          </div>
          <!-- /.row (main row) -->
        </div><!-- /.container-fluid -->
      </section>
      <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
    <?php require '../sub/fooster.php';
    require_once '../../connect/functions.php';
    $sql = new reports();
    $query = $sql->req_cow(''); ?>

  </div>
  <!-- ./wrapper -->

  <script>
    $(document).ready(function(e) {
      // นับจำนวนผู้ใช้
      $.ajax({
        type: 'get', //post put get delete
        dataType: 'json',
        url: '../process/_index.php', //ทำงานที่ไฟล์อะไร
        data: { // ส่งค่าอะไรไปบ้าง
          id: '',
          function: 'showdatauser',
        },
        success: function(result) {
          var datauser = 0;
          for (i = 0; i < result.length; i++) {
            datauser++;
          }
          $('#userdata').html(datauser + ' คน')
        }
      })
      // นับจำนวนฟาร์ม
      $.ajax({
        type: 'get', //post put get delete
        dataType: 'json',
        url: '../process/_index.php', //ทำงานที่ไฟล์อะไร
        data: { // ส่งค่าอะไรไปบ้าง
          id: '',
          function: 'showdatafarm',
        },
        success: function(rs) {

          $('#farmdata').html(rs.datarow + ' ฟาร์ม')

        }
      })
      // นับจำนวนโค
      $.ajax({
        type: 'get', //post put get delete
        dataType: 'json',
        url: '../process/_index.php', //ทำงานที่ไฟล์อะไร
        data: { // ส่งค่าอะไรไปบ้าง
          id: 'count',
          function: 'showcowdata',
        },
        success: function(rs) {
          var cowdata = 0;
          // for (i = 0; i < rs.length; i++) {

          //   cowdata++;
          // }
          if (rs.datarow == 0) {
            $('#cowdata').html('0 ตัว')
          } else {
            $('#cowdata').html(rs.datarow + ' ตัว')
          }


        }
      })
    });
  </script>
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
        colors: ['#402E32', '#864313', '#c9641d', '#e68c4d', '#936444', '#B4876C', '#efb78f', '#f5d4bc', '#FFF7F0', '#DFE0DF'],
      };
      var chart = new google.visualization.PieChart(document.getElementById('donut-chart'));
      chart.draw(data, options);
    }
  </script>
  <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>

  <script type="text/javascript">
    google.charts.load('current', {
      'packages': ['corechart']
    });
    google.charts.setOnLoadCallback(drawChart);

    function drawChart() {
      var data = google.visualization.arrayToDataTable([
        ['detail', 'dis'],
        <?php
        $sqlreq = new reports();
        $query = $sqlreq->req_healanddis('', '');
        while ($row =  $query->fetch_array()) {
          echo "['" . $row["detail"] . "', " . $row["dis"] . "],";
        }
        ?>
      ]);
      var options = {
        is3D: true,
        title: '',
        pieHole: 0.4,
      };
      var chart = new google.visualization.PieChart(document.getElementById('bar-chart'));
      chart.draw(data, options);
    }
  </script>
  <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
  <script type="text/javascript">
    google.charts.load('current', {
      packages: ['corechart', 'bar']
    });
    google.charts.setOnLoadCallback();

    function load_monthwise_data1(month, year, spec) {

      $.ajax({
        url: "../process/_index.php",
        method: "get",
        data: {
          month: month,
          year: year,
          spec: spec,
          function: 'barchartbreed1'
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
        var specname = jsonData.specname;
        var numbreed = parseFloat($.trim(jsonData.numbreed));
        data.addRows([
          [specname, numbreed]
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

      var chart = new google.visualization.ColumnChart(document.getElementById('donut-chart4'));
      chart.draw(data, options);
    }
  </script>
  <script type="text/javascript">
    google.charts.load('current', {
      packages: ['corechart', 'bar']
    });
    google.charts.setOnLoadCallback();

    function load_monthwise_data2(month, year, farm) {

      $.ajax({
        url: "../process/_index.php",
        method: "get",
        data: {
          month: month,
          year: year,
          farm: farm,
          function: 'barchartbreed2'
        },
        dataType: "JSON",
        success: function(data) {
          drawMonthwiseChart(data);
        }
      });
    }

    function drawMonthwiseChart(chart_data) {
      var jsonData = chart_data;
      var data = new google.visualization.DataTable();
      data.addColumn('string', 'name');
      data.addColumn('number', '');
      $.each(jsonData, function(i, jsonData) {
        var farmname = jsonData.farmname;
        var numbreed = parseFloat($.trim(jsonData.numbreed));
        data.addRows([
          [farmname, numbreed]
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

      var chart = new google.visualization.ColumnChart(document.getElementById('bar-chart3'));
      chart.draw(data, options);
    }
  </script>
  <script>
    $(document).ready(function() {

      $('#month_id,#year_id,#spec_id').change(function() {
        var month = $('#month_id').val();
        var year = $('#year_id').val();
        var spec = $('#spec_id').val();
        if (month != '' || year != '' || spec != '') {
          load_monthwise_data1(month, year, spec);
        }
      });
      $('#month_id2,#year_id2,#farm_id').change(function() {
        var month = $('#month_id2').val();
        var year = $('#year_id2').val();
        var farm = $('#farm_id').val();
        if (month != '' || year != '' || farm != '') {
          load_monthwise_data2(month, year, farm);
        }
      });
    });
  </script>

</body>

</html>
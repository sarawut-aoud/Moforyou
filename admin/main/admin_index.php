<?php
require '../../connect/session_ckeck.php';

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
            <div class="row mb-5">
              <div class="col-lg-6 col-md-12 col-sm-12 mb-5">
                <div class="card card-primary card-outline">
                  <div class="card-header">
                    <h3 class="card-title">
                      <i class="far fa-chart-bar"></i>
                      สถิติการเกิดโรคโรคของโค
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
        $query = $sqlreq->req_healanddis();
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


</body>

</html>
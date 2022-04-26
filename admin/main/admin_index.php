<?php
require '../../connect/session_ckeck.php';

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
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
            <section class="col-lg connectedSortable">
              <!-- Calendar -->
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
              <!-- /.card -->

            </section>
            <!-- right col -->
          </div>
          <!-- /.row (main row) -->
        </div><!-- /.container-fluid -->
      </section>
      <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
    <?php require '../sub/fooster.php'; ?>

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
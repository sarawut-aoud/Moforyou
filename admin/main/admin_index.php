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
              <section class="col-lg-5 connectedSortable">
                <!-- Calendar -->
                <div class="card bg-gradient">
                  <div class="card-header border-0">

                    <h3 class="card-title">
                      <i class="far fa-calendar-alt"></i>
                      Calendar
                    </h3>
                    <!-- tools card -->
                    <div class="card-tools">
                      <button type="button" class="btn btn-default btn-sm" data-card-widget="collapse">
                        <i class="fas fa-minus"></i>
                      </button>
                      <button type="button" class="btn btn-default btn-sm" data-card-widget="remove">
                        <i class="fas fa-times"></i>
                      </button>
                    </div>
                    <!-- /. tools -->
                  </div>
                  <!-- /.card-header -->
                  <div class="card-body pt-0">
                    <!--The calendar -->
                    <div id="calendar" style="width: 100%"></div>
                  </div>
                  <!-- /.card-body -->
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

  </body>

  </html>

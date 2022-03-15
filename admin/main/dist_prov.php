<?php

require_once '../../connect/session_ckeck.php';
require '../../connect/functions.php';

require '../../connect/api_map.php';
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

</script>

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
              <h1 class="m-0">ManagePages อำเภอ&จังหวัด</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="./admin_index">Home</a></li>
                <li class="breadcrumb-item active">districts&provinces</li>
              </ol>
            </div><!-- /.col -->
          </div><!-- /.row -->
        </div><!-- /.container-fluid -->
      </div>
      <!-- /.content-header -->

      <!-- Main content -->
      <section class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-12">
              <div class="card">
                <div class="card-header card-outline card-blue">
                  <h3 class="text-center">อำเภอ Districts</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                  <!--  table -->
                  <table id="example1" class="table table-bordered table-striped table-hover">
                    <!-- head table -->
                    <thead>
                      <tr>
                        <th>id</th>
                        <th>Name thai</th>
                        <th>Name English</th>
                        <th>Provinces</th>
                      </tr>
                    </thead>
                    <!-- /.haed table -->
                    <!-- body table -->
                    <tbody>
                      <tr>
                        <?php
                        foreach ($map as $value) {
                          foreach ($value->amphure as $amp) {
                        ?>
                            <td><?php echo $amp->id; ?></td>
                            <td><?php echo $amp->name_th; ?></td>
                            <td><?php echo $amp->name_en; ?></td>
                            <td><?php echo $value->name_th; ?></td>
                      </tr>
                  <?php
                          }
                        }
                  ?>
                    </tbody>
                    <!-- /.body table -->
                    <!-- foot table -->
                    <tfoot>
                      <tr>
                        <th>id</th>
                        <th>Name thai</th>
                        <th>Name English</th>
                        <th>Provinces</th>
                      </tr>
                    </tfoot>
                    <!-- /.foot table -->
                  </table>
                  <!--  /.table -->
                </div>
                <!-- /.card-body -->
              </div>
              <!-- /.card -->
              <div class="card">
                <div class="card-header card-outline card-blue">
                  <h3 class=" text-center">จังหวัด Provinces</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                  <!-- table -->
                  <table id="example2" class="table table-bordered table-striped table-hover">
                    <!-- head table -->
                    <thead>
                      <tr>
                        <th>id</th>
                        <th>Name thai</th>
                        <th>Name English</th>
                      </tr>
                    </thead>
                    <!-- /.head table -->
                    <!-- body table -->
                    <tbody>
                      <tr>
                        <?php
                        for ($i = 0; $i < 77; $i++) { ?>
                          <td><?php echo $map[$i]->id; ?></td>
                          <td><?php echo $map[$i]->name_th; ?></td>
                          <td><?php echo $map[$i]->name_en; ?></td>
                      </tr>
                    <?php
                        }
                    ?>
                    </tbody>
                    <!-- /.body table -->
                    <!-- foot table -->
                    <tfoot>
                      <tr>
                        <th>id</th>
                        <th>Name thai</th>
                        <th>Name English</th>
                      </tr>
                    </tfoot>
                    <!-- /.foot table -->
                  </table>
                  <!-- /.table -->
                </div>
                <!-- /.card-body -->
              </div>
              <!-- /.card -->
            </div>
            <!-- /.col -->

          </div>
          <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
      </section>
      <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
    <?php require '../sub/fooster.php'; ?>

  </div>
  <!-- ./wrapper -->

</body>
<script src="../../dist/js/datatable.js"></script>

</html>
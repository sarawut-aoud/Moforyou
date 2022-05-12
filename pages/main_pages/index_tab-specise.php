<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
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
    </style>

<body class=" hold-transition sidebar-collapse layout-top-nav">

    <div class=" wrapper mb-5">
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
                                    <a class="bt " id="tab-index" href="index.php">หน้าแรก</a>
                                </li>
                                <li class="nav-item  col-md-3 col-sm-12 mt-2">
                                    <a class="bt " id="tab-farm-tab" href="index_tab-farm.php">ฟาร์ม</a>
                                </li>
                                <li class="nav-item  col-md-3 col-sm-12 mt-2">
                                    <a class="bt " id="tab-cow-tab" href="index_tab-cow.php">โคเนื้อ</a>
                                </li>
                                <li class="nav-item col-md-3 col-sm-12 mt-2">
                                    <a class="bt active" id="tab-specise-tab" href="index_tab-specise.php">สายพันธุ์โคเนื้อ</a>
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
                    <?php
                    require_once '../../connect/functions.php';
                    require './tab_layout/_tab_specise.php'; ?>
                </div>

                <!-- /.row card -->
            </div>
        </div>

        <!-- /.content-wrapper -->
        <?php require_once './modalreqcow.php';
        require_once './modalreqfarm.php';
        require './footer.php'; ?>
        <a id="back-to-top" href="#" class="btn btn-secondary back-to-top" role="button" aria-label="Scroll to top">
            <i class="fas fa-chevron-up"></i>
        </a>
    </div>
    <!-- ./wrapper -->
    <script>
        $(document).ready(function() {
            $(document).on('click', '.modalreqfarm', function() {
                var id = $(this).attr('id');
                $('#reqfarm').modal('show');
            })
            $(document).on('click', '.modalreqcow', function() {
                var id = $(this).attr('id');
                $('#reqcow').modal('show');
            })
        })
    </script>
</body>


</html>
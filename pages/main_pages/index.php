<?php
require '../../connect/functions.php'
?>
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
            background: rgb(209, 128, 0);
            background: linear-gradient(0deg, rgba(209, 128, 0, 1) 0%, rgba(255, 231, 168, 1) 45%, rgba(255, 231, 168, 1) 58%, rgba(209, 128, 0, 1) 100%);
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
                                <li class="nav-item  col-md-4 col-sm-12 mt-2">
                                    <a class="bt active" id="tab-farm-tab" data-toggle="pill" href="#tab-farm" role="tab" aria-controls="tab-farm" aria-selected="true">ฟาร์ม</a>
                                </li>
                                <li class="nav-item  col-md-4 col-sm-12 mt-2">
                                    <a class="bt " id="tab-cow-tab" data-toggle="pill" href="#tab-cow" role="tab" aria-controls="tab-cow" aria-selected="false">โคเนื้อ</a>
                                </li>
                                <li class="nav-item col-md-4 col-sm-12 mt-2">
                                    <a class="bt " id="tab-specise-tab" data-toggle="pill" href="#tab-specise" role="tab" aria-controls="tab-specise" aria-selected="false">สายพันธุ์โคเนื้อ</a>
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
                <!-- <div class="row row-cols-1 row-cols-md-3 g-4"> -->
                <!-- tab-1 -->
                <div class="tab-pane fade show active " id="tab-farm" role="tabpanel" aria-labelledby="tab-farm-tab">
                    <?php require './tab_layout/_tab_farm.php'; ?>
                </div>
                <!-- tab-2 -->
                <div class="tab-pane fade" id="tab-cow" role="tabpanel" aria-labelledby="tab-cow-tab">
                    <?php require './tab_layout/_tab_cow.php'; ?>
                </div>
                <!-- tab-3 -->
                <div class="tab-pane fade" id="tab-specise" role="tabpanel" aria-labelledby="tab-specise-tab">
                    <?php require './tab_layout/_tab_specise.php'; ?>
                </div>
                <!-- </div> -->
                <!-- /.row card -->
            </div>
        </div>

        <!-- /.content-wrapper -->
        <?php   require_once './modalreqcow.php';
                require_once './modalreqfarm.php';
                require './footer.php'; ?>
        <!-- <a id="back-to-top" href="#" class="btn btn-primary back-to-top" role="button" aria-label="Scroll to top">
            <i class="fas fa-chevron-up"></i>
        </a> -->
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
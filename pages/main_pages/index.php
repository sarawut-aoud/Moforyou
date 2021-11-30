<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>MoForYou</title>
    <?php require '../../build/script.php'; ?>

    <style>
        .card-head {
            background: rgb(195, 104, 0);
            background: -moz-linear-gradient(90deg, rgba(195, 104, 0, 1) 0%, rgba(236, 161, 0, 1) 38%, rgba(255, 188, 0, 1) 100%);
            background: -webkit-linear-gradient(90deg, rgba(195, 104, 0, 1) 0%, rgba(236, 161, 0, 1) 38%, rgba(255, 188, 0, 1) 100%);
            background: linear-gradient(90deg, rgba(195, 104, 0, 1) 0%, rgba(236, 161, 0, 1) 38%, rgba(255, 188, 0, 1) 100%);
            filter: progid:DXImageTransform.Microsoft.gradient(startColorstr="#c36800", endColorstr="#ffbc00", GradientType=1);
        }

        .btn {
            line-height: 1.5;
            color: #fff;
            text-transform: uppercase;
            width: 100%;
            height: 50px;
            border-radius: 25px;
            background: #c36800;
            display: -webkit-box;
            display: -webkit-flex;
            display: -moz-box;
            display: -ms-flexbox;
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 0 25px;

            -webkit-transition: all 0.4s;
            -o-transition: all 0.4s;
            -moz-transition: all 0.4s;
            transition: all 0.4s;
        }

        .btn:hover {
            background: rgba(236, 161, 0, 1);

        }

        .btn.active {
            background: rgba(236, 161, 0, 1);
        }

        .txt-resp {
            display: inline;
        }

        .main-footer {
            padding: 0 0 0 0;
            width: 100%;
        }

        /* Extra small devices (phones, 600px and down) */
        @media only screen and (max-width: 600px) {
            .txt-resp {
                display: none;
            }
        }

        /* Small devices (portrait tablets and large phones, 600px and up) */
        @media only screen and (min-width: 600px) {
            .txt-resp {
                display: none;
            }
        }

        /* Medium devices (landscape tablets, 768px and up) */
        @media only screen and (min-width: 768px) {
            .txt-resp {
                display: inline;
            }
        }
    </style>

<body class="hold-transition sidebar-collapse layout-top-nav">
    <div class="wrapper mb-5">
        <!-- Navbar -->
        <?php require './navbar.php'; ?>
        <!-- /.navbar -->

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
        
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <div class="container-fluid ">
                   
                    <div class="row justify-content-center">
                        <div class="col">
                            <ul class="nav nav-pills " id="custom-content-below-tab" role="tablist">
                                <li class="nav-item  col-md-4 col-sm-12 mt-2">
                                    <a class="btn active" id="tab-farm-tab" data-toggle="pill" href="#tab-farm" role="tab" aria-controls="tab-farm" aria-selected="true">ฟาร์ม</a>
                                </li>
                                <li class="nav-item  col-md-4 col-sm-12 mt-2">
                                    <a class="btn " id="tab-cow-tab" data-toggle="pill" href="#tab-cow" role="tab" aria-controls="tab-cow" aria-selected="false">โคเนื้อ</a>
                                </li>
                                <li class="nav-item col-md-4 col-sm-12 mt-2">
                                    <a class="btn " id="tab-specise-tab" data-toggle="pill" href="#tab-specise" role="tab" aria-controls="tab-specise" aria-selected="false">สายพันธุ์โคเนื้อ</a>
                                </li>
                            </ul>
                        </div>

                    </div>
                </div><!-- /.container-fluid -->
            </section>
            <!-- /.content-header -->
            <!-- Main Tab -->
            <div class="tab-content mt-3" id="custom-content-below-tabContent">
                <!-- Main Content -->
                <!-- tab-1 -->
                <div class="tab-pane fade show active" id="tab-farm" role="tabpanel" aria-labelledby="tab-farm-tab">
                    <?php require './sub_main/_tab_farm.php'; ?>
                </div>
                <!-- tab-2 -->
                <div class="tab-pane fade" id="tab-cow" role="tabpanel" aria-labelledby="tab-cow-tab">
                    <?php require './sub_main/_tab_cow.php'; ?>
                </div>
                <!-- tab-3 -->
                <div class="tab-pane fade" id="tab-specise" role="tabpanel" aria-labelledby="tab-specise-tab">
                    <?php require './sub_main/_tab_specise.php'; ?>
                </div>
            </div>
        </div>
        <!-- /.content-wrapper -->
        <?php require './footer.php'; ?>

    </div>
    <!-- ./wrapper -->

</body>
<script>
    $(function() {
        $("#example1").DataTable({
            "responsive": true,
            "lengthChange": false,
            "autoWidth": false
        }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');

        $("#example2").DataTable({
            "responsive": true,
            "lengthChange": false,
            "autoWidth": false
        }).buttons().container().appendTo('#example2_wrapper .col-md-6:eq(0)');

        $("#example3").DataTable({
            "responsive": true,
            "lengthChange": false,
            "autoWidth": false
        }).buttons().container().appendTo('#example3_wrapper .col-md-6:eq(0)');

    });
</script>

</html>
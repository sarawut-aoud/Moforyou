<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>MoForYou</title>

    <?php require '../../build/script.php'; ?>
</head>
<style>
    .bt_list {
        line-height: 1.5;
        color: #fff;
        text-transform: uppercase;
        width: 100%;
        height: 60px;
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

    .bt_list:hover {
        background: rgba(236, 161, 0, 1);

    }

    .bt_list.active {
        background: rgba(236, 161, 0, 1);
    }

    .main-footer {
        padding: 0 0 0 0;
        width: 100%;
    }

    .fas {
        color: white;
    }

    .fas:hover {
        color: saddlebrown;
    }

    .card {
        border-radius: 15px;
    }
</style>

<body class="hold-transition sidebar-collapse layout-top-nav">
    <div class="wrapper">

        <!-- Navbar -->
        <?php require '../sub/navbar.php'; ?>
        <!-- /.navbar -->

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <div class="content-header">
                <div class="container">
                    <div class="row  ">
                        <div class="col">
                            <div class="card ">
                                <div class="card-body">
                                    <!-- list Manage -->
                                    <ul class="nav nav-pills justify-content-center" id="custom-content-below-tab">
                                        <li class="nav-item  col-md-4 col-sm-12 mt-2">
                                            <a class="btn btn-lg bt_list " href="#tab-farm" role="button">ฟาร์ม</a>
                                        </li>
                                        <li class="nav-item  col-md-4 col-sm-12 mt-2">
                                            <a class="btn btn-lg bt_list" role="button" aria-selected="false">โคเนื้อ</a>
                                        </li>
                                        <li class="nav-item col-md-4 col-sm-12 mt-2">
                                            <a class="btn btn-lg bt_list" href="#tab-specise" role="button">สายพันธุ์โคเนื้อ</a>
                                        </li>
                                        <li class="nav-item  col-md-4 col-sm-12 mt-2">
                                            <a class="btn btn-lg bt_list " href="#tab-farm" role="button">ฟาร์ม</a>
                                        </li>
                                        <li class="nav-item  col-md-4 col-sm-12 mt-2">
                                            <a class="btn btn-lg bt_list " href="#tab-farm" role="button">ฟาร์ม</a>
                                        </li>
                                        <li class="nav-item  col-md-4 col-sm-12 mt-2">
                                            <a class="btn btn-lg bt_list " href="#tab-farm" role="button">ฟาร์ม</a>
                                        </li>

                                        <li class="nav-item  col-md-4 col-sm-12 mt-2">
                                            <a class="btn btn-lg bt_list " href="#tab-farm" role="button">ฟาร์ม</a>
                                        </li>
                                        <li class="nav-item  col-md-4 col-sm-12 mt-2">
                                            <a class="btn btn-lg bt_list " href="#tab-farm" role="button">ฟาร์ม</a>
                                        </li>
                                    </ul>
                                    <hr class="mt-2 mb-2">
                                    <a class="btn btn-lg bt_list col-md-12 col-sm-12 mt-3" href="#">รายงานข้อมูล</a>
                                    <!--/. list Manage -->
                                </div>
                            </div>

                        </div>
                    </div>
                    <!-- ./row -->
                </div><!-- /.container-fluid -->
            </div>
            <!-- /.content-header -->

            <!-- Main content -->

            <section class="content">
                <div class="container ">

                </div>
                <!-- /.container-->
            </section>
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->
        <!-- Main Footer -->
        <?php require '../sub/footer.php'; ?>
    </div>
    <!-- ./wrapper -->
</body>

</html>
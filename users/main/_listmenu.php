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

                </div><!-- /.container-fluid -->
            </div>
            <!-- /.content-header -->

            <!-- Main content -->
            <div class="content">
                <div class="container">
                    <div class="row ">
                        <div class="col-md-12 mt-4">
                        <a class="btn btn-lg btn-info col-md-3 col-sm-12 mt-4" href="#">1</a>
                        <a class="btn btn-lg btn-info col-md-3 col-sm-12 mt-4" href="#">1</a>
                        <a class="btn btn-lg btn-info col-md-3 col-sm-12 mt-4" href="#">1</a>
                        <a class="btn btn-lg btn-info col-md-3 col-sm-12 mt-4" href="#">1</a>
                        <a class="btn btn-lg btn-info col-md-3 col-sm-12 mt-4" href="#">1</a>
                        <a class="btn btn-lg btn-info col-md-3 col-sm-12 mt-4" href="#">1</a>
                        <a class="btn btn-lg btn-info col-md-3 col-sm-12 mt-4" href="#">1</a>
                        <a class="btn btn-lg btn-info col-md-3 col-sm-12 mt-4" href="#">1</a>
                        <hr>
                        <div class="col-md-12 col-sm-12 mt-4">
                            <a class="btn btn-lg btn-info col-md-12 col-sm-12 mt-4" href="#">รายงานข้อมูล</a>
                        </div>
                    </div>
                    
                </div><!-- /.container-fluid -->
            </div>
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->
        <!-- Main Footer -->
        <?php require '../sub/footer.php'; ?>
    </div>
    <!-- ./wrapper -->
</body>

</html>
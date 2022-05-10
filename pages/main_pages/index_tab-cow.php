<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta http-equiv="Content-Type" content="text/html; charset=windows-874">
    <meta http-equiv="Content-Type" content="text/html; charset=tis-620">
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

        .edit-head {
            background: rgba(209, 128, 0, 1);
            color: #fff;
        }

        .font-big {
            font-size: 18px;
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
                                    <a class="bt " id="tab-farm-tab" href="index_tab-farm.php">ฟาร์ม</a>
                                </li>
                                <li class="nav-item  col-md-4 col-sm-12 mt-2">
                                    <a class="bt active" id="tab-cow-tab" href="index_tab-cow.php">โคเนื้อ</a>
                                </li>
                                <li class="nav-item col-md-4 col-sm-12 mt-2">
                                    <a class="bt " id="tab-specise-tab" href="index_tab-specise.php">สายพันธุ์โคเนื้อ</a>
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
                <div class="tab-pane fade show active " id="tab-cow">
                    <?php require './tab_layout/_tab_cow.php'; ?>
                </div>

                <!-- /.row card -->
            </div>
        </div>
        <!-- <button type="button" class="scroll-top" onclick="goToTop();">Go to Top</button> -->
        <!-- /.content-wrapper -->
        <?php require_once './modalreqcow.php';
        require_once './modalreqfarm.php';
        require './footer.php'; ?>
        <!-- id="back-to-top" -->
        <a id="back-to-top" href="#" class="btn btn-secondary back-to-top opacity-75" role="button" aria-label="Scroll to top">
            <i class="fas fa-chevron-up"></i>
        </a>

    </div>
    <!-- ./wrapper -->
    <script>
        $(document).ready(function() {

            $(document).on('click', '.modalreqcow', function() {
                var id = $(this).attr('id');
                $.ajax({
                    type: 'get',
                    dataType: 'json',
                    url: './_reqindex.php',
                    data: {
                        function: "cow",
                        cowid: id,
                    },
                    success: function(result) {
                        $('#reqcow').modal('show');
                        $('#farm-name').html(result.name);
                        $('#farmer-name').html(result.farm_name);
                        $('#cow-name').html(result.cow_name);
                        $('#spec-name').html(result.spec_name);
                        $('#gender').html(result.gender);
                        $('#age').html(result.age);
                        $('#weight').html(result.weight);
                        $('#high').html(result.high);

                        $.ajax({
                            type: 'get',
                            dataType: 'json',
                            url: './_reqindex.php',
                            data: {
                                function: "reqhealloop",
                                cowid: result.cow_id,
                                farmid: result.farm_id,
                            },
                            success: function(rs) {
                                var data = '';

                                for (i in rs) {
                                    if (rs[i].dis_id == '1') {
                                        var dis = '';
                                    } else {
                                        dis = rs[i].detail;
                                    }
                                    if (rs[i].healmore != null && dis == '') {
                                        var disa = rs[i].healmore;
                                    } else {
                                        disa = dis + " และ " + rs[i].healmore;
                                    }
                                    data += ' <div class="form-group row ">';
                                    data += ' <b class="col-lg-3 col-sm-6 col-md-3 font-big">อาการป่วย :</b>';
                                    data += ' <div class="col-lg-3 ">';
                                    data += ' <div id="dis-name">' + disa + '</div>';
                                    data += ' </div>';
                                    data += ' </div>';

                                    data += '<div class="form-group row">';
                                    data += '  <b class="col-lg-3 col-sm-6 col-md-3 font-big">เริ่มแสดงอาการ :</b>';
                                    data += ' <div class="col-lg ">';
                                    data += ' <div id="date-dis">' + rs[i].datestart + '</div>';
                                    data += '</div>';
                                    data += '</div>';
                                    data += '<div class="form-group row">';
                                    data += ' <b class="col-lg-3 col-sm-6 col-md-6 font-big">วันที่เริ่มการรักษา:</b>';
                                    data += ' <div class="col-lg-3 col-sm-6 col-md-6">';
                                    data += '   <div id="start-heal">' + rs[i].healstart + '</div>';
                                    data += ' </div>';
                                    data += '<b class="col-lg-3 col-sm-6 col-md-6 font-big">วันที่สิ้นสุดการรักษา:</b>';
                                    data += '<div class="col-lg-3 col-sm-6 col-md-6">';
                                    data += '<div id="end-heal">' + rs[i].healend + '</div>';
                                    data += '</div>';
                                    data += ' </div>';
                                }
                                $('#showheal').html(data)
                            }
                        })
                    }
                })

            })
        })
    </script>

</body>


</html>
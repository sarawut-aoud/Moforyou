<div class="container ">

    <div class="row justify-content-center ">
        <div class="col-md-10 ">
            <div class="card ">
                <div class="card-header card-data text-center">
                    <h3>เปอร์เซ็นของสายพันธุ์โคเนื้อที่มีการถูกเลี้ยง</h3>
                    <h3> </h3>
                </div>
                <div class="card-body">
                    <div class="form-group row">
                        <div class="input-group">
                            <label class="col-form-label " for="month_id">เลือกเดือน : </label>
                            <div class="col-md">
                                <select class="form-select" id="month_id">
                                    <?php for ($i = 1; $i <= 12; $i++) {
                                        if ($i <= 9) {
                                            $month = "0" . $i;
                                        } else if ($i >= 10) {
                                            $month = $i;
                                        }
                                        switch ($month) {
                                            case '01':
                                                $month_name = "มกราคม";
                                                break;
                                            case '02':
                                                $month_name = "กุมภาพันธ์";
                                                break;
                                            case '03':
                                                $month_name = "มีนาคม";
                                                break;
                                            case '04':
                                                $month_name = "เมษายน";
                                                break;
                                            case '05':
                                                $month_name = "พฤษภาคม";
                                                break;
                                            case '06':
                                                $month_name = "มิถุนายน";
                                                break;
                                            case '07':
                                                $month_name = "กรกฎาคม";
                                                break;
                                            case '08':
                                                $month_name = "สิงหาคม";
                                                break;
                                            case '09':
                                                $month_name = "กันยายน";
                                                break;
                                            case '10':
                                                $month_name = "ตุลาคม";
                                                break;
                                            case '11':
                                                $month_name = "พฤศจิกายน";
                                                break;
                                            case '12':
                                                $month_name = "ธันวาคม";
                                                break;
                                        }
                                    ?>
                                        <option value="<?php echo $month; ?>"><?php echo  $month_name; ?> </option>
                                    <?php } ?>
                                </select>
                            </div>
                            <label class="col-form-label " for="month_id">เลือกปี : </label>
                            <div class="col-md">
                                <select class="form-select" id="year_id">
                                    <?php $sql = new reports();
                                    $query = $sql->req_healyearindex();
                                    while ($row = $query->fetch_object()) {
                                    ?>
                                        <option value="<?php echo $row->year; ?>"><?php echo $row->year; ?> </option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>
                    </div>

                    <div id="bar1" class="w-100 " style="height: 500px;"></div>

                </div>
            </div>
        </div>
        <div class="col-md-10 ">
            <div class="card ">
                <div class="card-header card-data text-center">
                    <h3>เปอร์เซ็นการรักษาโรคที่เกิดกับโคเนื้อ</h3>

                </div>
                <div class="card-body">
                    <div class="form-group row">
                        <div class="input-group">
                            <label class="col-form-label " for="month_id">เลือกเดือน : </label>
                            <div class="col-md">
                                <select class="form-select" id="month_id">
                                    <?php for ($i = 1; $i <= 12; $i++) {
                                        if ($i <= 9) {
                                            $month = "0" . $i;
                                        } else if ($i >= 10) {
                                            $month = $i;
                                        }
                                        switch ($month) {
                                            case '01':
                                                $month_name = "มกราคม";
                                                break;
                                            case '02':
                                                $month_name = "กุมภาพันธ์";
                                                break;
                                            case '03':
                                                $month_name = "มีนาคม";
                                                break;
                                            case '04':
                                                $month_name = "เมษายน";
                                                break;
                                            case '05':
                                                $month_name = "พฤษภาคม";
                                                break;
                                            case '06':
                                                $month_name = "มิถุนายน";
                                                break;
                                            case '07':
                                                $month_name = "กรกฎาคม";
                                                break;
                                            case '08':
                                                $month_name = "สิงหาคม";
                                                break;
                                            case '09':
                                                $month_name = "กันยายน";
                                                break;
                                            case '10':
                                                $month_name = "ตุลาคม";
                                                break;
                                            case '11':
                                                $month_name = "พฤศจิกายน";
                                                break;
                                            case '12':
                                                $month_name = "ธันวาคม";
                                                break;
                                        }
                                    ?>
                                        <option value="<?php echo $month; ?>"><?php echo  $month_name; ?> </option>
                                    <?php } ?>
                                </select>
                            </div>
                            <label class="col-form-label " for="month_id">เลือกปี : </label>
                            <div class="col-md">
                                <select class="form-select" id="year_id">
                                    <?php $sql = new reports();
                                    $query = $sql->req_healyearindex();
                                    while ($row = $query->fetch_object()) {
                                    ?>
                                        <option value="<?php echo $row->year; ?>"><?php echo $row->year; ?> </option>
                                    <?php } ?>

                                </select>
                            </div>
                        </div>
                    </div>
                    <div id="bar2" class="w-100 " style="height: 500px;"></div>

                </div>
            </div>
        </div>


    </div>
    <!-- /.container-fluid -->
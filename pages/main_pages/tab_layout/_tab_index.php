<div class="container ">

    <div class="row justify-content-center ">
        <div class="col-md-10 ">
            <div class="card ">
                <div class="card-header card-data text-center">
                    <h3>เปอร์เซ็นของสายพันธุ์โคเนื้อที่มีการถูกเลี้ยง</h3>
                    <h3> </h3>
                </div>
                <div class="card-body">
                    

                    <div id="bar1" class="w-100 " style="height: 500px;"></div>

                </div>
                <div class="card-footer">
                    <div class="text-center">ข้อมูล ณ วันที่ : <?php echo DateThai($date); ?></div>
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
                            <label class="col-form-label " for="month_id2">เลือกเดือน : </label>
                            <div class="col-md">
                                <select class="form-select" id="month_id2">
                                    <?php for ($i = 1; $i <= 12; $i++) {
                                        if ($i <= 9) {
                                            $month = "0" . $i;
                                        } else if ($i >= 10) {
                                            $month = $i;
                                        }

                                    ?>
                                        <option value="<?php echo $month; ?>"><?php echo  month($month); ?> </option>
                                    <?php } ?>
                                </select>
                            </div>
                            <label class="col-form-label " for="year_id2">เลือกปี : </label>
                            <div class="col-md">
                                <select class="form-select" id="year_id2">
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
                <div class="card-footer">
                    <div class="text-center">ข้อมูล ณ วันที่ : <?php echo DateThai($date); ?></div>
                </div>
            </div>
        </div>


    </div>
    <!-- /.container-fluid -->
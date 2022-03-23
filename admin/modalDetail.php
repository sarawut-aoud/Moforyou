<!-- Modal detail -->
<form action="" method="POST" id="modalRoomall">
    <div class="modal fade" id="modalDetail" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header justify-content-center text-white edit-head">
                    <div class="text-center">
                        <h1> รายละเอียดการขอใช้ห้องประชุม </h1>
                    </div>
                </div>
                <div class="modal-body" id="modaldata">
                    <!-- style="overflow-x: scroll;" -->
                    <!--//? /.html data -->
                    <div class="form-group row  mb-2 ">
                        <center style="font-size: 22px;">
                            <label class="col-form-label ">สถานะ :</label>
                            <span class="col-form-label" id="modal2_status"></span>
                        </center>
                    </div>
                    <div class="form-group row  mb-2">
                        <div class="input-group">
                            <label class="col-md-3 col-form-label ">เลขที่ใบขออนุญาต :</label>
                            <span class="col-form-label col-md-4" id="modal2_evid"></span>
                            <label class=" col-form-label  col-md-3 text-right">วันที่ส่งแบบฟอร์ม :</label>
                            <span class="col-form-label" id="modal2_cre_date"></span>
                        </div>
                    </div>
                    <div class="form-group row  mb-2">
                        <div class="input-group">
                            <label class="col-md-3 col-form-label ">สถานที่ประชุม :</label>
                            <span class="col-form-label col-md-5" id="modal2_roName"></span>
                            <label class=" col-form-label  col-md-2 text-right">รูปแบบห้อง :</label>
                            <span class="col-form-label" id="modal2_style"></span>
                        </div>
                    </div>
                    <div class="form-group row  mb-2">
                        <div class="input-group">
                            <label class="col-md-3 col-form-label ">หัวข้อเรื่องประชุม :</label> <span class="col-form-label col-md-5" id="modal2_title"></span>
                        </div>
                    </div>
                    <div class="form-group row  mb-2">
                        <div class="input-group">
                            <label class="col-md-3 col-form-label ">จำนวนผู้เข้าประชุม :</label> <span class="col-form-label col-md-5" id="modal2_people"></span>
                        </div>
                    </div>
                    <div class="form-group row  mb-2">
                        <div class="input-group">
                            <label class="col-md-3 col-form-label ">ตั้งแต่ :</label> <span class="col-form-label col-md-5 modal1_starttime" id="modal1_starttime"></span>
                        </div>
                    </div>
                    <div class="form-group row  mb-2">
                        <div class="input-group">
                            <label class="col-md-3 col-form-label ">ถึง :</label> <span class="col-form-label col-md-5 modal2_endtime" id="modal2_endtime"></span>
                        </div>
                    </div>

                    <hr style="size: 10px; color:black">
                    <div class="form-group row  mb-2">
                        <div class="input-group">
                            <label class="col-md-3 col-form-label ">อุปกรณ์โสตทัศนูปกรณ์ : </label>
                            <span class="col-form-label col-md" id="modal2_tool"></span>
                        </div>
                    </div>
                    <hr style="size: 10px; color:black">
                    <div class="form-group row  mb-2">
                        <div class="input-group">
                            <label class="col-md-3 col-form-label ">ผู้ใช้ห้องประชุม :</label>
                            <span class="col-form-label col-md-5" id="modal2_name"></span>
                        </div>
                    </div>
                    <div class="form-group row  mb-2">
                        <div class="input-group">
                            <label class="col-md-3 col-form-label ">แผนก :</label>
                            <span class="col-form-label col-md-5" id="modal2_dept"></span>
                        </div>
                    </div>
                    <div class="form-group row  mb-2">
                        <div class="input-group">
                            <label class="col-md-3 col-form-label ">ตำแหน่ง :</label>
                            <span class="col-form-label col-md-5" id="modal2_pos"></span>
                        </div>
                    </div>
                    <div class="form-group row  mb-2">
                        <div class="input-group">
                            <label class="col-md-3 col-form-label ">เบอร์โทรติดต่อสายตรง : </label>
                            <span class="col-form-label col-md-5" id="modal2_phone"></span>
                        </div>
                    </div>

                    <!--//? /.html data -->
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">ปิดหน้านี้</button>
                </div>
            </div>
        </div>
    </div>

</form>
<!-- Modal detail -->
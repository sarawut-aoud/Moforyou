<!-- Modal -->
<div class="modal fade " id="reqcow" tabindex="-1" role="dialog">
    <!--กำหนด id ให้กับ modal-->
    <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header justify-content-center  edit-head">
                <div class="text-center">
                    <h4 id="calendarmodal-title"><i class="fas fa-cow"></i> รายละเอียดข้อมูลโค </h4>
                </div>
            </div>
            <br>
            <div class="col-lg p-4">
                <div class="form-group row">
                    <b class="col-lg-3 col-sm-6 col-md-6 font-big">ฟาร์ม :</b>
                    <div class="col-lg-3 col-sm-6 col-md-6 ">
                        <div id="farm-name"></div>
                    </div>

                    <b class="col-lg-3 col-sm-6 col-md-6 font-big">เจ้าของฟาร์ม :</b>
                    <div class="col-lg-3 col-sm-6 col-md-6 ">
                        <div id="farmer-name"></div>
                    </div>
                </div>

                <hr class="mt-auto mb-3">
                <div class="form-group row">
                    <b class="col-lg-3 col-sm-6 col-md-6  font-big">ชื่อโค :</b>
                    <div class="col-lg-3 col-sm-6 col-md-6 ">
                        <div id="cow-name"></div>
                    </div>

                    <b class="col-lg-3 col-sm-6 col-md-6  font-big">สายพันธุ์ :</b>
                    <div class="col-lg-3 col-sm-6 col-md-6 ">
                        <div id="spec-name"></div>
                    </div>
                </div>

                <div class="form-group row ">
                    <b class="col-lg-3 col-sm-6 col-md-6  font-big">เพศโค :</b>
                    <div class="col-lg-3 col-sm-6 col-md-6 ">
                        <div id="gender"></div>
                    </div>
                    <b class="col-lg-3 col-sm-6 col-md-6  font-big">อายุโค :</b>
                    <div class="col-lg-3 col-sm-6 col-md-6 ">
                        <div id="age"></div>
                    </div>
                </div>
                <div class="form-group row ">
                    <b class="col-lg-3 col-sm-6 col-md-6  font-big">น้ำหนัก :</b>
                    <div class="col-lg-3 col-sm-6 col-md-6 ">
                        <div id="weight"></div>
                    </div>
                    <b class="col-lg-3 col-sm-6 col-md-6 ">ส่วนสูง :</b>
                    <div class="col-lg-3">
                        <div id="high"></div>
                    </div>
                </div>
                <hr class="mt-3 mb-3 ">
                <div class="form-group row ">
                    <b class="col-lg-3 col-sm-6 col-md-3 font-big">อาการป่วย :</b>
                    <div class="col-lg-3 ">
                        <div id="dis-name"></div>
                    </div>
                </div>

                <div class="form-group row">
                    <b class="col-lg-3 col-sm-6 col-md-3 font-big">เริ่มแสดงอาการ :</b>
                    <div class="col-lg ">
                        <div id="date-dis"></div>
                    </div>
                </div>
                <div class="form-group row">
                    <b class="col-lg-3 col-sm-6 col-md-6 font-big">วันที่เริ่มการรักษา:</b>
                    <div class="col-lg-3 col-sm-6 col-md-6">
                        <div id="start-heal"></div>
                    </div>
                    <b class="col-lg-3 col-sm-6 col-md-6 font-big">วันที่สิ้นสุดการรักษา:</b>
                    <div class="col-lg-3 col-sm-6 col-md-6">
                        <div id="end-heal"></div>
                    </div>
                </div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">ปิดหน้านี้</button>
            </div>
        </div>
    </div>
</div>
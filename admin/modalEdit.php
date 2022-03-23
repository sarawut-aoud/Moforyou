
<!-- Modal Edit -->
<form action="" method="POST" id="frmModalEdit">
    <div class="modal fade" id="modalEdit" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header justify-content-center text-white bg-info">
                    <div class="text-center">
                        <h1 id="modaltextcenter"></h1>
                    </div>
                </div>
                <div class="modal-body" id="modaldata">
                    <!-- style="overflow-x: scroll;" -->
                    <!--//? /.html data -->
                    <div class="form-group row">
                        <div class="input-group">
                            <label class="col-md-2 col-form-label">ชื่อเจ้าของฟาร์ม : </label>
                            <div class="col-md-10">
                                <input type="text" class="form-control " id="modalfullname" name="modalfullname" />
                            </div>
                        </div>
                    </div>
                    <!--? /.Title Name -->
                    <div class="form-group row">
                        <div class="input-group">
                            <label class="col-md-2 col-form-label">เบอร์โทร :</label>
                            <div class="col-md-10">
                                <input type="text" class="form-control " id="modalphone" name="modalphone" />
                            </div>
                        </div>
                    </div>
                  
                    <div class="form-group row">
                        <div class="input-group">
                            <label class="col-md-2 col-form-label">อีเมล :</label>
                            <div class="col-md-10">
                                <input type="text" class="form-control " id="modalemail" name="modalemail" />
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="input-group">
                            <label class="col-md-2 col-form-label">บัตรประชาชน :</label>
                            <div class="col-md-10">
                                <input type="text" class="form-control " id="modalpersonid" name="modalpersonid" readonly />
                            </div>
                        </div>
                    </div>

                    <!--//? /.html data -->
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn col-md-4 btn-secondary" data-bs-dismiss="modal">ปิดหน้านี้</button>
                    <button type="submit" id="btnsave" name="btnsave" class="col-md-4 btn btn-warning mt-2 ">ยืนยันการแก้ไข</button>
                </div>
            </div>
        </div>
    </div>
    <input type="hidden" value="" id="modal_ev_id" name="ev_id"/>
    <input type="hidden" value="" id="modal_eventid" name="eventid"/>
    <input type="hidden" value="" id="modal_status" name="evstatus"/>
    <!-- <input type="hidden" value="" id="modal_ro_id" name="ro_id"/>
    <input type="hidden" value="" id="modal_st_id" name="st_id"/> -->
</form>
<!-- Modal Edit -->


<!-- Modal Edit house-->
<form action="" method="POST" id="frmModalEdit">
    <div class="modal fade" id="modalEdithouse" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header justify-content-center text-white bg-info">
                    <div class="text-center">
                        <h1 id="modalhouse"></h1>
                    </div>
                </div>
                <div class="modal-body" id="modaldata">
                    <!-- style="overflow-x: scroll;" -->
                    <!--//? /.html data -->
                    <div class="form-group row">
                        <div class="input-group">
                            <label class="col-md-2 col-form-label">ชื่อโรงเรือน : </label>
                            <div class="col-md-10">
                                <input type="text" class="form-control " id="housename" name="housename" />
                            </div>
                        </div>
                    </div>
                    <!--//? /.html data -->
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn col-md-4 btn-secondary" data-bs-dismiss="modal">ปิดหน้านี้</button>
                    <button type="submit" id="btnsaveRoom" name="btnsave" class="col-md-4 btn btn-warning mt-2 ">ยืนยันการแก้ไข</button>
                </div>
            </div>
        </div>
    </div>
    <input type="hidden" value="" id="modal_ev_id" name="ev_id"/>
    <input type="hidden" value="" id="modal_eventid" name="eventid"/>
    <input type="hidden" value="" id="modal_status" name="evstatus"/>
    <!-- <input type="hidden" value="" id="modal_ro_id" name="ro_id"/>
    <input type="hidden" value="" id="modal_st_id" name="st_id"/> -->
</form>
<!-- Modal Edit -->
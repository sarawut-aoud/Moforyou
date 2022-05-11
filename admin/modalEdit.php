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
                    <button type="button" title="ปิดหน้านี้" class="btn col-md-4 btn-secondary" data-bs-dismiss="modal">ปิดหน้านี้</button>
                    <button type="submit" title="บันทึกข้อมูล" class="col-md-4 btn btn-warning mt-2 btnsave">ยืนยันการแก้ไข</button>
                </div>
            </div>
        </div>
    </div>
    <input type="hidden" value="" id="modal_fid" name="id" />
</form>
<!-- Modal Edit -->


<!-- Modal Edit house-->
<form action="" method="POST" id="frmModal">
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
                    <button type="button" title="ปิดหน้านี้" class="btn col-md-4 btn-secondary" data-bs-dismiss="modal">ปิดหน้านี้</button>
                    <button type="submit" title="บันทึกข้อมูล" class="col-md-4 btn btn-warning mt-2 btnsave">ยืนยันการแก้ไข</button>
                </div>
            </div>
        </div>
    </div>
    <input type="hidden" value="" id="modal_houseid" name="id" />

</form>
<!-- Modal Edit -->


<!-- Modal Edit herd-->
<form action="" method="POST" id="frmModal">
    <div class="modal fade" id="modalEditherd" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header justify-content-center text-white bg-info">
                    <div class="text-center">
                        <h1 id="modalherd"></h1>
                    </div>
                </div>
                <div class="modal-body" id="modaldata">
                    <!-- style="overflow-x: scroll;" -->
                    <!--//? /.html data -->
                    <div class="form-group row">
                        <div class="input-group">
                            <label class="col-md-2 col-form-label">ชื่อฝูง : </label>
                            <div class="col-md-10">
                                <input type="text" class="form-control " id="herdname" name="herdname" />
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="input-group">
                            <label class="col-md-2 col-form-label">ชื่อโรงเรือน : </label>
                            <div class="col-md-10">
                                <select class="form-control select2 select2-info " data-dropdown-css-class="select2-info" disabled id="house_id">
                                    <!-- <option value="">--เลือกโรงเรือน --</option> -->
                                </select>
                            </div>
                        </div>
                    </div>
                    <!--//? /.html data -->
                </div>
                <div class="modal-footer">
                    <button type="button" title="ปิดหน้านี้" class="btn col-md-4 btn-secondary" data-bs-dismiss="modal">ปิดหน้านี้</button>
                    <button type="submit" title="บันทึกข้อมูล" class="col-md-4 btn btn-warning mt-2 btnsave">ยืนยันการแก้ไข</button>
                </div>
            </div>
        </div>
    </div>
    <input type="hidden" value="" id="modal_herdid" name="id" />

</form>
<!-- Modal Edit herd-->
<form action="" method="POST" id="frmModal">
    <div class="modal fade" id="modalEditFarm" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header justify-content-center text-white bg-info">
                    <div class="text-center">
                        <h1 id="modaltextcenterfarm"></h1>
                    </div>
                </div>
                <div class="modal-body" id="modaldata">
                    <!-- style="overflow-x: scroll;" -->
                    <!--//? /.html data -->
                    <div class="form-group row">
                        <div class="input-group">
                            <label class="col-md-2 col-form-label">ชื่อฟาร์ม : </label>
                            <div class="col-md-10">
                                <input type="text" class="form-control " id="farmname" name="farmname" />
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="input-group">
                            <label class="col-md-2 col-form-label">อำเภอ : </label>
                            <div class="col-md-10">
                                <select class="form-control select2 select2-info " data-dropdown-css-class="select2-info" id="modalampher_id">
                                    <!-- <option value="">--เลือกโรงเรือน --</option> -->
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="input-group">
                            <label class="col-md-2 col-form-label">ชื่อเจ้าของฟาร์ม  </label>
                            <div class="col-md-10">
                                <input type="text" class="form-control " id="name" name="name" readonly />
                            </div>
                        </div>
                    </div>
                    <!--//? /.html data -->
                </div>
                <div class="modal-footer">
                    <button type="button" title="ปิดหน้านี้" class="btn col-md-4 btn-secondary" data-bs-dismiss="modal">ปิดหน้านี้</button>
                    <button type="submit" title="บันทึกข้อมูล" class="col-md-4 btn btn-warning mt-2 btnsave">ยืนยันการแก้ไข</button>
                </div>
            </div>
        </div>
    </div>
    
    <input type="hidden" id="farm_id" value="">
</form>
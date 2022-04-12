<!-- Modal Edit -->
<form action="" method="POST" id="frmModalEdit">
    <div class="modal fade" id="modalEdit" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg  modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header justify-content-center text-white bg-warning">
                    <div class="text-center">
                        <h1 id="modaltextcenter"></h1>
                    </div>
                </div>
                <div class="modal-body" id="modaldata">
                    <!-- style="overflow-x: scroll;" -->
                    <!--//? /.html data -->
                    <div class="form-group row">
                        <div class="input-group">
                            <label class="col-md-2 col-form-label">ชื่อฝูงโค : </label>
                            <div class="col-md-10">
                                <input type="text" class="form-control " id="modalherd" name="modalherd" />
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="input-group">
                            <label class="col-md-2 col-form-label" for="house_id">โรงเรือน</label>
                            <div class="col-md-10">
                                <select class="form-control select2 select2-cyan" data-dropdown-css-class="select2-cyan" id="modalhouse_id" name="modalhouse_id" data-placeholder="เลือก">
                                </select>
                            </div>
                        </div>
                    </div>
                    <!--? /.Title Name -->
                </div>
                <div class="modal-footer">
                    <button type="button" title="ปิดหน้านี้" class="btn col-md-4 btn-secondary" data-bs-dismiss="modal">ปิดหน้านี้</button>
                    <button type="submit" title="บันทึกข้อมูล" class="col-md-4 btn btn-warning mt-2 btnsave">ยืนยันการแก้ไข</button>
                </div>
            </div>
        </div>
    </div>
    <input type="hidden" value="" id="modal_herdid" name="herdid" />
</form>
<!-- Modal Edit -->
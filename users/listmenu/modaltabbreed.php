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

                    <div class="form-group row">
                        <div class="d-flex align-items-center ">
                            <label class=" col-form-label" for="cow_id_male">
                                <img class="img-circle elevation-2  " src="../../dist/img/icon/male.png" alt="ตัวผุ้">
                            </label>
                            <div class="col-md">
                                <select class="form-control select2" id="modal_cow_id_male" data-placeholder="เลือกพ่อโค"></select>
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="d-flex align-items-center ">
                            <label class=" col-form-label" for="cow_id_female">
                                <img class="img-circle elevation-2  " src="../../dist/img/icon/female.png" alt="ตัวเมีย">
                            </label>
                            <div class="col-md">
                                <select class="form-control select2 " id="modal_cow_id_female" data-placeholder="เลือกแม่โค"></select>
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class=" input-group justify-content-center">
                            <label class=" col-form-label">
                                <span><strong style="font-size: 24px;">ประมาณวันที่ </strong><span id="modal_timeabout"></span></span>
                            </label>

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
    <input type="hidden" value="" id="modal_tabbreed_id" name="breed_id" />
    <input type="hidden" value="" id="modal_tabbreed_date" name="breed_date" />

</form>
<!-- Modal Edit -->
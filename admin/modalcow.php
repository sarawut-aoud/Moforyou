<!-- Modal Edit -->
<form action="" method="POST" id="frmModalEdit" enctype="multipart/form-data">
    <div class="modal fade" id="modalEdit" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg  modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header justify-content-center text-white bg-info  ">
                    <div class="text-center">
                        <h1 id="modaltextcenter"></h1>
                    </div>
                </div>
                <div class="modal-body" id="modaldata">
                    <div class="row">
                        <div class="col-md-4 ">
                            <div class="row justify-content-center">
                                <img class=" img-rounded w-50 h-50" src="../../dist/img/icon/sacred-cow.png" alt="ตัว">
                                <div class="form-group row">
                                    <div class="input-group">
                                        <div class="col-md mt-3">
                                            <input type="file" class="form-control" id="inputfile" name="file">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-8">
                            <div class="form-group row">
                                <div class="input-group">
                                    <label class="col-form-label col-4" for="modalnamecow">ชื่อโค : </label>
                                    <div class="col-md">
                                        <input type="text" class="form-control" id="modalnamecow" name="modalnamecow" placeholder="ชื่อโค" require>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="input-group">
                                    <label class="col-form-label col-4" for="modal_cowdate">วันที่เกิด/รับเข้ามา </label>
                                    <div class="col-md">
                                        <input type="date" class="form-control" id="modal_cowdate" name="modal_cowdate">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="input-group">
                                    <label class="col-form-label col-4" for="modalspecies_id">สายพันธุ์ : </label>
                                    <div class="col-md ">
                                        <select class="form-control select2" id="modalspecies_id" name="modalspecies_id" data-placeholder="เลือกสายพันธุ์" require></select>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row ">
                        <div class="form-group row">
                            <div class="input-group">
                                <label class="col-form-label col-2" for="modalweightcow">น้ำหนัก : </label>
                                <div class="col-md-4">
                                    <input type="number" class="form-control " id="modalweightcow" name="modalweightcow" placeholder="น้ำหนัก" require>
                                </div>
                                <label class="col-form-label col-2" for="modalhighcow">ส่วนสูง : </label>
                                <div class="col-md-4">
                                    <input type="number" class="form-control " id="modalhighcow" name="modalhighcow" placeholder="ส่วนสูง" require>
                                </div>
                            </div>
                        </div>
                        <!-- <div class="form-group row">
                            <div class="input-group">
                                <label class="col-form-label col-2" for="modalfathercow">พ่อโค : </label>
                                <div class="col-md-4">
                                    <input type="text" class="form-control " id="modalfathercow" name="modalfathercow" placeholder="พ่อโค">
                                </div>
                                <label class="col-form-label col-2" for="modalmothercow">แม่โค : </label>
                                <div class="col-md-4">
                                    <input type="text" class="form-control " id="modalmothercow" name="modalmothercow" placeholder="แม่โค">
                                </div>
                            </div>
                        </div> -->
                        <div class="form-group row">
                            <div class="input-group">
                                <label class="col-form-label col-md-2 col-sm" for="modalhouse_id">โรงเรือน : </label>
                                <div class="col-sm-12  col-md-4">
                                    <select class="form-control select2" id="modalhouse_id" name="modalhouse_id" data-placeholder="เลือกโรงเรือน" require></select>
                                </div>
                                <label class="col-form-label col-md-2 col-sm" for="modalherd_id">ฝูง : </label>
                                <div class="col-sm-12 col-md-4">
                                    <select class="form-control select2" id="modalherd_id" name="modalherd_id" data-placeholder="เลือกฝูง" require></select>
                                </div>
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="input-group justify-content-center">
                                <div class="d-flex col-form-label">
                                    <div class="form-group clearfix mr-3">
                                        <div class="icheck-primary d-inline  ">
                                            <input type="radio" id="modalradioPrimary1" name="gender" value="1"   >
                                            <label for="modalradioPrimary1" class="align-self-center">
                                                <img class="img-circle elevation-2 " src="../../dist/img/icon/male.png" alt="ตัว">
                                            </label>
                                        </div>
                                    </div>
                                    <div class="form-group clearfix mr-3">
                                        <div class="icheck-pink d-inline ">
                                            <input type="radio" id="modalradioPrimary2" name="gender" value="2"  >
                                            <label for="modalradioPrimary2">
                                                <img class="img-circle elevation-2  " src="../../dist/img/icon/female.png" alt="ตัวเมีย">
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" title="ปิดหน้านี้" class="btn col-md-4 btn-secondary" data-bs-dismiss="modal">ปิดหน้านี้</button>
                    <button type="submit" title="บันทึกข้อมูล" id="btnsave" name="btnsave" class="col-md-4 btn btn-primary mt-2 btnsave">ยืนยันการแก้ไข</button>
                </div>
            </div>
        </div>
    </div>
    <input type="hidden" value="" id="modal_cowid" name="modal_cowid" />
</form>
<!-- Modal Edit -->
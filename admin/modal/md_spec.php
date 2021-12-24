<div class="modal fade" id="md-spec">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title ">แก้ไขข้อมูล</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <!-- form start -->
                <form id="edit_form" method="POST" enctype="multipart/form-data">
                    <div class="card-body">
                        <div class="form-group ">
                            <label for="Picturespecise">ภาพ</label>
                            <div class="input-group">
                                <div class="custom-file">
                                    <input type="file" class="form-control" id="file_modal" name="file_modal" onchange="readURLmodal(this)">
                                </div>
                            </div>
                        </div>
                        <div id="imgControl2" class="">
                            <img id="imgUpload2" class="rounded mx-auto d-block h-50 w-50">
                        </div>

                        <div class="form-group">
                            <label for="Namespecise">ชื่อสายพันธุ์</label>
                            <input type="text" class="form-control" id="specname_modal" name="specname_modal" placeholder="ชื่อสายพันธุ์" required>
                        </div>
                        <div class="form-group">
                            <label for="Specisedetail">รายละเอียด</label>
                            <textarea type="text" class="form-control" id="specdetail_modal" name="specdetail_modal"></textarea>
                        </div>
                    </div>
                    <!-- /.card-body -->
                    <input type="hidden" name="id" id="id">
            </div>
            <div class="modal-footer justify-content-between">
                <button type="reset" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="submit" name="modal_edit" id="modal_edit" class="btn btn-success">Save</button>
            </div>

            </form>
            <!-- /.form end -->


        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->
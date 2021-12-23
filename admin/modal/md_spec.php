
<div class="modal fade" id="md-spec">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Large Modal</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="card-header">
                    <h3 class="card-title">แก้ไขข้อมูล</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form method="POST" enctype="multipart/form-data">
                    
                    <input type="hidden" id="<?php echo $row->id; ?>" name="id">
                    <div class="card-body">
                        <div class="form-group ">
                            <label for="Picturespecise">ภาพ</label>
                            <div class="input-group">
                                <div class="custom-file">
                                    <input type="file" class="form-control" id="file" name="file" onchange="readURLmodal(this)" required>

                                </div>
                            </div>
                        </div>
                        <div id="imgControl2" class="d-none">
                            <img id="imgUpload2" class="rounded mx-auto d-block h-50 w-50">

                        </div>
                        <div class="form-group">
                            <label for="Namespecise">ชื่อสายพันธุ์</label>
                            <input type="text" class="form-control" id="specname" name="specname" placeholder="ชื่อสายพันธุ์" required value="<?php echo $row->spec_name; ?>">
                        </div>
                        <div class="form-group">
                            <label for="Specisedetail">รายละเอียด</label>
                            <textarea type="text" class="form-control" id="specdetail" name="specdetail"></textarea>
                        </div>
                    </div>
                    <!-- /.card-body -->

                </form>
                <!-- /.form end -->

            </div>
            <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>

                <button type="button" class="btn btn-success">Save changes</button>


            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->
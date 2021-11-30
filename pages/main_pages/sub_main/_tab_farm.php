<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header card-head">
                    <h4 class="text-center text-white mb-0">ฟาร์ม</h4>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <!-- table -->
                    <table id="example1" class="table table-bordered table-striped table-hover">
                        <!-- head table -->
                        <thead>
                            <tr>
                                <th>ฟาร์ม</th>
                                <th>ผู้ดูแลฟาร์ม</th>
                                <th>อำเภอ</th>
                                <th>จังหวัด</th>
                            </tr>
                        </thead>
                        <!-- /.head table -->
                        <!-- body table -->
                        <tbody>
                            <?php for ($i = 0; $i < 50; $i++) { ?>
                                <tr>
                                    
                                    <td>Trident</td>
                                    <td>Internet
                                        Explorer 4.0
                                    </td>
                                    <td>Win 95+</td>
                                    <td>เพชรบูรณ์</td>
                                </tr>
                            <?php } ?>
                        </tbody>
                        <!-- /.body table -->
                        <!-- foot table -->
                        <tfoot>
                            <tr>
                                <th>ฟาร์ม</th>
                                <th>ผู้ดูแลฟาร์ม</th>
                                <th>อำเภอ</th>
                                <th>จังหวัด</th>
                            </tr>
                        </tfoot>
                        <!-- /.foot table -->
                    </table>
                    <!-- /.table -->
                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->
        </div>
        <!-- /.col -->
    </div>
    <!-- /.row -->
</div>
<!-- /.container-fluid -->
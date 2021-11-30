<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header card-head">
                    <h4 class="text-center text-white mb-0">สายพันธุ์โคเนื้อ</h4>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <!-- table -->
                    <table id="example3" class="table table-bordered table-striped table-hover">
                        <!-- head table -->
                        <thead>
                            <tr>
                                <th>สายพันธุ์</th>
                                <th>จำนวน</th>
                            </tr>
                        </thead>
                        <!-- /.head table -->
                        <!-- body table -->
                        <tbody>
                            <?php $x = 0 ;for ($i = 1; $i < 8; $i++) { 
                                $x = $x+$i;
                                ?>
                                <tr>
                                    <td>Trident</td>
                                    <td><?php echo $x ;?></td>
                                </tr>
                            <?php } ?>
                        </tbody>
                        <!-- /.body table -->
                        <!-- foot table -->
                        <tfoot>
                            <tr>
                                <th>สายพันธุ์</th>
                                <th>จำนวน</th>
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
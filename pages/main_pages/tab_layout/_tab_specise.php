<div class="container">
    <div class="row row-cols-1 row-cols-md-3 g-4">
        <?php

        $sel_data = new specise();
        $result = $sel_data->selspec();

        // $datapic = mysqli_fetch_array($result);
        while ($row = mysqli_fetch_object($result)) {

        ?>
            <div class="card-deck">
                
                <div class="card text-center ">
                    <div class="text-center">
                        <?php
                        if ($row->spec_pic != NULL) {
                        ?>
                            <img src="<?php echo "../../dist/img/spec_upload/$row->spec_pic" ?>" class="rounded w-100 card-img-top">
                        <?php
                        } else {
                        ?>
                            <img src="../../main_2/dist/img/image-01.jpg" class="rounded w-50 card-img-top" alt="image">
                        <?php
                        }
                        ?>
                    </div>
                    <div class="card-body">
                        <h3 class="text-center"><?php echo $row->spec_name; ?></h3>
                        <p class="card-text"><?php echo $row->spec_detail; ?></p>

                        <!-- <a href="#" class="btn btn-success">Go somewhere</a> -->
                    </div>
                </div>
            </div>
            <!-- ./col -->
        <?php } ?>
    </div>
    <!-- /.row -->
</div>
<!-- /.container-fluid -->
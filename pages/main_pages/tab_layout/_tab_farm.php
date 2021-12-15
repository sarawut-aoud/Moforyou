<div class="container">
    <div class="row row-cols-1 row-cols-md-3 g-4">
        <?php
        for ($i = 0; $i < 20; $i++) {
        ?>
            <div class="col">
                <div class="card text-center">
                    <img src="../../../dist/img/image-01.jpg" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">Card title</h5>
                        <p class="card-text">This is a longer card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                        
                        <a href="#" class="btn btn-success">Go somewhere</a>
                    </div>
                </div>
            </div>
            <!-- ./col -->
        <?php } ?>
    </div>
    <!-- /.row -->
</div>
<!-- /.container-fluid -->
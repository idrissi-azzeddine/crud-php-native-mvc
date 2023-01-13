<div class="row bg-light mt-5 d-flex justify-content-center">
    <div class="col-10 col-sm-6 col-md-4 text-center">
        <div class="card">
            <span class="card-img-top bg-info shadow"><i class="fas fa-users"></i></span>
            <div class="card-body">
                <span class="card-text">Total Students</span>
                <span class="card-number">
                    <?php echo DB::connect()->query("SELECT * FROM students")->rowCount(); ?>
                </span>
            </div>
        </div>
    </div>
    <div class="col-10 col-sm-6 col-md-4 text-center">
        <div class="card">
            <span class="card-img-top bg-primary shadow"><i class="fas fa-th-list"></i></span>
            <div class="card-body">
                <span class="card-text">Total Classes</span>
                <span class="card-number">
                    <?php echo DB::connect()->query("SELECT * FROM classes")->rowCount(); ?>
                </span>
            </div>
        </div>
    </div>
    <div class="col-10 col-sm-6 col-md-4 text-center">
        <div class="card">
            <span class="card-img-top bg-primary shadow"><i class="fas fa-book"></i></span>
            <div class="card-body">
                <span class="card-text">Total Subject</span>
                <span class="card-number">
                      <?php echo DB::connect()->query("SELECT * FROM subjects")->rowCount(); ?>
                </span>
            </div>
        </div>
    </div>
</div>

<?php

    if (isset($_POST['submit'])) {
        $subject = new SubjectController();
        $result = $subject->addSubject();
    }

?>

<div class="mt-5">
    <div class="row">
        <div class="col-md-5 mx-auto">
            <div class="card">
                <div class="card-body bg-light">
                    <div class="modal-header mb-4">
                        <h5 class="modal-title"> Add Subject </h5>                      
                    </div>
                    <form method="post">
                        <div class="form-group mb-4">
                            <label for="subject_code" class="mb-2"> Code <span class="text-danger">*</span> </label>
                            <input type="text" name="subject_code" class="form-control" placeholder="Code">
                        </div>
                        <div class="form-group mb-4">
                            <label for="subject" class="mb-2"> Subject <span class="text-danger">*</span> </label>
                            <input type="text" name="subject" class="form-control" placeholder="Subject">
                        </div>
                        <div class="form-group mb-4">
                            <label for="description" class="mb-2"> Description <span class="text-danger">*</span> </label>
                            <input type="text" name="description" class="form-control" placeholder="Description">
                        </div>                        
                        <div class="form-group mb-4 justify-content-end">
                            <button class="btn btn-primary" type="submit" name="submit"> Valider </button>
                            <a href="<?php echo BASE_URL ?>subjects" class="btn btn-outline-secondary"> annuler </a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
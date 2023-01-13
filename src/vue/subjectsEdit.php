<?php

    $subject = new SubjectController();
    if (isset($_POST['id'])) {
        $result = $subject->getOneSubject();
    } else {
        Redirect::to('home');
    }
    if (isset($_POST['submit'])) {
        $result = $subject->updateSubject();
    }

?>

<div class="mt-5">
    <div class="row">
        <div class="col-md-5 mx-auto">
            <div class="card">
                <div class="card-body bg-light">
                    <div class="modal-header mb-4">
                        <h5 class="modal-title"> Edit Subject </h5>                      
                    </div>
                    <form method="post">
                        <div class="form-group mb-4">
                            <input type="hidden" name="id" value="<?php echo $result->id ?>">
                            <label for="subject_code" class="mb-2"> Code <span class="text-danger">*</span> </label>
                            <input type="text" name="subject_code" class="form-control" placeholder="Code" value="<?php echo $result->subject_code ?>">
                        </div>
                        <div class="form-group mb-4">
                            <label for="subject" class="mb-2"> Subject <span class="text-danger">*</span> </label>
                            <input type="text" name="subject" class="form-control" placeholder="Subject" value="<?php echo $result->subject ?>">
                        </div>
                        <div class="form-group mb-4">
                            <label for="description" class="mb-2"> Description <span class="text-danger">*</span> </label>
                            <input type="text" name="description" class="form-control" placeholder="Description" value="<?php echo $result->description ?>">
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
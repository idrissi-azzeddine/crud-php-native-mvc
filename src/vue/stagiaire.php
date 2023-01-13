<?php

    include 'includes/header.php';
    if (isset($_POST['submit'])) {
        $admin = new AdminController();
        $afficher = $admin->stagiaire();
    }

?>

<div class="mt-5">
    <div class="row">
        <div class="col-md-5 mx-auto">
            <div class="card">
                <div class="card-header">
                    <h3 class="text-center"> View Result </h3>
                    <div class="card-body bg-light">
                        <form method="post">
                            <div class="form-group mb-4">
                                <label for="student_code" class="mb-2"> Student ID # </label>
                                <input type="text" name="student_code" class="form-control" placeholder="student_code">
                            </div>
                            <div class="form-group mb-4 d-flex align-items-center">
                                <button class="btn btn-primary h-75 me-3" type="submit" name="submit"> Valider </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
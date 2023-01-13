<?php

    if (isset($_POST['submit'])) {
        $classe = new ClasseController();
        $result = $classe->addClasse();
    }

?>

<div class="mt-5">
    <div class="row">
        <div class="col-md-5 mx-auto">
            <div class="card">
                <div class="card-body bg-light">
                    <div class="modal-header mb-4">
                        <h5 class="modal-title"> Add Classe </h5>                      
                    </div>
                    <form method="post">
                        <div class="form-group mb-4">
                            <label for="level" class="mb-2"> Level <span class="text-danger">*</span> </label>
                            <input type="text" name="level" class="form-control" placeholder="Level">
                        </div>
                        <div class="form-group mb-4">
                            <label for="section" class="mb-2"> Section <span class="text-danger">*</span> </label>
                            <input type="text" name="section" class="form-control" placeholder="Section">
                        </div>
                        <div class="form-group mb-4 justify-content-end">
                            <button class="btn btn-primary" type="submit" name="submit"> Valider </button>
                            <a href="<?php echo BASE_URL ?>classes" class="btn btn-outline-secondary"> annuler </a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
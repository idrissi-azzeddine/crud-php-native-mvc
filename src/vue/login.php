<?php

    if (isset($_POST['submit'])) {
        $em = new AdminController();
        $af = $em->login();
    }

?>

<div class="mt-5">
    <div class="row">
        <div class="col-md-5 mx-auto">
            <div class="card">
                <div class="card-header">
                    <h3 class="text-center"> Connexion </h3>
                    <div class="card-body bg-light">
                        <form method="post">
                            <div class="form-group mb-4">
                                <label for="pseudo" class="mb-2"> Pseudo <span class="text-danger">*</span> </label>
                                <input type="text" name="pseudo" class="form-control" placeholder="Pseudo">
                            </div>
                            <div class="form-group mb-4">
                                <label for="password" class="mb-2"> Password <span class="text-danger">*</span> </label>
                                <input type="password" name="password" class="form-control" placeholder="Password">
                            </div>
                            <div class="form-group mb-4 d-flex align-items-center">
                                <button class="btn btn-primary h-75 me-3" type="submit" name="submit"> Valider </button>
                                <a class="btn btn-success h-75 me-3" href="<?php echo BASE_URL ?>stagiaire"> veiw Result </a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

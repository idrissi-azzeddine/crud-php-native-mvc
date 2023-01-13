<nav class="navbar fixed-top navbar-expand-lg navbar-light bg-light">
    <div class="container-fluid">
        <a class="navbar-brand" href="<?php echo BASE_URL ?>studentsresults"> <i class="fa-solid fa-house"></i> </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"> <span class="navbar-toggler-icon"></span> </button>
        <div class="collapse navbar-collapse position-relative" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0 position-relative">
                <li class="nav-item ms-3">
                    <p class="nav-link active text-dark text-uppercase fw-bold position-absolute top-50 start-100 translate-middle ms-5"> <?php echo isset($_SESSION['student_code']) ? 'Hallo_Mr_' .$_SESSION['student_code'] : 'haloo' ?> </p>
                </li>
            </ul>
            <form class="d-flex">
                <a href="<?php echo BASE_URL ?>logout" title="Déconnexion" class="btn btn-outline-danger"> <i class="fa-solid fa-arrow-right-from-bracket"></i> </a>
            </form>
        </div>
    </div>
</nav>
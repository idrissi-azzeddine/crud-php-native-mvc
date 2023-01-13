<nav class="navbar fixed-top navbar-expand-lg navbar-light bg-light">
    <div class="container-fluid">
        <a class="navbar-brand" href="<?php echo BASE_URL ?>home"> <i class="fa-solid fa-house"></i> </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"> <span class="navbar-toggler-icon"></span> </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="<?php echo BASE_URL ?>home"><i class="fa fa-dashboard" aria-hidden="true"></i></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?php echo BASE_URL ?>classes"><i class="nav-icon fas fa-th-list"></i></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?php echo BASE_URL ?>subjects"><i class="nav-icon fas fa-book"></i></a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false"> <i class="nav-icon fas fa-users"></i> </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <li>
                            <a class="dropdown-item nav-link" href="<?php echo BASE_URL ?>studentsAdd"> <i class="fas fa-angle-right nav-icon me-2 ms-2"></i> <i class="nav-icon fa-solid fa-user-plus"></i> </a>
                        </li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>
                        <li>
                            <a class="dropdown-item nav-link" href="<?php echo BASE_URL ?>students"> <i class="fas fa-angle-right nav-icon me-2 ms-2"></i> <i class="nav-icon fa-solid fa-list-check"></i> </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?php echo BASE_URL ?>results" tabindex="-1" aria-disabled="true"><i class="nav-icon fas fa-file-alt"></i></a>
                </li>
            </ul>
            <form class="d-flex">
                <a href="<?php echo BASE_URL ?>logout" title="Déconnexion" class="btn btn-outline-danger"> <i class="fa-solid fa-arrow-right-from-bracket"></i> </a>
            </form>
        </div>
    </div>
</nav>
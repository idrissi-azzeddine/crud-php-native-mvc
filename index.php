<?php

    require_once 'src/vue/includes/header.php';
    require_once './load_auto.php';
    require_once 'src/controller/HomeController.php';

    $H = new HomeController();
    $pages = ['home', 'add', 'update', 'drop', 'login', 'stagiaire', 'logout', 'ajax', 'classes', 'classesEdit', 'classesDrop', 'classesAdd', 'subjects', 'subjectsEdit', 'subjectsDrop', 'subjectsAdd', 'results', 'resultsEdit', 'resultsDrop', 'resultsAdd', 'ResCrud', 'students', 'studentsEdit', 'studentsAdd', 'studentsDrop', 'barsr'];
    if (isset($_SESSION['logged']) && $_SESSION['logged'] === true ) {
        if (isset($_GET['page'])) {
            if ($_GET['page'] === 'viewResults') {
                require_once 'src/vue/includes/barsr.php';
                $H->index('viewResults');
            }
            if ($_GET['page'] === 'studentsresults') {
                require_once 'src/vue/includes/barsr.php';
                $H->index('studentsresults');
            } elseif (in_array($_GET['page'], $pages)) {
                $page = $_GET['page'];
                $H->index($page); 
                require_once 'src/vue/includes/topbar.php';
            } elseif ($_GET['page'] !== 'viewResults') {
                include('src/vue/includes/404.php');
            }
        } else {
            $H->index('home');
        } 
    }elseif (isset($_GET['page']) && $_GET['page'] === 'stagiaire') {
        $H->index('stagiaire');
    } else {
        $H->index('login');
    }

?>

<?php require_once 'src/vue/includes/footer.php'; ?>

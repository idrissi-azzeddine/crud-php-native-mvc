<?php

    class HomeController {

        public function index($page) {
            include("src/vue/$page.php");
        }
    }

?>
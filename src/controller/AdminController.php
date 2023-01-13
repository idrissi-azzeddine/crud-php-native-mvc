<?php

    class AdminController {

        public function stagiaire() {
            if (isset($_POST['submit'])) {
                $data = array(
                    'student_code' => $_POST['student_code']
                );

                $result = Admin::getStagiaire($data);
                if ($result->student_code === $_POST['student_code']) {
                    $_SESSION['logged'] = true;
                    $_SESSION['student_code'] = $result->student_code;
                    Redirect::to('studentsresults');
                } else {
                    echo $result;
                }
            }
        }

        public function login() {
            if (isset($_POST['submit'])) {
                $data = array(
                    'pseudo' => $_POST['pseudo']
                );

                $result = Admin::getAdmin($data);
                if ($result->pseudo === $_POST['pseudo']) {
                    $_SESSION['logged'] = true;
                    $_SESSION['pseudo'] = $result->pseudo;
                    Redirect::to('home');
                } else {
                    Redirect::to('login');
                }
            }
        }

        static public function logout() {
            session_destroy();
        }
    }

?>
<?php
    
    class ResultController {

        // public function getAllResult() {
        //     $result = Result::getAll();
        //     return $result;
        // }

        // public function getOneResult() {
        //     if (isset($_POST['id'])) {
        //         $data = array(
        //             'id' => $_POST['id']
        //         );
        //         $result = Result::getResult($data);
        //         return $result;
        //     }
        // }

        // public function addResult() {
        //     if (isset($_POST['submit'])) {
        //         $data = array(
        //             'student_code' => $_POST['student_code'],
        //             'subject_id' => $_POST['subject_id'],
        //             'mark' => $_POST['mark'],
        //             'depart' => $_POST['depart'],
        //             'poste' => $_POST['poste'],
        //             'date_emp' => $_POST['date_emp'],
        //             'statut' => $_POST['statut']
        //         );

        //         $result = Result::add($data);
        //         if ($result === 'ok') {
        //             Redirect::to('home');
        //         } else {
        //             echo $result;
        //         }
        //     }
        // }

        // public function updateResult() {
        //     if (isset($_POST['submit'])) {
        //         $data = array(
        //             'id' => $_POST['id'],
        //             'nom' => $_POST['nom'],
        //             'prenom' => $_POST['prenom'],
        //             'matricule' => $_POST['matricule'],
        //             'depart' => $_POST['depart'],
        //             'poste' => $_POST['poste'],
        //             'date_emp' => $_POST['date_emp'],
        //             'statut' => $_POST['statut']
        //         );

        //         $result = Result::update($data);
        //         if ($result === 'ok') {
        //             Redirect::to('home');
        //         } else {
        //             echo $result;
        //         }
        //     }
        // }

        public function dropResult() {
            if(isset($_POST['id'])) {
                $data = array(
                    'id' => $_POST['id']
                );
                
                $result = Result::drop($data);
                if ($result === 'ok') {
                    Redirect::to('results');
                } else {
                    echo $result;
                }
            }
        }

        public function findResult() {
            if (isset($_POST['search'])) {
                $data = array(
                    'search' => $_POST['search']
                );

                $result = Result::find($data);
                return $result;
            }
        }


    }


?>

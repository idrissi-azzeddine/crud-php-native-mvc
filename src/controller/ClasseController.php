<?php
    
    class ClasseController {

        public function getAllClasse() {
            $employes = Classe::getAll();
            return $employes;
        }

        public function getOneClasse() {
            if (isset($_POST['id'])) {
                $data = array(
                    'id' => $_POST['id']
                );
                $employes = Classe::getClasse($data);
                return $employes;
            }
        }

        public function addClasse() {
            if (isset($_POST['submit'])) {
                $data = array(
                    'level' => $_POST['level'],
                    'section' => $_POST['section']
                );

                $result = Classe::add($data);
                if ($result === 'ok') {
                    Redirect::to('classes');
                } else {
                    echo $result;
                }
            }
        }

        public function updateClasse() {
            if (isset($_POST['submit'])) {
                $data = array(
                    'id' => $_POST['id'],
                    'level' => $_POST['level'],
                    'section' => $_POST['section']
                );

                $result = Classe::update($data);
                if ($result === 'ok') {
                    Redirect::to('classes');
                } else {
                    echo $result;
                }
            }
        }

        public function dropClasse() {
            if(isset($_POST['id'])) {
                $data = array(
                    'id' => $_POST['id']
                );
                
                $result = Classe::drop($data);
                if ($result === 'ok') {
                    Redirect::to('classes');
                } else {
                    echo $result;
                }
            }
        }

        public function findClasse() {
            if (isset($_POST['search'])) {
                $data = array(
                    'search' => $_POST['search']
                );

                $result = Classe::find($data);
                return $result;
            }
        }


    }


?>

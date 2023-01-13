<?php
    
    class SubjectController {

        public function getAllSubject() {
            $subjects = Subject::getAll();
            return $subjects;
        }

        public function getOneSubject() {
            if (isset($_POST['id'])) {
                $data = array(
                    'id' => $_POST['id']
                );
                $subjects = Subject::getSubject($data);
                return $subjects;
            }
        }

        public function addSubject() {
            if (isset($_POST['submit'])) {
                $data = array(
                    'subject_code' => $_POST['subject_code'],
                    'subject' => $_POST['subject'],
                    'description' => $_POST['description']
                );

                $result = Subject::add($data);
                if ($result === 'ok') {
                    Redirect::to('subjects');
                } else {
                    echo $result;
                }
            }
        }

        public function updateSubject() {
            if (isset($_POST['submit'])) {
                $data = array(
                    'id' => $_POST['id'],
                    'subject_code' => $_POST['subject_code'],
                    'subject' => $_POST['subject'],
                    'description' => $_POST['description']
                );

                $result = Subject::update($data);
                if ($result === 'ok') {
                    Redirect::to('subjects');
                } else {
                    echo $result;
                }
            }
        }

        public function dropSubject() {
            if(isset($_POST['id'])) {
                $data = array(
                    'id' => $_POST['id']
                );
                
                $result = Subject::drop($data);
                if ($result === 'ok') {
                    Redirect::to('subjects');
                } else {
                    echo $result;
                }
            }
        }

        public function findSubject() {
            if (isset($_POST['search'])) {
                $data = array(
                    'search' => $_POST['search']
                );

                $result = Subject::find($data);
                return $result;
            }
        }

    }

?>

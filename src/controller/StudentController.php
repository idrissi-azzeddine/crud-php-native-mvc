<?php
    
    class StudentController {

        public function getAllStudent() {
            $students = Student::getAll();
            return $students;
        }

        public function getOneStudent() {
            if (isset($_POST['id'])) {
                $data = array(
                    'id' => $_POST['id']
                );
                $students = Student::getStudent($data);
                return $students;
            }
        }

        public function addStudent() {
            if (isset($_POST['submit'])) {
                $data = array(
                    'student_code' => $_POST['student_code'],
                    'firstname' => $_POST['firstname'],
                    'middlename' => $_POST['middlename'],
                    'lastname' => $_POST['lastname'],
                    'gender' => $_POST['gender'],
                    'address' => $_POST['address'],
                    'class_id' => $_POST['class_id']
                );

                $result = Student::add($data);
                if ($result === 'ok') {
                    Redirect::to('students');
                } else {
                    echo $result;
                }
            }
        }

        public function updateStudent() {
            if (isset($_POST['submit'])) {
                $data = array(
                    'id' => $_POST['id'],
                    'student_code' => $_POST['student_code'],
                    'firstname' => $_POST['firstname'],
                    'middlename' => $_POST['middlename'],
                    'lastname' => $_POST['lastname'],
                    'gender' => $_POST['gender'],
                    'address' => $_POST['address'],
                    'class_id' => $_POST['class_id']
                );

                $result = Student::update($data);
                if ($result === 'ok') {
                    Redirect::to('students');
                } else {
                    echo $result;
                }
            }
        }

        public function dropStudent() {
            if(isset($_POST['id'])) {
                $data = array(
                    'id' => $_POST['id']
                );
                
                $result = Student::drop($data);
                if ($result === 'ok') {
                    Redirect::to('students');
                } else {
                    echo $result;
                }
            }
        }

        public function findStudent() {
            if (isset($_POST['search'])) {
                $data = array(
                    'search' => $_POST['search']
                );

                $result = Student::find($data);
                return $result;
            }
        }
    }

?>

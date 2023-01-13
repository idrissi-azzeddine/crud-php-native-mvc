<?php

    class Student {

        static public function getAll() {
            $stmt = DB::connect()->prepare("SELECT s.*,concat(c.level,'-',c.section) as class,concat(firstname,' ',middlename,' ',lastname) as name FROM students s inner join classes c on c.id = s.class_id order by id asc");
            $stmt->execute();
            return $stmt->fetchAll();
        }

        static public function getStudent($data) {
            $id = $data['id'];
            try {
                $query = 'SELECT * FROM students WHERE id = :id';
                $stmt = DB::connect()->prepare($query);
                $stmt->execute([':id' => $id]);
                $emp = $stmt->fetch(PDO::FETCH_OBJ);
                return $emp;
            } catch (PDOException $ex) {
                echo 'erreur' . $ex->getMessage();
            }
        }

        static public function add($data) {
            $stmt = DB::connect()->prepare('INSERT INTO students (student_code, firstname, middlename, lastname, gender, address, class_id) VALUES (:student_code, :firstname, :middlename, :lastname, :gender, :address, :class_id)');
            $stmt->bindParam(':student_code', $data['student_code']);
            $stmt->bindParam(':firstname', $data['firstname']);
            $stmt->bindParam(':middlename', $data['middlename']);
            $stmt->bindParam(':lastname', $data['lastname']);
            $stmt->bindParam(':gender', $data['gender']);
            $stmt->bindParam(':address', $data['address']);
            $stmt->bindParam(':class_id', $data['class_id']);
            if ($stmt->execute()) {
                return 'ok';
            } else {
                return 'error';
            }
        }

        static public function update($data) {
            $stmt = DB::connect()->prepare('UPDATE students SET student_code = :student_code, firstname = :firstname, middlename = :middlename, lastname = :lastname, gender = :gender, address = :address, class_id = :class_id WHERE id = :id');
            $stmt->bindParam(':id', $data['id']);
            $stmt->bindParam(':student_code', $data['student_code']);
            $stmt->bindParam(':firstname', $data['firstname']);
            $stmt->bindParam(':middlename', $data['middlename']);
            $stmt->bindParam(':lastname', $data['lastname']);
            $stmt->bindParam(':gender', $data['gender']);
            $stmt->bindParam(':address', $data['address']);
            $stmt->bindParam(':class_id', $data['class_id']);
            if ($stmt->execute()) {
                return 'ok';
            } else {
                return 'error';
            }
        }

        static public function drop($data) {
            $id = $data['id'];
            try {
                $query = 'DELETE FROM students WHERE id = :id';
                $stmt = DB::connect()->prepare($query);
                $stmt->execute([':id' => $id]);
                if ($stmt->execute()) {
                    return 'ok';
                }
            } catch (PDOException $ex) {
                echo 'erreur' . $ex->getMessage();
            }
        }

        static public function find($data) {
            $search = $data['search'];
            try {
                $query = "SELECT s.*,concat(c.level,'-',c.section) as class,concat(firstname,' ',middlename,' ',lastname) as name FROM students s inner join classes c on c.id = s.class_id AND s.firstname LIKE ?";
                $stmt = DB::connect()->prepare($query);
                $stmt->execute(['%'. $search .'%']);
                $emp = $stmt->fetchAll();
                return $emp;
            } catch (PDOException $ex) {
                echo 'erreur' . $ex->getMessage();
            }
        }
    }
?>
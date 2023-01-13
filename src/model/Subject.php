<?php

    class Subject {

        static public function getAll() {
            $stmt = DB::connect()->prepare('SELECT * FROM subjects');
            $stmt->execute();
            return $stmt->fetchAll();
        }

        static public function getSubject($data) {
            $id = $data['id'];
            try {
                $query = 'SELECT * FROM subjects WHERE id = :id';
                $stmt = DB::connect()->prepare($query);
                $stmt->execute([':id' => $id]);
                $emp = $stmt->fetch(PDO::FETCH_OBJ);
                return $emp;
            } catch (PDOException $ex) {
                echo 'erreur' . $ex->getMessage();
            }
        }

        static public function add($data) {
            $stmt = DB::connect()->prepare('INSERT INTO subjects (subject_code, subject, description) VALUES (:subject_code, :subject, :description)');
            $stmt->bindParam(':subject_code', $data['subject_code']);
            $stmt->bindParam(':subject', $data['subject']);
            $stmt->bindParam(':description', $data['description']);
            if ($stmt->execute()) {
                return 'ok';
            } else {
                return 'error';
            }
        }

        static public function update($data) {
            $stmt = DB::connect()->prepare('UPDATE subjects SET subject_code = :subject_code, subject = :subject, description = :description WHERE id = :id');
            $stmt->bindParam(':id', $data['id']);
            $stmt->bindParam(':subject_code', $data['subject_code']);
            $stmt->bindParam(':subject', $data['subject']);
            $stmt->bindParam(':description', $data['description']);
            if ($stmt->execute()) {
                return 'ok';
            } else {
                return 'error';
            }
        }

        static public function drop($data) {
            $id = $data['id'];
            try {
                $query = 'DELETE FROM subjects WHERE id = :id';
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
                $query = 'SELECT * FROM subjects WHERE subject LIKE ? OR description LIKE ?';
                $stmt = DB::connect()->prepare($query);
                $stmt->execute(['%'. $search .'%', '%'. $search .'%']);
                $emp = $stmt->fetchAll();
                return $emp;
            } catch (PDOException $ex) {
                echo 'erreur' . $ex->getMessage();
            }
        }
    }
?>
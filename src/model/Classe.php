<?php

    class Classe {

        static public function getAll() {
            $stmt = DB::connect()->prepare('SELECT * FROM classes');
            $stmt->execute();
            return $stmt->fetchAll();
        }

        static public function getClasse($data) {
            $id = $data['id'];
            try {
                $query = 'SELECT * FROM classes WHERE id = :id';
                $stmt = DB::connect()->prepare($query);
                $stmt->execute([':id' => $id]);
                $emp = $stmt->fetch(PDO::FETCH_OBJ);
                return $emp;
            } catch (PDOException $ex) {
                echo 'erreur' . $ex->getMessage();
            }
        }

        static public function add($data) {
            $stmt = DB::connect()->prepare('INSERT INTO classes (level, section) VALUES (:level, :section)');
            $stmt->bindParam(':level', $data['level']);
            $stmt->bindParam(':section', $data['section']);
            if ($stmt->execute()) {
                return 'ok';
            } else {
                return 'error';
            }
        }

        static public function update($data) {
            $stmt = DB::connect()->prepare('UPDATE classes SET level = :level, section = :section WHERE id = :id');
            $stmt->bindParam(':id', $data['id']);
            $stmt->bindParam(':level', $data['level']);
            $stmt->bindParam(':section', $data['section']);
            if ($stmt->execute()) {
                return 'ok';
            } else {
                return 'error';
            }
        }

        static public function drop($data) {
            $id = $data['id'];
            try {
                $query = 'DELETE FROM classes WHERE id = :id';
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
                $query = 'SELECT * FROM classes WHERE level LIKE ? OR section LIKE ?';
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
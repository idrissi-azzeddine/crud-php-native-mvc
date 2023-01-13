<?php

    class Result {

        // static public function getAll() {
        //     $stmt = DB::connect()->prepare('SELECT * FROM classes');
        //     $stmt->execute();
        //     return $stmt->fetchAll();
        // }

        // static public function getEmploye($data) {
        //     $id = $data['id'];
        //     try {
        //         $query = 'SELECT * FROM students WHERE id = :id';
        //         $stmt = DB::connect()->prepare($query);
        //         $stmt->execute([':id' => $id]);
        //         $emp = $stmt->fetch(PDO::FETCH_OBJ);
        //         return $emp;
        //     } catch (PDOException $ex) {
        //         echo 'erreur' . $ex->getMessage();
        //     }
        // }

        // static public function add($data) {
        //     $stmt = DB::connect()->prepare('INSERT INTO classes (level, section) VALUES (:level, :section)');
        //     $stmt->bindParam(':level', $data['level']);
        //     $stmt->bindParam(':section', $data['section']);
        //     if ($stmt->execute()) {
        //         return 'ok';
        //     } else {
        //         return 'error';
        //     }
        // }

        // static public function update($data) {
        //     $stmt = DB::connect()->prepare('UPDATE classes SET level = :level, section = :section, matricule = :matricule, depart = :depart, poste = :poste, date_emp = :date_emp, statut = :statut WHERE id = :id');
        //     $stmt->bindParam(':id', $data['id']);
        //     $stmt->bindParam(':nom', $data['nom']);
        //     $stmt->bindParam(':prenom', $data['prenom']);
        //     $stmt->bindParam(':matricule', $data['matricule']);
        //     $stmt->bindParam(':depart', $data['depart']);
        //     $stmt->bindParam(':poste', $data['poste']);
        //     $stmt->bindParam(':date_emp', $data['date_emp']);
        //     $stmt->bindParam(':statut', $data['statut']);
        //     if ($stmt->execute()) {
        //         return 'ok';
        //     } else {
        //         return 'error';
        //     }
        // }

        static public function drop($data) {
            $id = $data['id'];
            try {
                $query = 'DELETE FROM results where id = :id';
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
                $query = 'SELECT * FROM students WHERE firstname LIKE ? OR lastname LIKE ?';
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
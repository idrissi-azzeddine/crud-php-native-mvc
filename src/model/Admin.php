<?php

    class Admin {

        static public function getAdmin($data) {
            $pseudo = $data['pseudo'];
            // $password = $data['password'];
            try {
                $query = 'SELECT * FROM admin WHERE pseudo = :pseudo';
                $stmt = DB::connect()->prepare($query);
                $stmt->execute([':pseudo' => $pseudo]);
                $emp = $stmt->fetch(PDO::FETCH_OBJ);
                return $emp;
                if ($stmt->execute()) {
                    return 'ok';
                }
            } catch (PDOException $ex) {
                echo 'erreur' . $ex->getMessage();
            }
        }

        static public function getStagiaire($data) {
            $student_code = $data['student_code'];
            try {
                $query = 'SELECT * FROM students WHERE student_code = :student_code';
                $stmt = DB::connect()->prepare($query);
                $stmt->execute([':student_code' => $student_code]);
                $emp = $stmt->fetch(PDO::FETCH_OBJ);
                return $emp;
                if ($stmt->execute()) {
                    return 'ok';
                }
            } catch (PDOException $ex) {
                echo 'erreur' . $ex->getMessage();
            }
        }        

        // static public function add($data) {
        //     $stmt = DB::connect()->prepare('INSERT INTO admin (pseudo, email, password) VALUES (:pseudo, :email, :password)');
        //     $stmt->bindParam(':pseudo', $data['pseudo']);
        //     $stmt->bindParam(':email', $data['email']);
        //     $stmt->bindParam(':password', $data['password']);
        //     if ($stmt->execute()) {
        //         return 'ok';
        //     } else {
        //         return 'error';
        //     }
        // }
    }
?>
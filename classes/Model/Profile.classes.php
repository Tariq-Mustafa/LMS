<?php

class ProfileModel extends Db {

    protected function getProfileInfo($userId) {
        $stmt = $this->connect()->prepare('SELECT * From user WHERE UserID = ?;');
        
        if(!$stmt->execute(array($userId))) {
            $stmt = null;
            header("location: ../profile.php?error=stmtfailed");
            exit();
        }

        if($stmt->rowCount()== 0){
            $stmt = null;
            header("location: ../profile.php?error=profilenotfound");
            exit();
        }
         
        $profileData = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $profileData;
    }

    protected function getUserId($userId) {
        $stmt = $this->connect()->prepare('SELECT StudentID FROM Student WHERE UserID = ?;');

        if(!$stmt->execute(array($userId))) {
            $stmt = null;
            header("location: ../profile.php?error=stmtfailed");
            exit();
        }

        if($stmt->rowCount()== 0){
            $stmt = null;
            header("location: ../profile.php?error=profilenotfound");
            exit();
        }

        $StudentID = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $StudentID;
    }

    protected function checkPassword($userId, $oldPassword) {
        $stmt = $this->connect()->prepare('SELECT Password FROM user WHERE UserID = ?;');

        if(!$stmt->execute(array($userId))) {
            $stmt = null;
            header("location: ../profile.php?error=stmtfailed");
            exit();
        }

        if($stmt->rowCount()== 0){
            $stmt = null;
            header("location: ../profile.php?error=profilenotfound");
            exit();
        }

        $passwordHashed = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $check = password_verify($oldPassword, $passwordHashed[0]["Password"]);
        
        return $check;
    }

    protected function updatePassword($userId, $password) {
        $stmt = $this->connect()->prepare('UPDATE user SET Password = ? WHERE UserID = ?;');
        
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

        if(!($stmt->execute(array($hashedPassword, $userId)))) {
            $stmt = null;
            header("location: ../profile.php?error=stmtfailed");
            exit();
        }

        $stmt = null;
    }
}
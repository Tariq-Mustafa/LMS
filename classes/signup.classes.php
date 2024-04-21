<?php

class Signup extends Db {

    protected function checkUser($uname, $email) {
        $stmt = $this->connect()->prepare('SELECT user_name FROM users WHERE user_name = ? OR user_email = ?;');
        
        if(!$stmt->execute(array($uname, $email))) 
        {
            $stmt = null;
            header("location: ../signup.php?error=stmtfailed");
            exit();
        }

        $resultCheck;
        if($stmt->rowCount() > 0) 
        {
            $resultCheck = false;
        }
        else 
        {
            $resultCheck = true;
        }
        return $resultCheck;
    }

    protected function setUser($uname, $email, $password) {
        $stmt = $this->connect()->prepare('INSERT INTO users (user_name, user_email, user_password) VALUES (?, ?, ?);');

        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

        if(!$stmt->execute(array($uname, $email, $hashedPassword))) 
        {
            $stmt = null;
            header("location: ../signup.php?error=stmtfailed");
            exit();
        }

        $stmt = null;
    }

    protected function getUserId($uname) {
        $stmt = $this->connect()->prepare('SELECT user_id FROM users WHERE user_name = ?;');

        if(!$stmt->execute(array($uname))) 
        {
            $stmt = null;
            header("location: profile.php?error=stmtfaild");
            exit();
        }

        if($stmt->rowCount() == 0) 
        {
            $stmt = null;
            header("location: profile.php?error=profilenotfound");
            exit();
        }

        $profileData = $stmt->fetchAll(PDO::FETCH_ASSOC);

        return $profileData;
    }

}
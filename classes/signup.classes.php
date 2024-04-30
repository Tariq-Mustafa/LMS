<?php

class Signup extends Db {

    protected function checkUser($uname, $email) {
        $stmt = $this->connect()->prepare('SELECT UserName FROM user WHERE UserName = ? OR Email = ?;');
        
        if(!$stmt->execute(array($uname, $email))) 
        {
            $stmt = null;
            header("location: ../index.php?error=stmtfailed");
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

    protected function setUser($uname, $email, $password, $Role) {
        $stmt = $this->connect()->prepare('INSERT INTO user (UserName, Email, Password, Role) VALUES (?, ?, ?, ?);');

        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

        if(!$stmt->execute(array($uname, $email, $hashedPassword, $Role))) 
        {
            $stmt = null;
            header("location: ../index.php?error=stmtfailed");
            exit();
        }

        $stmt = null;
    }

    protected function getUserId($uname) {
        $stmt = $this->connect()->prepare('SELECT UserID FROM user WHERE UserName = ?;');

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
<?php

class Signup extends Db {

    protected function checkUser($uname, $email) {
        $stmt = $this->connect()->prepare('SELECT UserName FROM user WHERE UserName = ? AND Email = ?;');
        
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

    protected function getUserId($uname) {
        $stmt = $this->connect()->prepare('SELECT UserID FROM user WHERE UserName = ?;');

        if(!$stmt->execute(array($uname))) 
        {
            $stmt = null;
            header("location: index.php?error=stmtfaild");
            exit();
        }

        if($stmt->rowCount() == 0) 
        {
            $stmt = null;
            header("location: index.php?error=idnotfound");
            exit();
        }

        $Uid = $stmt->fetchAll(PDO::FETCH_ASSOC);

        return $Uid;
    }

    protected function setUser($uname, $email, $password, $Role, $Gender) {
        $stmt = $this->connect()->prepare('INSERT INTO user (UserName, Email, Password, Role, Gender) VALUES (?, ?, ?, ?, ?);');

        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

        if(!$stmt->execute(array($uname, $email, $hashedPassword, $Role, $Gender))) 
        {
            $stmt = null;
            header("location: ../index.php?error=stmtfailed");
            exit();
        }

        if($Role == "Admin")
        {
            $AdminID = $this->getUserId($uname);
            $stmt = $this->connect()->prepare('INSERT INTO admin (UserID) VALUES (?);');
            if(!$stmt->execute(array($AdminID[0]['UserID'])))
            {
                $stmt = null;
                header("location: ../index.php?error=faildtogetid");
                exit();
            }
        }

        $stmt = null;
    }

}
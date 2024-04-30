<?php

class Login extends Db {

    protected function getUser($uname, $password) {
        $stmt = $this->connect()->prepare('SELECT Password FROM user WHERE UserName = ? OR Email = ?;');

        if(!$stmt->execute(array($uname, $password))) 
        {
            $stmt = null;
            header("location: ../index.php?error=stmtfailed");
            exit();
        }

        if($stmt->rowCount() == 0) 
        {
            $stmt = null;
            header("location: ../index.php?error=usernotfound");
            exit();
        }

        $passwordHashed = $stmt->fetchAll(PDO::FETCH_ASSOC);

        if(password_verify($hashedPassword, $passwordHashed[0]["Password"])) 
        {
            $stmt = null;
            header("location: ../index.php?error=wrongpassword");
            exit();
        }
        elseif($checkPassword == true) 
        {
            $stmt = $this->connect()->prepare('SELECT * FROM user WHERE UserName = ? OR Email = ? AND Password = ?;');

            if(!$stmt->execute(array($uname, $uname, $password))) 
            {
                $stmt = null;
                header("location: ../index.php?error=stmtfaild");
                exit();
            }

            if($stmt->rowCount() == 0) 
            {
                $stmt = null;
                header("location: ../index.php?error=usernotfound");
                exit();
            }

            $user = $stmt->fetchAll(PDO::FETCH_ASSOC);

            session_start();
            $_SESSION["userid"] = $user[0]["UserID"];
            $_SESSION["useruid"] = $user[0]["UserName"];

            $stmt = null;
        }

        $stmt = null;
    }

}
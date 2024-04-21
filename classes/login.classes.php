<?php

class Login extends Db {

    protected function getUser($uname, $password) {
        $stmt = $this->connect()->prepare('SELECT user_password FROM users WHERE user_name = ? OR user_email = ?;');

        if(!$stmt->execute(array($uname, $password))) 
        {
            $stmt = null;
            header("location: ../signin.php?error=stmtfailed");
            exit();
        }

        if($stmt->rowCount() == 0) 
        {
            $stmt = null;
            header("location: ../signin.php?error=usernotfound");
            exit();
        }

        $passwordHashed = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $checkPassword = password_verify($password, $passwordHashed[0]["user_password"]);

        if($checkPassword == false) 
        {
            $stmt = null;
            header("location: ../signin.php?error=wrongpassword");
            exit();
        }
        elseif($checkPassword == true) 
        {
            $stmt = $this->connect()->prepare('SELECT * FROM users WHERE user_name = ? OR user_email = ? AND user_password = ?;');

            if(!$stmt->execute(array($uname, $uname, $password))) 
            {
                $stmt = null;
                header("location: ../signin.php?error=stmtfaild");
                exit();
            }

            if($stmt->rowCount() == 0) 
            {
                $stmt = null;
                header("location: ../signin.php?error=usernotfound");
                exit();
            }

            $user = $stmt->fetchAll(PDO::FETCH_ASSOC);

            session_start();
            $_SESSION["userid"] = $user[0]["user_id"];
            $_SESSION["useruid"] = $user[0]["user_name"];

            $stmt = null;
        }

        $stmt = null;
    }

}
<?php

class Login extends Db {

    protected function getUser($uname, $password) {
        $stmt = $this->connect()->prepare('SELECT Password FROM user WHERE UserName = ?;');

        if(!$stmt->execute(array($uname))) 
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
        $check = password_verify($password, $passwordHashed[0]["Password"]);
        if($check == false) 
        {
            $stmt = null;
            header("location: ../index.php?error=wrongpassword");
            exit();
        }
        else
        {
            $stmt = $this->connect()->prepare('SELECT * FROM user WHERE UserName = ? AND Password = ?;');

            if(!$stmt->execute(array($uname, $passwordHashed[0]["Password"]))) 
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
            $Role = $user[0]["Role"];
            
            if($Role == "Admin")
            {
                // get AdminID
                $stmt = $this->connect()->prepare('SELECT AdminID FROM admin WHERE UserID = ?;');
                if(!$stmt->execute(array($user[0]["UserID"]))) 
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

                $Aid = $stmt->fetchAll(PDO::FETCH_ASSOC);
                session_start();
                $_SESSION["AdminID"] = $Aid[0]["AdminID"];

                // Going to Admin Dashboard
                header("location: ../dashboard.php");                
            }

            if($Role == "Student")
            {

            }

            if($Role == "Teacher")
            {

            }

            $stmt = null;
        }

        $stmt = null;
    }

}
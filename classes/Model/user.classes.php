<?php

class User extends Db {

    protected function setTeacher($userId, $adminID, $Department) {
        $stmt = $this->connect()->prepare('INSERT INTO Faculty_Member (UserID, AdminID, Department) VALUES (?, ?, ?);');

        if(!$stmt->execute(array($userId, $adminID, $Department))) 
        {
            $stmt = null;
            header("location: ../../manageUser.php?error=stmtfailed");
            exit();
        }

        $stmt = null;
    }

    protected function setStudent($userId, $adminID) {
        $stmt = $this->connect()->prepare('INSERT INTO Student (UserID, AdminID) VALUES (?, ?);');

        if(!$stmt->execute(array($userId, $adminID))) 
        {
            $stmt = null;
            header("location: ../../manageUser.php?error=stmtfailed");
            exit();
        }

        $stmt = null;
    }

    protected function getStudentsNum($AdminID) {
        $stmt = $this->connect()->prepare('SELECT COUNT(*) FROM Student WHERE AdminID = ?;');

        if(!$stmt->execute(array($AdminID))) 
        {
            $stmt = null;
            header("header: manageUser.php?error=stmtfaild");
            exit();
        }

        if($stmt->rowCount() == 0) 
        {
            $stmt = null;
            header("header: manageUser.php?error=profilenotfound");
            exit(); 
        }

        $row_count = $stmt->fetchColumn();

        return $row_count;
    }

    protected function getTeachersNum($AdminID) {
        $stmt = $this->connect()->prepare('SELECT COUNT(*) FROM Faculty_Member WHERE AdminID = ?;');

        if(!$stmt->execute(array($AdminID))) 
        {
            $stmt = null;
            header("header: manageUser.php?error=stmtfaild");
            exit();
        }

        if($stmt->rowCount() == 0) 
        {
            $stmt = null;
            header("header: manageUser.php?error=profilenotfound");
            exit(); 
        }

        $row_count = $stmt->fetchColumn();

        return $row_count;
    }

    // protected function setNewProfileInfo($profileAbout, $profileTitle, $profileText, $userId) {
    //     $stmt = $this->connect()->prepare('UPDATE profiles SET profile_about = ?, profile_title = ?, profile_text = ? WHERE user_id = ?;');

    //     if(!$stmt->execute(array($profileAbout, $profileTitle, $profileText, $userId))) 
    //     {
    //         $stmt = null;
    //         header("header: profile.php?error=stmtfaild");
    //         exit(); 
    //     }

    //     $stmt = null;
    // }
}
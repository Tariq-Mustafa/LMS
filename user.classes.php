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
            header("location: ../../manageUser.php?error=stmtfaild");
            exit();
        }

        if($stmt->rowCount() == 0) 
        {
            $stmt = null;
            header("location: ../../manageUser.php?error=profilenotfound");
            exit(); 
        }

        $rowCount = $stmt->fetchColumn();

        return $rowCount;
    }

    protected function getTeachersNum($AdminID) {
        $stmt = $this->connect()->prepare('SELECT COUNT(*) FROM Faculty_Member WHERE AdminID = ?;');

        if(!$stmt->execute(array($AdminID))) 
        {
            $stmt = null;
            header("location: ../../manageUser.php?error=stmtfaild");
            exit();
        }

        if($stmt->rowCount() == 0) 
        {
            $stmt = null;
            header("location: ../../manageUser.php?error=profilenotfound");
            exit(); 
        }

        $rowCount = $stmt->fetchColumn();

        return $rowCount;
    }

    protected function getStudentInfo($AdminID) {
        $stmt = $this->connect()->prepare('SELECT * FROM Student join user ON Student.UserID = user.UserID WHERE AdminID = ?;');

        if(!$stmt->execute(array($AdminID))) 
        {
            $stmt = null;
            header("location: ../../manageUser.php?error=stmtfaild");
            exit();
        }

        $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);

        return $rows;
    }

    protected function getTeacherInfo($AdminID) {
        $stmt = $this->connect()->prepare('SELECT * FROM Faculty_Member join user ON Faculty_Member.UserID = user.UserID WHERE AdminID = ?;');

        if(!$stmt->execute(array($AdminID))) 
        {
            $stmt = null;
            header("location: ../../manageUser.php?error=stmtfaild");
            exit();
        }

        $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);

        return $rows;
    }

    protected function deleteStudent($UserID) {
        try {
            $stmt = $this->connect()->prepare('DELETE FROM Student WHERE UserID = ?;');
            $stmt->execute(array($UserID));
            
            $stmt = $this->connect()->prepare('DELETE FROM user WHERE UserID = ?;');
            $stmt->execute(array($UserID));

        } catch (PDOException $e) {
            header("Location: ../../manageUser.php?error=stmtfailed");
            exit();
        }

    }

    protected function deleteTeacher($UserID) {
        try {
            $stmt = $this->connect()->prepare('DELETE FROM Faculty_Member WHERE UserID = ?;');
            $stmt->execute(array($UserID));
            
            $stmt = $this->connect()->prepare('DELETE FROM user WHERE UserID = ?;');
            $stmt->execute(array($UserID));

        } catch (PDOException $e) {
            header("Location: ../../manageUser.php?error=stmtfailed");
            exit();
        }

    }
}
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

    protected function search($search_query, $search_category) {
        // Initialize variables for displaying search results
        $search_results = array();
        // Perform the search based on the selected category
        if (!empty($search_query) && !empty($search_category)) {
            try {
                switch ($search_category) {
                    case 'userName':
                        $stmt = $this->connect()->prepare('SELECT * FROM user WHERE UserName LIKE ?;');
                        break;
                    case 'userID':
                        $stmt = $this->connect()->prepare('SELECT * FROM user WHERE UserID LIKE ?;');
                        break;
                    default:
                        // Handle unknown search categories
                        break;
                }
        
                $stmt->execute(["%$search_query%"]);
                $search_results = $stmt->fetchAll(PDO::FETCH_ASSOC);
        
                // Process the results as needed (e.g., display them, perform additional actions)
            } catch (PDOException $e) {
                // Handle database query errors (e.g., log the error, display a user-friendly message)
                echo "An error occurred: " . $e->getMessage();
            }
        }
        

        return $search_results;
    }
}
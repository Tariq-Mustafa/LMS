<?php
class Student {
    private $StudentID, $UserID, $AdminID;

    public function getStudentID() { return $this->StudentID; }
    public function setStudentID($StudentID) { $this->StudentID = $StudentID; }

    public function getUserID() { return $this->UserID; }
    public function setUserID($UserID) { $this->UserID = $UserID; }

    public function getAdminID() { return $this->AdminID; }
    public function setAdminID($AdminID) { $this->AdminID = $AdminID; }

}
?>

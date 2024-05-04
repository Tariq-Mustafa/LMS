<?php

class UserContr extends User {

    private $userId;
    private $adminID;
    private $Department;
    private $Role;

    public function __construct($userId, $adminID, $Department, $Role) {
        $this->userId = $userId;
        $this->adminID = $adminID;
        $this->Department = $Department;
        $this->Role = $Role;
    }

    private function emptyInput() {
        $result;
        if(empty($this->userId) || empty($this->adminID) || (empty($this->Department) && $this->Role == "Teacher")) 
        {
            $result = false;
        }
        else 
        {
            $result = true;
        }
        return $result;
    }

    public function addUser() {
        if($this->emptyInput() == false) 
        {
            // echo "Empty input!";
            header("location: ../manageUser.php?error=emptyinput");
            exit();
        }
        if($this->Role == "Teacher")
            $this->setTeacher($this->userId, $this->adminID, $this->Department);
        else
            $this->setStudent($this->userId, $this->adminID);
    }

    public function fetchAdminId($userId) {
        $userId = $this->getUserId($userId);
        return $userId[0]["AdminID"];
    }
    
}
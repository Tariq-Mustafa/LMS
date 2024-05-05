<?php

class ProfileController extends ProfileModel {
    
    private $userId;
    private $oldPassword;
    private $password;

    public function __construct($userId, $oldPassword, $password){
        $this->userId = $userId;
        $this->oldPassword = $oldPassword;
        $this->password = $password;
    }

    private function emptyInput() {
        $result;
        if(empty($this->userId) || empty($this->oldPassword) || empty($this->password)) 
        {
            $result = false;
        }
        else 
        {
            $result = true;
        }
        return $result;
    }

    private function passwordMatch() {
        $result;
        if(!$this->checkPassword($this->userId, $this->oldPassword)) 
        {
            $result = false;
        }
        else 
        {
            $result = true;
        }
        return $result;
    }

    public function update() {
        if($this->emptyInput() == false) 
        {
            // echo "Empty input!";
            header("location: ../profile.php?error=emptyinput");
            exit();
        }
        if($this->passwordMatch() == false) 
        {
            // echo "Old password is wrong!";
            header("location: ../profile.php?error=wrongOldPassword");
            exit();
        }

        $this->updatePassword($this->userId, $this->password);
    }
}
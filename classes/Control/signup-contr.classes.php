<?php

class SignupContr extends Signup {

    private $uname;
    private $email;
    private $password;
    private $cpassword;
    private $Role;
    private $Gender;

    public function __construct($uname, $email, $password, $cpassword, $Role, $Gender) {
        $this->uname = trim($uname);
        $this->email = $email;
        $this->password = $password;
        $this->cpassword = $cpassword;
        $this->Role = $Role;
        $this->Gender = $Gender;
    }

    private function emptyInput() {
        $result;
        if(empty($this->uname) || empty($this->email) || empty($this->password) || empty($this->cpassword) || empty($this->Role) || empty($this->Gender)) 
        {
            $result = false;
        }
        else 
        {
            $result = true;
        }
        return $result;
    }

    private function invalidUname() {
        $result;
        if(strlen($this->uname) < 3 || !preg_match("/^[a-zA-Z0-9\s]*$/", $this->uname)) 
        {
            $result = false;
        }
        else 
        {
            $result = true;
        }
        return $result;
    }

    private function invalidEmail() {
        $result;
        if(!filter_var($this->email, FILTER_VALIDATE_EMAIL)) 
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
        if($this->password !== $this->cpassword) 
        {
            $result = false;
        }
        else 
        {
            $result = true;
        }
        return $result;
    }

    private function unameAndEmailTaken() {
        $result;
        if(!$this->checkUser($this->uname, $this->email)) 
        {
            $result = false;
        }
        else 
        {
            $result = true;
        }
        return $result;
    }

    public function signupUser($targetPage) {
        $errorMessages = array(
            "emptyinput" => "Empty input!",
            "invalidUsername" => "Invalid Username!",
            "invalidEmail" => "Invalid Email!",
            "passwordMatch" => "Passwords do not match!",
            "unameOrEmailTaken" => "Username or Email is already taken!"
        );
        $errorCode = "none";
    
        if($this->emptyInput() == false) 
            $errorCode = "emptyinput";
        if($this->invalidUname() == false) 
            $errorCode = "invalidUsername";
        if($this->invalidEmail() == false) 
            $errorCode = "invalidEmail";
        if($this->passwordMatch() == false) 
            $errorCode = "passwordMatch";
        if($this->unameAndEmailTaken() == false) 
            $errorCode = "unameOrEmailTaken";
    
        if($errorCode == "none")
            $this->setUser($this->uname, $this->email, $this->password, $this->Role, $this->Gender);
        elseif(isset($errorMessages[$errorCode])) {
            $errorMessage = $errorMessages[$errorCode];
            header("location: ../$targetPage.php?error=$errorCode&message=$errorMessage");
            exit();
        }
    }

    public function fetchUserId($uname) {
        $userId = $this->getUserId($uname);
        return $userId[0]["UserID"];
    }
}
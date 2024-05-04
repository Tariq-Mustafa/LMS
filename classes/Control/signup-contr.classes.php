<?php

class SignupContr extends Signup {

    private $uname;
    private $email;
    private $password;
    private $cpassword;
    private $Role;
    private $Gender;

    public function __construct($uname, $email, $password, $cpassword, $Role, $Gender) {
        $this->uname = $uname;
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
        if(!preg_match("/^[a-zA-Z0-9]*$/", $this->uname)) 
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

    public function signupUser() {
        if($this->emptyInput() == false) 
        {
            // echo "Empty input!";
            header("location: ../index.php?error=emptyinput");
            exit();
        }
        if($this->invalidUname() == false) 
        {
            // echo "invalid Username!";
            header("location: ../index.php?error=invalidUsername");
            exit();
        }
        if($this->invalidEmail() == false) 
        {
            // echo "invalid Email!";
            header("location: ../index.php?error=invalidEmail");
            exit();
        }
        if($this->passwordMatch() == false) 
        {
            // echo "password is not Matched!";
            header("location: ../index.php?error=passwordMatch");
            exit();
        }
        if($this->unameAndEmailTaken() == false) 
        {
            // echo "uname Or Email is Taken!";
            header("location: ../index.php?error=unameOrEmailTaken");
            exit();
        }

        $this->setUser($this->uname, $this->email, $this->password, $this->Role, $this->Gender);
    }

    public function fetchUserId($uname) {
        $userId = $this->getUserId($uname);
        return $userId[0]["UserID"];
    }
}
<?php

class SignupContr extends Signup {

    private $uname;
    private $email;
    private $password;
    private $cpassword;

    public function __construct($uname, $email, $password, $cpassword) {
        $this->uname = $uname;
        $this->email = $email;
        $this->password = $password;
        $this->cpassword = $cpassword;
    }

    private function emptyInput() {
        $result;
        if(empty($this->uname) || empty($this->email) || empty($this->password) || empty($this->cpassword)) 
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

    private function unameOrEmailTaken() {
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
            header("location: ../signup.php?error=emptyinput");
            exit();
        }
        if($this->invalidUname() == false) 
        {
            // echo "invalid Username!";
            header("location: ../signup.php?error=invalidUsername");
            exit();
        }
        if($this->invalidEmail() == false) 
        {
            // echo "invalid Email!";
            header("location: ../signup.php?error=invalidEmail");
            exit();
        }
        if($this->passwordMatch() == false) 
        {
            // echo "password is not Matched!";
            header("location: ../signup.php?error=passwordMatch");
            exit();
        }
        if($this->unameOrEmailTaken() == false) 
        {
            // echo "uname Or Email is Taken!";
            header("location: ../signup.php?error=unameOrEmailTaken");
            exit();
        }

        $this->setUser($this->uname, $this->email, $this->password);
    }

    public function fetchUserId($uname) {
        $userId = $this->getUserId($uname);
        return $userId[0]["user_id"];
    }
}
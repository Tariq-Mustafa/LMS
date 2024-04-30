<?php

class LoginContr extends Login {

    private $uname;
    private $password;

    public function __construct($uname, $password) {
        $this->uname = $uname;
        $this->password = $password;
    }

    private function emptyInput() {
        $result;
        if(empty($this->uname) || empty($this->password)) 
        {
            $result = false;
        }
        else 
        {
            $result = true;
        }
        return $result;
    }

    public function loginUser() {
        if($this->emptyInput() == false) 
        {
            // echo "Empty input!";
            header("location: ../index.php?error=emptyinput");
            exit();
        }

        $this->getUser($this->uname, $this->password);
    }
}
<?php
class ProfileController extends ProfileModel {
    
    private $userId;
    private $username;
    private $email;
    private $password;

    private $gender;

    private $role;

    public function __construct($userId){
         $this->userId = $userId;
    }
    public function updateProfileInfo($username,$password){
        if($this->emptyInputCheck($username,$password) == true){
            header("location: ../profilesettings.php?error=emptyinput");
            exit();
        }
        $this->setNewProfileInfo($username,$password,$this->userId);
        header("location: ../profile.php?error=none");
        exit(); 
    }
    private function emptyInputCheck($username,$password){
        $result = false;
        if(empty($username) || empty($password)){
            $result = false;
        }
        else {
               $result = true;
        }
        return $result;
    }
}

?>

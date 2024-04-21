<?php

class ProfileInfoContr extends ProfileInfo {

    private $userId;
    private $userUname;

    public function __construct($userId, $userUname) {
        $this->userId = $userId;
        $this->userUname = $userUname;
    }

    public function defaultProfileInfo() {
        $profileAbout = "Tell people about yourself! your hobbies, your interests, or your TV show!";
        $profileTitle = "Hi! I am " . $this->userUname;
        $profileText = "Welcome to my profile page! soon I`ll be able to tell you more about myself, and what you can find on my profile page";
        $this->setProfileInfo($profileAbout, $profileTitle, $profileText, $this->userId);
    }

    private function emptyInput($profileAbout, $profileTitle, $profileText) {
        $result;
        if(empty($this->profileAbout) || empty($this->profileTitle) || empty($this->profileText)) 
        {
            $result = true;
        }
        else 
        {
            $result = false;
        }

        return $result;
    }

    public function updateProfileInfo($profileAbout, $profileTitle, $profileText) {
        // Error handlers
        if($this->emptyInput($profileAbout, $profileTitle, $profileText) == true) 
        {
            header("location: ../profilesettings.php?error=emptyinput");
            exit();
        }

        // Update profile info
        $this->setNewProfileInfo($profileAbout, $profileTitle, $profileText, $this->userId);
    }
}
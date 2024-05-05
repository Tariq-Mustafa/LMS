<?php

class ProfileInfoView extends ProfileModel {
    
    public function fetchUserName($userId) {
        $profileInfo = $this->getProfileInfo($userId);

        echo $profileInfo[0]["UserName"];
    }

    public function fetchStudentId($userId) {
        $profileInfo = $this->getUserId($userId);

        echo $profileInfo[0]["StudentID"];
    }

    public function fetchTeacherId($userId) {
        $profileInfo = $this->getProfileInfo($userId);

        echo $profileInfo[0]["UserID"];
    }
    
    public function fetchEmail($userId) {
        $profileInfo = $this->getProfileInfo($userId);

        echo $profileInfo[0]["Email"];
    }
    
    public function fetchRole($userId) {
        $profileInfo = $this->getProfileInfo($userId);

        return $profileInfo[0]["Role"];
    }
    
    public function fetchGender($userId) {
        $profileInfo = $this->getProfileInfo($userId);

        echo $profileInfo[0]["Gender"];
    }

}

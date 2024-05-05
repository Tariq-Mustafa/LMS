<?php

class ProfileInfoView extends ProfileModel {
    public function fetchUserName($userId) {
        $profileInfo = $this->getProfileInfo($userId);

        echo $profileInfo[0]["UserName"];
    }
    public function fetchUserId($userId) {
        $profileInfo = $this->getProfileInfo($userId);

        echo $profileInfo[0]["UserID"];
    }
    public function fetchEmail($userId) {
        $profileInfo = $this->getProfileInfo($userId);

        echo $profileInfo[0]["Email"];
    }

    public function fetchPassword($userId) {
        $profileInfo = $this->getProfileInfo($userId);

        echo $profileInfo[0]["Password"];
    }
    public function fetchRole($userId) {
        $profileInfo = $this->getProfileInfo($userId);

        echo $profileInfo[0]["Role"];
    }
    public function fetchGender($userId) {
        $profileInfo = $this->getProfileInfo($userId);

        echo $profileInfo[0]["Gender"];
    }
}

<?php

class ProfileInfo extends Db {

    protected function getProfileInfo($userId) {
        $stmt = $this->connect()->prepare('SELECT * FROM profiles WHERE user_id = ?;');

        if(!$stmt->execute(array($userId))) 
        {
            $stmt = null;
            header("header: profile.php?error=stmtfaild");
            exit();
        }

        if($stmt->rowCount() == 0) 
        {
            $stmt = null;
            header("header: profile.php?error=profilenotfound");
            exit(); 
        }

        $profileData = $stmt->fetchAll(PDO::FETCH_ASSOC);

        return $profileData;
    }

    protected function setNewProfileInfo($profileAbout, $profileTitle, $profileText, $userId) {
        $stmt = $this->connect()->prepare('UPDATE profiles SET profile_about = ?, profile_title = ?, profile_text = ? WHERE user_id = ?;');

        if(!$stmt->execute(array($profileAbout, $profileTitle, $profileText, $userId))) 
        {
            $stmt = null;
            header("header: profile.php?error=stmtfaild");
            exit(); 
        }

        $stmt = null;
    }

    protected function setProfileInfo($profileAbout, $profileTitle, $profileText, $userId) {
        $stmt = $this->connect()->prepare('INSERT INTO profiles (profile_about, profile_title, profile_text, user_id) VALUES (?, ?, ?, ?);');

        if(!$stmt->execute(array($profileAbout, $profileTitle, $profileText, $userId))) 
        {
            $stmt = null;
            header("header: profile.php?error=stmtfaild");
            exit(); 
        }

        $stmt = null;
    }
}
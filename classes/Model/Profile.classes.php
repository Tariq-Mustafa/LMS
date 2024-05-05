<?php

class ProfileModel extends Db {

    public function getProfileInfo($userId) {
        $stmt = $this->connect()->prepare('SELECT * From user WHERE UserID = ?;');
        if(!$stmt->execute(array($userId))) {
            $stmt = null;
            header("location: ../profile.php?error=stmtfailed");
            exit();
        }

        if($stmt->rowCount()== 0){
            $stmt = null;
            header("location: ../profile.php?error=profilenotfound");
            exit();
        }
         
        $profileData = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $profileData;
    }
    public function setNewProfileInfo($username,$password,$userId) {
        $stmt = $this->connect()->prepare('UPDATE user SET UserName = ?,Password = ? WHERE UserID = ?;');
        if(!($stmt->execute(array($userId,$username,$password)))) {
            $stmt = null;
            header("location: ../profile.php?error=stmtfailed");
            exit();
    }
        $stmt = null;
    }
}
?>

<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $id = $_SESSION["UserID"];
    $username = htmlspecialchars($_POST["UserName"], ENT_QUOTES, "UTF-8");
    $password = htmlspecialchars($_POST["Password"], ENT_QUOTES, "UTF-8");
    include "../classes/Db.classes.php";
    include "../classes/Model/Profile.classes.php";
    include "../classes/Control/Profile-contr.classes.php";
    $profileControl = new ProfileController($id);
    $profileControl->updateProfileInfo($username, $password);

    header("location: ../profile.php?error=none");
    exit(); 
}  
?>

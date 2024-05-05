<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") 
{
    // Grabbing the data
    $id = $_SESSION["UserID"];
    $oldPassword = htmlspecialchars($_POST["oldPassword"], ENT_QUOTES, "UTF-8");
    $password = htmlspecialchars($_POST["password"], ENT_QUOTES, 'UTF-8');

    // Instantiate SignupContr class
    include "../classes/Db.classes.php";
    include "../classes/Model/Profile.classes.php";
    include "../classes/Control/Profile-contr.classes.php";
    $profileControl = new ProfileController($id, $oldPassword, $password);
    
    // Running error handlers and user signup
    $profileControl->update();

    // Going to login page
    header("location: ../profile.php?error=none"); 
}  
<?php

session_start();

if($_SERVER["REQUEST_METHOD" = "POST"]) 
{
    // Grabbing the data
    $userId = $_SESSION["user_id"];
    $uname = $_SESSION["user_name"];
    $about = htmlspecialchars($_POST["about"], ENT_QUOTES, 'UTF-8');
    $title = htmlspecialchars($_POST["title"], ENT_QUOTES, 'UTF-8');
    $text = htmlspecialchars($_POST["text"], ENT_QUOTES, 'UTF-8');

    // Instantiate Profile classes
    include "../classes/db.classes.php";
    include "../classes/profileinfo.classes.php";
    include "../classes/profileinfo-contr.classes.php";
    $profileInfo = new ProfileInfoContr($userId, $uname);

    // Update profile info
    $profileInfo->updateProfileInfo($about, $title, $text);

    // Going to profile page
    header("location: ../profile.php?error=none");
}
<?php

if($_SERVER["REQUEST_METHOD"] == "POST")
{
    // Grabbing the data
    $uname = htmlspecialchars($_POST["uname"], ENT_QUOTES, 'UTF-8');
    $email = htmlspecialchars($_POST["email"], ENT_QUOTES, 'UTF-8');
    $password = htmlspecialchars($_POST["password"], ENT_QUOTES, 'UTF-8');
    $cpassword = htmlspecialchars($_POST["cpassword"], ENT_QUOTES, 'UTF-8');
    $Role = "Admin";

    // Instantiate SignupContr class
    include "../classes/Db.classes.php";
    include "../classes/signup.classes.php";
    include "../classes/signup-contr.classes.php";
    $signup = new SignupContr($uname, $email, $password, $cpassword, $Role);

    // Running error handlers and user signup
    $signup->signupUser();
    $userId = $signup->fetchUserId($uname);

    // Instantiate ProfileInfoContr class
   // include "../classes/profileinfo.classes.php";
   // include "../classes/profileinfo-contr.classes.php";
   // $profileInfo = new ProfileInfoContr($userId, $uname);
   // $profileInfo->defaultProfileInfo();

    // Going to login page
    header("location: ../index.php?error=none");
}
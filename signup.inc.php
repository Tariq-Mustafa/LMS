<?php

if($_SERVER["REQUEST_METHOD"] == "POST")
{
    // Grabbing the data
    $uname = htmlspecialchars($_POST["uname"], ENT_QUOTES, 'UTF-8');
    $email = htmlspecialchars($_POST["email"], ENT_QUOTES, 'UTF-8');
    $password = htmlspecialchars($_POST["password"], ENT_QUOTES, 'UTF-8');
    $cpassword = htmlspecialchars($_POST["cpassword"], ENT_QUOTES, 'UTF-8');
    $Role = "Admin";
    $Gender = "NULL";

    // Instantiate SignupContr class
    include "../classes/Db.classes.php";
    include "../classes/Model/signup.classes.php";
    include "../classes/Control/signup-contr.classes.php";
    $signup = new SignupContr($uname, $email, $password, $cpassword, $Role, $Gender);

    // Running error handlers and user signup
    $signup->signupUser("index");

    // Going to login page
    header("location: ../index.php?error=none");
}
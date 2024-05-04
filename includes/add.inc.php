<?php

session_start();

if($_SERVER["REQUEST_METHOD"] == "POST")
{
    // Grabbing the data
    $adminID = $_SESSION["AdminID"];
    $uname = htmlspecialchars($_POST["uname"], ENT_QUOTES, 'UTF-8');
    $email = htmlspecialchars($_POST["email"], ENT_QUOTES, 'UTF-8');
    $password = htmlspecialchars($_POST["password"], ENT_QUOTES, 'UTF-8');
    $cpassword = htmlspecialchars($_POST["cpassword"], ENT_QUOTES, 'UTF-8');
    $Role = htmlspecialchars($_POST["Role"], ENT_QUOTES, 'UTF-8');
    $Gender = htmlspecialchars($_POST["Gender"], ENT_QUOTES, 'UTF-8');

    // Instantiate SignupContr class
    include "../classes/Db.classes.php";
    include "../classes/Model/signup.classes.php";
    include "../classes/Control/signup-contr.classes.php";
    $signup = new SignupContr($uname, $email, $password, $cpassword, $Role, $Gender);

    // Running error handlers and user signup
    $signup->signupUser();
    $userId = $signup->fetchUserId($uname);
    
    // Instantiate UserContr class
    include "../classes/Model/user.classes.php";
    include "../classes/Control/user-contr.classes.php";
    include "../classes/View/user-view.classes.php";
    
    // add user into his/her right second table
    if($Role == "Teacher")
    {
        $Department = htmlspecialchars($_POST["Department"], ENT_QUOTES, 'UTF-8');
        $addUser = new UserContr($userId, $adminID, $Department, $Role);
    }
    else
    {
        $Department = null;
        $addUser = new UserContr($userId, $adminID, $Department, $Role);
    }

    $addUser->addUser();

    // Going to login page
    header("location: ../manageUser.php?error=none");
}
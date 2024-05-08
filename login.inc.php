<?php

if($_SERVER["REQUEST_METHOD"] == "POST")
{
    // Grabbing the data
    $uname = htmlspecialchars($_POST["uname"], ENT_QUOTES, 'UTF-8');
    $password = htmlspecialchars($_POST["password"], ENT_QUOTES, 'UTF-8');

    // Instantiate signupContr class
    include "../classes/Db.classes.php";
    include "../classes/Model/login.classes.php";
    include "../classes/Control/login-contr.classes.php";
    $login = new LoginContr($uname, $password);

    // Running error handlers and user login
    $login->loginUser();
}
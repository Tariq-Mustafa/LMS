<?php
session_start();
include "../LMS-main/classes/Db.classes.php";
include "../LMS-main/classes/Model/Profile.classes.php";
include "../LMS-main/classes/View/Profile-view.classes.php";
include "../LMS-main/classes/Control/Profile-contr.classes.php";
$profileInfo = new ProfileInfoView();

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <link rel="stylesheet" href="./css/Registeration.css">
    <title>User Profile</title>
    <style>
        .profile-container {
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
            background-color: #f9f9f9;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .profile-info {
            margin-bottom: 20px;
        }

        .profile-info label {
            font-weight: bold;
        }

        .profile-info p {
            margin: 5px 0;
        }
    </style>
</head>

<body>
     <section class ="profile">
        <div class="profile-bg">
            <div class ="wrapper">
                <div class="profile-settings">
                    <h3>PROFILE SETTINGS</h3>
                    <p>Change your username here!</p>
                    <form action="includes/profile.inc.php" method="post">
                        <textarea name="UserName" rows = "10" cols="30" placeholder="Enter new username..."></textarea>
                        <br><br>
                    <p>Change your password here!</p>
                    <br>
                    <form action="includes/profile.inc.php" method="post">
                        <textarea name="Password" rows = "10" cols="30" placeholder="Enter new password..."></textarea>
                        <button type="submit" name="submit">SAVE</button>
                    </form>
                </div>
            </div>
        </div>
    </section>
    
    <?php
    include 'footer.php';
    ?>

    <script src="./js/Registeration.js"></script>
</body>

</html>

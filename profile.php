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

    <div class="container" id="container">
        <div class="profile-container">
            <h1>User Profile</h1>
            <div class="profile-info">
                <label>User Name:</label>
                <p><?php $profileInfo->fetchUserName($_SESSION["UserID"]);?></p>
            </div>
            <div class="profile-info">
                <label>ID:</label>
                <p><?php $profileInfo->fetchUserId($_SESSION["UserID"]);?></p>
            </div>
            <div class="profile-info">
                <label>Email Address:</label>
                <p><?php $profileInfo->fetchEmail($_SESSION["UserID"]);?></p>
            </div>
            <div class="profile-info">
                <label>Password:</label>
                <p><?php $profileInfo->fetchPassword($_SESSION["UserID"]); ?></p>
            </div>
            <div class="profile-info">
                <label>Gender:</label>
                <p><?php $profileInfo->fetchGender($_SESSION["UserID"]) ?></p>
            </div>
            <div class="profile-info">
                <label>Role:</label>
                <p><?php $profileInfo->fetchRole($_SESSION["UserID"]) ?></p>
            </div>
            <div class="profile-info">
                <a href="profilesettings.php" class="button">Edit Profile</a>
            </div>
        </div>
    </div>

    <?php
    include 'footer.php';
    ?>

    <script src="./js/Registeration.js"></script>
</body>

</html>

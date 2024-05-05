<?php
    session_start();
    include "classes/Db.classes.php";
    include "classes/Model/Profile.classes.php";
    include "classes/View/Profile-view.classes.php";
    $profileInfo = new ProfileInfoView();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <link rel="stylesheet" href="./css/Registeration.css">
    <title>Profile</title>
    <style>
        .profile-container {
            width: 600px;
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
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
            <h1>Profile page</h1>
            <div class="profile-info" style="margin-top: 10px;">
                <label>Welcome <?php $profileInfo->fetchUserName($_SESSION["UserID"]);?></label>
            </div>
            <div class="profile-info">
                <label>ID: <?php $profileInfo->fetchUserId($_SESSION["UserID"]);?></label>
            </div>
            <div class="profile-info">
                <label>Email Address: <?php $profileInfo->fetchEmail($_SESSION["UserID"]);?></label>
            </div>
            <div class="profile-info">
                <form action="includes/profile.inc.php" method="post">
                    <input type="password" name="oldPassword" placeholder="Old Passwprd" />
                    <input type="password" name="password" placeholder="New Password" minlength="7" />
                    <button type="submit" name="submit">Change Password</button>
                </form>
            </div>
            <div class="profile-info">
                <label>Gender: <?php $profileInfo->fetchGender($_SESSION["UserID"]) ?></label>
            </div>
            <div class="profile-info">
                <label>Role: <?php $profileInfo->fetchRole($_SESSION["UserID"]) ?></label>
            </div>
            <div class="profile-info">
                <a href="profileSettings.php" class="button">Edit Profile</a>
            </div>
            <div class="profile-info">
                <a href="studentDashboard.php" class="button">Go back</a>
            </div>
        </div>
    </div>

    <?php
    include 'footer.php';
    ?>

    <script src="./js/Registeration.js"></script>
</body>

</html>

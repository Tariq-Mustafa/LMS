<?php
$courseName = "statistics";
$description = "i love statistics";
$startDate = "2024-05-20";
$endDate = "2024-05-29";
$imagePath = "./images/12-45-27stat.jpg";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/Dashboard.css">
    <title><?php echo $courseName; ?></title>
</head>
<body>
<?php
include_once "sidebar.php";
?>
</div>

    <div class="details">
        <div class="recentOrders">
    <h1><?php echo $courseName; ?></h1>
    <p><strong>Description:</strong> <?php echo $description; ?></p>
    <p><strong>Start Date:</strong> <?php echo $startDate; ?></p>
    <p><strong>End Date:</strong> <?php echo $endDate; ?></p>
    <img src="<?php echo $imagePath; ?>" alt="Course Image">
    </div>
    </div>
</body>
</html>

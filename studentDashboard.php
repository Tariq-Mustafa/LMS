<?php
session_start();
include "classes/Db.classes.php";
include "classes/Model/user.classes.php";
include "classes/View/user-view.classes.php";
$users = new UserView();
require_once 'classes/Control/CourseController.php';
require_once "classes/Model/Course.php";
require_once 'classes/Control/StudentController.php';
require_once "classes/Model/Student.php";
$courseController = new CourseController;
$adminID = $_SESSION["AdminID"];
$courses = $courseController->getCourses($adminID);
?>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" type="text/css" href="css/Dashboard.css">
	<title>Student Dashboard</title>
</head>
<?php
include_once "studentSidebar.php";
?>

<div class="search">
	<label>
		<input type="text" placeholder="Search here">
		<ion-icon name="search-outline"></ion-icon>
	</label>
</div>
</div>
<div class="details">
	<div class="recentOrders">
		<?php

		//$courses = $users->fetchCourses();

		foreach ($courses as $course) {
		?>
			<div class="course">
				<h2><?php echo $course["CourseName"]; ?></h2>
				<p><?php echo $course["Description"]; ?></p>
				<div class="enroll-bar">
				<span class="enroll-progress" style="width: 100%">

	<a href="<?php echo str_replace(' ', '-',$course["CourseName"]) ?>.php" target="_blank">    
                            <img src="<?php echo $course["Image"] ?>" alt="Course Image">

</span>
					<!-- <span class="enroll-status"><?php echo $course["CourseName"]; ?></span> -->
				</div>
			</div>
	</div>
</div>
<?php
		}
?>
<script src="./js/Dashboard.js"></script>
<script defer type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
<script defer nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
</body>

</html>
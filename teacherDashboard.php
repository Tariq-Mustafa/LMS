<?php
	session_start();
	include "classes/Db.classes.php";
	include "classes/Model/user.classes.php";
	include "classes/View/user-view.classes.php";
	$users = new UserView();
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" type="text/css" href="css/Dashboard.css">
	<title>Teacher Dashboard</title>
</head>
<?php
	include_once "teachersidebar.php";
?>

<div class="search">
	<label>
		<input type="text" placeholder="Search here">
		<ion-icon name="search-outline"></ion-icon>
	</label>
</div>
</div>
<?php

	//$courses = $users->fetchCourses();

	foreach ($courses as $course) {
		?>
		<div class="course">
			<h2><?php echo $course['course_name']; ?></h2>
			<p><?php echo $course['description']; ?></p>
			<div class="enroll-bar">
				<span class="enroll-progress" style="width: <?php echo $course['progress']; ?>%"></span>
				<span class="enroll-status"><?php echo $course['progress']; ?>%</span>
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

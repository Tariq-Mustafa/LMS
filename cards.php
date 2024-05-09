<div class="cardBox">
	<div class="card">
		<div>
			<?php
			require_once 'classes/Control/CourseController.php';
			require_once "classes/Model/Course.php";
			require_once 'classes/Control/StudentController.php';
			require_once "classes/Model/Student.php";
			$courseController = new CourseController;
			$adminID=$_SESSION["AdminID"];
			$courses = $courseController->getCourses($adminID); ?>
			<div class="numbers"><?php echo count($courses); ?></div>
			<div class="cardName">Courses</div>
		</div>
		<div class="iconBx">
			<ion-icon name="eye-outline"></ion-icon>
		</div>
	</div>
	<div class="card">
		<div>
			<div class="numbers"><?php $users->fetchTeacherCount($_SESSION["AdminID"]); ?></div>
			<div class="cardName">Teacher</div>
		</div>
		<div class="iconBx">
			<ion-icon name="people-outline"></ion-icon>
		</div>
	</div>
	<div class="card">
		<div>
			<div class="numbers"><?php $users->fetchStudentCount($_SESSION["AdminID"]); ?></div>
			<div class="cardName">Student</div>
		</div>
		<div class="iconBx">
			<ion-icon name="people-outline"></ion-icon>
		</div>
	</div>
	<div class="card">
		<div>
			<div class="numbers"></div>
			<div class="cardName">Messages</div>
		</div>
		<div class="iconBx">
			<ion-icon name="chatbubble-outline"></ion-icon>
		</div>
	</div>
</div>
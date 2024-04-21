<!DOCTYPE html>
<html lang="en">
	<head>
		<style>
			@import url("https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900");
			footer
			{
				font-family: 'Poppins', sans-serif;
				width: 100%;
				margin-top: 5%;
			}
			footer p
			{
				color: black;
				text-align: center;
				padding: 20px 0px;
				font-weight: 300;
			}		
		</style>
	</head>
	<body>
		<footer>
			<?php
				$year= date('Y');
				echo "<p>&copy; $year SE LMS Project. All rights reserved.</p>";
			?>
		</footer>
	</body>
</html>
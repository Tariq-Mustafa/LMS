<!DOCTYPE html>
<html lang="en">
	<head>
		<style>
			footer
			{
				width: 100%;
				margin-top: 10px;
			}
			footer p
			{
				color: black;
				text-align: center;
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
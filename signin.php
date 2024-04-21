<?php
	session_start();
?>

<!DOCTYPE html>
<html lang="en">
	<head>
		<meta name="Author" content="tarek"/>
		<meta name="created" content="tarek"/>
		<meta charset="UTF-8"/>
		<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
		<title>Login Form</title>
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
		<link rel="stylesheet" type="text/css" href="css/form.css"/>
	</head>
	<body>
		<?php
			$page_signin= true;
			include_once 'header.php';
		?>
			<div class="form_container">
				<div class="animation"></div>
				<div class="form">
					<form action="includes/login.inc.php" method="post">
						<h2>Log in</h2>
						<div class="input_group">
							<input type="text" name="uname" placeholder="User Name" class="input_text" />
						</div>
						<div class="input_group">
							<input type="password" name="password" placeholder="Password" class="input_text" />
						</div>
						<div class="button">
							<input type="submit" name="submit" value='Sign In' class="a" />
						</div>
						<div class="fotter">
							<p>Don't have an account? <a href="signup.php">SignUp Now!</a></p>
						</div>
					</form>
				</div>
			</div>	
		<?php
			include 'footer.php';
		?>
	</body>
</html>
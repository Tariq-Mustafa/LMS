<?php
	session_start();
?>

<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0" />
		<meta name="Author" content="tarek"/>
		<meta name="created" content="tarek"/>
		<title>Registration Form</title>
		<link rel="stylesheet" type="text/css" href="css/form.css">
	</head>
	<body>
		<?php
			$page_signup= true;
			include 'header.php';
		?>
			<div class="form_container">
				<div class="animation"></div>
				<div class="form">
					<form action="includes/signup.inc.php" method="post">
						<h2>Sign Up Now!</h2>
						<div class="input_group">
							<input type="text" name="uname" placeholder="Full Name" class="input_text" />
						</div>
						<div class="input_group">
							<input type="email" name="email" placeholder="Email Address" class="input_text" />
						</div>
						<div class="input_group">
							<input type="password" name="password" placeholder="Password" class="input_text" minlength="7" />
						</div>
						<div class="input_group">
							<input type="password" name="cpassword" placeholder="Confirm Password" class="input_text" />
						</div>
						<div class="button">
							<input type="submit" name="submit" value="Register Now" class="a" />
						</div>
						<div class="fotter">
							<p>Already have an account? <a href="signin.php">sign in!</a></p>
						</div>
					</form>
				</div>
			</div>	
		<?php
			include 'footer.php';
		?>
	</body>
</html>
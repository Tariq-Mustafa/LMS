<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
        <link rel="stylesheet" href="./css/Registeration.css">
        <title>Registeration</title>
        <style>
            .form-group {
			    margin-bottom: 20px;
		    }
            .form-control {
                width: 100%;
                padding: 10px;
                font-size: 16px;
                border: 1px solid #ccc;
                border-radius: 5px;
		    }

		    .role-label {
                margin-bottom: 5px;
                display: block;
                font-weight: bold;
		    }
        </style>
    </head>

    <body>

        <div class="container" id="container">
            <div class="form-container sign-up">
                <form action="includes/signup.inc.php" method="post">
                    <h1>Create Account</h1>
                    <div class="social-icons"></div> 
                    <span>Please fill your information here</span>
                    <input type="text" name="uname" placeholder="Full Name" />
                    <input type="email" name="email" placeholder="Email Address" />
                    <input type="password" name="password" placeholder="Password" minlength="7" />
                    <input type="password" name="cpassword" placeholder="Confirm Password" />
                    <div class="form-group">
                        <label for="Gender" class="role-label">Choose a Gender:</label>
                            <select name="Gender" class="form-control">
                                <option value="Male">Male</option>
                                <option value="Female">Female</option>
                            </select>
                    </div>
                    <input type="submit" name="submit" value="Register Now" class="button"/>
                </form>
            </div>
            <div class="form-container sign-in">
                <form action="includes/login.inc.php" method="post">
                    <h1>Sign In</h1>
                    <div class="social-icons"></div>
                    <span>Please put your username & password</span>
                    <input type="text" name="uname" placeholder="User Name" />
                    <input type="password" name="password" placeholder="Password" />
                    <input type="submit" name="submit" value='Sign In' class="button" />
                </form>
            </div>
            <div class="toggle-container">
                <div class="toggle">
                    <div class="toggle-panel toggle-left">
                        <h1>Welcome Back!</h1>
                        <p>Enter your Account details to use our LMS site</p>
                        <button class="hidden" id="login">Sign In</button>
                    </div>
                    <div class="toggle-panel toggle-right">
                        <h1>Welcome with LMS!</h1>
                        <p>Register with your personal details to use our LMS site</p>
                        <button class="hidden" id="register">Sign Up</button>
                    </div>
                </div>
            </div>
        </div>

        <?php
            include 'footer.php';
        ?>
        
        <script src="./js/Registeration.js"></script>
    </body>

</html>
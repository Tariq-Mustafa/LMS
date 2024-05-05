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
	<title>Manage Users</title>
	<style>
		.user-form {
		    max-width: 400px;
			margin: 0 auto;
		}

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

		.btn {
			padding: 10px 20px;
			font-size: 16px;
			border: none;
			border-radius: 5px;
			background-color: #007bff;
			color: #fff;
			cursor: pointer;
		}

		.btn:hover {
			background-color: #0056b3;
		}

	</style>
</head>
	<?php
		include_once "sidebar.php";
	?>
	</div>
	<?php
		include_once "cards.php"
	?>	
			<!-- ================ Order Details List ================= -->
            <div class="details">
                <div class="recentOrders">
                    <div class="cardHeader">
                        <h2>View Users</h2>
						<div class="search">
                    		<label>
                        		<input type="text" placeholder="Search for a student">
                        		<ion-icon name="search-outlie"></ion-icon>
                    		</label>
                		</div>
                    </div>

                    <table>
                        <thead>
                            <tr>
                                <td>Main ID</td>
                                <td>StudentID / Department</td>
                                <td>Full Name</td>
                                <td>Delete</td>
                            </tr>
                        </thead>

						<tbody>

							<?php
								$users->fetchAllUser($_SESSION["AdminID"]);
							?>

						</tbody>
                    </table>
                </div>
				<div class="recentCustomers">
					<div class="cardHeader">
						<h2>Manage User</h2>
					</div>
					<form action="includes/add.inc.php" method="post" id="user-form" class="user-form">
    					<div class="form-group">
							<input type="text" name="uname" id="uname" class="form-control" style="margin-top: 10px;" placeholder="Full Name" />
						</div>
						<div class="form-group">
							<input type="email" name="email" id="email" class="form-control" placeholder="Email Address" />
						</div>
						<div class="form-group">
							<input type="password" name="password" id="password" class="form-control" placeholder="Password" minlength="7" />
						</div>
						<div class="form-group">
							<input type="password" name="cpassword" id="cpassword" class="form-control" placeholder="Confirm Password" />
						</div>
						<div class="form-group">
							<label for="Role" class="role-label">Choose a Role:</label>
							<select name="Role" id="Role" class="form-control" onchange="toggleDepartmentField()">
								<option value="Student">Student</option>
								<option value="Teacher">Teacher</option>
							</select>
						</div>
						<div class="form-group" id="department-field" style="display: none;">
        					<label for="Department" class="role-label">Department:</label>
        					<input type="text" name="Department" id="Department" class="form-control" placeholder="Department" />
    					</div>
						<div class="form-group">
							<label for="Gender" class="role-label">Choose a Gender:</label>
							<select name="Gender" class="form-control">
								<option value="Male">Male</option>
								<option value="Female">Female</option>
							</select>
                    	</div>
						<button type="submit" name="submit" class="btn btn-primary">Add</button>
					</form>
				</div>
			</div>
		</div>
	</div>
	<script>
		function toggleDepartmentField() {
			var role = document.getElementById('Role').value;
			var departmentField = document.getElementById('department-field');
			
			if (role === 'Teacher') {
				departmentField.style.display = 'block';
			} else {
				departmentField.style.display = 'none';
			}
    	}
	</script>
	<script src="./js/Dashboard.js"></script>
	<script defer type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
	<script defer nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>

</body>
</html>
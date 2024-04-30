<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" type="text/css" href="css/Dashboard.css">
	<title>Dashboard</title>
</head>
<body>
	<div class="container">
		<div class="navigation">
			<ul>
				<li>
					<a href="index.php"><span class="title">Online LMS</span></a>
				</li>
				<li>
					<a href="admin_dashboard.php">
						<span class="icon">
							<ion-icon name="home-outline"></ion-icon>
						</span>
						<span class="title">Dashboard</span>
					</a>
				</li>
				<li>
					<a href="admin_customers.php">
						<span class="icon">
							<ion-icon name="people-outline"></ion-icon>
						</span>
						<span class="title">Manage Courses</span>
					</a>
				</li>
				<li>
					<a href="admin_feedback.php">
						<span class="icon">
							<ion-icon name="people-outline"></ion-icon>
						</span>
						<span class="title">Manage Users</span>
					</a>
				</li>
				<li>
					<a href="admin_feedback.php">
						<span class="icon">
							<ion-icon name="chatbubble-outline"></ion-icon>
						</span>
						<span class="title">Messages</span>
					</a>
				</li>
				<li>
					<a href="./includes/logout.inc.php">
						<span class="icon">
							<ion-icon name="log-out-outline"></ion-icon>
						</span>
						<span class="title">Sign Out</span>
					</a>
				</li>
			</ul>
		</div>
		<div class="main">
            <div class="topbar">
                <div class="toggle">
                    <ion-icon name="menu-outline"></ion-icon>
                </div>

                <div class="search">
                    <label>
                        <input type="text" placeholder="Search here">
                        <ion-icon name="search-outline"></ion-icon>
                    </label>
                </div>
            </div>
			<div class="cardBox">
				<div class="card">
					<div>
						<div class="numbers"></div>
						<div class="cardName">Courses</div>
					</div>
					<div class="iconBx">
						<ion-icon name="eye-outline"></ion-icon>
					</div>
				</div>
				<div class="card">
					<div>
						<div class="numbers"></div>
						<div class="cardName">Teacher</div>
					</div>
					<div class="iconBx">
						<ion-icon name="people-outline"></ion-icon>
					</div>
				</div>
				<div class="card">
					<div>
						<div class="numbers"></div>
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
			<!-- ================ Order Details List ================= -->
            <div class="details">
                <div class="recentOrders">
                    <div class="cardHeader">
                        <h2>Recent Courses</h2>
                        <a href="#" class="btn">View All</a>
                    </div>

                    <table>
                        <thead>
                            <tr>
                                <td>Name</td>
                                <td>Price</td>
                                <td>Payment</td>
                                <td>Status</td>
                            </tr>
                        </thead>

                        <tbody>
                            <tr>
                                <td>Star Refrigerator</td>
                                <td>$1200</td>
                                <td>Paid</td>
                                <td><span class="status delivered">Delivered</span></td>
                            </tr>

                            <tr>
                                <td>Dell Laptop</td>
                                <td>$110</td>
                                <td>Due</td>
                                <td><span class="status pending">Pending</span></td>
                            </tr>

                            <tr>
                                <td>Apple Watch</td>
                                <td>$1200</td>
                                <td>Paid</td>
                                <td><span class="status return">Return</span></td>
                            </tr>

                            <tr>
                                <td>Addidas Shoes</td>
                                <td>$620</td>
                                <td>Due</td>
                                <td><span class="status inProgress">In Progress</span></td>
                            </tr>

                            <tr>
                                <td>Star Refrigerator</td>
                                <td>$1200</td>
                                <td>Paid</td>
                                <td><span class="status delivered">Delivered</span></td>
                            </tr>

                            <tr>
                                <td>Dell Laptop</td>
                                <td>$110</td>
                                <td>Due</td>
                                <td><span class="status pending">Pending</span></td>
                            </tr>

                            <tr>
                                <td>Apple Watch</td>
                                <td>$1200</td>
                                <td>Paid</td>
                                <td><span class="status return">Return</span></td>
                            </tr>

                            <tr>
                                <td>Addidas Shoes</td>
                                <td>$620</td>
                                <td>Due</td>
                                <td><span class="status inProgress">In Progress</span></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
				<div class="recentCustomers"><div class="cardHeader"><h2></h2></div><table></table></div>
			</div>
		</div>
	</div>

	<script src="./js/Dashboard.js"></script>
	<script defer type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
	<script defer nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>

</body>
</html>
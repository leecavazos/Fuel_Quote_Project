<!DOCTYPE html>
<?php
include('../../php/AdminloginAction.php');
?>

<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Orders</title>

	<!-- Link to css file -->
	<link rel="stylesheet" type="text/css" href="../../css/purchase.css">

    
	
	<!-- Boxicons CDN Link -->
	<link href='https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css' rel='stylesheet'>

	<!-- Link to js file -->
	<script src="../../js/script.js"></script>

</head>
<body>
	<!-- Navigation Bar Begins -->
	<!-- Add onclick event for the sidebar from js file -->
	<div class="sidebar" onclick="toggleSideBar()">
		<div class="logo_content">
			<div class="logo">
                <i class='bx bxs-package'></i>
				<div class="logo_name">Sales</div>
			</div>
			<i class='bx bx-menu' id="btn"></i>
		</div>
		<ul class="nav_list">
			<li>
				<a href="imanagerprofile.php">
					<i class='bx bxs-user-badge' ></i>
					<span class="links_name">Manager</span>
				</a>
				<span class="tooltip">Manager</span>
			</li>
			<li>
				<a href="OrdersAdmin2.php">
					<i class='bx bx-grid-alt' ></i>
					<span class="links_name">Dashboard</span>
				</a>
				<span class="tooltip">Dashboard</span>
			</li>
			<li>
				<a href="">
					<i class='bx bx-box' ></i>
					<span class="links_name">Edit Order</span>
				</a>
				<span class="tooltip">Edit Order</span>
			</li>

		</ul>
		<div class="profile_content">
			<div class="profile">
				<div class="profile_details">
					<div class="name_job">
						<div class="name"><?php echo $_SESSION['login_user']?></div>
						<div class="job">Sales Manager</div>
					</div>
				</div>
				<a href="../../index.php">
					<i class='bx bx-log-out' id="log_out"></i>
				</a>
			</div>
		</div>
	</div>
	<!-- Navigation Bar Ends -->
    
</body>
<html>
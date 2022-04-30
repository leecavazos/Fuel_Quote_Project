<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Purchasing</title>

	<!-- Link to css file -->
	<link rel="stylesheet" type="text/css" href="../../css/purchase.css">
	
	<!-- Boxicons CDN Link -->
	<link href='https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css' rel='stylesheet'>


</head>
<body>
	
	<?php 
		include('navbar.php');
		require_once '../../php/config.php';
		$sql = "SELECT * FROM `Purchase Request` WHERE Status = 'Pending'";
		$result = mysql_query($conn, $sql) or die(mysqli_error);
		$num_rows = mysql_num_rows($result);
	?>
	
	<!-- Page Content Begins -->
	<!-- Begin Dashboard Content -->
	<section class="dashboard">
		<div class="dash-content">
			<div class="overview">
				<div class="title">
					<i class='bx bx-coin'></i>
					<span class="text">Dashboard</span>
				</div>

				<div class="boxes">
					<div class="box box1">
						<i class='bx bx-message-square-error'></i>
						<span class="text">Pending Requests</span>
						<span class="number"><?= $num_rows ?></span>
					</div>
					<div class="box box2">
						<i class='bx bx-check-square' ></i>
						<span class="text">Amount Approved</span>
						<span class="number">$325,000</span>
					</div>
					<div class="box box3">
						<i class='bx bx-message-alt-x' ></i>
						<span class="text">Amount Rejected</span>
						<span class="number">$23,600</span>
					</div>
				</div>
			</div>
	<!-- End Dashboard content -->
	<!-- Recent Activity Content Begins -->
			<div class="activity">
				<div class="title">
					<i class='bx bx-time' ></i>
					<span class="text">Recent Requests</span>
				</div>

				<div class="activity-data">
					<div class="data ID">
						<span class="data-title">Request ID</span>
						<span class="data-list">10377694</span>
						<span class="data-list">10377695</span>
						<span class="data-list">10377696</span>
						<span class="data-list">10377697</span>
						<span class="data-list">10377698</span>
						<span class="data-list">10377699</span>
					</div>
					<div class="data manID">
						<span class="data-title">Manager ID</span>
						<span class="data-list">147865</span>
						<span class="data-list">147866</span>
						<span class="data-list">147866</span>
						<span class="data-list">147665</span>
						<span class="data-list">147767</span>
						<span class="data-list">147865</span>
					</div>
					<div class="data dateReq">
						<span class="data-title">Request Date</span>
						<span class="data-list">06-06-06</span>
						<span class="data-list">06-05-06</span>
						<span class="data-list">06-05-06</span>
						<span class="data-list">06-01-06</span>
						<span class="data-list">05-31-06</span>
						<span class="data-list">05-06-06</span>
					</div>
					<div class="data total">
						<span class="data-title">Total Asking</span>
						<span class="data-list">$250</span>
						<span class="data-list">$350</span>
						<span class="data-list">$223</span>
						<span class="data-list">$167</span>
						<span class="data-list">$132</span>
						<span class="data-list">$221</span>
					</div>
					<div class="data status">
						<span class="data-title">Status</span>
						<span class="data-list">Pending</span>
						<span class="data-list">Pending</span>
						<span class="data-list">Rejected</span>
						<span class="data-list">Rejected</span>
						<span class="data-list">Approved</span>
						<span class="data-list">Approved</span>
					</div>
					<div class="data dateApprv">
						<span class="data-title">Approval Date</span>
						<span class="data-list">N/A</span>
						<span class="data-list">N/A</span>
						<span class="data-list">06-05-06</span>
						<span class="data-list">06-02-06</span>
						<span class="data-list">05-31-06</span>
						<span class="data-list">05-07-06</span>
					</div>					
				</div>
			</div>
	<!-- Recent Activity Content Ends -->
		</div>
	</section>
	<!-- Page Content Ends -->

	
	

	



</body>
</html>
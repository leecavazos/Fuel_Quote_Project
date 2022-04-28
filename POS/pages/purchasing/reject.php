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
	
	<?php include('navbar.php'); ?>
	<!-- Page Content Begins -->
	<!-- Begin Title Content -->
	<section class="dashboard">
		<div class="dash-content">
			<div class="overview">
				<div class="title">
					<i class='bx bx-coin'></i>
					<span class="text">Reject History</span>
				</div>
			</div>
	<!-- End Title content -->
	<!-- Rejected History Begins -->
			<div class="activity">
				<div class="title">
					<i class='bx bx-task-x' ></i>
					<span class="text">Rejected Requests</span>
				</div>

				<div class="activity-data">
					<div class="data ID">
						<span class="data-title">Request ID</span>
						<span class="data-list">10377696</span>
						<span class="data-list">10377697</span>
					</div>
					<div class="data manID">
						<span class="data-title">Inventory Manager ID</span>
						<span class="data-list">147866</span>
						<span class="data-list">147665</span>
					</div>
					<div class="data dateReq">
						<span class="data-title">Request Date</span>
						<span class="data-list">06-05-06</span>
						<span class="data-list">06-01-06</span>
					</div>
					<div class="data total">
						<span class="data-title">Total Asking</span>
						<span class="data-list">$223</span>
						<span class="data-list">$167</span>
					</div>
					<div class="data status">
						<span class="data-title">Status</span>
						<span class="data-list">Rejected</span>
						<span class="data-list">Rejected</span>
					</div>			
				</div>
			</div>
	<!-- Rejected History Ends -->
		</div>
	</section>
	<!-- Page Content Ends -->

</body>
</html>
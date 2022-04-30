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
					<span class="text">Requests</span>
				</div>
			</div>
	<!-- End Title content -->
	<!-- Recent Activity Content Begins -->
			<div class="activity">
				<div class="title">
					<i class='bx bx-dollar-circle' ></i>
					<span class="text">Pending Requests</span>
				</div>

				<div class="activity-data">
					<div class="data ID">
						<span class="data-title">Request ID</span>
						<span class="data-list">10377694</span>
						<span class="data-list">10377695</span>
					</div>
					<div class="data manID">
						<span class="data-title">Inventory Manager ID</span>
						<span class="data-list">147865</span>
						<span class="data-list">147866</span>
					</div>
					<div class="data dateReq">
						<span class="data-title">Request Date</span>
						<span class="data-list">06-06-06</span>
						<span class="data-list">06-05-06</span>
					</div>
					<div class="data total">
						<span class="data-title">Total Asking</span>
						<span class="data-list">$250</span>
						<span class="data-list">$350</span>
					</div>
					<div class="data status">
						<span class="data-title">Action</span>
						<span class="data-list"><button>Accept?</button></span>
						<span class="data-list"><button>Accept?</button></span>
					</div>
					<div class="data status">
						<span class="data-title">Action</span>
						<span class="data-list"><button>Reject?</button></span>
						<span class="data-list"><button>Reject?</button></span>
					</div>		
				</div>
			</div>
	<!-- Recent Activity Content Ends -->
		</div>
	</section>
	<!-- Page Content Ends -->

</body>
</html>
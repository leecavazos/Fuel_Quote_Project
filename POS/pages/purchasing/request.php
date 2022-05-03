
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Purchasing</title>

	<!-- Link to css file -->
	<link rel="stylesheet" type="text/css" href="../css/purchase.css">
	
	<!-- Boxicons CDN Link -->
	<link href='https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css' rel='stylesheet'>


</head>
<body>

	<?php include('../includes/navbar.php'); ?>

	<!-- Page Content Begins -->
	<!-- Begin Title Content -->
	<section class="dashboard">
		<div class="dash-content">
			<div class="overview">
				<div class="title">
					<i class='bx bx-transfer'></i>
					<span class="text">Request Item</span>
				</div>
			</div>
	<!-- End Title content -->
	<!-- Invoice Content Begins -->
			Select Product:
			<form method="get" action = "requestconfirm.php">
				Request ID: <input type="text" name="requestID">
				Product ID: <input type="text" name="productID">
				<br>
				Quantity: <input type="text" name="quantity">
				<br>
				<input type="submit">
			</form>
	<!-- Invoice Content Ends -->
		</div>
	</section>
	<!-- Page Content Ends -->

</body>
</html>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Inventory</title>

	<!-- Link to css file -->
	<link rel="stylesheet" type="text/css" href="../css/purchase.css">
	
	<!-- Boxicons CDN Link -->
	<link href='https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css' rel='stylesheet'>


</head>
<body>

<!-- Determining the maximum productID -->
<?php
	include('navbar.php');

	$query = "SELECT max(Product_ID) as max FROM Product";
	$result = mysqli_query($conn, $query);
	$row = mysqli_fetch_assoc($result);
	$max_id = (int)$row['max'];
?>
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
			Select Product ID for Purchasing:
			<form method="get" action = "requestconfirm.php">
				Product ID: <input type="number" min="1" max = "<?php echo $max_id;?>" name="productID">
				<br>
				<br>
				<input type="submit">
			</form>
	<!-- Invoice Content Ends -->
		</div>
	</section>
	<!-- Page Content Ends -->
	<br><br><br><br><br><br><br><br><br><br><br><br><br><br>
	<h2>Log Messages </h2>
	<section class="messages">
	<?php
		$queryl = "SELECT * FROM Log";
		$resultl = mysqli_query($conn, $queryl);
		
		while ($rowl = mysqli_fetch_assoc($resultl)) {
			echo "{$rowl['Message']} {$rowl['Name']}";
			echo "<br>";
		}
		
	?>
	<h3>Product names</h3>
	<?php 
		$queryf = "SELECT * FROM Product";
		$resultf = mysqli_query($conn, $queryf);

		while ($rowf = mysqli_fetch_array($resultf)) {
			echo "{$rowf['Product_ID']} {$rowf['Product_name']}";
			echo "<br>";
		}

	?>
	</section>
</body>
</html>
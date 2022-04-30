<!DOCTYPE html>
<?php
include('navbar.php');
?>
<?php
	require_once "../../php/config.php";
	$sql = "SELECT SUM(Current_stock_level) FROM Product";
	$result1 = $conn->query($sql)->fetch_all(MYSQLI_NUM);
	$sql = "SELECT COUNT(Product_ID) FROM Product";
	$result2 = $conn->query($sql)->fetch_all(MYSQLI_NUM);
	$sql = "SELECT COUNT(Category_ID) FROM Category";
	$result3 = $conn->query($sql)->fetch_all(MYSQLI_NUM);
	
?>
<html>
<body>
<section class="dashboard">
		<div class="dash-content">
			<div class="overview">
				<div class="title">
					<i class='bx bx-coin'></i>
					<span class="text">Dashboard</span>
				</div>

				<div class="boxes">
					<div class="box box1">
					<i class='bx bxs-package'></i>
						<span class="text">Total Inventory</span>
						<span class="number"><?php echo $result1[0][0];?></span>
					</div>
					<div class="box box2">
					<i class='bx bxs-popsicle' ></i>
						<span class="text">Number of Current Products</span>
						<span class="number"><?php echo $result2[0][0];?></span>
					</div>
					<div class="box box3">
					<i class='bx bx-folder' ></i>
						<span class="text">Number of Current Categories</span>
						<span class="number"><?php echo $result3[0][0];?></span>
					</div>
				</div>
			</div>
	<!-- End Dashboard content -->
	<!-- Recent Activity Content Begins -->
	<!-- Recent Activity Content Ends -->
		</div>
	</section>
</body>
</html>
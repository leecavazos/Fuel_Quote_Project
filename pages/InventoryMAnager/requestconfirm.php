<?php
	require_once "../../php/config.php";
	echo "<br> New Request Added!<br>";

	$ID = $_GET['productID'];

	echo "<br>The ID is {$ID}<br>";

	$query1 = "SELECT Price, Current_stock_level, Restock_level FROM Product WHERE Product_ID = {$ID}";
	$result1 = mysqli_query($conn, $query1);
	$row1 = mysqli_fetch_assoc($result1);
	$price = $row1['Price'];
	$cstock = $row1['Current_stock_level'];
	$level = $row1['Restock_level'];
	$quant = $level - $cstock;

	echo "<br> Each @ {$price} <br>";

	$line_total = $price * $quant;

	echo "Your Request has been submitted <br> {$quant} items <br>for a total of $ {$line_total}";
	echo "<br> To be Restocked To {$level} <br>";

	$s = "INSERT INTO `Purchase Request` (Date, Requested_by, Amount) VALUES (CURDATE(), 4, {$line_total})";
	mysqli_query($conn, $s);

	echo "<br> The Item Request has been submitted to the database!<br>";

	$query2 = "SELECT Product_name FROM Product WHERE Product_ID = {$ID}";
	$result2 = mysqli_query($conn, $query2);
	$row2 = mysqli_fetch_assoc($result2);
	$pname = $row2['Product_name'];
	$pname = strval($pname);

	echo "The product that was selected is: '{$pname}' ";

	$d = "DELETE FROM `Log` WHERE `Name` = '{$pname}'";
	mysqli_query($conn, $d);
	echo "<br> The values being inserted into items requested are:{$quant},{$line_total} <br>";

	$query3 = "INSERT INTO `Items Requested` (Product_ID, Quantity) VALUES ({$ID},{$quant})";
	mysqli_query($conn, $query3);

	echo "For {$ID} and amount {$quant} with a total of {$line_total}<br>";

	$q = "UPDATE Product SET Current_stock_level = {$level} WHERE Product_ID = {$ID}";
	mysqli_query($conn, $q);
?>

	
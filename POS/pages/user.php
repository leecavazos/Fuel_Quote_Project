<!DOCTYPE html>
<?php
	include('../php/loginAction.php');
    require_once "../php/functions.php";
    require_once "../php/config.php";

    $UserId = $_SESSION['user_id'];
    $sql = "SELECT * FROM `User` WHERE User_ID = '$UserId'";
    $result = mysqli_query($conn, $sql) or die(mysqli_error($conn));
    $row=mysqli_fetch_assoc($result);
    $Addy=$row['Street_address'];
    $State=$row['State'];
    $Zip=$row['Zip'];
    $City=$row['City'];
   	if(isset($_POST['submit'])){
	   $UserId = $_SESSION['user_id'];
	   $User = $UserId;
       $St=$_POST['street'];
       $Ciudad=$_POST['city'];
       $Estado=$_POST['state'];
       $Zip=$_POST['zip'];
	   $Gal = $_POST['gallons'];
	   $Total = CalculateTotal($conn,$Gal,$User, $Estado);
	   $Date= $_POST['Fecha'];
	   $stmt = $conn->prepare("INSERT INTO `Order` (User_ID, Street_delivered_to, City_delivered_to, State_delivered_to, Zip_code_delivered_to, Gallons, Order_total, Date_of_purchase) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
	   $stmt->bind_param("isssssds",$User, $St, $Ciudad, $Estado, $Zip, $Gal, $Total, $Date);
	   $stmt->execute();
	   $Order_ID = $stmt->insert_id;
	   $stmt->close();
   	//    $sql="INSERT INTO `Order` (User_ID, Street_delivered_to, City_delivered_to, State_delivered_to, Zip_code_delivered_to, Order_total, Date_of_purchase)
    //    VALUES ($User, $St, $Ciudad, $Estado, $Zip, $Total, $Date)";
    //    $result=mysqli_query($conn,$sql);
    //    if($result){
    //        header('Location: user.php');
    //    }
    //    else{
    //        die(mysqli_error($conn));
    //    }
   	}

?>

<html lang="en">
<style>
            .input_box{
        border-radius: 5px;
        border: 2px solid;
        border-color: black;
	    padding: 20px; 
        width: 200px;
        height: 15px;    
    }
    .block {
        display: inline;
        width: 45%;
        border: none;
        border-radius: 5px;
        background-color: grey;
        color: white;
        padding: 14px 28px;
        cursor: pointer;
        text-align: center;
    	margin-top: 10px;
	}
</style>
<head>
    <meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Team 16</title>

	<!-- Link to css file -->
	<link rel="stylesheet" type="text/css" href="../css/main_page.css">
    <link rel="stylesheet" type="text/css" href="../css/user.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

	<link rel="icon" type="image/x-icon" href="../images/fuelpump.jpeg">
	<link href='https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css' rel='stylesheet'>
</head>

<body id="top">
	<header>
		<a href="">
			<img src="../images/fuelpump.jpeg">
		</a>
		<!-- Navbar Starts -->
		<nav>
			<ul>
				<li><a href="#top">Home</a></li>
				<li>
                    <div class="dropdown">
                        <a href="#" class="drop-btn">
                            Profile
                            <i class="fa fa-caret-down"></i>
                        </a>
                        <div class="dropdown-content">
                            <!-- <a href="#">Profile Management</a>  -->
                            <a href="accountDetails.php">Account Details</a>
                            <a href="../index.php">Log Out</a>
                        </div>
                    </div>
                </li>

				<li><a href="orderHistory.php">Quote History</a></li>

			</ul>
		</nav>
		<!-- Navbar End -->
	</header>
	
	<!-- Food Search Section Starts Here -->
	<section class="food-search text-center" style="background-image: url(../images/refinery.jpeg);">
		<span class="food-search">
		<h1 style="background-color: transparent;">Fuel Quote</h1>
			<!-- <form action="">
				<input type="search" name="search" placeholder="Search for Food">
				<input type="submit" name="submit" value="Search" class="btn btn-primary">
			</form> -->
		</span>
	</section>
	<!-- Food Search Section Ends Here -->

	<!-- Food Menu Section Starts Here -->
	<section class="menu" id="menu-section">
		<div class="container activity-data"style="overflow-x: hidden; background-color: #dfdfdf; border-radius: 15px;">
			<h2 class="text-center">Get A Fuel Quote</h2>
			<div class="menu-container">
				<form method="POST">
                    <div class="">
                        <label style="display: block;"> 
                            <span class="data-title">Gallons:</span>
                        </label>
                        <input type="text" class="input_box" inputmode="numeric" pattern="\d*" name="gallons" required>
                    </div>
                    <div class="">
                        <label style="display: block;">
                            <span class="data-title">Address:</span>
                        </label>
                        <input type="text" class="input_box" name="street" value="<?php echo $Addy;?>" readonly required>
                    </div>
                    <div class="">
						<label style="display: block;">
							<span class="data-title">City:</span> 
						</label>
                        <input type="text" class="input_box" name="city" value="<?php echo $City;?>" readonly required>
                    </div>
                    <div class="">
                        <label style="display: block;">
                            <span class="data-title">State:</span> 
                        </label>
                        <!-- <select name="state" id="State" selected="<?php echo $State;?>">
                            <option value="AL">Alabama</option>
                            <option value="AK">Alaska</option>
                            <option value="AZ">Arizona</option>
                            <option value="AR">Arkansas</option>
                            <option value="CA">California</option>
                            <option value="CO">Colorado</option>
                            <option value="CT">Connecticut</option>
                            <option value="DE">Delaware</option>
                            <option value="FL">Florida</option>
                            <option value="GA">Georgia</option>
                            <option value="HI">Hawaii</option>
                            <option value="ID">Idaho</option>
                            <option value="IL">Illinois</option>
                            <option value="IN">Indiana</option>
                            <option value="IA">Iowa</option>
                            <option value="KS">Kansas</option>
                            <option value="KY">Kentucky</option>
                            <option value="LA">Louisiana</option>
                            <option value="ME">Maine</option>
                            <option value="MD">Maryland</option>
                            <option value="MA">Massachusetts</option>
                            <option value="MI">Michigan</option>
                            <option value="MN">Minnesota</option>
                            <option value="MS">Mississippi</option>
                            <option value="MO">Missouri</option>
                            <option value="MT">Montana</option>
                            <option value="NE">Nebraska</option>
                            <option value="NV">Nevada</option>
                            <option value="NH">New Hampshire</option>
                            <option value="NJ">New Jersey</option>
                            <option value="NM">New Mexico</option>
                            <option value="NY">New York</option>
                            <option value="NC">North Carolina</option>
                            <option value="ND">North Dakota</option>
                            <option value="OH">Ohio</option>
                            <option value="OK">Oklahoma</option>
                            <option value="OR">Oregon</option>
                            <option value="PA">Pennsylvania</option>
                            <option value="RI">Rhode Island</option>
                            <option value="SC">South Carolina</option>
                            <option value="SD">South Dakota</option>
                            <option value="TN">Tennessee</option>
                            <option value="TX">Texas</option>
                            <option value="UT">Utah</option>
                            <option value="VT">Vermont</option>
                            <option value="VA">Virginia</option>
                            <option value="WA">Washington</option>
                            <option value="WV">West Virginia</option>
                            <option value="WI">Wisconsin</option>
                            <option value="WY">Wyoming</option>
                        </select> -->
                        <input type="text" class="input_box" name="state" value="<?php echo $State;?>" readonly required>
                    </div>
                    <div class="">
                        <label style="display: block;">
                            <span class="data-title">ZipCode:</span> 
                        </label>
                        <!-- <input type="text" class="input_box" name="zip" value="" required> -->
                        <input type="text" class="input_box" inputmode="numeric" pattern="\d*" name="zip" value="<?php echo $Zip;?>" readonly required>
                    </div>
                    <div class="">
                        <label style="display: block;">
                            <span class="data-title">Date:</span> 
                        </label>
                        <input type="date" class="input_box" name="Fecha" value="" required>
                    </div>
                    <button type="submit" class="block" name="submit">Generate</button>
                </form>
			</div>

		</div>
	</section>
</body>

<footer>
	<div class="footer-content text-center" style="margin-bottom: 10%">
		<p class="copyright">© Designed by <a href="#">Team 16 COSC 4353 Spring 2022</a>. All rights reserved.</p>
		<a href="#top">Go to top.</a>
	</div>
</footer>

</html>
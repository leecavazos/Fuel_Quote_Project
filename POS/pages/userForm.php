<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="../css/signup.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css" />
    <link rel="icon" type="image/x-icon" href="../images/logo.webp">
</head>

<header>
		<a href="../index.php">
			<img src="../images/logo.webp">
		</a>
		<!-- Navbar Starts -->
		<nav>
			<ul>
				<li><a href="../index.php">Return to Home</a></li>
			</ul>
		</nav>
		<!-- Navbar End -->
	</header>

<body>
    <div class="Form">
    <div class="head">
    <h1>Register</h1>
    <p>Please fill in this form to create an account.</p>
    </div>
    <hr>
    <form action="../php/signupAction.php" method="post">
        <div class="container">
            <div class="entry">
                <label for="First_name"><b>First name:</b></label>
                <input type="text" name="First_name" id="First_name" placeholder="Enter first name" required>
            </div>

            <div class="entry">
                <label for="Last_name"><b>Last name:</b></label>
                <input type="text" name="Last_name" id="Last_name" placeholder="Enter last name" required>
            </div>

            <div class="entry">
                <label for="Email"><b>Email</b></label>
                <input type="email" name="Email" id="Email" placeholder="Enter email" required>
            </div>

            <div class="entry">
                <label for="Phone_number"><b>Phone number:</b></label>
                <input type="text" name="Phone_number" id="Phone_number" placeholder="Enter phone number" >
            </div>

            <div class="entry">
                <label for="Street_address"><b>Street address:</b></label>
                <input type="text" name="Street_address" id="Street_address" placeholder="Enter street address" required>
            </div>

            <div class="entry">
                <label for="APT"><b>APT:</b></label>
                <input type="text" name="APT" id="APT" placeholder="Enter apartment number" >
            </div>

            <div class="entry">
                <label for="City"><b>City:</b></label>
                <input type="text" name="City" id="City" placeholder="Enter city" required>
            </div>

            <div class="entry">
                <label for="State"><b>State:</b></label>
                <input type="text" name="State" id="State" placeholder="Enter state" required>
            </div>

            <div class="entry">
                <label for="Zip"><b>Zipcode:</b></label>
                <input type="text" name="Zip" id="Zip" placeholder="Enter Zipcode" required>
            </div>

            <div class="entry">
                <label for="Username"><b>Username:</b></label>
                <input type="text" name="Username" id="Username" placeholder="Enter username" required>
            </div>

            <div class="entry">
                <label for="Password"><b>Password:</b></label>
                <input type="password" name="Password" id="Password" placeholder="Enter password" required>
            </div>
            <hr>
        </div>
        <?php
        if(isset($_GET["invalid"])) {
            if($_GET["invalid"] == "email") {
                echo "<style> .invalid {color: red; text-align: center;}</style><p class='invalid'> Email is already registered. Please enter a new one.</p>";
            }
            if($_GET["invalid"] == "username") {
                echo "<style> .invalid {color: red; text-align: center;}</style><p class='invalid'> Username already taken. Please enter a new one.</p>";
            }
        }
    ?>
        <button type="submit" class="registerbtn">Register</button>
    </form>
    </div>
</body>
<?php
    if(isset($_GET["created"])) {
        echo "<style> .success {font-size: larger; text-decoration: bold; text-align: center;}</style><p class='success'>Account successfully created! Please <a href=../pages/login.php>login</a>.</p>";
    }
?>

</html>

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
                <!-- <input type="select" name="State" id="State" placeholder="Enter state" required> -->
                <select name="State" id="State">
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
                </select>
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

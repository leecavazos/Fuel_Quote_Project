<!DOCTYPE html>
<?php
    include ('../php/loginAction.php');
?>
<html>
    <head>
        <title>Admin View</title>
        <meta charset="UTF-8">
	    <meta name="viewport" content="width=device-width, initial-scale=1">
        
        <link rel="stylesheet" type="text/css" href="../css/main_page.css">
        <link rel="stylesheet" type="text/css" href="../css/Admin.css">
        

    </head>
    <style>
        table {
            font-family: arial, sans-serif;
            border-collapse: collapse;
            width: 100%;
        }

        td, th {
            border: 2px solid black;
            text-align: left;
            padding: 8px;
        }

        tr:nth-child(even) {
        background-color: #dddddd;
        }
        /* The dropdown container */
        .dropdown {
            overflow: hidden;
        }

        /* Dropdown button */
        .dropdown .drop-btn {
            border: none;
            outline: none;
            padding: 14px 16px;
            background-color: inherit;
            font-family: inherit;
            margin: 0;
        }

        /* Dropdown content (hidden by default) */
        .dropdown-content {
            display: none;
            position: absolute;
            margin-left: 7%;
            background-color: #f9f9f9;
            /* min-width: 160px; */
            box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
            z-index: 1;
        }

        /* Links inside the dropdown */
        .dropdown-content a {
            /* float: none; */
            color: black;
            padding: 12px 16px;
            text-decoration: none;
            display: block;
            text-align: left;
        }

        /* Add a grey background color to dropdown links on hover */
        .dropdown-content a:hover {
            background-color: #ddd;
        }

        /* Show the dropdown menu on hover */
        .dropdown:hover .dropdown-content {
            display: block;
        }
    </style>
    <body id="top">
        <header>
            <a href="">
                <img src="../images/fuelpump.jpeg">
            </a>
            <nav>
			<ul>
				<li><a href="user.php">Home</a></li>
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
                <li><a href="#">Quote History</a></li>

			</ul>
		</nav>
        </header>
        <section>
        </section>
        <section class="food-search text-center">
            <span class="food-search">
                <!-- <form action="" method="POST">
                    <input type="search" name="search" placeholder="Order ID, Card Number, Date" class="text-left">
                    <input type="submit" name="submit" value="Go" class="btn btn-primary">
                    <input type="search" name="user" placeholder="User Lookup" style="width: 250px;" class="text-left">
                    <input type="submit" name="submit" value="Go" class="btn btn-primary">
                </form> -->
            </span>
        </section>
        <section>
            <div>
                <h2 style="margin-top: 10px;"> Stats:</h2>
                <table>
                    <tr>
                        <td>Total Number of Orders</td>
                        <td>Total Sales</td>
                    </tr>
                    <tr>
                        <?php
                            $UserId = $_SESSION['user_id'];
                            $sql = "SELECT * FROM `Order` WHERE User_ID = '$UserId'";
                            $sql2 = "SELECT sum(Order_total) as total from `Order` WHERE User_ID = '$UserId'";
                            $result = mysqli_query($conn, $sql) or die(mysqli_error($conn));
                            $res = mysqli_query($conn, $sql2) or die(mysqli_error($conn));
                            if($result){
                                $total=0;
                                while($row=mysqli_fetch_assoc($res)){
                                    $total = $row['total'];
                                }
                                $rowcount = mysqli_num_rows($result);
                                echo '<td>'.$rowcount.'</td><td> $'.$total.'</td>';
                            }
                        ?>
                    </tr>
                </table>
            </div>
            <div>
                <h2 style="margin-top: 10px;"> Orders:</h2>
                <div style="border: 3px solid rgb(0, 0, 0) ; background-color: rgb(233, 233, 233); height: 900px;">
                    <table>
                        <tr>
                            <td>Order_ID</td>
                            <td>Street Address</td>
                            <td>City</td>
                            <td>State</td>
                            <td>Zip</td>
                            <td>Gallons</td>
                            <td>Total</td>
                            <td>D.O.P</td>
                        </tr>
                        <tr>
                        <?php
                            $sql = "SELECT * FROM `Order` WHERE User_ID = '$UserId'";
                            $result = mysqli_query($conn, $sql) or die(mysqli_error($conn));
                            while($row = mysqli_fetch_assoc($result)){
                                $id=$row['Order_ID'];
                                $Street=$row['Street_delivered_to'];
                                $City=$row['City_delivered_to'];
                                $State=$row['State_delivered_to'];
                                $Zip =$row['Zip_code_delivered_to'];
                                $Gal = $row['Gallons'];
                                $Total=$row['Order_total'];
                                $DOP=$row['Date_of_purchase'];
                                echo '<td>'.$id.'</td> <td>'.$Street.'</td> <td>'.$City.'</td> 
                                <td>'.$State.'</td> <td>'.$Zip.'</td>
                                <td>'.$Gal.'</td> <td>'.$Total.'</td> <td>'.$DOP.'</tr>';
                            }
                        ?>
                    </table>
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
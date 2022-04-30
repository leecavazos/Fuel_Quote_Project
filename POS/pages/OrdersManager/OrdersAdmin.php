<!DOCTYPE html>
<?php
    include ('../../php/AdminloginAction.php');
?>
<html>
    <head>
        <title>Admin View</title>
        <meta charset="UTF-8">
	    <meta name="viewport" content="width=device-width, initial-scale=1">
        
        <link rel="stylesheet" type="text/css" href="../../css/main_page.css">
        <link rel="stylesheet" type="text/css" href="../../css/Admin.css">

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
    </style>
    <body id="top">
        <header>
            <a href="">
                <img src="../../images/logo.webp">
            </a>
            <nav> 
                <ul>
                    <li><a href=""> Account</a></li>
                    <li><a href="../../index.php"> Logout</a></li>
                </ul>
            </nav>
        </header>
        <section>
            <h1 class="text-left">
                Welcome!
            </h1>
        </section>
        <section class="food-search text-center">
            <span class="food-search">
                <form action="" method="POST">
                    <input type="search" name="search" placeholder="Order ID, Card Number, Date" class="text-left">
                    <input type="submit" name="submit" value="Go" class="btn btn-primary">
                    <input type="search" name="user" placeholder="User Lookup" style="width: 250px;" class="text-left">
                    <input type="submit" name="submit" value="Go" class="btn btn-primary">
                </form>
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
                            $sql = "SELECT * FROM `Order`";
                            $sql2 = "SELECT sum(Order_total) as total from `Order`";
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
                            <td>Purchase_ID</td>
                            <td>Street Address</td>
                            <td>City</td>
                            <td>State</td>
                            <td>Zip</td>
                            <td>Card_type</td>
                            <td>Card_Num</td>
                            <td>Total</td>
                            <td>D.O.P</td>
                            <td>Operations</td>
                        </tr>
                        <tr>
                        <?php
                            if (isset($_POST['submit'])) {
                                $Input = validate($_POST['search']);

                                $sql = "SELECT * FROM `Order` WHERE Order_ID='$Input' OR Last_4_digits='$Input' OR Date_of_purchase = '$Input'";
                                $result = mysqli_query($conn, $sql) or die(mysqli_error($conn));
                                while($row = mysqli_fetch_array($result)){
                                    $id=$row['Order_ID'];
                                    $PID=$row['User_ID'];
                                    $Street=$row['Street_delivered_to'];
                                    $City=$row['City_delivered_to'];
                                    $State=$row['State_delivered_to'];
                                    $Zip =$row['Zip_code_delivered_to'];
                                    $Card =$row['Card_type'];
                                    $Card_num= $row['Last_4_digits'];
                                    $Total=$row['Order_total'];
                                    $DOP=$row['Date_of_purchase'];
                                    echo '<td>'.$id.'</td> <td>'.$PID.'</td> <td>'.$Street.'</td> <td>'.$City.'</td> 
                                    <td>'.$State.'</td> <td>'.$Zip.'</td> <td>'.$Card.'</td> <td>'.$Card_num.'</td>
                                    <td>'.$Total.'</td> <td>'.$DOP.'</td> <td>
                                    <a href="../../php/EditOrder.php?editOrder='.$id.'">Edit</a>
                                    <a href="../../php/DeleteOrder.php?deleteOrder='.$id.'"> Delete</a></td></tr>';
                                }
                            }
                            if (isset($_POST['submit'])) {
                                $User = validate($_POST['user']);

                                $sql = "SELECT * FROM `Order` WHERE Purchaser_ID='$User'";
                                $result = mysqli_query($conn, $sql) or die(mysqli_error($conn));
                                while($row = mysqli_fetch_assoc($result)){
                                    $id=$row['Order_ID'];
                                    $PID=$row['User_ID'];
                                    $Street=$row['Street_delivered_to'];
                                    $City=$row['City_delivered_to'];
                                    $State=$row['State_delivered_to'];
                                    $Zip =$row['Zip_code_delivered_to'];
                                    $Card =$row['Card_type'];
                                    $Card_num= $row['Last_4_digits'];
                                    $Total=$row['Order_total'];
                                    $DOP=$row['Date_of_purchase'];
                                    echo '<td>'.$id.'</td> <td>'.$PID.'</td> <td>'.$Street.'</td> <td>'.$City.'</td> 
                                    <td>'.$State.'</td> <td>'.$Zip.'</td> <td>'.$Card.'</td> <td>'.$Card_num.'</td>
                                    <td>'.$Total.'</td> <td>'.$DOP.'</td> <td>
                                    <a href="../../php/EditOrder.php?editOrder='.$id.'">Edit</a>
                                    <a href="../../php/DeleteOrder.php?deleteOrder='.$id.'"> Delete</a></td></tr>';
                                }
                            }
                            else{
                                $sql = "SELECT * FROM `Order`";
                                $result = mysqli_query($conn, $sql) or die(mysqli_error($conn));
                                while($row = mysqli_fetch_assoc($result)){
                                    $id=$row['Order_ID'];
                                    $PID=$row['User_ID'];
                                    $Street=$row['Street_delivered_to'];
                                    $City=$row['City_delivered_to'];
                                    $State=$row['State_delivered_to'];
                                    $Zip =$row['Zip_code_delivered_to'];
                                    $Card =$row['Card_type'];
                                    $Card_num= $row['Last_4_digits'];
                                    $Total=$row['Order_total'];
                                    $DOP=$row['Date_of_purchase'];
                                    echo '<td>'.$id.'</td> <td>'.$PID.'</td> <td>'.$Street.'</td> <td>'.$City.'</td> 
                                    <td>'.$State.'</td> <td>'.$Zip.'</td> <td>'.$Card.'</td> <td>'.$Card_num.'</td>
                                    <td>'.$Total.'</td> <td>'.$DOP.'</td> <td>
                                    <a href="../../php/EditOrder.php?editOrder='.$id.'">Edit</a>
                                    <a href="../../php/DeleteOrder.php?deleteOrder='.$id.'"> Delete</a></td></tr>';
                                }
                            }
                        ?>
                    </table>
                </div>
            </div>
            
        </section>
    </body>
    <footer>
        <div class="footer-content text-center" style="margin-bottom: 10%">
            <p class="copyright">© Designed by <a href="#">Team 5 COSC 3380 Spring 2022</a>. All rights reserved.</p>
            <a href="#top">Go to top.</a>
        </div>
    </footer>
</html>
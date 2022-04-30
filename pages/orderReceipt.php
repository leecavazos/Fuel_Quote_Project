<?php
    require_once '../php/config.php';
    include_once '../php/loginAction.php';
    $User_ID = $_SESSION['user_id'];
    $oid = $_GET['orderID'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="../css/orderReceipt.css">

    <link rel="icon" type="image/x-icon" href="https://cdn-icons-png.flaticon.com/512/314/314470.png">

    <title>Order <?php echo $oid; ?> Receipt</title>
</head>
<body>
    <div class="container">
        <div class="row" style="display: flex; justify-content: center">
            <!-- BEGIN RECEIPT -->
            <div class="col-xs-12">
                <div class="grid invoice">
                    <div class="grid-body">
                        <div class="invoice-title">
                            <div class="row">
                                <h1>Team 5 Store</h1>
                            </div>
                            <br>
                            <div class="row">
                                <div class="col-xs-12">
                                    <h2>Receipt<br>
                                    <span class="small">Order #<?php echo $oid; ?></span></h2>
                                </div>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-xs-6">
                                <address>
                                    <strong>Shipping Address:</strong><br>
                                    <?php
                                        $sql = "SELECT First_name, Last_name, Email, Phone_number, Street_address, APT, City, State, Zip
                                                FROM `User` WHERE User_ID = $User_ID;";
                                        $result = mysqli_query($conn, $sql) or die(mysqli_error);
                                        $row = mysqli_fetch_array($result);
                                        echo $row['First_name'] . ' ' . $row['Last_name'] . '<br>';
                                        echo $row['Street_address'] . ', ';

                                        if ($row['APT']) echo 'Apt ' . $row['APT'] . '<br>';
                                        echo $row['City'] . ', ' . $row['State'] . ' ' . $row['Zip'] . '<br>';

                                        echo $row['Email'];
                                        if ($row['Phone_number']) echo '<p title="Phone">Phone: '.$row['Phone_number'].'</p>';
                                    ?>
                                </address>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xs-6">
                                <address>
                                    <strong>Payment Method:</strong><br>
                                    <?php
                                        $sql = "SELECT Card_type, Last_4_digits FROM `Order` WHERE Order_ID = $oid";
                                        $result = mysqli_query($conn, $sql) or die(mysqli_error);
                                        $row = mysqli_fetch_array($result);
                                        echo $row['Card_type'] . ' ending *****' . $row['Last_4_digits'] . '<br>';
                                    ?>
                                </address>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xs-6">
                                <address>
                                    <strong>Order Date:</strong><br>
                                    <?php
                                        $sql = "SELECT Date_of_purchase FROM `Order` WHERE Order_ID = $oid";
                                        $result = mysqli_query($conn, $sql) or die(mysqli_error);
                                        $row = mysqli_fetch_array($result);
                                        echo $row['Date_of_purchase'] .'<br>';
                                    ?>
                                </address>
                            </div>
                        </div>
                        
                        <!-- ORDER SUMMARY -->
                        <div class="row">
                            <div class="col-md-12">
                                <h3>ORDER SUMMARY</h3>
                                <table class="table table-striped">
                                    <thead>
                                        <tr class="line">
                                            <td class="text-center"><strong>ITEM</strong></td>
                                            <td class="text-center"><strong>QUANTITY</strong></td>
                                            <td class="text-right"><strong>SUBTOTAL</strong></td>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                            $sql = "SELECT Product_ID FROM `Line Item` WHERE Order_ID = $oid";
                                            $result = mysqli_query($conn, $sql) or die(mysqli_error);
                                            while($row = mysqli_fetch_array($result)) {
                                                // Get all the product ids
                                                $pid = $row['Product_ID'];
                                                
                                                // Get line item details
                                                $sql1 = "SELECT Product_name, Quantity, Line_total
                                                            FROM `Line Item` as l
                                                            INNER JOIN `Product` as p ON p.Product_ID = l.Product_ID
                                                            WHERE l.Product_ID = $pid AND l.Order_ID = $oid";
                                                $result1 = mysqli_query($conn,$sql1) or die(mysqli_error);
                                                $row1 = mysqli_fetch_array($result1);

                                                $Product_name = $row1['Product_name'];
                                                $Quantity = $row1['Quantity'];
                                                $LineTotal =$row1['Line_total'];
                                                echo '
                                                    <tr>
                                                        <td class="text-center">'.$Product_name.'</td>
                                                        <td class="text-center">'.$Quantity.'</td>
                                                        <td class="text-right">$'.$LineTotal.'</td>
                                                        </tr>
                                                        ';
                                            };

                                        ?>

                                        <tr>
                                            <td colspan="1">
                                            <td class="text-right"><strong>Taxes</strong></td>
                                            <td class="text-right"><strong>N/A</strong></td>
                                        </tr>
                                        <tr>
                                            <td colspan="1">
                                            </td><td class="text-right"><strong>Total</strong></td>
                                            <?php
                                                $sql = "SELECT Order_total FROM `Order` WHERE Order_ID = $oid";
                                                $result = mysqli_query($conn, $sql) or die(mysqli_error);
                                                $row = mysqli_fetch_array($result);
                                                echo '<td class="text-right"><strong>$'.$row['Order_total'].'</strong></td>';
                                            ?>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>									
                        </div>

                        <!-- ENDING -->
                        <div class="row">
                            <div class="col-md-12 text-center identity">
                                <strong>Thank you for your purchase!</strong><br>
                                <strong>Yours sincerely,<br><strong>Team 5 Store</strong></strong>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- END RECEIPT -->
        </div>
    </div>
</body>
</html>
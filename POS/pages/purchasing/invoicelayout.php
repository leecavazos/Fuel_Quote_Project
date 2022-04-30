<?php
    include '../../php/config.php';
    $query = "SELECT * FROM Invoice WHERE Invoice_ID = {$_GET['invoiceID']}";
    $result = mysqli_query($conn, $query);
    $row = mysqli_fetch_assoc($result);
    $requestID =  $row['Request_ID'];
    // echo "{$requestID}<br>";
    $query2 = "SELECT Product_ID, Quantity FROM `Items Requested` WHERE Request_ID = $requestID";
    $result2 = mysqli_query($conn,$query2);
    $row2 = mysqli_fetch_assoc($result2);
    
    // echo "{$row2['Quantity']}";
    ?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
    <!-- Custom Style -->
    <link rel="stylesheet" href="../../css/invstyle.css">

    <title>Invoice</title>
</head>

<body>
    <div class="my-5 page" size="A4">
        <div class="p-5">
            <section class="top-content bb d-flex justify-content-between">
                <div class="logo">
                    <img src="#" alt="" class="img-fluid">
                </div>
                <div class="top-left">
                    <div class="graphic-path">
                        <p>Invoice</p>
                    </div>
                    <div class="position-relative">
                        <p>Invoice ID. <span><?php echo "{$_GET['invoiceID']}" ?></span></p>
                    </div>
                </div>
            </section>
            <section class="store-user mt-5">
                <div class="col-10">
                    <div class="row bb pb-3">
                        <div class="col-7">
                            <p>Supplier,</p>
                            <h2>Team 5 Supplies</h2>
                            <p class="address"> 555 Money Avenue, <br> Golden Hills TX, 77077 </p>
                            <!-- <div class="txn mt-2">TXN: XXXXXXX</div> -->
                        </div>
                        <div class="col-5">
                            <p>Client,</p>
                            <h2>Team 5 Store</h2>
                            <p class="address"> 1111 Winning Avenue, <br> Businessmen Heroes TX, 77011 </p>
                            <!-- <div class="txn mt-2">TXN: XXXXXXX</div> -->
                        </div>
                    </div>
                    <div class="row extra-info pt-3">
                        <div class="col-7">
                            <p>Payment Method: <span>Company Cash</span></p>
                            <p>Invoice ID: <span><?php echo "{$_GET['invoiceID']}" ?></span></p>
                        </div>
                        <div class="col-5">
                            <p>Approval Date: <span><?php echo "{$row['Generated_on']}" ?></span></p>
                        </div>
                    </div>
                </div>
            </section>
            <section class="product-area mt-4">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <td>Item ID</td>
                            <td>Price</td>
                            <td>Quantity</td>
                            <td>Total</td>
                        </tr>
                    </thead>
                    <tbody>
                        <?php

                        $query3 = "SELECT `Items Requested`.Product_ID, `Items Requested`.Quantity, `Product`.Price

                                    FROM `Items Requested`

                                    INNER JOIN `Product`  ON  `Items Requested`.Product_ID = `Product`.Product_ID AND `Items Requested`.Request_ID = {$requestID};";
                        
                        $result3 = mysqli_query($conn,$query3);
                        $i = 0;
                        $total = array();
                        while($row3 = mysqli_fetch_assoc($result3)){
                            $line = ((int)$row3['Quantity'] * (float)$row3['Price']);
                            $total[$i] = $line;
                            $pid = $row3['Product_ID'];
                            $price = $row3['Price'];
                            echo "<tr>";
                            echo "<td>$pid</td>";
                            echo "<td>$price</td>";
                            echo "<td>{$row3['Quantity']}</td>";
                            echo "<td>{$line}</td>";
                            echo "</tr>";
                            $i++;
                        }

                        $arrlength = count($total);
                        $sum = 0;
                        for($x=0; $x<$arrlength; $x++){
                            $sum = $sum + $total[$x];
                        }
                        
                        $money = $sum;
                        ?>
                    </tbody>
                </table>
            </section>

            <section class="balance-info">
                <div class="row">
                    
                    <div class="col-4">
                        <table class="table border-0 table-hover">
                            <?php 

                            echo "<tr>";
                            echo "<td>Total</td>";
                            echo "<td>{$money}</td>";
                            echo "</tr>";
                            
                            ?>
                            <tr>
                                <td>Tax:</td>
                                <td>$0</td>
                            </tr>
                            <tfoot>
                                <tr>
                                    <td>Total:</td>
                                    <td><?php echo "{$money}"; ?></td>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </section>

            <!-- Cart Image -->
            <img src="../../images/cart.jpeg" class="img-fluid cart-bg" alt="">

        </div>
    </div>


</body>
</html>



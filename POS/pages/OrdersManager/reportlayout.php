<?php
 
    include '../../php/config.php';
    session_start();
    $query = "SELECT SUM(Order_total) as total from `Order`";
    $result = mysqli_query($conn, $query);
    $row = mysqli_fetch_assoc($result);
    // $requestID =  $row['Request_ID'];
    // echo "{$Date}<br>";
    // $query2 = "SELECT Product_ID, Quantity FROM `Items Requested` WHERE Request_ID = '$requestID'";
    // $result2 = mysqli_query($conn,$query2);
    // $row2 = mysqli_fetch_assoc($result2);
    
    // echo "{$row2['Quantity']}";
    ?>

<!doctype html>
<html lang="en">
  <head>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.js"></script>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
    <!-- Custom Style -->
    <link rel="stylesheet" href="../../css/invstyle.css">

    <title>Sales</title>
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
                        <p>Sales</p>
                    </div>
                    <div class="position-relative">
                        <p>Stats <span><?php echo "{$_GET['search']}" ?></span></p>
                    </div>
                </div>
            </section>
            <section class="store-user mt-5">
                <div class="col-10">
                    <!-- <div class="row bb pb-3">
                        <div class="col-7">
                            <p>Supplier,</p>
                            <h2>Team 5 Supplies</h2>
                            <p class="address"> 555 Money Avenue, <br> Golden Hills TX, 77077 </p>
                        </div>
                        <div class="col-5">
                            <p>Client,</p>
                            <h2>Team 5 Store</h2>
                            <p class="address"> 1111 Winning Avenue, <br> Businessmen Heroes TX, 77011 </p>
                        </div>
                    </div> -->
                    <div class="row extra-info pt-3">
                        <div class="col-7">
                            <!-- <p>Most popular Item: 
                                <span>
                                <?php
                                $sql = "SELECT Product_ID, MAX(Quatity) FROM(
                                SELECT Product_ID, SUM(Quantity) FROM `Line Item`) group by Product_ID;" ;
                                $result = mysqli_query($conn, $sql);
                                $row = mysqli_fetch_assoc($result);
                                $PID = $row['Product_ID'];
                                echo $PID;
                                ?>
                                </span>
                            </p> -->
                            <p>Manager: <span><?php echo $_SESSION['login_user'] ?></span></p>
                        </div>
                        <div class="col-5">
                            <p>Date of Report: <span>04/26/2022</span></p>
                        </div>
                    </div>
                </div>
            </section>
            <section class="balance-info">
                <div style="display: block">
                    <canvas id="myChart" style="width:100%;max-width:450px"></canvas>
                    <br>
                    <br>
                    <canvas id="myBar" style="width:100%;max-width:450px"></canvas>
                </div>
            <?php
                $sql = "SELECT Product_name, `Line Item`.Product_ID, SUM(Quantity) FROM newPOS.`Line Item`, newPOS.`Product` Where `Line Item`.Product_ID = `Product`.Product_ID group by Product_ID";
                $sql2 = "SELECT COUNT(MONTH(Date_of_purchase)), MONTHNAME(Date_of_purchase) FROM newPOS.`Order` group by MONTHNAME(Date_of_purchase)";
                
                $result = mysqli_query($conn, $sql);
                $result9 = mysqli_query($conn, $sql2);
                $sampleArrayID = array();
                $sampleArrayQ = array();
                $sampleArrayDate = array();
                $sampleArrayMonth = array();
                while($row = mysqli_fetch_assoc($result)){
                    $Product = $row['Product_name'];
                    $Quant = $row['SUM(Quantity)'];
                    array_push($sampleArrayID,$Product);
                    array_push($sampleArrayQ, $Quant);
                }   
                while($row2 = mysqli_fetch_assoc($result9)){
                    $Dates = $row2['COUNT(MONTH(Date_of_purchase))'];
                    $Months = $row2['MONTHNAME(Date_of_purchase)'];
                    array_push($sampleArrayMonth, $Months);
                    array_push($sampleArrayDate,$Dates);
                }
            ?>
            <script>
                var xValues = <?php echo json_encode($sampleArrayID); ?>;
                var yValues = <?php echo json_encode($sampleArrayQ); ?>;

                var x = <?php echo json_encode($sampleArrayMonth); ?>;
                var y = <?php echo json_encode($sampleArrayDate); ?>;
                var barColors = [
                "#b91d47",
                "#00aba9",
                "#2b5797",
                "#e8c3b9",
                "#1e7145",
                "#a900ab",
                "#aba900"
                ];

                new Chart("myChart", {
                type: "pie",
                data: {
                    labels: xValues,
                    datasets: [{
                    backgroundColor: barColors,
                    data: yValues
                    }]
                },
                options: {
                    title: {
                    display: true,
                    text: "Most Sold Product(Product_ID):"
                    }
                }
                });

                new Chart("myBar", {
                type: "line",
                data: {
                    labels: x,
                    datasets: [{
                    fill: false,
                    backgroundColor: "rgba(0,0,0,1.0)",
                    borderColor: "rgba(0,0,0,0.1)",
                    data: y
                    }]
                },
                options: {
                    legend: {display: false},
                    title: {
                    display: true,
                    text: "Orders Place By Month"
                    },
                    scales: {
                    yAxes: [{ticks: {min: 0, max:16}}],
                    }
                }
                });
            </script>
                <div class="row">
                    <div class="col-4" style="margin-top: 50px;">
                        <table class="table border-0 table-hover">
                            <?php 
                            $sql = "SELECT * FROM `Order`";
                            $result = mysqli_query($conn, $sql);
                            $rowcount = mysqli_num_rows($result);
                            echo "<tr>";
                            echo "<td>Total Orders</td>";
                            echo "<td>{$rowcount}</td>";
                            echo "</tr>";
                            
                            ?>
                            <tr>
                                <?php
                                $sql = "SELECT * FROM `User`";
                                $result = mysqli_query($conn, $sql);
                                $rowcount = mysqli_num_rows($result);
                                ?>
                                <td>Total Num Of Users:</td>
                                <td><?php echo "{$rowcount}"; ?></td>
                            </tr>
                            <tfoot>
                                <tr>
                                    <td>Total Sales:</td>
                                    <?php
                                    $sql = "SELECT SUM(Order_total) as total from `Order`";
                                    $result1 = $conn->query($sql)->fetch_all(MYSQLI_NUM);
                                    ?>
                                    <td><?php echo "{$result1[0][0]}"; ?></td>
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



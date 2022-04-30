<!DOCTYPE html>
<?php
include('../php/loginAction.php');
?>

<?php
    require_once "../php/config.php";
    $User_ID = $_SESSION['user_id'];
    $sql = "SELECT First_name, Last_name, Email, Phone_number, Street_address, APT, City, State, Zip, Username FROM `User` WHERE User_ID = ?;";
    $stmt = mysqli_stmt_init($conn);
    mysqli_stmt_prepare($stmt, $sql);
    mysqli_stmt_bind_param($stmt, "i", $User_ID);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    $row = mysqli_fetch_assoc($result);
    mysqli_free_result($result);

    $sql = "SELECT p.Product_ID, Product_name, Price, Quantity, Product_image FROM `Cart Item` AS c, `Product` AS p WHERE User_ID = ? AND p.Product_ID = c.Product_ID;";
    $stmt = mysqli_stmt_init($conn);
    mysqli_stmt_prepare($stmt, $sql);
    mysqli_stmt_bind_param($stmt, "i", $User_ID);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    $results = mysqli_fetch_all($result, MYSQLI_ASSOC);
?>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>POS Team 5</title>
    <link rel="stylesheet" type="text/css" href="../css/user.css">
    <link rel="stylesheet" type="text/css" href="../css/checkout.css?v1.2">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <link rel="icon" type="image/x-icon" href="../images/logo.webp">
    <script src="https://unpkg.com/boxicons@2.1.2/dist/boxicons.js"></script>
</head>

<header>
    <a href="user.php">
        <img src="../images/logo.webp">
    </a>
    <!-- Navbar Starts -->
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
                        <!-- <a href="#">Profile Management</a> -->
                        <a href="accountDetails.php">Account Details</a>
                        <a href="../index.php">Log Out</a>
                    </div>
                </div>
            </li>

            <li><a href="orderHistory.php">Orders History</a></li>
            <li><a href="checkout.php">Cart</a></li>

            <!-- Go back to the previous page -->
            <li><a href="user.php#menu-section" class="order-btn btn btn-primary">Order Now</a></li>
        </ul>
    </nav>
    <!-- Navbar End -->
</header>

<body style="margin-top: 10%">
    <div class="grid-container">
        <div class="grid-item info">
            <h2>Delivery to:</h2>
            <p style="padding: 5px"><?php echo $row['First_name'] . ' ' . $row['Last_name'] . ' - ' . $row['Street_address'] . ', ';
                                    if ($row['APT']) {
                                        echo 'Apt ' .$row['APT'] . ', ';
                                    }
                                    echo $row['City'] . ', ' . $row['State'] .' '. $row['Zip'] ?></p>
            <a href="accountDetails.php"><button class="change">Change Information</button></a>
        </div>
        <div class="grid-item cartInfo">
            <p><span class="cart">Your cart</span><span id="cartItems"></span></p>
            <hr>
            <?php foreach ($results as $row2) {
                echo '<div class="grid-container2">
                    <div class="grid-item2">
                    <img src="../images/'.$row2['Product_image'].'" class="item-img img-responsive">
                    </div>
                    <div class="grid-item2">
                        <div class="itemName">' . $row2['Product_name'] . '</div>
                    </div>
                    <div class="grid-item2">
                        <div class="price"><input type="number" min="0" max="10" value="' . $row2['Quantity'] . '" class="quantityInput" onchange="calculateTotal()"> x $' . $row2['Price'] . '<input type="hidden" class="iprice" value="' . $row2['Price'] . '"></div>
                    </div>
                </div>
                <hr>';
            } ?>
            <p><span class="total">Total</span><span class="amount" id="gtotal"></span></p>
            <a href="../php/clearCartAction.php?id=<?php echo $User_ID?>"><button class="clear">Clear Cart</button></a>
        </div>
        
        <div class="grid-item paymentInfo">
            <p class="pay">Payment Information</p>
            <form action="../php/checkoutAction.php" method="POST">
                <label for="CardName">Name on card</label>
                <input type="text" id="CardName" name="CardName" placeholder="John Smith" class="payInput" required>
                <label for="Card_type">Card type:</label>
                <select name="Card_type" id="Card_type" class="payInput">
                    <option value="Visa">Visa</option>
                    <option value="Mastercard">Mastercard</option>
                    <option value="Discover">Discover</option>
                    <option value="AMEX">AMEX</option>
                </select>
                <label for="CardNumber">Credit card number</label>
                <input type="text" id="CardNumber" name="CardNumber" placeholder="1111-2222-3333-4444" class="payInput" required>
                <label for="ExpDate">Expiration Date</label>
                <input type="text" id="ExpDate" name="ExpDate" placeholder="01/11" class="payInput" required>
                <label for="CVV">CVV</label>
                <input type="text" id="CVV" name="CVV" placeholder="123" maxlength="3" class="payInput" required>
                <input type="hidden" name="User_ID" value="<?= $_SESSION['user_id'] ?>">
                <input type="hidden" name="Street_delivered_to" value="<?php echo $row['Street_address'] ?>">
                <input type="hidden" name="APT_delivered_to" value="<?= $row['APT'] ?>">
                <input type="hidden" name="City_delivered_to" value="<?= $row['City'] ?>">
                <input type="hidden" name="State_delivered_to" value="<?= $row['State'] ?>">
                <input type="hidden" name="Zip_code_delivered_to" value="<?= $row['Zip'] ?>">
                <input type="hidden" name="Order_total" id="Order_total">
                <?php
                $num = 0;
                foreach($results as $row) {
                    $lineItem = "lineItem" . $num;
                    echo "<input type='hidden' name='{$lineItem}' id='{$lineItem}'>";
                    $num = $num + 1;
                }
                $num = 0;
                foreach($results as $row) {
                    $lineID = "lineID" . $num;
                    echo "<input type='hidden' name='{$lineID}' value={$row['Product_ID']}>";
                    $num = $num + 1;
                }
                $num = 0;
                foreach($results as $row) {
                    $linePrice = "linePrice" . $num;
                    echo "<input type='hidden' name='{$linePrice}' value={$row['Price']}>";
                    $num = $num + 1;
                }
                echo "<input type='hidden' name='numProducts' value='{$num}'>";
                ?>
                <button type="submit" class="checkout">Checkout</button>
            </form>
        </div>
    </div>
    <?php
    if(isset($_GET["success"])) {
        if($_GET["success"] == "order")
        echo "<style> .success {margin-top: 5%; font-size: larger; font-weight: 600; text-align: center; color: #04AA6D;}</style><p class='success'>Order successfully made!</p>";
    }
    if(isset($_GET["success"])) {
        if($_GET["success"] == "clear")
        echo "<style> .success {margin-top: 5%; font-size: larger; font-weight: 600; text-align: center; color: #04AA6D;}</style><p class='success'>Cart has successfully been cleared!</p>";
    }
?>

    <script type="text/javascript">
        document.addEventListener('DOMContentLoaded', calculateTotal);

        function calculateTotal() {
            var iquantity = document.getElementsByClassName("quantityInput");
            var iprice = document.getElementsByClassName("iprice");
            var total = 0;
            var totalQuantity = 0;
            for (var i = 0; i < iquantity.length; i++) {
                if (parseInt(iquantity[i].value)) {
                    total += parseInt(iquantity[i].value) * parseFloat(iprice[i].value);
                    totalQuantity += parseInt(iquantity[i].value);
                }
                document.getElementById("lineItem" + i).value = iquantity[i].value;
            }
            document.getElementById('Order_total').value = total;
            document.getElementById('gtotal').innerHTML = "$" + total.toFixed(2);

            document.getElementById('cartItems').innerHTML = "<box-icon name='cart' style='margin-right: 5px; padding-top: 3px;'></box-icon>" + totalQuantity + " items";
        }
    </script>
</body>

</html>
<?php
require_once "config.php";
$User_ID = $_POST['User_ID'];
$Street_delivered_to = $_POST['Street_delivered_to'];
$APT_delivered_to = $_POST['APT_delivered_to'];
$City_delivered_to = $_POST['City_delivered_to'];
$State_delivered_to = $_POST['State_delivered_to'];
$Zip_code_delivered_to = $_POST['Zip_code_delivered_to'];
$Card_type = $_POST['Card_type'];
$Last_4_digits = substr($_POST['CardNumber'], -4, 4);
$Order_total = $_POST['Order_total'];
$Date_of_purchase = date('Y-m-d');
$numProducts = $_POST['numProducts'];

$stmt = $conn->prepare("INSERT INTO `Order` (User_ID, Street_delivered_to, APT_delivered_to, City_delivered_to, State_delivered_to, Zip_code_delivered_to, Card_type, Last_4_digits, Order_total, Date_of_purchase) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
$stmt->bind_param("isssssssds", $User_ID, $Street_delivered_to, $APT_delivered_to, $City_delivered_to, $State_delivered_to, $Zip_code_delivered_to, $Card_type, $Last_4_digits, $Order_total, $Date_of_purchase);
$stmt->execute();
$Order_ID = $stmt->insert_id;
$stmt->close();

$stmt = $conn->prepare("DELETE FROM `Cart Item` WHERE User_ID = ?");
$stmt->bind_param("i", $User_ID);
$stmt->execute();
$stmt->close();

for($i = 0; $i <= $numProducts - 1; $i++) {
    $str = "lineItem" . $i;
    $Quantity = $_POST[$str];
    if($Quantity == 0) {
        continue;
    }
    $str = "linePrice" . $i;
    $Price = $_POST[$str];
    $str = "lineID" . $i;
    $Product_ID = $_POST[$str];
    $stmt = $conn->prepare("INSERT INTO `Line Item` (Order_ID, Product_ID, Quantity, Price) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("iiid", $Order_ID, $Product_ID, $Quantity, $Price);
    $stmt->execute();
    $stmt->close();

    $stmt = $conn->prepare("UPDATE Product SET Current_stock_level = Current_stock_level - ? WHERE Product_ID = ?;");
    $stmt->bind_param("ii", $Quantity, $Product_ID);
    $stmt->execute();
    $stmt->close();
}

$conn->close();
header("location: ../pages/checkout.php?success=order");


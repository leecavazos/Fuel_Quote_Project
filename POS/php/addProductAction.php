<?php 
    require_once "config.php";
    require_once 'functions.php';

    $Product_name = $_POST['Product_name'];
    $Price = $_POST['Price'];
    $Category_ID = $_POST['Category'];
    $Available_for_purchase = $_POST['Availability'];
    $Current_stock_level = $_POST['Current_stock_level'];
    $Threshold_level = $_POST['Threshold_level'];
    $Restock_level = $_POST['Restock_level'];
    $target = "../images/".basename($_FILES['Product_image']['name']);
    $Product_image = $_FILES['Product_image']['name'];

    if(productExists($conn, $Product_name) !== false) {
        header("location: ../pages/InventoryMAnager/product.php?invalid=product");
        exit();
    }

    $stmt = $conn->prepare("INSERT INTO Product (Product_name, Price, Category_ID, Available_for_purchase, Current_stock_level, Threshold_level, Restock_level, Product_image) VALUES (?, ?, ?, ?, ?, ?, ?,?)");
    $stmt->bind_param("sdiiiiis", $Product_name, $Price, $Category_ID, $Available_for_purchase, $Current_stock_level, $Threshold_level, $Restock_level, $Product_image);
    $stmt->execute();
    
    move_uploaded_file($_FILES['Product_image']['tmp_name'], $target);

    $stmt->close();
    $conn->close();
    header("location: ../pages/InventoryMAnager/product.php?success=product");
?>
<?php
    require_once "config.php";
    require_once "functions.php";

    $Product_ID = $_POST['Current_product'];
    

    if(!empty($_POST['Product_name'])) {
        if(productNameExists($conn, $_POST['Product_name'], $Product_ID) !== false) {
            header("location: ../pages/InventoryMAnager/product.php?invalid=edit");
            exit();
        }
        $stmt = $conn->prepare("UPDATE Product SET Product_name = ? WHERE Product_ID = ?");
        $stmt->bind_param("si", $_POST['Product_name'], $Product_ID);
        $stmt->execute();
        
    }
    if(!empty($_POST['Price'])) {
        $stmt = $conn->prepare("UPDATE Product SET Price = ? WHERE Product_ID = ?");
        $stmt->bind_param("di", $_POST['Price'], $Product_ID);
        $stmt->execute();
        
    }
    if(!empty($_POST['Category'])) {
        $stmt = $conn->prepare("UPDATE Product SET Category_ID = ? WHERE Product_ID = ?");
        $stmt->bind_param("ii", $_POST['Category'], $Product_ID);
        $stmt->execute();
        
    }
    if(!empty($_POST['Availability']) || isset($_POST['Availability'])) {
        $stmt = $conn->prepare("UPDATE Product SET Available_for_purchase = ? WHERE Product_ID = ?");
        $stmt->bind_param("ii", $_POST['Availability'], $Product_ID);
        $stmt->execute();
        
    }
    if(!empty($_POST['Current_stock_level'])) {
        $stmt = $conn->prepare("UPDATE Product SET Current_stock_level = ? WHERE Product_ID = ?");
        $stmt->bind_param("ii", $_POST['Current_stock_level'], $Product_ID);
        $stmt->execute();
      
    }
    if(!empty($_POST['Threshold_level'])) {
        $stmt = $conn->prepare("UPDATE Product SET Threshold_level = ? WHERE Product_ID = ?");
        $stmt->bind_param("ii", $_POST['Threshold_level'], $Product_ID);
        $stmt->execute();
        
    }
    if(!empty($_POST['Restock_level'])) {
        $stmt = $conn->prepare("UPDATE Product SET Restock_level = ? WHERE Product_ID = ?");
        $stmt->bind_param("ii", $_POST['Restock_level'], $Product_ID);
        $stmt->execute();
        
    }
    if(isset( $_FILES["Product_image"] ) && !empty( $_FILES["Product_image"]["name"] )) {
        $stmt = $conn->prepare("SELECT Product_image FROM Product WHERE Product_ID = ?");
        $stmt->bind_param("i", $Product_ID);
        $stmt->execute();
        $result = $stmt->get_result()->fetch_assoc();
        $Old_Product_image = $result['Product_image'];
        $target = "../images/".basename($_FILES['Product_image']['name']);
        $Product_image = $_FILES['Product_image']['name'];
        $stmt = $conn->prepare("UPDATE Product SET Product_image = ? WHERE Product_ID = ?");
        $stmt->bind_param("si", $Product_image, $Product_ID);
        $stmt->execute();
        move_uploaded_file($_FILES['Product_image']['tmp_name'], $target);
        unlink("../images/{$Old_Product_image}");
        
    }

    $stmt->close();
    $conn->close();
    
    header("location: ../pages/InventoryMAnager/product.php?success=edit");
    
?>
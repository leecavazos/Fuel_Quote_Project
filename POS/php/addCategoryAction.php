<?php 
    require_once "config.php";
    require_once 'functions.php';

    $Category_name = $_POST['Category_name'];
    $target = "../images/".basename($_FILES['Category_image']['name']);
    $Category_image = $_FILES['Category_image']['name'];

    if(categoryExists($conn, $Category_name) !== false) {
        header("location: ../pages/InventoryMAnager/category.php?invalid=category");
        exit();
    }

    $stmt = $conn->prepare("INSERT INTO Category (Category_name, Category_image) VALUES (?,?)");
    $stmt->bind_param("ss", $Category_name, $Category_image);
    $stmt->execute();
    
    move_uploaded_file($_FILES['Category_image']['tmp_name'], $target);

    $stmt->close();
    $conn->close();
    header("location: ../pages/InventoryMAnager/category.php?success=category");
?>
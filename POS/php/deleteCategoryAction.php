<?php
    require_once "config.php";
    require_once "functions.php";

    if(isset($_GET['id'])) {
        $Category_ID = $_GET['id'];
        $Category_image = $_GET['image'];
        if(categoryReferenced($conn, $Category_ID) == true) {
            header("location: ../pages/InventoryMAnager/category.php?invalid=deleted");
            exit();
        }
        $sql = "DELETE FROM Category WHERE Category_ID = ?;";
        $stmt = mysqli_stmt_init($conn);
        mysqli_stmt_prepare($stmt, $sql);
        mysqli_stmt_bind_param($stmt, "i", $Category_ID);
        mysqli_stmt_execute($stmt);
        $stmt->close();
        $conn->close();
        unlink("../images/{$Category_image}");
        header("location: ../pages/InventoryMAnager/category.php?success=deleted");
    }
    
    
?>
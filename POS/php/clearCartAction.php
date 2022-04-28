<?php
    require_once "config.php";
    
    if(isset($_GET['id'])) {
        $User_ID = $_GET['id'];
        $sql = "DELETE FROM `Cart Item` WHERE User_ID = ?;";
        $stmt = mysqli_stmt_init($conn);
        mysqli_stmt_prepare($stmt, $sql);
        mysqli_stmt_bind_param($stmt, "i", $User_ID);
        mysqli_stmt_execute($stmt);
        $stmt->close();
        $conn->close();
        header("location: ../pages/checkout.php?success=clear");
    }
?>
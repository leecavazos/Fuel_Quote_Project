<?php
function emailExists($conn, $Email) {

    $sql = "SELECT * FROM User WHERE Email = ?;";
    $stmt = mysqli_stmt_init($conn);
    mysqli_stmt_prepare($stmt, $sql);
    mysqli_stmt_bind_param($stmt, "s", $Email);
    mysqli_stmt_execute($stmt);

    $result = mysqli_stmt_get_result($stmt);

    if($row = mysqli_fetch_assoc($result)) {

    } else {
        $result = false;
        return $result;
    }
}

function usernameExists($conn, $Username) {

    $sql = "SELECT * FROM User WHERE Username = ?;";
    $stmt = mysqli_stmt_init($conn);
    mysqli_stmt_prepare($stmt, $sql);
    mysqli_stmt_bind_param($stmt, "s", $Username);
    mysqli_stmt_execute($stmt);

    $result = mysqli_stmt_get_result($stmt);

    if($row = mysqli_fetch_assoc($result)) {

    } else {
        $result = false;
        return $result;
    }
}

function emailExistsForOtherUser($conn, $Email, $User_ID) {

    $sql = "SELECT * FROM User WHERE Email = ? AND NOT User_ID = ?;";
    $stmt = mysqli_stmt_init($conn);
    mysqli_stmt_prepare($stmt, $sql);
    mysqli_stmt_bind_param($stmt, "si", $Email, $User_ID);
    mysqli_stmt_execute($stmt);

    $result = mysqli_stmt_get_result($stmt);

    if($row = mysqli_fetch_assoc($result)) {

    } else {
        $result = false;
        return $result;
    }
}

function usernameExistsForOtherUser($conn, $Username, $User_ID) {

    $sql = "SELECT * FROM User WHERE Username = ? AND NOT User_ID = ?;";
    $stmt = mysqli_stmt_init($conn);
    mysqli_stmt_prepare($stmt, $sql);
    mysqli_stmt_bind_param($stmt, "si", $Username, $User_ID);
    mysqli_stmt_execute($stmt);

    $result = mysqli_stmt_get_result($stmt);

    if($row = mysqli_fetch_assoc($result)) {

    } else {
        $result = false;
        return $result;
    }
}

function productExists($conn, $Product_name) {

    $sql = "SELECT * FROM Product WHERE Product_name = ?;";
    $stmt = mysqli_stmt_init($conn);
    mysqli_stmt_prepare($stmt, $sql);
    mysqli_stmt_bind_param($stmt, "s", $Product_name);
    mysqli_stmt_execute($stmt);

    $result = mysqli_stmt_get_result($stmt);

    if(mysqli_fetch_assoc($result)) {
        return true;
    } else {
        return false;
    }
}

function categoryExists($conn, $Category_name) {

    $sql = "SELECT * FROM Category WHERE Category_name = ?;";
    $stmt = mysqli_stmt_init($conn);
    mysqli_stmt_prepare($stmt, $sql);
    mysqli_stmt_bind_param($stmt, "s", $Category_name);
    mysqli_stmt_execute($stmt);

    $result = mysqli_stmt_get_result($stmt);

    if(mysqli_fetch_assoc($result)) {
        return true;
    } else {
        return false;
    }
}

function categoryReferenced($conn, $Category_ID) {

    $sql = "SELECT * FROM Product WHERE Category_ID= ?;";
    $stmt = mysqli_stmt_init($conn);
    mysqli_stmt_prepare($stmt, $sql);
    mysqli_stmt_bind_param($stmt, "i", $Category_ID);
    mysqli_stmt_execute($stmt);

    $result = mysqli_stmt_get_result($stmt);

    if(mysqli_fetch_assoc($result)) {
        return true;
    } else {
        return false;
    }
}
function validate($data){
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;  
 }

 function productNameExists($conn, $Product_name, $Product_ID) {

    $sql = "SELECT * FROM Product WHERE Product_name = ? AND NOT Product_ID = ?;";
    $stmt = mysqli_stmt_init($conn);
    mysqli_stmt_prepare($stmt, $sql);
    mysqli_stmt_bind_param($stmt, "si", $Product_name, $Product_ID);
    mysqli_stmt_execute($stmt);

    $result = mysqli_stmt_get_result($stmt);

    if(mysqli_fetch_assoc($result)) {
        return true;
    } else {
        return false;
    }
}

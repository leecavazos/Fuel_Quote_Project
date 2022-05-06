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

function validate($data){
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;  
 }


function PreviousQuotes($conn, $User_ID){
    //SQL Query HERE//
    $sql = "SELECT EXISTS(SELECT * FROM `Order` WHERE User_ID= '$User_ID')";
    $result = mysqli_query($conn, $sql) or die(mysqli_error($conn));
    $row=mysqli_fetch_assoc($result);
    if($row["EXISTS(SELECT * FROM `Order` WHERE User_ID= '$User_ID')"] === '1'){
        $Rate = .01;
        return  $Rate;
    }
    else{
        $Rate = .0;
        return $Rate;
    }
}

function State_or_Outside($conn, $State){
    if($State === 'TX'){
        $Rate = .02;
        return $Rate;
    }
    else{
        $Rate = .04;
        return $Rate;
    }
}

function GallonsRequested($conn,$num){
    if($num >= 1000){
        $R = .02;
        return $R;
    }
    else{
        $R = .03;
        return $R;
    }
}

function CalculateTotal($conn, $Gallns, $User_ID, $St){
    $CurrentPrice = 1.50;
    $RateHistory=PreviousQuotes($conn,$User_ID);
    $Location = State_or_Outside($conn, $St);
    $Gallons = GallonsRequested($conn, $Gallns);
    $Company = .1;
    // echo $Gallons;
    $Mrg = ($Location-$RateHistory+$Gallons+$Company) * $CurrentPrice;
    $Margin = $CurrentPrice+ $Mrg;
    $SuggestedPrice = $Gallns * $Margin;
    return $SuggestedPrice;
}

<?php 
    $User_ID = $_POST['User_ID'];
    $First_name = $_POST['First_name'];
    $Last_name = $_POST['Last_name'];
    $Email = $_POST['Email'];
    $Phone_number = $_POST['Phone_number'];
    $Street_address = $_POST['Street_address'];
    $APT = $_POST['APT'];
    $City = $_POST['City'];
    $State = $_POST['State'];
    $Zip = $_POST['Zip'];
    $Username = $_POST['Username'];
    $Password = md5($_POST['Password']);

    require_once 'functions.php';
    require_once "config.php";

    
        if(emailExistsForOtherUser($conn, $Email, $User_ID) !== false) {
            header("location: ../pages/accountDetails.php?invalid=email");
            exit();
        }
        if(usernameExistsForOtherUser($conn, $Username, $User_ID) !== false) {
            header("location: ../pages/accountDetails.php?invalid=username");
            exit();
        }
        $stmt = $conn->prepare("UPDATE User SET User_ID = ?, First_name = ?, Last_name = ?, Email = ?, Phone_number = ?, Street_address = ?, APT = ?, City = ?, State = ?, Zip = ?, Username = ?, Password = ? WHERE User_ID = ?");
        $stmt->bind_param("isssssssssssi", $User_ID, $First_name, $Last_name, $Email, $Phone_number, $Street_address, $APT, $City, $State, $Zip, $Username, $Password, $User_ID);
        $stmt->execute();
        $stmt->close();
        $conn->close();
        header("location: ../pages/accountDetails.php?created=success");
?>
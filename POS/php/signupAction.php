<?php 
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

    require_once "config.php";
    require_once 'functions.php';

        if(emailExists($conn, $Email) !== false) {
            header("location: ../pages/userForm.php?invalid=email");
            exit();
        }
        if(usernameExists($conn, $Username) !== false) {
            header("location: ../pages/userForm.php?invalid=username");
            exit();
        }
        $stmt = $conn->prepare("INSERT INTO User (First_name, Last_name, Email, Phone_number, Street_address, APT, City, State, Zip, Username, Password) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
        $stmt->bind_param("sssssssssss", $First_name, $Last_name, $Email, $Phone_number, $Street_address, $APT, $City, $State, $Zip, $Username, $Password);
        $stmt->execute();
        echo "Registration successful";
        $stmt->close();
        $conn->close();
        header("location: ../pages/userForm.php?created=success");
    
    
    
?>
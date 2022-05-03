<?php
   require_once "config.php";
   session_start();

   require_once 'functions.php';
   if (isset($_POST['uname']) && isset($_POST['psw'])) {
  
      $username = validate($_POST['uname']);
      $password = validate(md5($_POST['psw']));

      $sql = "SELECT Username, Password, User_ID FROM User WHERE Username='$username' AND Password='$password'";
      $result = mysqli_query($conn, $sql) or die(mysqli_error($conn));
      if (mysqli_num_rows($result) === 1) {
         $row = mysqli_fetch_assoc($result);
         if ($row['Username'] === $username && $row['Password'] === $password) {
            $_SESSION['login_user'] = $username;
            $_SESSION['user_id'] = $row['User_ID'];
            header("Location: ../pages/user.php");

            exit();
         }
         else {
            header("Location: ../pages/login.php?invalid=true");
            exit();
         }
      }
      else {
         header("Location: ../pages/login.php?invalid=true");
         exit();
      }
   }
            
?>

    
    
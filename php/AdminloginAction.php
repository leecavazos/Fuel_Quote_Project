<?php
   require_once "config.php";
   include 'functions.php';
   session_start();

   if (isset($_POST['uname']) && isset($_POST['psw'])) {
  
      $username = validate($_POST['uname']);
      $password = validate(md5($_POST['psw']));

      $sql = "SELECT Manager_username, Manager_password, Managing_role FROM Manager WHERE Manager_username='$username' AND Manager_password='$password'";
      $result = mysqli_query($conn, $sql) or die(mysqli_error($conn));
      if (mysqli_num_rows($result) === 1) {
         $row = mysqli_fetch_assoc($result);
         if ($row['Manager_username'] === $username && $row['Manager_password'] === $password) {
            $_SESSION['login_user'] = $username;
            // $_SESSION['user_id'] = $row['User_ID'];
            if($row['Managing_role'] === 'Inventory'){
               header("Location: ../pages/InventoryMAnager/InventoryAdmin.php");
               exit();
            }
            elseif ($row['Managing_role'] === 'Sales') {
               header("Location: ../pages/OrdersManager/OrdersAdmin2.php");
               exit();
            }
            elseif ($row['Managing_role'] === 'Purchasing') {
               header("Location: ../pages/purchasing/dashboard.php");
               exit();
            }
            // header("Location: ../pages/OrdersManager/OrdersAdmin.php");
            // exit();
         }
         else {
            header("Location: ../pages/AdminLogin.php?invalid=true");
            exit();
         }
      }
      else {
         header("Location: ../pages/AdminLogin.php?invalid=true");
         exit();
      }
   }
            
?>

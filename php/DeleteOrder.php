<?php
   include "config.php";
   if(isset($_GET['deleteOrder'])){
      $id=$_GET['deleteOrder'];
      $sql="DELETE FROM `Order` WHERE `Order_ID` = $id";
      $result=mysqli_query($conn, $sql);
      if($result){
         echo "Deleted";
         header('Location: ../pages/OrdersManager/OrdersAdmin2.php');
      }
      else{
         die(mysqli_error($conn));
      }
   }
?>
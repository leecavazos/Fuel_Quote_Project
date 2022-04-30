<?php
   include "config.php";
   $ID =$_GET['editOrder'];

   $sql = "SELECT * FROM `Order` WHERE Order_ID = '$ID'";
   $result = mysqli_query($conn,$sql);
   $row=mysqli_fetch_assoc($result);
   $PID=$row['Purchaser_ID'];
   $Strt=$row['Street_delivered_to'];
   $City=$row['City_delivered_to'];
   $State=$row['State_delivered_to'];
   $Zip =$row['Zip_code_delivered_to'];
   if(isset($_POST['submit'])){
       $P_ID=$_POST['purchaserid'];
       $St=$_POST['street'];
       $Ciudad=$_POST['city'];
       $Zip=$_POST['zip'];

       $sql = "UPDATE `Order` SET Order_ID='$ID', Purchaser_ID = '$P_ID', Street_delivered_to = '$St', City_delivered_to = '$Ciudad', Zip_code_delivered_to = '$Zip' WHERE Order_ID = '$ID'";
       $result=mysqli_query($conn,$sql);
       if($result){
           header('Location: ../pages/OrdersManager/OrdersAdmin.php');
       }
       else{
           die(mysqli_error($conn));
       }
   }
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Edit Form</title>
        <meta charset="UTF-8">
	    <meta name="viewport" content="width=device-width, initial-scale=1">
        
        <link rel="stylesheet" type="text/css" href="../css/main_page.css">
        <link rel="stylesheet" type="text/css" href="../css/Admin.css">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    </head>
    <section class="food-search text-center">
            <span class="food-search">
            </span>
    </section>
    <body>
        <div>
            <form method="POST">
                <div class="mb-3">
                    <label class="form-label">Purchaser_ID</label>
                    <input type="text" class="form-control" name="purchaserid" value= <?php echo $PID; ?> >
                </div>
                <div class="mb-3">
                    <label class="form-label">Street</label>
                    <input type="text" class="form-control" name="street" value= <?php echo $Strt; ?> >
                </div>
                <div class="mb-3">
                    <label class="form-label">City</label>
                    <input type="text" class="form-control" name="city" value= <?php echo $City; ?> >
                </div>
                <div class="mb-3">
                    <label class="form-label">ZipCode</label>
                    <input type="text" class="form-control" name="zip" value= <?php echo $Zip; ?> >
                </div>
                <button type="submit" class="" name="submit">Update</button>
            </form>
        </div>
    </body>
</html>
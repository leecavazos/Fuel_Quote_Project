<!DOCTYPE html>
<?php
    include('navbar.php');
    require_once "../../php/config.php";
   $ID =$_GET['editOrder'];

   $sql = "SELECT * FROM `Order` WHERE Order_ID = '$ID'";
   $result = mysqli_query($conn,$sql);
   $row=mysqli_fetch_assoc($result);
   $PID=$row['User_ID'];
   $Strt=$row['Street_delivered_to'];
   $City=$row['City_delivered_to'];
   $State=$row['State_delivered_to'];
   $Zip =$row['Zip_code_delivered_to'];
   $Total = $row['Order_total'];
   if(isset($_POST['submit'])){
       $P_ID=$_POST['userid'];
       $St=$_POST['street'];
       $Ciudad=$_POST['city'];
       $Estado=$_POST['state'];
       $Zip=$_POST['zip'];
       $Total=$_POST['total'];

       $sql = "UPDATE `Order` SET Order_ID='$ID', User_ID = '$P_ID', Street_delivered_to = '$St', City_delivered_to = '$Ciudad', State_delivered_to = '$Estado', Zip_code_delivered_to = '$Zip', Order_total='$Total' WHERE Order_ID = '$ID'";
       $result=mysqli_query($conn,$sql);
       if($result){
           header('Location: OrdersAdmin2.php');
       }
       else{
           die(mysqli_error($conn));
       }
   }
   if(isset($_POST['cancel'])){
        header('Location: OrdersAdmin2.php');
    }
?>
<html>
    <head>
        <title>Edit Form</title>
        <!-- <link rel="stylesheet" type="text/css" href="../css/main_page.css">
        <link rel="stylesheet" type="text/css" href="../css/Admin.css"> -->
        <style>
            .input_box{
                border-radius: 5px;
                border: 2px solid;
                border-color: black;
                padding: 20px; 
                width: 200px;
                height: 15px;    
            }
            .block {
                display: inline;
                width: 45%;
                border: none;
                border-radius: 5px;
                background-color: grey;
                color: white;
                padding: 14px 28px;
                cursor: pointer;
                text-align: center;
                margin-top: 10px;
            }
        </style>
        <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"> -->
    </head>
    <body>
        <section class="dashboard">
            <div class="dash-content">
                <div class="title">
			        <i class='bx bx-edit'></i>
			        <span class="text">Edit Order Form</span>
		        </div>
                <div class="activity-data"style="overflow-x: hidden; background-color: #dfdfdf; border-radius: 15px;">
                    <div class="data" style="float: left;">
                        <form method="POST">
                            <div class="">
                                <label style="display: block;"> 
                                    <span class="data-title">User ID:</span>
                                </label>
                                <input type="text" class="input_box" name="userid" value="<?php echo $PID;?>" required>
                            </div>
                            <div class="">
                                <label style="display: block;">
                                    <span class="data-title">Address:</span>
                                </label>
                                <input type="text" class="input_box" name="street" value="<?php echo $Strt; ?>" required>
                            </div>
                            <div class="">
                                <label style="display: block;">
                                    <span class="data-title">City:</span> 
                                </label>
                                <input type="text" class="input_box" name="city" value="<?php echo $City; ?>" required>
                            </div>
                            <div class="">
                                <label style="display: block;">
                                    <span class="data-title">State:</span> 
                                </label>
                                <input type="text" class="input_box" name="state" value="<?php echo $State; ?>" required>
                            </div>
                            <div class="">
                                <label style="display: block;">
                                    <span class="data-title">ZipCode:</span> 
                                </label>
                                <input type="text" class="input_box" name="zip" value="<?php echo $Zip; ?>" required>
                            </div>
                            <div class="">
                                <label style="display: block;">
                                    <span class="data-title">Total:</span> 
                                </label>
                                <input type="text" class="input_box" name="total" value="<?php echo $Total; ?>" required>
                            </div>
                            <button type="submit" class="block" name="submit">Update</button>
                            <button type="submit" class="block" style=""name="cancel">Cancel</button>
                        </form>
                    </div>
                </div>
            </div>
        </section>
    </body>
</html>
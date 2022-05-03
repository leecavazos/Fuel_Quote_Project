<!DOCTYPE html>
<?php
include('navbar.php');
?>

<?php
require_once "../../php/config.php";
$sql = "SELECT Category_ID, Category_name FROM Category";
$result1 = $conn->query($sql);
$rows1 = $result1->fetch_all(MYSQLI_ASSOC);
$sql = "SELECT Product_ID, Product_name, Price, Category_name, Available_for_purchase, Current_stock_level, Threshold_level, Restock_level, Product_image FROM Product AS p, Category AS c WHERE p.Category_ID = c.Category_ID";
$result = $conn->query($sql);
$num = $result->num_rows;
$rows = $result->fetch_all(MYSQLI_ASSOC);

?>

<html>

<body>
    <section class="dashboard">
        <div class="dash-content">
            <section>
                <div class="overview">
                    <div class="title">
                        <i class='bx bx-plus-circle'></i>
                        <span class="text">Add Product</span>
                    </div>
                </div>
                <!-- End Dashboard content -->
                <!-- Recent Activity Content Begins -->
                <div class="productForm">
                    <form action="../../php/addProductAction.php" method="POST" enctype="multipart/form-data">
                        <div class="item">
                            <label for="Product_name">Product name:</label>
                            <input type="text" id="Product_name" name="Product_name" required>
                        </div>
                        <div class="item">
                            <label for="Price">Price:</label>
                            <input type="number" id="Price" name="Price" step="0.01" required>
                        </div>
                        <div class="item">
                            <label for="Category">Category:</label>
                            <select id="Category" name="Category" required>
                                <?php
                                foreach ($rows1 as $row1) {
                                    echo "<option value='{$row1['Category_ID']}'>{$row1['Category_name']}</option>";
                                }
                                ?>
                            </select>
                        </div>
                        <div class="item">
                            <label for="Availability">Currently available for purchase?</label>
                            <div>
                                <div style="display: inline-block; padding-right: 10%;">
                                    <label for="yes">Yes</label>
                                    <input type="radio" id="yes" name="Availability" value="1" required>
                                </div>
                                <div style="display: inline-block;">
                                    <label for="no">No</label>
                                    <input type="radio" id="no" name="Availability" value="0" required>
                                </div>
                            </div>
                        </div>
                        <div class="item">
                            <label for="Current_stock_level">Current stock level:</label>
                            <input type="number" id="Current_stock_level" name="Current_stock_level" min="0" required>
                        </div>
                        <div class="item">
                            <label for="Threshold_level">Threshold level:</label>
                            <input type="number" id="Threshold_level" name="Threshold_level" min="0" onchange="checkLevels()" required>
                        </div>
                        <div class="item">
                            <label for="Restock_level">Restock level:</label>
                            <input type="number" id="Restock_level" name="Restock_level" min="0" onchange="checkLevels()" required>
                            <div id="checkLevels"> ❗ Restock level must be greater than threshold.</div>
                        </div>
                        <div class="item">
                            <label for="Product_image">Product image:</label>
                            <input type="file" name="Product_image" required>
                        </div>
                        <div class="item">
                            <input type="submit" id="submit">
                        </div>
                    </form>
                    <?php
                    if (isset($_GET["success"])) {
                        if ($_GET["success"] == "product") {
                            echo "<style> .success {font-size: larger; font-weight: 600; text-align: center; color: #04AA6D;}</style><p class='success'>Product successfully added!</p>";
                        }
                    }
                    ?>
                    <?php
                    if (isset($_GET["invalid"])) {
                        if ($_GET["invalid"] == "product") {
                            echo "<style> .invalid {color: red; text-align: center;}</style><p class='invalid'> Product name already exists. Please try another one.</p>";
                        }
                    }
                    ?>
                </div>
            </section>
            <section class="deleteProduct">
                <div class="overview">
                    <div class="title">
                        <i class='bx bx-minus-circle'></i>
                        <span class="text">Product Information</span>
                    </div>
                </div>
                <!-- End Dashboard content -->
                <!-- Recent Activity Content Begins -->

                <div class="activity">
                    <div class="title">
                        <i class='bx bx-spreadsheet'></i>
                        <span class="text">Products</span>
                    </div>

                    <div class="activity-data">
                        <div class="data">
                            <span class="data-title">Name</span>
                            <?php
                            foreach ($rows as $row) {
                                echo "<span class='data-list'>{$row['Product_name']}</span>";
                            }
                            ?>
                        </div>
                        <div class="data">
                            <span class="data-title">Price</span>
                            <?php
                            foreach ($rows as $row) {
                                echo "<span class='data-list'>{$row['Price']}</span>";
                            }
                            ?>
                        </div>
                        <div class="data">
                            <span class="data-title">Category</span>
                            <?php
                            foreach ($rows as $row) {
                                echo "<span class='data-list'>{$row['Category_name']}</span>";
                            }
                            ?>
                        </div>
                        <div class="data">
                            <span class="data-title">Available?</span>
                            <?php
                            foreach ($rows as $row) {
                                echo "<span class='data-list'>";
                                if ($row['Available_for_purchase'] == 1) {
                                    echo "Yes";
                                } else {
                                    echo "No";
                                }
                                echo "</span>";
                            }
                            ?>
                        </div>
                        <div class="data">
                            <span class="data-title">Stock</span>
                            <?php
                            foreach ($rows as $row) {
                                echo "<span class='data-list'>{$row['Current_stock_level']}</span>";
                            }
                            ?>
                        </div>

                        <div class="data">
                            <span class="data-title">Threshold</span>
                            <?php
                            foreach ($rows as $row) {
                                echo "<span class='data-list'>{$row['Threshold_level']}</span>";
                            }
                            ?>
                        </div>

                        <div class="data">
                            <span class="data-title">Restock</span>
                            <?php
                            foreach ($rows as $row) {
                                echo "<span class='data-list'>{$row['Restock_level']}</span>";
                            }
                            ?>
                        </div>
                    </div>
                </div>
            </section>
            <section class="editProduct">
                <div class="overview">
                    <div class="title">
                        <i class='bx bx-plus-circle'></i>
                        <span class="text">Edit Product</span>
                    </div>
                </div>
                <!-- End Dashboard content -->
                <!-- Recent Activity Content Begins -->
                <div class="editForm">
                    <form action="../../php/editProductAction.php" method="POST" enctype="multipart/form-data">
                        <div class="item">
                            <label for="Current_product">Product name:</label>
                            <select id="Current_product" name="Current_product" required>
                                <?php
                                foreach ($rows as $row2) {
                                    echo "<option value='{$row2['Product_ID']}'>{$row2['Product_name']}</option>";
                                }
                                ?>
                            </select>
                        </div>
                        <div class="item">
                            <label for="Product_name">New name:</label>
                            <input type="text" id="Product_name" name="Product_name">
                        </div>
                        <div class="item">
                            <label for="Price">Price:</label>
                            <input type="number" id="Price" name="Price" step="0.01">
                        </div>
                        <div class="item">
                            <label for="Category">Category:</label>
                            <select id="Category" name="Category">
                                <?php
                                foreach ($rows1 as $row1) {
                                    echo "<option value='{$row1['Category_ID']}'>{$row1['Category_name']}</option>";
                                }
                                ?>
                            </select>
                        </div>
                        <div class="item">
                            <label for="Availability">Currently available for purchase?</label>
                            <div>
                                <div style="display: inline-block; padding-right: 10%;">
                                    <label for="yes">Yes</label>
                                    <input type="radio" id="yes" name="Availability" value="1">
                                </div>
                                <div style="display: inline-block;">
                                    <label for="no">No</label>
                                    <input type="radio" id="no" name="Availability" value="0">
                                </div>
                            </div>
                        </div>
                        <div class="item">
                            <label for="Current_stock_level">Current stock level:</label>
                            <input type="number" id="Current_stock_level" name="Current_stock_level" min="0">
                        </div>
                        <div class="item">
                            <label for="Threshold_level">Threshold level:</label>
                            <input type="number" id="Threshold_level2" name="Threshold_level" min="0" onchange="checkLevels2()">
                        </div>
                        <div class="item">
                            <label for="Restock_level">Restock level:</label>
                            <input type="number" id="Restock_level2" name="Restock_level" min="0" onchange="checkLevels2()">
                            <div id="checkLevels2"> ❗ Restock level must be greater than threshold.</div>
                        </div>
                        <div class="item">
                            <label for="Product_image">Product image:</label>
                            <input type="file" name="Product_image">
                        </div>
                        <div class="item">
                            <input type="submit" id="submit2">
                        </div>
                    </form>
                    <?php
                    if (isset($_GET["success"])) {
                        if ($_GET["success"] == "edit") {
                            echo "<style> .success {font-size: larger; font-weight: 600; text-align: center; color: #04AA6D;}</style><p class='success'>Product successfully edited!</p>";
                        }
                    }
                    ?>
                    <?php
                    if (isset($_GET["invalid"])) {
                        if ($_GET["invalid"] == "edit") {
                            echo "<style> .invalid {color: red; text-align: center;}</style><p class='invalid'> Product name already exists. Please try another one.</p>";
                        }
                    }
                    ?>
                </div>
            </section>
        </div>
    </section>
</body>

<script>
    function checkLevels() {
        if (parseInt(document.getElementById('Restock_level').value) > parseInt(document.getElementById('Threshold_level').value)) {
            document.getElementById('submit').disabled = false;
            document.getElementById('submit').style = "cursor: pointer";
            document.getElementById('checkLevels').style.display = "none";
        } else {
            document.getElementById('submit').disabled = true;
            document.getElementById('submit').style = "cursor: not-allowed";
            document.getElementById('checkLevels').style.display = "block";
        }
    }

    function checkLevels2() {
        if (parseInt(document.getElementById('Restock_level2').value) > parseInt(document.getElementById('Threshold_level2').value)) {
            document.getElementById('submit2').disabled = false;
            document.getElementById('submit2').style = "cursor: pointer";
            document.getElementById('checkLevels2').style.display = "none";
        } else {
            document.getElementById('submit2').disabled = true;
            document.getElementById('submit2').style = "cursor: not-allowed";
            document.getElementById('checkLevels2').style.display = "block";
        }
    }
</script>

</html>
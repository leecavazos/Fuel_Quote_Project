<!DOCTYPE html>
<?php
include('navbar.php');
?>

<?php
require_once "../../php/config.php";
$stmt = $conn->prepare("SELECT Manager_ID, Manager_username, Managing_role FROM Manager WHERE Manager_username = ?");
$stmt->bind_param("s", $_SESSION['login_user']);
$stmt->execute();
$result = $stmt->get_result();
$row = $result->fetch_assoc();
$stmt->close();
$conn->close();
?>

<html>

<head>
    <link rel="stylesheet" type="text/css" href="../../css/inventory.css?v1.3">
</head>

<body>
    <section class="dashboard">
        <div class="dash-content">

            <div class="overview">
                <div class="title">
                    <i class='bx bx-minus-circle'></i>
                    <span class="text">Sales Manager Profile</span>
                </div>
            </div>
            <!-- End Dashboard content -->
            <!-- Recent Activity Content Begins -->
            <div class="activity">
                <div class="title">
                    <i class='bx bxs-user-badge'></i>
                    <span class="text">Manager Information</span>
                </div>

                <div class="activity-data" style="overflow-x: hidden; background-color: #dfdfdf; border-radius: 15px;">
                    <div class="data">
                        <span class="data-title">Manager ID</span>
                        <?php
                        echo "<span class='data-list'>{$row['Manager_ID']}</span>";
                        ?>
                    </div>
                    <div class="data">
                        <span class="data-title">Username</span>
                        <?php
                        echo "<span class='data-list'>{$row['Manager_username']}</span>";
                        ?>
                    </div>

                    <div class="data">
                        <span class="data-title">Management Role</span>
                        <?php
                        echo "<span class='data-list'>{$row['Managing_role']}</span>";
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </section>
</body>
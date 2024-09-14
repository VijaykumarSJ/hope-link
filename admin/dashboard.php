<?php
    include '../db-connection.php';
    // REGISTERED COUNT
    $sql = "SELECT COUNT(*) AS total FROM orphanage_tbl";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();
    $count = $row['total'];
    // ENTERED COUNT
    $sql2 = "SELECT COUNT(*) AS total FROM myorphanages_tbl";
    $result2 = $conn->query($sql2);
    $row2 = $result2->fetch_assoc();
    $count2 = $row2['total'];
    // REGISTERED COUNT
    $sql3 = "SELECT COUNT(*) AS total FROM user_tbl";
    $result3 = $conn->query($sql3);
    $row3 = $result3->fetch_assoc();
    $count3 = $row3['total'];

?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="css/dashboard.css">
</head>
<body>
    <div class="container">
        
        <?php include 'base.php'; ?>

        <!-- main -->
         <div class="main">
            <div class="topbar">
                <div class="toggle">
                    <ion-icon name="menu-outline"></ion-icon>
                </div>
                <div class="user">
                    <img src="../assets/images/hand.jpg">
                </div>
            </div>

            <!-- CONTENT START -->

            <div class="cardbox">
                <div class="card">
                    <div>
                        <div class="numbers"><?php echo $count; ?></div>
                        <div class="cardname">Registered</div>
                    </div>
                    <div class="iconbx">
                        <ion-icon name="eye-outline"></ion-icon>
                    </div>
                </div>
                <div class="card">
                    <div>
                        <div class="numbers"><?php echo $count2; ?></div>
                        <div class="cardname">Entered Orphanages</div>
                    </div>
                    <div class="iconbx">
                        <ion-icon name="pin-outline"></ion-icon>                    
                    </div>
                </div>
                <div class="card">
                    <div>
                        <div class="numbers"><?php echo $count3; ?></div>
                        <div class="cardname">Users</div>
                    </div>
                    <div class="iconbx">
                        <ion-icon name="chatbubbles-outline"></ion-icon>                    
                    </div>
                </div>
            </div>
            
            <!-- CONTENT END -->
         </div>
    </div>
</body>
</html>
<script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
<script src="js/script.js"></script>
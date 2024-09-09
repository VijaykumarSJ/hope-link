<!DOCTYPE html>
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
                        <div class="numbers">1,504</div>
                        <div class="cardname">Daily views</div>
                    </div>
                    <div class="iconbx">
                        <ion-icon name="eye-outline"></ion-icon>
                    </div>
                </div>
                <div class="card">
                    <div>
                        <div class="numbers">50</div>
                        <div class="cardname">Places</div>
                    </div>
                    <div class="iconbx">
                        <ion-icon name="pin-outline"></ion-icon>                    
                    </div>
                </div>
                <div class="card">
                    <div>
                        <div class="numbers">1,500</div>
                        <div class="cardname">Commants</div>
                    </div>
                    <div class="iconbx">
                        <ion-icon name="chatbubbles-outline"></ion-icon>                    
                    </div>
                </div>
                <div class="card">
                    <div>
                        <div class="numbers">4000</div>
                        <div class="cardname">Starting Budget</div>
                    </div>
                    <div class="iconbx">
                        <ion-icon name="wallet-outline"></ion-icon>                    
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
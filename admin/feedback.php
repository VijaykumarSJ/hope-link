<?php include '../db-connection.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="css/dashboard.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
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
            <h1 class="content-title">Feedback</h1>
            <div class="container2">
            <div class="table">
        <div class="table-header">
            <div class="header__item"><a id="name" class="filter__link" href="#">S.No.</a></div>
            <div class="header__item"><a id="wins" class="filter__link filter__link--number" href="#">Name</a></div>
            <div class="header__item"><a id="draws" class="filter__link filter__link--number" href="#">Email</a></div>
            <div class="header__item"><a id="losses" class="filter__link filter__link--number" href="#">Phone Number</a></div>
            <div class="header__item"><a id="total" class="filter__link filter__link--number" href="#">Message</a></div>
        </div>
        <div class="table-content"> 
            <?php
                        $sql = "SELECT * FROM feedback_tbl";
                        $result = $conn->query($sql);
                        
                        if ($result->num_rows > 0) {
                          // output data of each row
                          $i = 1;
                          while($row = $result->fetch_assoc()) {
                      ?>
            <div class="table-row">     
                <div class="table-data"><?php echo $i++; ?></div>
                <div class="table-data"><?php echo $row["name"]; ?></div>
                <div class="table-data"><?php echo $row["email"]; ?></div>
                <div class="table-data"><?php echo $row["phone"]; ?></div>
                <div class="table-data"><?php echo $row["message"]; ?></div>
            </div>
            <?php
                          }
                        }
                          else {
                            echo "0 results";
                          }
                          $conn->close();
                    ?>
        </div>  
    </div></div>
            
            <!-- CONTENT END -->
         </div>
    </div>
</body>
</html>
<script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
<script type="text/javascript">
    if ( window.history.replaceState ) {
window.history.replaceState( null, null, window.location.href );
}
  </script>
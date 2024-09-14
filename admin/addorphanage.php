<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="css/dashboard.css">
    <link rel="stylesheet" href="css/addorphanage.css">
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
                    <img src="../images/bg-2.jpeg">
                </div>
            </div>

            <!-- CONTENT START -->
             <div class="content">
            <div class="register-container">
    <div class="title">Add</div>
    <div class="content">
      <form action="config/insertorphanage.php" method="post" enctype="multipart/form-data">
        <div class="user-details">
          <div class="input-box">
            <span class="details">Name</span>
            <input type="text" placeholder="Enter orphanage name" name="orphanage_name" required>
          </div>
          <div class="input-box">
            <span class="details">Description</span>
            <input type="text" placeholder="Enter orphanage description" name="orphanage_desc" required>
          </div>
          <div class="input-box">
            <span class="details">Category</span>
            <select id="orphanage_category" name="orphanage_category" required>
                                <option value="">Select the Category</option>
                                <option value="Child">Child</option>
                                <option value="Old">Old</option>
                                <option value="Mentally Disabled">Mentally Disabled</option>
                                <option value="Physically Disabled">Physically Disabled</option>
                                <option value="All">All</option>
                            </select>
          </div>
          <div class="input-box">
            <span class="details">Location</span>
            <input type="text" placeholder="Enter orphanage Location" name="orphanage_location" required>
          </div>
          <div class="input-box">
            <span class="details">Contact</span>
            <input type="text" placeholder="Enter Contact Details" name="orphanage_contact" required>
          </div>
          <div class="input-box">
            <span class="details">Image</span>
            <input type="file" name="orphanage_image" required>
          </div>
        </div>
        
        <div class="button">
          <input type="submit" value="Add">
        </div>
      </form>
    </div>
  </div></div>
            <!-- CONTENT END -->
         </div>
    </div>
</body>
</html>
<script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
<script src="js/script.js"></script>
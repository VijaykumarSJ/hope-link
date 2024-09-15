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
                    <img src="../assets/images/hand.jpg">
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
            <select id="orphanage_location" name="orphanage_location" required>
                                <option value="" selected disabled>Select the District</option>
                                <option value="chennai">Chennai</option>
                                <option value="coimbatore">Coimbatore</option>
                                <option value="cuddalore">Cuddalore</option>
                                <option value="dharmapuri">Dharmapuri</option>
                                <option value="dindigul">Dindigul</option>
                                <option value="erode">Erode</option>
                                <option value="kancheepuram">Kancheepuram</option>
                                <option value="kanyakumari">Kanyakumari</option>
                                <option value="karur">Karur</option>
                                <option value="krishnagiri">Krishnagiri</option>
                                <option value="madurai">Madurai</option>
                                <option value="nagapattinam">Nagapattinam</option>
                                <option value="namakkal">Namakkal</option>
                                <option value="nilgiris">Nilgiris</option>
                                <option value="perambalur">Perambalur</option>
                                <option value="pudukkottai">Pudukkottai</option>
                                <option value="ramanathapuram">Ramanathapuram</option>
                                <option value="salem">Salem</option>
                                <option value="sivagangai">Sivagangai</option>
                                <option value="tenkasi">Tenkasi</option>
                                <option value="thanjavur">Thanjavur</option>
                                <option value="theni">Theni</option>
                                <option value="thoothukudi">Thoothukudi</option>
                                <option value="tiruchirappalli">Tiruchirappalli</option>
                                <option value="tirunelveli">Tirunelveli</option>
                                <option value="tirupur">Tirupur</option>
                                <option value="tiruvallur">Tiruvallur</option>
                                <option value="tiruvannamalai">Tiruvannamalai</option>
                                <option value="vellore">Vellore</option>
                                <option value="villupuram">Villupuram</option>
                                <option value="virudhunagar">Virudhunagar</option>
                            </select>
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
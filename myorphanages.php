    <?php include 'header.php'; ?>
    <?php include 'db-connection.php'; ?>
    <?php
        
    ?>
   <!-- Page Content-->
            <div class="container px-5 my-5">
                <div class="text-center mb-5">
                    <h1 class="display-5 fw-bolder mb-0"><span class="text-gradient d-inline">Our Orphanages</span></h1>
                </div>
                <!-- FILTER OPTION -->
                <div class="container mb-5">
    <div class="row d-flex justify-content-center">
        <div class="col-md-8">
            <div class="card p-3 shadow border-0 py-4">
                <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
                <h5 class="text-primary">An Easier Way to Find Your Orphanages</h5>
                <div class="row g-3 mt-2">
                    <!-- District Dropdown -->
                    <div class="col-md-4">
                        <div class="dropdown">
                            <select class="form-control bg-primary text-light" name="district" required>
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
                    </div>

                    <!-- Category Dropdown -->
                    <div class="col-md-4">
                        <div class="dropdown">
                            <select class="form-control bg-primary text-light" name="category" required>
                                <option value="" selected disabled>Select the Category</option>
                                <option value="Child">Child</option>
                                <option value="Old">Old</option>
                                <option value="Mentally Disabled">Mentally Disabled</option>
                                <option value="Physically Disabled">Physically Disabled</option>
                                <option value="All">All</option>
                            </select>
                        </div>
                    </div>

                    <!-- Search Button -->
                    <div class="col-md-4">
                        <button type="submit" name="submit" class="btn btn-outline-primary btn-block">Search Results</button>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

                <!-- FILTER OPTION END -->


                <div class="row gx-5 justify-content-center">
                    <div class="col-lg-11 col-xl-9 col-xxl-8">
                        <!-- Experience Section-->
                        <?php
                            if(isset($_POST['submit']))
                            { ?>
                                <h4 class="mb-5">Your Results</h4>
                                <?php
                            }
                        ?>
                        <section>
                            
                            <!-- Experience Card 1-->
                            
                            <?php
                            if(isset($_POST['submit']))
                            {
                                $category =  $_POST['category'];
                                $district =  $_POST['district'];
                                $sql = "SELECT * FROM myorphanages_tbl WHERE orphanage_category = '$category' AND orphanage_location = '$district'";
                            }
                            else
                            {
                        $sql = "SELECT * FROM myorphanages_tbl";

                            }
                        $result = $conn->query($sql);
                        
                        if ($result->num_rows > 0) {
                          // output data of each row
                          while($row = $result->fetch_assoc()) {
                      ?>
                            <div class="card shadow border-0 rounded-4 mb-5">
                                <div class="card-body p-5">
                                    <div class="row align-items-center gx-5">
                                        <div class="col text-center text-lg-start mb-4 mb-lg-0">
                                            <div class="bg-light p-4 rounded-4">
                                                <img src="<?php echo "uploads/".$row["orphanage_image"]; ?>" class="w-100" alt="<?php echo $row["orphanage_image"]; ?>">
                                            </div>
                                        </div>
                                        <div class="col-lg-8">
                                                <div class="small fw-bolder"><?php echo $row["orphanage_name"]; ?></div>
                                            <div class="text-primary fw-bolder mb-2 mt-2"><?php echo $row["orphanage_category"]; ?></div>
                                                <div class="small text-muted mb-2"><?php echo $row["orphanage_location"]; ?></div>
                                                <div>Lorem ipsum dolor sit amet consectetur adipisicing elit. Delectus laudantium, voluptatem quis repellendus eaque sit animi illo ipsam amet officiis corporis sed aliquam non voluptate corrupti excepturi maxime porro fuga.</div></div>
                                    </div>
                                </div>
                            </div>
                            <?php
                          }
                        }
                          else {
                            echo "Sorry! Not Found";
                          }
                          $conn->close();
                    ?>
                        </section>

                        <!-- Divider-->
                        <div class="pb-5"></div>
                    </div>
                </div>
            </div>
            <!-- Bootstrap core JS-->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
        <!-- Core theme JS-->
        <script src="js/scripts.js"></script>
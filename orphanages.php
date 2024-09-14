    <?php include 'header.php'; ?>
    <?php include 'db-connection.php'; ?>

   <!-- Page Content-->
            <div class="container px-5 my-5">
                <div class="text-center mb-5">
                    <h1 class="display-5 fw-bolder mb-0"><span class="text-gradient d-inline">Our Orphanages</span></h1>
                </div>
                <div class="row gx-5 justify-content-center">
                    <div class="col-lg-11 col-xl-9 col-xxl-8">
                        <!-- Experience Section-->
                        <section>
                            
                            <!-- Experience Card 1-->
                            
                            <?php
                        $sql = "SELECT * FROM orphanage_tbl WHERE status=1";
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
                            echo "No Orphanages";
                          }
                          $conn->close();
                    ?>
                        </section>

                        <!-- Divider-->
                        <div class="pb-5"></div>
                    </div>
                </div>
            </div>
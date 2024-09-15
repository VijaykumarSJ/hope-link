                <?php

                    include 'db-connection.php';
                    
                    $uploadDirectory = "uploads/";

                      session_start();


                    if (isset($_POST['submit'])) {

                        // Grab the profile data from the POST
                        $category = mysqli_real_escape_string($conn, trim($_POST['category']));

                        if($category == "Orphanage")
                        {
                            $username = mysqli_real_escape_string($conn, trim($_POST['orphanage_username']));
                            $email = mysqli_real_escape_string($conn, trim($_POST['orphanage_email']));
                            $password = mysqli_real_escape_string($conn, trim($_POST['orphanage_password']));

                            $orphanage_name = mysqli_real_escape_string($conn, trim($_POST['orphanage_name']));
                            $orphanage_category = mysqli_real_escape_string($conn, trim($_POST['orphanage_category']));
                            $orphanage_image = mysqli_real_escape_string($conn, trim($_FILES["orphanage_image"]["name"]));
                            $orphanage_location = mysqli_real_escape_string($conn, trim($_POST['orphanage_location']));
                            $orphanage_address = mysqli_real_escape_string($conn, trim($_POST['orphanage_address']));
                            $orphanage_phone = mysqli_real_escape_string($conn, trim($_POST['orphanage_phone']));
                            if($_POST['orphanage_site'] == null)
                            { 
                                $orphanage_site = 0; 
                            }
                            else
                            { 
                                $orphanage_site = $_POST['orphanage_site']; 
                            }
                        }
                        else
                        {
                            $username = mysqli_real_escape_string($conn, trim($_POST['publ_username']));
                            $email = mysqli_real_escape_string($conn, trim($_POST['public_email']));
                            $password = mysqli_real_escape_string($conn, trim($_POST['public_password']));
                        }
                        
                        // Make sure someone isn't already registered using this username
                        $query = "SELECT * FROM user_tbl WHERE username = '$username'";
                        $data = mysqli_query($conn, $query);
                        if (mysqli_num_rows($data) == 0) {
                            // The username is unique, so insert the data into the database
                            $query = "INSERT INTO user_tbl (username, email, password, category) VALUES ('$username', '$email', SHA('$password'), '$category')";
                            mysqli_query($conn, $query);

                            $orphanage_id = $conn->insert_id;

                            if ($category == "Orphanage") {

                                $query = "INSERT INTO orphanage_tbl (orphanage_id, orphanage_name, orphanage_category, orphanage_image, address, phone, site,orphanage_location) VALUES ('$orphanage_id', '$orphanage_name', '$orphanage_category', '$orphanage_image','$orphanage_address','$orphanage_phone','$orphanage_site','$orphanage_location')";

                               
                                mysqli_query($conn, $query);

                                if (move_uploaded_file(
                                    $_FILES["orphanage_image"]["tmp_name"],
                                    $uploadDirectory . $_FILES["orphanage_image"]["name"]
                                    )) {
                                    echo "File uploaded successfully!";
                                } else {
                                    echo "Error moving file.";
                                }

                                 
                            }

                            // Confirm success with the user
                            echo "<script>alert('New Account Created Successfully');</script>";
                            header('Location: index.php');
                            mysqli_close($conn);
                        }
                        else {
                        echo "<script>alert('Username Already Exists!');</script>";
                        }
                    }

                ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Hope Link</title>
  <link href="https://fonts.googleapis.com/css?family=Karla:400,700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <link rel="stylesheet" href="https://cdn.materialdesignicons.com/4.8.95/css/materialdesignicons.min.css">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
  <link rel="stylesheet" href="assets/css/sign-up.css">
</head>
<body>
  <!-- Navbar-->
<header class="header">
    <nav class="navbar navbar-expand-lg navbar-light py-3">
        <div class="container">
            <!-- Navbar Brand -->
            <a href="#" class="navbar-brand">
                <img src="assets/images/logo.png" alt="logo" width="150">
            </a>
        </div>
    </nav>
</header>


<div class="container">
    <div class="row py-5 align-items-center">
        <!-- For Demo Purpose -->
        <div class="col-md-5 pr-lg-5 mb-5 mb-md-0">
            <img src="assets/images/orphanage_vector.png" alt="" class="img-fluid mb-3 d-none d-md-block">
            <h1>Create an Account</h1>
            </p>
        </div>

        <!-- Registeration Form -->
        <div class="col-md-7 col-lg-6 ml-auto">
            <form  method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>" enctype="multipart/form-data" id="validationCheck">
                <div class="row">

                    <!-- Role -->
                    <div class="input-group col-lg-12 mb-4">
                        <div class="input-group-prepend">
                            <span class="input-group-text bg-white px-4 border-md border-right-0">
                                <i class="fa fa-black-tie text-muted"></i>
                            </span>
                        </div>
                        <select id="role" name="category" class="form-control custom-select bg-white border-left-0 border-md"  onchange="updateForm()" required>
                            <option value="" selected disabled>Choose your Role</option>
                            <option value="Orphanage">Orphanage</option>
                            <option value="Public">Public</option>
                        </select>
                    </div>

                    <!-- ORPHANAGE FORM -->
                    <div id="orphanage" class="col-lg-12">
                          <!-- Orphanage Name -->
                        <div class="input-group col-lg-12 mb-4">
                            <div class="input-group-prepend">
                                <span class="input-group-text bg-white px-4 border-md border-right-0">
                                    <i class="fa fa-envelope text-muted"></i>
                                </span>
                            </div>
                            <input id="orphanage_name" type="text" name="orphanage_name" placeholder="Orphanage Name" class="form-control bg-white border-left-0 border-md" required>
                        </div>

                        <!-- Orphanage Category -->
                        <div class="input-group col-lg-12 mb-4">
                            <div class="input-group-prepend">
                                <span class="input-group-text bg-white px-4 border-md border-right-0">
                                    <i class="fa fa-black-tie text-muted"></i>
                                </span>
                            </div>
                            <select id="orphanage_category" name="orphanage_category" class="form-control custom-select bg-white border-left-0 border-md" required>
                                <option value="">Select the Category</option>
                                <option value="Child">Child</option>
                                <option value="Old">Old</option>
                                <option value="Mentally Disabled">Mentally Disabled</option>
                                <option value="Physically Disabled">Physically Disabled</option>
                                <option value="All">All</option>
                            </select>
                        </div>

                        <!-- Orphanage Image -->
                        <div class="input-group col-lg-12 mb-4">
                          <div class="input-group-prepend">
                                <span class="input-group-text bg-white px-4 border-md border-right-0">
                                    <i class="fa fa-upload text-muted"></i>
                                </span>
                            </div>
                          <div class="custom-file">
                            <input type="file" class="form-control bg-white border-left-0 border-md custom-file-input" id="inputGroupFile01" name="orphanage_image" required>
                            <label class="custom-file-label" for="inputGroupFile01">Choose Image</label>
                          </div>
                        </div>

                        <!-- Orphanage Address -->
                        <div class="input-group col-lg-12 mb-4">
                            <div class="input-group-prepend">
                                <span class="input-group-text bg-white px-4 border-md border-right-0">
                                    <i class="fa fa-address-card text-muted"></i>
                                </span>
                            </div>
                            <textarea placeholder="Enter Address" id="orphanage_address" name="orphanage_address" class="form-control border-left-0 border-md" rows="1" required></textarea>
                        </div>

                        <!-- Orphanage Phone Number -->
                        <div class="input-group col-lg-12 mb-4">
                            <div class="input-group-prepend">
                                <span class="input-group-text bg-white px-4 border-md border-right-0">
                                    <i class="fa fa-phone text-muted"></i>
                                </span>
                            </div>
                            <input id="orphanage_phone" type="number" name="orphanage_phone" onchange="validatePhoneNumber()" placeholder="Phone Number" class="form-control bg-white border-left-0 border-md" required>
                        </div> 

                        <!-- Orphanage Site -->
                        <div class="input-group col-lg-12 mb-4">
                            <div class="input-group-prepend">
                                <span class="input-group-text bg-white px-4 border-md border-right-0">
                                    <i class="fa fa-globe text-muted"></i>
                                </span>
                            </div>
                            <input id="orphanage_site" type="text" name="orphanage_site" placeholder="Website Url" class="form-control bg-white border-left-0 border-md">
                        </div> 

                        <!-- Orphanage Location -->
                        <div class="input-group col-lg-12 mb-4">
                            <div class="input-group-prepend">
                                <span class="input-group-text bg-white px-4 border-md border-right-0">
                                    <i class="fa fa-map-marker text-muted"></i>
                                </span>
                            </div>
                            <select id="orphanage_location" name="orphanage_location" class="form-control custom-select bg-white border-left-0 border-md" required>
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

                        <!-- Orphanage User Name -->
                        <div class="input-group col-lg-12 mb-4">
                            <div class="input-group-prepend">
                                <span class="input-group-text bg-white px-4 border-md border-right-0">
                                    <i class="fa fa-user text-muted"></i>
                                </span>
                            </div>
                            <input id="orphanage_username" type="text" name="orphanage_username" placeholder="User Name" class="form-control bg-white border-left-0 border-md" required>
                        </div> 

                        <!-- Email Address -->
                        <div class="input-group col-lg-12 mb-4">
                            <div class="input-group-prepend">
                                <span class="input-group-text bg-white px-4 border-md border-right-0">
                                    <i class="fa fa-envelope text-muted"></i>
                                </span>
                            </div>
                            <input id="email" type="email" name="orphanage_email" placeholder="Email Address" class="form-control bg-white border-left-0 border-md" required>
                        </div>

                        <!-- Password -->
                        <div class="input-group col-lg-12 mb-4">
                            <div class="input-group-prepend">
                                <span class="input-group-text bg-white px-4 border-md border-right-0">
                                    <i class="fa fa-lock text-muted"></i>
                                </span>
                            </div>
                            <input id="orphanage_password" type="password" name="orphanage_password" placeholder="Password" class="form-control bg-white border-left-0 border-md" required>
                        </div>
                    </div>

                    <!-- PUBLIC FORM -->
                    <div id="public" class="col-lg-12">
                          
                        <!-- User Name -->
                        <div class="input-group col-lg-12 mb-4">
                            <div class="input-group-prepend">
                                <span class="input-group-text bg-white px-4 border-md border-right-0">
                                    <i class="fa fa-user text-muted"></i>
                                </span>
                            </div>
                            <input id="public_username" type="text" name="publ_username" placeholder="User Name" class="form-control bg-white border-left-0 border-md"  required>
                        </div>  

                        <!-- Email Address -->
                        <div class="input-group col-lg-12 mb-4">
                            <div class="input-group-prepend">
                                <span class="input-group-text bg-white px-4 border-md border-right-0">
                                    <i class="fa fa-envelope text-muted"></i>
                                </span>
                            </div>
                            <input id="public_email" type="email" name="public_email" placeholder="Email Address" class="form-control bg-white border-left-0 border-md" required>
                        </div>

                        <!-- Password -->
                        <div class="input-group col-lg-12 mb-4">
                            <div class="input-group-prepend">
                                <span class="input-group-text bg-white px-4 border-md border-right-0">
                                    <i class="fa fa-lock text-muted"></i>
                                </span>
                            </div>
                            <input id="public_password" type="text" name="public_password" placeholder="Password" class="form-control bg-white border-left-0 border-md" required>
                        </div>
                    </div>


                    <!-- Submit Button -->
                    <div id="submit-button" class="form-group col-lg-12 mx-auto mb-0">
                        <input class="btn btn-primary btn-block py-2" type="submit" name="submit">
                        <!-- <a href="#" >
                            <span class="font-weight-bold">Create your account</span>
                        </a> -->
                    </div>

                    <!-- Divider Text -->
                    <div class="form-group col-lg-12 mx-auto d-flex align-items-center my-4">
                        <div class="border-bottom w-100 ml-5"></div>
                        <span class="px-2 small text-muted font-weight-bold text-muted">OR</span>
                        <div class="border-bottom w-100 mr-5"></div>
                    </div>

                    <!-- Already Registered -->
                    <div class="text-center w-100">
                        <p class="text-muted font-weight-bold">Already Registered? <a href="index.php" class="text-primary ml-2">Login</a></p>
                    </div>

                </div>
            </form>
        </div>
    </div>
</div>

  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
</body>
</html>

<script type="text/javascript">
  function updateForm() {
    const role = document.getElementById('role');
    const public = document.getElementById('public');
    const orphanage = document.getElementById('orphanage');
    const submit_button = document.getElementById('submit-button');

    const public_username = document.getElementById('public_username');
    const public_email = document.getElementById('public_email');
    const public_password = document.getElementById('public_password');

    if (role.value === 'Orphanage') {
        orphanage.style.display = "block";
        public.style.display = "none";
        submit_button.style.display = "block";
        
        public_username.required = false;
        public_email.required =false;
        public_password.required = false;

        orphanage.querySelectorAll('input').forEach((e)=>{e.required=true;})
        document.getElementById('orphanage_location').required = true;
        document.getElementById('orphanage_category').required = true;
        document.querySelector("textarea").required = true;
    } else if (role.value === 'Public') {
        orphanage.style.display = "none";
        public.style.display = "block";
        submit_button.style.display = "block";
        
        public_username.required = true;
        public_email.required = true;
        public_password.required = true;

        orphanage.querySelectorAll('input').forEach((e)=>{e.required=false;})
        document.getElementById('orphanage_category').required = false;
        document.getElementById('orphanage_location').required = false;
        document.querySelector("textarea").required = false;
    }
    document.getElementById('orphanage_site').required = false;
}

    function validatePhoneNumber() {

        const phoneNumber = document.getElementById('orphanage_phone').value.trim();

        const pattern = /^\d{10}$/;

        const isValid = pattern.test(phoneNumber);
        if(!isValid)
        {
            alert('Please Enter a valid 10-digit phoneNumber');
        }

        return isValid;
    }

    document.addEventListener('DOMContentLoaded', function() {

    // Event listener for form submission
    document.getElementById('validationCheck').addEventListener('submit', function(event) {

        // Validate phone number; prevent submission if invalid
        if (!validatePhoneNumber()) {
            event.preventDefault(); // Stops form submission for invalid number
        }
    });
});
</script>
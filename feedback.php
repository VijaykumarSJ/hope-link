    <?php

                    include 'db-connection.php';


            if (isset($_POST['submit'])) {
                        
                        $name = mysqli_real_escape_string($conn, trim($_POST['fullname']));
                        $email = mysqli_real_escape_string($conn, trim($_POST['email']));
                        $phone = mysqli_real_escape_string($conn, trim($_POST['phone']));
                        $message = mysqli_real_escape_string($conn, trim($_POST['message']));

                        $query = "INSERT INTO feedback_tbl (name, email, phone, message) VALUES ('$name', '$email', '$phone', '$message')";
                            mysqli_query($conn, $query);


                            echo "<script>alert('Your Feedback Submitted Successfully');</script>";
                            mysqli_close($conn);
                        }
                        

                ?>
    <?php include 'header.php'; ?>
  <!-- Page content-->
            <section class="py-5">
                <div class="container px-5">
                    <!-- Contact form-->
                    <div class="bg-light rounded-4 px-4 px-md-5">
                        <div class="text-center mb-5">
                            <h1 class="fw-bolder">Hope Link</h1>
                            <p class="lead fw-normal text-muted mb-0">Give your Feedback</p>
                        </div>
                        <div class="row gx-5 justify-content-center">
                            <div class="col-lg-8 col-xl-6">
                                <form method="POST" id="contactForm" action="<?php echo $_SERVER['PHP_SELF']; ?>">
                                    <!-- Name input-->
                                    <div class="form-floating mb-3">
                                        <input class="form-control" name="fullname" id="name" type="text" placeholder="Enter your name..." data-sb-validations="required" />
                                        <label for="name">Full name</label>
                                        <div class="invalid-feedback" data-sb-feedback="name:required">A name is required.</div>
                                    </div>
                                    <!-- Email address input-->
                                    <div class="form-floating mb-3">
                                        <input class="form-control"  name="email" id="email" type="email" placeholder="name@example.com" data-sb-validations="required,email" />
                                        <label for="email">Email address</label>
                                        <div class="invalid-feedback" data-sb-feedback="email:required">An email is required.</div>
                                        <div class="invalid-feedback" data-sb-feedback="email:email">Email is not valid.</div>
                                    </div>
                                    <!-- Phone number input-->
                                    <div class="form-floating mb-3">
                                        <input class="form-control"  name="phone" id="phone" type="tel" placeholder="(123) 456-7890" data-sb-validations="required" />
                                        <label for="phone">Phone number</label>
                                        <div class="invalid-feedback" data-sb-feedback="phone:required">A phone number is required.</div>
                                    </div>
                                    <!-- Message input-->
                                    <div class="form-floating mb-3">
                                        <textarea class="form-control" name="message" id="message" type="text" placeholder="Enter your message here..." style="height: 10rem" data-sb-validations="required"></textarea>
                                        <label for="message">Message</label>
                                        <div class="invalid-feedback" data-sb-feedback="message:required">A message is required.</div>
                                    </div>
                                    <!-- Submit Button-->
                                    <div class="d-grid"><button class="btn btn-primary btn-lg" id="submitButton" name="submit" type="submit">Submit</button></div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <script type="text/javascript">
    if ( window.history.replaceState ) {
window.history.replaceState( null, null, window.location.href );
}
  </script>
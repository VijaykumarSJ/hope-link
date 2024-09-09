<?php
                include 'db-connection.php';

                // Clear the error message
                $error_msg = "";

                // If the user isn't logged in, try to log them in
                if (!isset($_SESSION['user_id'])) {
                    if (isset($_POST['submit'])) {

                    // Grab the user-entered log-in data
                    $user_username = mysqli_real_escape_string($conn, trim($_POST['username']));
                    $user_password = mysqli_real_escape_string($conn, trim($_POST['password']));

                    if (!empty($user_username) && !empty($user_password)) {
                        // Look up the username and password in the database
                        $query = "SELECT username, password FROM user_tbl WHERE username = '$user_username' AND password = SHA('$user_password')";
                        $data = mysqli_query($conn, $query);

                        if (mysqli_num_rows($data) == 1) {
                        // The log-in is OK so set the user ID and username session vars (and cookies), and redirect to the home page
                        $row = mysqli_fetch_array($data);
                        $_SESSION['user_id'] = $row['id'];
                        $_SESSION['username'] = $row['username'];
                        setcookie('user_id', $row['id'], time() + (60 * 60 * 24 * 30));    // expires in 30 days
                        setcookie('username', $row['username'], time() + (60 * 60 * 24 * 30));  // expires in 30 days
                        $home_url = 'http://' . $_SERVER['HTTP_HOST'] . dirname($_SERVER['PHP_SELF']) . '/home.php';
                        $admin_page = './admin/index.php';
                        header('Location: ' . $home_url);
                        }
                        else {
                        // The username/password are incorrect so set an error message
                        $error_msg = "<script>alert('Invalid Username or Password');</script>";
                        }
                    }
                    else {
                        // The username/password weren't entered so set an error message
                        $error_msg = '<div class="ui warning message">Enter Username and Password</div>';
                    }
                    }
                }
                else
                {
                  echo "okay";
                  exit();
                }

                // If the session var is empty, show any error message and the log-in form; otherwise confirm the log-in
                if (empty($_SESSION['user_id'])) {
                    echo '<p class="error">' . $error_msg . '</p>';
                ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Hope Link</title>
  <link href="https://fonts.googleapis.com/css?family=Karla:400,700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.materialdesignicons.com/4.8.95/css/materialdesignicons.min.css">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
  <link rel="stylesheet" href="assets/css/login.css">
</head>
<body>
  <main class="d-flex align-items-center min-vh-100 py-3 py-md-0">
    <div class="container">
      <div class="card login-card">
        <div class="row no-gutters">
          <div class="col-md-5">
            <img src="assets/images/login.jpg" alt="login" class="login-card-img">
          </div>
          <div class="col-md-7">
            <div class="card-body">
              <div class="brand-wrapper">
                <img src="assets/images/logo.png" alt="logo" class="logo">
              </div>
              <p class="login-card-description">Sign in</p>
              <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
                  <div class="form-group">
                    <label for="username" class="sr-only">Enter Username</label>
                    <input type="text" name="username" id="username" class="form-control" placeholder="Enter Username" required>
                  </div>
                  <div class="form-group mb-4">
                    <label for="password" class="sr-only">Password</label>
                    <input type="password" name="password" id="password" class="form-control" placeholder="***********" required>
                  </div>
                  <input name="submit" id="login" class="btn btn-block login-btn mb-4" type="submit" value="Login">
                </form>
                <p class="login-card-footer-text">Don't have an account? <a href="sign-up.php" class="text-reset">Register here</a></p>
                    
                     <?php
                }
                else {
                    // Confirm the successful log-in
                    echo('<p class="login">You are logged in as ' . $_SESSION['username'] . '.</p>');
                }
                ?>


            </div>
          </div>
        </div>
      </div>
      <!-- <div class="card login-card">
        <img src="assets/images/login.jpg" alt="login" class="login-card-img">
        <div class="card-body">
          <h2 class="login-card-title">Login</h2>
          <p class="login-card-description">Sign in to your account to continue.</p>
          <form action="#!">
            <div class="form-group">
              <label for="email" class="sr-only">Email</label>
              <input type="email" name="email" id="email" class="form-control" placeholder="Email">
            </div>
            <div class="form-group">
              <label for="password" class="sr-only">Password</label>
              <input type="password" name="password" id="password" class="form-control" placeholder="Password">
            </div>
            <div class="form-prompt-wrapper">
              <div class="custom-control custom-checkbox login-card-check-box">
                <input type="checkbox" class="custom-control-input" id="customCheck1">
                <label class="custom-control-label" for="customCheck1">Remember me</label>
              </div>              
              <a href="#!" class="text-reset">Forgot password?</a>
            </div>
            <input name="login" id="login" class="btn btn-block login-btn mb-4" type="button" value="Login">
          </form>
          <p class="login-card-footer-text">Don't have an account? <a href="#!" class="text-reset">Register here</a></p>
        </div>
      </div> -->
    </div>
  </main>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
</body>
</html>

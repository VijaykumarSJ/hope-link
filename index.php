<?php
                include 'db-connection.php';

                session_start();

                $error_msg = "";

                    if (isset($_POST['submit'])) {

                    $user_username = mysqli_real_escape_string($conn, trim($_POST['username']));
                    $user_password = mysqli_real_escape_string($conn, trim($_POST['password']));

                    if (!empty($user_username) && !empty($user_password)) 
                    {

                        $query = "SELECT username, password FROM user_tbl WHERE username = '$user_username' AND password = SHA('$user_password')";

                        $data = mysqli_query($conn, $query);

                        if (mysqli_num_rows($data) == 1) 
                        {

                            $row = mysqli_fetch_array($data);

                            $_SESSION['user_id'] = $row['id'];
                            $_SESSION['username'] = $row['username'];
                            
                            $home_url = 'http://' . $_SERVER['HTTP_HOST'] . dirname($_SERVER['PHP_SELF']) . '/home.php';

                            $admin_page = './admin/index.php';

                            header('Location: ' . $home_url);
                        }
                        else {
                        // The username/password are incorrect so set an error message
                        $error_msg = "<script>alert('Incorrect Username or Password');</script>";
                        echo $error_msg;
                        }
                    }
                    else {
                        // The username/password weren't entered so set an error message
                        $error_msg = '<div class="ui warning message">Enter Username and Password</div>';
                    }
                  }
                
                if(!isset($_SESSION['username']))
                {

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
            </div>
          </div>
        </div>
      </div>
    </div>
    </main>
    <?php
  }
  else
  {
      ?>

        <div class="error-container">
          <h1 class="error-heading"><?php echo "You are logged in as ".$_SESSION['username']; ?></h1>
          <a href="home.php"><button class="error-btn">Back to Home</button></a>
        </div>

      <?php
  }
  ?>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
  <script type="text/javascript">
    if ( window.history.replaceState ) {
window.history.replaceState( null, null, window.location.href );
}
  </script>
</body>
</html>
<style type="text/css">
  @import url("https://fonts.googleapis.com/css2?family=Fira+Sans:wght@200;500&display=swap");
  *
  {
    padding: 0;
    margin: 0;
  }
  .error-container
{
  display: flex;
  flex-direction: column;
  justify-content: center;
  align-items: center;
  height: 100vh;
  width: 100%;
  background-color: #000;
}
.error-heading
{
  color: #fff;
  font-family: "Fira Sans", sans-serif;
  font-weight: bolder;
}
.error-btn
{
  background-color: #000;
  color: #fff;
  border: 2px solid white;
  padding: 15px;
  border-radius: 12px;
  font-family: "Fira Sans", sans-serif;
  font-weight: bolder;
  margin: 25px;
  letter-spacing: 2px;
}
.error-btn:hover
{
  background-color: #fff;
  color: #000;
}
</style>
<?php
// Include your database connection
include('config/config.php');

// Start the session
session_start();

if (isset($_POST['login'])) {
  // Get form values and trim
  $email = trim($_POST['email']);
  $password = trim($_POST['password']);

  // Sanitize input
  $email = mysqli_real_escape_string($conn, $email);

  // Query to fetch user by email
  $sql = "SELECT * FROM `user` WHERE email = '$email'";
  $result = mysqli_query($conn, $sql);

  // Check if user exists
  if (mysqli_num_rows($result) > 0) {
    $row = mysqli_fetch_assoc($result);  // Fetch user row

    // Verify the password
    if ($row['password'] == $password) {
      $_SESSION['user_name'] = $row['name']; // Set session with the user's name
      $_SESSION['success'] = "Login successful!"; // Optional success message
      header('Location: dashboard.php'); // Redirect to dashboard
      exit(); // Ensure no further code is executed after redirection
    } else {
      $_SESSION['error'] = "Password is incorrect"; // Set error session variable
      header('Location: index.php'); // Redirect to the login page (or homepage)
      exit();
    }
  } else {
    $_SESSION['error'] = "No such user available"; // Set error session variable
    header('Location: index.php'); // Redirect to the login page (or homepage)
    exit();
  }
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Login</title>
  <link href="./assets/css/bootstrap.min.css" rel="stylesheet" />
  <link rel="stylesheet" href="assets/css/style.css" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" crossorigin="anonymous" />
</head>

<body>
    <!-- Display success message -->
    <?php if (isset($_SESSION['success'])) { ?>
      <div class="alert alert-success alert-dismissible fade show" role="alert">
        <?php echo $_SESSION['success']; ?>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>
    <?php
      unset($_SESSION['success']);
    } ?>

    <!-- Display error message -->
    <?php if (isset($_SESSION['error'])) { ?>
      <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <?php echo $_SESSION['error']; ?>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>
    <?php
      unset($_SESSION['error']);
    } ?>

    <div class="main-login">
      <div class="container d-flex justify-content-center align-items-center vh-100">
        <div class="row">
          <div class="col-md-12 login-form ms-auto">
            <div class="card mb-3" style="max-width: 980px">
              <div class="row g-0">
                <div class="col-md-4">
                  <img src="assets/images/libraray_login-image.jpeg" class="img-fluid rounded-start" alt="Image" />
                </div>
                <div class="col-md-8">
                  <div class="card-body">
                    <h1 class="card-title text-uppercase text-center fw-bold fs-1">Library</h1>
                    <p>Please Enter Email and Password to login</p>

                    <form action="index.php" method="POST">
                      <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Email address</label>
                        <input type="email" class="form-control" name="email" id="exampleInputEmail1" required />
                      </div>
                      <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">Password</label>
                        <input type="password" class="form-control" name="password" id="exampleInputPassword1" required />
                      </div>
                      <button type="submit" name="login" class="btn btn-primary my-4">Login</button>
                      <a href="signup_page.php" class="btn btn-primary">Sign-Up</a>
                    </form>

                    <a href="forgot_password.php" class="card-link my-3 py-3">Forgot Password</a>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js"></script>

</body>

</html>

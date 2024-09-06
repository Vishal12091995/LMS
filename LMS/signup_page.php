<?php
include('config/config.php');
session_start();

if (isset($_POST['user_sign_in'])) {
    // Get form values and trim
    $user_name = trim($_POST['name']);
    $email = trim($_POST['email']);
    $password = trim($_POST['password']);

    // Prepare and sanitize variables before use
    $user_name = mysqli_real_escape_string($conn, $user_name);
    $email = mysqli_real_escape_string($conn, $email);
    $password = mysqli_real_escape_string($conn, $password);

    // Query to check if the user already exists
    $query = "SELECT email FROM `user` WHERE email = '$email'";

    $result = mysqli_query($conn, $query);

    if (mysqli_num_rows($result) > 0) {
        $_SESSION['error']="User Name already present";
        // echo "";
        exit();
    } else {
        // Secure password hashing
        $hashed_password = $password;

        // Insert new user
        $sql_input_name = "INSERT INTO `user` (name, email, password) VALUES ('$user_name', '$email', '$hashed_password')";

        if (mysqli_query($conn, $sql_input_name)) {
            $_SESSION['success']="User Successfully created";
            // echo "User Successfully created";
            header("location:index.php");
        } else {
            $_SESSION['error']="Unable to Create User";
            header("location:index.php");
            // echo "Error: " . mysqli_error($conn);
            exit();
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Sign Up</title>
    <link href="./assets/css/bootstrap.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="assets/css/style.css" />
    <link
        rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css"
        integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg=="
        crossorigin="anonymous"
        referrerpolicy="no-referrer" />
</head>

<body>
    <div class="main-login">
        <div class="container d-flex justify-content-center align-items-center vh-100">
            <div class="row">
                <div class="col-md-12 login-form  ms-auto">
                    <div class="card mb-3" style="max-width: 980px">
                        <div class="row g-0">
                            <div class="col-md-4">
                                <img src="assets/images/libraray_login-image.jpeg" class="img-fluid rounded-start" alt="Image" />
                            </div>
                            <div class="col-md-8">
                                <div class="card-body">
                                    <h1 class="card-title text-uppercase fw-bold fs-1">Library</h1>
                                    <p>Please Enter Email and Password to Sign Up</p>
                                    <form action="" method="POST">
                                        <div class="mb-3">
                                            <label for="exampleInputName1" class="form-label">User Name</label>
                                            <input type="text" class="form-control" name="name" id="exampleInputName1" required />
                                        </div>
                                        <div class="mb-3">
                                            <label for="exampleInputEmail1" class="form-label">Email address</label>
                                            <input type="email" class="form-control" name="email" id="exampleInputEmail1" required />
                                        </div>
                                        <div class="mb-3">
                                            <label for="exampleInputPassword1" class="form-label">Password</label>
                                            <input type="password" class="form-control" name="password" id="exampleInputPassword1" required />
                                        </div>
                                        <button type="submit" name="user_sign_in" class="btn btn-primary my-4">Sign Up</button>
                                        <a href="index.php" class="btn btn-primary">Sign In</a>
                                    <a href="#" class="btn btn-secondary">Reset</a>
                                    </form>
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
<?php
include ('config/config.php');
if(isset($_POST['reset_password'])){
    $check_email_id = trim($_POST['email']);
    $sql = "SELECT * FROM `user` WHERE email = $check_email_id";
    $result = mysqli_query($conn, $sql);
    if(empty(mysqli_num_rows($result))){
        echo "This User is not available";
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Reset Password</title>
    <link
        href="./assets/css/bootstrap.min.css"
        rel="stylesheet" />
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
        <div
            class="container d-flex justify-content-center align-items-center vh-100">
            <div class="row">
                <div class="col-md-12 login-form  ms-auto">
                    <div class="card mb-3" style="max-width: 980px">
                        <div class="row g-0">
                            <div class="col-md-4">
                                <img
                                    src="assets/images/libraray_login-image.jpeg"
                                    class="img-fluid rounded-start"
                                    alt="..." />
                            </div>
                            <div class="col-md-8">
                                <div class="card-body">
                                    <h1
                                        class="card-title text-uppercase text-center fw-bold fs-1">
                                        Library
                                    </h1>
                                    <h3>Reset Password </h3>
                                    <form action="new_password_change.php" method="POST">
                                    <div class="mb-3">
                                            <input
                                                type="hidden"
                                                class="form-control"
                                                id="exampleInputEmail2"
                                                name = "check_email"
                                                value = "<?php echo $check_email_id?>"
                                                aria-describedby="emailHelp" />
                                        </div>
                                        <div class="mb-3">
                                            <label for="exampleInputEmail1" class="form-label">New Password</label>
                                            <input
                                                type="password"
                                                name = "new_password"
                                                class="form-control"
                                                id="exampleInputEmail1"
                                                aria-describedby="emailHelp" />
                                        </div>
                                        <div class="mb-3">
                                            <label for="exampleInputEmail1" class="form-label">Confirm Password</label>
                                            <input
                                                type="password"
                                                name= "confirm_new_password"
                                                class="form-control"
                                                id="exampleInputEmail2"
                                                aria-describedby="emailHelp" />
                                        </div>
                                        <div class="mb-3">
                                            <label for="exampleInputcode" class="form-label">Enter Password Code</label>
                                            <input
                                                type="text"
                                                name = "code"
                                                class="form-control"
                                                id="exampleInputcode"
                                                aria-describedby="emailHelp" />
                                            <button type="submit" name = "new_password_change" class="btn btn-primary my-2">
                                                Submit
                                            </button>
                                    </form>
                                    <div>
                                        <a href="index.php" class="card-link my-3 py-3">Login</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
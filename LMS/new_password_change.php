<?php
include('config/config.php');

if (isset($_POST['new_password_change'])) {
    // Trim and sanitize inputs
    $check_email = trim(mysqli_real_escape_string($conn, $_POST['check_email']));
    $new_password = trim($_POST['new_password']);
    $confirm_new_password = trim($_POST['confirm_new_password']);
    $code = trim($_POST['code']); // Assuming you will use this for some verification later

    // Initialize error array
    $err_msg = [];

    // Check if email is empty
    if (empty($check_email)) {
        $err_msg[] = "Email is empty";
    }

    // Check if new password is empty
    if (empty($new_password)) {
        $err_msg[] = "Please enter the password";
    }

    // Check if passwords match
    if ($new_password != $confirm_new_password) {
        $err_msg[] = "Confirm password does not match";
    }

    // If there are any errors, set error message in session and exit
    if (!empty($err_msg)) {
        $_SESSION['error'] = implode("<br>", $err_msg);
        // header("Location: password_reset_page.php"); // Redirect to the password reset page
        echo $err_msg;
        exit();
    }

    // Update password in the database
    $sql = "UPDATE `user` SET password = '$new_password' WHERE email = '$check_email'";

    // Execute the query
    if (mysqli_query($conn, $sql)) {
        $_SESSION['success'] = "Password has been reset successfully!";
        // header("Location: index.php"); // Redirect to login or success page

        echo "Password updated successfully";
        exit();
    } else {
        $_SESSION['error'] = "Error updating password. Please try again.";
        // header("Location: password_reset_page.php"); // Redirect to the password reset page

        echo "Password not updated";
        exit();
    }
}

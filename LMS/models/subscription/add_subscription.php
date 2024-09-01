<?php
include('../../config/config.php');
session_start();

if (isset($_POST['add_subscription'])) {
    $id = isset($_POST['id']) ? trim($_POST['id']) : null;
    $title = trim($_POST['subs_title']);
    $amount = trim($_POST['subs_amount']);
    $duration = trim($_POST['subs_duration']);
    $datetime = date("Y-m-d H:i:s");
    $error_msg = [];

    // Validation checks
    if (empty($title)) {
        $error_msg[] = "Title cannot be empty.";
    }
    if (empty($amount)) {
        $error_msg[] = "Amount cannot be empty.";
    }
    if (empty($duration)) {
        $error_msg[] = "Duration cannot be empty.";
    }

    if (!empty($error_msg)) {
        $_SESSION['error'] = implode("<br>", $error_msg);
        header('location: ../../subscription/manage_subscription.php');
        exit();
    }

    if (empty($id)) {
        // Insert new subscription
        $sql = "INSERT INTO `subscription_plan` (`title`, `amount`, `duration`, `created_at`) 
                VALUES ('$title', '$amount', '$duration', '$datetime')";
    } else {
        // Update existing subscription
        $sql = "UPDATE `subscription_plan` 
                SET title = '$title', amount = '$amount', duration = '$duration', updated_at = '$datetime' 
                WHERE id = '$id'";
    }

    $result = mysqli_query($conn, $sql);

    if ($result) {
        if (empty($id)) {
            $_SESSION['success'] = "Subscription added successfully.";
        } else {
            $_SESSION['success'] = "Subscription updated successfully.";
        }
    } else {
        $_SESSION['error'] = "Error in processing the request: " . mysqli_error($conn);
    }

    header('location: ../../subscription/manage_subscription.php');
    exit();
} else {
    $_SESSION['error'] = "Form not submitted properly.";
    header('location: ../../subscription/manage_subscription.php');
    exit();
}

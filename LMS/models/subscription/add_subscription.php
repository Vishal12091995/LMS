<?php
include('../../config/config.php');

if (isset($_POST['add_subscription'])) {
    $title = trim($_POST['subs_title']);
    $amount = trim($_POST['subs_amount']);
    $duration = trim($_POST['subs_duration']);
    $datetime = date("Y-m-d H:i:s");
    $error_msg = [];

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

    $sql = "INSERT INTO `subscription_plan` (`title`, `amount`, `duration`, `created_at`) VALUES ('$title', '$amount', '$duration', '$datetime')";
    $result = mysqli_query($conn, $sql);

    if ($result) {
        $_SESSION['success'] = "Subscription uploaded successfully.";
        header('location: ../../subscription/manage_subscription.php');
        exit();
    } else {
        $_SESSION['error'] = "Error in updating values: " . mysqli_error($conn);
        header('location: ../../subscription/manage_subscription.php');
        exit();
    }
} else {
    $_SESSION['error'] = "Form not submitted properly.";
    header('location: ../../subscription/manage_subscription.php');
    exit();
}

<?php
include('../../config/config.php');
session_start();

var_dump($_POST['add_purchase']);

if (isset($_POST['add_purchase'])) {
    $stud_id = trim($_POST['stud_id']);
    $plan_id = trim($_POST['plan_id']);
    $start_date = trim($_POST['start_date']);
    $end_date = trim($_POST['end_date']);
    $datetime = date("Y-m-d H:i:s");

    $err_msg = [];

    if (empty($stud_id)) {
        $err_msg[] = "Please Select Student";
    }
    if (empty($plan_id)) {
        $err_msg[] = "Please Select Plan";
    }
    if (empty($start_date)) {
        $err_msg[] = "Please Select Starting Date";
    }
    if (empty($end_date)) {
        $err_msg[] = "Please Select End Date";
    }

    if (!empty($err_msg)) {
        $_SESSION['error'] = implode("<br>", $err_msg);
        header('Location: ../../subscription/purchase_history.php');
        exit();
    }

    $sql = "INSERT INTO `subscription` (`student_id`, `plan_id`, `start_date`, `end_date`, `created_at`) 
            VALUES ('$stud_id', '$plan_id', '$start_date', '$end_date', '$datetime')";

    $result = mysqli_query($conn, $sql);
    if ($result) {
        $_SESSION['success']= "Purchase Updated Successfully";
        header('Location: ../../subscription/purchase_history.php');
        exit();
    } else {
        // echo "Error in uploading into SQL database: " . mysqli_error($conn);
        exit();
    }
} else {
    $_SESSION['error']= "Error in executing query . mysqli_error($conn)";
    
}

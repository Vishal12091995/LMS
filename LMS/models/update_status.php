<?php
include '../config/config.php';

if (isset($_GET['action']) && $_GET['action'] == 'status') {
    $update_ele_id = $_GET['id'];
    $status = $_GET['status'];

    // Corrected SQL query
    $sql = "UPDATE `books` SET status = $status WHERE id = $update_ele_id";
    $result = mysqli_query($conn, $sql);

    if ($result) {
        echo "Status successfully updated";
        // Redirect to managebooks.php after successful update
        header('Location: ../books/managebooks.php');
        exit(); // It's good practice to exit after redirecting
    } else {
        echo "There was some error in updating the status: " . $conn->error;
        exit();
    }
}
?>

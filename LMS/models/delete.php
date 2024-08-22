<?php
include '../config/config.php';

// Debugging output
echo $_GET['action'];
echo $_GET['id'];

if (isset($_GET['action']) && $_GET['action'] == 'delete') {
    $delete_ele_id = $_GET['id'];
    echo $delete_ele_id;

    // Corrected SQL query: "form" should be "FROM"
    $sql = "DELETE FROM `books` WHERE id = $delete_ele_id";
    $result = mysqli_query($conn, $sql);

    if ($result) {
        echo "Successfully deleted";
        // Make sure output buffering is off or flushed before using header()
        header('Location: ../books/managebooks.php');
        exit(); // It's good practice to exit after redirecting
    } else {
        echo "There was some error in deletion: " . $conn->error;
        exit();
    }
}
?>

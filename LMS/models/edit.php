<?php
session_start(); // Start the session at the top of the script
include('../config/config.php');

// Check if the form was submitted
if (isset($_POST['edit'])) {
    // Capture and sanitize form inputs
    $title = mysqli_real_escape_string($conn, trim($_POST['title']));
    $isbn = mysqli_real_escape_string($conn, trim($_POST['isbn']));
    $author = mysqli_real_escape_string($conn, trim($_POST['author']));
    $pub_year = mysqli_real_escape_string($conn, trim($_POST['publication_year']));
    $category_name = mysqli_real_escape_string($conn, trim($_POST['category_name']));
    $datetime = date("Y-m-d H:i:s");

    // Perform your validation here (this is just a simple example)
    if (empty($title) || empty($isbn) || empty($author) || empty($pub_year) || empty($category_name)) {
        echo $_POST['edit'];
        $_SESSION['error'] = "All fields are required!". $conn->error;
        // header('Location: ../books/managebooks.php');
        exit();
    }

    // If validation passes, you can then update the database or perform other actions
    $eid = mysqli_real_escape_string($conn, trim($_POST['eid']));  // Capture and sanitize `eid`

    $sql = "UPDATE `books` 
            SET title='$title', isbn='$isbn', author='$author', publication_year='$pub_year', category_name='$category_name', updated_at='$datetime'
            WHERE id='$eid'";

    if (mysqli_query($conn, $sql)) {
        $_SESSION['success'] = "Book details updated successfully!";
        header('Location: ../books/managebooks.php');
        exit();
    } else {
        $_SESSION['error'] = "Error updating record: " . mysqli_error($conn);
        header('Location: ../books/managebooks.php');
        exit();
    }
} else {
    $_SESSION['error'] = "Invalid request!";
    header('Location: ../books/managebooks.php');
    exit();
}
?>

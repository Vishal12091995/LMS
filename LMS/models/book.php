<?php
session_start(); // Start the session at the top of the script
include('../config/config.php');

if (isset($_POST['publish'])) {
    $title = trim($_POST['title']);
    $isbn = trim($_POST['isbn']);
    $author = trim($_POST['author']);
    $pub_year = trim($_POST['publication_year']);
    $category_name = trim($_POST['category_name']);
    $datetime = date("Y-m-d H:i:s");

    // Validation
    $errors = [];

    if (empty($title)) {
        $errors[] = 'Title is required.';
    }
    if (empty($isbn)) {
        $errors[] = 'ISBN is required.';
    } else {
        if (!is_isbn_unique($conn, $isbn)) {
            $errors[] = 'ISBN already exists in the database.';
        }
    }
    if (empty($author)) {
        $errors[] = 'Author is required.';
    }
    if (empty($pub_year)) {
        $errors[] = 'Publication year is required.';
    } elseif (!is_numeric($pub_year) || strlen($pub_year) != 4) {
        $errors[] = 'Publication year must be a 4-digit number.';
    }
    if (empty($category_name)) {
        $errors[] = 'Category ID is required.';
    }

    // If there are validation errors, set them in session and redirect
    if (!empty($errors)) {
        $_SESSION['error'] = implode('<br>', $errors);
        header('Location: ../books/add_books.php');
        exit();
    }

    // If validation passes, proceed with the database insertion
    $sql = "INSERT INTO `books`(`title`, `author`, `publication_year`, `isbn`, `category_name`, `created_at`) 
            VALUES ('$title', '$author', '$pub_year', '$isbn', '$category_name', '$datetime')";
    $result = $conn->query($sql);

    if ($result) {
        $_SESSION['success'] = "Book has been created successfully.";
    } else {
        $_SESSION['error'] = "Failed to create the book. Please try again.";
    }
    
    header('Location: ../books/managebooks.php');
    exit();
}

function is_isbn_unique($conn, $isbn) {
    $sql = "SELECT id FROM `books` WHERE isbn = '$isbn'";
    $result = mysqli_query($conn, $sql);

    // Check if any rows were returned
    if (mysqli_num_rows($result) > 0) {
        return false; // ISBN is not unique
    } else {
        return true; // ISBN is unique
    }
}

?>

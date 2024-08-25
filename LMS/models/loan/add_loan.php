<?php
session_start();
include('../../config/config.php');

if (isset($_POST['add_loan'])) {
    $book_id = trim($_POST['book_id']);
    $stud_id = trim($_POST['stud_id']);
    $loan_date = trim($_POST['loan_date']);
    $due_date = trim($_POST['due_date']);
    $datetime = date("Y-m-d H:i:s");

    $session_msg = [];

    if (empty($book_id)) {
        $session_msg[] = "Please select a book.";
    }

    if (empty($stud_id)) {
        $session_msg[] = "Please select a student.";
    }

    if (empty($loan_date)) {
        $session_msg[] = "Please select a loan date.";
    }

    if (empty($due_date)) {
        $session_msg[] = "Please select a due date.";
    }

    if (!empty($session_msg)) {
        $_SESSION['error'] = implode("<br>", $session_msg);
        header('location:../../students/add_student.php');
        exit();
    }

    // Construct SQL query
    $sql = "INSERT INTO `book_loans` (`book_id`, `student_id`, `loan_date`, `return_date`, `created_at`, `updated_at`) 
            VALUES ('$book_id', '$stud_id', '$loan_date', '$due_date', '$datetime', '$datetime')";

    if (mysqli_query($conn, $sql)) {
        $_SESSION['success'] = "Loan added successfully!";
        header('location: ../../loans/manage_loan.php');
        exit();
    } else {
        $_SESSION['error'] = "Error: " . mysqli_error($conn);
        header('location: ../../loans/manage_loan.php');
        exit();
    }
} else {
    $_SESSION['error'] = "Form not submitted properly.";
    header('location: ../../loans/manage_loan.php');
    exit();
}


?>

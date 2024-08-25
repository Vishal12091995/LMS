<?php
session_start();
include('../../config/config.php');

if (isset($_POST['edit_loan'])) {
    $eid = trim($_POST['eid']);
    $book_id = trim($_POST['book_id']);
    $stud_id = trim($_POST['stud_id']);
    $loan_date = trim($_POST['loan_date']);
    $due_date = trim($_POST['due_date']);
    $datetime = date("Y-m-d H:i:s");

    $session_msg = [];

    // Input validation
    if (empty($eid)) {
        $session_msg[] = "Invalid Loan ID.";
    }
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

    // If there are errors, redirect back with error messages
    if (!empty($session_msg)) {
        $_SESSION['error'] = implode("<br>", $session_msg);
        header('Location: ../../loans/edit_loan.php?eid=' . $eid); // Redirect back to the form
        exit();
    }

    // SQL statement to update the loan record
    $sql = "UPDATE `book_loans`
            SET book_id = '$book_id',
                student_id = '$stud_id',
                loan_date = '$loan_date',
                return_date = '$due_date',
                updated_at = '$datetime'
            WHERE id = $eid";

    // Debug: Print the SQL query
    echo $sql; // Comment this line out after debugging

    // Execute the query
    if (mysqli_query($conn, $sql)) {
        $_SESSION['success'] = "Loan details updated successfully!";
        header('Location: ../../loans/manage_loan.php');
        exit();
    } else {
        $_SESSION['error'] = "Error updating record: " . mysqli_error($conn);
        header('Location: ../../loans/manage_loan.php');
        exit();
    }
} else {
    $_SESSION['error'] = "Invalid request!";
    header('Location: ../../loans/manage_loan.php');
    exit();
}

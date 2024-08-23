<?php
include('../../config/config.php');
if(isset($_POST['edit_student'])){
    $sname = trim($_POST['sname']);
    $phno = $_POST['phno'];
    $semail = trim($_POST['semail']);
    $address = trim($_POST['s_address']);
    $datetime = date("Y-m-d H:i:s");
    $eid = trim($_POST['eid']);

    if (empty($sname) || empty($phno) || empty($semail) || empty($address) || empty($eid)) {
        echo $_POST['edit'];
        $_SESSION['error'] = "All fields are required!". $conn->error;
        // header('Location: ../books/managebooks.php');
        exit();
    }

    $sql="UPDATE `students`
        SET name = '$sname',phone_no = '$phno', email = '$semail', address = '$address', Updated_at = '$datetime'
        WHERE id=$eid";

    if (mysqli_query($conn, $sql)) {
        $_SESSION['success'] = "Book details updated successfully!";
        header('Location:../../students/managestudent.php');
        exit();
    } else {
        $_SESSION['error'] = "Error updating record: " . mysqli_error($conn);
        header('Location:../../students./managestudents.php');
        exit();
    }
} else {
    $_SESSION['error'] = "Invalid request!";
    header('Location: ../../students./managestudents.php');
    exit();
}
?>
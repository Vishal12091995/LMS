<?php
session_start();
include('../../config/config.php');

if (isset($_POST['add_student'])) {
    $sname = trim($_POST['sname']);
    $phno = $_POST['phno'];
    $semail = trim($_POST['semail']);
    $address = trim($_POST['s_address']);
    $datetime = date("Y-m-d H:i:s");

    $session_msg=[];
    if(empty($sname)){
        $session_msg[]="User Name Cannot be empty";
    }
    if(empty($phno)){
        $session_msg[]="Please fill the phone number";
    }
    if(empty($semail)){
        $session_msg[]="Please fill the Email Address";
    }
    if(empty($address)){
        $session_msg[]="Please fill the Address";
    }
    
    if(!empty($session_msg)){
        $_SESSION['error']= implode("<br>",$session_msg);
        header('location:../../students/add_student.php');
    }
    if (!empty($sname) && !empty($phno) && !empty($semail) && !empty($address)) {
        // Perform your database insert operation here
        $sql = "INSERT INTO students (name, phone_no, email, address,created_at) VALUES ('$sname', '$phno', '$semail', '$address','$datetime')";
        if (mysqli_query($conn, $sql)) {
            echo "Student added successfully!";
            header('location: ../../students/managestudent.php');
        } else {
            echo "Error: " . $sql . "<br>" . mysqli_error($conn);
        }
    } else {
        echo "Please fill in all required fields.";
    }
} else {
    echo "Form not submitted properly.";
}
?>

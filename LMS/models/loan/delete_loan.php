<?php
include('../../config/config.php');
echo "your are in the delete loan folder";

if(isset($_GET['action'])=="delete_loan"){
    $delete_id = $_GET['id'];
    $sql= "DELETE FROM `book_loans` WHERE id= $delete_id";
    $result = mysqli_query($conn, $sql);
    if($result){
        $_SESSION['success']="Query successfully deleted";
        header('location: ../../loans/manage_loan.php');
        exit();
    }else{
        $_SESSION['error']="Error in deleting Entry ";
        header('location: ../../loans/manage_loan.php');
        exit();
    }
}
?>
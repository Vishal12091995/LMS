<?php
include('../../config/config.php');

if(isset($_GET['action'])&& $_GET['action']=="update_loan_status"){
    $uid = $_GET['id'];
    $update_status = $_GET['status'];

    $sql = "UPDATE `book_loans` SET is_return= $update_status WHERE id=$uid ";

    $result =mysqli_query($conn,$sql);

    if($result){
        header ('location: ../../loans/manage_loan.php');
        exit();
    }else{
        header ('location: ../../loans/manage_loan.php');
    }
}
?>
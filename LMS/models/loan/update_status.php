<?php
include('../../config/config.php');

if(isset($_GET['action'])&& $_GET['action']=="status"){
    $uid = $_GET['id'];
    $update_status = $_GET['status'];

    $sql = "UPDATE `students` SET status= $update_status WHERE id=$uid ";

    $result =mysqli_query($conn,$sql);

    if($result){
        header ('location: ../../students/managestudent.php');
        exit();
    }else{
        header ('location: ../../students/managestudent.php'); 
    }
}
?>
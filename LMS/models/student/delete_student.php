<?php
include('../../config/config.php');
echo " we are in the delete student request";
echo "<pre>";
echo $_GET['action'];
echo "<pre>";
echo $_GET['id'];
if(isset($_GET['action'])=="delete_student"){
    $delete_id = $_GET['id'];
    $sql= "DELETE FROM `students` WHERE id= $delete_id";
    $result = mysqli_query($conn, $sql);
    if($result){
        $_SESSION['success']="Query successfully deleted";
        header('location: ../../students/managestudent.php');
        exit();
    }else{
        $_SESSION['error']="Error in deleting Entry ";
        header('location: ../../students/managestudent.php');
        exit();
    }
}
?>
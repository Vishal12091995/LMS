<?php 
$conn=new mysqli("localhost","root","","lms");
if($conn->connect_error){
    die("connection_aborted".$conn->connect_error);
}

?>
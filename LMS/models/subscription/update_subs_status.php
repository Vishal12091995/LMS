<?php
session_start();
include('../../config/config.php');
if(isset($_GET['action']) && $_GET['action']=='update_subs_status'){
    $updat_status_id =trim($_GET['id']) ;
    $updated_status = trim($_GET['status']);

    $sql = "UPDATE `subscription_plan` 
    SET status= $updated_status
    WHERE id = $updat_status_id ";

    $result = mysqli_query($conn, $sql);

    if($result){
        $_SESSION['success'] = " Subscription is Active";
        header(('location:../../subscription/manage_subscription.php'));
    }else{
        $_SESSION['error'] = " Subscription is Inactive";
        header(('location:../../subscription/manage_subscription.php'));

    }
}
?>
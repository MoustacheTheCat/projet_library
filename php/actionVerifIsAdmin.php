<?php 
if(!isset($_SESSION['adminId']) || !empty($_SESSION['adminId'])){
    $admins = getAllData($db, 'admins');
    foreach($admins as $admin){
        $adminIsAdmin = false;
        if($admin['admin_id'] == $_SESSION['adminId']){
            $_SESSION['message'] = 'You are an admin';
            } 
        $_SESSION['error'] = 'You are not an admin';
    }
    responseMessage();
}
?>
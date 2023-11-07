<?php 
if(!isset($_SESSION['adminId']) || !empty($_SESSION['adminId'])){
    $admins = getAllData($db, 'admins');
    foreach($admins as $admin){
        $adminIsAdmin = false;
        if($admin['admin_id'] == $_SESSION['adminId']){
            $adminIsAdmin = true;
            } 
        return $adminIsAdmin;
    }
    if(!$adminIsAdmin){
        header('Location: ../index.php');
        exit;
    }
}
?>
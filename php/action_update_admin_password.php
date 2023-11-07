<?php
require('config.php');
$adminId = $_SESSION['admin']['admin_id'];
$password = getPassword($db, 'admins', 'adminPassword', 'admin_id', $adminId);
$password = $password[0];
print_r($_POST);
if(isset($_POST['update-password'])){
    if(password_verify($_POST['adminPassword'], $password['adminPassword'])){
        if($_POST['newAdminPassword'] === $_POST['newAdminPasswordConfirm']){
            $data =  $db->prepare("UPDATE admins SET adminPassword = :adminPassword WHERE admin_id = :admin_id");
            $data->execute(array(
                ':adminPassword' => password_hash($_POST['newAdminPassword'],PASSWORD_ARGON2I),
                ':admin_id' => $adminId
            ));
            $_SESSION['response'] = 'Password updated';
            
        }
        else{
            $_SESSION['error'] = 'new password and new password confirm is not identical';
        }
    }
    else{
        $_SESSION['error'] = 'password is incorrect';
    }
    responseMessage();
}

?>
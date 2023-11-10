<?php
require('ActionRequire.php');
if(isset($_SESSION['role']) && $_SESSION['role'] == 'admin'){
    $adminId = $_SESSION['admin']['admins_id'];
    $password = getPassword('admins', 'adminPassword', 'admins_id', $adminId);
    $password = $password[0];
    print_r($_POST);
    if(isset($_POST['update-password'])){
        if(password_verify($_POST['adminPassword'], $password['adminPassword'])){
            if($_POST['newAdminPassword'] === $_POST['newAdminPasswordConfirm']){
                $data =  $db->prepare("UPDATE admins SET adminPassword = :adminPassword WHERE admins_id = :admins_id");
                $data->execute(array(
                    ':adminPassword' => password_hash($_POST['newAdminPassword'],PASSWORD_ARGON2I),
                    ':admins_id' => $adminId
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
}
else {
    $_SESSION['error'] = 'You are not allowed to access this page';
    header('Location: ../index.php');
}

?>
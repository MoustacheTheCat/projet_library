<?php
require('ActionRequire.php');
if(isset($_SESSION['role']) && $_SESSION['role'] == 'admin'){
    $admin = $_SESSION['tabAdmin']; 
    if(isset($_POST['confirm']) ){
        if(password_verify($_POST['adminPassword'], $admin['adminPassword'])){
            $data =  $db->prepare("UPDATE admins SET adminFirstName = :adminFirstName, adminLastName = :adminLastName, adminEmail = :adminEmail, adminAdress = :adminAdress, adminCity = :adminCity, adminZip = :adminZip, adminContry = :adminContry, adminPhone = :adminPhone, adminPassword = :adminPassword, adminBirthday = :adminBirthday WHERE admins_id = :admins_id");
            $data->execute(array(
                ':adminFirstName' => $admin['adminFirstName'],
                ':adminLastName' => $admin['adminLastName'],
                ':adminEmail' => $admin['adminEmail'],
                ':adminAdress' => $admin['adminAdress'],
                ':adminCity' => $admin['adminCity'],
                ':adminZip' => $admin['adminZip'],
                ':adminContry'   => $admin['adminContry'],
                ':adminPhone' => $admin['adminPhone'],
                ':adminBirthday' => $admin['adminBirthday'],
                ':adminPassword' => password_hash($_POST['adminPassword'],PASSWORD_ARGON2I),
                ':admins_id' => $admin['admins_id']
            ));
            $_SESSION['admin'] = $admin;
            $_SESSION['response'] = 'Admin info updated';
        }
        else   {
            $_SESSION['error'] = 'password incorrect';
        }
        responseMessage();       
    }
}
else {
    $_SESSION['error'] = 'You are not allowed to access this page';
    header('Location: ../index.php');
}
?>
<?php
require('config.php');
$admin = $_SESSION['tabAdmin']; 

print_r($admin);
if(isset($_POST['confirm']) ){
    if(password_verify($_POST['adminPassword'], $admin['adminPassword'])){
        $data =  $db->prepare("UPDATE admins SET adminFirstName = :adminFirstName, adminLastName = :adminLastName, adminEmail = :adminEmail, adminAdress = :adminAdress, adminCity = :adminCity, adminZip = :adminZip, adminContry = :adminContry, adminPhone = :adminPhone, adminPassword = :adminPassword, adminBirthday = :adminBirthday WHERE admin_id = :admin_id");
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
            ':admin_id' => $admin['admin_id']
        ));
        $_SESSION['admin'] = $admin;
        $_SESSION['response'] = 'Admin info updated';
    }
    else   {
        $_SESSION['error'] = 'password incorrect';
    }
    responseMessage();       
}
?>
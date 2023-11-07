<?php

require('config.php');
$admins = getAllData($db, 'admins');
if(isset($_POST['register'])){
    if(!empty($_POST['adminPassword']) && !empty($_POST['adminPasswordConfirm']) && !empty($_POST['adminFirstName']) && !empty($_POST['adminLastName']) && !empty($_POST['adminEmail']) && !empty($_POST['adminAdress']) && !empty($_POST['adminCity']) && !empty($_POST['adminZip']) && !empty($_POST['adminContry']) && !empty($_POST['adminPhone']) && !empty($_POST['adminBirthday'])){
        foreach($admins as $admin){
            if($admin['adminEmail'] == $_POST['adminEmail']){
                header('Location: ../pages/register.php');
                $_SESSION['error'] = 'Email already exist';
                exit;
            }
        }
        if($_POST['adminPassword'] == $_POST['adminPasswordConfirm']){
            $dataC =  $db->prepare("INSERT INTO admins (adminFirstName, adminLastName, adminEmail, adminAdress, adminCity, adminZip, adminContry, adminPhone, adminPassword, adminBirthday) VALUES (:adminFirstName, :adminLastName, :adminEmail, :adminAdress, :adminCity, :adminZip, :adminContry, :adminPhone, :adminPassword, :adminBirthday)");
            $dataC->execute(array(
                ':adminFirstName' => $_POST['adminFirstName'],
                ':adminLastName' => $_POST['adminLastName'],
                ':adminEmail' => $_POST['adminEmail'],
                ':adminAdress' => $_POST['adminAdress'],
                ':adminCity' => $_POST['adminCity'],
                ':adminZip' => $_POST['adminZip'],
                ':adminContry'   => $_POST['adminContry'],
                ':adminPhone' => $_POST['adminPhone'],
                ':adminPassword' => password_hash($_POST['adminPassword'],PASSWORD_ARGON2I),
                ':adminBirthday' =>$_POST['adminBirthday']
            ));
            header('Location: ../pages/login.php');
            exit;
        }else{
            header('Location: ../pages/register.php');
            exit;
        }
    }
}

?>
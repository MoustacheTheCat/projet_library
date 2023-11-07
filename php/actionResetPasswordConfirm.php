<?php
require('../php/config.php');
$id = $_SESSION['dataId'];
if(isset($_POST['password']) && isset($_POST['passwordConfirm'])){
    if($_POST['password'] == $_POST['passwordConfirm']){
        if(isset($id) && !empty($id)){
            if(isset($_SESSION['type'])){
                $password = password_hash($_POST['password'], PASSWORD_ARGON2I);
                if($_SESSION['type'] == 1){
                    $type = 'customer';
                    $sql = "UPDATE customer SET customerPassword = :customerPassword WHERE customer_id = :id";
                    $stmt = $db->prepare($sql);
                    $stmt->bindValue(':customerPassword', $password);
                }
                elseif($_SESSION['type'] == 2){
                    $type = 'admins';
                    $sql = "UPDATE admins SET adminPassword = :adminPassword WHERE admin_id = :id";
                    $stmt = $db->prepare($sql);
                    $stmt->bindValue(':adminPassword', $password);
                }
                $stmt->bindValue(':id', $id);
                $stmt->execute();
                $_SESSION['response'] = 'Password changed';
            }
        }
    }
    else{
        $_SESSION['error'] = 'Passwords do not match';
    }
}
else{
    $_SESSION['error'] = 'Please fill all fields';
}

responseMessage();
<?php

require('config.php');

if(isset($_POST['login'])){
    if(isset($_POST['role'])){
        $dataAdmins = getAllData($db, 'admins');
        foreach($dataAdmins as $dataAdmin){
            if($dataAdmin['adminEmail'] === $_POST['loginEmail']){
                $adminId = $dataAdmin['admin_id'];
                $adminPassword = $dataAdmin['adminPassword'];
            }
            else{
                $_SESSION['error'] = 'Email or password incorrect';
            }
        }
        if(password_verify($_POST['loginPassword'], $adminPassword)){
            $_SESSION['adminId'] = $adminId;
            $_SESSION['response'] = 'Welcome '.$dataAdmin['adminFirstName'];
        }else{
            $_SESSION['error'] = 'Email or password incorrect';
        }
    }
    else {
        $dataCustomers = getAllData($db, 'customer');
        foreach($dataCustomers as $dataCustomer){
            if($dataCustomer['customerEmail'] === $_POST['loginEmail']){
                $customerId = $dataCustomer['customer_id'];
                $customerPassword = $dataCustomer['customerPassword'];
            }
            else{
                $_SESSION['error'] = 'Email or password incorrect';
            }
        }
        if(password_verify($_POST['loginPassword'], $customerPassword)){
            $_SESSION['customerId'] = $customerId;
            $_SESSION['response'] = 'Welcome '.$dataCustomer['customerFirstName'];
        }else{  
            $_SESSION['error'] = 'Email or password incorrect';
        }
    }
    if(!empty($_SESSION['error']) || !empty($_SESSION['response'])){
        header('Location: ../index.php');
        exit;
    }
}
?>
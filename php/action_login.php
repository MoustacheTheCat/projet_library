<?php

require('config.php');
print_r($_SESSION);
$step = false;
if(isset($_POST['login'])){
    if(isset($_POST['role'])){
        $dataAdmins = getAllData($db, 'admins');
        foreach($dataAdmins as $dataAdmin){
            if($dataAdmin['adminEmail'] === $_POST['loginEmail']){
                $adminId = $dataAdmin['admin_id'];
                $adminPassword = $dataAdmin['adminPassword'];
                $step = true;
            }
        }
        if($step == false){
            $_SESSION['error'] = 'Email not found';
        }
        else{
            if(password_verify($_POST['loginPassword'], $adminPassword)){
                $_SESSION['adminId'] = $adminId;
                $_SESSION['response'] = 'Welcome '.$dataAdmin['adminFirstName'];
            }else{
                $_SESSION['error'] = 'password incorrect';
                
            }
        }
        
    }
    else {
        $dataCustomers = getAllData($db, 'customer');
        foreach($dataCustomers as $dataCustomer){
            if($dataCustomer['customerEmail'] === $_POST['loginEmail']){
                $customerId = $dataCustomer['customer_id'];
                $customerPassword = $dataCustomer['customerPassword'];
                $step = true;
            }
        }
        if($step == false){
            $_SESSION['error'] = 'Email not found';
        }
        else{
            if(password_verify($_POST['loginPassword'], $customerPassword)){
                $_SESSION['customerId'] = $customerId;
                $_SESSION['response'] = 'Welcome '.$dataCustomer['customerFirstName'];
            }else{  
                $_SESSION['error'] = 'password incorrect';
                
            }
        }
    }
    responseMessage();
}
?>
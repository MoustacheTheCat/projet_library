<?php

require('ActionRequire.php');
$step = false;
if(isset($_POST['login'])){
    if(isset($_POST['role'])){
        $dataAdmins = getAllData('admins');
        foreach($dataAdmins as $dataAdmin){
            if($dataAdmin['adminEmail'] === $_POST['loginEmail']){
                $adminId = $dataAdmin['admins_id'];
                $adminPassword = $dataAdmin['adminPassword'];
                $step = true;
            }
        }
        if($step == false){
            $_SESSION['error'] = 'Email not found';
        }
        else{
            if(password_verify($_POST['loginPassword'], $adminPassword)){
                unset($_SESSION['error']);
                $_SESSION['adminId'] = $adminId;
                $_SESSION['role'] = 'admin';
                $_SESSION['response'] = 'Welcome '.$dataAdmin['adminFirstName'];
            }else{
                $_SESSION['error'] = 'password incorrect';
                
            }
        }
        
    }
    else {
        $dataCustomers = getAllData('customers');
        foreach($dataCustomers as $dataCustomer){
            if($dataCustomer['customerEmail'] === $_POST['loginEmail']){
                $customerId = $dataCustomer['customers_id'];
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
                $_SESSION['role'] = 'customers';
                $_SESSION['response'] = 'Welcome '.$dataCustomer['customerFirstName'];
                unset($_SESSION['error']);
            }else{  
                $_SESSION['error'] = 'password incorrect';
                
            }
        }
    }
    if(!responseMessage('Location: ../Pages/PageLogin.php')){
        header('Location: ../index.php');
    }
    
}
?>
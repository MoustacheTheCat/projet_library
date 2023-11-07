<?php 
if(!isset($_SESSION['customerId']) || !empty($_SESSION['customerId'])){
    $customers = getAllData($db, 'customer');
    foreach($customers as $customer){
        $customerIscustomer = false;
        if($customer['customer_id'] == $_SESSION['customerId']){
            $_SESSION['message'] = 'You are a customer';
            } 
        $_SESSION['error'] = 'You are not a customer';
    }
    responseMessage();
}
?>
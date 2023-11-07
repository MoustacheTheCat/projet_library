<?php 
if(!isset($_SESSION['customerId']) || !empty($_SESSION['customerId'])){
    $customers = getAllData($db, 'customer');
    foreach($customers as $customer){
        $customerIscustomer = false;
        if($customer['customer_id'] == $_SESSION['customerId']){
            $customerIscustomer = true;
            } 
        return $customerIscustomer;
    }
    if(!$customerIscustomer){
        header('Location: ../index.php');
        exit;
    }
}
?>
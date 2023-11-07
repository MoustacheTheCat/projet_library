<?php
require('../php/config.php');
if(isset($_POST['send'])){
    $email = $_POST['email'];
    var_dump($email);
    $customers = getAllData($db, 'customer');
    $admins = getAllData($db, 'admins');
    $verifEmail = false;
    $id = 0;
    $type = 0;
    foreach($customers as $customer){
        if($customer['customerEmail'] === $email){
            $verifEmail = true;
            $id = $customer['customer_id'];
            $type = 1;
            
        }
    }
    foreach($admins as $admin){
        if($admin['adminEmail'] === $email){
            $verifEmail = true;
            $id = $admin['admin_id'];
            $type = 2;  
            
        }
    }
    if($verifEmail){
        $url = "http://projet_library.com/php/actionResetPassword.php?id='".$id."'&type='".$type."'";
        $to = $email;
        $subject = "Reset your password on projet library";
        $msg = "Hi there, click on this <a href='$url'>link</a> to reset your password on our site";
        $headers = "From: webmaster@projet_library.com";
        mail($to, $subject, $msg, $headers);
        $_SESSION['response'] = 'Check your email to reset your password';
        
    }else{  
        $_SESSION['error'] = 'Email not found';
    }
    if(!empty($_SESSION['error']) || !empty($_SESSION['response'])){
        header('Location: ../index.php');
        exit;
    }
}
?>
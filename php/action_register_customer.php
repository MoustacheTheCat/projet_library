<?php

require('config.php');
$customers = getAllData($db, 'customer');
unset($_SESSION['response']);
unset($_SESSION['error']);
$step = true;
if(isset($_POST['register'])){
    if(!empty($_POST['customerPassword']) && !empty($_POST['customerPasswordConfirm']) && !empty($_POST['customerFirstName']) && !empty($_POST['customerLastName']) && !empty($_POST['customerEmail']) && !empty($_POST['customerAdress']) && !empty($_POST['customerCity']) && !empty($_POST['customerZip']) && !empty($_POST['customerContry']) && !empty($_POST['customerPhone']) && !empty($_POST['customerBirthday'])){
        foreach($customers as $customer){
            if($customer['customerEmail'] == $_POST['customerEmail']){
                $step = false;
            }
        }
        if($step != false){
            if($_POST['customerPassword'] == $_POST['customerPasswordConfirm']){
                $dataC =  $db->prepare("INSERT INTO customer (customerFirstName, customerLastName, customerEmail, customerAdress, customerCity, customerZip, customerContry, customerPhone, customerPassword, customerBirthday) VALUES (:customerFirstName, :customerLastName, :customerEmail, :customerAdress, :customerCity, :customerZip, :customerContry, :customerPhone, :customerPassword, :customerBirthday)");
                $dataC->execute(array(
                    ':customerFirstName' => $_POST['customerFirstName'],
                    ':customerLastName' => $_POST['customerLastName'],
                    ':customerEmail' => $_POST['customerEmail'],
                    ':customerAdress' => $_POST['customerAdress'],
                    ':customerCity' => $_POST['customerCity'],
                    ':customerZip' => $_POST['customerZip'],
                    ':customerContry'   => $_POST['customerContry'],
                    ':customerPhone' => $_POST['customerPhone'],
                    ':customerPassword' => password_hash($_POST['customerPassword'],PASSWORD_ARGON2I),
                    ':customerBirthday' => $_POST['customerBirthday']
                ));
                $_SESSION['response'] = 'Your account has been created';
            }else{
                $_SESSION['error'] = 'Passwords do not match';
            }
        }else{
            $_SESSION['error'] = 'Email already used';
        }
    }else{
        $_SESSION['error'] = 'Please fill in all fields';
    }
    responseMessage();
}

?>
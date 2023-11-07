<?php

require('config.php');
$customers = getAllData($db, 'customer');
if(isset($_POST['register'])){
    if(!empty($_POST['customerPassword']) && !empty($_POST['customerPasswordConfirm']) && !empty($_POST['customerFirstName']) && !empty($_POST['customerLastName']) && !empty($_POST['customerEmail']) && !empty($_POST['customerAdress']) && !empty($_POST['customerCity']) && !empty($_POST['customerZip']) && !empty($_POST['customerContry']) && !empty($_POST['customerPhone']) && !empty($_POST['customerBirthday'])){
        foreach($customers as $customer){
            if($customer['customerEmail'] == $_POST['customerEmail']){
                header('Location: ../pages/register.php');
                $_SESSION['error'] = 'Email already exist';
                exit;
            }
        }
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
            header('Location: ../pages/login.php');
            exit;
        }else{
            header('Location: ../pages/register.php');
            exit;
        }
}
}

?>
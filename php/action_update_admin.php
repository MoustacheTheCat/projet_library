<?php

require('config.php');
$admin = $_SESSION['admin'];
$adminData = getOneData($db, 'admins', 'admin_id', $admin['admin_id']);
$adminData = $adminData[0];
$tabAdmin = array();
?>
<?php if(isset($_POST['update-info'])) {
    if(!empty($_POST['adminFirstName']) || !empty($_POST['adminLastName']) || !empty($_POST['adminEmail']) || !empty($_POST['adminAdress']) || !empty($_POST['adminCity']) || !empty($_POST['adminZip']) || !empty($_POST['adminContry']) || !empty($_POST['adminPhone'])){
        if(empty($_POST['adminFirstName'])){
            $adminFirstName = $adminData['adminFirstName'];
        }else{  
            $adminFirstName = $_POST['adminFirstName'];
        }
        if(empty($_POST['adminLastName'])){
            $adminLastName = $adminData['adminLastName'];
        }else{
            $adminLastName = $_POST['adminLastName'];
        }
        if(empty($_POST['adminEmail'])){
            $adminEmail = $adminData['adminEmail'];
        }else{
            $adminEmail = $_POST['adminEmail'];
        }
        if(empty($_POST['adminAdress'])){
            $adminAdress = $adminData['adminAdress'];
        }else{
            $adminAdress = $_POST['adminAdress'];
        }
        if(empty($_POST['adminCity'])){
            $adminCity = $adminData['adminCity'];
        }else{
            $adminCity = $_POST['adminCity'];
        }
        if(empty($_POST['adminZip'])){
            $adminZip = $adminData['adminZip'];
        }else{
            $adminZip = $_POST['adminZip'];
        }
        if(empty($_POST['adminContry'])){
            $adminContry = $adminData['adminContry'];
        }else{  
            $adminContry = $_POST['adminContry'];
        }
        if(empty($_POST['adminPhone'])){
            $adminPhone = $adminData['adminPhone'];
        }else{
            $adminPhone = $_POST['adminPhone'];
        }
        $tabAdmin = array(
            'admin_id' => $adminData['admin_id'], 
            'adminFirstName' => $adminFirstName,
            'adminLastName' => $adminLastName,
            'adminEmail' => $adminEmail,
            'adminAdress' => $adminAdress,
            'adminCity' => $adminCity,
            'adminZip' => $adminZip,
            'adminContry'   => $adminContry,
            'adminPhone' => $adminPhone,
            'adminBirthday' => $_POST['adminBirthday'],
            'adminPassword' => $adminData['adminPassword']
        );
        $_SESSION['tabAdmin'] = $tabAdmin;
        ?>
        <h2>Enter your password to validate your profile update</h2>
        <form action="action_update_admin_confirm.php" method="POST">
            <label for="adminPassword">Password :</label>
            <input type="password" name="adminPassword" id="adminPassword" required>
            <input type="submit" value="Confirm" name="confirm">
        </form>
    <?php
    }
    else{
        $_SESSION['error'] = 'You must fill at least one field';
        header('Location: ../pages/edit_admin.php');
        exit;
    }
} 
?>

<?php 
require('../Action/ActionRequire.php');
if(isset($_SESSION['role']) && $_SESSION['role'] == 'admin'){
$pageTitle = 'Edit admin';
$adminId = $_SESSION['adminId'];

$admin = getOneData('admins', $adminId);
$admin = $admin[0];
include('../Layout/LayoutHeader.php');
?>
<div class="form-info-admin">
<h2>Update your acompte :</h2>
    <form action="../Action/ActionUpdateAdmin.php" method="POST">
        <label for="adminFirstName">First Name :</label>
        <input type="text" name="adminFirstName" id="adminFirstName"  placeholder="<?php echo $admin['adminFirstName'];?>">
        <label for="adminLastName">Last Name :</label> 
        <input type="text" name="adminLastName" id="adminLastName"  placeholder="<?php echo $admin['adminLastName'];?>">
        <label for="adminEmail">Email :</label>
        <input type="email" name="adminEmail" id="adminEmail"  placeholder="<?php echo $admin['adminEmail'];?>">
        <label for="adminPhone">Phone :</label>
        <input type="tel" name="adminPhone" id="adminPhone"  placeholder="<?php echo $admin['adminPhone'];?>">
        <label for="adminBirthday">Birthday :</label>
        <input type="date" name="adminBirthday" id="adminBirthday"  value="<?php echo $admin['adminBirthday'];?>">
        <label for="adminAdress">Adress :</label>
        <input type="text" name="adminAdress" id="adminAdress"  placeholder="<?php echo $admin['adminAdress'];?>">
        <label for="adminCity">City :</label>
        <input type="text" name="adminCity" id="adminCity"  placeholder="<?php echo $admin['adminCity'];?>">
        <label for="adminZip">Zip Code :</label>
        <input type="text" name="adminZip" id="adminZipCode" max="5"  placeholder="<?php echo $admin['adminZip'];?>" >
        <label for="adminContry">Country :</label>
        <input type="text" name="adminContry" id="adminContry"  placeholder="<?php echo $admin['adminContry'];?>"> 
        <input type="submit" value="Confirm" name="update-info">
    </form>
</div>
<div class="form-password-admin">
<h2>Update your password :</h2>
    <form action="../Action/ActionUpdateAdminPassword.php" method="POST">
        <label for="adminPassword">Password :</label>
        <input type="password" name="adminPassword" id="adminPassword"  placeholder="********">
        <label for="newAdminPassword">Password :</label>
        <input type="password" name="newAdminPassword" id="adminPassword"  placeholder="********">
        <label for="newAdminPasswordConfirm">Confirm Password :</label>
        <input type="password" name="newAdminPasswordConfirm" id="adminPasswordConfirm"  placeholder="********">
        <input type="submit" value="Confirm" name="update-password">
    </form>
</div>
<?php
include('../Layout/LayoutFooter.php');
}
else {
    $_SESSION['error'] = 'You are not allowed to access this page';
    header('Location: ../index.php');
}
?>


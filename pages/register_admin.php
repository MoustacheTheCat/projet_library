<?php 
require('../php/config.php');
require('../php/actionVerifIsAdmin.php');
$pageTitle = 'Admin register';
include('../layout/header.php');
?>
<h2>Create your acompte</h2>
<div class="form-inof-admin">
    <form action="../php/action_register_admin.php" method="POST">
        <label for="adminFirstName">First Name :</label>
        <input type="text" name="adminFirstName" id="adminFirstName" required>
        <label for="adminLastName">Last Name :</label> 
        <input type="text" name="adminLastName" id="adminLastName" required>
        <label for="adminBirthday">Birthday :</label>
        <input type="date" name="adminBirthday" id="adminBirthday" required>
        <label for="adminAdress">Adress :</label>
        <input type="text" name="adminAdress" id="adminAdress" required>
        <label for="adminCity">City :</label>
        <input type="text" name="adminCity" id="adminCity" required>
        <label for="adminZip">Zip Code :</label>
        <input type="text" name="adminZip" id="adminZipCode" max="5" required >
        <label for="adminContry">Country :</label>
        <input type="text" name="adminContry" id="adminContry" required>
        <label for="adminEmail">Email :</label>
        <input type="email" name="adminEmail" id="adminEmail" required>
        <label for="adminPhone">Phone :</label>
        <input type="tel" name="adminPhone" id="adminPhone" required>
        <label for="adminPassword">Password :</label>
        <input type="password" name="adminPassword" id="adminPassword" required>
        <label for="adminPasswordConfirm">Confirm Password :</label>
        <input type="password" name="adminPasswordConfirm" id="adminPasswordConfirm" required>
        <input type="submit" value="Confirm" name="register">
    </form>
</div>
<?php include('../layout/footer.php'); ?>


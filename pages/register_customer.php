<?php 
require('../php/config.php');
$pageTitle = 'Customer register';
include('../layout/header.php');
?>
<h2>Create your acompte</h2>
<div class="form-inof-customer">
    <form action="../php/action_register_customer.php" method="POST">
        <label for="customerFirstName">First Name :</label>
        <input type="text" name="customerFirstName" id="customerFirstName" required>
        <label for="customerLastName">Last Name :</label> 
        <input type="text" name="customerLastName" id="customerLastName" required>
        <label for="customerBirthday">Birthday :</label>
        <input type="date" name="customerBirthday" id="customerBirthday" required>
        <label for="customerAdress">Adress :</label>
        <input type="text" name="customerAdress" id="customerAdress" required>
        <label for="customerCity">City :</label>
        <input type="text" name="customerCity" id="customerCity" required>
        <label for="customerZip">Zip Code :</label>
        <input type="text" name="customerZip" id="customerZipCode" max="5" required >
        <label for="customerContry">Country :</label>
        <input type="text" name="customerContry" id="customerContry" required>
        <label for="customerEmail">Email :</label>
        <input type="email" name="customerEmail" id="customerEmail" required>
        <label for="customerPhone">Phone :</label>
        <input type="tel" name="customerPhone" id="customerPhone" required>
        <label for="customerPassword">Password :</label>
        <input type="password" name="customerPassword" id="customerPassword" required>
        <label for="customerPasswordConfirm">Confirm Password :</label>
        <input type="password" name="customerPasswordConfirm" id="customerPasswordConfirm" required>
        <input type="submit" value="Confirm" name="register">
    </form>
</div>
<?php
include('../layout/footer.php');
?>
<?php 
$pageTitle = 'Customer info';
session_start();
require('../php/config.php');
require('../php/request.php');
include('../layout/header.php');


?>
<h2>Fill in your information to validate your order</h2>
<div class="form-inof-customer">
    <form action="../php/action_buy.php" method="POST">
        <label for="customerFirstName">First Name :</label>
        <input type="text" name="customerFirstName" id="customerFirstName" required>
        <label for="customerLastName">Last Name :</label> 
        <input type="text" name="customerLastName" id="customerLastName" required>
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
        <!-- <label for="customerCardNumber">Card Number :</label>
        <input type="number" name="customerCardNumber" id="customerCardNumber" required>
        <label for="customerCardName">Card Name :</label>
        <input type="text" name="customerCardName" id="customerCardName" required>
        <label for="customerCardDate">Card Date :</label>
        <input type="date" name="customerCardDate" id="customerCardDate" required>
        <label for="customerCardCrypto">Card Crypto :</label>
        <input type="number" name="customerCardCrypto" id="customerCardCrypto" required>
        <label for="customerCardType">Card Type :</label>
        <select name="customerCardType" id="customerCardType">
            <option value="visa">Visa</option>
            <option value="mastercard">Mastercard</option>
            <option value="american express">American Express</option>
        </select> -->
    <input type="submit" value="Confirm" name="buy_orders">
    </form>
</div>


<?php
include('../layout/footer.php');
?>
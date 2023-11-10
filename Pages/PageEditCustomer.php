<?php 
require('../Action/ActionRequire.php');
$customerId = $_GET['id'];
$customer = getOneData('customers', $customerId);
$customer = $customer[0];
$role = 0;
if(require('../Action/actionVerifIsAdmin.php')){
    $pageTitle = 'Upadte acompte of '.$customer['customerFirstName']." ".$customer['customerLastName']; 
    $role = 1;
}
elseif (require('../Action/actionVerifIsCustomer.php')){
    $pageTitle = 'Update your acompte ';
    $role = 2;
}
include('../Layout/LayoutHeader.php');
?>

<div class="form-info-customer">
    <h2><?php echo $pageTitle;?></h2>
    <form action="../Action/action_update_customer.php" method="POST">
        <label for="customerFirstName">First Name :</label>
        <input type="text" name="customerFirstName" id="customerFirstName" placeholder="<?php echo $customer['customerFirstName'];?>">
        <label for="customerLastName">Last Name :</label> 
        <input type="text" name="customerLastName" id="customerLastName" placeholder="<?php echo $customer['customerLastName'];?>">
        <label for="customerBirthday">Birthday :</label>
        <input type="date" name="customerBirthday" id="customerBirthday" placeholder="<?php echo $customer['customerBirthday'];?>">
        <label for="customerAdress">Adress :</label>
        <input type="text" name="customerAdress" id="customerAdress" placeholder="<?php echo $customer['customerAdress'];?>">
        <label for="customerCity">City :</label>
        <input type="text" name="customerCity" id="customerCity" placeholder="<?php echo $customer['customerCity'];?>">
        <label for="customerZip">Zip Code :</label>
        <input type="text" name="customerZip" id="customerZipCode" max="5" placeholder="<?php echo $customer['customerZip'];?>" >
        <label for="customerContry">Country :</label>
        <input type="text" name="customerContry" id="customerContry" placeholder="<?php echo $customer['customerContry'];?>">
        <label for="customerEmail">Email :</label>
        <input type="email" name="customerEmail" id="customerEmail" placeholder="<?php echo $customer['customerEmail'];?>">
        <label for="customerPhone">Phone :</label>
        <input type="tel" name="customerPhone" id="customerPhone" placeholder="<?php echo $customer['customerPhone'];?>">
        <input type="submit" value="Confirm" name="update-info">
    </form>
</div>
<?php if ($role == 2):?>
    <div class="form-update-password">
        <h2>Upgrade your password :</h2>
        <form action="">
        <label for="customerPassword">Password :</label>
        <input type="password" name="customerPassword" id="customerPassword" placeholder="**********">
        <label for="newCustomerPassword">Password :</label>
        <input type="password" name="newCustomerPassword" id="newCustomerPassword" placeholder="**********">
        <label for="newCustomerPasswordConfirm">Confirm Password :</label>
        <input type="password" name="newCustomerPasswordConfirm" id="newCustomerPasswordConfirm" placeholder="**********">
        <input type="submit" value="Confirm" name="update-password">
        </form>
    </div>
<?php endif; ?>
<?php
include('../Layout/LayoutFooter.php');
?>
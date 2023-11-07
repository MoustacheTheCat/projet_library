<?php
require('../php/config.php');
$pageTitle = 'Forgot password';
include('../layout/header.php');
?>
<div class="forgot-password">
    <form action="../php/actionForgotPassword.php" method="POST">
        <label for="email">Email</label>
        <input type="email" name="email" id="email">
        <input type="submit" value="Send" name="send">
    </form>
</div>
<?php include('../layout/footer.php'); ?>
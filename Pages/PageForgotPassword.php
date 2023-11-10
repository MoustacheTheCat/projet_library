<?php
require('../Action/ActionRequire.php');
$pageTitle = 'Forgot password';
include('../Layout/LayoutHeader.php');
?>
<div class="forgot-password">
    <form action="../Action/ActionPageForgotPassword.php" method="POST">
        <label for="email">Email</label>
        <input type="email" name="email" id="email">
        <input type="submit" value="Send" name="send">
    </form>
</div>
<?php include('../Layout/LayoutFooter.php'); ?>
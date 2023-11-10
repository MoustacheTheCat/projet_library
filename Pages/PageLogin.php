<?php

session_start();

?>

<div class="div-login">
    <form action="../Action/ActionLogin.php" method="POST">
        <label for="loginEmail">Email :</label>
        <input type="email" name="loginEmail" id="loginEmail" required>
        <label for="loginPassword">Password :</label>
        <input type="password" name="loginPassword" id="loginPassword" required>
        <label for="role">If you are an administrator, check this box</label>
        <input type="checkbox" name="role" id="role">
        <input type="submit" value="Login" name="login">
    </form>
    <a href="register_customer.php">Register</a>
    <a href="PageForgotPassword.php">Forgot password</a>
</div>
<?php
    if(isset($_SESSION['error'])){
        echo $_SESSION['error'];
        unset($_SESSION['error']);
    }
    if(isset($_SESSION['response'])){
        echo $_SESSION['response'];
        unset($_SESSION['response']);
    }
?>
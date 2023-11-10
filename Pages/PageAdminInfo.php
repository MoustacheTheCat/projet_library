<?php 
require('../Action/ActionRequire.php');
if(isset($_SESSION['role']) && $_SESSION['role'] == 'admin'){
$pageTitle = 'Admin Info';
include('../Layout/LayoutHeader.php');
?>
<?php
    $admin = getOneData('admins', $_SESSION['adminId']);
    $admin = $admin[0]; 
?>
<h2><?php echo $admin['adminFirstName']. " ".$admin['adminLastName'];?></h2>
<p>BirthDay : <?php echo $admin['adminBirthday'];?></p>
<p>Email : <?php echo $admin['adminEmail']; ?></p>
<p>Phone numbers : <?php echo $admin['adminPhone']; ?></p>
<p>Adress : <?php echo $admin['adminAdress']; ?></p>
<p>City and zipCode : <?php echo $admin['adminCity']; ?></p>
<p>zipCode : <?php echo $admin['adminZip']; ?></p>
<p>Country : <?php echo $admin['adminContry']; ?></p>
<?php
include('../Layout/LayoutFooter.php');
}
else {
    $_SESSION['error'] = 'You are not allowed to access this page';
    header('Location: ../index.php');
}
?>

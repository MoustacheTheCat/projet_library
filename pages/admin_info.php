<?php 
require('../php/config.php');
require('../php/actionVerifIsAdmin.php');
$pageTitle = 'Admin Info';
include('../layout/header.php');
?>
<?php
    $admin = getOneData($db, 'admins', 'admin_id', $_SESSION['adminId']);
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
<?php include('../layout/footer.php'); ?>
